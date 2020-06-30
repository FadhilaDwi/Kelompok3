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

public class ListViewHistory extends ArrayAdapter<String> {
private String[] nama_katering;
private String[] nama_menu;
private String[] jumlah_pesan;
private String[] sub_total;
private String[] status;
private Activity context;
        Bitmap bitmap;

public ListViewHistory(Activity context,String[]nama_katering,String[] nama_menu,String[] jumlah_pesan,String[] sub_total,String[] status) {
        super(context, R.layout.list_history,nama_katering);
        this.context=context;
        this.nama_katering=nama_katering;
        this.nama_menu=nama_menu;
        this.jumlah_pesan=jumlah_pesan;
        this.sub_total=sub_total;
        this.status=status;
        }

@NonNull
@Override

public View getView(int position, @Nullable View convertView, @NonNull ViewGroup parent){
        View r=convertView;
        ViewHolder viewHolder=null;
        if(r==null){
        LayoutInflater layoutInflater=context.getLayoutInflater();
        r=layoutInflater.inflate(R.layout.list_history,null,true);
        viewHolder=new ViewHolder(r);
        r.setTag(viewHolder);
        }
        else {
        viewHolder=(ViewHolder)r.getTag();
        }
        viewHolder.tvw1.setText(nama_katering[position]);
        viewHolder.tvw2.setText(nama_menu[position]);
        viewHolder.tvw3.setText(jumlah_pesan[position]);
        viewHolder.tvw4.setText(sub_total[position]);
        viewHolder.tvw5.setText(status[position]);

        return r;
        }

class ViewHolder{

    TextView tvw1;
    TextView tvw2;
    TextView tvw3;
    TextView tvw4;
    TextView tvw5;

    ViewHolder(View v){
        tvw1=(TextView)v.findViewById(R.id.nama_catering);
        tvw2=(TextView)v.findViewById(R.id.nama_menu);
        tvw3=(TextView)v.findViewById(R.id.jumlah_pesan);
        tvw4=(TextView)v.findViewById(R.id.sub_total);
        tvw5=(TextView)v.findViewById(R.id.status);

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
