<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Masteranggota extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		$this->load->library('Template');
		 $this->load->model('admin/M_masteranggota', 'master');
	}

	// buka mahasiswa
	public function datamahasiswa() {
		$data['page'] 			= "masteranggota";
		$data['judul'] 			= "Mahasiswa";
		$data['deskripsi'] 		= "Data Mahasiswa";
		$data['pagae']		= "datamahasiswa";
		// $data['userdata'] 		= $this->userdata;
		// $data['modal_mahasiswa'] = show_my_modal('admine/modal/mdl_prodi', 'prodi', $data);
		$this->template->views('admine/masteranggota/mahasiswa', $data);
	}

	public function mahasiswa_list() {
		$requestData	= $_REQUEST;
		$fetch			= $this->master->mahasiswa_data($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);
			
		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();
		foreach($query->result_array() as $row)
		{ 
			$datanya = array(); 
			$datanya[]	= $row['nomora'];
			$datanya[]	= $row['nim'];
			$datanya[]	= $row['nama'];	
			$datanya[]	= $row['prodi'];
			$datanya[]	= $row['no_telp'];
			if($row->foto)
				$datanya[] = '<a href="'.base_url('upload/'.$row->foto).'" target="_blank"><center><img src="'.base_url('upload/'.$row->foto).'" class="img-responsive" style="height:160px; width:140px" /></center></a>';
			else
				$row[] = '(No photo)';

			$datanya[] = '<a class="btn btn-warning" href="javascript:void(0)" title="Ubah" onclick="mahasiswa_ubah('."'".$row['nim']."'".')"><i class="fa fa-edit"></i></a>
			  <button class="btn btn-danger konfirmasiHapus-mahasiswa" data-id="'.$row['nim'].'" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-trash"></i></button>';

			$data[] = $datanya;
		}

		$json_data = array(
			"draw"            => intval( $requestData['draw'] ),  
			"recordsTotal"    => intval( $totalData ),  
			"recordsFiltered" => intval( $totalFiltered ), 
			"data"            => $data
		);

		echo json_encode($json_data);
	}
	// tutup mahasiswa
	
	//buka dosen 
	public function datadosen() {
		$data['page'] 			= "masteranggota";
		$data['judul'] 			= "Dosen";
		$data['deskripsi'] 		= "Data Dosen";
		$data['pagae']		= "datadosen";
		// $data['userdata'] 		= $this->userdata;
		// $data['modal_mahasiswa'] = show_my_modal('admine/modal/mdl_prodi', 'prodi', $data);
		$this->template->views('admine/masteranggota/dosen', $data);
	}
	public function dosen_list() {
		$requestData	= $_REQUEST;
		$fetch			= $this->master->dosen_data($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);
			
		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();
		foreach($query->result_array() as $row)
		{ 
			$datanya = array(); 
			$datanya[]	= $row['nomora'];
			$datanya[]	= $row['nip'];
			$datanya[]	= $row['nama'];	
			$datanya[]	= $row['jabatan'];
			$datanya[]	= $row['no_tlp'];
			
			$datanya[] = '<a class="btn btn-warning" href="javascript:void(0)" title="Ubah" onclick="dosen_ubah('."'".$row['nip']."'".')"><i class="fa fa-edit"></i></a>
			  <button class="btn btn-danger konfirmasiHapus-dosen" data-id="'.$row['nip'].'" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-trash"></i></button>';

			$data[] = $datanya;
		}

		$json_data = array(
			"draw"            => intval( $requestData['draw'] ),  
			"recordsTotal"    => intval( $totalData ),  
			"recordsFiltered" => intval( $totalFiltered ), 
			"data"            => $data
		);

		echo json_encode($json_data);
	}
	// tutup dosen

	// buka prodi
	public function dataprodi() {
		$data['page'] 			= "masteranggota";
		$data['judul'] 			= "Prodi";
		$data['deskripsi'] 		= "Data Prodi";
		$data['pagae']		= "dataprodi";
		// $data['userdata'] 		= $this->userdata;
		$data['modal_prodi'] = show_my_modal('admine/modal/mdl_prodi', 'prodi', $data);
		$this->template->views('admine/masteranggota/prodi', $data);
	}
	public function prodi_list() {
		$requestData	= $_REQUEST;
		$fetch			= $this->master->prodi_data($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);
			
		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();
		foreach($query->result_array() as $row)
		{ 
			$datanya = array(); 
			$datanya[]	= $row['nomora'];
			$datanya[]	= $row['prodi'];
			$datanya[]	= $row['jurusan'];	
			$datanya[] = '<a class="btn btn-warning" href="javascript:void(0)" title="Ubah" onclick="prodi_ubah('."'".$row['id_prodi']."'".')"><i class="fa fa-edit"></i></a>
			  <button class="btn btn-danger konfirmasiHapus-prodi" data-id="'.$row['id_prodi'].'" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-trash"></i></button>';

			$data[] = $datanya;
		}

		$json_data = array(
			"draw"            => intval( $requestData['draw'] ),  
			"recordsTotal"    => intval( $totalData ),  
			"recordsFiltered" => intval( $totalFiltered ), 
			"data"            => $data
		);

		echo json_encode($json_data);
	}

	public function prodi_tambah() {
		$this->form_validation->set_rules('prodi', 'prodi', 'trim|required');
		$this->form_validation->set_rules('jurusan', 'jurusan', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->master->prodi_tambah($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Prodi Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Prodi Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}
		echo json_encode($out);
	}

	public function prodi_ubah($id_prodi){
		$data = $this->master->prodi_by_id($id_prodi);
		echo json_encode($data);
	}

	public function prodi_proses_ubah(){
		$this->form_validation->set_rules('prodi', 'prodi', 'trim|required');
		$this->form_validation->set_rules('jurusan', 'jurusan', 'required');
		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->master->prodi_ubah($data);
			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Prodi Berhasil diubah', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Prodi Gagal diubah', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}
		echo json_encode($out);
	}

	public function prodi_hapus() {
		$id_prodi = $_POST['id_prodi'];
		$result = $this->master->prodi_hapus($id_prodi);
		if ($result > 0) {
			echo show_succ_msg('Data Prodi Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Prodi Gagal dihapus', '20px');
		}
	}
}