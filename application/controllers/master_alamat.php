<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_alamat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		cekblm_login_pegawai();
		cek_akses();
		$this->load->model('UserModel');
		$this->load->model('M_alamat');
		$this->load->model('M_customer');
	}

	public function index()
	{
		$alamat 	= $this->M_alamat->get_alamat();
		$customer 	= $this->M_customer->get_customer();
		$data = [
			'row' 			=> $alamat,
			'rowcustomer'	=> $customer
		];
		// $data['rowcustomer'] = $this->M_customer->get_customer();
		$this->template->load('template_pegawai', 'pegawai/data_alamat', $data);
	}

	function proses_add_data()
	{
		$this->M_alamat->proses_add_data();
		$this->session->set_flashdata('pesan', 
			'<div class="alert alert-success" role="alert">
				Data Berhasil Ditambah!
			</div>');
		redirect('master_alamat','refresh');
	}

	function proses_edit_data()
	{
		$this->M_alamat->proses_edit_data();
		$this->session->set_flashdata('pesan', 
			'<div class="alert alert-info" role="alert">
				Data Berhasil Diubah!
			</div>');
		redirect('master_alamat','refresh');

	}

	function hapus_data()
	{
		$this->M_alamat->hapus_data();
		$this->session->set_flashdata('pesan', 
			'<div class="alert alert-danger" role="alert">
				Data Berhasil Dihapus!
			</div>');
		redirect('master_alamat','refresh');
	}

}

/* End of file master_alamat.php */
/* Location: ./application/controllers/master_alamat.php */
