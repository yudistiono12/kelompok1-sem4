<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

	public function index()
	{
		$this->load->view('anggota/templates/header');
		$this->load->view('anggota/index');
		$this->load->view('anggota/templates/header');
	}

}

/* End of file Anggota.php */
/* Location: ./application/controllers/Anggota.php */