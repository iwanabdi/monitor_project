<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_stg extends CI_Model {

    // function get_stg($id = null)
	// {
	// 	$this->db->select('*');
    //     $this->db->from('hstg');
    //     $this->db->join('dstg', 'hstg.no_stg = dstg.no_stg');
    //     $this->db->join('mitra','hstg.mitra_id= mitra.mitra_id');
    //     $this->db->join('project','dstg.project_id=project.project_id');
    //     $this->db->join('pegawai','hstg.pegawai_id=pegawai.pegawai_id');
	// 	if ($id != null) {
	// 		$this->db->where('h_stg', $id);
	// 	}   
	// 	$this->db->where('status', 1);
	// 	$query = $this->db->get();
	// 	return $query;
	// }

	function get_stg_belum()
	{
		$this->db->select('*');
		$this->db->from('stg_belum_view');
		$this->db->where('no_stg', "");
		$query = $this->db->get();
		return $query;
	}

	function get_stg($id = null)
	{
		$this->db->select('*');
		$this->db->from('stg_belum_view');
		if ($id != null) {
			$this->db->where('project_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	function nomer_stg()
	{
		$query = $this->db->query("SELECT lpad(COUNT(no_stg)+2,3,0) as total FROM `hstg`WHERE MONTH(create_on) = MONTH(CURRENT_DATE()) AND YEAR(create_on) = YEAR(CURRENT_DATE()) AND DATE(create_on) = DATE(CURRENT_DATE())");
		$row = $query->row();
		$belakang = $row->total;
		$awal=date('md');
		$tahun=date('yy');
		$nostg = $awal.$belakang.'/STG/AKV/07/ICON+/'.$tahun;
		return $nostg;
	}

	function cetak()
	{
		$query = $this->db->query("SELECT hstg.no_stg, pegawai.nama_pegawai, pegawai.jabatan, mitra.nama_mitra FROM hstg 
		INNER JOIN pegawai ON hstg.pegawai_id = pegawai.pegawai_id
		INNER JOIN mitra ON hstg.mitra_id = mitra.mitra_id
		WHERE no_stg IN (SELECT MAX(no_stg) FROM hstg)");
		$row = $query->row();
		$stg = $row;
		return $stg;
	}

	// SELECT hstg.no_stg, dstg.no_stg, project.*, customer.nama_customer FROM hstg 
	// INNER JOIN dstg ON hstg.no_stg = dstg.no_stg
	// INNER JOIN project ON dstg.project_id = project.project_id
	// INNER JOIN customer ON project.customer_id = customer.customer_id
	// WHERE hstg.no_stg = dstg.no_stg;
}
