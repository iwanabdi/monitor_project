<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

	public function login_pegawai($post)
	{
        $this->db->select('*');
        $this->db->from('pegawai');
        $this->db->where('email', $post['email']);
        $this->db->where('password', MD5($post['password']));
        // $this->db->where('status', 1);
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

    public function get_pegawai($id = null)
    {
        $this->db->select('*');
        $this->db->from('pegawai');
        if ($id != null) {
            $this->db->where('pegawai_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function get_customer($id = null)
    {
        $this->db->select('*');
        $this->db->from('customer');
        if ($id != null) {
            $this->db->where('customer_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function get_material($id = null)
    {
        $this->db->select('*');
        $this->db->from('material');
        if ($id != null) {
            $this->db->where('material_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_mitra($id = null)
    {
        $this->db->select('*');
        $this->db->from('mitra');
        if ($id != null) {
            $this->db->where('mitra_id', $id);
        }
        $query = $this->db->get();
        return $query;
	}
	public function get_alamat($id = null)
    {
        $this->db->select('*');
        $this->db->from('alamat');
        if ($id != null) {
            $this->db->where('alamat_id', $id);
        }
        $query = $this->db->get();
        return $query;
	}
	public function get_product($id = null)
    {
        $this->db->select('*');
        $this->db->from('product');
        if ($id != null) {
            $this->db->where('product_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

}

/* End of file UserModel.php */
/* Location: ./application/models/UserModel.php */
