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
        if ($this->auth() == false) {
            redirect('');
        }
        $data = [
            'title' => 'Menu Transaksi'
        ];
        $this->template->load('template', 'kasir/transaksi/index', $data);
    }

    public function tambahTransaksi()
    {
        if ($this->auth() == false) {
            redirect('');
        }
        $dataInsert = [
            'Nomor_Invoice'     => $this->generateNomorInvoice(),
            'Created_By'        => $this->userId,
            'Period_Month'      => $this->bulanBahasa(date('n')),
            'Period_Year'       => date('Y')
        ];

        $this->db->insert('tbl_transaksi', $dataInsert);
        $id = $this->db->insert_id();

        redirect('kasir/transaksi/inputBelanja/' . $id);
    }

    function bulanBahasa($bulan)
    {
        $nama_bulan = array(
            1 => "Januari",
            2 => "Februari",
            3 => "Maret",
            4 => "April",
            5 => "Mei",
            6 => "Juni",
            7 => "Juli",
            8 => "Agustus",
            9 => "September",
            10 => "Oktober",
            11 => "November",
            12 => "Desember"
        );

        return $nama_bulan[$bulan];
    }

    public function generateNomorInvoice()
    {
        $lastInvoiceNumber = $this->db->select('Nomor_Invoice')->order_by('ID_Transaksi', 'DESC')->limit(1)->get('tbl_transaksi')->row('Nomor_Invoice');

        $lastInvoiceSequence = intval(substr($lastInvoiceNumber, 5));

        $newInvoiceNumber = 'TRINV' . str_pad($lastInvoiceSequence + 1, 4, '0', STR_PAD_LEFT);

        return $newInvoiceNumber;
    }

    public function inputBelanja($id)
    {
        if ($this->auth() == false) {
            redirect('');
        }
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
        if ($this->auth() == false) {
            redirect('');
        }
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
        if ($this->auth() == false) {
            redirect('');
        }
        $this->db->delete('tbl_penjualan', ['ID_Penjualan' => $id_penjualan]);
        $this->session->set_flashdata('msg', 'Berhasil menghapus barang!');
        redirect('kasir/transaksi/inputBelanja/' . $id);
    }

    public function hapusProduk($id)
    {
        if ($this->auth() == false) {
            redirect('');
        }
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
        if ($this->auth() == false) {
            redirect('');
        }
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
        if ($this->auth() == false) {
            redirect('');
        }
        $bill = $this->input->post('Bill');
        $paid = $this->input->post('Paid');
        $paidType = $this->input->post('paidType');

        if ($paidType == "Transfer") {
            // Validasi file bukti transfer
            $config['upload_path']   = './upload/'; // Direktori untuk menyimpan file
            $config['allowed_types'] = 'jpg|jpeg|png'; // Ekstensi file yang diperbolehkan
            $config['max_size']      = 10048; // Ukuran maksimum file (dalam kilobita)
            $config['file_name']     = 'bukti_transfer_' . time(); // Nama file

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('buktiTf')) {
                // Jika upload gagal
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('msg', 'Upload bukti transfer gagal: ' . $error);
                redirect('kasir/transaksi/inputBelanja/' . $id);
            } else {
                // Jika upload berhasil
                $uploadData = $this->upload->data();
                $buktiTransfer = $uploadData['file_name'];

                // Simpan data pembayaran
                $dataUpdate = [
                    'Bill' => $bill,
                    'Paid' => $bill,
                    'Bukti_Transfer' => $buktiTransfer, // Simpan nama file bukti transfer
                    'Is_Paid' => 1,
                    'Paid_Type' => $paidType
                ];

                $this->db->update('tbl_transaksi', $dataUpdate, ['ID_Transaksi' => $id]);
                $this->session->set_flashdata('msg', 'Pembayaran berhasil!');
                redirect('kasir/transaksi/');
            }
        } else {

            if ($paid < $bill) {
                $this->session->set_flashdata('msg', 'Pemabayaran Gagal!');
                redirect('kasir/transaksi/inputBelanja/' . $id);
            } else {
                $dataUpdate = [
                    'Bill' => $bill,
                    'Paid' => $paid,
                    'Is_Paid' => 1,
                    'Paid_Type' => $paidType
                ];

                $this->db->update('tbl_transaksi', $dataUpdate, ['ID_Transaksi' => $id]);
                $this->session->set_flashdata('msg', 'Pemabayaran Berhasil!');
                redirect('kasir/transaksi/');
            }
        }
    }

    function cetakTransaksi($id)
    {
        if ($this->auth() == false) {
            redirect('');
        }

        // require_once APPPATH . 'vendor/autoload.php';


        $data['q1'] = $this->db->select('Nomor_Invoice,Bill')->from('tbl_transaksi')->where('ID_Transaksi', $id)->get()->row();
        $data['q2'] = $this->db->get_where('tbl_penjualan', ['ID_Transaksi' => $id]);
        $this->load->view('kasir/transaksi/cetak', $data);
    }


    function getDataTransaksi()
    {
        if ($this->auth() == false) {
            redirect('');
        }
        $list = $this->tm->dataTransaksi();
        $data = array();
        $no   = $_POST['start'];
        foreach ($list as $field) {
            $is_paid = ($field->Is_Paid == 0) ? '<p class="badge badge-danger">Belum Bayar</p>' : '<p class="badge badge-success">Sudah Bayar</p>';
            $is_paid2 = ($field->Is_Paid == 0) ? "<a href='" . site_url('kasir/transaksi/inputBelanja/' . $field->ID_Transaksi) . "' class='btn btn-warning btn-icon'><i class='fa fa-pen'></i></a>" : "<a href='" . site_url('kasir/transaksi/cetakTransaksi/' . $field->ID_Transaksi) . "' class='btn btn-success btn-icon'><i class='fa fa-print'></i></a>";
            $no++;
            $row = array();

            $row[] = $no;
            $row[] = $field->Nomor_Invoice;
            $row[] = $is_paid;
            $row[] = $field->Created_Date;
            $row[] = $is_paid2;

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



    public function cariDetailBarang($barcode_id)
    {
        $query = $this->db->get_where('product', ['barcode_id' => $barcode_id])->row();
        echo json_encode($query);
    }

    function auth()
    {
        $role = $this->session->userdata('role');
        if ($role == "2") {
            return true;
        } else {
            return false;
        }
    }
}
