<?php
include('../../lib/koneksi.php');
$KD_REV = $_GET['KD_REV'];

//query update
$query = "DELETE review FROM review
INNER JOIN cluster
ON review.KD_CLUSTER=cluster.KD_CLUSTER
INNER JOIN perum
ON cluster.KD_PERUM=perum.KD_PERUM
INNER JOIN pt
ON perum.KD_PT=pt.KD_PT
INNER JOIN user
ON pt.USERNAME=user.USERNAME
WHERE review.KD_REV='$KD_REV' ";
if (mysqli_query($konek, $query)) {
    # credirect ke page index
        header('location: ../../index.php?p=review/review&a=hapus_sukses');
    }else{
        header('location: ../../index.php?p=review/review&a=hapus_gagal');  
}

?>