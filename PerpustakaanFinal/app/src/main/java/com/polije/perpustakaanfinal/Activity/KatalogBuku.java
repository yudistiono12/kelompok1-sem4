package com.polije.perpustakaanfinal.Activity;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

import com.polije.perpustakaanfinal.R;

public class KatalogBuku extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_katalog);

        Button btn = (Button) findViewById(R.id.lihatdetail);

        btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View arg0) {
                Intent inte = new Intent(KatalogBuku.this, PinjamBuku.class);
                startActivity(inte);
            }
        });

    }
}