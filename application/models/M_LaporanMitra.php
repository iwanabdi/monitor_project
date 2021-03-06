<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_LaporanMitra extends CI_Model {

	//start - pegawai -  laporan mitra
	function get_mitra($id = null)
	{
		$this->db->select('*');
		$this->db->from('mitra');
		if ($id != null) {
			$this->db->where('mitra_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function get_jumlahproject($id = null)
	{
		$query = $this->db->query("SELECT COUNT(p.project_id)  as jumlah
		FROM project p JOIN dstg d ON p.project_id=d.project_id
		WHERE d.mitra_id='$id'");
		return $query;
	}
	public function get_status_project($id = null)
	{
		$query = $this->db->query("SELECT p.status_project, COUNT(p.status_project) AS qty
		FROM dstg m
		JOIN project p ON m.project_id=p.project_id
		WHERE m.mitra_id='$id'
		GROUP BY p.status_project HAVING COUNT(p.status_project)>0");	
		return $query;
	}
	public function get_performa($id = null)
	{
		$query = $this->db->query("SELECT a.performa,
		COUNT(a.project_name) AS jumlah
		FROM (
			SELECT po.project_name ,t.tgl_testcom, po.delivery_date, 
			CASE
				WHEN DATE(t.tgl_testcom) <= DATE(po.delivery_date)  THEN 'tepat waktu'
				ELSE 'terlambat'
			END AS performa
			FROM testcom t 
			JOIN hpo po ON t.`project_id`=po.`project_name`
			WHERE po.mitra_id='$id'
		) a
		GROUP BY a.performa");
		return $query;
	}

	// end - pegawai -  laporan mitra
	
	
	//awal function tampilan halaman mitra
	function get_laporan($id = null)
	{
		$this->db->select('*');
		$this->db->from('laporan');
		if ($id != null) {
			$this->db->where('project_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}
	
	public function get_view($id = null)
	{
		$this->db->select('p.project_id , c.nama_customer, h.mitra_id , p.jalan_ter , p.kota_ter , p.provinsi_ter')
						->from('project_view p')
						->join('dstg d','p.project_id=d.project_id')
						->join('hstg h','h.no_stg=d.no_stg')
						->join('customer c','c.customer_id=p.customer_id');
		if ($id != null) {
			$this->db->where('h.mitra_id',$id);
		}
		$query= $this->db->get();
		return $query;


		// SELECT p.project_id , c.nama_customer, h.mitra_id , p.jalan_ter , p.kota_ter , p.provinsi_ter
		// FROM project_view p 
		// JOIN dstg d ON p.project_id=d.project_id
		// JOIN hstg h ON h.no_stg=d.no_stg
		// JOIN customer c ON c.customer_id=p.customer_idWHERE h.mitra_id=2;
	}

    
	
    public function update_bai()
    {
    	if ($this->input->post('id') !== null) {
    		$data = [
				"file_bai"			=> $this->upload->data('file_name')
    		];
		}
		$id = $this->input->post('id');
		$this->db->where('project_id', $id);
		$this->db->update('testcom', $data);
	}

    public function update_testcom()
    {
    	if ($this->input->post('id') !== null) {
    		$data = [
				"file_testcom"			=> $this->upload->data('file_name')
    		];
		}
		$id = $this->input->post('id');
		$this->db->where('project_id', $id);
		$this->db->update('testcom', $data);
	}
	//awal function tampilan halaman mitra

	// start Mitra - Menu Survey - upload file
	public function add_file($pdf,$gdb,$bom)
	{
		$id = $this->input->post('id');
		$this->db->select('project_id');
		$this->db->from('laporan');
		$this->db->where('project_id', $id);
		$query = $this->db->get()->row();
		// pengecekan apakah project_id sudah dibuat atau belum. jika belumm maka
    	if ($query == null) {
    		$data = [
				"project_id" 		=> $this->input->post('id'),
				"create_by"			=> $this->session->userdata('mitra_id'),
				"mitra_id"			=> $this->session->userdata('mitra_id'),
				"file_pdf"			=> $pdf,
				"file_gdb"			=> $gdb,
				"file_bom"			=> $bom,
				"create_on"         => date('Y-m-d'),
			
				
			];
			$this->db->insert('laporan', $data);
		}
	}

	// end Mitra - Menu Survey - upload file
	
    

}

/* End of file M_customer.php */
/* Location: ./application/models/M_customer.php */
