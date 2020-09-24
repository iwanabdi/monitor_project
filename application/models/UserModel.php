<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

	public function login_pegawai($post)
	{
        $this->db->select('*');
        $this->db->from('pegawai');
        $this->db->where('email', $post['email']);
        $this->db->where('password', MD5($post['password']));
        $result = $this->db->get();
		return $result;
    }

    public function login_mitra($post)
    {
    	$this->db->select('*');
    	$this->db->from('mitra');
    	$this->db->where('email', $post['email']);
    	$this->db->where('password', MD5($post['password']));
    	$result = $this->db->get();
    	return $result;
    }

    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('pegawai');
        if ($id != null) {
            $this->db->where('pegawai_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

}

/* End of file UserModel.php */
/* Location: ./application/models/UserModel.php */