<?php
include('../../lib/koneksi.php');
$KD_REP = $_GET['KD_REP'];
$ISI_REP = $_GET['ISI_REP'];

//query update
$query = "UPDATE report SET ISI_REP='$ISI_REP' WHERE KD_REP='$KD_REP' ";
if (mysqli_query($konek, $query)) {
    # credirect ke page index
        header('location: ../../index.php?p=report/report&a=update_sukses');
    }else{
        header('location: ../../index.php?p=report/report&a=update_gagal');  
}


?>