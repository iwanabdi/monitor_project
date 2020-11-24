<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_LaporanMitra extends CI_Controller {

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
		
	}

	public function index()
	{
		$id= $this->session->userdata('mitra_id');
		$data['view'] = $this->M_LaporanMitra->get_view($id);
		
		$data['row'] = $this->M_project->get_project();
		$data['pegawai'] = $this->M_pegawai->get_pm();
		$this->template->load('template_mitra', 'UploadMitra/data_UploadLaporan',$data);
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
	
	public function upload_pdf()
	{	
		
		$idProject = $this->input->post('id');
		$config['upload_path']          = './assets/LaporanMitra/pdf';
		$config['allowed_types']        = 'pdf|rar|zip';
		$config['overwrite']        	=  true;
		$config['file_name']        	=  $idProject.'_laporan_pdf';
		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload('berkas'))
		{
				
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('pesan', 
					'<div class="alert alert-danger" role="alert">
						'.implode($error).'
					</div>');
				redirect('C_LaporanMitra');
				
		}
		else
		{
			$this->M_LaporanMitra->add_pdf();
			$this->session->set_flashdata('pesan', 
			'<div class="alert alert-success" role="alert">
				File PDF berhasil di upload!
			</div>');
			// $this->template->load('template_mitra', 'Survey/detail_uploads');

			redirect('C_LaporanMitra');
		}
	}

	public function upload_gdb()
	{	
		$idProject = $this->input->post('id');
		$config['upload_path']          = './assets/LaporanMitra/gdb';
		$config['allowed_types']        = 'rar|zip|gdb|gpx';
		$config['overwrite']        	=  true;
		$config['file_name']        	=  $idProject.'_laporan_gdb';
		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload('berkas'))
		{
				
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('pesan', 
				'<div class="alert alert-danger" role="alert">
					'.implode($error).'
				</div>');
			redirect('C_LaporanMitra');
		}
		else
		{
			$this->M_LaporanMitra->add_gdb();
			$this->session->set_flashdata('pesan', 
			'<div class="alert alert-success" role="alert">
				File GDP berhasil di upload!
			</div>');
			// $this->template->load('template_mitra', 'Survey/detail_uploads');

			redirect('C_LaporanMitra');
		}
	}
	public function upload_bom()
	{	
		$idProject = $this->input->post('id');
		$config['upload_path']          = './assets/LaporanMitra/bom';
		$config['allowed_types']        = 'zip|rar|xls|xlsx';
		$config['overwrite']        	=  true;
		$config['file_name']        	=  $idProject.'_laporan_bom';
		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload('berkas'))
		{
				
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('pesan', 
				'<div class="alert alert-danger" role="alert">
					'.implode($error).'
				</div>');
			redirect('C_LaporanMitra');
				
		}
		else
		{
			$this->M_LaporanMitra->add_bom();
			$this->session->set_flashdata('pesan', 
			'<div class="alert alert-success" role="alert">
				File BOM berhasil di upload!
			</div>');
			// $this->template->load('template_mitra', 'Survey/detail_uploads');

			redirect('C_LaporanMitra');
		}
	}
	

	
	
	

	
}

