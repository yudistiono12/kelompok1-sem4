<?php 	
require("koneksi.php");

$response = array();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$nim = $_POST["nim"];
	$password = $_POST["password"];

	$perintah=$koneksi->query("SELECT * FROM tb_member 
  		WHERE nim='$nim' AND password='$password'");
	
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
