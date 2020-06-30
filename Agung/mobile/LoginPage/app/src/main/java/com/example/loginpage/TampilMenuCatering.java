package com.example.loginpage;
import android.app.ProgressDialog;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.os.StrictMode;
import android.view.View;
import android.widget.AdapterView;
import android.widget.Button;
import android.widget.ListAdapter;
import android.widget.ListView;
import android.widget.SimpleAdapter;

import androidx.appcompat.app.AppCompatActivity;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;
import java.io.BufferedInputStream;
import java.util.ArrayList;
import java.util.HashMap;

public class TampilMenuCatering extends AppCompatActivity  {
    String[] id_menu;
    String[] nama_menu;
    String[] harga_menu;
    String[] gambar;

    ListView listView;
    private String JSON_STRING;

    private String id;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.menu);
        listView = (ListView) findViewById(R.id.listView);
        Intent intent = getIntent();


        id = intent.getStringExtra("empId");
        getJSON();

    }

    private void showEmployee(){
        JSONObject jsonObject = null;
        ArrayList<HashMap<String,String>> list = new ArrayList<HashMap<String, String>>();
        try {
            jsonObject = new JSONObject(JSON_STRING);
            JSONArray result = jsonObject.getJSONArray(Konfigurasi.TAG_JSON_ARRAY);
            id_menu=new String[result.length()];
            nama_menu=new String[result.length()];
            harga_menu=new String[result.length()];
            gambar=new String[result.length()];
            for(int i = 0; i<result.length(); i++){
                JSONObject jo = result.getJSONObject(i);
                id_menu[i]= jo.getString(Konfigurasi.TAG_ID_MENU);
                nama_menu[i] = jo.getString(Konfigurasi.TAG_NAMA_MENU);
                harga_menu[i] = jo.getString(Konfigurasi.TAG_HARGA);
                gambar[i] = jo.getString(Konfigurasi.TAG_GAMBAR);
                CustomListView customListView = new CustomListView(this,id_menu, nama_menu, harga_menu, gambar);
                listView.setAdapter(customListView);
                listView.setOnItemClickListener(new AdapterView.OnItemClickListener(){
                                                    @Override
                                                    public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
                                                        Intent intent = new Intent(getApplicationContext(),Pemesanan.class);
                                                        intent.putExtra("nama",id_menu[position]);
                                                        startActivity(intent);
                                                    }
                                                }

                );
            }

        } catch (JSONException e) {
            e.printStackTrace();
        }

    }
    private void getJSON() {
        class GetJSON extends AsyncTask<Void, Void, String> {
            ProgressDialog loading;
            @Override
            protected void onPreExecute() {
                super.onPreExecute();
                loading = ProgressDialog.show(TampilMenuCatering.this, "Mengambil Data", "Mohon Tunggu...", false, false);
            }

            @Override
            protected void onPostExecute(String s) {
                super.onPostExecute(s);
                loading.dismiss();
                JSON_STRING = s;
                showEmployee();
            }

            @Override
            protected String doInBackground(Void... params) {
                RequestHandler rh = new RequestHandler();
                String s = rh.sendGetRequestParam(Konfigurasi.URL_GET_MENU_CATERING,id);
                return s;
            }
        }
        GetJSON gj = new GetJSON();
        gj.execute();
    }
}