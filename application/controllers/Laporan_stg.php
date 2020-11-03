<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_stg extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		cekblm_login_pegawai();
		cek_akses();
		require_once APPPATH.'third_party/dompdf/dompdf_config.inc.php';
		$this->load->model('UserModel');
		$this->load->model('M_project');
		$this->load->model('M_customer');
		$this->load->model('M_alamat');
		$this->load->model('M_product');
		$this->load->model('M_pegawai');
		$this->load->model('M_mitra');
		$this->load->model('M_stg');
	}

	public function index()
	{
		$this->template->load('template_pegawai', 'SuratTugas/dompdf');

		// $this->load->library('mypdf');
		// $this->mypdf->generate('SuratTugas/dompdf');
		// $this->template->load('template_pegawai', 'SuratTugas/laporan');
	}

	public function cetak_stg()
	{
		$dompdf = new Dompdf();
		$data = array(
						"nama"	=> "Testing",
						"url"	=> "http://facebook.com"
		);
		$html = $this->load->view('template_pegawai', 'SuratTugas/dompdf', $data, TRUE);
		$dompdf->load_html($html);

		$dompdf->set_paper('A4', 'potrait');
		$dompdf->render();
		$pdf = $dompdf->output();
		$dompdf->stream('laporan_stg.pdf', array("Attachment" => FALSE));
	}

}
