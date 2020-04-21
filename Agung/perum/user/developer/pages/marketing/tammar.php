
<?php
include('../../lib/koneksi.php');

$USERNAME = $_POST['USERNAME'];
$NAMA= $_POST['NAMA'];
$NO_TELEPON= $_POST['NO_TELEPON'];
//query update
$query = "INSERT INTO marketing (`KD_MARKET`, `USERNAME`, `NAMA`, `NO_TELEPON`) VALUES (null, '$USERNAME', '$NAMA', '$NO_TELEPON')";
	
    if (mysqli_query($konek, $query)) {
        # credirect ke page index
            header('location: ../../index.php?p=marketing/marketing&a=insert_sukses');
        }else{
            header('location: ../../index.php?p=marketing/marketing&a=insert_gagal');  
    }
    