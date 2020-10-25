<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_project extends CI_Model {

	function get_project($id = null)
	{
		$this->db->select('p.*,c.nama_customer,pr.nama_product,pr.bandwith,pr.satuan,pg.nama_pegawai,a.jalan as jalan_ter,a.kota as kota_ter,a.provinsi as provinsi_ter');
		$this->db->from('project as p');
		$this->db->join('customer as c','p.customer_id=c.customer_id');
		$this->db->join('alamat as a','p.alamat_ter=a.alamat_id',"LEFT");
		$this->db->join('alamat as a2','p.alamat_ori=a.alamat_id',"LEFT");
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
			"project_id"		=> $this->pa_id(),
    		"customer_id" 		=> $this->input->post('customer_id'),
    		"alamat_id"			=> $this->input->post('alamat_id'),
			"create_by"			=> $this->session->userdata('pegawai_id'),
			"product_id"		=> $this->input->post('product_id'),
			"sid"				=> $this->gen_sid($this->input->post('product_id')),
			"create_on"			=> date('Y-m-d'),
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
		$query = $this->db->query("SELECT lpad(COUNT(project_id)+1,4,0) as total FROM `project`WHERE MONTH(create_on) = MONTH(CURRENT_DATE()) AND YEAR(create_on) = YEAR(CURRENT_DATE())");
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
    	$id = $this->input->post('project_id',true);
		$this->db->where('project_id', $id);
		$this->db->update('project', $data);
	}

}
