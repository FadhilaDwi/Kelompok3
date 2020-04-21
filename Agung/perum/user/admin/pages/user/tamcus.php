
<?php
include('../../lib/koneksi.php');

$USERNAME = $_POST['USERNAME'];
$EMAIL= $_POST['EMAIL'];
$PASSWORD= md5($_POST['PASSWORD']);
$NAMA_LENGKAP =$_POST['NAMA_LENGKAP'];
$TGL_LAHIR = $_POST['TGL_LAHIR'];
$JENIS_KELAMIN = $_POST['JENIS_KELAMIN'];
$FOTO = "pp.jpg";
$STATUS = "customer";

$query = "INSERT INTO user (`USERNAME`, `EMAIL`, `PASSWORD`, `STATUS`, `NAMA_LENGKAP`, `TGL_LAHIR`, `JENIS_KELAMIN`, `FOTO`) VALUES ('$USERNAME', '$EMAIL', '$PASSWORD', '$STATUS', '$NAMA_LENGKAP', '$TGL_LAHIR', '$JENIS_KELAMIN' , '$FOTO')";
$sql = mysqli_query($konek, $query); // Eksekusi/ Jalankan query dari variabel $query

    if ($sql) {
        header('location: ../../index.php?p=user/customer&a=insert_sukses');
    }else{
        header('location: ../../index.php?p=user/customer&a=insert_gagal');
}


