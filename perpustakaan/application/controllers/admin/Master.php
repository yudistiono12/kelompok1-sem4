<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Master extends Auth_Controller
{
		public function __construct() {
			parent::__construct();
			$this->load->library('Template');
		}
		public function literasi() {
		$data['page'] 			= "master";
		$data['judul'] 			= "Buku literasi umum";
		$data['deskripsi'] 		= "Data buku";
		$data['pagae']		= "literasi";
		// $data['userdata'] 		= $this->userdata;
		$this->template->views('admine/master/bukuLiterasi', $data);

	}
}