<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_survey extends CI_Model {

	function get_survey($id = null)
	{
		$this->db->select('*');
		$this->db->from('survey');
		if ($id != null) {
			$this->db->where('project_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

    public function add_map()
    {
		$id = $this->input->post('id');
		$this->db->select('project_id');
		$this->db->from('survey');
		$this->db->where('project_id', $id);
		$query = $this->db->get()->row();
		// pengecekan apakah project_id sudah dibuat atau belum
    	if ($query == null) {
    		$data = [
				"project_id" 		=> $this->input->post('id'),
				"file_map"			=> $this->upload->data('file_name')
			];
			$this->db->insert('survey', $data);
		}else{
			// jika sudah dibuat maka akan melakukan update untuk file map
			$data = [
				"file_map"			=> $this->upload->data('file_name')
			];	
			$id = $this->input->post('id');
			$this->db->where('project_id', $id);
			$this->db->update('survey', $data);
		}
		// var_dump($query);
		// print_r($data);exit;
	}

    public function add_excel()
    {
		$id = $this->input->post('id');
		$this->db->select('project_id');
		$this->db->from('survey');
		$this->db->where('project_id', $id);
		$query = $this->db->get()->row();
    	if ($query == null) {
    		$data = [
				"project_id" 		=> $this->input->post('id'),
				"file_excel"		=> $this->upload->data('file_name')
    		];
			$this->db->insert('survey', $data);
		}else{
			// jika sudah dibuat maka akan melakukan update untuk file map
			$data = [
				"file_excel"		=> $this->upload->data('file_name')
			];
			$id = $this->input->post('id');
			$this->db->where('project_id', $id);
			$this->db->update('survey', $data);
		}
	}
	
    public function update_map()
    {
    	if ($this->input->post('id') !== null) {
    		$data = [
				"file_map"			=> $this->upload->data('file_name')
    		];
		}
		$id = $this->input->post('id');
		$this->db->where('project_id', $id);
		$this->db->update('survey', $data);
	}

    public function update_excel()
    {
    	if ($this->input->post('id') !== null) {
    		$data = [
				"file_excel"			=> $this->upload->data('file_name')
    		];
		}
		$id = $this->input->post('id');
		$this->db->where('project_id', $id);
		$this->db->update('survey', $data);
	}
    

}

/* End of file M_customer.php */
/* Location: ./application/models/M_customer.php */
