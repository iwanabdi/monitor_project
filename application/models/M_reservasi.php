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
				var_dump($a[$i]);
				var_dump($no_reservasi);
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
	}

}
