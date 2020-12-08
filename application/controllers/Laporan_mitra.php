<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_mitra extends CI_Controller {

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
		$this->load->model('M_Laporan_Mitra'); 
	}

	public function index()
	{
		$data=[];
		$data['row'] = $this->M_Laporan_Mitra->get_mitra();
		// var_dump($data);
		// var_dump($data);exit;
		$this->template->load('template_pegawai', 'laporan/laporan_mitra',$data);
	}

}

/* End of file laporan_mitra.php */
/* Location: ./application/controllers/laporan/laporan_mitra.php */
