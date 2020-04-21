<?php
include('../../lib/koneksi.php');
$KD_CHAT = $_GET['KD_CHAT'];
$ISI_CHAT = $_GET['ISI_CHAT'];

//query update
$query = "UPDATE chat SET ISI_CHAT='$ISI_CHAT' WHERE KD_CHAT='$KD_CHAT' ";
if (mysqli_query($konek, $query)) {
    # credirect ke page index
        header('location: ../../index.php?p=chat/chat&a=update_sukses');
    }else{
        header('location: ../../index.php?p=chat/chat&a=update_gagal');  
}


?>