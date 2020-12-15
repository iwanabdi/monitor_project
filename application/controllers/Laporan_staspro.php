<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_staspro extends CI_Controller {

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
		$this->load->model('M_LaporanMitra'); 
	}

	public function index()
	{
		$data['row'] = $this->M_mitra->get_mitra();
		
		$array = array(
		 	'cek' => '0'
		 );
	
		$data['cek'] = $this->session->set_userdata($array);
		$this->template->load('template_pegawai', 'laporan/status_project', $data);
	}

	public function data_project()
	{
		$tgl_awal	= $this->input->post('tgl_awal');
		$tgl_akhir	= $this->input->post('tgl_akhir');
		//  var_dump($tgl_awal,$tgl_akhir);
		// exit;
		$array = array(
			'cek' => '1'
		);
		$data['tgl_awal'] = $tgl_awal;
		$data['tgl_akhir'] = $tgl_akhir;
		$data['cek'] = $this->session->set_userdata($array);
		$data['pa'] = $this->M_project->jumlahpa($tgl_awal,$tgl_akhir)->result();
		$data['onproses'] = $this->M_project->jumlahonproses($tgl_awal,$tgl_akhir)->result();
		$data['testcom'] = $this->M_project->jumlahtestcom($tgl_awal,$tgl_akhir)->result();
		$data['avgaging'] = $this->M_project->avgaging($tgl_awal,$tgl_akhir)->result();
		$this->template->load('template_pegawai', 'Laporan/status_project', $data);
	}

	

}

/* End of file laporan_mitra.php */
/* Location: ./application/controllers/laporan/laporan_mitra.php */
