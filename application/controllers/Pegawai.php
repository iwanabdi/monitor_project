<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	public function index()
	{
		$this->load->view('Pegawai/login_pegawai');
	}

}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */