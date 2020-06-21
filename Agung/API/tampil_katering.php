<?php 


	//Import File Koneksi Database
	require_once('koneksi2.php');
	
	//Membuat SQL Query
	$sql = "SELECT * FROM mitra";
	
	//Mendapatkan Hasil
	$r = mysqli_query($con,$sql);
	
	//Membuat Array Kosong 
	$result = array();
	
	while($row = mysqli_fetch_array($r)){
		
		//Memasukkan Nama dan ID kedalam Array Kosong yang telah dibuat 
		array_push($result,array(
			"id_katering"=>$row['id_mitra'],
			"nama_katering"=>$row['nama_katering'],
			"alamat_katering"=>$row['alamat'],
            "no_telp_katering"=>$row['no_telepon'],
            "email_katering"=>$row['email']
		));
	}
	
	//Menampilkan Array dalam Format JSON
	echo json_encode(array('result'=>$result));
	
	mysqli_close($con);
?>