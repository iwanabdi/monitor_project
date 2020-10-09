<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class master_pekerjaan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		cekblm_login_pegawai();
		cek_akses();
		$this->load->model('UserModel');
		$this->load->model('M_pekerjaan');
	}

	public function index()
	{
		$data['row'] = $this->M_pekerjaan->get_pekerjaan();
		$this->template->load('template_pegawai', 'pekerjaan/data_pekerjaan', $data);
	}

	function proses_add_data()
	{
		$this->M_pekerjaan->proses_add_data();
		$this->session->set_flashdata('pesan', 
			'<div class="alert alert-success" role="alert">
				Data Berhasil Ditambah!
			</div>');
		redirect('master_pekerjaan','refresh');
	}

	function proses_edit_data()
	{
		$this->M_pekerjaan->proses_edit_data();
		$this->session->set_flashdata('pesan', 
			'<div class="alert alert-info" role="alert">
				Data Berhasil Diubah!
			</div>');
		redirect('master_pekerjaan','refresh');
	}

	function hapus_data()
	{
		$this->M_pekerjaan->hapus_data();
		$this->session->set_flashdata('pesan', 
			'<div class="alert alert-danger" role="alert">
				Data Berhasil Dihapus!
			</div>');
		redirect('master_pekerjaan','refresh');
	}

}

/* End of file master_pegawai.php */
/* Location: ./application/controllers/master_pegawai.php */
