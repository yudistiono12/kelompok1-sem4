<?php 

$prodi = "TIF";
$tahun = 2018;
$nim = "E41180879";

$noUrut = substr($nim, 5, 4);


$username = $prodi.$tahun.$noUrut;
echo "ini testing buat user <br>";
echo "Username = ".$username."</br>";
echo "Password &nbsp;&nbsp;= ".$nim."<br>";

$nip = 199408122019031013;
$noUrutNip = substr($nip, 8, 10);
$jabatan = "AA";

$usernameDos = $jabatan.$noUrutNip;
echo "Username Dosen = ".$usernameDos."</br>";
echo "Password &nbsp;&nbsp;= ".$nip;

$test = '$2y$10$QWoLi2io1YoL0mEweluMT.zj28on8cYTWKDOJCdfWdm/DEwlHsAYW';
if (password_verify('E41180833', $test)){
	echo "benar";
}else{
	echo "salah";

}

echo $userdata->id_jenis;
?>