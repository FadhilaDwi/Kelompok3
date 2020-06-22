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

public class TampilCatering extends AppCompatActivity implements ListView.OnItemClickListener {

    private ListView listView;
    private String JSON_STRING;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.katering);
        listView = (ListView) findViewById(R.id.listView);
        listView.setOnItemClickListener(this);
        getJSON();
    }
    private void showEmployee(){
        JSONObject jsonObject = null;
        ArrayList<HashMap<String,String>> list = new ArrayList<HashMap<String, String>>();
        try {
            jsonObject = new JSONObject(JSON_STRING);
            JSONArray result = jsonObject.getJSONArray(Konfigurasi.TAG_JSON_ARRAY);

            for(int i = 0; i<result.length(); i++){
                JSONObject jo = result.getJSONObject(i);
                String id_katering = jo.getString(Konfigurasi.TAG_ID_KATERING);
                String nama_katering = jo.getString(Konfigurasi.TAG_NAMA_KATERING);
                String alamat_katering = jo.getString(Konfigurasi.TAG_ALAMAT_KATERING);
                String no_telp_katering = jo.getString(Konfigurasi.TAG_NO_TELP_KATERING);
                String email_katering = jo.getString(Konfigurasi.TAG_EMAIL_KATERING);

                HashMap<String,String> employees = new HashMap<>();
                employees.put(Konfigurasi.TAG_ID_KATERING,id_katering);
                employees.put(Konfigurasi.TAG_NAMA_KATERING,nama_katering);
                employees.put(Konfigurasi.TAG_ALAMAT_KATERING,alamat_katering);
                employees.put(Konfigurasi.TAG_NO_TELP_KATERING,no_telp_katering);
                employees.put(Konfigurasi.TAG_EMAIL_KATERING,email_katering);
                list.add(employees);
            }

        } catch (JSONException e) {
            e.printStackTrace();
        }

        ListAdapter adapter = new SimpleAdapter(
                TampilCatering.this, list, R.layout.list_item,
                new String[]{Konfigurasi.TAG_NAMA_KATERING,Konfigurasi.TAG_ALAMAT_KATERING,Konfigurasi.TAG_NO_TELP_KATERING,Konfigurasi.TAG_EMAIL_KATERING},
                new int[]{R.id.nama_catering, R.id.alamat_katering, R.id.no_telp_katering, R.id.email_katering});

        listView.setAdapter(adapter);
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
    @Override
    public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
Intent intent = new Intent(this,TampilMenuCatering.class);
        HashMap<String,String> map =(HashMap)parent.getItemAtPosition(position);
String empId = map.get(Konfigurasi.TAG_ID_KATERING).toString();
intent.putExtra(Konfigurasi.EMP_ID,empId);
startActivity(intent);
    }
}