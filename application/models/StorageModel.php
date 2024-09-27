<?php 
    class StorageModel extends CI_Model 
    {
        public function createStorage($data) {
            $this->db->insert('storage', $data);
            return true;
        }
    }