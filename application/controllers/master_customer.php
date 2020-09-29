<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_customer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		cekblm_login_pegawai();
		$this->load->model('UserModel');
		$this->load->model('M_customer');
	}

	public function index()
	{
		$data['row'] = $this->M_customer->get_customer();
		$this->template->load('template_pegawai', 'pegawai/data_customer', $data);
	}

	function proses_add_data()
	{
		$this->M_customer->proses_add_data();
		$this->session->set_flashdata('pesan', 
			'<div class="alert alert-success" role="alert">
				Data Berhasil Ditambah!
			</div>');
		redirect('master_customer','refresh');
	}

	function proses_edit_data()
	{
		$this->M_customer->proses_edit_data();
		$this->session->set_flashdata('pesan', 
			'<div class="alert alert-info" role="alert">
				Data Berhasil Diubah!
			</div>');
		redirect('master_customer','refresh');

	}

	function hapus_data()
	{
		$this->M_customer->hapus_data();
		$this->session->set_flashdata('pesan', 
			'<div class="alert alert-danger" role="alert">
				Data Berhasil Dihapus!
			</div>');
		redirect('master_customer','refresh');
	}

}

/* End of file master_customer.php */
/* Location: ./application/controllers/master_customer.php */