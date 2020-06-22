package com.example.loginpage;
import androidx.appcompat.app.AppCompatActivity;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageButton;
import android.widget.Toast;
import com.androidnetworking.AndroidNetworking;
import com.androidnetworking.common.Priority;
import com.androidnetworking.error.ANError;
import com.androidnetworking.interfaces.JSONObjectRequestListener;
import org.json.JSONObject;
public class MainActivity extends AppCompatActivity {
    private ImageButton ImgButton;
    private static final String TAG = "MainActivity"; //untuk melihat log
    String  usernameholder;
    private EditText etUser, etPass; //pembuatan variabel edittext
    private Button login; //pembuatan variabel button
    SharedPrefManager sharedPrefManager;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        Log.d(TAG, "onCreate: inisialisasi"); //untuk log pada oncreate
        etUser = findViewById(R.id.username); //inisialisasi value etUser
        etPass = findViewById(R.id.password); //inisialisasi value etPass
        login = findViewById(R.id.btn_login); //inisialisasi value login
        AndroidNetworking.initialize(getApplicationContext()); //inisialisasi library FAN
        sharedPrefManager = new SharedPrefManager(this);
        aksiButton();//memanggil fungsi aksiButton()
    }
    public void Daftar(View view) {
        Intent intent = new Intent(MainActivity.this, TambahAkun.class);
        startActivity(intent);
    }
    public void aksiButton(){
        login.setOnClickListener(new View.OnClickListener() {

            @Override

            public void onClick(View v) {
                String username = etUser.getText().toString(); //mengambil Value etUser menjadi string
                sharedPrefManager.saveSPString(SharedPrefManager.SP_USERNAME, username);
                String password = etPass.getText().toString(); //mengambil Value etPass menjadi string
                if (username.equals("")||password.equals("")){
                    Toast.makeText(getApplicationContext(),"Semua data harus diisi" , Toast.LENGTH_SHORT).show();
                    //memunculkan toast saat terdapat form yang kosong
                } else {
                    proses(username,password); //memanggil fungsi proses() proses di sini akan memproses stirng dari username dan password
                }
            }

        });
}
    public void proses(final String username, String password){

        //membuat koneksi ke API untuk Login, di sini kita menggunakan localhost sehingga kita menggunakan ip sesuai dengan ip pada ipconfig
        AndroidNetworking.post("http://192.168.10.242/Kelompok3/Dodhy/pelanggan/api/pelanggan/login")
                .addBodyParameter("username",username) //mengirimkan data nim_mahasiswa yang akan diisi dengan varibel nim
                .addBodyParameter("password", password) //mengirimkan data nama_mahasiswa yang akan diisi dengan varibel nama
                .setPriority(Priority.MEDIUM)
                .build()
                .getAsJSONObject(new JSONObjectRequestListener() {
                    @Override
                    public void onResponse(JSONObject response) {
                        //Handle Response
                        Log.d(TAG, "onResponse: " + response); //untuk log pada onresponse
                        Toast.makeText(getApplicationContext(),"Berhasil login" , Toast.LENGTH_SHORT).show();
                        masuk();
                        //memunculkan Toast saat berhasil login
                    }
                    private void masuk (){
                        //kita membuat sesssion agar user yang belum login tidak dapat masuk ke sebuah fitur utama pada aplikasi ini
                        sharedPrefManager.saveSPBoolean(SharedPrefManager.SP_SUDAH_LOGIN, true);
                        startActivity(new Intent(MainActivity.this,Halaman_Utama.class)
                        .addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP | Intent.FLAG_ACTIVITY_NEW_TASK));
                        finish();
                    }
                    @Override
                    public void onError(ANError error) {
                        //Handle Error
                        Log.d(TAG, "onError: Failed" + error); //untuk log pada onerror
                        Toast.makeText(getApplicationContext(),"gagal login Username atau Password salah", Toast.LENGTH_SHORT).show();
                        //memunculkan Toast saat gagal melakukan Login
                    }
                });
    }
}