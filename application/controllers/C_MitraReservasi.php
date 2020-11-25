<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_MitraReservasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		cekblm_login_mitra();
		
		$this->load->model('UserModel');
		$this->load->model('M_project');
		$this->load->model('M_pegawai');
		$this->load->model('M_material');
		$this->load->model('M_reservasi');
		$this->load->model('M_MitraReservasi');
    }
    
    public function index()
	{
		$id = $this->session->userdata('mitra_id');
		$data['reservasi'] = $this->M_MitraReservasi->get_reservasi($id);
		$this->template->load('template_mitra', 'MitraReservasi/home', $data);
	}

	public function create()
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

	public function edit($id)
	{
		$data['reservasi'] = $this->M_reservasi->get_reservasi($id)->row();
		$data['material'] = $this->M_material->get_material();
		$this->template->load('template_pegawai', 'reservasi/edit', $data);
	}
	
	public function proses_reservasi()
	{
		// var_dump($this->input->post());
		$this->M_reservasi->proses_add_reservasi();
		$this->session->set_flashdata('pesan', 
			'<div class="alert alert-success" role="alert">
				Data Berhasil Ditambah!
			</div>');
		redirect('reservasi','refresh');
	}

	public function cetak_reservasi($id)
	{
		$data['row'] = $this->M_reservasi->hreservasi($id);
		$data['rows'] = $this->M_reservasi->hreservasi($id)->row();
		$this->load->view('reservasi/cetak_reservasi', $data);
	}

	public function pdf($id)
	{
		$data['row'] = $this->M_reservasi->hreservasi($id);
		$data['rows'] = $this->M_reservasi->hreservasi($id)->row();
		// $this->load->view('reservasi/cetak_reservasi', $data, true);
		$html = $this->load->view('reservasi/pdf_reservasi', $data, true);
		$mpdf = new \Mpdf\Mpdf();

		// Write some HTML code:
		$mpdf->WriteHTML($html);
		$nama_file_pdf = url_title($id,'dash','true').'-'.'reservasi'.'.pdf';
		// Output a PDF file directly to the browser
		$mpdf->Output($nama_file_pdf,'I');
	}
}
