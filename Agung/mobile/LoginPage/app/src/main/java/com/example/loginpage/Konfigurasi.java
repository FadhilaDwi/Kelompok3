package com.example.loginpage;

public class Konfigurasi {
    //Dibawah ini merupakan Pengalamatan dimana Lokasi Skrip CRUD PHP disimpan
    //Karena kita membuat localhost maka alamatnya tertuju ke IP komputer
    //dimana File PHP tersebut berada
    public static final String URL_GET_ALL = "http://192.168.10.242/Kelompok3/Agung/API/tampil_katering.php";
    public static final String URL_GET_EMP = "http://192.168.10.242/Kelompok3/Agung/API/tampilkan.php?username=";
    public static final String URL_UPDATE_EMP = "http://192.168.10.242/Kelompok3/Agung/API/updateprofile.php";
    public static final String URL_DELETE_EMP = "http://192.168.10.242/Kelompok3/Agung/API/hapusprofile.php?id=";
    public static final String URL_GET_MENU="http://192.168.10.242/Kelompok3/Agung/API/tampilmenu.php";
    public static final String URL_GET_MENU_CATERING="http://192.168.10.242/Kelompok3/Agung/API/tampil_menu_katering.php?id_mitra=";
    //Dibawah ini merupakan Kunci yang akan digunakan untuk mengirim permintaan ke Skrip PHP
    public static final String KEY_EMP_USERNAME = "username";
    public static final String KEY_EMP_ID_PELANGGAN = "id";
    public static final String KEY_EMP_NAMA_PELANGGAN = "name";
    public static final String KEY_EMP_EMAIL = "email";
    public static final String KEY_EMP_ALAMAT = "alamat";
    public static final String KEY_EMP_NO_TELEPON = "no_telp";
    public static final String KEY_EMP_ID_MITRA = "id_mitra";



    //Dibawah ini adalah proses untuk mempharsing data agar dapat di tampilkan pada Android
    //JSON Tags
    public static final String TAG_JSON_ARRAY="result";
    public static final String TAG_ID_PELANGGAN = "id";
    public static final String TAG_USERNAME = "username";
    public static final String TAG_NAMA = "name";
    public static final String TAG_EMAIL = "email";
    public static final String TAG_ALAMAT = "alamat";
    public static final String TAG_TELP = "no_telp";
    public static final String TAG_ID_KATERING = "id_katering";
    public static final String TAG_NAMA_KATERING = "nama_katering";
    public static final String TAG_ALAMAT_KATERING = "alamat_katering";
    public static final String TAG_NO_TELP_KATERING = "no_telp_katering";
    public static final String TAG_EMAIL_KATERING = "email_katering";
    public static final String TAG_NAMA_MENU = "nama_menu";
    public static final String TAG_GAMBAR = "gambar";
    public static final String TAG_GAMBAR_PROFIL = "gambar_profil";
    public static final String TAG_HARGA = "harga";

    //emp itu singkatan dari Employee
    public static final String EMP_ID = "emp_id";
}