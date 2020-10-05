<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_pegawai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		cekblm_login_pegawai();
		cek_akses();
		$this->load->model('UserModel');
		$this->load->model('M_pegawai');
	}

	public function index()
	{
		$email = $this->session->userdata('email');
		$data['row'] = $this->M_pegawai->get_profile($email);
		$this->template->load('template_pegawai', 'pegawai/profile', $data);
		// var_dump($data['row']);
	}

	function proses_edit_profile()
	{
		$this->M_pegawai->proses_edit_profile();
		$this->session->set_flashdata('pesan', 
			'<div class="alert alert-info" role="alert">
				Data Berhasil Diubah!
			</div>');
		redirect('profile_pegawai','refresh');

	}

}

/* End of file Profile_pegawai.php */
/* Location: ./application/controllers/Profile_pegawai.php */