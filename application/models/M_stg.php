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
}