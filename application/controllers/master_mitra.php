<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_mitra extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		cekblm_login_pegawai();
		cek_akses();
		$this->load->model('UserModel');
		$this->load->model('M_mitra');
	}

	public function index()
	{
		$data['row'] = $this->M_mitra->get_mitra();
		$this->template->load('template_pegawai', 'mitra/data_mitra', $data);
	}

	public function add()
	{
		$this->template->load('template_pegawai', 'mitra/add_mitra');
	}

	public function edit($id)
	{
		
		$data['row'] = $this->M_mitra->get_mitra($id)->row();
		$this->template->load('template_pegawai', 'mitra/edit_mitra', $data);
	}

	function proses_add_data()
	{
		$t_email = $this->input->post('email');

		$query = $this->db->query("SELECT COUNT(mitra_id) as total FROM mitra WHERE email = '$t_email'");
		$row = $query->row();
		$cek_email = $row->total;

		// $this->db->select('*');
        // $this->db->from('mitra');
		// $this->db->where('email', $t_email);
		// $cek_email = $this->db->get()->result();
		// var_dump($cek_email);
		// exit;
		if ($cek_email > 0) {
			$this->session->set_flashdata('msg_email', 
			'<div class="alert alert-warning" role="alert">
				Gagal Tambah Data - Email Sudah Digunakan!
			</div>');
			redirect('master_mitra/add');
			
		}else{
		$this->M_mitra->proses_add_data();
		$this->session->set_flashdata('pesan', 
			'<div class="alert alert-success" role="alert">
				Data Berhasil Ditambah!
			</div>');
		redirect('master_mitra','refresh');
		}
	}

	function proses_edit_data()
	{
		$id = $this->input->post('id');
		// $t_email = $this->input->post('email');
		// $this->db->select('*');
        // $this->db->from('mitra');
		// $this->db->where('email', $t_email);
		// $cek_email = $this->db->get()->result();

		$t_email = $this->input->post('email');
		$query = $this->db->query("SELECT COUNT(mitra_id) as total FROM mitra WHERE email = '$t_email'");
		$row = $query->row();
		$cek_email = $row->total;

		// print_r($cek_email);
		if ($cek_email > 0) {
			$this->session->set_flashdata('msg_email', 
			'<div class="alert alert-warning" role="alert">
				Gagal Edit Data - Email Sudah Digunakan!
			</div>');
			redirect('master_mitra/edit/'.$id);
			
		}else{
		$this->M_mitra->proses_edit_data();
		$this->session->set_flashdata('pesan', 
			'<div class="alert alert-info" role="alert">
				Data Berhasil Diubah!
			</div>');
		redirect('master_mitra','refresh');
		}

	}

	function hapus_data()
	{
		$this->M_mitra->hapus_data();
		$this->session->set_flashdata('pesan', 
			'<div class="alert alert-danger" role="alert">
				Data Berhasil Dihapus!
			</div>');
		redirect('master_mitra','refresh');
	}

}

/* End of file master_mitra.php */
/* Location: ./application/controllers/master_mitra.php */
