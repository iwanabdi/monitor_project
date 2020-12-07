<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_material extends CI_Model {

	public function get_material($id = null)
    {
        $this->db->select('*');
        $this->db->from('material');
        if ($id != null) {
            $this->db->where('material_id', $id);
        }
        $this->db->where('status', 1);
        $query = $this->db->get();
        return $query;
    }

    public function tambah_stok()
    {
        $id = $this->input->post('id', true);
        $this->db->select("(select stok from material where material_id = '$id') as stok", false);
        $query = $this->db->get('material')->row();
        $tambah_stok = $this->input->post('tambah_stok');
        $hasil = intval($query->stok) + intval($tambah_stok);
        $data = [
            "stok"              => $hasil,
            "update_by"         => $this->session->userdata('pegawai_id'),
            "update_on"         => date('Y-m-d')
        ];
        $id = $this->input->post('id', true);
        $this->db->where('material_id', $id);
		$this->db->update('material', $data);
		
		for ($i=1; $i <= $this->input->post('tambah_stok'); $i++) { 
			$data2 = [
				"material_id" 		=> $id,
				"SN"				=> $this->input->post('sn-'.$i),
				"keterangan"		=> $this->input->post('keterangan'),
				"create_on"				=> date('Y-m-d'),
    			"create_by"				=> $this->session->userdata('pegawai_id'),
				"status"				=> 1
			];
		$this->db->insert('dmaterial', $data2);
		}
    }

    function proses_add_data()
    {
    	$data = [
    		"nama_material" 		=> $this->input->post('nama_material'),
    		"brand"					=> $this->input->post('brand'),
    		"stok"					=> $this->input->post('stok'),
    		"storage_bin"			=> $this->input->post('storage_bin'),
			"create_by"				=> $this->session->userdata('pegawai_id'),
			"create_on"				=> date('Y-m-d'),
    		"create_by"				=> $this->session->userdata('pegawai_id'),
    		"status"				=> 1
		];
		$this->db->insert('material', $data);

		$query = $this->db->query("select max(material_id) as total from material");
		$row = $query->row();
		$count = $row->total;
		for ($i=1; $i <= $this->input->post('stok'); $i++) { 
			$data2 = [
				"material_id" 		=> $count,
				"SN"				=> $this->input->post('sn-'.$i),
				"keterangan"		=> $this->input->post('keterangan'),
				"create_on"				=> date('Y-m-d'),
    			"create_by"				=> $this->session->userdata('pegawai_id'),
				"status"				=> 1
			];
		$this->db->insert('dmaterial', $data2);
		}
	}
	

   //  function ambil_id_material($id)
   //  {
   //  	return $this->db->get_where('material', ['id' => $id))
			// ->row_array();
   //  }

    function proses_edit_data()
    {
    	if ($this->input->post('material') == null) {
    		$data = [
	    		"nama_material"		=> $this->input->post('nama_material'),
    			"brand"				=> $this->input->post('brand'),
    			"stok"				=> $this->input->post('stok'),
    			"storage_bin"		=> $this->input->post('storage_bin'),
				"update_by" 		=> $this->session->userdata('pegawai_id'),
				"update_on"			=> date('Y-m-d'),
    		];
    	}else{
    		$data = [
	    		"nama_material" 	=> $this->input->post('nama_material'),
    			"brand"				=> $this->input->post('brand'),
    			"stok"				=> $this->input->post('tambah_stok'),
    			"storage_bin"		=> $this->input->post('storage_bin'),
				"update_by" 		=> $this->session->userdata('pegawai_id'),
				"update_on"			=> date('Y-m-d'),
	    	];
    	}
    	$id = $this->input->post('id', true);
		$this->db->where('material_id', $id);
		$this->db->update('material', $data);
		
    	// $id = $this->input->post('id', true);
		for ($i=1; $i <= $this->input->post('stok'); $i++) { 
			$data2 = [
				"material_id" 		=> $id,
				"SN"				=> $this->input->post('sn-'.$i),
				"keterangan"		=> $this->input->post('keterangan')
			];
			($data2);exit;
		$this->db->insert('dmaterial', $data2);
		}

    }

    function hapus_data()
    {
    	$data = [
    		"delete_by"		=> $this->session->userdata('material_id'),
    		"delete_on"		=> date('Y-m-d'),
    		"status"		=> 0
    	];
    	$id = $this->input->post('id', true);
    	$this->db->where('material_id', $id);
    	$this->db->update('material', $data);
	}
	
	public function laporan_material($tgl_awal,$tgl_akhir)
    {
        $query = $this->db->query("SELECT dmaterial.material_id, material.nama_material, dmaterial.keterangan, dmaterial.create_on, COUNT(*) AS qty FROM dmaterial 
            JOIN material ON dmaterial.material_id=material.material_id 
            WHERE dmaterial.create_on >= '$tgl_awal' AND dmaterial.create_on <= '$tgl_akhir'
            GROUP BY material_id, keterangan HAVING COUNT(*)>0");
        return $query;
    }

    public function laporan_keluar($tgl_awal, $tgl_akhir)
    {
        $query = $this->db->query("SELECT dgi.material_id, material.nama_material, dgi.gi_no, hreservasi.no_wo, hreservasi.io, hreservasi.reservasi_no, dgi.create_on, COUNT(*) AS qty FROM dgi 
            JOIN material ON dgi.material_id = material.material_id
            JOIN hgi ON hgi.gi_no = dgi.gi_no
            JOIN hreservasi ON hreservasi.reservasi_no = hgi.reservasi_no
            WHERE dgi.create_on >= '$tgl_awal' AND dgi.create_on <= '$tgl_akhir'
            GROUP BY gi_no, material_id HAVING COUNT(*)>0");
        return $query;
    }

}

/* End of file M_material.php */
/* Location: ./application/models/M_material.php */
