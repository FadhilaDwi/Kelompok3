<?php 

 
	
	//Mendapatkan Nilai Dari Variable ID Pegawai yang ingin ditampilkan
	$user = $_GET['username'];
	
	//Importing database
	require_once('koneksi2.php');
	
	//Membuat SQL Query dengan pegawai yang ditentukan secara spesifik sesuai ID
	$sql = "SELECT * FROM pelanggan WHERE username='$user'";
	
	//Mendapatkan Hasil 
	$r = mysqli_query($con,$sql);
	
	//Memasukkan Hasil Kedalam Array
	$result = array();
	while ($row = mysqli_fetch_array($r)){
	array_push($result,array(
			"id"=>$row['id_pelanggan'],
			"username"=>$row['username'],
			"name"=>$row['nama_pelanggan'],
			"email"=>$row['email'],
			"alamat"=>$row['alamat'],
			"no_telp"=>$row['no_telepon'],
			"gambar_profil"=>'http://192.168.10.242/Kelompok3/Dodhy/pelanggan/assets/img/profil/'.strip_tags($row['foto']),

		));
    }
	//Menampilkan dalam format JSON
	echo json_encode(array('result'=>$result));
	
	mysqli_close($con);
?>