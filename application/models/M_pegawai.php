<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pegawai extends CI_Model {

	function get_pegawai($id = null)
    {
        $this->db->select('*');
        $this->db->from('pegawai');
        if ($id != null) {
            $this->db->where('pegawai_id', $id);
        }
        $this->db->where('status', 1);
        if ($this->session->userdata('jabatan') != -1) {
            $this->db->where('jabatan !=' , -1);
        }
        // $this->db->where('jabatan !=', -1);
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
            "create_on"         => date('Y-m-d'),
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


    function get_profile($email)
    {
        $this->db->select('*');
        $this->db->from('pegawai');
        $this->db->where('email', $email);
        $query = $this->db->get();
        return $query->row_array();
    }

    function proses_edit_profile()
    {
        $nama_pegawai      = $this->input->post('nama_pegawai');
        $no_telp           = $this->input->post('no_telp');
        $email             = $this->input->post('email');
        if ($this->input->post('password') != null) {
            $password      = MD5($this->input->post('password'));
            $this->db->set('password',$password);
        }
        $id = $this->session->userdata('email');
        $this->db->set('nama_pegawai',$nama_pegawai);
        $this->db->set('no_telp',$no_telp);
        $this->db->set('email',$email);
        $this->db->where('email', $id);
        $this->db->update('pegawai');
        // var_dump($nama_pegawai);
        // var_dump($no_telp);
        // var_dump($email);
        // var_dump($password);
    }

}

/* End of file M_pegawai.php */
/* Location: ./application/models/M_pegawai.php */