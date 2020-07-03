<?php 
if ($_SERVER['REQUEST_METHOD']=='POST') {
    include 'koneksi.php';
    $koneksi = mysqli_connect($HOST,$USER,$PASS,$DB);

    $email = $_POST['User_Email'];
    $password = $_POST['User_Password'];
    $fullname = $_POST['User_Fullname'];
    $cek = "SELECT * from detail where user_email='$email'";
    $prosescek = mysqli_fetch_array(mysqli_query($koneksi,$cek));

    if (isset($prosescek)) {
        echo 'Email yang dimasukkan telah digunakan';
    } else {
        $query = "INSERT into detail values (null,'$email','$password','$fullname')";
        if (mysqli_query($koneksi,$query)) {
            echo 'Selamat anda berhasil mendaftar';
        } else {
            echo 'Mohon maaf gagal mendaftar';
        } 
    }
    
}
?>