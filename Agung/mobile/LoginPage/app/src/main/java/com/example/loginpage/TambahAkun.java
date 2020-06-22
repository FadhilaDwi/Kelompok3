package com.example.loginpage;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;
import androidx.appcompat.app.AppCompatActivity;
import com.androidnetworking.AndroidNetworking;
import com.androidnetworking.common.Priority;
import com.androidnetworking.error.ANError;
import com.androidnetworking.interfaces.JSONObjectRequestListener;

import org.json.JSONObject;

public class TambahAkun extends AppCompatActivity {
    private static final String TAG = "MainActivity"; //untuk melihat log
    private EditText etUser, etNama, etEmail, etPass; //pembuatan variabel edittext
    private Button reg; //pembuatan variabel button
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.register_akun);
        Log.d(TAG, "onCreate: inisialisasi"); //untuk log pada oncreate
        etUser = findViewById(R.id.reg_user); //inisialisasi value etNim
        etNama = findViewById(R.id.reg_nama); //inisialisasi value etNama
        etEmail = findViewById(R.id.reg_email); //inisialisasi value etNama
        etPass = findViewById(R.id.reg_pass); //inisialisasi value etNama
        reg = findViewById(R.id.btn_reg); //inisialisasi value btnLihat
        AndroidNetworking.initialize(getApplicationContext()); //inisialisasi library FAN
        aksiButton();//memanggil fungsi aksiButton()
    }
    public void aksiButton(){
        reg.setOnClickListener(new View.OnClickListener() {

            @Override

            public void onClick(View v) {
                String username = etUser.getText().toString(); //mengambil Value etNim menjadi string
                String nama = etNama.getText().toString();
                String email = etEmail.getText().toString();
                String password = etPass.getText().toString(); //mengambil Value etNim menjadi string
                if (username.equals("")||nama.equals("")||email.equals("")||password.equals("")){
                    Toast.makeText(getApplicationContext(),"Semua data harus diisi" , Toast.LENGTH_SHORT).show();
                    //memunculkan toast saat form masih ada yang kosong
                } else {
                    proses(username,nama,email,password); //memanggil fungsi tambahData()
                }
            }

        });
    }
    public void proses(String username, String nama, String email, String password){

        //koneksi ke API untuk register,kita menggunakan localhost seghingga kita gunakan ip sesuai dengan ip kita

        AndroidNetworking.post("http://192.168.10.242/Kelompok3/Dodhy/pelanggan/api/pelanggan/register")

                .addBodyParameter("username",username) //mengirimkan data username yang akan diisi dengan varibel username
                .addBodyParameter("nama_pelanggan",nama)//mengirimkan data nama_pelanggan yang akan diisi dengan varibel nama
                .addBodyParameter("email",email)//mengirimkan data email yang akan diisi dengan varibel email
                .addBodyParameter("password", password) //mengirimkan data password yang akan diisi dengan varibel password
                .setPriority(Priority.MEDIUM)
                .build()
                .getAsJSONObject(new JSONObjectRequestListener() {

                    @Override

                    public void onResponse(JSONObject response) {

                        //Handle Response

                        Log.d(TAG, "onResponse: " + response); //untuk log pada onresponse

                        Toast.makeText(getApplicationContext(),"Berhasil daftar " , Toast.LENGTH_SHORT).show();
                        Intent intent = new Intent(TambahAkun.this, MainActivity.class);
                        startActivity(intent);
                        //memunculkan Toast saat registrasi berhasil
                    }

                    @Override

                    public void onError(ANError error) {

                        //Handle Error

                        Log.d(TAG, "onError: Failed" + error); //untuk log pada onerror

                        Toast.makeText(getApplicationContext(),"gagal mendaftar username atau email sudah terpakai ", Toast.LENGTH_SHORT).show();

                        //memunculkan Toast saat gagal melakukan register
                    }
                });
    }
}