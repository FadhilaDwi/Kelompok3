
<?php
include('../../lib/koneksi.php');

$USERNAME = $_POST['USERNAME'];
$NAMA_PT= $_POST['NAMA_PT'];

//query update
$query = "INSERT INTO pt (`KD_PT`, `USERNAME`, `NAMA_PT`) VALUES (null, '$USERNAME', '$NAMA_PT')";
	
    if (mysqli_query($konek, $query)) {
        # credirect ke page index
            header('location: ../../index.php?p=pt/pt&a=insert_sukses');
        }else{
            header('location: ../../index.php?p=pt/pt&a=insert_gagal');  
    }
    