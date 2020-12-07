<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GR extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		cekblm_login_pegawai();
		cek_akses();
		$this->load->model('UserModel');
        $this->load->model('M_project');
        $this->load->model('M_mitra');
        $this->load->model('M_pekerjaan');
		$this->load->model('M_stg');
        $this->load->model('M_po');
		$this->load->model('M_gr');
        
    }
    
    public function index()
	{
		$data['gr'] 		= $this->M_gr->get_gr();
		$this->template->load('template_pegawai', 'GR/data', $data);
	}
	
	public function create($id)
	{
		$data['po'] 		= $this->M_po->get_po_gr($id)->row();
		$data['pekerjaan']	= $this->M_pekerjaan->get_pekerjaan();
		$data['dpo']	= $this->M_po->get_dpo($id);
		$this->template->load('template_pegawai', 'GR/create', $data);
	}

	public function buat_gr()
	{
		$this->M_gr->proses_buat_gr();
		$this->session->set_flashdata('pesan', 
			'<div class="alert alert-success" role="alert">
				Berhasil Create GR!
			</div>');
		redirect('GR','refresh');
	}

	public function approve($id)
	{
		$data['gr'] 	= $this->M_gr->get_gr($id)->row();
		$po_no 			= $data['gr']->po_no;
		$data['dpo']	= $this->M_po->get_dpo($po_no);
		$data['dgr']	= $this->M_gr->get_dgr($id);
		$this->template->load('template_pegawai', 'GR/approve', $data);
	}

	public function approve_gr()
	{
		$this->M_gr->proses_approve_gr();
		$this->session->set_flashdata('pesan', 
			'<div class="alert alert-success" role="alert">
				Berhasil Approve GR!
			</div>');
		redirect('GR','refresh');
	}
}