<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'html', 'file'));
        $this->load->library(array('template', 'form_validation', 'unit_test'));
        $this->load->model('master/User_model', 'um');
        date_default_timezone_set('Asia/Jakarta');

        $this->name     = $this->session->userdata('name');
        $this->userId   = $this->session->userdata('user_id');
        $this->dateNow  = date('Y-m-d H:i:s');
    }

    public function index()
    {
        $data = [
            'title' => 'Master User'
        ];
        $this->template->load('template', 'master/user/index', $data);
    }

    public function tambahUser()
    {
        $this->validationUser();
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'title'         => 'Menu Tambah User',
                'masterRole'    => $this->um->getData('master_role', 'role_id != 1')
            ];

            $this->template->load('template', 'master/user/add', $data);
        } else {
            if ($this->duplicate_entry() == 0) {
                $nama        = trim(htmlspecialchars($this->input->post('name')));
                $username    = trim(htmlspecialchars($this->input->post('username')));
                $password    = trim(htmlspecialchars($this->input->post('password')));
                $phone       = trim(htmlspecialchars($this->input->post('phone')));
                $role        = trim(htmlspecialchars($this->input->post('role')));

                $dataInsert = [
                    'name'              => $nama,
                    'username'          => $username,
                    'password'          => $password,
                    'phone'             => $phone,
                    'role'              => $role,
                    'created_by'        => $this->userId,
                    'status'            => 'ACTIVE'
                ];

                $this->um->insert('users', $dataInsert);

                $this->session->set_flashdata('msg', 'Berhasil menambahkan user!');
                redirect('master/user');
                // echo "tidak ada";
            } else {
                $this->session->set_flashdata('msg', 'Nama user sudah terdaftar di sistem! Tidak boleh sama!');
                redirect('master/user/tambahUser');
                // echo "ada";
            }
        }
    }

    public function editUser($id)
    {
        $this->validationUser();
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'title'        => 'Menu Edit User',
                'id'           => $id,
                'rowUser'      => $this->um->getData('users', ['id' => $id])->row(),
                'masterRole'   => $this->um->getData('master_role', 'role_id != 1')
            ];

            $this->template->load('template', 'master/user/edit', $data);
        } else {
            if ($this->duplicate_entry() == 0) {
                $nama        = trim(htmlspecialchars($this->input->post('name')));
                $username    = trim(htmlspecialchars($this->input->post('username')));
                $password    = trim(htmlspecialchars($this->input->post('password')));
                $phone       = trim(htmlspecialchars($this->input->post('phone')));
                $role        = trim(htmlspecialchars($this->input->post('role')));

                $dataUpdate = [
                    'name'              => $nama,
                    'username'          => $username,
                    'password'          => $password,
                    'phone'             => $phone,
                    'role'              => $role,
                    'updated_by'        => $this->userId,
                    'updated_at'        => $this->dateNow,
                ];


                $this->um->update('users', $dataUpdate, ['id' => $id]);

                $this->session->set_flashdata('msg', 'Berhasil update user!');
                redirect('master/user');
            } else {
                $this->session->set_flashdata('msg', 'Nama user sudah terdaftar di sistem! Tidak boleh sama!');
                redirect('master/user/editUser/' . $id);
            }
        }
    }

    public function hapusUser($id)
    {
        $dataUpdate = [
            'status'        => 'NON-ACTIVE',
            'updated_by'    => $this->userId,
            'updated_at'    => $this->dateNow
        ];

        $this->um->update('users', $dataUpdate, ['id' => $id]);
        $this->session->set_flashdata('msg', 'Berhasil menghapus User!');
        redirect('master/user');
    }


    function getDataUser()
    {
        $list = $this->um->dataUser();
        $data = array();
        $no   = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->name;
            $row[] = $field->username;
            $row[] = $field->role_description;
            $row[] = $field->phone;
            $row[] = "<a href='" . site_url('master/user/hapusUser/' . $field->id) . "' onclick='return confirm(`Yakin ingin hapus user?`)' class='btn btn-danger btn-icon'><i class='fa fa-trash'></i></a> <a href='" . site_url('master/user/editUser/' . $field->id) . "' class='btn btn-warning btn-icon'><i class='fa fa-pen'></i></a>";

            $data[] = $row;
        }
        $output = array(
            "draw"         => $_POST['draw'],
            "recordsTotal" => $this->um->countDataUser(),
            "recordsFiltered" => $this->um->countDataUser(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    private function duplicate_entry()
    {
        $id             = $this->input->post('id');
        $namaProduk     = trim(htmlspecialchars($this->input->post('name')));
        $where          = "(name = '$namaProduk' AND status = 'ACTIVE' AND role != 1 AND id != '$id')";
        $query          = $this->um->getData('users', $where);

        if ($query->num_rows() > 0) {
            return '1';
        } else {
            return '0';
        }
    }

    private function validationUser()
    {
        $this->form_validation->set_rules('name', 'Nama', 'trim|required', [
            'required' => 'Nama wajib diisi!'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'trim|required', [
            'required' => 'Username wajib diisi!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Password wajib diisi!'
        ]);
        $this->form_validation->set_rules('phone', 'No Telepon', 'trim|required|numeric', [
            'required' => 'No Telepon wajib diisi!',
            'numeric'  => 'Hanya di perbolehkan angka saja!'
        ]);
        $this->form_validation->set_rules('role', 'Role', 'required', [
            'required' => 'Role wajib diisi!'
        ]);
    }
}
