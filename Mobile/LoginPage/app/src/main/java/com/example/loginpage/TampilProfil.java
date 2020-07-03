package com.example.loginpage;


import android.app.ProgressDialog;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.ListAdapter;
import android.widget.ListView;
import android.widget.SimpleAdapter;
import androidx.appcompat.app.AppCompatActivity;
import com.squareup.picasso.Picasso;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;
import java.util.ArrayList;
import java.util.HashMap;


public class TampilProfil extends AppCompatActivity {
    private ListView listView;
    private String JSON_STRING;
    private Button ubah;
    private String id;
    private Button logout;
    private ImageView imgprofil;

    SharedPrefManager sharedPrefManager;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.profil);
        imgprofil = (ImageView)findViewById(R.id.img_user);
        ImageView showFoto = (ImageView) findViewById(R.id.img_user);
        listView = (ListView) findViewById(R.id.listView);
       Bundle bundle = getIntent().getExtras();
        id= bundle.getString("data1");
        ubah = findViewById(R.id.btn_ubah);
        logout=findViewById(R.id.btn_logout);
        sharedPrefManager = new SharedPrefManager(this);
        final String tvUsername = (sharedPrefManager.getSpUsername());
        logout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                sharedPrefManager.saveSPBoolean(SharedPrefManager.SP_SUDAH_LOGIN, false);
                Intent intent = new Intent(TampilProfil.this, MainActivity.class);
                startActivity (intent);
                finish();
            }
        });
        ubah.setOnClickListener(new View.OnClickListener() {

            public void onClick  (View view) {
                Bundle bundle = new Bundle();
                bundle.putString("data2", tvUsername);
                Intent intent = new Intent(TampilProfil.this, Ubah_profil.class);
                intent.putExtras(bundle);
                startActivity(intent);
            }
        });
        getEmployee();
    }
    private void getEmployee(){
        class GetEmployee extends AsyncTask<Void,Void,String>{
            ProgressDialog loading;
            @Override
            protected void onPreExecute() {
                super.onPreExecute();
                loading = ProgressDialog.show(TampilProfil.this,"Fetching...","Wait...",false,false);
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
                String s = rh.sendGetRequestParam(Konfigurasi.URL_GET_EMP,id);
                return s;
            }
        }
        GetEmployee ge = new GetEmployee();
        ge.execute();
    }
    private void showEmployee(String json){
        ArrayList<HashMap<String,String>> list = new ArrayList<HashMap<String, String>>();
        try {
            JSONObject jsonObject = new JSONObject(json);
            JSONArray result = jsonObject.getJSONArray(Konfigurasi.TAG_JSON_ARRAY);
            JSONObject c = result.getJSONObject(0);
            String name = c.getString(Konfigurasi.TAG_NAMA);
            String email = c.getString(Konfigurasi.TAG_EMAIL);
            String alamat = c.getString(Konfigurasi.TAG_ALAMAT);
            String no_telp = c.getString(Konfigurasi.TAG_TELP);
            String get_gambar= c.getString(Konfigurasi.TAG_GAMBAR_PROFIL);
            Picasso.get().load(get_gambar).into(imgprofil);

            HashMap<String,String> employees = new HashMap<>();
            employees.put(Konfigurasi.TAG_NAMA,name);
            employees.put(Konfigurasi.TAG_EMAIL,email);
            employees.put(Konfigurasi.TAG_ALAMAT,alamat);
            employees.put(Konfigurasi.TAG_TELP,no_telp);

            list.add(employees);
        } catch (JSONException e) {
            e.printStackTrace();
        }
        ListAdapter adapter = new SimpleAdapter(
                TampilProfil.this, list, R.layout.view_profil,
                new String[]{Konfigurasi.TAG_NAMA,Konfigurasi.TAG_EMAIL,Konfigurasi.TAG_ALAMAT,Konfigurasi.TAG_TELP},
                new int[]{R.id.nama_pelanggan, R.id.email_pelanggan, R.id.alamat_pelanggan, R.id.no_telp_pelanggan});
        listView.setAdapter(adapter);
    }
    }