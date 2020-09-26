<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mitra extends CI_Controller {

	public function index()
	{
		// cekblm_login_mitra();
		$this->template->load('template_mitra', 'mitra/dashboard');
	}

}

/* End of file Mitra.php */
/* Location: ./application/controllers/Mitra.php */