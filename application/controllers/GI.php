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
    }
    
    public function index()
	{
		$data['reservasi'] = $this->M_reservasi->get_reservasi();
		$this->template->load('template_pegawai', 'GI/home', $data);
	}
}
