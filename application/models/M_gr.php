<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_gr extends CI_Model {

	function get_gr($id = null)
	{
		$this->db->select('*');
		$this->db->from('gr_view');
		if ($id != null) {
			$this->db->where('gr_no', $id);
        }
		$this->db->where('statuspo', 1);
		$query = $this->db->get();
		return $query;
	}

	function get_dgr($id = null)
	{
		$this->db->select('*');
		$this->db->from('dgr');
		$this->db->join('pekerjaan', 'dgr.pekerjaan_id = pekerjaan.pekerjaan_id');
		if ($id != null) {
			$this->db->where('gr_no', $id);
		}
		$query = $this->db->get();
		return $query;
	}
	
	public function proses_buat_gr()
	{
		$totval = $this->input->post('totval');
		$diskon = $this->input->post('diskon');
		$netval = $totval - ($totval*$diskon/100);
		$data = [
			"po_no"				=> $this->input->post('po_no'),
			"keterangan"		=> $this->input->post('keterangan'),
			"mitra_id"			=> $this->input->post('mitra_id'),
			'status'			=> 0,
			"create_on"			=> $this->input->post('grdate'),
			"total_value"		=> $totval,
			"discount"			=> $diskon,
			"net_value"			=> $netval,
			'create_by'			=> $this->session->userdata('pegawai_id')
    	];
		$this->db->insert('hgr', $data);
		
		$query = $this->db->query("SELECT (MAX(gr_no)) as total FROM `hgr`");
		$row = $query->row();
		$gr_no = $row->total;
		$a = $this->input->post('pekerjaan');
		$b = $this->input->post('qty');
		// $c = $this->input->post('uprice');
		$c = $this->input->post('tprice');
		if ($a[0] !== null) {
			for ($i=0;$i<sizeof($a);$i++) {
				$data1 = [
					'gr_no'			=> $gr_no,
					'pekerjaan_id'	=> $a[$i],
					'qty'			=> $b[$i],
					'net_value'		=> $c[$i],
					'create_on'		=> $this->input->post('grdate'),
					'create_by'		=> $this->session->userdata('pegawai_id')
				];
				$this->db->insert('dgr', $data1);
			}
		}
	}

	function proses_approve_gr()
    {
		$id = $this->input->post('gr_no');
    	$data = [
			"status"			=> 1
		];
		$this->db->where('gr_no', $id);
		$this->db->update('hgr', $data);
	}

	function proses_edit_gr()
    {
		$id = $this->input->post('gr_no');
		$totval = $this->input->post('totval');
		$diskon = $this->input->post('diskon');
		$netval = $totval-($totval*$diskon/100);
    	$data = [
			"total_value"		=> $totval,
			"discount"			=> $diskon,
			"net_value"			=> $netval,
			"create_by"			=> $this->session->userdata('pegawai_id'),
			'create_on'			=> $this->input->post('grdate'),
			'status'			=> 0
		];
		$this->db->where('gr_no', $id);
		$this->db->update('hgr', $data);
		
		$a = $this->input->post('pekerjaan');
		$b = $this->input->post('qty');
		$c = $this->input->post('tprice');
		if ($a[0] !== null) {
			for ($i=0;$i<sizeof($a);$i++) {
				$data1 = [
					'gr_no'			=> $id,
					'pekerjaan_id'	=> $a[$i],
					'qty'			=> $b[$i],
					'net_value'		=> $c[$i],
					'create_on'		=> $this->input->post('grdate'),
					'create_by'		=> $this->session->userdata('pegawai_id')
				];

				$queryyy = $this->db->query("SELECT count(gr_no) as jum FROM `dgr` WHERE pekerjaan_id=".$a[$i]." AND gr_no=".$id." ");
				$rowww = $queryyy->row();
				$cocok = $rowww->jum;
				if ($cocok >0) {
					$this->db->where('gr_no', $id);
					$this->db->where('pekerjaan_id', $a[$i]);
					$this->db->update('dgr', $data1);
				}else {
					$this->db->insert('dgr', $data1);
				}
			}
		}
	}

}