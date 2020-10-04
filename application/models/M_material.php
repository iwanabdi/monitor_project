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

    function proses_add_data()
    {
    	$data = [
    		"nama_material" 		=> $this->input->post('nama_material'),
    		"brand"					=> $this->input->post('brand'),
    		"stok"					=> $this->input->post('stok'),
    		"storage_bin"					=> $this->input->post('storage_bin'),
    		"create_by"				=> $this->session->userdata('pegawai_id'),
    		"status"				=> 1
    	];
    	$this->db->insert('material', $data);
    }

   //  function ambil_id_material($id)
   //  {
   //  	return $this->db->get_where('material', ['id' => $id))
			// ->row_array();
   //  }

    function proses_edit_data()
    {
    	if ($this->input->post('alamat') == null) {
    		$data = [
	    		"nama_material" 		=> $this->input->post('nama_material'),
    			"brand"			=> $this->input->post('brand'),
    			"stok"				=> $this->input->post('stok'),
    			"storage_bin"			=> $this->input->post('storage_bin'),
	    		"update_by" 		=> $this->session->userdata('pegawai_id')
    		];
    	}else{
    		$data = [
	    		"nama_material" 		=> $this->input->post('nama_material'),
    			"brand"			=> $this->input->post('brand'),
    			"stok"				=> $this->input->post('stok'),
    			"storage_bin"			=> $this->input->post('storage_bin'),
	    		"update_by" 		=> $this->session->userdata('pegawai_id')
	    	];
    	}
    	$id = $this->input->post('id', true);
		$this->db->where('material_id', $id);
		$this->db->update('material', $data);
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

}

/* End of file M_material.php */
/* Location: ./application/models/M_material.php */