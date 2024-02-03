<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// Maximum number of segments that Ar-acl should check
$config['segment_max']    = 2;

// variable session role id
$config['sess_role_var'] = "position";

// default role: this role will applied if there is no role found
$config['default_role'] = "User";

// Page that need to be controlled
$config['page_control'] = array(
    // 'sales/add/'           => array(                               // the "module/controller/method" to protect
    //     'allowed'           => array('1'),                         // the allowed user role_id array
    //     'error_uri'         => '/access_denied',                      // the url to redirect to on failure
    //     'error_msg'         => 'You do not have permission to access this page!',
    // ),
    // 'sales/edit/'           => array(
    //     'allowed'           => array('1'),
    //     'error_uri'         => '/access_denied',
    //     'error_msg'         => 'You do not have permission to access this page!',
    // ),
    // 'customer/add/'           => array(
    //     'allowed'           => array('SPG', 'SPB', 'ASM'),
    //     'error_uri'         => '/customer',
    //     'error_msg'         => 'You do not have permission to access this page!',
    // ),
);
