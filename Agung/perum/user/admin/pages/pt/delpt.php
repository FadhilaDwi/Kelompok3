<?php
include('../../lib/koneksi.php');
$KD_PT = $_GET['KD_PT'];
$NAMA_PT = $_GET['NAMA_PT'];
//query update
$query = "DELETE pt FROM pt WHERE KD_PT='$KD_PT' ";
if (mysqli_query($konek, $query)) {
    # credirect ke page index
        header('location: ../../index.php?p=pt/pt&a=hapus_sukses');
    }else{
        header('location: ../../index.php?p=pt/pt&a=hapus_gagal');  
}

?>