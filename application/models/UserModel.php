<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserModel extends CI_Model {
    
    public function get($username){
        $this->db->where('Email', $username); // Untuk menambahkan Where Clause : username='$username'
        $result = $this->db->get('pegawai')->row(); // Untuk mengeksekusi dan mengambil data hasil query

        return $result;
    }
}
