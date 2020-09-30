<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_product extends CI_Model {

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
    		"status"			=> 1
    	];
    	$this->db->insert('product', $data);
    }

   //  function ambil_id_pegawai($id)
   //  {
   //  	return $this->db->get_where('pegawai', ['id' => $id))
			// ->row_array();
   //  }

    function proses_edit_data()
    {
    	if ($this->input->post('password') == null) {
    		$data = [
	    		"nama_product" 		=> $this->input->post('nama_product'),
	    		"bandwith"			=> $this->input->post('bandwith'),
	    		"opsi"				=> $this->input->post('opsi'),
	    		"update_by"			=> $this->session->userdata('pegawai_id'),
    		];
    	}else{
    		$data = [
	    		"nama_product" 		=> $this->input->post('nama_product'),
	    		"bandwith"			=> $this->input->post('bandwith'),
	    		"opsi"				=> $this->input->post('opsi'),
	    		"update_by" 		=> $this->session->userdata('pegawai_id')
	    	];
    	}
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
