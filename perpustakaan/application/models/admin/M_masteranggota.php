<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_masteranggota extends CI_Model {

	// buka mahasiswa
	public function mahasiswa_data($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
	{
		$sql = "SELECT (@row:=@row+1) AS nomora, nim, autentikasi.username, autentikasi.password, nama, angkatan, tb_prodi.prodi, no_tlp, foto FROM mahasiswa left join tb_prodi on tb_prodi.id_prodi = mahasiswa.id_prodi left join autentikasi on autentikasi.id_autentikasi = mahasiswa.id_autentikasi, (SELECT @row := 0) r WHERE 1=1 ";
		
		$data['totalData'] = $this->db->query($sql)->num_rows();

		if( ! empty($like_value))
		{
			$sql .= " AND ( ";    
			$sql .= "
				nim LIKE '%".$this->db->escape_like_str($like_value)."%' 
				OR nama LIKE '%".$this->db->escape_like_str($like_value)."%'
				OR prodi LIKE '%".$this->db->escape_like_str($like_value)."%'
				OR angkatan LIKE '%".$this->db->escape_like_str($like_value)."%'  
			";
			$sql .= " ) ";
		}

		$data['totalFiltered']	= $this->db->query($sql)->num_rows();
		
		$columns_order_by = array( 
			0 => 'nomora',
			2 => 'nim',
			5 => 'nama',
			7 => 'prodi',
			6 => 'angkatan'
		);

		$sql .= " ORDER BY ".$columns_order_by[$column_order]." ".$column_dir.", nomora ";
		$sql .= " LIMIT ".$limit_start." ,".$limit_length." ";
		
		$data['query'] = $this->db->query($sql);
		return $data;
	}
	
	public function mahasiswa_tambah($data) {
		$sql = "INSERT INTO mahasiswa VALUES('".$data['nim']."', '".$data['id_jenis']."', '".$data['id_autentikasi']."', '".$data['nama']."', '".$data['angkatan']."', '".$data['id_prodi']."', '".$data['no_tlp']."', '".$data['img']."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function mahasiswa_ubah($data){
		$sql = "UPDATE mahasiswa SET nama='" .$data['nama_mahasiswa'] ."', no_tlp ='".$data['no_tlp']."', foto ='".$data['foto']."'  WHERE nim='" .$data['nim'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function mahasiswa_by_id($nim) {
		$this->db->from('mahasiswa');
		$this->db->where('nim',$nim);
		$query = $this->db->get();

		return $query->row();
	}

	public function mahasiswa_hapus($nim) {
		$sql = "DELETE FROM mahasiswa WHERE nim='".$nim ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function mahasiswa_hapuser($id_autentikasi) {
		$this->db->delete('autentikasi', array('id_autentikasi' => $id_autentikasi));
		return $this->db->affected_rows();
	}

	public function user_tambah($data) {
		$sql = "INSERT INTO autentikasi VALUES ('', '".$data['username']."', '".$data['password']."')";

		 $this->db->query($sql);
		 return $this->db->insert_id();
	}
	public function mahasiswa_cek($nim) {
		return $this->db->query("SELECT * FROM mahasiswa WHERE nim ='".$nim."'")->num_rows();
	}

	public function mahasiswa_by_auten($id_autentikasi) {
		$this->db->query("SELECT * FROM mahasiswa WHERE id_autentikasi =".$id_autentikasi."");
		return $this->db->affected_rows();
	}
	public function mahasiswa_databy_auten($id_autentikasi) {
		$query = $this->db->query("SELECT * FROM mahasiswa WHERE id_autentikasi =".$id_autentikasi."");
		return $query->row();
	}
	// tutup mahasiswa

	// buka dosen
	public function dosen_data($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
	{
		$sql = "SELECT (@row:=@row+1) AS nomora, nip, nama, tb_jabatan.nama_jabatan, no_tlp, foto FROM dosen left join tb_jabatan on tb_jabatan.id_jabatan = dosen.id_jabatan, (SELECT @row := 0) r WHERE 1=1 ";
		
		$data['totalData'] = $this->db->query($sql)->num_rows();

		if( ! empty($like_value))
		{
			$sql .= " AND ( ";    
			$sql .= "
				nip LIKE '%".$this->db->escape_like_str($like_value)."%' 
				OR nama LIKE '%".$this->db->escape_like_str($like_value)."%'
				OR jabatan LIKE '%".$this->db->escape_like_str($like_value)."%'
				OR no_tlp LIKE '%".$this->db->escape_like_str($like_value)."%'  
			";
			$sql .= " ) ";
		}

		$data['totalFiltered']	= $this->db->query($sql)->num_rows();
		
		$columns_order_by = array( 
			0 => 'nomora',
			1 => 'nip',
			2 => 'nama',
			3 => 'jabatan',
			4 => 'no_tlp'
		);

		$sql .= " ORDER BY ".$columns_order_by[$column_order]." ".$column_dir.", nomora ";
		$sql .= " LIMIT ".$limit_start." ,".$limit_length." ";
		
		$data['query'] = $this->db->query($sql);
		return $data;
	}

	public function dosen_tambah($data) {
		$sql = "INSERT INTO dosen VALUES('".$data['nip']."', '".$data['id_jenis']."', '".$data['id_autentikasi']."', '".$data['nama']."', '".$data['jabatan']."', '".$data['no_tlp']."', '".$data['img']."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function dosen_by_id($nip) {
		$this->db->from('dosen');
		$this->db->where('nip',$nip);
		$query = $this->db->get();

		return $query->row();
	}

	public function dosen_ubah($data){
		$sql = "UPDATE dosen SET nama='" .$data['nama_dosen'] ."', no_tlp ='".$data['no_tlp']."', foto ='".$data['foto']."'  WHERE nip='" .$data['nip'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function dos_by_auten($id_autentikasi) {
		$this->db->query("SELECT * FROM dosen WHERE id_autentikasi =".$id_autentikasi."");
		return $this->db->affected_rows();
	}
	public function dosen_databy_auten($id_autentikasi) {
		$query = $this->db->query("SELECT * FROM dosen WHERE id_autentikasi =".$id_autentikasi."");
		return $query->row();
	}
	// tutup dosen

	// buka prodi
	public function prodi_data($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
	{
		$sql = "SELECT (@row:=@row+1) AS nomora, id_prodi, prodi, jurusan FROM tb_prodi, (SELECT @row := 0) r WHERE 1=1 ";
		
		$data['totalData'] = $this->db->query($sql)->num_rows();

		if( ! empty($like_value))
		{
			$sql .= " AND ( ";    
			$sql .= "
				id_penerbit LIKE '%".$this->db->escape_like_str($like_value)."%' 
				OR prodi LIKE '%".$this->db->escape_like_str($like_value)."%'
				OR jurusan LIKE '%".$this->db->escape_like_str($like_value)."%'  
			";
			$sql .= " ) ";
		}

		$data['totalFiltered']	= $this->db->query($sql)->num_rows();
		
		$columns_order_by = array( 
			0 => 'nomora',
			1 => 'id_penerbit',
			2 => 'prodi',
			3 => 'jurusan'
		);

		$sql .= " ORDER BY ".$columns_order_by[$column_order]." ".$column_dir.", nomora ";
		$sql .= " LIMIT ".$limit_start." ,".$limit_length." ";
		
		$data['query'] = $this->db->query($sql);
		return $data;
	}

	public function prodi_tambah($data) {
		$sql = "INSERT INTO tb_prodi VALUES('', '".$data['prodi']."', '".$data['jurusan']."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function prodi_by_id($id_prodi) {
		$this->db->from('tb_prodi');
		$this->db->where('id_prodi',$id_prodi);
		$query = $this->db->get();

		return $query->row();
	}

	public function prodi_all() {
		 return $this->db->get('tb_prodi')->result_array();
	}

	public function prodi_ubah($data){
		$sql = "UPDATE tb_prodi SET prodi='" .$data['prodi'] ."', jurusan ='".$data['jurusan']."' WHERE id_prodi='" .$data['id_prodi'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
	public function prodi_hapus($id_prodi) {
		$sql = "DELETE FROM tb_prodi WHERE id_prodi='" .$id_prodi ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
	// tutup prodi

	// buka jabatan
	public function jabatan_data($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
	{
		$sql = "SELECT (@row:=@row+1) AS nomora, id_jabatan, nama_jabatan, singkatan FROM tb_jabatan, (SELECT @row := 0) r WHERE 1=1 ";
		
		$data['totalData'] = $this->db->query($sql)->num_rows();

		if( ! empty($like_value))
		{
			$sql .= " AND ( ";    
			$sql .= "
				id_jabatan LIKE '%".$this->db->escape_like_str($like_value)."%' 
				OR nama_jabatan LIKE '%".$this->db->escape_like_str($like_value)."%'
				OR singkatan LIKE '%".$this->db->escape_like_str($like_value)."%'  
			";
			$sql .= " ) ";
		}

		$data['totalFiltered']	= $this->db->query($sql)->num_rows();
		
		$columns_order_by = array( 
			0 => 'nomora',
			1 => 'id_jabatan',
			2 => 'nama_jabatan',
			3 => 'singkatan'
		);

		$sql .= " ORDER BY ".$columns_order_by[$column_order]." ".$column_dir.", nomora ";
		$sql .= " LIMIT ".$limit_start." ,".$limit_length." ";
		
		$data['query'] = $this->db->query($sql);
		return $data;
	}

	public function jabatan_tambah($data) {
		$sql = "INSERT INTO tb_jabatan VALUES('', '".$data['jabatan']."', '".$data['singkatan']."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}


	public function jabatan_by_id($id_jabatan) {
		$this->db->from('tb_jabatan');
		$this->db->where('id_jabatan',$id_jabatan);
		$query = $this->db->get();

		return $query->row();
	}

	public function jabatan_ubah($data){
		$sql = "UPDATE tb_jabatan SET nama_jabatan='" .$data['jabatan'] ."', singkatan ='".$data['singkatan']."' WHERE id_jabatan='" .$data['id_jabatan'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
	public function jabatan_hapus($id_jabatan) {
		$sql = "DELETE FROM tb_jabatan WHERE id_jabatan='" .$id_jabatan ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
	public function jabatan_all() {
		 return $this->db->get('tb_jabatan')->result_array();
	}

	// tutup jabatan
}