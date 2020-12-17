<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_MitraProject extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		cekblm_login_mitra();
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
		$this->load->model('M_MitraProject'); 
		$this->load->model('M_stg');
		
	}

	public function index()
	{
		$id= $this->session->userdata('mitra_id');
	
		$data['view'] = $this->M_MitraProject->get_view($id);
		
		$data['row'] = $this->M_project->get_project();
		$data['pegawai'] = $this->M_pegawai->get_pm();
		$this->template->load('template_mitra', 'MitraProject/data_project', $data);
	}
	public function detail($id){
	// {
	// 	$data = [
	// 		'row' 			=> $this->M_project->get_project($id)->row(),
	// 		'row_testcom'	=> $this->M_Testcom->get_testcom($id)->row(),
	// 		'row_survey'	=> $this->M_Survey->get_survey($id)->row(),
	// 		'row_laporan' 		=> $this->M_LaporanMitra->get_laporan($id)->row()
	// 	]; 
	// 	$this->template->load('template_mitra', 'MitraProject/detail_project', $data);
			$data['row'] = $this->M_project->get_detail($id)->row();
			$data['mitra'] = $this->M_mitra->get_mitra();
			$data['mitraterpilih'] = $this->M_stg->get_stg($id)->row();
			$data['row_survey']	= $this->M_Survey->get_hasil($id)->row();
			$data['row_testcom']	= $this->M_Testcom->get_testcom($id)->row();
			$this->template->load('template_mitra', 'MitraProject/detail_project', $data);
	}

	public function cetak_stg($no_stg)
	{
		$data = [
			'row_spv'	=> $this->M_stg->spv()->row(),
			'row'		=> $this->M_stg->cetak(),
			'invoice' 	=> $this->M_stg->cetak_stg($no_stg)
		];
		$this->load->view('SuratTugas/cetak_stg', $data);
	}
	
	
	

	
	
	

	
}

