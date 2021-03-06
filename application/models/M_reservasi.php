<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_reservasi extends CI_Model {

    function get_reservasi($id = null)
	{
		$this->db->select('*');
		$this->db->from('reservasi_view');
		if ($id != null) {
			$this->db->where('reservasi_no', $id);
		}
		$this->db->where('status', 1);
		$query = $this->db->get();
		return $query;
	}


	function get_dreservasi($id = null)
	{
		$this->db->select('*');
		$this->db->from('dreser');
		if ($id != null) {
			$this->db->where('reservasi_no', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	function proses_add_reservasi()
    {
    	$data = [
    		"IO" 				=> $this->input->post('IO'),
			"no_wo"				=> $this->input->post('project_id'),
			"lokasi"			=> $this->input->post('lokasi'),
			"create_by"			=> $this->session->userdata('pegawai_id'),
			"create_on"			=> date('Y-m-d'),
    		"status"			=> 1
    	];
		$this->db->insert('hreservasi', $data);
		
		$query = $this->db->query("SELECT (MAX(reservasi_no)) as total FROM `hreservasi`");
		$row = $query->row();
		$no_reservasi = $row->total;
		$a = $this->input->post('material');
		$b = $this->input->post('jumlah');
		if ($a[0] !== null) {
			for ($i=0;$i<sizeof($a);$i++) {
				// var_dump($a[$i]);
				// var_dump($no_reservasi);
				$data1 = [
					'reservasi_no'	=> $no_reservasi,
					'material_id'	=> $a[$i],
					'qty'			=> $b[$i],
					'create_on'		=> date('Y-m-d'),
					'create_by'		=> $this->session->userdata('pegawai_id')
				];
				$this->db->insert('dreservasi', $data1);
			}
		}

		//update project
		$IO =  $this->input->post('IO');
		$query = $this->db->query("SELECT * FROM `project` WHERE IO like '%$IO%' ");
		$row = $query->row();
		if ($row->status_project <3) {
			$datares = [
				"status_project"			=> 3
			];
			$this->db->where('project_id',$row->project_id);
			$this->db->update('project', $datares);
		}
		
	}

	function proses_edit_reservasi()
    {
		$id = $this->input->post('reservasi_no');
    	$data = [
			"update_by"			=> $this->session->userdata('pegawai_id'),
			"update_on"			=> date('Y-m-d')
		];
		$this->db->where('reservasi_no',$id);
		$this->db->update('hreservasi', $data);
		
		$a = $this->input->post('material');
		$b = $this->input->post('jumlah');
		if ($a[0] !== null) {
			for ($i=0;$i<sizeof($a);$i++) {
				$data1 = [
					'reservasi_no'	=> $id,
					'material_id'	=> $a[$i],
					'qty'			=> $b[$i],
					'create_on'		=> date('Y-m-d'),
					'create_by'		=> $this->session->userdata('pegawai_id')
				];
				$queryyy = $this->db->query("SELECT count(reservasi_no) as jum FROM `dreservasi` WHERE material_id=".$a[$i]." AND reservasi_no=".$id." ");
				$rowww = $queryyy->row();
				$cocok = $rowww->jum;
				if ($cocok >0) {
					$this->db->where('reservasi_no',$id);
					$this->db->where('material_id',$a[$i]);
					$this->db->update('dreservasi', $data1);
				}else {
					$this->db->insert('dreservasi', $data1);
				}
			}
		}
	}

	function hreservasi($id)
	{
		$query = $this->db->query("SELECT dreservasi.*, material.nama_material, dreservasi.qty, 
									hreservasi.reservasi_no, hreservasi.no_wo, 
									hreservasi.lokasi, hreservasi.io, pegawai.nama_pegawai AS peminta
									FROM dreservasi
									JOIN hreservasi ON hreservasi.reservasi_no = dreservasi.reservasi_no
									JOIN material ON material.material_id = dreservasi.material_id
									JOIN pegawai ON hreservasi.create_by = pegawai.pegawai_id
									WHERE hreservasi.reservasi_no = $id");
		return $query;
	}

}
