<?php
include('../../lib/koneksi.php');
$KD_MARKET = $_GET['KD_MARKET'];

//query update
$query = "DELETE marketing FROM marketing WHERE KD_MARKET='$KD_MARKET' ";
if (mysqli_query($konek, $query)) {
    # credirect ke page index
        header('location: ../../index.php?p=marketing/marketing&a=hapus_sukses');
    }else{
        header('location: ../../index.php?p=marketing/marketing&a=hapus_gagal');  
}

?>