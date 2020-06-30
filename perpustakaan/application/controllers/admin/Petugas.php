<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Petugas extends AUTH_Controller
{
	public function __construct() {
		parent::__construct();
		$this->load->library('Template');
		$this->load->model('admin/M_petugas', 'master');
		if($this->userdata->id_jenis != '1'){
			redirect('Home/login');
		}
	}

	// buka mahasiswa
	public function index() {
		$data['page'] 			= "datapetugas";
		$data['judul'] 			= "Petugas";
		$data['deskripsi'] 		= "Data Petugas";
		// $data['userdata'] 		= $this->userdata;
		$data['datajabatan'] = $this->master->jabatan_all();
		$data['modal_mahasiswa'] = show_my_modal('admine/modal/mdl_petugas', 'petugas', $data);
		$this->template->views('admine/petugas', $data);
	}
}