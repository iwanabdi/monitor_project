<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_project extends CI_Model {

	function get_product($id = null)
	{
		$this->db->select('*');
		$this->db->from('product');
		if ($id != null) {
			$this->db->where('product_id', $id);
		}
		$this->db->where('status', 1);
		$query = $this->db->get();
		return $query;
	}

	function proses_add_data()
    {
    	$data = [
    		"nama_product" 		=> $this->input->post('nama_product'),
    		"bandwith"			=> $this->input->post('bandwith'),
			"create_by"			=> $this->session->userdata('pegawai_id'),
			"satuan"			=>  $this->input->post('satuan'),
			"create_on"			=> date('Y-m-d'),
    		"status"			=> 1
    	];
    	$this->db->insert('product', $data);
    }

    function proses_edit_data()
    {
			$data = [
	    		"nama_product" 		=> $this->input->post('nama_product'),
				"bandwith"			=> $this->input->post('bandwith'),
				"satuan"			=>  $this->input->post('satuan'),
				"update_by" 		=> $this->session->userdata('pegawai_id'),
				"update_on"			=> date('Y-m-d')
	    	];
    	
    	$id = $this->input->post('id', true);
		$this->db->where('product_id', $id);
		$this->db->update('product', $data);
    }

    function hapus_data()
    {
    	$data = [
    		"delete_by"		=> $this->session->userdata('pegawai_id'),
    		"delete_on"		=> date('Y-m-d'),
    		"status"		=> 0
    	];
    	$id = $this->input->post('id', true);
    	$this->db->where('product_id', $id);
    	$this->db->update('product', $data);
    }

}

/* End of file M_product.php */
/* Location: ./application/models/M_product.php */
