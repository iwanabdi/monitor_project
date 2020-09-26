<?php 
	
	/**
	 * 
	 */
	class Fungsi
	{
		protected $CI;

		function __construct()
		{
			$this->CI =& get_instance();
		}

		function user_login()
		{
			$this->CI->load->model('UserModel');
			$user_id = $this->CI->session->userdata('pegawai_id');
			$user_data = $this->CI->UserModel->get_pegawai($user_id)->row();
			return $user_data;
		}
	}

?>