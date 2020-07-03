package com.example.loginpage;

public class Konfigurasi {
    //Dibawah ini merupakan Pengalamatan dimana Lokasi Skrip CRUD PHP disimpan
    //Karena kita membuat localhost maka alamatnya tertuju ke IP komputer
    //dimana File PHP tersebut berada
    public static final String URL_GET_ALL = "http://laringadmin.wsjti.com/tampil_katering.php";
    public static final String URL_GET_EMP = "http://laringadmin.wsjti.com/tampilkan.php?username=";
    public static final String URL_UPDATE_EMP = "http://laringadmin.wsjti.com/updateprofile.php";
    public static final String URL_DELETE_EMP = "http://laringadmin.wsjti.com/hapusprofile.php?id=";
    public static final String URL_GET_MENU="http://laringadmin.wsjti.com/tampilmenu.php?id_menu=";
    public static final String URL_GET_MENU_CATERING="http://laringadmin.wsjti.com/tampil_menu_katering.php?id_mitra=";
    public static final String URL_PEMESANAN="http://laringadmin.wsjti.com/Pemesanan.php";
    public static final String URL_GET_HISTORY = "http://laringadmin.wsjti.com/history.php?id=";
    //Dibawah ini merupakan Kunci yang akan digunakan untuk mengirim permintaan ke Skrip PHP
    public static final String KEY_EMP_USERNAME = "username";
    public static final String KEY_EMP_ID_PELANGGAN = "id";
    public static final String KEY_EMP_NAMA_PELANGGAN = "name";
    public static final String KEY_EMP_EMAIL = "email";
    public static final String KEY_EMP_ALAMAT = "alamat";
    public static final String KEY_EMP_NO_TELEPON = "no_telp";
    public static final String KEY_EMP_ID_MITRA = "id_mitra";
    //transaksi pemesanan
    public static final String KEY_EMP_SUB_TOTAL = "sub_total";
    public static final String KEY_EMP_METODE_BAYAR = "metode_bayar";
    public static final String KEY_EMP_JUMLAH_PESAN = "jumlah_pesan";
    public static final String KEY_EMP_ALAMAT_PESAN = "alamat_pesan";
    public static final String KEY_EMP_ID_MENU = "id_menu";
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
    public static final String TAG_GAMBAR_KATERING = "gambar_katering";
    public static final String TAG_GAMBAR_PROFIL = "gambar_profil";
    //menu
    public static final String TAG_ID_MENU = "id_menu";
    public static final String TAG_NAMA_MENU = "nama_menu";
    public static final String TAG_GAMBAR = "gambar";
    public static final String TAG_HARGA = "harga";
    public static final String TAG_JUMLAH_PESAN = "jumlah_pesan";
    public static final String TAG_SUB_TOTAL = "sub_total";
    public static final String TAG_STATUS = "status";

    //emp itu singkatan dari Employee
    public static final String EMP_ID = "emp_id";
    public static final String EMP_ID_MENU="emp_id_menu";
}