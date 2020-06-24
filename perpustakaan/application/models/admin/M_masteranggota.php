<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_masteranggota extends CI_Model {

	// buka mahasiswa
	public function mahasiswa_data($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
	{
		$sql = "SELECT (@row:=@row+1) AS nomora, nim, nama, tb_prodi.prodi, no_tlp, foto FROM mahasiswa left join tb_prodi on tb_prodi.id_prodi = mahasiswa.id_prodi, (SELECT @row := 0) r WHERE 1=1 ";
		
		$data['totalData'] = $this->db->query($sql)->num_rows();

		if( ! empty($like_value))
		{
			$sql .= " AND ( ";    
			$sql .= "
				nim LIKE '%".$this->db->escape_like_str($like_value)."%' 
				OR nama LIKE '%".$this->db->escape_like_str($like_value)."%'
				OR prodi LIKE '%".$this->db->escape_like_str($like_value)."%'
				OR no_tlp LIKE '%".$this->db->escape_like_str($like_value)."%'  
			";
			$sql .= " ) ";
		}

		$data['totalFiltered']	= $this->db->query($sql)->num_rows();
		
		$columns_order_by = array( 
			0 => 'nomora',
			1 => 'nim',
			2 => 'nama',
			3 => 'prodi',
			4 => 'no_telp'
		);

		$sql .= " ORDER BY ".$columns_order_by[$column_order]." ".$column_dir.", nomora ";
		$sql .= " LIMIT ".$limit_start." ,".$limit_length." ";
		
		$data['query'] = $this->db->query($sql);
		return $data;
	}
	// tutup mahasiswa

	// buka dosen
	public function dosen_data($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
	{
		$sql = "SELECT (@row:=@row+1) AS nomora, nip, nama, jabatan, no_tlp FROM dosen, (SELECT @row := 0) r WHERE 1=1 ";
		
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
}