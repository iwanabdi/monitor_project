<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mitra extends CI_Model {

	function get_mitra($id = null)
	{
		$this->db->select('*');
		$this->db->from('mitra');
		if ($id != null) {
			$this->db->where('mitra_id', $id);
		}
		$this->db->where('status', 1);
		$query = $this->db->get();
		return $query;
	}

	function proses_add_data()
    {
    	$data = [
    		"nama_mitra" 		=> $this->input->post('nama_mitra'),
    		"alamat"			=> $this->input->post('alamat'),
    		"kota"				=> $this->input->post('kota'),
    		"no_telp"			=> $this->input->post('no_telp'),
    		"fax"				=> $this->input->post('fax'),
    		"email"				=> $this->input->post('email'),
    		"password"			=> MD5($this->input->post('password')),
    		"npwp"				=> $this->input->post('npwp'),
    		"create_by"			=> $this->session->userdata('pegawai_id'),
    		"status"			=> 1
    	];
    	$this->db->insert('mitra', $data);
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
	    		"nama_mitra" 		=> $this->input->post('nama_mitra'),
	    		"alamat"			=> $this->input->post('alamat'),
	    		"kota"				=> $this->input->post('kota'),
	    		"no_telp"			=> $this->input->post('no_telp'),
	    		"fax"				=> $this->input->post('fax'),
	    		"email"				=> $this->input->post('email'),
	    		"npwp"				=> $this->input->post('npwp'),
	    		"update_by"			=> $this->session->userdata('pegawai_id'),
    		];
    	}else{
    		$data = [
	    		"nama_mitra" 		=> $this->input->post('nama_mitra'),
	    		"alamat"			=> $this->input->post('alamat'),
	    		"kota"				=> $this->input->post('kota'),
	    		"no_telp"			=> $this->input->post('no_telp'),
	    		"fax"				=> $this->input->post('fax'),
	    		"email"				=> $this->input->post('email'),
	    		"password"			=> MD5($this->input->post('password')),
	    		"npwp"				=> $this->input->post('npwp'),
	    		"update_by" 		=> $this->session->userdata('pegawai_id')
	    	];
    	}
    	$id = $this->input->post('id', true);
		$this->db->where('mitra_id', $id);
		$this->db->update('mitra', $data);
    }

    function hapus_data()
    {
    	$data = [
    		"delete_by"		=> $this->session->userdata('pegawai_id'),
    		"delete_on"		=> date('Y-m-d'),
    		"status"		=> 0
    	];
    	$id = $this->input->post('id', true);
    	$this->db->where('mitra_id', $id);
    	$this->db->update('mitra', $data);
    }

}

/* End of file M_mitra.php */
/* Location: ./application/models/M_mitra.php */