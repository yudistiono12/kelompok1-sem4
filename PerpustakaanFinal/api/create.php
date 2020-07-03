<?php 	
require("koneksi.php");

$response = array();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$nim = $_POST["nim"];
	$nama = $_POST["nama"];
	$password = $_POST["password"];
	$alamat = $_POST["alamat"];
	$fakultas = $_POST["fakultas"];
	$prodi = $_POST["prodi"];

	$hash_password = password_hash($password, PASSWORD_DEFAULT);

	$perintah = "INSERT INTO tb_member (nim, nama, password, alamat, fakultas, prodi) VALUES('$nim','$nama', '$hash_password','$alamat','$fakultas','$prodi')";
	$eksekusi = mysqli_query($konek, $perintah);
	$cek = mysqli_affected_rows($konek);

	if($cek >0){
		$response["kode"] = 1;
 		$response["pesan"] = "Data Berhasil Disimpan!";
	}
	else{
		$response["kode"] = 0;
	 	$response["pesan"] = "Gagal Menyimpan Data!";
	}


 }
 else{
 	$response["kode"] = 0;
 	$response["pesan"] = "Tidak Ada Post Data";
 }

 echo json_encode($response);
 mysqli_close($konek);
