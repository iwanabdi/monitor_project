<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_ProjectMitra extends CI_Controller {

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
		$this->load->model('M_ProjectMitra'); 
		
	}

	public function index()
	{
		$id= $this->session->userdata('mitra_id');
	
		$data['view'] = $this->M_ProjectMitra->get_view($id);
		
		$data['row'] = $this->M_project->get_project();
		$data['pegawai'] = $this->M_pegawai->get_pm();
		$this->template->load('template_mitra', 'projectmitra/data_project', $data);
	}
	public function detail($id)
	{
		$data = [
			'row' 			=> $this->M_project->get_project($id)->row(),
			'row_testcom'	=> $this->M_Testcom->get_testcom($id)->row(),
			'row_survey'	=> $this->M_Survey->get_survey($id)->row(),
			'row_laporan' 		=> $this->M_LaporanMitra->get_laporan($id)->row()
		]; 
		$this->template->load('template_mitra', 'UploadMitra/detail_laporan', $data);
	}
	
	
	

	
	
	

	
}

