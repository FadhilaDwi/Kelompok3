<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){	
		//Mendapatkan Nilai Variable
		$id = $_POST['id'];
		$total = $_POST['sub_total'];
		$metode = $_POST['metode_bayar'];
		$jumlah = $_POST['jumlah_pesan'];
		$alamat = $_POST['alamat_pesan'];
		$id_menu = $_POST['id_menu'];
		$status = 'belum membayar';
		$bukti = 'kosong';
		
		//Import File Koneksi database 
		require_once('koneksi2.php');	
		//Pembuatan Syntax SQL
		$sql = "INSERT INTO pemesanan (id_pelanggan,total_harga,metode_bayar) VALUES ('$id','$total','$metode')";
		//Eksekusi Query database
		if(mysqli_query($con,$sql)){
			$last_id = mysqli_insert_id($con);
		$oke = "INSERT INTO detail_pemesanan (id_pesan,id_menu,jumlah_pesanan,alamat_pesanan,status_pesanan,bukti_pembayaran) VALUES ('$last_id','$id_menu','$jumlah','$alamat','$status','$bukti')";
		$masuk=mysqli_query($con,$oke);
		echo 'Berhasil Menambahkan Pesanan';
		}else{
			echo 'Gagal Menambahkan Pesanan';
		}	
		mysqli_close($con);
	}
?>