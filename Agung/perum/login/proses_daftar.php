<?php
// Load file koneksi.php
include "koneksi.php";

// Ambil Data yang Dikirim dari Form

$USERNAME = $_POST["USERNAME"];
$PASSWORD = md5($_POST["PASSWORD"]);
$STATUS = $_POST['STATUS'];
$EMAIL = $_POST['EMAIL'];
$NAMA_LENGKAP= $_POST['NAMA_LENGKAP'];
$TGL_LAHIR = $_POST['TGL_LAHIR'];
$JENIS_KELAMIN = $_POST['JENIS_KELAMIN'];
$FOTO = "pp.jpg";

// Rename nama fotonya dengan menambahkan tanggal dan jam upload


// Proses upload

	// Proses simpan ke Database
	$query = "INSERT INTO user (`USERNAME`, `EMAIL`, `PASSWORD`, `STATUS`, `NAMA_LENGKAP`, `TGL_LAHIR`, `JENIS_KELAMIN`, `FOTO`) VALUES('$USERNAME', '$EMAIL','$PASSWORD', '$STATUS' , '$NAMA_LENGKAP', '$TGL_LAHIR', '$JENIS_KELAMIN', '$FOTO')";
	$sql = mysqli_query($konek, $query); // Eksekusi/ Jalankan query dari variabel $query
	
	if($sql){ // Cek jika proses simpan ke database sukses atau tidak
		// Jika Sukses, Lakukan :
		header('location:login.php?&a=insert_sukses');
}else{
	header('location:login.php&a=insert_sukses');  
	}

?>




