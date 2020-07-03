package com.example.loginpage;

import android.content.Context;
import android.content.SharedPreferences;

public class SharedPrefManager {
    public static final String SP_LARING_APP = "spLaringApp";
    public static final String SP_USERNAME = "spUsername";
    public static final String SP_SUDAH_LOGIN = "spSudahLogin";
    public static final String SP_ID_PELANGGAN = "spIdPelanggan";

    SharedPreferences sp;
    SharedPreferences.Editor spEditor;
    public SharedPrefManager(Context context){
        sp = context.getSharedPreferences(SP_LARING_APP, Context.MODE_PRIVATE);
        spEditor = sp.edit();
    }
    public void saveSPString(String keySP, String value){
        spEditor.putString(keySP, value);
        spEditor.commit();
    }

    public void saveSPBoolean(String keySP, boolean value){
        spEditor.putBoolean(keySP, value);
        spEditor.commit();
    }

    public String getSpUsername(){

        return sp.getString(SP_USERNAME, "");

    }
    public String getSpIdPelanggan(){

        return sp.getString(SP_ID_PELANGGAN, "");

    }
    public Boolean getSPSudahLogin(){
        return sp.getBoolean(SP_SUDAH_LOGIN, false);
    }

}
