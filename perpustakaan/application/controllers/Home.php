<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
public function __construct() {
		parent::__construct();
		 $this->load->model('Data','tampil');

		
	}
	public function index()
	{
		$data['title'] = 'Home';
		$data['kategori']=$this->tampil->get_all_kategori();
		$data['prodi']=$this->tampil->get_all_prodi();
		$data['buku']=$this->tampil->get_all_buku();
		$this->load->view('home/templates/header',$data);
		$this->load->view('home/index',$data);
		$this->load->view('home/templates/footer',$data);
	}
	public function katalogtif()
	{
		$data['title'] = 'katalog';
		$data['tif']=$this->tampil->getbukutif();
		$this->load->view('home/templates/header',$data);
		$this->load->view('home/katalog/kategori_tif',$data);
		$this->load->view('home/templates/footer',$data);
	}
	public function katalogtip()
	{
		$data['title'] = 'katalog2';
		$data['tip']=$this->tampil->getbukutip();
		$this->load->view('home/templates/header',$data);
		$this->load->view('home/katalog/kategori_tip',$data);
		$this->load->view('home/templates/footer',$data);
	}
	public function katalogmna()
	{
		$data['title'] = 'katalog2';
		$data['mna']=$this->tampil->getbukumna();
		$this->load->view('home/templates/header',$data);
		$this->load->view('home/katalog/kategori_mna',$data);
		$this->load->view('home/templates/footer',$data);
	}
	public function profil()
	{
		$data['title'] = 'profile';
		$this->load->view('home/templates/header');
		$this->load->view('home/profile');
		$this->load->view('home/templates/footer');
	}

	public function rules()
	{
		$data['title'] = 'rules';
		$this->load->view('home/templates/header');
		$this->load->view('home/rules');
		$this->load->view('home/templates/footer');
	}

	public function staff()
	{
		$data['title'] = 'staff';
		$this->load->view('home/templates/header');
		$this->load->view('home/staff');
		$this->load->view('home/templates/footer');
	}
public function panduan()
	{
		$data['title'] = 'panduan';
		$this->load->view('home/templates/header');
		$this->load->view('home/panduan');
		$this->load->view('home/templates/footer');
	}

public function panduan_klks()
	{
		$data['title'] = 'panduan';
		$this->load->view('home/templates/header');
		$this->load->view('home/panduan_koleksi');
		$this->load->view('home/templates/footer');
	}
public function jam_layanan()
	{
		$data['title'] = 'panduan';
		$this->load->view('home/templates/header');
		$this->load->view('home/jamlayanan');
		$this->load->view('home/templates/footer');
	}

public function Panduan_sirkulasi()
	{
		$data['title'] = 'panduan';
		$this->load->view('home/templates/header');
		$this->load->view('home/panduansirkulasi');
		$this->load->view('home/templates/footer');
	}
public function pendaftaran()
	{
		$data['title'] = 'registrasi';
		$this->load->model('admin/M_masteranggota', 'master');
		$data['dataProdi'] = $this->master->prodi_all();
		$data['datajabatan'] = $this->master->jabatan_all();
		$this->load->view('home/templates/header', $data);
		$this->load->view('registrasi/index', $data);
		$this->load->view('home/templates/footer');
	}
	public function login()
	{
		// if ($this->session->userdata('')) {
		// 	redirect('profile');
		// }

		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Form Login';
			$this->load->view('home/templates/header', $data);
			$this->load->view('login/index', $data);
			$this->load->view('home/templates/footer', $data);
		} else {
			//validasinya sukses
			$this->_masuk();
		}
	}

	private function _masuk()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		// $where = array(
		// 	'username' => $username,
		// 	'password' => $password
		// );

		$user = $this->db->get_where('autentikasi', ['username' => $username])->row_array();

		//jika usernya ada
		if ($user) {
			//jika usernya aktif
			//cek password
			$pass = $user['password'];
			if (password_verify($password, $pass)) {
				$this->load->model('admin/M_masteranggota', 'master');
				$cekMaha = $this->master->mahasiswa_by_auten($user['id_autentikasi']);
				$cekDos = $this->master->dos_by_auten($user['id_autentikasi']);
				if ($cekMaha > 0) {
					$dataMaha = $this->master->mahasiswa_databy_auten($user['id_autentikasi']);
					$session = array('userdata' => $dataMaha,
								'status' => "Loged in" 
							);
					$this->session->set_userdata($session);
					redirect('anggota/index');
				}else if($cekDos > 0){
					$dataDos = $this->master->dosen_databy_auten($user['id_autentikasi']);
					$session = array('userdata' => $dataDos,
								'status' => "Loged in" 
							);
					$this->session->set_userdata($session);
					if ($dataDos->id_jenis == 1 ) {
						redirect('admin/dashboard/index');
					}else if ($dataDos->id_jenis == 3) {
						redirect('anggota/index');
					}
					
				}else{
					$this->session->set_flashdata(
					'message',
					'<div class="alert alert-danger" role="alert">Gagal anda salah</div>'
				);
				}
			} else {
				$this->session->set_flashdata(
					'message',
					'<div class="alert alert-danger" role="alert">password yang anda masukan salah!</div>'
				);
				redirect('home/login');
			}
		} else {
			$this->session->set_flashdata(
				'message',
				'<div class="alert alert-danger" role="alert">Akun anda tidak ditemukan!</div>'
			);
			redirect('home/login');
		}
	}

	public function registrasi()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim');

		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


		if ($this->form_validation->run() == false) {
			$data['title'] = 'Form Registrasi';
			$this->load->view('home/templates/header', $data);
			$this->load->view('register_admin', $data);
			$this->load->view('home/templates/footer');
		} else {
			$data = [
				'username' => htmlspecialchars($this->input->post('username', true)),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'id_jenis' => 1,
				'nama'	   => "",
				'image'	   => "default.jpg"
			];

			$this->db->insert('autentikasi', $data);

			$this->session->set_flashdata(
				'message',
				'<div class="alert alert-success" role="alert">Data anda ditambahkan. Silahkan Login</div>'
			);
			redirect('home/login');
		}
	}

	// buka untuk anggota
	public function registermaha()
	{
		$this->form_validation->set_rules('nim', 'nim', 'required|trim|max_length[9]|min_length[9]');
		$this->form_validation->set_rules('nama', 'nama', 'required|trim');
		$this->form_validation->set_rules('no_tlp', 'no_tlp', 'trim|required|min_length[10]|max_length[15]');
		$this->form_validation->set_rules('prodi', 'prodi', 'required');
		$this->form_validation->set_rules('angkatan', 'angkatan', 'required');

		$this->load->model('admin/M_masteranggota', 'master');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'registrasi';
			$data['dataProdi'] = $this->master->prodi_all();
			$data['datajabatan'] = $this->master->jabatan_all();
			$this->load->view('home/templates/header', $data);
			$this->load->view('registrasi/index', $data);
			$this->load->view('home/templates/footer');
		} else {
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
			$pass = $this->input->post('nim');
			$password = password_hash($pass, true);
			$dataser = array('username' => $username, 'password' => $password); //ambil dari data diatas
			
			$id_auten = $this->master->user_tambah($dataser);
			if ($id_auten <= 0 or $id_auten === "") {
				$out['status'] = 'form';
				$out['msg'] = show_err_msg('Gagal tambah user');
			}else{
				$data = array('nim' => $this->input->post('nim'),
							'id_jenis' => 2,
							'id_autentikasi' => $id_auten,
							'nama' => $this->input->post('nama'),	
							'angkatan' => $this->input->post('angkatan'),
							'id_prodi' => $this->input->post('prodi'),
							'no_tlp' => $this->input->post('no_tlp'),
							'img' => "default.jpg"
						 );
				

				$result = $this->master->mahasiswa_tambah($data);
				if ($result > 0) {
					$this->session->set_flashdata(
						'message',
						'<div class="alert alert-success" role="alert">Data anda ditambahkan. Silahkan Login dengan Usernane = '.$username.' dan password '.$this->input->post('nim').'</div>'
					);
					redirect('home/login');
				} else {
					$data['title'] = 'registrasi';
					$this->load->model('admin/M_masteranggota', 'master');
					$data['dataProdi'] = $this->master->prodi_all();
					$data['datajabatan'] = $this->master->jabatan_all();
					$this->load->view('home/templates/header', $data);
					$this->load->view('registrasi/index', $data);
					$this->load->view('home/templates/footer');
				}
			}
		}
	}
	public function registerdos() {
		$this->form_validation->set_rules('nip', 'nip', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('nama_dosen', 'nama_dosen', 'trim|required');
		$this->form_validation->set_rules('no_tlp', 'no_tlp', 'trim|required|min_length[10]|max_length[15]');
		$this->load->model('admin/M_masteranggota', 'master');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'registrasi';
			$data['dataProdi'] = $this->master->prodi_all();
			$data['datajabatan'] = $this->master->jabatan_all();
			$this->load->view('home/templates/header', $data);
			$this->load->view('registrasi/index', $data);
			$this->load->view('home/templates/footer');
		}else{		
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
							'img' => "default.jpg"
						 );
				$result = $this->master->dosen_tambah($data);
				if ($result > 0) {
					$this->session->set_flashdata(
						'message',
						'<div class="alert alert-success" role="alert">Data anda ditambahkan. Silahkan Login dengan Usernane = '.$username.' dan password '.$this->input->post('nip').'</div>'
					);
					redirect('home/login');
				} else {
					$data['title'] = 'registrasi';
					$this->load->model('admin/M_masteranggota', 'master');
					$data['dataProdi'] = $this->master->prodi_all();
					$data['datajabatan'] = $this->master->jabatan_all();
					$this->load->view('home/templates/header', $data);
					$this->load->view('registrasi/index', $data);
					$this->load->view('home/templates/footer');
				}
			}
		}

	}

	// tutup anggota
	public function logout() {
		$this->session->sess_destroy();
		redirect('Home/login');
	}
}


/* End of file Home.php */
/* Location: ./application/controllers/Home.php */