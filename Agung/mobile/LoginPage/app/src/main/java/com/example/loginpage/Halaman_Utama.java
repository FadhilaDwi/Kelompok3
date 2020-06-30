package com.example.loginpage;

import android.annotation.SuppressLint;
import android.app.ProgressDialog;
import android.content.Intent;
import android.graphics.Color;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.View;
import android.widget.ImageView;
import android.widget.TextView;
import androidx.appcompat.app.AppCompatActivity;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;
import java.util.Calendar;


public class Halaman_Utama extends AppCompatActivity {
    Intent intent = getIntent();
    ImageView greetImg;
    TextView greetText;
    SharedPrefManager sharedPrefManager;
    private String user;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.halaman);
        ImageView showRide = (ImageView) findViewById(R.id.bayar);
        ImageView showKatering = (ImageView) findViewById(R.id.katering);
        ImageView showMenu = (ImageView) findViewById(R.id.menu);
        greetImg = findViewById(R.id.greeting_img);
        greetText = findViewById(R.id.greeting_text);
        greeting();
        sharedPrefManager = new SharedPrefManager(this);
        final String tvUsername = (sharedPrefManager.getSpUsername());//string berupa data username yang di simpan meggunakan sharedpreferences
        user  = (sharedPrefManager.getSpUsername());
        getEmployee();

        showRide.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick  (View view) { // saat tombol ditekan maka akan berpindah ke halaman tampil profil
                Bundle bundle = new Bundle();
                bundle.putString("data1", tvUsername);//fungsi ini adalah menyimpan data yang berupa username yang berasal dari halaman login
                Intent intent = new Intent(Halaman_Utama.this, TampilProfil.class);
                intent.putExtras(bundle);
                if (sharedPrefManager.getSPSudahLogin()){
                startActivity(intent);
                }else{Intent intents = new Intent(Halaman_Utama.this, MainActivity.class);
                    startActivity(intents);
                }
            }
        });
        showKatering.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick  (View view) { // saat tombol ditekan maka akan berpindah ke halaman tampil catering
                   startActivity(new Intent(Halaman_Utama.this, TampilCatering.class));
                }

        });
        showMenu.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick  (View view) { // saat tombol ditekan maka akan berpindah ke halaman tampil catering

                    startActivity(new Intent(Halaman_Utama.this, History.class));
                              }

        });

    }
    private void getEmployee() {
        class GetEmployee extends AsyncTask<Void, Void, String> {
            ProgressDialog loading;

            @Override
            protected void onPreExecute() {
                super.onPreExecute();
                loading = ProgressDialog.show(Halaman_Utama.this, "Fetching...", "Wait...", false, false);
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
            sharedPrefManager.saveSPString(SharedPrefManager.SP_ID_PELANGGAN, id);

        } catch (JSONException ex) {
            ex.printStackTrace();
        }

    }
    @SuppressLint("SetTextI18n")
    private void greeting() {
        Calendar calendar = Calendar.getInstance();
        int timeOfDay = calendar.get(Calendar.HOUR_OF_DAY);

        if (timeOfDay >= 0 && timeOfDay < 12){
            greetText.setText("Selamat Pagi");
            greetImg.setImageResource(R.drawable.img_default_half_morning);
        } else if (timeOfDay >= 12 && timeOfDay < 15) {
            greetText.setText("Selamat Siang");
            greetImg.setImageResource(R.drawable.img_default_half_afternoon);
        } else if (timeOfDay >= 15 && timeOfDay < 18) {
            greetText.setText("Selamat Sore");
            greetImg.setImageResource(R.drawable.img_default_half_without_sun);
        } else if (timeOfDay >= 18 && timeOfDay < 24) {
            greetText.setText("Selamat Malam");
            greetText.setTextColor(Color.WHITE);
            greetImg.setImageResource(R.drawable.img_default_half_night);
        }
    }
    }