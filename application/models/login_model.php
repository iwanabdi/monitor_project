<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	//cek login pegawai
	function auth_pegawai($username,$password){
		$query = $this->db->query("SELECT * FROM pegawai WHERE Email=$username AND Password=MD5($password) LIMIT 1");
		return $query;
	}
	// cek login mitra
	function auth_mitra($username, $password){
		$query = $this->db->query("SELECT * FROM mitra WHERE Email=$username AND Password=MD5($password) LIMIT 1");
		return $query;
	}
	
}

/* End of file login_model.php */
/* Location: ./application/models/login_model.php */