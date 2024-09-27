<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
    public function __construct() {
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->model('StorageModel');
		$this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('auth_helper');
        cek_login();
    }
	
	public function index()
	{
		$this->load->view('welcome_message');
	}
    
}

