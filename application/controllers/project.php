<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class project extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		cekblm_login_pegawai();
		cek_akses();
		$this->load->model('UserModel');
		$this->load->model('M_project');
		$this->load->model('M_customer');
		$this->load->model('M_alamat');
		$this->load->model('M_product');
		$this->load->model('M_pegawai');
		$this->load->model('M_mitra');
		$this->load->model('M_stg');
		$this->load->model('M_Survey'); 
		$this->load->model('M_Testcom'); 
		$this->load->model('M_po');
	}

	public function index()
	{
		$data['row'] = $this->M_project->get_project();
		$data['pegawai'] = $this->M_pegawai->get_pm();
		$this->template->load('template_pegawai', 'project/data_project', $data);
	}

	public function detail($id)
	{
		$data['row'] = $this->M_project->get_detail($id)->row();
		$data['mitra'] = $this->M_mitra->get_mitra();
		$data['mitraterpilih'] = $this->M_stg->get_stg($id)->row();
		$data['row_survey']	= $this->M_Survey->get_hasil($id)->row();
		$data['row_testcom']	= $this->M_Testcom->get_testcom($id)->row();
		
		$query = $this->db->query("SELECT * FROM `project` WHERE project_id like '%$id%' ");
		$row = $query->row();
		$IOnum = $row->IO;
		$query = $this->db->query("SELECT * FROM `hpo` WHERE io_number like '%$IOnum%' ");
		$row = $query->row();
		// $a = count($row);
		// var_dump($row);
		// exit;
		if ($row != null) {
			// foreach ($row as $key => $a) {
				$PO = $row->po_no;
				// var_dump($a);
				// exit;
			$data['po'] = $this->M_po->get_po_gr($PO)->row();
		}else{
			// $PO = null;
			$data['po'] = null;
		}

		
		$this->template->load('template_pegawai', 'project/detail_project', $data);
	}

	public function add()
	{
		$data['customer'] = $this->M_customer->get_customer();
		$data['alamat'] = $this->M_alamat->get_alamat();
		$data['product'] = $this->M_product->get_product();
		$this->template->load('template_pegawai', 'project/add_project', $data);
	}

	public function ajax()
	{
		$ajx = $this->input->post('input_ajx');
		$ini = $this->M_alamat->get_alamat_cus($ajx)->result();
		echo json_encode($ini);
	}

	public function proses_add_data()
	{
		$this->M_project->proses_add_data();
		$this->session->set_flashdata('pesan', 
			'<div class="alert alert-success" role="alert">
				Data Berhasil Ditambah!
			</div>');
		redirect('project','refresh');
	}

	public function dispos_pm()
	{
		$this->M_project->proses_dispos_pm();
		$this->session->set_flashdata('pesan', 
			'<div class="alert alert-success" role="alert">
				Berhasil Dispose!
			</div>');
		redirect('project','refresh');
	}

	public function dispos_mitra()
	{
		$this->M_project->proses_dispos_mitra();
		$this->session->set_flashdata('pesan', 
			'<div class="alert alert-success" role="alert">
				Berhasil Dispose!
			</div>');
		redirect('project','refresh');
	}

	public function genio($id)
	{
		$data = $this->M_project->get_project($id)->row();
		if ($this->session->userdata('pegawai_id')==$data->pegawai_id || $this->session->userdata('jabatan')==-1){
			$this->M_project->genreate_io($id);
			$this->session->set_flashdata('pesan', 
				'<div class="alert alert-success" role="alert">
					Generate Sukses!
				</div>');
		}else {
			$this->session->set_flashdata('pesan', 
				'<div class="alert alert-success" role="alert">
					Anda Bukan PM dari Poject ini, Gagal Generate IO
				</div>');
		}
		
		redirect('project/detail/'.$id,'refresh');
	}

}

