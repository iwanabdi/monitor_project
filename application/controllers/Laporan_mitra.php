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
	}

	public function index()
	{
		$data['row'] = $this->M_mitra->get_mitra();
		
		$array = array(
		 	'status' => '0'
		 );
	
		$data['status'] = $this->session->set_userdata($array);
		$this->template->load('template_pegawai', 'laporan/laporan_mitra', $data);
	}

	public function data_mitra()
	{
		$mitra = $this->input->post('status');
	
	
		$array = array(
		 	'status' => $mitra
		 );
		$data['status'] = $this->session->set_userdata($array);
		$data['jproject'] = $this->M_LaporanMitra->get_jumlahproject($mitra);
		$data['row'] = $this->M_mitra->get_mitra();
		$data['performa'] = $this->M_LaporanMitra->get_performa($mitra)->result();
		$data['rows'] = $this->M_LaporanMitra->get_status_project($mitra)->result();
		$this->template->load('template_pegawai', 'laporan/laporan_mitra', $data);
	}

	public function detail_mitra()
	{
		$mitra = $this->input->post('id');
		$data['project'] = $this->M_project->project_mitra($mitra)->row_array();
		$data['rows'] = $this->M_project->get_status_project($mitra);
		echo json_encode($mitra);
	}

}

/* End of file laporan_mitra.php */
/* Location: ./application/controllers/laporan/laporan_mitra.php */
