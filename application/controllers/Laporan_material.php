<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Laporan_material extends CI_Controller {

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
		$this->load->model('M_mitra'); 
		$this->load->model('M_Testcom'); 
		$this->load->model('M_Survey'); 
		$this->load->model('M_LaporanMitra'); 
	}

	public function index()
	{
		$this->template->load('template_pegawai', 'Laporan/laporan_material');
	}

}

/* End of file laporan_material.php */
/* Location: ./application/controllers/laporan/laporan_material.php */