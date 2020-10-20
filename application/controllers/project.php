<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class project extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		cekblm_login_pegawai();
		cek_akses();
		$this->load->model('UserModel');
		$this->load->model('M_project');
		$this->load->model('M_customer');
		$this->load->model('M_alamat');
		$this->load->model('M_product');
	}

	public function index()
	{
		$data['row'] = $this->M_project->get_project();
		$this->template->load('template_pegawai', 'project/data_project', $data);
	}

	public function add()
	{
		$data['customer'] = $this->M_customer->get_customer();
		$data['alamat'] = $this->M_alamat->get_alamat();
		$data['product'] = $this->M_product->get_product();
		$this->template->load('template_pegawai', 'project/add_project', $data);
	}

	// public function edit($id)
	// {
		
	// 	$data['row'] = $this->M_pekerjaan->get_pekerjaan($id)->row();
	// 	$this->template->load('template_pegawai', 'pekerjaan/edit_pekerjaan', $data);
	// }

	function proses_add_data()
	{
		$this->M_project->proses_add_data();
		$this->session->set_flashdata('pesan', 
			'<div class="alert alert-success" role="alert">
				Data Berhasil Ditambah!
			</div>');
		redirect('project','refresh');
	}

	// function proses_edit_data()
	// {
	// 	$this->M_pekerjaan->proses_edit_data();
	// 	$this->session->set_flashdata('pesan', 
	// 		'<div class="alert alert-info" role="alert">
	// 			Data Berhasil Diubah!
	// 		</div>');
	// 	redirect('master_pekerjaan','refresh');
	// }

	// function hapus_data()
	// {
	// 	$this->M_pekerjaan->hapus_data();
	// 	$this->session->set_flashdata('pesan', 
	// 		'<div class="alert alert-danger" role="alert">
	// 			Data Berhasil Dihapus!
	// 		</div>');
	// 	redirect('master_pekerjaan','refresh');
	// }

}
