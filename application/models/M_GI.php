<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_GI extends CI_Model {

    function proses_gi($id = null)
	{
		$data = [
    		"reservasi_no" 		=> $this->input->post('reservasi_no'),
			"mitra_id"			=> $this->input->post('mitra_id'),
			"create_by"			=> $this->session->userdata('pegawai_id'),
			"create_on"			=> date('Y-m-d')
    	];
		$this->db->insert('hgi', $data);
		
		$query = $this->db->query("SELECT (MAX(gi_no)) as total FROM `hgi`");
		$row = $query->row();
		$gi_no = $row->total;
		$a = $this->input->post('material_id');
		$b = $this->input->post('sn');
		if ($a[0] !== null) {
			for ($i=0;$i<sizeof($a);$i++) {
				if ($this->cek_sn($b[$i],$a[$i])==1) {
					$material_id = $a[$i];
					$data1 = [
						'gi_no'			=> $gi_no,
						'material_id'	=> $material_id,
						'serial_number'	=> $b[$i],
						'qty'			=> 1,
						'create_on'		=> date('Y-m-d'),
						'create_by'		=> $this->session->userdata('pegawai_id')
					];
					$this->db->insert('dgi', $data1);

					//update status dmaterial
					$dataupd = [
						"status	"			=> 0,
						"update_by"			=> $this->session->userdata('pegawai_id'),
						"update_on"			=> date('Y-m-d')
					];
					$this->db->where('material_id', $material_id);
					$this->db->where('SN',$b[$i]);
					$this->db->update('dmaterial', $dataupd);

					//update stok material
					$queryupd = $this->db->query("SELECT MAX(stok)-1 as total FROM material WHERE material_id = $material_id");
					$hasil = $queryupd->row()->total;
					$datamat = [
						"stok"				=> $hasil,
						"update_by"			=> $this->session->userdata('pegawai_id'),
						"update_on"			=> date('Y-m-d')
					];
					$this->db->where('material_id', $material_id);
					$this->db->update('material', $datamat);
				}
			}
		}

		//rubah status reservasi
		$datares = [
			"status"			=> 0,
			"update_by"			=> $this->session->userdata('pegawai_id'),
			"update_on"			=> date('Y-m-d')
		];
		$this->db->where('reservasi_no', $this->input->post('reservasi_no'));
		$this->db->update('hreservasi', $datares);
	}

	function cek_sn($sn,$id)
    {
    	$query = $this->db->query("SELECT COUNT(material_id) as total FROM dmaterial WHERE SN = $sn AND material_id = $id AND status= 1");
		$row = $query->row();
		$belakang = $row->total;
		return $belakang;
	}
	
	public function get_gi($id = null)
	{
		$this->db->select('g.gi_no as gi_no,g.reservasi_no as reservasi_no,g.create_on as create_on,g.create_by as create_by,r.IO, r.no_wo,pg.nama_pegawai');
		$this->db->from('hgi as g');
		$this->db->join('hreservasi as r','g.reservasi_no=r.reservasi_no');
		$this->db->join('pegawai as pg','g.create_by=pg.pegawai_id');
		if ($id != null) {
			$this->db->where('g.gi_no', $id);
		}
		$query = $this->db->get();
		return $query;
	}
}
