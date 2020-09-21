<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function cekLogin($user,$pass){
		$query = $this->db
					->FROM("pegawai")
					->SELECT("count(*) as jumlah")
					->WHERE("Nama_Pegawai", $user)
					->WHERE("Password", $pass)
					->get();
		$berhasil = $query->row()->jumlah;
		return $berhasil;
	}
}

/* End of file login_model.php */
/* Location: ./application/models/login_model.php */