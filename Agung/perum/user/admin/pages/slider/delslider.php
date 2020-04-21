<?php
include('../../lib/koneksi.php');
$KD_SLIDER = $_GET['KD_SLIDER'];
//query update
$query = "DELETE slider FROM slider WHERE KD_SLIDER='$KD_SLIDER' ";
if (mysqli_query($konek, $query)) {
    # credirect ke page index
        header('location: ../../index.php?p=slider/slider&a=hapus_sukses');
    }else{
        header('location: ../../index.php?p=slider/slider&a=hapus_gagal');  
}

?>