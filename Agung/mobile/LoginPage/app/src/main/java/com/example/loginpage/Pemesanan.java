package com.example.loginpage;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;
import androidx.appcompat.app.AppCompatActivity;
import com.squareup.picasso.Picasso;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;
import java.util.ArrayList;
import java.util.HashMap;

public class Pemesanan extends AppCompatActivity {
    //Dibawah ini merupakan perintah untuk mendefinikan View
    int quantity = 0;
    private EditText editTextALamat;
    private EditText editTextMetode;
    TextView tv_id_pelanggan;
    TextView tv_id_menu;
    TextView txtquantity;
    TextView txtharga;
    TextView result;
    private ImageView img_menu;
    private String id_menu;
    private String user; //pembuatan variabel user
    SharedPrefManager sharedPrefManager;
    ArrayList<HashMap<String, String>> list_data;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.pemesanan);
        list_data = new ArrayList<HashMap<String, String>>();
        //Inisialisasi dari View
        Intent intent = getIntent();
        id_menu = intent.getStringExtra("nama");
        tv_id_menu =(TextView) findViewById(R.id.id_menu);
        editTextALamat = (EditText) findViewById(R.id.alamat);
        editTextMetode = (EditText) findViewById(R.id.metode);
        tv_id_pelanggan =(TextView) findViewById(R.id.id_pelanggan);
        img_menu = (ImageView) findViewById(R.id.img_menu);
        txtharga = (TextView) findViewById(R.id.price_textview);
        txtquantity = (TextView) findViewById(R.id.quantity_textview);
        result = (TextView) findViewById(R.id.sub_total);
        sharedPrefManager = new SharedPrefManager(this);
        user = (sharedPrefManager.getSpIdPelanggan());
        tv_id_pelanggan.setText(user);
        getEmployee();
    }
          public void order(View view) {
                  addEmployee();
          }

    public void cek_harga(View view) {
        int jumlah= Integer.parseInt(txtquantity.getText().toString());
        int harga= Integer.parseInt(txtharga.getText().toString());
        int hasil = jumlah*harga;
    result.setText(""+String.valueOf(hasil));
    }
    private void getEmployee() {
        class GetEmployee extends AsyncTask<Void, Void, String> {
            ProgressDialog loading;

            @Override
            protected void onPreExecute() {
                super.onPreExecute();
                loading = ProgressDialog.show(Pemesanan.this, "Fetching...", "Wait...", false, false);
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
                String s = rh.sendGetRequestParam(Konfigurasi.URL_GET_MENU, id_menu);
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
            String id_menu = c.getString(Konfigurasi.TAG_ID_MENU);
            String nama_menu = c.getString(Konfigurasi.TAG_NAMA_MENU);
            String harga = c.getString(Konfigurasi.TAG_HARGA);
            String gambar = c.getString(Konfigurasi.TAG_GAMBAR);
            HashMap<String,String> employees = new HashMap<>();
            employees.put(Konfigurasi.TAG_HARGA,harga);
            employees.put(Konfigurasi.TAG_ID_MENU,id_menu);

            list_data.add(employees);
            Picasso.get().load(gambar).into(img_menu);
            txtharga.setText(list_data.get(0).get("harga"));
            tv_id_menu.setText(list_data.get(0).get("id_menu"));

        } catch (JSONException ex) {
            ex.printStackTrace();
        }
    }
    private void addEmployee(){
        Spinner spinner = (Spinner) findViewById(R.id.spinner);
        String data=spinner.getSelectedItem().toString();
        editTextMetode.setText(data);
        final String id = tv_id_pelanggan.getText().toString().trim();
        final String sub_total = result.getText().toString().trim();
        final String metod = editTextMetode.getText().toString().trim();
        final String jumlah_pesan = txtquantity.getText().toString().trim();
        final String alamat =editTextALamat.getText().toString().trim();
        final String id_menu =tv_id_menu.getText().toString().trim();
        class AddEmployee extends AsyncTask<Void,Void,String>{

            ProgressDialog loading;

            @Override
            protected void onPreExecute() {
                super.onPreExecute();
                loading = ProgressDialog.show(Pemesanan.this,"Menambahkan...","Tunggu...",false,false);
            }

            @Override
            protected void onPostExecute(String s) {
                super.onPostExecute(s);
                loading.dismiss();
                Toast.makeText(Pemesanan.this,s,Toast.LENGTH_LONG).show();
            }

            @Override
            protected String doInBackground(Void... v) {
                HashMap<String,String> params = new HashMap<>();
                params.put(Konfigurasi.KEY_EMP_ID_PELANGGAN,id);
                params.put(Konfigurasi.KEY_EMP_SUB_TOTAL,sub_total);
                params.put(Konfigurasi.KEY_EMP_METODE_BAYAR,metod);
                params.put(Konfigurasi.KEY_EMP_JUMLAH_PESAN,jumlah_pesan);
                params.put(Konfigurasi.KEY_EMP_ALAMAT_PESAN,alamat);
                params.put(Konfigurasi.KEY_EMP_ID_MENU,id_menu);

                RequestHandler rh = new RequestHandler();
                String res = rh.sendPostRequest(Konfigurasi.URL_PEMESANAN, params);
                return res;
            }
        }
        AddEmployee ae = new AddEmployee();
        ae.execute();
        Intent intent = new Intent(this,TampilCatering.class);
        startActivity(intent);
    }
    public void increment(View view){
        //perintah tombol tambah

        if(quantity==100){
            Toast.makeText(this,"pesanan maximal 100",Toast.LENGTH_SHORT).show();
            return;
        }
        quantity = quantity+1 ;
        display(quantity);
    }
    public void decrement(View view){//perintah tombol tambah
        if (quantity==1){
            Toast.makeText(this,"pesanan minimal 1",Toast.LENGTH_SHORT).show();
            return;
        }
        quantity = quantity -1;
        display(quantity);
    }
    private void display(int number) {
        TextView quantityTextView = (TextView) findViewById(R.id.quantity_textview);
        quantityTextView.setText("" + number);
    }
}