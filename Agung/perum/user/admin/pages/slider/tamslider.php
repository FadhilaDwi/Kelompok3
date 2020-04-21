
<?php
include('../../lib/koneksi.php');


$JUDUL= $_POST['JUDUL'];
$KETERANGAN= $_POST['KETERANGAN'];
$URUTAN= $_POST['URUTAN'];
$GAMBAR_SLIDER = $_FILES['GAMBAR_SLIDER']['name'];
$tmp = $_FILES['GAMBAR_SLIDER']['tmp_name'];


$gambarbaru = date('dmYHis').$GAMBAR_SLIDER;

$path = "../../../../home/img/".$gambarbaru;

//query update
if (move_uploaded_file($tmp, $path)) {
$query = "INSERT INTO slider (`KD_SLIDER`, `JUDUL`, `KETERANGAN`, `GAMBAR_SLIDER`, `URUTAN`) VALUES (null, '$JUDUL', '$KETERANGAN', '$gambarbaru', '$URUTAN')";
$sql = mysqli_query($konek, $query);
if($sql){
        # credirect ke page index
            header('location: ../../index.php?p=slider/slider&a=insert_sukses');
        }else{
            header('location: ../../index.php?p=slider/slider&a=insert_gagal');  
    }
}
   