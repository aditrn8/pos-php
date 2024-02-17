<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'html', 'file'));
        $this->load->library(array('template', 'form_validation', 'unit_test'));
        $this->load->model('kasir/Transaksi_model', 'tm');
        date_default_timezone_set('Asia/Jakarta');

        $this->name     = $this->session->userdata('name');
        $this->userId   = $this->session->userdata('user_id');
        $this->dateNow  = date('Y-m-d H:i:s');
    }

    public function index()
    {
        $data = [
            'title' => 'Menu Transaksi'
        ];
        $this->template->load('template', 'kasir/transaksi/index', $data);
    }

    public function tambahTransaksi()
    {

        $dataInsert = [
            'Created_By'        => $this->userId
        ];

        $this->db->insert('tbl_transaksi', $dataInsert);
        $id = $this->db->insert_id();

        redirect('kasir/transaksi/inputBelanja/' . $id);
    }

    public function inputBelanja($id)
    {
        $data = [
            'id'            => $id,
            'title'         => 'Input Belanja',
            'barangJual'    => $this->db->query("SELECT * FROM product WHERE product_name NOT IN (SELECT Nama_Barang FROM tbl_penjualan WHERE ID_Transaksi = $id) AND is_deleted = 0"),
            'barangTemp'    => $this->db->where('ID_Transaksi', $id)->get('tbl_penjualan'),
            'totalBelanja'  => $this->db->query("SELECT SUM(Jumlah_Transaksi_Barang) as jtb FROM tbl_penjualan WHERE ID_Transaksi = $id")->row()->jtb
        ];

        $this->template->load('template', 'kasir/transaksi/edit', $data);
    }

    public function inputBarangTemp($id, $productName, $price)
    {
        $productName_ = str_replace('%20', ' ', $productName);
        $query = $this->db->get_where('tbl_penjualan', ['Nama_Barang' => $productName_, 'ID_Transaksi' => $id]);
        if (!empty($query->result())) {
            echo json_encode(false);
        } else {

            $dataInsert = [
                'ID_Transaksi'              => $id,
                'Nama_Barang'               => $productName_,
                'Harga_Barang'              => $price,
                'Jumlah_Barang'             => 1,
                'Jumlah_Transaksi_Barang'   => 1 * $price,
                'Created_By'                => $this->userId
            ];

            $this->db->insert('tbl_penjualan', $dataInsert);
            echo json_encode(true);
        }
        // $this->session->set_flashdata('msg', 'Berhasil menambahkan ke keranjang!');
        // redirect('kasir/transaksi/inputBelanja/' . $id);
    }

    public function hapusBarangTemp($id_penjualan, $id)
    {
        $this->db->delete('tbl_penjualan', ['ID_Penjualan' => $id_penjualan]);
        $this->session->set_flashdata('msg', 'Berhasil menghapus barang!');
        redirect('kasir/transaksi/inputBelanja/' . $id);
    }

    public function hapusProduk($id)
    {
        $dataUpdate = [
            'is_deleted'    => 1,
            'deleted_by'    => $this->userId,
            'deleted_at'    => $this->dateNow
        ];

        $this->tm->update('product', $dataUpdate, ['id' => $id]);
        $this->session->set_flashdata('msg', 'Berhasil menghapus produk!');
        redirect('master/produk');
    }

    public function kalkulasi($id, $id_penjualan, $val)
    {
        $hargaDB = $this->db->select('*')->from('tbl_penjualan')->where('ID_Penjualan', $id_penjualan)->get()->row();
        $stock = $this->db->select('stock')->from('product')->where('product_name', $hargaDB->Nama_Barang)->get()->row()->stock;
        if ($val > $stock || $val == 0) {
            echo json_encode([
                'data' => false
            ]);
        } else {
            $hargaDB_ = $hargaDB->Harga_Barang * $val;
            $dataUpdate = [
                'Jumlah_Barang' => $val,
                'Jumlah_Transaksi_Barang' => $hargaDB_,
            ];
            $this->db->update('tbl_penjualan', $dataUpdate, ['ID_Penjualan' => $id_penjualan]);
            echo json_encode([
                'data' => true
            ]);
        }
        // redirect('kasir/transaksi/inputBelanja/' . $id);
    }

    public function inputPembayaran($id)
    {
        $bill = $this->input->post('Bill');
        $paid = $this->input->post('Paid');

        if ($paid < $bill) {
            $this->session->set_flashdata('msg', 'Pemabayaran Gagal!');
            redirect('kasir/transaksi/inputBelanja/' . $id);
        } else {
            $dataUpdate = [
                'Bill' => $bill,
                'Paid' => $paid,
                'Is_Paid' => 1
            ];

            $this->db->update('tbl_transaksi', $dataUpdate, ['ID_Transaksi' => $id]);
            $this->session->set_flashdata('msg', 'Pemabayaran Berhasil!');
            redirect('kasir/transaksi/');
        }
    }


    function getDataTransaksi()
    {
        $list = $this->tm->dataTransaksi();
        $data = array();
        $no   = $_POST['start'];
        foreach ($list as $field) {
            $is_paid = ($field->Is_Paid == 0) ? '<p class="badge badge-danger">Belum Bayar</p>' : '<p class="badge badge-success">Sudah Bayar</p>';
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->ID_Transaksi;
            $row[] = $is_paid;
            $row[] = $field->Created_Date;
            $row[] = "<a href='" . site_url('kasir/transaksi/inputBelanja/' . $field->ID_Transaksi) . "' class='btn btn-warning btn-icon'><i class='fa fa-pen'></i></a>";

            $data[] = $row;
        }
        $output = array(
            "draw"         => $_POST['draw'],
            "recordsTotal" => $this->tm->countDataTransaksi(),
            "recordsFiltered" => $this->tm->countDataTransaksi(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    private function duplicate_entry()
    {
        $id             = $this->input->post('id');
        $namaProduk     = trim(htmlspecialchars($this->input->post('product_name')));
        $where          = "(product_name = '$namaProduk' AND is_deleted = 0 AND id != '$id')";
        $query          = $this->tm->getData('product', $where);

        if ($query->num_rows() > 0) {
            return '1';
        } else {
            return '0';
        }
    }

    private function validationProduk()
    {
        $this->form_validation->set_rules('product_name', 'Nama Produk', 'trim|required', [
            'required' => 'Nama Produk wajib diisi!'
        ]);
        $this->form_validation->set_rules('price', 'Harga', 'trim|required|numeric', [
            'required' => 'Harga wajib diisi!',
            'numeric'  => 'Inputan wajib angka'
        ]);
        $this->form_validation->set_rules('stock', 'Stok', 'trim|required|numeric', [
            'required' => 'Stok wajib diisi!'
        ]);
    }

    public function cariDetailBarang($barcode_id)
    {
        $query = $this->db->get_where('product', ['barcode_id' => $barcode_id])->row();
        echo json_encode($query);
    }
}
