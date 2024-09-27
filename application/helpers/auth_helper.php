<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('cek_login')) {
    function cek_login() {
        $CI =& get_instance();  

        if (!$CI->session->userdata('sedang_login')) {

            redirect('auth');
        }
    }
}