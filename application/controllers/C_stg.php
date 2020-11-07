<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_stg extends CI_Controller {

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
	}

	public function index()
	{
		$data = [
			'project'	=> $this->M_stg->get_stg()
		];
		$this->template->load('template_pegawai', 'SuratTugas/data' , $data);
	}

	public function buat()
	{
		$data = [
			'mitra'		=> $this->M_mitra->get_mitra(),
			'project'	=> $this->M_stg->get_stg_belum(),
			'pegawai'	=> $this->M_pegawai->get_pm()
		];
		$this->template->load('template_pegawai', 'SuratTugas/stg' , $data);
	}
	
	public function add_stg()
	{
		$data = [
			"no_stg" 			=> $this->M_stg->nomer_stg(),
			"pegawai_id"		=> $this->input->post('pm_id'),
    		"mitra_id" 			=> $this->input->post('mitra_id'),
			"create_on"			=> date('Y-m-d'),
			"create_by"			=> $this->session->userdata('pegawai_id')
    	];
		$this->db->insert('hstg', $data);

		$no_stg = $data['no_stg'];
		$i = 0;
		$a = $this->input->post('project');
		$b = $this->input->post('tgl_stg');
		if ($a[0] !== null) {
			foreach ($a as $row) {
				$data1 = [
					'no_stg'		=> $no_stg,
					'target_date'	=> $b[$i],
					'update_on'		=> date('Y-m-d'),
					'update_by'		=> $this->session->userdata('pegawai_id')
				];
				$this->db->where('id_dstg', $row);
				$insert = $this->db->update('dstg', $data1);
				if($insert){
					$i++;
				}
			}
		}

		$arr['success'] = true;
		$arr['notif']	= '<div class="alert alert-success">
							<i class="fas fa-check"></i> Surat Tugas Berhasil Dibuat
							</div>';
		// redirect('C_stg', 'refresh');
		return $this->output->set_output(json_encode($arr));
		
	}

	public function cetak_pdf()
	{
		$data = [
			'row_spv'	=> $this->M_stg->spv()->row(),
			'row'		=> $this->M_stg->cetak(),
			'invoice' 	=> $this->M_stg->cetak_project()
		];
		$this->load->view('SuratTugas/dompdf', $data);
	}

	public function cetak_stg($no_stg)
	{
		$data = [
			'row_spv'	=> $this->M_stg->spv()->row(),
			'row'		=> $this->M_stg->cetak(),
			'invoice' 	=> $this->M_stg->cetak_stg($no_stg)
		];
		$this->load->view('SuratTugas/cetak_stg', $data);
	}

	
}

