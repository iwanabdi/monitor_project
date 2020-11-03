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
        $data['mitra']			= $this->M_mitra->get_mitra();
        $data['pekerjaan']		= $this->M_pekerjaan->get_pekerjaan();
        $data['project'] 		= $this->M_project->get_detail($id)->row();
        $data['mitra_pilih'] 	= $this->M_stg->get_stg($id)->row();
		$this->template->load('template_pegawai', 'PO/req', $data);
    }

    public function req_po()
	{

		$i = 0;
		$a = $this->input->post('project');
		$b = $this->input->post('qty');
		if ($a[0] !== null) {
			foreach ($a as $row) {
				$data = [
					// 'project_id'	=> $row,
					'po_no'			=> $this->input->post('project_id'),
					'pekerjaan_id'	=> $row,
					'qty'	        => $b[$i],
					'delivery_date'	=> $this->input->post('devdate'),
                    'create_by'		=> $this->session->userdata('pegawai_id'),
                    'create_on'		=> date('Y-m-d')
				];
				$insert = $this->db->insert('dpo', $data);
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