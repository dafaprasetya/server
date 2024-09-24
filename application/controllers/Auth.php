<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

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
		$this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
    }
	
	public function index()
	{
		$this->load->view('login');
	}
    public function login_user(){
		if ($this->session->userdata('is_login')) {
			redirect('home');
		}
		$this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', 'error data:');
            $this->load->view('login');
		} else {
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			if ($this->UserModel->user_login($email, $password)) {
				redirect('home');
			}else{
				$this->session->set_flashdata('error', 'Email / Password Salah');
				redirect('auth');
			}
		}
    }
	public function register() {
		$this->load->view('register');
	}
	public function register_user() {
		if ($this->session->userdata('is_login')) {
			redirect('home');
		}
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|matches[password]');
		if ($this->form_validation->run() == FALSE) {
            $this->load->view('register');
        } else {
			$data = array(
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT)
			);
			$user_id = $this->UserModel->user_register($data);
			if ($user_id) {
				$folder = './strg/'.$user_id;
				if(!is_dir($folder)){
					mkdir($folder, 0777, true);
				}
				$this->session->set_flashdata('success', 'Berhasil!, Akun Telah Berhasil Dibuat dengan penyimpanan 16GB!');
				redirect('login');
			}else{
				$this->session->set_flashdata('Error', 'Gagal, Silahkan Coba lagi');
				redirect('auth/register');
			}
		}
	}
}

