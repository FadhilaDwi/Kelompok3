<?php
include('../../lib/koneksi.php');
$USERNAME = $_POST['USERNAME'];
$EMAIL = $_POST['EMAIL'];
$PASSWORD = $_POST['PASSWORD'];
$NAMA_LENGKAP = $_POST['NAMA_LENGKAP'];
$TGL_LAHIR = $_POST['TGL_LAHIR'];
$JENIS_KELAMIN = $_POST['JENIS_KELAMIN'];
//query update

if(isset($_POST['ubah_foto'])){ 

	$FOTO = $_FILES['FOTO']['name'];
	$tmp = $_FILES['FOTO']['tmp_name'];
	$gambarbaru = date('dmYHis').$FOTO;
	$path = "../../../../home/img/".$gambarbaru;

	if(move_uploaded_file($tmp, $path)){ 
		$query = "SELECT * FROM user WHERE USERNAME='".$USERNAME."'";
		$sql = mysqli_query($konek, $query); 
		
		if(is_file("../../../../home/img/" .$data['FOTO'])) // Jika foto ada
			unlink("../../../../home/img/" .$data['FOTO']); // Hapus file foto sebelumnya yang ada di folder
		
		// Proses ubah data ke Database
		$query = "UPDATE user SET USERNAME='$USERNAME', PASSWORD='$PASSWORD', EMAIL='$EMAIL', NAMA_LENGKAP='$NAMA_LENGKAP', TGL_LAHIR='$TGL_LAHIR', JENIS_KELAMIN='$JENIS_KELAMIN' , FOTO='$gambarbaru' WHERE USERNAME='$USERNAME' ";
		$sql = mysqli_query($konek, $query); // Eksekusi/ Jalankan query dari variabel $query

		if($sql){ // Cek jika proses simpan ke database sukses atau tidak
			// Jika Sukses, Lakukan :
			header('location: ../../index.php?p=user/developer&a=update_sukses');
    }else{
        header('location: ../../index.php?p=user/developer&a=update_gagal');  
        }
	}else{
		// Jika gambar gagal diupload, Lakukan :
		echo "Maaf, Gambar gagal untuk diupload.";
		echo "<br><a href='form_ubah.php'>Kembali Ke Form</a>";
	}
}else{ // Jika user tidak menceklis checkbox yang ada di form ubah, lakukan :
	// Proses ubah data ke Database
    $query = "UPDATE user SET USERNAME='$USERNAME', PASSWORD='$PASSWORD', EMAIL='$EMAIL', NAMA_LENGKAP='$NAMA_LENGKAP', TGL_LAHIR='$TGL_LAHIR', JENIS_KELAMIN='$JENIS_KELAMIN' WHERE USERNAME='$USERNAME' ";
	$sql = mysqli_query($konek, $query); // Eksekusi/ Jalankan query dari variabel $query

	if($sql){ // Cek jika proses simpan ke database sukses atau tidak
        // Jika Sukses, Lakukan :
        header('location: ../../index.php?p=user/developer&a=update_sukses');
}else{
    header('location: ../../index.php?p=user/developer&a=update_gagal');  
    }
}
?>

