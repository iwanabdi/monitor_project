<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_mitra extends CI_Controller {

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
		$data=[];
		$data['row'] = $this->M_LaporanMitra->get_mitra();
	
		$this->template->load('template_pegawai', 'laporan/laporan_mitra',$data);
	}
	public function cek()
	{
		$id = $_POST['mitra_id'];//mengambil mmitra id
		$status = $this->M_LaporanMitra->getStatus($id);
		// memisahkan status project
		$diposisi = 0;$survey = 0;$progres = 0;$testcom = 0;$dokumen = 0;$QC = 0;$close = 0;$baps=0;
		foreach ($status as $key => $data) {
			$cek = $data->status_project;
			
			if($cek == 1)$diposisi++;
			if($cek == 2)$survey++;
			if($cek == 3)$progres++;
			if($cek == 4)$testcom++;
			if($cek == 5)$dokumen++;
			if($cek == 6)$QC++;
			if($cek == 7)$baps++;
			if($cek == 8)$close++;

		}
		// $statusproject = array( 
		// 	'diposisi' 	=> $diposisi,
		// 	'survey' 	=> $survey,
		// 	'progres' 	=> $progres,
		// 	'testcom' 	=> $testcom,
		// 	'dokumen' 	=> $dokumen,
		// 	'QC' 		=> $QC,
		// 	'close' 	=> $close,
		// 	'baps' 		=> $baps
			
		// );
		$data['row'] = $this->M_LaporanMitra->get_jumlahproject($id);
		// $data['row'] = $statusproject;
		$data['row'] = $this->M_LaporanMitra->get_mitra();
		$this->template->load('template_pegawai', 'laporan/laporan_mitra',$data);
	
		// 1 diposisi, 2 survey, 3 progres, 4, testcom, 5 dokumen, 6 qc ok, 7 baps , 8 close
	

	}

}

/* End of file laporan_mitra.php */
/* Location: ./application/controllers/laporan/laporan_mitra.php */
