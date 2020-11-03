<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Testcom extends CI_Model {

	function get_testcom($id = null)
	{
		$this->db->select('*');
		$this->db->from('testcom');
		if ($id != null) {
			$this->db->where('project_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

    public function add_bai()
    {
		$id = $this->input->post('id');
		$this->db->select('project_id');
		$this->db->from('testcom');
		$this->db->where('project_id', $id);
		$query = $this->db->get()->row();
		// pengecekan apakah project_id sudah dibuat atau belum
    	if ($query == null) {
    		$data = [
				"project_id" 		=> $this->input->post('id'),
				"file_bai"			=> $this->upload->data('file_name')
			];
			$this->db->insert('testcom', $data);
		}else{
			// jika sudah dibuat maka akan melakukan update untuk file map
			$data = [
				"file_bai"			=> $this->upload->data('file_name')
			];	
			$id = $this->input->post('id');
			$this->db->where('project_id', $id);
			$this->db->update('testcom', $data);
		}
		// var_dump($query);
		// print_r($data);exit;
	}

    public function add_testcom()
    {
		$id = $this->input->post('id');
		$this->db->select('project_id');
		$this->db->from('testcom');
		$this->db->where('project_id', $id);
		$query = $this->db->get()->row();
    	if ($query == null) {
    		$data = [
				"project_id" 		=> $this->input->post('id'),
				"file_testcom"		=> $this->upload->data('file_name')
    		];
			$this->db->insert('testcom', $data);
		}else{
			// jika sudah dibuat maka akan melakukan update untuk file map
			$data = [
				"file_testcom"		=> $this->upload->data('file_name')
			];
			$id = $this->input->post('id');
			$this->db->where('project_id', $id);
			$this->db->update('testcom', $data);
		}
	}
	
    public function update_bai()
    {
    	if ($this->input->post('id') !== null) {
    		$data = [
				"file_bai"			=> $this->upload->data('file_name')
    		];
		}
		$id = $this->input->post('id');
		$this->db->where('project_id', $id);
		$this->db->update('testcom', $data);
	}

    public function update_testcom()
    {
    	if ($this->input->post('id') !== null) {
    		$data = [
				"file_testcom"			=> $this->upload->data('file_name')
    		];
		}
		$id = $this->input->post('id');
		$this->db->where('project_id', $id);
		$this->db->update('testcom', $data);
	}
    

}

/* End of file M_customer.php */
/* Location: ./application/models/M_customer.php */
