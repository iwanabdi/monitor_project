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
		$data['po'] 		= $this->M_gr->get_po();
		$this->template->load('template_pegawai', 'GR/data', $data);
    }
}