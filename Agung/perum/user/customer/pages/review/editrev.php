<?php
include('../../lib/koneksi.php');
$KD_REV = $_POST['KD_REV'];
$ISI_REV = $_POST['ISI_REV'];
$RATING = $_POST['RATING'];

//query update

if(isset($_POST['ubah_foto'])){ 

	$FOTO_REV = $_FILES['FOTO_REV']['name'];
	$tmp = $_FILES['FOTO_REV']['tmp_name'];
	$gambarbaru = date('dmYHis').$FOTO_REV;
	$path = "../../../../home/img/".$gambarbaru;

	if(move_uploaded_file($tmp, $path)){ 
		$query = "SELECT * FROM review WHERE KD_REV='$KD_REV'";
		$sql = mysqli_query($konek, $query); 
		
		if(is_file("../../../../home/img/" .$data['FOTO_REV'])) // Jika foto ada
			unlink("../../../../home/img/" .$data['FOTO_REV']); // Hapus file foto sebelumnya yang ada di folder 
		
		// Proses ubah data ke Database
        $query = "UPDATE review SET ISI_REV='$ISI_REV', FOTO_REV='$gambarbaru', RATING='$RATING' WHERE KD_REV='$KD_REV' ";
		$sql = mysqli_query($konek, $query); // Eksekusi/ Jalankan query dari variabel $query

		if($sql){ // Cek jika proses simpan ke database sukses atau tidak
			// Jika Sukses, Lakukan :
			header('location: ../../index.php?p=review/review&a=update_sukses');
    }else{
        header('location: ../../index.php?p=review/review&a=update_gagal');  
        }
	}else{
		// Jika gambar gagal diupload, Lakukan :
		echo "Maaf, Gambar gagal untuk diupload.";
		echo "<br><a href='form_ubah.php'>Kembali Ke Form</a>";
	}
}else{ // Jika user tidak menceklis checkbox yang ada di form ubah, lakukan :
	// Proses ubah data ke Database
    $query = "UPDATE review SET ISI_REV='$ISI_REV', RATING='$RATING' WHERE KD_REV='$KD_REV' ";
	$sql = mysqli_query($konek, $query); // Eksekusi/ Jalankan query dari variabel $query

	if($sql){ // Cek jika proses simpan ke database sukses atau tidak
        // Jika Sukses, Lakukan :
        header('location: ../../index.php?p=review/review&a=update_sukses');
}else{
    header('location: ../../index.php?p=review/review&a=update_gagal');  
    }
}
?>

