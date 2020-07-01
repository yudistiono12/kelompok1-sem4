<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Model {

	
public function get_all_kategori()
{
	return $this->db->get('kategori')->result_array();
}
public function get_all_prodi()
{
	return $this->db->get('tb_prodi')->result_array();
}
public function get_all_buku()
{
	return $this->db->get('buku')->result_array();
}
public function getbukutif(){
	return $this->db->query("SELECT * FROM buku WHERE buku.id_prodi = '3'")->result_array();
	}
public function getbukumna(){
	return $this->db->query("SELECT * FROM buku WHERE buku.id_prodi = '5'")->result_array();
	}
public function getbukutip(){
	return $this->db->query("SELECT * FROM buku WHERE buku.id_prodi = '4'")->result_array();
	}
}

/* End of file Data.php */
/* Location: ./application/models/Data.php */