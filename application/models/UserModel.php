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
            if($this->db->affected_rows() > 0){
                return $this->db->insert_id();
            }else {
                return false;
            }
        }

        public function user_login($email, $password) {
            $query = $this->db->get_where('users', array('email'=>$email));
            if ($query->num_rows() > 0) {
                $data_user = $query->row();
                if (password_verify($password, $data_user->password)) {

                    $this->session->set_userdata('username', $email);
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