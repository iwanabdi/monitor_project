<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PO extends CI_Controller {

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
    }
    
    public function req($id)
	{
        $data['mitra']			= $this->M_mitra->get_mitra();
        $data['pekerjaan']		= $this->M_pekerjaan->get_pekerjaan();
        $data['project'] 		= $this->M_project->get_detail($id)->row();
		$data['mitra_pilih'] 	= $this->M_stg->get_stg($id)->row();
		$this->template->load('template_pegawai', 'PO/req', $data);
	}
	
	public function index()
	{
		$data['po'] 		= $this->M_po->get_po();
		$this->template->load('template_pegawai', 'PO/data', $data);
    }

    public function req_po()
	{
		$this->M_po->proses_add_pr();
		$this->session->set_flashdata('pesan', 
			'<div class="alert alert-success" role="alert">
				Berhasil Request PO!
			</div>');
		redirect('PO','refresh');
	}
	
	public function create($id)
	{
		$data['po'] 		= $this->M_po->get_po($id)->row();
		$data['pekerjaan']	= $this->M_pekerjaan->get_pekerjaan();
		$data['dpr']	= $this->M_po->get_dpr($id);
		$this->template->load('template_pegawai', 'PO/create', $data);
	}

	public function edit($id)
	{
		$data['po'] 		= $this->M_po->get_po($id)->row();
		$data['pekerjaan']	= $this->M_pekerjaan->get_pekerjaan();
		$po_no 				= $data['po']->po_no;
		$data['dpo']	= $this->M_po->get_dpo($po_no);
		$this->template->load('template_pegawai', 'PO/edit', $data);
	}

	public function approve($id)
	{
		$data['po'] 		= $this->M_po->get_po($id)->row();
		$data['dpr']	= $this->M_po->get_dpr($id);
		$data['pekerjaan']	= $this->M_pekerjaan->get_pekerjaan();
		$po_no 				= $data['po']->po_no;
		$data['dpo']	= $this->M_po->get_dpo($po_no);
		$this->template->load('template_pegawai', 'PO/approve', $data);
	}
	
	public function buat_po()
	{
		$this->M_po->proses_buat_po();
		$this->session->set_flashdata('pesan', 
			'<div class="alert alert-success" role="alert">
				Berhasil Create PO!
			</div>');
		redirect('PO','refresh');
	}

	public function edit_po()
	{
		$this->M_po->proses_edit_po();
		$this->session->set_flashdata('pesan', 
			'<div class="alert alert-success" role="alert">
				Berhasil Edit PO!
			</div>');
		redirect('PO','refresh');
	}

	public function approve_po()
	{
		$this->M_po->proses_approve_po();
		$this->session->set_flashdata('pesan', 
			'<div class="alert alert-success" role="alert">
				Berhasil Approve PO!
			</div>');
		redirect('PO','refresh');
	}
}
