<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Produk extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'html', 'file'));
        $this->load->library(array('template', 'form_validation', 'unit_test'));
        $this->load->model('master/Produk_model', 'pm');
        date_default_timezone_set('Asia/Jakarta');

        $this->name     = $this->session->userdata('name');
        $this->dateNow  = date('Y-m-d H:i:s');
    }

    public function index()
    {
        $data = [
            'title' => 'Master Produk'
        ];
        $this->template->load('template', 'master/produk/index', $data);
    }

    public function tambahProduk()
    {
        $this->validationProduk();
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'title' => 'Menu Tambah Produk'
            ];

            $this->template->load('template', 'master/produk/add', $data);
        } else {
            if ($this->duplicate_entry() == 0) {
                $namaProduk     = trim(htmlspecialchars($this->input->post('product_name')));
                $hargaProduk    = trim(htmlspecialchars($this->input->post('price')));
                $stokProduk     = trim(htmlspecialchars($this->input->post('stock')));

                $dataInsert = [
                    'product_name'      => $namaProduk,
                    'price'             => $hargaProduk,
                    'stock'             => $stokProduk,
                    'created_by'        => $this->name
                ];

                $this->pm->insert('product', $dataInsert);

                $this->session->set_flashdata('msg', 'Berhasil menambahkan produk!');
                redirect('master/produk');
            } else {
                $this->session->set_flashdata('msg', 'Nama produk sudah terdaftar di sistem! Tidak boleh sama!');
                redirect('master/produk/tambahProduk');
            }
        }
    }

    public function editProduk($id)
    {
        $this->validationProduk();
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'title'        => 'Menu Edit Produk',
                'id'           => $id,
                'rowProduct'   => $this->pm->getData('product', ['id' => $id])->row()
            ];

            $this->template->load('template', 'master/produk/edit', $data);
        } else {
            if ($this->duplicate_entry() == 0) {
                $namaProduk     = trim(htmlspecialchars($this->input->post('product_name')));
                $hargaProduk    = trim(htmlspecialchars($this->input->post('price')));
                $stokProduk     = trim(htmlspecialchars($this->input->post('stock')));

                $dataUpdate = [
                    'product_name'      => $namaProduk,
                    'price'             => $hargaProduk,
                    'stock'             => $stokProduk,
                    'updated_by'        => $this->name,
                    'updated_at'        => $this->dateNow
                ];

                $this->pm->update('product', $dataUpdate, ['id' => $id]);

                $this->session->set_flashdata('msg', 'Berhasil update produk!');
                redirect('master/produk');
            } else {
                $this->session->set_flashdata('msg', 'Nama produk sudah terdaftar di sistem! Tidak boleh sama!');
                redirect('master/produk/editProduk/' . $id);
            }
        }
    }

    public function hapusProduk($id)
    {
        $dataUpdate = [
            'is_deleted'    => 1,
            'deleted_by'    => $this->name,
            'deleted_at'    => $this->dateNow
        ];

        $this->pm->update('product', $dataUpdate, ['id' => $id]);
        // $this->pm->delete('product', ['id' => $id]);
        $this->session->set_flashdata('msg', 'Berhasil menghapus produk!');
        redirect('master/produk');
    }


    function getDataProduk()
    {
        $list = $this->pm->dataProduk();
        $data = array();
        $no   = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->product_name;
            $row[] = "Rp. " . number_format($field->price, 0, '.', '.');
            $row[] = $field->stock;
            $row[] = "<a href='" . site_url('master/produk/hapusProduk/' . $field->id) . "' onclick='return confirm(`Yakin ingin hapus produk?`)' class='btn btn-danger btn-icon'><i class='fa fa-trash'></i></a> <a href='" . site_url('master/produk/editProduk/' . $field->id) . "' class='btn btn-warning btn-icon'><i class='fa fa-pen'></i></a>";

            $data[] = $row;
        }
        $output = array(
            "draw"         => $_POST['draw'],
            "recordsTotal" => $this->pm->countDataProduk(),
            "recordsFiltered" => $this->pm->countDataProduk(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function export_shifting()
    {
        $f_date1 = $this->input->post('f_date1');
        $f_date2 = $this->input->post('f_date2');
        $f_selectBy = $this->input->post('f_selectBy');
        if ($f_selectBy == 'd') {
            $f_divisi = $this->input->post('f_divisi');
            $f_tipe = "";
        } else {
            $f_divisi = "";
            $f_tipe = $this->input->post('f_tipe');
        }
        $f_status = $this->input->post('f_status');

        $f_date1_ = new DateTime($f_date1);
        $f_date2_ = new DateTime($f_date2);
        $interval = $f_date1_->diff($f_date2_);

        if ($f_date1 == "" && $f_date2 == "" && $f_divisi == "" && $f_tipe == "" && $f_status == "") {
            $this->session->set_flashdata('msg', 'Mohon isi start_date, end_date, divisi atau name/tipe dan status terlebih dahulu!!!');
            redirect('Shifting/report_shifting');
        }

        // if ($interval->days >= 31) {
        //     $this->session->set_flashdata('msg', 'Maximal Penarikan Data adalah 1 Bulan / 31 Hari !!!');
        //     redirect('Shifting/report_shifting');
        // } else {
        if ($f_date1 == TRUE && $f_date2 == TRUE && $f_divisi == TRUE && $f_status == TRUE) {
            $get = $this->sm->export_shifting($f_date1, $f_date2, $f_divisi, $f_status);

            if ($get->num_rows() > 0) {
                if ($f_status == "Approved") {
                    $data['status_shifting'] = "DATA SHIFTING APPROVED";
                } else {
                    $data['status_shifting'] = "DATA SHIFTING REJECT";
                }
                $data['data_query'] = $get->result_array();
                $this->load->view('shifting/export_data', $data);
            } else {
                $this->session->set_flashdata('msg', 'Data Tidak Ada!!!');
                redirect('Shifting/report_shifting');
            }
        }

        if ($f_date1 == TRUE && $f_date2 == TRUE && $f_tipe == TRUE && $f_status == TRUE) {
            if ($f_tipe == "All") {
                $get = $this->sm->export_all_shifting($f_date1, $f_date2, $f_status);

                if ($get->num_rows() > 0) {
                    if ($f_status == "Approved") {
                        $data['status_shifting'] = "DATA SHIFTING APPROVED";
                    } else {
                        $data['status_shifting'] = "DATA SHIFTING REJECT";
                    }
                    $data['data_query'] = $get->result_array();
                    $this->load->view('shifting/export_data', $data);
                } else {
                    $this->session->set_flashdata('msg', 'Data Tidak Ada!!!');
                    redirect('showing_data');
                }
            } else {
                $get = $this->sm->export_name_shifting($f_date1, $f_date2, $f_tipe, $f_status);

                if ($get->num_rows() > 0) {
                    if ($f_status == "Approved") {
                        $data['status_shifting'] = "DATA SHIFTING APPROVED";
                    } else {
                        $data['status_shifting'] = "DATA SHIFTING REJECT";
                    }
                    $data['data_query'] = $get->result_array();
                    $this->load->view('shifting/export_data', $data);
                } else {
                    $this->session->set_flashdata('msg', 'Data Tidak Ada!!!');
                    redirect('showing_data');
                }
            }
        }
        // }
    }

    private function duplicate_entry()
    {
        $id             = $this->input->post('id');
        $namaProduk     = trim(htmlspecialchars($this->input->post('product_name')));
        $where          = "(product_name = '$namaProduk' AND id != '$id')";
        $query          = $this->pm->getData('product', $where);

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
}
