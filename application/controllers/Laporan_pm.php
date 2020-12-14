<!-- <<<<<<< Updated upstream -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_pm extends CI_Controller {

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
		$this->load->model('M_Testcom'); 
		$this->load->model('M_Survey'); 
		$this->load->model('M_LaporanMitra'); 
	}

	public function index()
	{
		$data['row'] = $this->M_project->get_pm();
		$array = array(
		 	'status' => '0'
		 );
		$data['status'] = $this->session->set_userdata($array);
		$this->template->load('template_pegawai', 'laporan/laporan_pm', $data);
	}

	public function data_pm()
	{
		$pm = $this->input->post('status');
		$array = array(
		 	'status' => $pm
		 );
		$data['status'] = $this->session->set_userdata($array);
		$data['row'] = $this->M_project->get_pm();
		$data['project'] = $this->M_project->project_pm($pm)->result();
		$data['rows'] = $this->M_project->get_status_project($pm)->result();
		$this->template->load('template_pegawai', 'laporan/laporan_pm', $data);
	}

	public function detail_pm()
	{
		$pm = $this->input->post('id');
		$data['project'] = $this->M_project->project_pm($pm)->row_array();
		$data['rows'] = $this->M_project->get_status_project($pm);
		echo json_encode($pm);
	}

}

/* End of file laporan_pm.php */
/* Location: ./application/controllers/laporan/laporan_pm.php */
>>>>>>> Stashed changes