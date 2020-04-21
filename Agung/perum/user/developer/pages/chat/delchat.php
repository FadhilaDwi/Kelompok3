<?php
include('../../lib/koneksi.php');
$KD_CHAT = $_GET['KD_CHAT'];

//query update
$query = "DELETE chat FROM chat
INNER JOIN user
ON chat.USERNAME_PENERIMA=user.USERNAME
WHERE chat.KD_CHAT='$KD_CHAT' ";
if (mysqli_query($konek, $query)) {
    # credirect ke page index
        header('location: ../../index.php?p=chat/chat&a=hapus_sukses');
    }else{
        header('location: ../../index.php?p=chat/chat&a=hapus_gagal');  
}

?>