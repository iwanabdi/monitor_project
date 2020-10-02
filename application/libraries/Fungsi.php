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

		function count_pegawai()
		{
			$this->CI->load->model('M_pegawai');
			return $this->CI->M_pegawai->get_pegawai()->num_rows();
		}

		function count_mitra()
		{
			$this->CI->load->model('M_mitra');
			return $this->CI->M_mitra->get_mitra()->num_rows();
		}

		function count_customer()
		{
			$this->CI->load->model('M_customer');
			return $this->CI->M_customer->get_customer()->num_rows();
		}

	}

?>