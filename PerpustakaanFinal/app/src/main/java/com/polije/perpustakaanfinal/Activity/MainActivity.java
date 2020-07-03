package com.polije.perpustakaanfinal.Activity;

import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.polije.perpustakaanfinal.R;

public class MainActivity extends AppCompatActivity {
    private Button btn_Daftar;

    EditText Nim,Password;
    Button Masuk;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        btn_Daftar = findViewById(R.id.buttonDaftar);

        Button btn2 = (Button) findViewById(R.id.buttonMasuk);

        btn_Daftar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                startActivity(new Intent(MainActivity.this, DaftarActivity.class));
            }
        });
        btn2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent inte = new Intent(MainActivity.this, DaftarActivity.class);
                startActivity(inte);
            }
        });

        Nim = (EditText) findViewById(R.id.editTextNim);
        Password = (EditText) findViewById(R.id.editTextPassword);
        Masuk = findViewById(R.id.buttonMasuk);
        Masuk.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                {
                    String usernameKey = Nim.getText().toString();
                    String passwordKey = Password.getText().toString();
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