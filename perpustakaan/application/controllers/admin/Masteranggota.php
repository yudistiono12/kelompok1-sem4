<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Masteranggota extends AUTH_Controller
{
	public function __construct() {
		parent::__construct();
		$this->load->library('Template');
		 $this->load->model('admin/M_masteranggota', 'master');
		if($this->userdata->id_jenis != '1'){
				redirect('Home/login');
		}
	}

	// buka mahasiswa
	public function datamahasiswa() {
		$data['page'] 			= "masteranggota";
		$data['judul'] 			= "Mahasiswa";
		$data['deskripsi'] 		= "Data Mahasiswa";
		$data['pagae']		= "datamahasiswa";
		$data['userdata'] 		= $this->userdata;
		$data['dataProdi'] = $this->master->prodi_all();
		$data['modal_mahasiswa'] = show_my_modal('admine/modal/mdl_mahasiswa', 'mahasiswa', $data);
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
			$datanya[]	= '<td class="details-control"><i class="btn btn-box-tool" data-toggle="tooltip" title="Tampilkan Detail"><i class="glyphicon glyphicon-plus"></i></i></td>';
			$datanya[]	= $row['nim'];
			$datanya[]	= $row['username'];
			$datanya[]	= $row['password'];
 			$datanya[]	= $row['nama'];
			$datanya[]	= $row['angkatan'];	
			$datanya[]	= $row['prodi'];
			$datanya[]	= $row['no_tlp'];
			if($row['foto'])
				$datanya[] = '<a href="'.base_url('upload/anggota/'.$row['foto']).'" target="_blank"><center><img src="'.base_url('upload/anggota/'.$row['foto']).'" class="img-responsive" style="height:160px; width:140px" /></center></a>';
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

	public function mahasiswa_tambah() {

		$this->form_validation->set_rules('nim', 'nim', 'trim|required|min_length[9]|max_length[9]');
		$this->form_validation->set_rules('nama_mahasiswa', 'nama_mahasiswa', 'trim|required');
		$this->form_validation->set_rules('no_tlp', 'no_tlp', 'trim|required|min_length[10]|max_length[15]');
		$this->form_validation->set_rules('prodi', 'prodi', 'required');
		$this->form_validation->set_rules('angkatan', 'angkatan', 'required');


		if ($this->form_validation->run() == TRUE) {
					
			// cek nim ada atau tidak
			$cek = $this->master->mahasiswa_cek($this->input->post('nim'));
			if ($cek > 0) {
				$out['status'] = 'form';
				$out['msg'] = show_err_msg('Nim  sudah terdaftar');
			}else{
				// buat username dan password
				// karena dapat dipastikan untuk prodi ada 3 dan setiap prodi memiliki nama seperti dibawah 
				//sehingga fungsi ini dapat dijalankan
				$j = $this->master->prodi_by_id($this->input->post('prodi'));
				if ($j->prodi === "Teknik Informatika") {
					$prodi = "TIF";
				}else if($j->prodi === "Teknik Industri Pangan") {
					$prodi = "TIP";
				}else if ("Manajemen Agribisnis") {
					$prodi = "MNA";
				}

				$nim = substr($this->input->post('nim'), 5, 4);
				$username = $prodi.$this->input->post('angkatan').$nim;
				// $pass = $this->input->post('nim');
				$password = password_hash($this->input->post('nim'), true);
				$dataser = array('username' => $username, 'password' => $password); //ambil dari data diatas
				
				$id_auten = $this->master->user_tambah($dataser);
				if ($id_auten <= 0 or $id_auten === "") {
					$out['status'] = 'form';
					$out['msg'] = show_err_msg('Gagal tambah user');
				}else{
					$data = array('nim' => $this->input->post('nim'),
								'id_jenis' => 2,
								'id_autentikasi' => $id_auten,
								'nama' => $this->input->post('nama_mahasiswa'),	
								'angkatan' => $this->input->post('angkatan'),
								'id_prodi' => $this->input->post('prodi'),
								'no_tlp' => $this->input->post('no_tlp'),
								'img' => $this->input->post('img')
							 );
					// upload gambar
					if (!empty($_FILES['img']['name'])) {
						$upload = $this->_do_upload();
						$data['img'] = $upload;
					}else{
						$data['img'] = "default.jpg";
					}

					$result = $this->master->mahasiswa_tambah($data);
					if ($result > 0) {
						$out['status'] = '';
						$out['msg'] = show_succ_msg('Data Mahasiswa Berhasil ditambahkan', '20px');
					} else {
						$out['status'] = '';
						$out['msg'] = show_err_msg('Data Mahasiswa Gagal ditambahkan', '20px');
					}
				}
			}
		 } else {
		 	$out['status'] = 'form';
		 	$out['msg'] = show_err_msg(validation_errors());
		}
		echo json_encode($out);
	}

	public function mahasiswa_ubah($nim){
		$data = $this->master->mahasiswa_by_id($nim);
		echo json_encode($data);
	}

	public function mahasiswa_proses_ubah(){
		$this->form_validation->set_rules('nama_mahasiswa', 'nama_mahasiswa', 'trim|required');
		$this->form_validation->set_rules('no_tlp', 'no_tlp', 'trim|required|min_length[10]|max_length[15]');

		if ($this->form_validation->run() == TRUE) {
			$data = $this->input->post();
			if($this->input->post('remove_photo')) // jika remove photo di centang
			{
				if(file_exists('upload/anggota/'.$this->input->post('remove_photo')) && $this->input->post('remove_photo' && $data['remove_photo']!="default.jpg")){
					unlink('upload/anggota/'.$this->input->post('remove_photo'));
					$data['foto'] = '';
				}
				
			}

			if(!empty($_FILES['img']['name'])){
				$upload = $this->_do_upload();
				
				//delete file
				$mahasiswa = $this->master->mahasiswa_by_id($this->input->post('nim'));
				if(file_exists('upload/anggota/'.$mahasiswa->foto) && $mahasiswa->foto)
					unlink('upload/anggota/'.$mahasiswa->foto);

				$data['foto'] = $upload;
			}else{
				$data['foto'] = $this->input->post('foto_lama');
			}

			$result = $this->master->mahasiswa_ubah($data);
			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Mahasiswa Berhasil diubah', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Mahasiswa Gagal diubah', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}
		echo json_encode($out);
	}

	public function mahasiswa_hapus() {
		// $nim = $_POST['nim'];
		//   $n = $_POST['nim'];
		// $result = $this->master->mahasiswa_hapus($_POST['nim']);
		$listmaha = $this->master->mahasiswa_by_id($_POST['nim']);
		
		$data = array('nim' => $listmaha->nim,
							'id_autentikasi' => $listmaha->id_autentikasi,
							'foto' => $listmaha->foto
						 );
		// $listmaha2 = $this->master->mahasiswa_by_id($n);
		$hapusUsername = $this->master->mahasiswa_hapuser($data['id_autentikasi']);
			
		if (file_exists('upload/anggota/'.$data['foto']) && $data['foto'] && $data['foto']!="default.jpg") {
			unlink('upload/anggota/'.$data['foto']);
		}

		if ($hapusUsername > 0) {
			//delete file
			
			echo show_succ_msg('Data Mahasiswa Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Mahasiswa Gagal dihapus', '20px');
		}
	}

	private function _do_upload()
	{
		$config['upload_path']          = 'upload/anggota';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2048; //set max size allowed in Kilobyte
        $config['max_width']            = 1000; // set max width image allowed
        $config['max_height']           = 1000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique session_name()

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('img')) //upload and validate
        {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg('Upload Gagal: '.$this->upload->display_errors('',''));
			echo json_encode($out);
			exit();
		}
		return $this->upload->data('file_name');
	}

	// tutup mahasiswa
	
	//buka dosen 
	public function datadosen() {
		$data['page'] 			= "masteranggota";
		$data['judul'] 			= "Dosen";
		$data['deskripsi'] 		= "Data Dosen";
		$data['pagae']		= "datadosen";
		// $data['userdata'] 		= $this->userdata;
		$data['datajabatan'] = $this->master->jabatan_all();
		$data['modal_dosen'] = show_my_modal('admine/modal/mdl_dosen', 'dosen', $data);
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
			$datanya[]	= '<td class="details-control"><i class="btn btn-box-tool" data-toggle="tooltip" title="Tampilkan Detail"><i class="glyphicon glyphicon-plus"></i></i></td>';
			$datanya[]	= $row['nip'];
			$datanya[]	= $row['nama'];	
			$datanya[]	= $row['nama_jabatan'];
			$datanya[]	= $row['no_tlp'];
			if($row['foto'])
				$datanya[] = '<a href="'.base_url('upload/anggota/'.$row['foto']).'" target="_blank"><center><img src="'.base_url('upload/anggota/'.$row['foto']).'" class="img-responsive" style="height:160px; width:140px" /></center></a>';
			else
				$row[] = '(No photo)';

			
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

	public function dosen_tambah() {

		$this->form_validation->set_rules('nip', 'nip', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('nama_dosen', 'nama_dosen', 'trim|required');
		$this->form_validation->set_rules('no_tlp', 'no_tlp', 'trim|required|min_length[10]|max_length[15]');

		if ($this->form_validation->run() == TRUE) {
					
			// buat username dan password
			// karena dapat dipastikan untuk prodi ada 3 dan setiap prodi memiliki nama seperti dibawah 
			//sehingga fungsi ini dapat dijalankan
			$id_jab = $this->input->post('jabatan');
			$dataJabat = $this->master->jabatan_by_id($id_jab);
			$singkatan = array('singkatan' => $dataJabat->singkatan);
			$nip = substr($this->input->post('nip'),8, 10);
			
			$username = $singkatan['singkatan'].$nip;
			$pass = $this->input->post('nip');
			$password = password_hash($pass, true);
			$dataser = array('username' => $username, 'password' => $password); //ambil dari data diatas
			
			$id_auten = $this->master->user_tambah($dataser);
			if ($id_auten <= 0 or $id_auten === "") {
				$out['status'] = 'form';
				$out['msg'] = show_err_msg('Gagal tambah user');
			}else{
				$data = array('nip' => $this->input->post('nip'),
							'id_jenis' => 3,
							'id_autentikasi' => $id_auten,
							'nama' => $this->input->post('nama_dosen'),	
							'jabatan' => $this->input->post('jabatan'),
							'no_tlp' => $this->input->post('no_tlp'),
							'img' => $this->input->post('img')
						 );
				// upload gambar
				if (!empty($_FILES['img']['name'])) {
					$upload = $this->_do_upload();
					$data['img'] = $upload;
				}else{
					$data['img'] = "default.jpg";
				}

				$result = $this->master->dosen_tambah($data);
				if ($result > 0) {
					$out['status'] = '';
					$out['msg'] = show_succ_msg('Data Dosen Berhasil ditambahkan', '20px');
				} else {
					$out['status'] = '';
					$out['msg'] = show_err_msg('Data Dosen Gagal ditambahkan', '20px');
				}
			}
		 } else {
		 	$out['status'] = 'form';
		 	$out['msg'] = show_err_msg(validation_errors());
		}
		echo json_encode($out);
	}

	public function dosen_ubah($nip){
		$data = $this->master->dosen_by_id($nip);
		echo json_encode($data);
	}

	public function dosen_proses_ubah(){
		$this->form_validation->set_rules('nama_dosen', 'nama_dosen', 'trim|required');
		$this->form_validation->set_rules('no_tlp', 'no_tlp', 'trim|required|min_length[10]|max_length[15]');

		if ($this->form_validation->run() == TRUE) {
			$data = $this->input->post();
			if($this->input->post('remove_photo')) // jika remove photo di centang
			{
				if(file_exists('upload/anggota/'.$this->input->post('remove_photo')) && $this->input->post('remove_photo') && $this->input->post('remove_photo')!= 'default.jpg' ){
					unlink('upload/anggota/'.$this->input->post('remove_photo'));
					$data['foto'] = '';
				}
				
			}

			if(!empty($_FILES['img']['name'])){
				$upload = $this->_do_upload();
				
				//delete file
				$dosen = $this->master->dosen_by_id($this->input->post('nip'));
				if(file_exists('upload/anggota/'.$dosen->foto) && $dosen->foto)
					unlink('upload/anggota/'.$dosen->foto);

				$data['foto'] = $upload;
			}else{
				$data['foto'] = $this->input->post('foto_lama');
			}

			$result = $this->master->dosen_ubah($data);
			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Dosen Berhasil diubah', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Dosen Gagal diubah', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}
		echo json_encode($out);
	}

	public function dosen_hapus() {
		$listmaha = $this->master->dosen_by_id($_POST['nip']);
		
		$data = array('nip' => $listmaha->nip,
							'id_autentikasi' => $listmaha->id_autentikasi,
							'foto' => $listmaha->foto
						 );
		// $listmaha2 = $this->master->mahasiswa_by_id($n);
		$hapusUsername = $this->master->mahasiswa_hapuser($data['id_autentikasi']);
			
		if (file_exists('upload/anggota/'.$data['foto']) && $data['foto'] && $data['foto']!="default.jpg") {
			unlink('upload/anggota/'.$data['foto']);
		}

		if ($hapusUsername > 0) {
			//delete file
			
			echo show_succ_msg('Data Dosen Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Dosen Gagal dihapus', '20px');
		}
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
	// buka Jabatan
	public function datajabatan() {
		$data['page'] 			= "masteranggota";
		$data['judul'] 			= "Jabatan";
		$data['deskripsi'] 		= "Data Jabatan";
		$data['pagae']		= "datajabatan";
		// $data['userdata'] 		= $this->userdata;
		$data['modal_jabatan'] = show_my_modal('admine/modal/mdl_jabatan', 'jabatan', $data);
		$this->template->views('admine/masteranggota/jabatan', $data);
	}
	public function jabatan_list() {
		$requestData	= $_REQUEST;
		$fetch			= $this->master->jabatan_data($requestData['search']['value'], $requestData['order'][0]['column'], $requestData['order'][0]['dir'], $requestData['start'], $requestData['length']);
			
		$totalData		= $fetch['totalData'];
		$totalFiltered	= $fetch['totalFiltered'];
		$query			= $fetch['query'];

		$data	= array();
		foreach($query->result_array() as $row)
		{ 
			$datanya = array(); 
			$datanya[]	= $row['nomora'];
			$datanya[]	= $row['nama_jabatan'];
			$datanya[]	= $row['singkatan'];	
			$datanya[] = '<a class="btn btn-xs btn-warning" href="javascript:void(0)" title="Ubah" onclick="jabatan_ubah('."'".$row['id_jabatan']."'".')"><i class="fa fa-edit"></i></a>
			  <button class="btn btn-xs btn-danger konfirmasiHapus-jabatan" title="Hapus Data" data-id="'.$row['id_jabatan'].'" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-trash"></i></button>
			  <a class="btn btn-xs btn-info" href="javascript:void(0)" title="data dosen sesuai jabatan" onclick="detail_kategori('."'".$row['id_jabatan']."'".')"><i class="glyphicon glyphicon-info-sign"></i></a>';

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

	public function jabatan_tambah() {
		$this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');
		$this->form_validation->set_rules('singkatan', 'singkatan', 'trim|required|max_length[3]');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->master->jabatan_tambah($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data jabatan Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data jabatan Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}
		echo json_encode($out);
	}

	public function jabatan_ubah($id_jabatan){
		$data = $this->master->jabatan_by_id($id_jabatan);
		echo json_encode($data);
	}

	public function jabatan_proses_ubah(){
		$this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');
		$this->form_validation->set_rules('singkatan', 'singkatan', 'trim|required|max_length[3]');
		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->master->jabatan_ubah($data);
			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data jabatan Berhasil diubah', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data jabatan Gagal diubah', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}
		echo json_encode($out);
	}
	public function jabatan_hapus() {
		$id_jabatan = $_POST['id_jabatan'];
		$result = $this->master->jabatan_hapus($id_jabatan);
		if ($result > 0) {
			echo show_succ_msg('Data Jabatan Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Jabatan Gagal dihapus', '20px');
		}
	}
	// tutup jabatan
}