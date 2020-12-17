<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Testcom extends CI_Model {

	function get_testcom($id = null)
	{
		$this->db->select('p.project_id , c.nama_customer, h.mitra_id , p.jalan_ter , p.kota_ter , p.provinsi_ter')
						->from('project_view p')
						->join('dstg d','p.project_id=d.project_id')
						->join('hstg h','h.no_stg=d.no_stg')
						->join('customer c','c.customer_id=p.customer_id');
		if ($id != null) {
			$this->db->where('h.mitra_id',$id);
		}
		$query= $this->db->get();
		return $query;
	}
	public function add_file($bai,$testcom)
	{
		$id = $this->input->post('id');
		$tanggal = $this->input->post('tanggal');
		$this->db->select('project_id');
		$this->db->from('testcom');
		$this->db->where('project_id', $id);
		$query = $this->db->get()->row();
		// pengecekan apakah project_id sudah dibuat atau belum. jika belumm maka
    	if ($query == null) {
    		$data = [
				"project_id" 		=> $this->input->post('id'),
				"create_by"			=> $this->session->userdata('mitra_id'),
				"file_bai"			=> $bai,
				"file_testcom"			=> $testcom,
				"create_on"         => date('Y-m-d'),
				"tgl_testcom"         => $tanggal
				
			];
			$this->db->insert('testcom', $data);
		}
	}

    // public function add_bai()
    // {
	// 	$id = $this->input->post('id');
	// 	$this->db->select('project_id');
	// 	$this->db->from('testcom');
	// 	$this->db->where('project_id', $id);
	// 	$query = $this->db->get()->row();
	// 	// pengecekan apakah project_id sudah dibuat atau belum. jika belumm maka
    // 	if ($query == null) {
    // 		$data = [
	// 			"project_id" 		=> $this->input->post('id'),
	// 			"create_by"			=> $this->session->userdata('mitra_id'),
	// 			"file_bai"			=> $this->upload->data('file_name'),
	// 			"create_on"         => date('Y-m-d'),
	// 			"tgl_testcom"         => date('Y-m-d')
				
	// 		];
	// 		$this->db->insert('testcom', $data);
	// 	}else{
	// 		// jika sudah dibuat maka akan melakukan update untuk file map
	// 		$data = [
	// 			"file_bai"			=> $this->upload->data('file_name'), 
				
	// 		];	
	// 		$id = $this->input->post('id');
	// 		$this->db->where('project_id', $id);
	// 		$this->db->update('testcom', $data);
	// 	}
	// 	// var_dump($query);
	// 	// print_r($data);exit;
	// }

    // public function add_testcom()
    // {
	// 	$id = $this->input->post('id');
	// 	$this->db->select('project_id');
	// 	$this->db->from('testcom');
	// 	$this->db->where('project_id', $id);
	// 	$query = $this->db->get()->row();
    // 	if ($query == null) {
    // 		$data = [
	// 			"project_id" 		=> $this->input->post('id'),
	// 			"create_by"			=> $this->session->userdata('mitra_id'),
	// 			"file_testcom"		=> $this->upload->data('file_name'),
	// 			"create_on"         => date('Y-m-d'),
	// 			"tgl_testcom"         => date('Y-m-d'),
    // 		];
	// 		$this->db->insert('testcom', $data);
	// 	}else{
	// 		// jika sudah dibuat maka akan melakukan update untuk file map
	// 		$data = [
	// 			"file_testcom"		=> $this->upload->data('file_name')
	// 		];
	// 		$id = $this->input->post('id');
	// 		$this->db->where('project_id', $id);
	// 		$this->db->update('testcom', $data);
	// 	}
	// }
	
    // public function update_bai()
    // {
    // 	if ($this->input->post('id') !== null) {
    // 		$data = [
	// 			"file_bai"			=> $this->upload->data('file_name')
    // 		];
	// 	}
	// 	$id = $this->input->post('id');
	// 	$this->db->where('project_id', $id);
	// 	$this->db->update('testcom', $data);
	// }

    // public function update_testcom()
    // {
    // 	if ($this->input->post('id') !== null) {
    // 		$data = [
	// 			"file_testcom"			=> $this->upload->data('file_name')
    // 		];
	// 	}
	// 	$id = $this->input->post('id');
	// 	$this->db->where('project_id', $id);
	// 	$this->db->update('testcom', $data);
	// }
	// public function upload_file($bai,$testcom)
	// {
		
    // 	if ($this->input->post('id') !== null) {
    // 		$data = [
	// 			"file_testcom"			=> $bai,
	// 			"file_bai"				=>	$testcom
    // 		];
	// 	}
	// 	$id = $this->input->post('id');
	// 	$this->db->where('project_id', $id);
	// 	$this->db->update('testcom', $data);
		
	// }
    

}

/* End of file M_customer.php */
/* Location: ./application/models/M_customer.php */
