package com.example.loginpage;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageButton;
import android.widget.Toast;
import androidx.appcompat.app.AppCompatActivity;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;
import java.util.HashMap;

public class Ubah_profil extends AppCompatActivity implements View.OnClickListener {
    private EditText editTextId_pelanggan; //pembuatan variabel edittext
    private EditText editTextUsername; //pembuatan variabel edittext
    private EditText editTextName; //pembuatan variabel edittext
    private EditText editTextEmail; //pembuatan variabel edittext
    private EditText editTextAlamat; //pembuatan variabel edittext
    private EditText editTextNo_Telp; //pembuatan variabel edittext
    private String user; //pembuatan variabel user
    private Button ubah; //pembuatan variabel button
    SharedPrefManager sharedPrefManager; //untuk session
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.ubah_profil);
        Bundle bundle = getIntent().getExtras();
        user = bundle.getString("data2"); //variable user di isi dengan data dari halaman sebelumnya yang di simpan melalui intent
        ubah = findViewById(R.id.btn_ubah); //inisialisasi value btnLihat
        ubah.setOnClickListener(this);
        sharedPrefManager = new SharedPrefManager(this);
       editTextUsername = (EditText) findViewById(R.id.editTextUser);//inisialisasi value editText
        editTextName = (EditText) findViewById(R.id.editTextName); //inisialisasi value editText
        editTextAlamat = (EditText) findViewById(R.id.editTextAlamat); //inisialisasi value editText
        editTextEmail = (EditText) findViewById(R.id.editTextEmail); //inisialisasi value editText
        editTextNo_Telp = (EditText) findViewById(R.id.editTextNo_Telp); //inisialisasi value editText
        editTextId_pelanggan = (EditText)findViewById(R.id.id_pelanggan); //inisialisasi value editText
        getEmployee(); //memanggil fungsi getEmployee()
    }

    private void getEmployee() {
        class GetEmployee extends AsyncTask<Void, Void, String> {
            ProgressDialog loading;

            @Override
            protected void onPreExecute() {
                super.onPreExecute();
                loading = ProgressDialog.show(Ubah_profil.this, "Fetching...", "Wait...", false, false);
            }

            @Override
            protected void onPostExecute(String s) {
                super.onPostExecute(s);
                loading.dismiss();
                showEmployee(s);
            }

            @Override
            protected String doInBackground(Void... params) {
                RequestHandler rh = new RequestHandler();
                String s = rh.sendGetRequestParam(Konfigurasi.URL_GET_EMP, user);
                return s;
            }
        }
        GetEmployee ge = new GetEmployee();
        ge.execute();
    }


    private void showEmployee(String json) {
        try {
            JSONObject jsonObject = new JSONObject(json);
            JSONArray result = jsonObject.getJSONArray(Konfigurasi.TAG_JSON_ARRAY);
            JSONObject c = result.getJSONObject(0);
            String id = c.getString(Konfigurasi.TAG_ID_PELANGGAN);
            String username = c.getString(Konfigurasi.TAG_USERNAME);
            String name = c.getString(Konfigurasi.TAG_NAMA);
            String email = c.getString(Konfigurasi.TAG_EMAIL);
            String alamat = c.getString(Konfigurasi.TAG_ALAMAT);
            String no_telp = c.getString(Konfigurasi.TAG_TELP);
            editTextId_pelanggan.setText(id);
            editTextUsername.setText(username);
            editTextName.setText(name);
            editTextAlamat.setText(alamat);
            editTextEmail.setText(email);
            editTextNo_Telp.setText(no_telp);

        } catch (JSONException ex) {
            ex.printStackTrace();
        }
    }
    private void updateEmployee() {
        final String id = editTextId_pelanggan.getText().toString().trim();
        final String name = editTextName.getText().toString().trim();
        final String email = editTextEmail.getText().toString().trim();
        final String alamat = editTextAlamat.getText().toString().trim();
        final String no_telp = editTextNo_Telp.getText().toString().trim();

        class UpdateEmployee extends AsyncTask<Void, Void, String> {
            ProgressDialog loading;

            @Override
            protected void onPreExecute() {
                super.onPreExecute();
                loading = ProgressDialog.show(Ubah_profil.this, "Updating...", "Wait...", false, false);
            }

            @Override
            protected void onPostExecute(String s) {
                super.onPostExecute(s);
                loading.dismiss();
                Toast.makeText(Ubah_profil.this, s, Toast.LENGTH_LONG).show();
            }

            @Override
            protected String doInBackground(Void... params) {
                HashMap<String, String> hashMap = new HashMap<>();
                hashMap.put(Konfigurasi.KEY_EMP_ID_PELANGGAN, id);
                hashMap.put(Konfigurasi.KEY_EMP_NAMA_PELANGGAN, name);
                hashMap.put(Konfigurasi.KEY_EMP_EMAIL, email);
                hashMap.put(Konfigurasi.KEY_EMP_ALAMAT, alamat);
                hashMap.put(Konfigurasi.KEY_EMP_NO_TELEPON, no_telp);

                RequestHandler rh = new RequestHandler();
                String s = rh.sendPostRequest(Konfigurasi.URL_UPDATE_EMP, hashMap);
                return s;
            }
        }
        UpdateEmployee ue = new UpdateEmployee();
        ue.execute();
    }
        public void onClick (View v){
            if (v == ubah) {
                updateEmployee();
                Intent intent = new Intent(Ubah_profil.this, TampilProfil.class);
                startActivity(intent);
            }
        }
    }