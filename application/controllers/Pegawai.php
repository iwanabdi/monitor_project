<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	public function index()
	{
		cekblm_login_pegawai();
		if ($this->fungsi->user_login()->jabatan == 3) {
			$this->template->load('template_pegawai', 'pegawai/dashboard_gudang');
		}else{
			$this->template->load('template_pegawai', 'pegawai/dashboard');
		}
		// $this->load->view('template');
	}

	public function profile()
	{
		cekblm_login_pegawai();
		$this->template->load('template_pegawai', 'profile');
	}

}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */
