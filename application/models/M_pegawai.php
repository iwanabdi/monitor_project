<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pegawai extends CI_Model {

	public function get_pegawai($id = null)
    {
        $this->db->select('*');
        $this->db->from('pegawai');
        if ($id != null) {
            $this->db->where('pegawai_id', $id);
        }
        $this->db->where('status', 1);
        $query = $this->db->get();
        return $query;
    }

    function proses_add_data()
    {
    	$data = [
    		"nama_pegawai" 		=> $this->input->post('nama_pegawai'),
    		"no_telp"			=> $this->input->post('no_telp'),
    		"email"				=> $this->input->post('email'),
    		"password"			=> MD5($this->input->post('password')),
    		"jabatan"			=> $this->input->post('jabatan'),
    		"create_by"			=> $this->session->userdata('pegawai_id'),
    		"status"			=> 1
    	];
    	$this->db->insert('pegawai', $data);
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
	    		"nama_pegawai" 		=> $this->input->post('nama_pegawai'),
	    		"no_telp" 			=> $this->input->post('no_telp'),
	    		"email" 			=> $this->input->post('email'),
	    		"jabatan" 			=> $this->input->post('jabatan'),
	    		"update_by" 		=> $this->session->userdata('pegawai_id')
    		];
    	}else{
    		$data = [
	    		"nama_pegawai" 		=> $this->input->post('nama_pegawai'),
	    		"no_telp" 			=> $this->input->post('no_telp'),
	    		"email" 			=> $this->input->post('email'),
	    		"password" 			=> MD5($this->input->post('password')),
	    		"jabatan" 			=> $this->input->post('jabatan'),
	    		"update_by" 		=> $this->session->userdata('pegawai_id')
	    	];
    	}
    	$id = $this->input->post('id', true);
		$this->db->where('pegawai_id', $id);
		$this->db->update('pegawai', $data);
    }

    function hapus_data()
    {
    	$data = [
    		"delete_by"		=> $this->session->userdata('pegawai_id'),
    		"delete_on"		=> date('Y-m-d'),
    		"status"		=> 0
    	];
    	$id = $this->input->post('id', true);
    	$this->db->where('pegawai_id', $id);
    	$this->db->update('pegawai', $data);
    }

}

/* End of file M_pegawai.php */
/* Location: ./application/models/M_pegawai.php */