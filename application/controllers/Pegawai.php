<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends MY_Controller {

	public function home()
	{
		$this->load->view('Pegawai/dashboard');
	}

	public function master_pegawai()
	{
		$this->load->view('Pegawai/data_pegawai');
	}

}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */