<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_alamat extends CI_Model {

	function get_alamat($id = null)
	{
		$this->db->select('*');
		$this->db->from('alamat');
		if ($id != null) {
			$this->db->where('alamat_id', $id);
		}
		$this->db->where('status', 1);
		$query = $this->db->get();
		return $query;
	}

	function proses_add_data()
    {
    	$data = [
    		"jalan" 		=> $this->input->post('jalan'),
    		"kota"			=> $this->input->post('kota'),
    		"provinsi"				=> $this->input->post('provinsi'),
    		"negara"			=> $this->input->post('negara'),
    		"koordinat"				=> $this->input->post('koordinat'),
    		"type"				=> $this->input->post('type'),
    		"kontak"			=> $this->input->post('kontak'),
    		"no_telp"				=> $this->input->post('no_telp'),
    		"create_by"			=> $this->session->userdata('pegawai_id'),
    		"status"			=> 1
    	];
    	$this->db->insert('alamat', $data);
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
	    		"jalan" 		=> $this->input->post('jalan'),
	    		"kota"			=> $this->input->post('kota'),
	    		"provinsi"				=> $this->input->post('provinsi'),
	    		"negara"			=> $this->input->post('negara'),
	    		"koordinat"				=> $this->input->post('koordinat'),
	    		"type"				=> $this->input->post('type'),
				"kontak"				=> $this->input->post('kontak'),
	    		"no_telp"			=> $this->input->post('no_telp'),
	    		"opsi"				=> $this->input->post('opsi'),
	    		"update_by"			=> $this->session->userdata('pegawai_id'),
    		];
    	}else{
    		$data = [
	    		"jalan" 		=> $this->input->post('jalan'),
	    		"kota"			=> $this->input->post('kota'),
	    		"provinsi"				=> $this->input->post('provinsi'),
	    		"negara"			=> $this->input->post('negara'),
	    		"koordinat"				=> $this->input->post('koordinat'),
	    		"type"				=> $this->input->post('type'),
	    		"kontak"			=> $this->input->post('kontak'),
	    		"no_telp"			=> $this->input->post('no_telp'),
	    		"opsi"				=> $this->input->post('opsi'),
	    		"update_by" 		=> $this->session->userdata('pegawai_id')
	    	];
    	}
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