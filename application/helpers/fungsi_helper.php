<?php 

	function ceksdh_login_pegawai()
	{
		$CI =& get_instance();
		$user_session = $CI->session->userdata('pegawai_id');
		if ($user_session) {
			echo "<script>alert('Sudah Login, Logout Dulu Bosss')</script>";
			redirect('pegawai','refresh');
		}
	}

	function cekblm_login_pegawai()
	{
		$CI =& get_instance();
		$user_session = $CI->session->userdata('pegawai_id');
		if (!$user_session) {
			echo "<script>alert('Login Dulu Bosss')</script>";
			redirect('auth/login_pegawai','refresh');
		}
	}

	function ceksdh_login_mitra()
	{
		$CI =& get_instance();
		$user_session = $CI->session->userdata('mitra_id');
		if ($user_session) {
			echo "<script>alert('Sudah Login, Logout Dulu Bosss')</script>";
			redirect('Mitra','refresh');
		}
	}

	function cekblm_login_mitra()
	{
		$CI =& get_instance();
		$user_session = $CI->session->userdata('mitra_id');
		if ($user_session) {
			echo "<script>alert('Login Dulu Bosss')</script>";
			redirect('Auth/login_mitra','refresh');
		}
	}

 ?>