<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PO extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		cekblm_login_pegawai();
		cek_akses();
		$this->load->model('UserModel');
        $this->load->model('M_project');
        $this->load->model('M_mitra');
        $this->load->model('M_pekerjaan');
        $this->load->model('M_stg');
    }
    
    public function req($id)
	{
        $data['mitra']	= $this->M_mitra->get_mitra();
        $data['pekerjaan']	= $this->M_pekerjaan->get_pekerjaan();
        $data['project'] = $this->M_project->get_detail($id)->row();
        $data['mitraterpilih'] = $this->M_stg->get_stg($id)->row();
		$this->template->load('template_pegawai', 'PO/req', $data);
    }

    public function req_po()
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
				$data = [
					// 'project_id'	=> $row,
					'no_stg'		=> $no_stg,
					'target_date'	=> $b[$i],
					'create_on'		=> date('Y-m-d'),
					'create_by'		=> $this->session->userdata('pegawai_id')
				];
				$this->db->where('id_dstg', $row);
				$insert = $this->db->update('dstg', $data);
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