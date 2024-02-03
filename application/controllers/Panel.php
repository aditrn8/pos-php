<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Panel extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));
		$this->load->library(array('auth', 'template'));
	}

	public function index()
	{
		if ($this->auth->is_logged_in() == false) {
			$this->login();
		} else {
			redirect('');
		}
	}

	public function login()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Login Form';
			$this->load->view('login', $data);
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$success = $this->auth->_do_login($username, $password);
			if ($success) {
				//insert user activity to database
				$log = array(
					'username' => $this->session->userdata('username'),
					'message' => 'login sukses',
					'action'  => 'login',
					'from_url' => 'http://' . $_SERVER['HTTP_HOST'], //.$_SERVER['PHP_SELF'],
					'from_ip' => $_SERVER["REMOTE_ADDR"]
				);
				$this->db->insert('user_logs', $log);

				// redirect to home
				redirect('');
			} else {
				$data['title'] = 'Login Form';
				$data['login_info'] = "Wrong username or password..!";

				//insert user activity to database
				$log = array(
					'username' => $username,
					'message' => 'login gagal',
					'action'  => 'login',
					'from_url' => 'http://' . $_SERVER['HTTP_HOST'], //.$_SERVER['PHP_SELF'],
					'from_ip' => $_SERVER["REMOTE_ADDR"]
				);
				$this->db->insert('user_logs', $log);

				//Load View
				$this->load->view('login', $data);
			}
		}
	}

	function logout()
	{
		if ($this->auth->is_logged_in() == true) {
			// jika dia memang sudah login, destroy session
			$this->auth->do_logout();

			//insert user activity to database
			$log = array(
				'username' => $this->session->userdata('username'),
				'message' => 'logout sukses',
				'action'  => 'logout',
				'from_url' => 'http://' . $_SERVER['HTTP_HOST'], //.$_SERVER['PHP_SELF'],
				'from_ip' => $_SERVER["REMOTE_ADDR"]
			);
			$this->db->insert('user_logs', $log);
		}
		// larikan ke halaman utama
		redirect('');
	}
}
