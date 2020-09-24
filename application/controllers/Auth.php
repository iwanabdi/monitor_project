<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel');
	}

	public function login_pegawai()
	{
		ceksdh_login_pegawai();
		$this->load->view('pegawai/login_pegawai');
	}

	public function process_pegawai()
	{
		$post = $this->input->POST(NULL, TRUE);
		if (isset($post['login_pegawai'])) {
			$query = $this->UserModel->login_pegawai($post);
			if ($query->num_rows() > 0) {
				$row = $query->row();
				$param = array(
					'pegawai_id' 	=> $row->pegawai_id,
					'nama_pegawai' 	=> $row->nama_pegawai,
					'email'			=> $row->email,
					'no_telp'		=> $row->no_telp,
					'jabatan'		=> $row->jabatan
				);
				$this->session->set_userdata($param);
				echo 
				"<script>
					alert('Login Berhasil');
					window.location='".site_url('pegawai')."';
				</script>";
			}else{
				echo 
				"<script>
					alert('Login Gagal');
					window.location='".redirect('auth/login_pegawai','refresh')."';
				</script>";
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('home','refresh');
	}

	public function login_mitra()
	{
		$this->load->view('mitra/login_mitra');
	}

	public function process_mitra()
	{
		$post = $this->input->POST(NULL, TRUE);
		if (isset($post['login_mitra'])) {
			$query = $this->UserModel->login_mitra($post);
			if ($query->num_rows() > 0) {
				$row = $query->row();
				$param = array(
					'mitra_id' 		=> $row->mitra_id,
					'nama_mitra'	=> $row->nama_mitra
				);
				$this->session->set_userdata($param);
				echo 
				"<script>
					alert('Login Berhasil');
					window.location='".site_url('mitra')."';
				</script>";
			}else{
				echo 
				"<script>
					alert('Login Gagal');
					window.location='".redirect('auth/login_mitra','refresh')."';
				</script>";
			}
		}
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */