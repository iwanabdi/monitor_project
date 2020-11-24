<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_LaporanMitra extends CI_Model {

	function get_laporan($id = null)
	{
		$this->db->select('*');
		$this->db->from('laporan');
		if ($id != null) {
			$this->db->where('project_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}
	
	public function get_view($id = null)
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


		// SELECT p.project_id , c.nama_customer, h.mitra_id , p.jalan_ter , p.kota_ter , p.provinsi_ter
		// FROM project_view p 
		// JOIN dstg d ON p.project_id=d.project_id
		// JOIN hstg h ON h.no_stg=d.no_stg
		// JOIN customer c ON c.customer_id=p.customer_idWHERE h.mitra_id=2;
	}

    public function add_pdf()
    {
		$id = $this->input->post('id');
		$this->db->select('project_id');
		$this->db->from('laporan');
		$this->db->where('project_id', $id);
		$query = $this->db->get()->row();
		// pengecekan apakah project_id sudah dibuat atau belum
    	if ($query == null) {
    		$data = [
				"project_id" 		=> $this->input->post('id'),
				"create_by"			=> $this->session->userdata('mitra_id'),
				"mitra_id"			=> $this->session->userdata('mitra_id'),
				"file_pdf"			=> $this->upload->data('file_name'),
				"create_on"         => date('Y-m-d')
			];
			$this->db->insert('laporan', $data);
		}else{
			// jika sudah dibuat maka akan melakukan update untuk file map
			$data = [
				"file_pdf"			=> $this->upload->data('file_name')
			];	
			$id = $this->input->post('id');
			$this->db->where('project_id', $id);
			$this->db->update('laporan', $data);
		}
		
	}

    public function add_gdb()
    {
		$id = $this->input->post('id');
		$this->db->select('project_id');
		$this->db->from('laporan');
		$this->db->where('project_id', $id);
		$query = $this->db->get()->row();
    	if ($query == null) {
    		$data = [
				"project_id" 		=> $this->input->post('id'),
				"create_by"			=> $this->session->userdata('mitra_id'),
				"mitra_id"			=> $this->session->userdata('mitra_id'),
				"file_gdb"			=> $this->upload->data('file_name'),
				"create_on"         => date('Y-m-d')
    		];
			$this->db->insert('laporan', $data);
		}else{
			// jika sudah dibuat maka akan melakukan update untuk file map
			$data = [
				"file_gdb"			=> $this->upload->data('file_name')
			];
			$id = $this->input->post('id');
			$this->db->where('project_id', $id);
			$this->db->update('laporan', $data);
		}
	}

	public function add_bom()
    {
		$id = $this->input->post('id');
		$this->db->select('project_id');
		$this->db->from('laporan');
		$this->db->where('project_id', $id);
		$query = $this->db->get()->row();
    	if ($query == null) {
    		$data = [
				"project_id" 		=> $this->input->post('id'),
				"create_by"			=> $this->session->userdata('mitra_id'),
				"mitra_id"			=> $this->session->userdata('mitra_id'),
				"file_bom"			=> $this->upload->data('file_name'),
				"create_on"         => date('Y-m-d')
    		];
			$this->db->insert('laporan', $data);
		}else{
			// jika sudah dibuat maka akan melakukan update untuk file map
			$data = [
				"file_bom"			=> $this->upload->data('file_name')
			];
			$id = $this->input->post('id');
			$this->db->where('project_id', $id);
			$this->db->update('laporan', $data);
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
