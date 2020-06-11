<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Home';
		$this->load->view('home/templates/header');
		$this->load->view('home/index');
		$this->load->view('home/templates/footer');
	}

	public function profil(){
		$data['title'] = 'profile';
		$this->load->view('home/templates/header');
		$this->load->view('home/profile');
		$this->load->view('home/templates/footer');
	}

	public function rules(){
		$data['title'] = 'rules';
		$this->load->view('home/templates/header');
		$this->load->view('home/rules');
		$this->load->view('home/templates/footer');
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */