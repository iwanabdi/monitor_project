<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_mitra extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		cekblm_login_mitra();
		cek_akses();
		$this->load->model('UserModel');
		$this->load->model('M_mitra');
	}

	public function index()
	{
		$mitra_id = $this->session->userdata('mitra_id');
		$data['row'] = $this->M_mitra->get_profile($mitra_id);
		$this->template->load('template_mitra', 'mitra/profile', $data);
		// var_dump($data['row']);
	}

	function proses_edit_profile()
	{
		$this->M_mitra->proses_edit_profile();
		$this->session->set_flashdata('pesan', 
			'<div class="alert alert-info" role="alert">
				Data Berhasil Diubah!
			</div>');
		redirect('profile_mitra','refresh');

	}

}

/* End of file Profile_mitra.php */
/* Location: ./application/controllers/Profile_mitra.php */