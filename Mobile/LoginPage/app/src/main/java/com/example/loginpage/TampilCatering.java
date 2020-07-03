package com.example.loginpage;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ListAdapter;
import android.widget.ListView;
import android.widget.SimpleAdapter;

import androidx.appcompat.app.AppCompatActivity;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;

public class TampilCatering extends AppCompatActivity {
    String[] id_katering;
    String[] nama_katering;
    String[] alamat_katering;
    String[] no_telp_katering;
    String[] email_katering;

    String[] gambar_katering;
    private ListView listView;
    private String JSON_STRING;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.katering);
        listView = (ListView) findViewById(R.id.listView);

        getJSON();
    }
    private void showEmployee(){
        JSONObject jsonObject = null;
        ArrayList<HashMap<String,String>> list =   new ArrayList<HashMap<String, String>>();
        try {
            jsonObject = new JSONObject(JSON_STRING);
            JSONArray result = jsonObject.getJSONArray(Konfigurasi.TAG_JSON_ARRAY);
            id_katering=new String[result.length()];
          nama_katering=new String[result.length()];
            alamat_katering=new String[result.length()];
            no_telp_katering=new String[result.length()];
            email_katering=new String[result.length()];
            gambar_katering=new String[result.length()];
            for(int i = 0; i<result.length(); i++){
                JSONObject jo = result.getJSONObject(i);
                 id_katering [i]= jo.getString(Konfigurasi.TAG_ID_KATERING);
                 nama_katering [i] = jo.getString(Konfigurasi.TAG_NAMA_KATERING);
                 alamat_katering [i]= jo.getString(Konfigurasi.TAG_ALAMAT_KATERING);
                 no_telp_katering [i]= jo.getString(Konfigurasi.TAG_NO_TELP_KATERING);
                 email_katering[i] = jo.getString(Konfigurasi.TAG_EMAIL_KATERING);
                gambar_katering[i] = jo.getString(Konfigurasi.TAG_GAMBAR_KATERING);

                ListViewCatering customListView = new ListViewCatering(this,id_katering, nama_katering, alamat_katering,no_telp_katering,email_katering, gambar_katering);
                listView.setAdapter(customListView);
                listView.setOnItemClickListener(new AdapterView.OnItemClickListener(){
                    @Override
                    public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
                        Intent intent = new Intent(getApplicationContext(),TampilMenuCatering.class);
                        intent.putExtra("empId",id_katering[position]);
                        startActivity(intent);
                    }}
                );
            }

        } catch (JSONException e) {
            e.printStackTrace();
        }


    }
    private void getJSON(){
        class GetJSON extends AsyncTask<Void,Void,String> {

            ProgressDialog loading;
            @Override
            protected void onPreExecute() {
                super.onPreExecute();
                loading = ProgressDialog.show(TampilCatering.this,"Mengambil Data","Mohon Tunggu...",false,false);
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
                String s = rh.sendGetRequest(Konfigurasi.URL_GET_ALL);
                return s;
            }
        }
        GetJSON gj = new GetJSON();
        gj.execute();
    }

}