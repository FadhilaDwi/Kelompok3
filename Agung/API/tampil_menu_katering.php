<?php 

$id = $_GET['id_mitra'];
$tgl=date('Y-m-d');
	//Import File Koneksi Database
	require_once('koneksi2.php');
	
	//Membuat SQL Query
	$sql = "SELECT * FROM menu where hari='$tgl' && id_mitra = '$id'";
	
	//Mendapatkan Hasil
	$r = mysqli_query($con,$sql);
	
	//Membuat Array Kosong 
	$result = array();
	
	while($row = mysqli_fetch_array($r)){
		
		//Memasukkan Nama dan ID kedalam Array Kosong yang telah dibuat 
		array_push($result,array(
			"nama_menu"=>$row['nama_menu'],
			"foto"=>$row['foto'],
			"harga"=>$row['harga_menu'],
			"gambar"=>'http://192.168.10.242/Kelompok3/Utama/pelanggan/assets/img/mitra/'.strip_tags($row['foto']),
            
		));
	}
	
	//Menampilkan Array dalam Format JSON
	echo json_encode(array('result'=>$result));
	
	mysqli_close($con);
?>