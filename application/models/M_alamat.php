<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_alamat extends CI_Model {

	function get_alamat($id = null)
	{
		$this->db->select('*');
		$this->db->from('alamat as a');
		$this->db->join('customer as c','a.customer_id=c.customer_id',"LEFT");
		if ($id != null) {
			$this->db->where('a.customer', $id);
		}
		$this->db->where('a.status', 1);
		$query = $this->db->get();
		return $query;
	}

	function proses_add_data()
    {
    	$data = [
    		"jalan" 		=> $this->input->post('jalan'),
    		"kota"			=> $this->input->post('kota'),
    		"provinsi"		=> $this->input->post('provinsi'),
    		"negara"		=> 'Indonesia',
    		"koordinat"		=> $this->input->post('koordinat'),
    		"type"			=> $this->input->post('type'),
    		"kontak"		=> $this->input->post('kontak'),
    		"no_telp"		=> $this->input->post('no_telp'),
    		"create_by"		=> $this->session->userdata('pegawai_id'),
    		"status"		=> 1,
			"customer_id"   => $this->input->post('customer_id'),
			"create_on"   		=> date("Y-m-d")
    	];
    	$this->db->insert('alamat', $data);
    }

    function proses_edit_data()
    {
    	
    		$data = [
	    		"jalan" 		=> $this->input->post('jalan'),
	    		"kota"			=> $this->input->post('kota'),
	    		"provinsi"		=> $this->input->post('provinsi'),
	    		"koordinat"		=> $this->input->post('koordinat'),
	    		"type"			=> $this->input->post('type'),
	    		"kontak"		=> $this->input->post('kontak'),
	    		"no_telp"		=> $this->input->post('no_telp'),
				"update_by" 	=> $this->session->userdata('pegawai_id'),
				"customer_id"   => $this->input->post('customer_id2'),
				"update_on"   	=> date("Y-m-d")
	    	];
    	
    	$id = $this->input->post('id', true);
		$this->db->where('alamat_id', $id);
		$this->db->update('alamat', $data);
    }

    function hapus_data()
    {
    	$data = [
    		"delete_by"		=> $this->session->userdata('pegawai_id'),
    		"delete_on"		=> date('Y-m-d'),
    		"status"		=> 0
    	];
    	$id = $this->input->post('id', true);
    	$this->db->where('alamat_id', $id);
    	$this->db->update('alamat', $data);
    }

}

/* End of file M_alamat.php */
/* Location: ./application/models/M_alamat.php */
