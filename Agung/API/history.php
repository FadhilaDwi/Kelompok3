<?php 

 
	
	//Mendapatkan Nilai Dari Variable ID Pegawai yang ingin ditampilkan
	$id = $_GET['id'];
	
	//Importing database
	require_once('koneksi2.php');
	
	//Membuat SQL Query dengan pegawai yang ditentukan secara spesifik sesuai ID
	$sql = "SELECT * FROM pesanan WHERE id_pelanggan='$id'";
	
	//Mendapatkan Hasil 
	$r = mysqli_query($con,$sql);
	
	//Memasukkan Hasil Kedalam Array
	$result = array();
	while ($row = mysqli_fetch_array($r)){
	array_push($result,array(
			"nama_katering"=>$row['nama_katering'],
			"nama_menu"=>$row['nama_menu'],
			"jumlah_pesan"=>$row['jumlah_pesanan'],
			"sub_total"=>$row['total_harga'],
			"status"=>$row['status_pesanan'],

		));
    }
	//Menampilkan dalam format JSON
	echo json_encode(array('result'=>$result));
	
	mysqli_close($con);
?>