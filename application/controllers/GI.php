<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GI extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		cekblm_login_pegawai();
		cek_akses();
		$this->load->model('UserModel');
		$this->load->model('M_project');
		$this->load->model('M_pegawai');
		$this->load->model('M_material');
		$this->load->model('M_reservasi');
		$this->load->model('M_mitra');
		$this->load->model('M_GI');
    }
    
    public function index()
	{
		$data['reservasi'] = $this->M_reservasi->get_reservasi();
		$data['GI'] = $this->M_GI->get_gi();
		$this->template->load('template_pegawai', 'GI/home', $data);
	}

	public function create()
	{
		$data['reservasi'] = $this->M_reservasi->get_reservasi();
		$data['mitra'] = $this->M_mitra->get_mitra();
		$this->template->load('template_pegawai', 'GI/create', $data);
	}

	public function lanjut()
	{
		$reservasi_no = $this->input->post('reservasi_no');
		$mitra_id = $this->input->post('mitra_id');
		$data['reservasi'] = $this->M_reservasi->get_reservasi($reservasi_no)->row();
		$data['mitra'] = $this->M_mitra->get_mitra($mitra_id)->row();
		$data['dreservasi'] = $this->M_reservasi->get_dreservasi($reservasi_no);
		return($this->template->load('template_pegawai','GI/lanjut', $data));
	}

	public function posting()
	{
		$this->M_GI->proses_gi();
		$this->session->set_flashdata('pesan', 
			'<div class="alert alert-success" role="alert">
				Data Berhasil Ditambah!
			</div>');
		redirect('GI','refresh');
	}
}
