<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('UserModel');
	}

	public function index(){
		if($this->session->userdata('authenticated')) // Jika user sudah login (Session authenticated ditemukan)
			redirect('Pegawai/home'); // Redirect ke page home

		// function render_login tersebut dari file core/MY_Controller.php
		$this->render_login('Pegawai/login_pegawai'); // Load view login.php
	}

	public function login(){
		$username = $this->input->post('email'); // Ambil isi dari inputan username pada form login
		$password = md5($this->input->post('password')); // Ambil isi dari inputan password pada form login dan encrypt dengan md5

		$user = $this->UserModel->get($username); // Panggil fungsi get yang ada di UserModel.php

		if(empty($user)){ // Jika hasilnya kosong / user tidak ditemukan
			$this->session->set_flashdata('msg', 'Username tidak ditemukan'); // Buat session flashdata
			redirect('auth'); // Redirect ke halaman login
		}else{
			if($password == $user->Password){ // Jika password yang diinput sama dengan password yang didatabase
				$session = array(
					'authenticated'	=> TRUE, // Buat session authenticated dengan value true
					'Email'			=> $user->Email,  // Buat session username
					'Nama_Pegawai'	=> $user->Nama_Pegawai, // Buat session nama
					'Jabatan'		=> $user->Jabatan // Buat session role
				);

				$this->session->set_userdata($session); // Buat session sesuai $session
				redirect('Pegawai/home'); // Redirect ke halaman home
			}else{
				$this->session->set_flashdata('msg', 'Password salah'); // Buat session flashdata
				redirect('auth'); // Redirect ke halaman login
			}
		}
	}

	public function logout(){
		$this->session->sess_destroy(); // Hapus semua session
		redirect('auth'); // Redirect ke halaman login
	}
}
