
<?php
include('../../lib/koneksi.php');
$KD_PERUM = $_POST['KD_PERUM'];
$NAMA_PERUM = $_POST['NAMA_PERUM'];
$LOKASI = $_POST['LOKASI'];

//query update

if(isset($_POST['ubah_foto'])){ 

	$GAMBAR_PERUM = $_FILES['GAMBAR_PERUM']['name'];
	$tmp = $_FILES['GAMBAR_PERUM']['tmp_name'];
	$gambarbaru = date('dmYHis').$GAMBAR_PERUM;
	$path = "../../../../home/img/".$gambarbaru;

	if(move_uploaded_file($tmp, $path)){ 
		$query = "SELECT * FROM perum WHERE KD_PERUM='$KD_PERUM'";
		$sql = mysqli_query($konek, $query); 
		
		if(is_file("../../../../home/img/" .$data['GAMBAR_PERUM'])) // Jika foto ada
			unlink("../../../../home/img/" .$data['GAMBAR_PERUM']); // Hapus file foto sebelumnya yang ada di folder
		
		// Proses ubah data ke Database
		$query = "UPDATE perum SET NAMA_PERUM='$NAMA_PERUM', LOKASI='$LOKASI', GAMBAR_PERUM='$gambarbaru' WHERE KD_PERUM='$KD_PERUM' ";
		$sql = mysqli_query($konek, $query); // Eksekusi/ Jalankan query dari variabel $query

		if($sql){ // Cek jika proses simpan ke database sukses atau tidak
			// Jika Sukses, Lakukan :
			header('location: ../../index.php?p=perum/perum&a=update_sukses');
    }else{
        header('location: ../../index.php?p=perum/perum&a=update_gagal');  
        }
	}else{
		// Jika gambar gagal diupload, Lakukan :
		echo "Maaf, Gambar gagal untuk diupload.";
		echo "<br><a href='form_ubah.php'>Kembali Ke Form</a>";
	}
}else{ // Jika user tidak menceklis checkbox yang ada di form ubah, lakukan :
	// Proses ubah data ke Database
    $query = "UPDATE perum SET NAMA_PERUM='$NAMA_PERUM', LOKASI='$LOKASI' WHERE KD_PERUM='$KD_PERUM' ";
	$sql = mysqli_query($konek, $query); // Eksekusi/ Jalankan query dari variabel $query

	if($sql){ // Cek jika proses simpan ke database sukses atau tidak
        // Jika Sukses, Lakukan :
        header('location: ../../index.php?p=perum/perum&a=update_sukses');
}else{
    header('location: ../../index.php?p=perum/perum&a=update_gagal');  
    }
}
?>

