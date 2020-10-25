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
		$this->load->model('M_pegawai');
	}

	public function index()
	{
		$data['row'] = $this->M_project->get_project();
		$data['pegawai'] = $this->M_pegawai->get_pm();
		$this->template->load('template_pegawai', 'project/data_project', $data);
	}

	public function detail($id)
	{
		$data['row'] = $this->M_project->get_project($id)->row();
		$this->template->load('template_pegawai', 'project/detail_project', $data);
	}

	public function add()
	{
		$data['customer'] = $this->M_customer->get_customer();
		$data['alamat'] = $this->M_alamat->get_alamat();
		$data['product'] = $this->M_product->get_product();
		$this->template->load('template_pegawai', 'project/add_project', $data);
	}

	function proses_add_data()
	{
		$this->M_project->proses_add_data();
		$this->session->set_flashdata('pesan', 
			'<div class="alert alert-success" role="alert">
				Data Berhasil Ditambah!
			</div>');
		redirect('project','refresh');
	}

	function dispos_pm()
	{
		$this->M_project->proses_dispos_pm();
		$this->session->set_flashdata('pesan', 
			'<div class="alert alert-success" role="alert">
				Berhasil Dispose!
			</div>');
		redirect('project','refresh');
	}

}

