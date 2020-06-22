package com.example.loginpage;

import android.Manifest;
import android.app.ProgressDialog;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.database.Cursor;
import android.graphics.Bitmap;
import android.net.Uri;
import android.os.AsyncTask;
import android.os.Bundle;
import android.provider.MediaStore;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.ListAdapter;
import android.widget.ListView;
import android.widget.SimpleAdapter;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import androidx.core.app.ActivityCompat;
import androidx.core.content.ContextCompat;
import com.squareup.picasso.Picasso;
import net.gotev.uploadservice.MultipartUploadRequest;
import net.gotev.uploadservice.UploadNotificationConfig;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.UUID;

public class TampilProfil extends AppCompatActivity {
    private ListView listView;
    private String JSON_STRING;
    private Button ubah;
    private String id;
    private Button logout;
    private ImageView imgprofil;
    private static final int STORAGE_PERMISSION_CODE = 4655;
    private int PICK_IMAGE_REQUEST = 1;
    private Uri filepath;
    private Bitmap bitmap;
    public static final String UPLOAD_URL = "http://192.168.1.100/apistudy/upload.php";
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
    public void upload(View view) {
        requestStoragePermission();
    }

    private void requestStoragePermission() {

        if (ContextCompat.checkSelfPermission(this, Manifest.permission.READ_EXTERNAL_STORAGE) == PackageManager.PERMISSION_GRANTED)
            return;

        if (ActivityCompat.shouldShowRequestPermissionRationale(this, Manifest.permission.READ_EXTERNAL_STORAGE)) {
            //If the user has denied the permission previously your code will come to this block
            //Here you can explain why you need this permission
            //Explain here why you need this permission
        }
        ActivityCompat.requestPermissions(this, new String[]{Manifest.permission.READ_EXTERNAL_STORAGE}, STORAGE_PERMISSION_CODE);
    }

    @Override
    public void onRequestPermissionsResult(int requestCode, @NonNull String[] permissions, @NonNull int[] grantResults) {
        if (requestCode == STORAGE_PERMISSION_CODE) {
            if (grantResults.length > 0 && grantResults[0] == PackageManager.PERMISSION_GRANTED) {
                Toast.makeText(this, "Permission granted now you can read the storage", Toast.LENGTH_LONG).show();

            } else {
                Toast.makeText(this, "Oops you just denied the permission", Toast.LENGTH_LONG).show();
            }
        }
    }

    private void ShowFileChooser() {
        Intent intent = new Intent();
        intent.setType("image/*");
        intent.setAction(Intent.ACTION_GET_CONTENT);
        startActivityForResult(Intent.createChooser(intent, "Select Picture"), PICK_IMAGE_REQUEST);

    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);

        if (requestCode == PICK_IMAGE_REQUEST && data != null && data.getData() != null) {

            filepath = data.getData();
            try {

                bitmap = MediaStore.Images.Media.getBitmap(getContentResolver(), filepath);
                imgprofil.setImageBitmap(bitmap);
            } catch (Exception ex) {

            }
        }
    }

    public void selectImage(View view) {
        ShowFileChooser();
    }


    private String getPath(Uri uri) {

        Cursor cursor = getContentResolver().query(uri, null, null, null, null);
        cursor.moveToFirst();
        String document_id = cursor.getString(0);
        document_id = document_id.substring(document_id.lastIndexOf(":") + 1);
        cursor = getContentResolver().query(
                MediaStore.Images.Media.EXTERNAL_CONTENT_URI, null, MediaStore.Images.Media._ID + "=?", new String[]{document_id}, null
        );
        cursor.moveToFirst();
        String path = cursor.getString(cursor.getColumnIndex(MediaStore.Images.Media.DATA));
        cursor.close();
        return path;
    }

    private void uploadImage() { ;
        String path = getPath(filepath);
        try {
            String uploadId = UUID.randomUUID().toString();
            new MultipartUploadRequest(this, uploadId, UPLOAD_URL).addFileToUpload(path, "image")
                    .setNotificationConfig(new UploadNotificationConfig())
                    .setMaxRetries(3)
                    .startUpload();
        } catch (Exception ex) {
        }
    }
    public void saveData(View view)
    {
        uploadImage();
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