<?php
include('../../lib/koneksi.php');
$KD_CLUSTER = $_GET['KD_CLUSTER'];

//query update
$query = "DELETE cluster FROM cluster WHERE KD_CLUSTER='$KD_CLUSTER' ";
if (mysqli_query($konek, $query)) {
    # credirect ke page index
        header('location: ../../index.php?p=cluster/cluster&a=hapus_sukses');
    }else{
        header('location: ../../index.php?p=cluster/cluster&a=hapus_gagal');  
}

?>