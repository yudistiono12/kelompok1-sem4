package com.polije.perpustakaanbeta;

import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {

    EditText username,password;
    Button submit;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        username = (EditText) findViewById(R.id.Username);
        password = (EditText) findViewById(R.id.Password);
        submit = findViewById(R.id.submit);
        submit.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                {
                    String usernameKey = username.getText().toString();
                    String passwordKey = password.getText().toString();
                    if (usernameKey.equals("wina") && passwordKey.equals("2424")){
                        //jika login berhasil
                        Toast.makeText(getApplicationContext(),"Login Sukses",
                                Toast.LENGTH_SHORT).show();
                        Intent inte = new Intent(MainActivity.this, KatalogBuku.class);
                        startActivity(inte);
                        finish();
                    } else {
                        //jika Login gagal
                        AlertDialog.Builder builder = new AlertDialog.Builder(MainActivity.this);
                        builder.setMessage("Username atau Password salah!").setNegativeButton("Retry", null).create().show();
                    }
                }
            }
        });
    }

}