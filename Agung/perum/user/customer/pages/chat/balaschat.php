
<?php
include('../../lib/koneksi.php');

$USERNAME= $_POST['USERNAME'];
$PENERIMA= $_POST['PENERIMA'];
$ISI_CHAT= $_POST['ISI_CHAT'];
$TGLWAKTU_CHAT=date("Y-m-d H:i:s");

//query update
$query = "INSERT INTO chat (`KD_CHAT`, `USERNAME`, `PENERIMA`, `TGLWAKTU_CHAT`, `ISI_CHAT`) VALUES (null, '$USERNAME', '$PENERIMA', '$TGLWAKTU_CHAT', '$ISI_CHAT')";
	
    if (mysqli_query($konek, $query)) {
        # credirect ke page index
            header('location: ../../index.php?p=chat/chat&a=insert_sukses');
        }else{
            header('location: ../../index.php?p=chat/chat&a=insert_gagal');  
    }
