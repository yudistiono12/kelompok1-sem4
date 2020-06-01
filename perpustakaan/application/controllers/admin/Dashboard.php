<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Dashboard extends CI_Controller
{
		public function __construct() {
			parent::__construct();
			$this->load->library('Template');
		}
	public function index(){
		$data['page'] 			= "dashboard";
		$data['judul'] 			= "Beranda";
		$data['deskripsi'] 		= "Panel";
		$data['pagae']	= "";
		// $data['userdata'] 		= $this->userdata;
		$this->template->views('admine/home', $data);

	}
}