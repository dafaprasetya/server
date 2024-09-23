<?php 
    class UserModel extends CI_Model 
    {
        
        const SESSION_KEY = 'user_id';
        public function __construct()
        {
            $this->load->database();
            parent::__construct();
        }

        public function user_register($data){
            $this->db->insert('users', $data);
        }

        public function user_login($email, $password) {
            $query = $this->db->get_where('users', array('email'=>$email));
            if ($query->num_rows() > 0) {
                $data_user = $query->row();
                if (password_verify($password, $data_user->password)) {

                    $this->session->set_userdata('username', $username);
                    $this->session->set_userdata('nama_lengkap', $data_user->nama_lengkap);
                    $this->session->set_userdata('is_login', TRUE);
                    return TRUE;
                }else {
                    return FALSE;
                }
            }else{
                return FALSE;
            }
        }
        public function cek_login()
        {
            if (empty($this->session->userdata('is_login'))) {
                redirect('login');
            }
        }
        public function user_logout()
        {
            $this->session->session_destroy();
        }
    }
?>