<?php
include('../../lib/koneksi.php');
$KD_MARKET = $_GET['KD_MARKET'];
$NAMA = $_GET['NAMA'];
$NO_TELEPON= $_GET['NO_TELEPON'];

//query update
$query = "UPDATE marketing SET NAMA='$NAMA', NO_TELEPON='$NO_TELEPON' WHERE KD_MARKET='$KD_MARKET' ";
if (mysqli_query($konek, $query)) {
    # credirect ke page index
        header('location: ../../index.php?p=marketing/marketing&a=update_sukses');
    }else{
        header('location: ../../index.php?p=marketing/marketing&a=update_gagal');  
}


?>