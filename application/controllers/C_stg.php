<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_stg extends CI_Controller {

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
	}

	public function index()
	{
		$data['mitra'] = $this->M_mitra->get_mitra();
		$data['project'] = $this->M_project->get_project();
		$this->template->load('template_pegawai', 'SuratTugas/stg' , $data);
	}
	public function daftarPilih($project_id)
	{
	
	
		if(null === $this->session->userdata('idpilih')){
			//belum pernah suka makanan apapun
			$daftarPilih = [];
			// $daftarPilih[$project_id] = $this->M_project->detail($project_id); ;
			$this->session->set_userdata('idpilih',$daftarPilih);
		}
		else{
			//seandainya sudah pernah sedang favorite/suka
			$daftarSuka = $this->session->userdata('idpilih');
			// $daftarSuka[$project_id] = $this->foodModel->detail($project_id);
			$this->session->set_userdata('idpilih',$daftarSuka);
		}
		
		// return redirect('C_stg');
	}

	
}

