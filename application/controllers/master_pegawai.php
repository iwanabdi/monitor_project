<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_pegawai extends CI_Controller {

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
		$data['row'] = $this->M_pegawai->get_pegawai();
		$this->template->load('template_pegawai', 'pegawai/data_pegawai', $data);
	}

	public function add()
	{
		$this->template->load('template_pegawai', 'pegawai/add_pegawai');
	}

	public function edit($id)
	{
		
		$data['row'] = $this->M_pegawai->get_pegawai($id)->row();
		// $id = $this->input->post('pegawai_id');
		// var_dump($id);
		// exit;
		$this->template->load('template_pegawai', 'pegawai/edit_pegawai', $data);
	}

	function proses_add_data()
	{
		$t_email = $this->input->post('email');
		$this->db->select('*');
        $this->db->from('pegawai');
		$this->db->where('email', $t_email);
		$cek_email = $this->db->get()->result_array();
		$count = count($cek_email);
		// echo $count;
		if ($count > 0) {
			$this->session->set_flashdata('msg_email', 
			'<div class="alert alert-warning" role="alert">
				Gagal Tambah Data - Email Sudah Digunakan!
			</div>');
			redirect('master_pegawai/add');
			
		}else{
			$this->M_pegawai->proses_add_data();
			$this->session->set_flashdata('pesan', 
			'<span class="alert alert-success" role="alert">
				Data Berhasil Ditambah!
			</span>');
			redirect('master_pegawai','refresh');
		}
		
	}

	function proses_edit_data()
	{
		$id = $this->input->post('id');
		$t_email = $this->input->post('email');
		$this->db->select('*');
        $this->db->from('pegawai');
		$this->db->where('email', $t_email);
		$cek_email = $this->db->get()->result_array();
		$count = count($cek_email);
		// print_r($cek_email);
		if ($count > 0) {
			$this->session->set_flashdata('msg_email', 
			'<div class="alert alert-warning" role="alert">
				Gagal Edit Data - Email Sudah Digunakan!
			</div>');
			redirect('master_pegawai/edit/'.$id);
			
		}else{
		$this->M_pegawai->proses_edit_data();
		$this->session->set_flashdata('pesan', 
			'<div class="alert alert-info" role="alert">
				Data Berhasil Diubah!
			</div>');
		redirect('master_pegawai','refresh');
		}

	}

	function hapus_data()
	{
		$this->M_pegawai->hapus_data();
		$this->session->set_flashdata('pesan', 
			'<div class="alert alert-danger" role="alert">
				Data Berhasil Dihapus!
			</div>');
		redirect('master_pegawai','refresh');
	}

}

/* End of file master_pegawai.php */
/* Location: ./application/controllers/master_pegawai.php */
