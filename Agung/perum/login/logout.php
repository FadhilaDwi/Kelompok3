
<?php
    //mengaktifkan sesion
    session_start();
    //menghapus semua sesion
    session_destroy();
    header("location:login.php");
    die();
    ?>