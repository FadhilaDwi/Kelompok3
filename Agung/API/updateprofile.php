<?php 
	if($_SERVER['REQUEST_METHOD']=='POST'){
		//MEndapatkan Nilai Dari Variable 
		$id = $_POST['id'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$alamat = $_POST['alamat'];
		$no_telp = $_POST['no_telp'];
		
		//import file koneksi database 
		require_once('koneksi2.php');
		
		//Membuat SQL Query
		$sql = "UPDATE pelanggan SET nama_pelanggan = '$name', email = '$email', alamat = '$alamat', no_telepon = '$no_telp' WHERE id_pelanggan = $id;";
		
		//Meng-update Database 
		if(mysqli_query($con,$sql)){
			echo 'Berhasil Memperbarui Profil Anda';
		}else{
			echo 'Gagal Memperbarui Profil Anda';
		}
		
		mysqli_close($con);
	}
?>