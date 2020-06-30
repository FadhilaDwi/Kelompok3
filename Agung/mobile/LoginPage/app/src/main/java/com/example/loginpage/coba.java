package com.example.loginpage;

import android.content.Intent;
import android.os.Bundle;
import android.widget.TextView;

import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;

public class coba extends AppCompatActivity {
    private String id_menu;
    @Override
    protected void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_second);
        TextView tvData1 = (TextView) findViewById(R.id.tv_data1);
        Intent intent = getIntent();
        id_menu = intent.getStringExtra("nama");
        tvData1.setText(id_menu);
        Bundle bundle = getIntent().getExtras();

    }
}
