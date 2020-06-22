package com.example.loginpage;

import android.os.Bundle;
import android.os.StrictMode;
import android.widget.ListView;
import androidx.appcompat.app.AppCompatActivity;
import org.json.JSONArray;
import org.json.JSONObject;
import java.io.BufferedInputStream;
import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;


public class TampilMenu extends AppCompatActivity {
    String urladdress="http://192.168.10.242/Kelompok3/Agung/API/tampilmenu.php";
    String[] nama_menu;
    String[] harga_menu;
    String[] gambar;
    ListView listView;
    BufferedInputStream is;
    String line=null;
    String result=null;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.katering);

        listView=(ListView)findViewById(R.id.listView);

        StrictMode.setThreadPolicy((new StrictMode.ThreadPolicy.Builder().permitNetwork().build()));
        collectData();
        CustomListView customListView=new CustomListView(this,nama_menu,harga_menu,gambar);
        listView.setAdapter(customListView);

    }

    private void collectData()
    {
//Connection
        try{

            URL url=new URL(urladdress);
            HttpURLConnection con=(HttpURLConnection)url.openConnection();
            con.setRequestMethod("GET");
            is=new BufferedInputStream(con.getInputStream());

        }
        catch (Exception ex)
        {
            ex.printStackTrace();
        }
        //content
        try{
            BufferedReader br=new BufferedReader(new InputStreamReader(is));
            StringBuilder sb=new StringBuilder();
            while ((line=br.readLine())!=null){
                sb.append(line+"\n");
            }
            is.close();
            result=sb.toString();

        }
        catch (Exception ex)
        {
            ex.printStackTrace();

        }

//JSON
        try{
            JSONArray ja=new JSONArray(result);
            JSONObject jo=null;
            nama_menu=new String[ja.length()];
           harga_menu=new String[ja.length()];
           gambar=new String[ja.length()];

            for(int i=0;i<=ja.length();i++){
                jo=ja.getJSONObject(i);
                nama_menu[i]=jo.getString("nama_menu");
                harga_menu[i]=jo.getString("harga");
                gambar[i]=jo.getString("gambar");
            }
        }
        catch (Exception ex)
        {

            ex.printStackTrace();
        }
    }
}