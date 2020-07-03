package com.example.loginpage;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ListView;

import androidx.appcompat.app.AppCompatActivity;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;

public class History extends AppCompatActivity {

    String[] nama_katering;
    String[] nama_menu;
    String[] jumlah_pesan;
    String[] sub_total;
    String[] status;
    String id;
    private android.widget.ListView listView;
    private String JSON_STRING;
    SharedPrefManager sharedPrefManager;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.history);
        listView = (ListView) findViewById(R.id.listView);
        sharedPrefManager = new SharedPrefManager(this);
        id = (sharedPrefManager.getSpIdPelanggan());
        getJSON();
    }
    private void showEmployee(){
        JSONObject jsonObject = null;
        ArrayList<HashMap<String,String>> list =   new ArrayList<HashMap<String, String>>();
        try {
            jsonObject = new JSONObject(JSON_STRING);
            JSONArray result = jsonObject.getJSONArray(Konfigurasi.TAG_JSON_ARRAY);
            nama_menu=new String[result.length()];
            nama_katering=new String[result.length()];
            jumlah_pesan=new String[result.length()];
           sub_total=new String[result.length()];
            status=new String[result.length()];
            for(int i = 0; i<result.length(); i++){
                JSONObject jo = result.getJSONObject(i);
                nama_menu [i]= jo.getString(Konfigurasi.TAG_NAMA_MENU);
                nama_katering [i] = jo.getString(Konfigurasi.TAG_NAMA_KATERING);
                jumlah_pesan [i]= jo.getString(Konfigurasi.TAG_JUMLAH_PESAN);
                sub_total [i]= jo.getString(Konfigurasi.TAG_SUB_TOTAL);
                status[i] = jo.getString(Konfigurasi.TAG_STATUS);

                ListViewHistory customListView = new ListViewHistory(this,nama_katering, nama_menu, jumlah_pesan,sub_total,status);
                listView.setAdapter(customListView);
                listView.setOnItemClickListener(new AdapterView.OnItemClickListener(){
                    @Override
                    public void onItemClick(AdapterView<?> parent, View view, int position, long id) {

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
                loading = ProgressDialog.show(History.this,"Mengambil Data","Mohon Tunggu...",false,false);
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
                String s = rh.sendGetRequestParam(Konfigurasi.URL_GET_HISTORY,id);
                return s;
            }
        }
        GetJSON gj = new GetJSON();
        gj.execute();
    }
}