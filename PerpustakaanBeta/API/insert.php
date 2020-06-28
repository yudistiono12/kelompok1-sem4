<?php 
if($_SERVER['REQUEST_METHOD']=='POST') {

	$response = array();
	//mendapatkan data
	$nim = $_POST['nim'];
	$nama = $_POST['nama'];
	$jk = $_POST['jk'];
	$fakultas = $_POST['fakultas'];
	$prodi = $_POST['prodi'];

	require_once('config.php');
	//cek nim telah terdaftar atau belum
	$sql = "SELECT * FROM registrasi WHERE nim = '$nim'";
	$check = mysqli_fetch_array(mysqli_query($con,$sql));
	if(isset($check)){
		$response["value"] = 0;
		$response["message"] = "maaf, nim telah terdaftar!";
		echo json_encode($response); 
	} else {
		$sql = "INSERT INTO registrasi (nim,nama,jk,fakultas,prodi) VALUES('$nim','$nama','$jk','$fakultas','prodi')";
		if(mysqli_query($con,$sql)) {
			$response["value"] = 1;
			$response["message"] = "Berhasil Mendaftar";
			echo json_encode($response);
		} else {
			$response["value"] = 0;
			$response["message"] = "Maaf, Silahkan Coba Lagi!";
			echo json_encode($response);
		}
	}
	//close database
	mysqli_close($con);
} else {
	$response["value"] = 0;
	$response["message"] = "Maaf, Silahkan Coba Lagi!";
	echo json_encode($response);
}
