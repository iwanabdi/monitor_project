<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_stg extends CI_Model {

    function get_stg($id = null)
	{
		$this->db->select('*');
        $this->db->from('hstg');
        $this->db->join('dstg', 'hstg.no_stg = dstg.no_stg');
        $this->db->join('mitra','hstg.mitra_id= mitra.mitra_id');
        $this->db->join('project','dstg.project_id=project.project_id');
        $this->db->join('pegawai','hstg.pegawai_id=pegawai.pegawai_id');
		if ($id != null) {
			$this->db->where('h_stg', $id);
		}   
		$this->db->where('status', 1);
		$query = $this->db->get();
		return $query;
	}

	function nomer_stg()
	{
		$query = $this->db->query("SELECT lpad(COUNT(no_stg)+1,3,0) as total FROM `hstg`WHERE MONTH(create_on) = MONTH(CURRENT_DATE()) AND YEAR(create_on) = YEAR(CURRENT_DATE()) AND DATE(create_on) = DATE(CURRENT_DATE())");
		$row = $query->row();
		$belakang = $row->total;
		$awal=date('md');
		$tahun=date('yy');
		$nostg = $awal.$belakang.'/STG/AKV/07/ICON+/'.$tahun;
		return $nostg;
	}
}