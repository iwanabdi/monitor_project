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
			$user_data = $this->CI->UserModel->get($user_id);
			return $user_data;
		}
	}

?>