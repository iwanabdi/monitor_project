<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_product extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		cekblm_login_pegawai();
		cek_akses();
		$this->load->model('UserModel');
		$this->load->model('M_product');
	}

	public function index()
	{
		$data['row'] = $this->M_product->get_product();
		$this->template->load('template_pegawai', 'product/data_product', $data);
	}

	public function add()
	{
		$this->template->load('template_pegawai', 'product/add_product');
	}

	public function edit($id)
	{
		$data['row'] = $this->M_product->get_product($id)->row();
		$this->template->load('template_pegawai', 'product/edit_product', $data);
	}

	function proses_add_data()
	{
		$this->M_product->proses_add_data();
		$this->session->set_flashdata('pesan', 
			'<div class="alert alert-success" role="alert">
				Data Berhasil Ditambah!
			</div>');
		redirect('master_product','refresh');
	}

	function proses_edit_data()
	{
		$this->M_product->proses_edit_data();
		$this->session->set_flashdata('pesan', 
			'<div class="alert alert-info" role="alert">
				Data Berhasil Diubah!
			</div>');
		redirect('master_product','refresh');

	}

	function hapus_data()
	{
		$this->M_product->hapus_data();
		$this->session->set_flashdata('pesan', 
			'<div class="alert alert-danger" role="alert">
				Data Berhasil Dihapus!
			</div>');
		redirect('master_product','refresh');
	}

}

/* End of file master_product.php */
/* Location: ./application/controllers/master_product.php */
