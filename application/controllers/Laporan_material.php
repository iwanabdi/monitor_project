<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Laporan_material extends CI_Controller {

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
		$this->load->model('M_Testcom'); 
		$this->load->model('M_Survey'); 
		$this->load->model('M_material');
		$this->load->model('M_LaporanMitra'); 
	}

	public function index()
	{
		$array = array(
		 	'status' => '0'
		 );
		$status = $this->session->set_userdata($array);
		$this->template->load('template_pegawai', 'Laporan/laporan_material',$status);
	}

	public function data_masuk()
	{
		$tgl_awal	= $this->input->post('tgl_awal');
		$tgl_akhir	= $this->input->post('tgl_akhir');
		// var_dump($tgl_awal,$tgl_akhir);
		// exit;
		$array = array(
			'status' => '1'
		);
		$data['tgl_awal'] = $tgl_awal;
		$data['tgl_akhir'] = $tgl_akhir;
		$data['status'] = $this->session->set_userdata($array);
		$data['row'] = $this->M_material->laporan_material($tgl_awal,$tgl_akhir);
		$this->template->load('template_pegawai', 'Laporan/material/masuk', $data);
		// var_dump($data['row']);
	}

	public function data_keluar()
	{
		$tgl_awal		= $this->input->post('tgl_awal');
		$tgl_akhir		= $this->input->post('tgl_akhir');
		// var_dump($tgl_awal,$tgl_akhir);
		// exit;
		$array = array(
			'status' => '1'
		);
		$data['tgl_awal'] = $tgl_awal;
		$data['tgl_akhir'] = $tgl_akhir;
		$data['status'] = $this->session->set_userdata($array);
		$data['row'] = $this->M_material->laporan_keluar($tgl_awal,$tgl_akhir);
		$this->template->load('template_pegawai', 'Laporan/material/keluar', $data);
		// var_dump($data['row']);
	}

}

/* End of file laporan_material.php */
/* Location: ./application/controllers/laporan/laporan_material.php */
