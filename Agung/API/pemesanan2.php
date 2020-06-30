<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){	
		//Mendapatkan Nilai Variable
		$id = $_POST['id'];
		$total = $_POST['sub_total'];
        $metode = $_POST['metode_bayar'];
//Import File Koneksi database
require_once('koneksi2.php');		
		//Pembuatan Syntax SQL
		$sql = "INSERT INTO pemesanan (id_pelanggan,total_harga,metode_bayar) VALUES ('$id','$total','$metode')";
		//Eksekusi Query database
		if(mysqli_query($con,$sql)){
			echo 'Berhasil Menambahkan Pesanan';
		}else{
			echo 'Gagal Menambahkan Pesanan';
		}
		mysqli_close($con);
	}
?>