<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_survey extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		cekblm_login_mitra();
		$this->load->model('UserModel');
		$this->load->model('M_project');
		$this->load->model('M_customer');
		$this->load->model('M_alamat');
		$this->load->model('M_product');
		$this->load->model('M_pegawai');
		$this->load->model('M_mitra'); 
		$this->load->model('M_Survey'); 
		
	}

	public function index()
	{
		$data['row'] = $this->M_project->get_project();
		$data['pegawai'] = $this->M_pegawai->get_pm();
		$this->template->load('template_mitra', 'Survey/data_survey',$data);
	}
	public function detail($id)
	{
		$data['row'] = $this->M_project->get_project($id)->row();
		$this->template->load('template_mitra', 'survey/detail_survey', $data);
	}

	//percobaan multiple upload
	// public function prosesUpload(){
	// 	// Panggil Model M_Welcome
	// 	// $this->load->model('M_Welcome');

	// 	// Hitung Jumlah File/Gambar yang dipilih
	// 	$jumlahData = count($_FILES['gambar']['name']);
	// 	$namaFile =  $this->input->post(['id']);
		
	// 	// Lakukan Perulangan dengan maksimal ulang Jumlah File yang dipilih
	// 	for ($i=0; $i < $jumlahData ; $i++):

	// 		// Inisialisasi Nama,Tipe,Dll.
	// 		$_FILES['file']['name']     = $_FILES['gambar']['name'][$i];
	// 		$_FILES['file']['type']     = $_FILES['gambar']['type'][$i];
	// 		$_FILES['file']['tmp_name'] = $_FILES['gambar']['tmp_name'][$i];
	// 		$_FILES['file']['size']     = $_FILES['gambar']['size'][$i];

	// 		// Konfigurasi Upload
			
	// 		$config['upload_path']          = './assets/survey/';

			
	// 		$config['allowed_types']        = 'gif|jpg|png|pdf';

	// 		// Memanggil Library Upload dan Setting Konfigurasi
	// 		$this->load->library('upload', $config);
	// 		$this->upload->initialize($config);

	// 		if($this->upload->do_upload('file')){ // Jika Berhasil Upload

	// 			$fileData = $this->upload->data(); // Lakukan Upload Data
	// 			echo "sukses";

	// 			// Membuat Variable untuk dimasukkan ke Database
	// 			// $uploadData[$i]['judul'] = $fileData['file_name']; 
	// 		}

	// 	endfor; // Penutup For

	// 	// if($uploadData !== null){ // Jika Berhasil Upload
			
	// 	// 	// Insert ke Database 
	// 	// 	$insert = $this->M_Welcome->upload($uploadData);
			
	// 	// 	if($insert){ // Jika Berhasil Insert
	// 	// 		echo "
	// 	// 			<a href='".base_url()."'> Kembali </a> 
	// 	// 			<br>
	// 	// 			Berhasil Upload ";
	// 	// 	}else{ // Jika Tidak Berhasil Insert
	// 	// 		echo "Gagal Upload";
	// 	// 	}

	// 	// }
	// }
	
	public function upload()
	{	
			$idProject = $this->input->post('id');
			
			$config['upload_path']          = 'C:\xampp\htdocs\monitor_project\assets\survey';
			$config['allowed_types']        = 'jpeg|png';
			$config['overwrite']        	=  true;
			$config['file_name']        	=  'imam';
			$this->upload->initialize($config);	
		

			if ( ! $this->upload->do_upload('berkas'))
			{
					
					$error = array('error' => $this->upload->display_errors());
					var_dump($error);
					
			}
			else
			{
				
				 $this->M_Survey->add_data();
				$this->session->set_flashdata('pesan', 
				'<div class="alert alert-success" role="alert">
					Data Berhasil Ditambah!
				</div>');
				// $this->template->load('template_mitra', 'Survey/detail_uploads');

				redirect('C_survey');
				
					
			}


		
	}
	
	
	

	
}

