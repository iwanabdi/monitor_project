<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_gr extends CI_Model {

	function get_po($id = null)
	{
		$this->db->select('*');
		$this->db->from('po_view');
		if ($id != null) {
			$this->db->where('pr_no', $id);
        }
		$this->db->where('status', 1);
		$query = $this->db->get();
		return $query;
    }

}