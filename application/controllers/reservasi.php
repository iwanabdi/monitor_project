<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class reservasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		cekblm_login_pegawai();
		cek_akses();
		$this->load->model('UserModel');
		$this->load->model('M_project');
		$this->load->model('M_pegawai');
		$this->load->model('M_material');
    }
    
    public function index()
	{
		$data['project'] = $this->M_project->get_project();
		$this->template->load('template_pegawai', 'reservasi/awal', $data);
	}

	public function proses_masuk()
	{
		$PA = $this->input->post('project_id');
		redirect('reservasi/buat/'.$PA ,'refresh');
	}

	public function buat($id)
	{
		$data['project'] = $this->M_project->get_detail($id)->row();
		$data['material'] = $this->M_material->get_material();
		$this->template->load('template_pegawai', 'reservasi/buat', $data);
	}
}