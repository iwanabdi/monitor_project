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
		$this->template->load('template_pegawai', 'pegawai/data_mitra', $data);
	}

	function proses_add_data()
	{
		$this->M_mitra->proses_add_data();
		$this->session->set_flashdata('pesan', 
			'<div class="alert alert-success" role="alert">
				Data Berhasil Ditambah!
			</div>');
		redirect('master_mitra','refresh');
	}

	function proses_edit_data()
	{
		$this->M_mitra->proses_edit_data();
		$this->session->set_flashdata('pesan', 
			'<div class="alert alert-info" role="alert">
				Data Berhasil Diubah!
			</div>');
		redirect('master_mitra','refresh');

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