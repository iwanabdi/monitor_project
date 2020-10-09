<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_customer extends CI_Model {

	public function get_customer($id = null)
    {
        $this->db->select('*');
        $this->db->from('customer');
        if ($id != null) {
            $this->db->where('customer_id', $id);
        }
        $this->db->where('status', 1);
        $query = $this->db->get();
        return $query;
    }

    public function proses_add_data()
    {
    	$data = [
    		"nama_customer" 		=> $this->input->post('nama_customer'),
    		"phone"					=> $this->input->post('phone'),
    		"fax"					=> $this->input->post('fax'),
    		"alamat"				=> $this->input->post('alamat'),
    		"email"					=> $this->input->post('email'),
    		"npwp"					=> $this->input->post('npwp'),
			"create_by"				=> $this->session->userdata('pegawai_id'),
			"create_on"		        => date('Y-m-d'),
    		"status"				=> 1
    	];
		$this->db->insert('customer', $data);
		
    }

    public function proses_edit_data()
    {
    	if ($this->input->post('alamat') == null) {
    		$data = [
	    		"nama_customer"     => $this->input->post('nama_customer'),
    			"phone"             => $this->input->post('phone'),
    			"fax"               => $this->input->post('fax'),
    			"alamat"            => $this->input->post('alamat'),
    			"email"             => $this->input->post('email'),
    			"npwp"              => $this->input->post('npwp'),
				"update_by"         => $this->session->userdata('customer_id'),
				"update_on"         => date('Y-m-d')
    		];
    	}else{
    		$data = [
	    		"nama_customer" 		=> $this->input->post('nama_customer'),
    			"phone"					=> $this->input->post('phone'),
    			"fax"					=> $this->input->post('fax'),
    			"alamat"				=> $this->input->post('alamat'),
    			"email"					=> $this->input->post('email'),
    			"npwp"					=> $this->input->post('npwp'),
				"update_by" 			=> $this->session->userdata('customer_id'),
				"update_on"				=> date('Y-m-d')
	    	];
    	}
    	$id = $this->input->post('id', true);
		$this->db->where('customer_id', $id);
		$this->db->update('customer', $data);
    }

    public function hapus_data()
    {
    	$data = [
    		"delete_by"		=> $this->session->userdata('customer_id'),
    		"delete_on"		=> date('Y-m-d'),
    		"status"		=> 0
    	];
    	$id = $this->input->post('id', true);
    	$this->db->where('customer_id', $id);
    	$this->db->update('customer', $data);
    }

}

/* End of file M_customer.php */
/* Location: ./application/models/M_customer.php */