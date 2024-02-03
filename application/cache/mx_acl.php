<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * This is the cached access control list 
 * 
 * save this file as {cache_path}/mx_acl.php
 */
return array(
    'applications/add'       => array(                                 // the "module/controller/method" to protect
        'allowed'            => array(1,2,3,4,5),                      // the allowed user role_id array
        'ipl'                => array('*.*.*.*'),                      // the allowed IP range array
        'error_uri'          => site_url('admin/applications/error'),  // the url to redirect to on failure
        'error_msg'          => 'You do not have permission to access this page!',
    ),
	'applications/edit'      => array(
        'allowed'            => array(1,2,3,4,5),
        'ipl'                => array('*.*.*.*'),
        'error_uri'          => site_url('admin/applications/error'),
        'error_msg'          => 'You do not have permission to update this page!',
    ),
	'applications/delete'    => array(
        'allowed'            => array(1),
        'ipl'                => array('*.*.*.*'),
        'error_uri'          => site_url('admin/applications/error'),
        'error_msg'          => 'You do not have permission to delete this page!',
    ),
	'sources/add'            => array(
        'allowed'            => array(1,2,4),
        'ipl'                => array('*.*.*.*'),
        'error_uri'          => site_url('admin/sources/error'),
        'error_msg'          => 'You do not have permission to access this page!',
    ),
	'sources/edit'           => array(
        'allowed'            => array(1,2,4),
        'ipl'                => array('*.*.*.*'),
        'error_uri'          => site_url('admin/sources/error'),
        'error_msg'          => 'You do not have permission to update this page!',
    ),
	'sources/delete'         => array(
        'allowed'            => array(1),
        'ipl'                => array('*.*.*.*'),
        'error_uri'          => site_url('admin/sources/error'),
        'error_msg'          => 'You do not have permission to delete this page!',
    ),
	'export/to_excel'         => array(
        'allowed'            => array(1,2,4,5),
        'ipl'                => array('*.*.*.*'),
        'error_uri'          => site_url('admin/export/error'),
        'error_msg'          => 'You do not have permission to access this page!',
    ),
	'export/send_to_bca'         => array(
        'allowed'            => array(1,2,4),
        'ipl'                => array('*.*.*.*'),
        'error_uri'          => site_url('admin/export/error'),
        'error_msg'          => 'You do not have permission to access this page!',
    ),
	'export/rekap'         => array(
        'allowed'            => array(1,2,4),
        'ipl'                => array('*.*.*.*'),
        'error_uri'          => site_url('admin/export/error'),
        'error_msg'          => 'You do not have permission to access this page!',
    ),
);