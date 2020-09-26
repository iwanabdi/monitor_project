<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	public function index()
	{
		cekblm_login_pegawai();
		$this->template->load('template_pegawai', 'pegawai/dashboard');
		// $this->load->view('template');
	}

	public function profile()
	{
		cekblm_login_pegawai();
		$this->template->load('template_pegawai', 'pegawai/profile');
	}

}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */