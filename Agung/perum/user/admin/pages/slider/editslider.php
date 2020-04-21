
<?php
include('../../lib/koneksi.php');
$KD_SLIDER = $_POST['KD_SLIDER'];
$JUDUL = $_POST['JUDUL'];
$KETERANGAN = $_POST['KETERANGAN'];
$URUTAN = $_POST['URUTAN'];

//query update

if(isset($_POST['ubah_foto'])){ 

	$GAMBAR_SLIDER = $_FILES['GAMBAR_SLIDER']['name'];
	$tmp = $_FILES['GAMBAR_SLIDER']['tmp_name'];
	$gambarbaru = date('dmYHis').$GAMBAR_SLIDER;
	$path = "../../../../home/img/".$gambarbaru;

	if(move_uploaded_file($tmp, $path)){ 
		$query = "SELECT * FROM slider WHERE KD_SLIDER='$KD_SLIDER'";
		$sql = mysqli_query($konek, $query); 
		
		if(is_file("../../../../home/img/" .$data['GAMBAR_SLIDER'])) // Jika foto ada
			unlink("../../../../home/img/" .$data['GAMBAR_SLIDER']); // Hapus file foto sebelumnya yang ada di folder 
		
		// Proses ubah data ke Database
		$query = "UPDATE slider SET JUDUL='$JUDUL', KETERANGAN='$KETERANGAN', GAMBAR_SLIDER='$gambarbaru', URUTAN='$URUTAN' WHERE KD_SLIDER='$KD_SLIDER' ";
		$sql = mysqli_query($konek, $query); // Eksekusi/ Jalankan query dari variabel $query

		if($sql){ // Cek jika proses simpan ke database sukses atau tidak
			// Jika Sukses, Lakukan :
			header('location: ../../index.php?p=slider/slider&a=update_sukses');
    }else{
        header('location: ../../index.php?p=slider/slider&a=update_gagal');  
        }
	}else{
		// Jika gambar gagal diupload, Lakukan :
		echo "Maaf, Gambar gagal untuk diupload.";
		echo "<br><a href='form_ubah.php'>Kembali Ke Form</a>";
	}
}else{ // Jika user tidak menceklis checkbox yang ada di form ubah, lakukan :
	// Proses ubah data ke Database
    $query = "UPDATE slider SET JUDUL='$JUDUL', KETERANGAN='$KETERANGAN', URUTAN='$URUTAN'  WHERE KD_SLIDER='$KD_SLIDER' ";
	$sql = mysqli_query($konek, $query); // Eksekusi/ Jalankan query dari variabel $query

	if($sql){ // Cek jika proses simpan ke database sukses atau tidak
        // Jika Sukses, Lakukan :
        header('location: ../../index.php?p=slider/slider&a=update_sukses');
}else{
    header('location: ../../index.php?p=slider/slider&a=update_gagal');  
    }
}
?>

