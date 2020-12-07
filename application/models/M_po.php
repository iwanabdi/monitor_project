<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_po extends CI_Model {

	function get_po($id = null)
	{
		$this->db->select('*');
		$this->db->from('po_view');
		if ($id != null) {
			$this->db->where('pr_no', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	function get_dpr($id = null)
	{
		$this->db->select('*');
		$this->db->from('dpr');
		$this->db->join('pekerjaan', 'dpr.pekerjaan_id = pekerjaan.pekerjaan_id');
		if ($id != null) {
			$this->db->where('pr_no', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	function get_dpo($id = null)
	{
		$this->db->select('*');
		$this->db->from('dpo');
		$this->db->join('pekerjaan', 'dpo.pekerjaan_id = pekerjaan.pekerjaan_id');
		if ($id != null) {
			$this->db->where('po_no', $id);
		}
		$query = $this->db->get();
		return $query;
	}

    function proses_add_pr()
    {
    	$data = [
			"io_number"			=> $this->input->post('io'),
			"mitra_id"			=> $this->input->post('mitra_id'),
			"project_name"		=> $this->input->post('project_id'),
			"create_by"			=> $this->session->userdata('pegawai_id'),
			'delivery_date'		=> $this->input->post('devdate'),
			"create_on"			=> date('Y-m-d')
    	];
		$this->db->insert('hpr', $data);
		
		$query = $this->db->query("SELECT (MAX(pr_no)) as total FROM `hpr`");
		$row = $query->row();
		$pr_no = $row->total;
		// var_dump($pr_no);
		// exit;
		$a = $this->input->post('project');
		$b = $this->input->post('qty');
		$subtotal= 0;
		if ($a[0] !== null) {
			for ($i=0;$i<sizeof($a);$i++) {
				// var_dump($a[$i]);
				// var_dump($no_reservasi);
				$queryy = $this->db->query("SELECT price FROM `pekerjaan` WHERE pekerjaan_id=".$a[$i]."");
				$roww = $queryy->row();
				$total = $roww->price;
				$subtotal = $subtotal+$total;
				$data1 = [
					'pr_no'			=> $pr_no,
					'pekerjaan_id'	=> $a[$i],
					'qty'			=> $b[$i],
					'total'			=> $total,
					'create_on'		=> date('Y-m-d'),
					'create_by'		=> $this->session->userdata('pegawai_id')
				];
				$this->db->insert('dpr', $data1);
			}
		}

		$datasub = [
			"sub_total"		=> $subtotal
    	];
		$this->db->where('pr_no', $pr_no);
		$this->db->update('hpr', $datasub);
	}

	function proses_buat_po()
    {
    	$data = [
			"pr_no"				=> $this->input->post('pr_no'),
			"io_number"			=> $this->input->post('IO'),
			"mitra_id"			=> $this->input->post('mitra_id'),
			"project_name"		=> $this->input->post('project_id'),
			"create_by"			=> $this->session->userdata('pegawai_id'),
			'delivery_date'		=> $this->input->post('devdate'),
			"create_on"			=> date('Y-m-d')
    	];
		$this->db->insert('hpo', $data);
		
		$query = $this->db->query("SELECT (MAX(po_no)) as total FROM `hpo`");
		$row = $query->row();
		$po_no = $row->total;
		$a = $this->input->post('pekerjaan');
		$b = $this->input->post('qty');
		$subtotal= 0;
		if ($a[0] !== null) {
			for ($i=0;$i<sizeof($a);$i++) {
				$queryy = $this->db->query("SELECT price FROM `pekerjaan` WHERE pekerjaan_id=".$a[$i]."");
				$roww = $queryy->row();
				$total = $roww->price;
				$subtotal = $subtotal+$total;
				$data1 = [
					'po_no'			=> $po_no,
					'pekerjaan_id'	=> $a[$i],
					'qty'			=> $b[$i],
					'total'			=> $total,
					'create_on'		=> date('Y-m-d'),
					'create_by'		=> $this->session->userdata('pegawai_id')
				];
				$this->db->insert('dpo', $data1);
			}
		}

		$datasub = [
			"sub_total"		=> $subtotal,
			"net_price"		=> $subtotal
    	];
		$this->db->where('po_no', $po_no);
		$this->db->update('hpo', $datasub);
	}

	function proses_edit_po()
    {
		$id = $this->input->post('po_no');
		$que = $this->db->query("SELECT rev FROM `hpo` WHERE po_no=".$id."");
		$ro = $que->row();
		$rev = $ro->rev;
    	$data = [
			// "io_number"			=> $this->input->post('IO'),
			// "mitra_id"			=> $this->input->post('mitra_id'),
			// "project_name"		=> $this->input->post('project_id'),
			"update_by"			=> $this->session->userdata('pegawai_id'),
			'delivery_date'		=> $this->input->post('devdate'),
			'rev'				=> $rev+1,
			"update_on"			=> date('Y-m-d')
		];
		$this->db->where('po_no', $id);
		$this->db->update('hpo', $data);
		
		$a = $this->input->post('pekerjaan');
		$b = $this->input->post('qty');
		$subtotal= 0;
		if ($a[0] !== null) {
			for ($i=0;$i<sizeof($a);$i++) {
				$queryy = $this->db->query("SELECT price FROM `pekerjaan` WHERE pekerjaan_id=".$a[$i]."");
				$roww = $queryy->row();
				$tot = $roww->price;
				$total = $tot*$b[$i];
				$subtotal = $subtotal+$total;
				$data1 = [
					'po_no'			=> $id,
					'pekerjaan_id'	=> $a[$i],
					'qty'			=> $b[$i],
					'total'			=> $total,
					'create_on'		=> date('Y-m-d'),
					'create_by'		=> $this->session->userdata('pegawai_id')
				];

				$queryyy = $this->db->query("SELECT count(po_no) as jum FROM `dpo` WHERE pekerjaan_id=".$a[$i]." AND po_no=".$id." ");
				$rowww = $queryyy->row();
				$cocok = $rowww->jum;
				if ($cocok >0) {
					$this->db->where('po_no', $id);
					$this->db->where('pekerjaan_id', $a[$i]);
					$this->db->update('dpo', $data1);
				}else {
					$this->db->insert('dpo', $data1);
				}
				
			}
		}

		$datasub = [
			"sub_total"		=> $subtotal,
			"net_price"		=> $subtotal
    	];
		$this->db->where('po_no', $id);
		$this->db->update('hpo', $datasub);
	}

	function proses_approve_po()
    {
		$id = $this->input->post('no_po');
    	$data = [
			"status"			=> 1
		];
		$this->db->where('po_no', $id);
		$this->db->update('hpo', $data);
	}
}
