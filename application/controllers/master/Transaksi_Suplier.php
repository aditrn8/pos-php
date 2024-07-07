<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi_Suplier extends MY_Controller
{
   function __construct()
   {
      parent::__construct();
      $this->load->helper(array('form', 'url', 'html', 'file'));
      $this->load->library(array('template', 'form_validation', 'unit_test'));
      $this->load->model('master/Transaksi_Suplier_model', 'sm');
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
         'title' => 'Master Transaksi Suplier'
      ];
      $this->template->load('template', 'master/transaksi_suplier/index', $data);
   }

   public function tambahTransaksi_Suplier()
   {
      if ($this->auth() == false) {
         redirect('');
      }
      $this->validationTransaksi_Suplier();
      if ($this->form_validation->run() == FALSE) {
         $data = [
            'title' => 'Menu Tambah Transaksi Suplier'
         ];

         $this->template->load('template', 'master/Transaksi_suplier/add', $data);
      } else {
         if ($this->duplicate_entry() == 0) {
            $name           = trim(htmlspecialchars($this->input->post('name')));
            $name_company   = trim(htmlspecialchars($this->input->post('name_company')));
            $jenis_supplier   = trim(htmlspecialchars($this->input->post('jenis_supplier')));
            $address        = trim(htmlspecialchars($this->input->post('address')));
            $city           = trim(htmlspecialchars($this->input->post('city')));
            $province       = trim(htmlspecialchars($this->input->post('province')));
            $phone_number   = trim(htmlspecialchars($this->input->post('phone_number')));

            $dataInsert = [
               'name'          => $name,
               'name_company'  => $name_company,
               'jenis_supplier' => $jenis_supplier,
               'address'       => $address,
               'city'          => $city,
               'province'      => $province,
               'phone_number'  => $phone_number,
               'created_by'    => $this->userId
            ];

            $this->sm->insert('Transaksi_supliers', $dataInsert);

            $this->session->set_flashdata('msg', 'Berhasil menambahkan Transaksi_suplier!');
            redirect('master/Transaksi_suplier');
         } else {
            $this->session->set_flashdata('msg', 'Nama Transaksi_suplier sudah terdaftar di sistem! Tidak boleh sama!');
            redirect('master/Transaksi_suplier/tambahTransaksi_Suplier');
         }
      }
   }

   public function editTransaksi_Suplier($id)
   {
      if ($this->auth() == false) {
         redirect('');
      }
      $this->validationTransaksi_Suplier();
      if ($this->form_validation->run() == FALSE) {
         $data = [
            'title'        => 'Menu Edit Transaksi_Suplier',
            'id'           => $id,
            'rowTransaksi_Suplier'   => $this->sm->getData('Transaksi_supliers', ['id' => $id])->row()
         ];

         $this->template->load('template', 'master/Transaksi_suplier/edit', $data);
      } else {
         if ($this->duplicate_entry() == 0) {
            $name     = trim(htmlspecialchars($this->input->post('name')));
            $name_company   = trim(htmlspecialchars($this->input->post('name_company')));
            $jenis_supplier   = trim(htmlspecialchars($this->input->post('jenis_supplier')));
            $address  = trim(htmlspecialchars($this->input->post('address')));
            $city     = trim(htmlspecialchars($this->input->post('city')));
            $province = trim(htmlspecialchars($this->input->post('province')));
            $phone_number = trim(htmlspecialchars($this->input->post('phone_number')));

            $dataUpdate = [
               'name'          => $name,
               'name_company'  => $name_company,
               'jenis_supplier' => $jenis_supplier,
               'address'       => $address,
               'city'          => $city,
               'province'      => $province,
               'phone_number'      => $phone_number,
               'updated_by'    => $this->userId,
               'updated_at'    => $this->dateNow
            ];

            $this->sm->update('Transaksi_supliers', $dataUpdate, ['id' => $id]);

            $this->session->set_flashdata('msg', 'Berhasil update Transaksi_suplier!');
            redirect('master/Transaksi_suplier');
         } else {
            $this->session->set_flashdata('msg', 'Nama Transaksi_suplier sudah terdaftar di sistem! Tidak boleh sama!');
            redirect('master/Transaksi_suplier/editTransaksi_Suplier/' . $id);
         }
      }
   }

   public function hapusTransaksi_suplier($id)
   {
      if ($this->auth() == false) {
         redirect('');
      }
      $dataUpdate = [
         'is_deleted'    => 1,
         'deleted_by'    => $this->userId,
         'deleted_at'    => $this->dateNow
      ];

      $this->sm->update('Transaksi_supliers', $dataUpdate, ['id' => $id]);
      $this->session->set_flashdata('msg', 'Berhasil menghapus Transaksi_suplier!');
      redirect('master/Transaksi_suplier');
   }


   function getDataTransaksi_Suplier()
   {
      if ($this->auth() == false) {
         redirect('');
      }
      $list = $this->sm->dataTransaksi_Suplier();
      $data = array();
      $no   = $_POST['start'];
      foreach ($list as $field) {
         $no++;
         $row = array();
         $row[] = $no;
         $row[] = $field->name_company;
         $row[] = $field->name;
         $row[] = $field->jenis_supplier;
         $row[] = $field->phone_number;
         $row[] = $field->address;
         // $row[] = $field->city;
         // $row[] = $field->province;
         $row[] = "<a href='" . site_url('master/Transaksi_suplier/hapusTransaksi_Suplier/' . $field->id) . "' onclick='return confirm(`Yakin ingin hapus Transaksi_suplier?`)' class='btn btn-danger btn-icon'><i class='fa fa-trash'></i></a> <a href='" . site_url('master/Transaksi_suplier/editTransaksi_Suplier/' . $field->id) . "' class='btn btn-warning btn-icon'><i class='fa fa-pen'></i></a>";

         $data[] = $row;
      }
      $output = array(
         "draw"         => $_POST['draw'],
         "recordsTotal" => $this->sm->countDataTransaksi_Suplier(),
         "recordsFiltered" => $this->sm->countDataTransaksi_Suplier(),
         "data" => $data,
      );
      echo json_encode($output);
   }

   private function duplicate_entry()
   {
      $id             = $this->input->post('id');
      $nama           = trim(htmlspecialchars($this->input->post('name')));
      $where          = "(name = '$nama' AND is_deleted = 0 AND id != '$id')";
      $query          = $this->sm->getData('Transaksi_supliers', $where);

      if ($query->num_rows() > 0) {
         return '1';
      } else {
         return '0';
      }
   }

   private function validationTransaksi_Suplier()
   {
      $this->form_validation->set_rules('name', 'Nama', 'trim|required', [
         'required' => 'Nama wajib diisi!'
      ]);
      $this->form_validation->set_rules('name_company', 'Nama Perusahaan', 'trim|required', [
         'required' => 'Nama Perusahaan wajib diisi!'
      ]);
      $this->form_validation->set_rules('jenis_supplier', 'Jenis Supplier', 'trim|required', [
         'required' => 'Jenis Supplier wajib diisi!'
      ]);
      $this->form_validation->set_rules('address', 'Alamat', 'trim|required', [
         'required' => 'Alamat wajib diisi!'
      ]);
      // $this->form_validation->set_rules('city', 'Kota', 'trim|required', [
      //     'required' => 'Kota wajib diisi!'
      // ]);
      // $this->form_validation->set_rules('province', 'Provinsi', 'trim|required', [
      //     'required' => 'Provinsi wajib diisi!'
      // ]);
      $this->form_validation->set_rules('phone_number', 'Nomor Telepon', 'trim|required', [
         'required' => 'Nomor Telepon wajib diisi!'
      ]);
   }

   function auth()
   {
      $role = $this->session->userdata('role');
      if ($role == "1") {
         return true;
      } else {
         return false;
      }
   }
}
