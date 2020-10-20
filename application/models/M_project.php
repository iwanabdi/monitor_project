<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_project extends CI_Model {

	function get_project($id = null)
	{
		$this->db->select('*');
		$this->db->from('project as p');
		$this->db->join('customer as c','p.customer_id=c.customer_id');
		$this->db->join('alamat as a','p.alamat_id=a.alamat_id');
		$this->db->join('product as pr','p.product_id=pr.product_id');
		$this->db->join('pegawai as pg','p.pegawai_id=pg.pegawai_id',"LEFT");
		if ($id != null) {
			$this->db->where('project_id', $id);
		}
		$this->db->where('p.status', 1);
		$query = $this->db->get();
		return $query;
	}

	function proses_add_data()
    {
    	$data = [
    		"customer_id" 		=> $this->input->post('customer_id'),
    		"alamat_id"			=> $this->input->post('alamat_id'),
			"create_by"			=> $this->session->userdata('pegawai_id'),
			"product_id"		=>  $this->input->post('product_id'),
			"create_on"			=> date('Y-m-d'),
    		"status"			=> 1
    	];
    	$this->db->insert('project', $data);
    }

    // function proses_edit_data()
    // {
	// 		$data = [
	//     		"nama_product" 		=> $this->input->post('nama_product'),
	// 			"bandwith"			=> $this->input->post('bandwith'),
	// 			"satuan"			=>  $this->input->post('satuan'),
	// 			"update_by" 		=> $this->session->userdata('pegawai_id'),
	// 			"update_on"			=> date('Y-m-d')
	//     	];
    	
    // 	$id = $this->input->post('id', true);
	// 	$this->db->where('product_id', $id);
	// 	$this->db->update('product', $data);
    // }

    // function hapus_data()
    // {
    // 	$data = [
    // 		"delete_by"		=> $this->session->userdata('pegawai_id'),
    // 		"delete_on"		=> date('Y-m-d'),
    // 		"status"		=> 0
    // 	];
    // 	$id = $this->input->post('id', true);
    // 	$this->db->where('product_id', $id);
    // 	$this->db->update('product', $data);
    // }

}

/* End of file M_product.php */
/* Location: ./application/models/M_product.php */
