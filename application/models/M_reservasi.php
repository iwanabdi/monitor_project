<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_reservasi extends CI_Model {

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

}