
<?php
include('../../lib/koneksi.php');

$KD_PT = $_POST['KD_PT'];
$NAMA_PERUM= $_POST['NAMA_PERUM'];
$LOKASI= $_POST['LOKASI'];
$GAMBAR_PERUM = $_FILES['GAMBAR_PERUM']['name'];
$tmp = $_FILES['GAMBAR_PERUM']['tmp_name'];


$gambarbaru = date('dmYHis').$GAMBAR_PERUM;

$path = "../../../../home/img/".$gambarbaru;

//query update
if (move_uploaded_file($tmp, $path)) {
$query = "INSERT INTO perum (`KD_PERUM`, `KD_PT`, `NAMA_PERUM`, `LOKASI`, `GAMBAR_PERUM`) VALUES (null, '$KD_PT', '$NAMA_PERUM', '$LOKASI', '$gambarbaru')";
$sql = mysqli_query($konek, $query);
if($sql){
        # credirect ke page index
            header('location: ../../index.php?p=perum/perum&a=insert_sukses');
        }else{
            header('location: ../../index.php?p=perum/perum&a=insert_gagal');  
    }
}
   