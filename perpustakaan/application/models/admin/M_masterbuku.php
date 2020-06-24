<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_masterbuku extends CI_Model {

	// buka penerbit
	public function penerbit_data($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
	{
		$sql = "SELECT (@row:=@row+1) AS nomora, id_penerbit, nama_penerbit, alamat FROM tb_penerbit, (SELECT @row := 0) r WHERE 1=1 ";
		
		$data['totalData'] = $this->db->query($sql)->num_rows();

		if( ! empty($like_value))
		{
			$sql .= " AND ( ";    
			$sql .= "
				id_penerbit LIKE '%".$this->db->escape_like_str($like_value)."%' 
				OR nama_penerbit LIKE '%".$this->db->escape_like_str($like_value)."%'
				OR alamat LIKE '%".$this->db->escape_like_str($like_value)."%'  
			";
			$sql .= " ) ";
		}

		$data['totalFiltered']	= $this->db->query($sql)->num_rows();
		
		$columns_order_by = array( 
			0 => 'nomora',
			1 => 'id_penerbit',
			2 => 'nama_penerbit',
			3 => 'alamat'
		);

		$sql .= " ORDER BY ".$columns_order_by[$column_order]." ".$column_dir.", nomora ";
		$sql .= " LIMIT ".$limit_start." ,".$limit_length." ";
		
		$data['query'] = $this->db->query($sql);
		return $data;
	}

	public function penerbit_tambah($data) {
		$sql = "INSERT INTO tb_penerbit VALUES('', '".$data['nama_penerbit']."', '".$data['alamat']."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function penerbit_by_id($id_penerbit) {
		$this->db->from('tb_penerbit');
		$this->db->where('id_penerbit',$id_penerbit);
		$query = $this->db->get();

		return $query->row();
	}

	public function penerbit_ubah($data){
		$sql = "UPDATE tb_penerbit SET nama_penerbit='" .$data['nama_penerbit'] ."', alamat='" .$data['alamat'] ."' WHERE id_penerbit='" .$data['id_penerbit'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}	

	public function penerbit_hapus($id_penerbit) {
		$sql = "DELETE FROM tb_penerbit WHERE id_penerbit='" .$id_penerbit ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
	// tutup penerbit

	// buka kategori
	public function kategori_data($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
	{
		$sql = "SELECT (@row:=@row+1) AS nomora, id_kategori, nama_kategori FROM kategori, (SELECT @row := 0) r WHERE 1=1 ";
		
		$data['totalData'] = $this->db->query($sql)->num_rows();

		if( ! empty($like_value))
		{
			$sql .= " AND ( ";    
			$sql .= "
				id_kategori LIKE '%".$this->db->escape_like_str($like_value)."%' 
				OR nama_kategori LIKE '%".$this->db->escape_like_str($like_value)."%'
			";
			$sql .= " ) ";
		}

		$data['totalFiltered']	= $this->db->query($sql)->num_rows();
		
		$columns_order_by = array( 
			0 => 'nomora',
			1 => 'id_kategori',
			2 => 'nama_kategori',
		);

		$sql .= " ORDER BY ".$columns_order_by[$column_order]." ".$column_dir.", nomora ";
		$sql .= " LIMIT ".$limit_start." ,".$limit_length." ";
		
		$data['query'] = $this->db->query($sql);
		return $data;
	}

	public function kategori_tambah($data) {
		$sql = "INSERT INTO kategori VALUES('', '".$data['nama_kategori']."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function kategori_by_id($id_kategori) {
		$this->db->from('kategori');
		$this->db->where('id_kategori',$id_kategori);
		$query = $this->db->get();

		return $query->row();
	}

	public function kategori_ubah($data){
		$sql = "UPDATE kategori SET nama_kategori='" .$data['nama_kategori'] ."' WHERE id_kategori='" .$data['id_kategori'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function kategori_hapus($id_kategori) {
		$sql = "DELETE FROM kategori WHERE id_kategori='" .$id_kategori ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
	// tutup kategori

	// buka pengarang
	public function pengarang_data($like_value = NULL, $column_order = NULL, $column_dir = NULL, $limit_start = NULL, $limit_length = NULL)
	{
		$sql = "SELECT (@row:=@row+1) AS nomora, id_pengarang, nama_pengarang FROM tb_pengarang, (SELECT @row := 0) r WHERE 1=1 ";
		
		$data['totalData'] = $this->db->query($sql)->num_rows();

		if( ! empty($like_value))
		{
			$sql .= " AND ( ";    
			$sql .= "
				id_pengarang LIKE '%".$this->db->escape_like_str($like_value)."%' 
				OR nama_pengarang LIKE '%".$this->db->escape_like_str($like_value)."%'
			";
			$sql .= " ) ";
		}

		$data['totalFiltered']	= $this->db->query($sql)->num_rows();
		
		$columns_order_by = array( 
			0 => 'nomora',
			1 => 'id_pengarang',
			2 => 'nama_pengarang',
		);

		$sql .= " ORDER BY ".$columns_order_by[$column_order]." ".$column_dir.", nomora ";
		$sql .= " LIMIT ".$limit_start." ,".$limit_length." ";
		
		$data['query'] = $this->db->query($sql);
		return $data;
	}

	public function pengarang_tambah($data) {
		$sql = "INSERT INTO tb_pengarang VALUES('', '".$data['nama_pengarang']."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function pengarang_by_id($id_pengarang) {
		$this->db->from('tb_pengarang');
		$this->db->where('id_pengarang',$id_pengarang);
		$query = $this->db->get();

		return $query->row();
	}

	public function pengarang_ubah($data){
		$sql = "UPDATE tb_pengarang SET nama_pengarang='" .$data['nama_pengarang'] ."' WHERE id_pengarang='" .$data['id_pengarang'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function pengarang_hapus($id_pengarang) {
		$sql = "DELETE FROM tb_pengarang WHERE id_pengarang='" .$id_pengarang ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
	// tutup pengarang
}