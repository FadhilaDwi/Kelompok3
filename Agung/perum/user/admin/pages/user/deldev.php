<?php
include('../../lib/koneksi.php');
$USERNAME = $_GET['USERNAME'];

//query update
$query = "DELETE user FROM user WHERE USERNAME='$USERNAME' ";
if (mysqli_query($konek, $query)) {
    # credirect ke page index
        header('location: ../../index.php?p=user/developer&a=hapus_sukses');
    }else{
        header('location: ../../index.php?p=user/developer&a=hapus_gagal');  
}

?>