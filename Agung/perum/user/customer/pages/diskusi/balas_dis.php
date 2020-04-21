<?php
include('../../lib/koneksi.php');
$KD_DISP = $_POST['KD_DIS'];
$ISI_DIS = $_POST['ISI_DIS1'];
$KD_CLUSTER = $_POST['KD_CLUSTER'];
$USERNAME = $_POST['USERNAME1'];
$PENERIMA_DIS = $_POST['USERNAME'];
$TGLWAKTU_DIS=date("Y-m-d H:i:s");
//query update
$query = "INSERT INTO `diskusi`(`KD_DIS`, `KD_DISP`, `KD_CLUSTER`, `USERNAME`, `PENERIMA_DIS`, `ISI_DIS`, `TGLWAKTU_DIS`) VALUES (null, '$KD_DISP', '$KD_CLUSTER', '$USERNAME', '$PENERIMA_DIS', '$ISI_DIS', '$TGLWAKTU_DIS')";
if (mysqli_query($konek, $query)) {
    # credirect ke page index
        header('location: ../../index.php?p=diskusi/diskusi&a=insert_sukses');
    }else{
        header('location: ../../index.php?p=diskusi/diskusi&a=insert_gagal');  
}


?>