<?php 
require_once('koneksi2.php');
 $hasil         = "SELECT * FROM menu" ;
 $r = mysqli_query($con,$hasil);

 $result = array();

while ($row = mysqli_fetch_array($r)){
	array_push($result,array(
			"id"=>$row['id_menu'],
			"menu"=>$row['nama_menu'],
			"foto"=>$row['foto']
			
		));
    }
	//Menampilkan dalam format JSON
	echo json_encode(array('result'=>$result));
	
	mysqli_close($con);
?>