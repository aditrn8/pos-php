<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function load_controller($controller) {
    require_once(APPPATH . 'controllers/' . $controller . '.php');
    return new $controller();
}