<?php
if($_SERVER['REQUEST_METHOD']=='POST'){ 
    include 'koneksi.php';
    $con = mysqli_connect($HOST,$USER,$PASS,$DB);
$email = $_POST['User_Email'];
$password = $_POST['User_Password'];
$Sql_Query = "SELECT * from detail where user_email = '$email' and user_password = '$password'";
$check = mysqli_fetch_array(mysqli_query($con,$Sql_Query));
if(isset($check)){
echo "Data Matched";
}
else{
echo "Invalid Username or Password Please Try Again !";
}

}


?>