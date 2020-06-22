package com.example.loginpage;

import android.os.Bundle;
import android.widget.TextView;

import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;

public class coba extends AppCompatActivity {
    @Override
    protected void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_second);
        TextView tvData1 = (TextView) findViewById(R.id.tv_data1);
        Bundle bundle = getIntent().getExtras();
        tvData1.setText(bundle.getString("data1"));
    }
}
