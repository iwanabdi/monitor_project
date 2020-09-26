<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		cekblm_login_pegawai();
		$this->load->model('UserModel');
		$data['row'] = $this->UserModel->get_pegawai();
		$data['row1'] = $this->UserModel->get_mitra();

		$this->template->load('template_pegawai','pegawai/user', $data);		
	}

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */