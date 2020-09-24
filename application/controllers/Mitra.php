<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mitra extends CI_Controller {

	public function index()
	{
		$this->template->load('template_mitra', 'Mitra/dashboard');
	}

}

/* End of file Mitra.php */
/* Location: ./application/controllers/Mitra.php */