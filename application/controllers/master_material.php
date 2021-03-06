<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_material extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		cekblm_login_pegawai();
		cek_akses_gudang();
		$this->load->model('UserModel');
		$this->load->model('M_material');
	}

	public function index()
	{
		$data['row'] = $this->M_material->get_material();
		$this->template->load('template_pegawai', 'material/data_material', $data);
	}

	public function add()
	{
		$this->template->load('template_pegawai', 'material/add_material');
	}

	public function edit($id)
	{
		$data['row'] = $this->M_material->get_material($id)->row();
		if ($data['row']->storage_bin == 1) {
			$data['satuan'] = "Unit";
		}elseif ($data['row']->storage_bin == 2) {
			$data['satuan'] = "Roll (1000 Unit)";
		}elseif ($data['row']->storage_bin == 3) {
			$data['satuan'] = "Drum (4000 Unit)";
		}
		$this->template->load('template_pegawai', 'material/edit_material', $data);
	}

	public function item($id)
	{
		$data['row'] = $this->M_material->get_material($id)->row();
		$this->template->load('template_pegawai', 'material/add_sn', $data);
	}

	function proses_add_data()
	{
		$this->M_material->proses_add_data();
		// $param = array(
		// 	"nama_material" 		=> $this->input->post('nama_material'),
    	// 	"brand"					=> $this->input->post('brand'),
    	// 	"stok"					=> $this->input->post('stok'),
    	// 	"storage_bin"			=> $this->input->post('storage_bin'),
		// 	"create_by"				=> $this->session->userdata('pegawai_id'),
		// 	"create_on"				=> date('Y-m-d'),
    	// 	"create_by"				=> $this->session->userdata('pegawai_id'),
		// 	"status"				=> 1
		// );
		// $this->session->set_userdata($param);
		// print_r($param);

		$this->session->set_flashdata('pesan', 
			'<div class="alert alert-success" role="alert">
				Data Berhasil Ditambah!
			</div>');
		redirect('master_material','refresh');
	}

	function proses_edit_data()
	{
		$this->M_material->tambah_stok();
		$this->session->set_flashdata('pesan', 
			'<div class="alert alert-info" role="alert">
				Stok Berhasil Ditambah!
			</div>');
		redirect('master_material','refresh');

	}

	function hapus_data()
	{
		$this->M_material->hapus_data();
		$this->session->set_flashdata('pesan', 
			'<div class="alert alert-danger" role="alert">
				Data Berhasil Dihapus!
			</div>');
		redirect('master_material','refresh');
	}

}

/* End of file master_pegawai.php */
/* Location: ./application/controllers/master_pegawai.php */
