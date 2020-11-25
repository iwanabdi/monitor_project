<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_testcom extends CI_Controller {

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
		
	}

	public function index()
	{
		$id= $this->session->userdata('mitra_id');
		$data['row'] = $this->M_Testcom->get_testcom($id);
		$data['pegawai'] = $this->M_pegawai->get_pm();
		$this->template->load('template_mitra', 'Testcom/data_testcom',$data);
	}
	public function detail($id)
	{
		$data = [
			'row' 			=> $this->M_project->get_project($id)->row(),
			'row_testcom'	=> $this->M_Testcom->get_testcom($id)->row(),
			'row_survey'	=> $this->M_Survey->get_survey($id)->row()
		]; 
		$this->template->load('template_mitra', 'Testcom/detail_testcom', $data);
	}
	
	public function upload_bai()
	{	
		
		$idProject = $this->input->post('id');
		$config['upload_path']          = './assets/testcom';
		if(!is_dir($config['upload_path'])){
		    //Directory does not exist, so lets create it.
		    mkdir($config['upload_path'], 0755, true);
		}
		$config['allowed_types']        = 'pdf';
		$config['overwrite']        	=  true;
		$config['file_name']        	=   $idProject.'_bai';
		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload('bai'))
		{
				
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('pesan', 
				'<div class="alert alert-danger" role="alert">
					'.implode($error).'
				</div>');
				redirect('C_testcom');
				
		}
		else
		{
			$this->M_Testcom->add_bai();
			$this->session->set_flashdata('pesan', 
			'<div class="alert alert-success" role="alert">
				Data Berhasil Ditambah!
			</div>');
			// $this->template->load('template_mitra', 'Survey/detail_uploads');

			redirect('C_testcom');
		}
	}

	public function upload_testcom()
	{	
		$idProject = $this->input->post('id');
		$config['upload_path']          = './assets/testcom';
		if(!is_dir($config['upload_path'])){
		    //Directory does not exist, so lets create it.
		    mkdir($config['upload_path'], 0755, true);
		}
		$config['allowed_types']        = 'pdf';
		$config['overwrite']        	=  true;
		$config['file_name']        	=  $idProject.'_testcom';;
		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload('testcom'))
		{
				
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('pesan', 
				'<div class="alert alert-danger" role="alert">
					'.implode($error).'
				</div>');
				redirect('C_testcom');
				
		}
		else
		{
			$this->M_Testcom->add_testcom();
			$this->session->set_flashdata('pesan', 
			'<div class="alert alert-success" role="alert">
				Data Berhasil Ditambah!
			</div>');
			// $this->template->load('template_mitra', 'Survey/detail_uploads');

			redirect('C_testcom');
		}
	}

	
	
	

	
}

