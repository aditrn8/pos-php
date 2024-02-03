<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Auth library
 */

class Auth
{
	var $CI = NULL;

	function __construct()
	{
		// get CI's object
		$this->CI = &get_instance();
		$this->CI->load->helper('cookie');
		$this->CI->load->library('session');
		$this->CI->load->database();
		//$this->db_users = $this->CI->load->database('users', TRUE);
	}

	function _do_login($username, $password)
	{
		$this->CI->db->from('users');
		$this->CI->db->where('username', $username);
		$this->CI->db->where('password=MD5("' . $password . '")', '', false);
		$this->CI->db->where('status', 'ACTIVE');
		$result = $this->CI->db->get();
		if ($result->num_rows() == 0) {
			// username dan password tsb tidak ada 
			return false;
		} else {
			// ada, maka ambil informasi dari database
			$userdata = $result->row();
			$session_data = array(
				'user_id'	=> $userdata->id,
				'username'	=> $userdata->username,
				'name'	=> $userdata->name,
				'role'	=> $userdata->role,
				'phone'	=> $userdata->phone,
			);
			// buat session
			$this->CI->session->set_userdata($session_data);
			return true;
		}
	}

	// untuk mengecek apakah user sudah login/belum
	function is_logged_in()
	{
		if ($this->CI->session->userdata('username') == '') {
			return false;
		}
		return true;
	}

	// untuk logout
	function do_logout()
	{
		$this->CI->session->sess_destroy();
	}
}
