<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class stg extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
		cekblm_login_pegawai();
		cek_akses();
        $this->load->model('UserModel');
        $this->load->model('M_stg');
	}

	public function index()
	{
		$data['row'] = $this->M_stg->get_stg(); 
		$this->template->load('template_pegawai', 'stg/data_stg', $data);
	}
}