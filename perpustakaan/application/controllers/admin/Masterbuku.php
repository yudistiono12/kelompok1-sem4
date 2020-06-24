<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Masterbuku extends CI_Controller
{
		public function __construct() {
			parent::__construct();
			$this->load->library('Template');
			$this->load->model('admin/M_masterbuku', 'master');
		}

		// buka buku
		public function databuku() {
			$data['page'] 			= "masterbuku";
			$data['judul'] 			= "Buku";
			$data['deskripsi'] 		= "Data buku";
			$data['pagae']		= "databuku";
			// $data['userdata'] 		= $this->userdata;
			$this->template->views('admine/masterbuku/buku', $data);

		}

		// tutup buku

		//buka penerbit
		public function datapenerbit() {
			$data['page'] 			= "masterbuku";
			$data['judul'] 			= "Penerbit";
			$data['deskripsi'] 		= "Data Penerbit";
			$data['pagae']		= "datapenerbit";
			// $data['userdata'] 		= $this->userdata;
			$data['modal_penerbit'] = show_my_modal('admine/modal/mdl_penerbit', 'penerbit', $data);
			$this->template->views('admine/masterbuku/penerbit', $data);

		}

		public function penerbit_list() {
			$requestData	= $_REQUEST;
			$fetch			= $this->master->penerbit_data($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);
			
			$totalData		= $fetch['totalData'];
			$totalFiltered	= $fetch['totalFiltered'];
			$query			= $fetch['query'];

			$data	= array();
			foreach($query->result_array() as $row)
			{ 
				$datanya = array(); 

				$datanya[]	= $row['nomora'];
				$datanya[]	= $row['nama_penerbit'];
				$datanya[]	= $row['alamat'];	
				$datanya[] = '<a class="btn btn-warning" href="javascript:void(0)" title="Ubah" onclick="penerbit_ubah('."'".$row['id_penerbit']."'".')"><i class="fa fa-edit"></i></a>
				  <button class="btn btn-danger konfirmasiHapus-penerbit" data-id="'.$row['id_penerbit'].'" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-trash"></i></button>';

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

		public function penerbit_tambah() {
			$this->form_validation->set_rules('nama_penerbit', 'nama_penerbit', 'trim|required');
			$this->form_validation->set_rules('alamat', 'alamat', 'required');

			$data 	= $this->input->post();
			if ($this->form_validation->run() == TRUE) {
				$result = $this->master->penerbit_tambah($data);

				if ($result > 0) {
					$out['status'] = '';
					$out['msg'] = show_succ_msg('Data Penerbit Berhasil ditambahkan', '20px');
				} else {
					$out['status'] = '';
					$out['msg'] = show_err_msg('Data Penerbit Gagal ditambahkan', '20px');
				}
			} else {
				$out['status'] = 'form';
				$out['msg'] = show_err_msg(validation_errors());
			}

			echo json_encode($out);
		}

		public function penerbit_ubah($id_penerbit){
			$data = $this->master->penerbit_by_id($id_penerbit);
			echo json_encode($data);
		}

		public function penerbit_proses_ubah(){
			$this->form_validation->set_rules('nama_penerbit', 'nama_penerbit', 'trim|required');
			$this->form_validation->set_rules('alamat', 'alamat', 'required');
			$data = $this->input->post();
			if ($this->form_validation->run() == TRUE) {
				$result = $this->master->penerbit_ubah($data);

				if ($result > 0) {
					$out['status'] = '';
					$out['msg'] = show_succ_msg('Data Penerbit Berhasil diubah', '20px');
				} else {
					$out['status'] = '';
					$out['msg'] = show_succ_msg('Data Penerbit Gagal diubah', '20px');
				}
			} else {
				$out['status'] = 'form';
				$out['msg'] = show_err_msg(validation_errors());
			}

			echo json_encode($out);
		}

		public function penerbit_hapus() {
			$id_penerbit = $_POST['id_penerbit'];
			$result = $this->master->penerbit_hapus($id_penerbit);

			if ($result > 0) {
				echo show_succ_msg('Data Penerbit Berhasil dihapus', '20px');
			} else {
				echo show_err_msg('Data Penerbit Gagal dihapus', '20px');
			}
		}
		// tutup penerbit

		// buka kategori
		public function datakategori() {
			$data['page'] 			= "masterbuku";
			$data['judul'] 			= "Kategori";
			$data['deskripsi'] 		= "Data Kategori";
			$data['pagae']		= "datakategori";
			// $data['userdata'] 		= $this->userdata;
			$data['modal_kategori'] = show_my_modal('admine/modal/mdl_kategori', 'kategori', $data);
			$this->template->views('admine/masterbuku/kategori', $data);

		}

		public function kategori_list() {
			$requestData	= $_REQUEST;
			$fetch			= $this->master->kategori_data($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);
			
			$totalData		= $fetch['totalData'];
			$totalFiltered	= $fetch['totalFiltered'];
			$query			= $fetch['query'];

			$data	= array();
			foreach($query->result_array() as $row)
			{ 
				$datanya = array(); 

				$datanya[]	= $row['nomora'];
				$datanya[]	= $row['nama_kategori'];	
				$datanya[] = '<a class="btn btn-warning" href="javascript:void(0)" title="Ubah" onclick="kategori_ubah('."'".$row['id_kategori']."'".')"><i class="fa fa-edit"></i></a>
				  <button class="btn btn-danger konfirmasiHapus-kategori" data-id="'.$row['id_kategori'].'" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-trash"></i></button>';

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

		public function kategori_tambah() {
			$this->form_validation->set_rules('nama_kategori', 'nama_kategori', 'trim|required');

			$data 	= $this->input->post();
			if ($this->form_validation->run() == TRUE) {
				$result = $this->master->kategori_tambah($data);

				if ($result > 0) {
					$out['status'] = '';
					$out['msg'] = show_succ_msg('Data Kategori Berhasil ditambahkan', '20px');
				} else {
					$out['status'] = '';
					$out['msg'] = show_err_msg('Data Kategori Gagal ditambahkan', '20px');
				}
			} else {
				$out['status'] = 'form';
				$out['msg'] = show_err_msg(validation_errors());
			}

			echo json_encode($out);
		}

		public function kategori_ubah($id_kategori) {
			$data = $this->master->kategori_by_id($id_kategori);
			echo json_encode($data);
		}

		public function kategori_proses_ubah() {
			$this->form_validation->set_rules('nama_kategori', 'nama_kategori', 'trim|required');
			$data = $this->input->post();
			if ($this->form_validation->run() == TRUE) {
				$result = $this->master->kategori_ubah($data);

				if ($result > 0) {
					$out['status'] = '';
					$out['msg'] = show_succ_msg('Data Kategori Berhasil diubah', '20px');
				} else {
					$out['status'] = '';
					$out['msg'] = show_succ_msg('Data Kategori Gagal diubah', '20px');
				}
			} else {
				$out['status'] = 'form';
				$out['msg'] = show_err_msg(validation_errors());
			}

			echo json_encode($out);
		}

		public function kategori_hapus() {
			$id_kategori = $_POST['id_kategori'];
			$result = $this->master->kategori_hapus($id_kategori);

			if ($result > 0) {
				echo show_succ_msg('Data kategori Berhasil dihapus', '20px');
			} else {
				echo show_err_msg('Data kategori Gagal dihapus', '20px');
			}
		}
		// tutup kategori

		// buka pengarang
		public function datapengarang() {
			$data['page'] 			= "masterbuku";
			$data['judul'] 			= "Pengarang";
			$data['deskripsi'] 		= "Data Pengarang";
			$data['pagae']		= "datapengarang";
			// $data['userdata'] 		= $this->userdata;
			$data['modal_pengarang'] = show_my_modal('admine/modal/mdl_pengarang', 'pengarang', $data);
			$this->template->views('admine/masterbuku/pengarang', $data);

		}

		public function pengarang_list() {
			$requestData	= $_REQUEST;
			$fetch			= $this->master->pengarang_data($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);
			
			$totalData		= $fetch['totalData'];
			$totalFiltered	= $fetch['totalFiltered'];
			$query			= $fetch['query'];

			$data	= array();
			foreach($query->result_array() as $row)
			{ 
				$datanya = array(); 

				$datanya[]	= $row['nomora'];
				$datanya[]	= $row['nama_pengarang'];
				$datanya[] = '<a class="btn btn-warning" href="javascript:void(0)" title="Ubah" onclick="pengarang_ubah('."'".$row['id_pengarang']."'".')"><i class="fa fa-edit"></i></a>
				  <button class="btn btn-danger konfirmasiHapus-pengarang" data-id="'.$row['id_pengarang'].'" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-trash"></i></button>';

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

		public function pengarang_tambah() {
			$this->form_validation->set_rules('nama_pengarang', 'nama_pengarang', 'trim|required');

			$data 	= $this->input->post();
			if ($this->form_validation->run() == TRUE) {
				$result = $this->master->pengarang_tambah($data);

				if ($result > 0) {
					$out['status'] = '';
					$out['msg'] = show_succ_msg('Data Pengarang Berhasil ditambahkan', '20px');
				} else {
					$out['status'] = '';
					$out['msg'] = show_err_msg('Data Pengarang Gagal ditambahkan', '20px');
				}
			} else {
				$out['status'] = 'form';
				$out['msg'] = show_err_msg(validation_errors());
			}

			echo json_encode($out);
		}

		public function pengarang_ubah($id_pengarang) {
			$data = $this->master->pengarang_by_id($id_pengarang);
			echo json_encode($data);
		}

		public function pengarang_proses_ubah() {
			$this->form_validation->set_rules('nama_pengarang', 'nama_pengarang', 'trim|required');
			$data = $this->input->post();
			if ($this->form_validation->run() == TRUE) {
				$result = $this->master->pengarang_ubah($data);

				if ($result > 0) {
					$out['status'] = '';
					$out['msg'] = show_succ_msg('Data Pengarang Berhasil diubah', '20px');
				} else {
					$out['status'] = '';
					$out['msg'] = show_succ_msg('Data Pengarang Gagal diubah', '20px');
				}
			} else {
				$out['status'] = 'form';
				$out['msg'] = show_err_msg(validation_errors());
			}

			echo json_encode($out);
		}

		public function pengarang_hapus() {
			$id_pengarang = $_POST['id_pengarang'];
			$result = $this->master->pengarang_hapus($id_pengarang);

			if ($result > 0) {
				echo show_succ_msg('Data Pengarang Berhasil dihapus', '20px');
			} else {
				echo show_err_msg('Data Pengarang Gagal dihapus', '20px');
			}
		}
		// tutup pengarang
}

