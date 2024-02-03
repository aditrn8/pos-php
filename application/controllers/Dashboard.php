<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
    private $limit = 20;

    function __construct()
    {
        parent::__construct();
        //load library dan helper yg dibutuhkan
        $this->load->library('template');
        $this->load->helper(array('url', 'html', 'form'));
    }


    function index()
    {
        $this->template->set('title', 'Dashboard');
        $this->template->load('template', 'dashboard');
    }
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
