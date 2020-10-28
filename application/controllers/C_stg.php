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
	}

	public function index()
	{
		$data = [
			'mitra'		=> $this->M_mitra->get_mitra(),
			'project'	=> $this->M_project->get_project()
		];
		$this->template->load('template_pegawai', 'SuratTugas/stg' , $data);
	}
	
	public function add_stg()
	{
		// $data = [
		// 	"nomer_stg" 		=> "opo iki?",
		// 	"pegawai_id"		=> "opo iki?",
    	// 	"mitra_id" 			=> $this->input->post('mitra_id'),
		// 	"create_on"			=> date('Y-m-d'),
		// 	"create_by"			=> $this->session->userdata('pegawai_id')
    	// ];
		// $this->db->insert('hstg', $data);
		
		$i = 0;
		$a = $this->input->post('project');
		$b = $this->input->post('tgl_stg');
		if ($a[0] !== null) {
			foreach ($a as $row) {
				$data = [
					// 'no_stg'		=> "ini apa hayoo",
					'project_id'	=> $row,
					'target_date'	=> $b[$i],
					'create_on'		=> date('Y-m-d'),
					'create_by'		=> $this->session->userdata('pegawai_id')
				];
				// print_r($row);exit;
				$insert = $this->db->insert('dstg', $data);
				if($insert){
					$i++;
				}
			}
		}

		$arr['success'] = true;
		$arr['notif']	= '<div class="alert alert-success">
							<i class="fas fa-check"></i> Surat Tugas Berhasil Dibuat
							</div>';
		return $this->output->set_output(json_encode($arr));
		
	}

	
}

