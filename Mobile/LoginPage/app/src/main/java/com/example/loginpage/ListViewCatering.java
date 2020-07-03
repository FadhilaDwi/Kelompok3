package com.example.loginpage;

import android.app.Activity;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.os.AsyncTask;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;

import java.io.InputStream;

public class ListViewCatering extends ArrayAdapter<String> {
private String[] id_katering;
private String[] nama_katering;
private String[] alamat_katering;
private String[] no_telp_katering;
    private String[] email_katering;
    private String[] gambar_katering;
private Activity context;
        Bitmap bitmap;

public ListViewCatering(Activity context,String[]id_katering,String[] nama_katering,String[] alamat_katering,String[] no_telp_katering,String[] email_katering,String[] gambar_katering) {
        super(context, R.layout.list_item,nama_katering);
        this.context=context;
        this.nama_katering=nama_katering;
        this.alamat_katering=alamat_katering;
        this.no_telp_katering=no_telp_katering;
        this.email_katering=email_katering;
        this.gambar_katering=gambar_katering;
        }

@NonNull
@Override

public View getView(int position, @Nullable View convertView, @NonNull ViewGroup parent){
        View r=convertView;
        ViewHolder viewHolder=null;
        if(r==null){
        LayoutInflater layoutInflater=context.getLayoutInflater();
        r=layoutInflater.inflate(R.layout.list_item,null,true);
        viewHolder=new ViewHolder(r);
        r.setTag(viewHolder);
        }
        else {
        viewHolder=(ViewHolder)r.getTag();
        }

        viewHolder.tvw1.setText(nama_katering[position]);
        viewHolder.tvw2.setText(alamat_katering[position]);
        viewHolder.tvw3.setText(no_telp_katering[position]);

        new GetImageFromURL(viewHolder.ivw).execute(gambar_katering[position]);

        return r;
        }

class ViewHolder{

    TextView tvw1;
    TextView tvw2;
    TextView tvw3;
    ImageView ivw;

    ViewHolder(View v){
        tvw1=(TextView)v.findViewById(R.id.nama_catering);
        tvw2=(TextView)v.findViewById(R.id.alamat_katering);
        tvw3=(TextView)v.findViewById(R.id.no_telp_katering);
        ivw=(ImageView)v.findViewById(R.id.img_katering);
    }

}

public class GetImageFromURL extends AsyncTask<String,Void, Bitmap>
{

    ImageView imgView;
    public GetImageFromURL(ImageView imgv)
    {
        this.imgView=imgv;
    }
    @Override
    protected Bitmap doInBackground(String... url) {
        String urldisplay=url[0];
        bitmap=null;
        try{
            InputStream ist=new java.net.URL(urldisplay).openStream();
            bitmap= BitmapFactory.decodeStream(ist);
        }
        catch (Exception ex)
        {
            ex.printStackTrace();
        }
        return bitmap;
    }

    @Override
    protected void onPostExecute(Bitmap bitmap){
        super.onPostExecute(bitmap);
        imgView.setImageBitmap(bitmap);
    }
}
}