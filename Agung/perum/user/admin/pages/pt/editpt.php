<?php
include('../../lib/koneksi.php');
$KD_PT = $_GET['KD_PT'];
$NAMA_PT = $_GET['NAMA_PT'];

//query update
$query = "UPDATE pt SET NAMA_PT='$NAMA_PT' WHERE KD_PT='$KD_PT' ";
if (mysqli_query($konek, $query)) {
    # credirect ke page index
        header('location: ../../index.php?p=pt/pt&a=update_sukses');
    }else{
        header('location: ../../index.php?p=pt/pt&a=update_gagal');  
}


?>