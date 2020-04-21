<?php
    date_default_timezone_set("Asia/Jakarta");
    $host = "localhost"; // Nama host
    $username = "root"; // Username
    $password = ""; // Password 
    $database = "perumahan"; // Nama databasenya

    $konek = mysqli_connect($host, $username, $password, $database); // Koneksi ke MySQL

    if(!$konek)
        die("Gagal koneksi...");

    $hasil = mysqli_select_db($konek,$database);
    