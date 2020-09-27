<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_alamat extends CI_Controller {

	public function index()
	{
		cekblm_login_pegawai();
		$this->load->model('UserModel');
		$data['row'] = $this->UserModel->get_alamat();
		$this->template->load('template_pegawai', 'pegawai/data_alamat', $data);
	}

}

/* End of file master_pegawai.php */
/* Location: ./application/controllers/master_pegawai.php */
