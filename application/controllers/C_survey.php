<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_survey extends CI_Controller {

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
		$this->load->model('M_Survey'); 
		$this->load->model('M_Testcom'); 
		
	}

	public function index()
	{
		$data['row'] = $this->M_project->get_project();
		$data['pegawai'] = $this->M_pegawai->get_pm();
		$this->template->load('template_mitra', 'Survey/data_survey',$data);
	}
	public function detail($id)
	{
		$data = [
			'row' 			=> $this->M_project->get_project($id)->row(),
			'row_survey'	=> $this->M_Survey->get_survey($id)->row(),
			'row_testcom'	=> $this->M_Testcom->get_testcom($id)->row()
		]; 
		$this->template->load('template_mitra', 'survey/detail_survey', $data);
	}
	
	public function upload_map()
	{	
		$idProject = $this->input->post('id');
		$config['upload_path']          = './assets/survey';
		$config['allowed_types']        = 'jpeg|png|jpg|gdb|gpx|rar|zip';
		$config['overwrite']        	=  true;
		$config['file_name']        	=  $idProject.'_survey_map';
		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload('map'))
		{
				
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('pesan', 
				'<div class="alert alert-danger" role="alert">
					'.implode($error).'
				</div>');
				redirect('C_survey');
				
		}
		else
		{
			$this->M_Survey->add_map();
			$this->session->set_flashdata('pesan', 
			'<div class="alert alert-success" role="alert">
				Data Berhasil Ditambah!
			</div>');
			// $this->template->load('template_mitra', 'Survey/detail_uploads');

			redirect('C_survey');
		}
	}

	public function upload_excel()
	{	
		
		$idProject = $this->input->post('id');
		$config['upload_path']          = './assets/survey';
		$config['allowed_types']        = 'xls|xlsx';
		$config['overwrite']        	=  true;
		$config['file_name']        	=   $idProject.'_survey_excel';
		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload('excel'))
		{
				
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('pesan', 
				'<div class="alert alert-danger" role="alert">
					'.implode($error).'
				</div>');
				redirect('C_survey');
				
		}
		else
		{
			$this->M_Survey->add_excel();
			$this->session->set_flashdata('pesan', 
			'<div class="alert alert-success" role="alert">
				Data Berhasil Ditambah!
			</div>');
			// $this->template->load('template_mitra', 'Survey/detail_uploads');

			redirect('C_survey');
		}
	}

	
	
	
	

	
}

