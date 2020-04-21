<?php
include('../../lib/koneksi.php');
$KD_DIS = $_GET['KD_DIS'];
$ISI_DIS = $_GET['ISI_DIS'];

//query update
$query = "UPDATE diskusi SET ISI_DIS='$ISI_DIS' WHERE KD_DIS='$KD_DIS' ";
if (mysqli_query($konek, $query)) {
    # credirect ke page index
        header('location: ../../index.php?p=diskusi/diskusi&a=update_sukses');
    }else{
        header('location: ../../index.php?p=diskusi/diskusi&a=update_gagal');  
}


?>