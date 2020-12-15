<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_project extends CI_Model {

	function get_project($id = null)
	{
		$this->db->select('*');
		$this->db->from('project_view');
		if ($id != null) {
			$this->db->where('project_id', $id);
		}
		if ($this->session->userdata('jabatan')==1) {
			$this->db->where('pegawai_id', $this->session->userdata('pegawai_id'));
		}
		$this->db->where('status', 1);
		$query = $this->db->get();
		return $query;
	}

	function get_detail($id = null)
	{
		$this->db->select('*');
		$this->db->from('project_view');
		if ($id != null) {
			$this->db->where('project_id', $id);
		}
		$this->db->where('status', 1);
		$query = $this->db->get();
		return $query;
	}

	function proses_add_data()
    {
    	$data = [
			"project_id"		=> $this->pa_id(),
    		"customer_id" 		=> $this->input->post('customer_id'),
			"alamat_ori"		=> $this->input->post('alamat_id'),
			"alamat_ter"		=> $this->input->post('alamat_id1'),
			"create_by"			=> $this->session->userdata('pegawai_id'),
			"product_id"		=> $this->input->post('product_id'),
			"keterangan"		=> $this->input->post('ketarangan'),
			"sid"				=> $this->gen_sid($this->input->post('product_id')),
			"create_on"			=> date('Y-m-d'),
			"status_project"	=> 1,
    		"status"			=> 1
    	];
    	$this->db->insert('project', $data);
	}
	
	function gen_sid($prod = null)
	{
		$query = $this->db->query("select lpad(COUNT(project_id)+1,9,0) as total from project");
		$row = $query->row();
		$belakang = $row->total;
		$sid = $prod.$belakang;
		return $sid;
	}

	function pa_id()
	{
		$query = $this->db->query("SELECT lpad(COUNT(project_id)+1,4,0) as total FROM projectWHERE MONTH(create_on) = MONTH(CURRENT_DATE()) AND YEAR(create_on) = YEAR(CURRENT_DATE())");
		$row = $query->row();
		$belakang = $row->total;
		$awal=date('ym');
		$pa = 'PA-ACT-'.$awal.'-'.$belakang;
		return $pa;
	}

	function proses_dispos_pm()
    {
    	$data = [
			"pegawai_id"		=> $this->input->post('pegawai_id'),
			"update_by"			=> $this->session->userdata('pegawai_id'),
			"update_on"			=> date('Y-m-d')
    	];
    	$id = $this->input->post('project_id');
		$this->db->where('project_id', $id);
		$this->db->update('project', $data);
	}

	function proses_dispos_mitra()
    {
    	$data = [
			"project_id"		=> $this->input->post('project_id'),
			"mitra_id"			=> $this->input->post('mitra_id'),
			"create_by"			=> $this->session->userdata('pegawai_id'),
			"create_on"			=> date('Y-m-d')
    	];
		$this->db->insert('dstg', $data);
	}

	function genreate_io($pid)
    {
		$query = $this->db->query("SELECT lpad(COUNT(IO)+1,5,0) as total FROM project WHERE MONTH(create_on) = MONTH(CURRENT_DATE()) AND YEAR(create_on) = YEAR(CURRENT_DATE()) AND IO is not null");
		$row = $query->row();
		$belakang = $row->total;
		$awal=date('mY');
		
		$data = [
			"IO"				=> $awal."B".$belakang,
			"update_by"			=> $this->session->userdata('pegawai_id'),
			"update_on"			=> date('Y-m-d')
    	];
		$this->db->where('project_id', $pid);
		$this->db->update('project', $data);
	}
	public function detail($project_id)
	{
		$query = $this->db
					->from("project")
					->where("project_id",$project_id)
					->get();
		return $query->row();
	}

	public function get_pm()
	{
		$query = $this->db->query("SELECT DISTINCT p.pegawai_id, pg.nama_pegawai, COUNT(p.project_id) AS jumlah_project 
									FROM project p
									JOIN pegawai pg ON pg.pegawai_id = p.pegawai_id
									GROUP BY p.pegawai_id HAVING COUNT(p.project_id)>0");
		return $query;
	}

	public function project_pm($pm)
	{
		$query = $this->db->query("SELECT DISTINCT p.pegawai_id, COUNT(p.project_id) AS jumlah_project 
									FROM project p
									WHERE p.pegawai_id = '$pm'
									GROUP BY p.pegawai_id HAVING COUNT(p.project_id)>0");
		return $query;
	}

	public function get_status_project($pm)
	{
		$query = $this->db->query("SELECT pegawai_id, status_project, COUNT(*) AS qty FROM project 
            WHERE pegawai_id = '$pm'
            GROUP BY status_project HAVING COUNT(*)>0");
		return $query; 
	}

	//start -function menu status project 
	

	public function jumlahpa($tgl_awal = null ,$tgl_akhir = null)
	{
		// query mmmengambil jumlah pa 
		return $pa = $this->db->query("SELECT 
		COUNT(a.pa) AS jumlahpa
		FROM (
			select p.project_id as pa, p.status_project , p.create_on
			from project p
			where p.create_on >= '$tgl_awal' AND p.create_on <= '$tgl_akhir'
		) a");
	}
	public function jumlahonproses($tgl_awal = null ,$tgl_akhir = null)
	{
		// query mmmengambil jumlah onproses
		return $onproses = $this->db->query("SELECT 
		COUNT(a.onproses) AS jumlahonproses
		FROM (
			SELECT p.project_id AS onproses, p.status_project , p.create_on
			FROM project p
			WHERE p.status_project<4  AND p.create_on >= '$tgl_awal' AND p.create_on <= '$tgl_akhir'
		) a
		");
	}
	public function jumlahtestcom($tgl_awal = null ,$tgl_akhir = null)
	{
		// query mmmengambil jumlah testcom
		return $testcom = $this->db->query("SELECT 
		COUNT(a.testcom) AS jumlahtestcom
		FROM (
			SELECT p.project_id AS testcom, p.status_project , p.create_on
			FROM project p
			
			WHERE p.status_project>=4 and p.create_on >= '$tgl_awal' AND p.create_on <= '$tgl_akhir'
		) a");

	}
	//end -function menu status project 


	public function chart_project()
	{

		$query = $this->db->query("SELECT status_project, COUNT(*) AS qty FROM project
									GROUP BY status_project HAVING COUNT(*)");
		return $query;
	}

}
