package com.polije.perpustakaanfinal.Activity;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.os.Message;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.Toast;

import com.polije.perpustakaanfinal.API.APIRequestData;
import com.polije.perpustakaanfinal.API.RetroServer;
import com.polije.perpustakaanfinal.Model.ResponseModel;
import com.polije.perpustakaanfinal.R;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class DaftarActivity extends AppCompatActivity {
    private EditText editTextNim, editTextNama, editTextPassword, editTextAlamat, editTextFakultas, editTextProdi;
    private Button buttonSimpan;
    private String nim, nama, password, alamat, fakultas, prodi;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_daftar);

        editTextNim = findViewById(R.id.editTextNim);
        editTextNama = findViewById(R.id.editTextNama);
        editTextPassword = findViewById(R.id.editTextPassword);
        editTextAlamat = findViewById(R.id.editTextAlamat);
        editTextFakultas = findViewById(R.id.editTextFakultas);
        editTextProdi = findViewById(R.id.editTextProdi);
        buttonSimpan = findViewById(R.id.buttonSimpan);

        buttonSimpan.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                nim = editTextNim.getText().toString();
                nama = editTextNama.getText().toString();
                password = editTextPassword.getText().toString();
                alamat = editTextAlamat.getText().toString();
                fakultas = editTextFakultas.getText().toString();
                prodi = editTextProdi.getText().toString();

                if(nim.trim().equals("")){
                    editTextNim.setError("NIM Harus Diisi !");
                }
                else if(nama.trim().equals("")){
                    editTextNama.setError("Nama Harus Diisi !");
                }
                else if(password.trim().equals("")){
                    editTextPassword.setError("Password Harus Diisi !");
                }
                else if(alamat.trim().equals("")){
                    editTextAlamat.setError("Alamat Harus Diisi !");
                }
                else if(fakultas.trim().equals("")){
                    editTextFakultas.setError("Fakultas Harus Diisi !");
                }
                else if(prodi.trim().equals("")){
                    editTextProdi.setError("Prodi Harus Diisi !");
                }
                else{
                    createData();
                }

            }
        });
    }

    private void createData(){
        APIRequestData ardData = RetroServer.konekRetrofit().create(APIRequestData.class);
        Call <ResponseModel> simpanData = ardData.ardCreateData(nim, nama, password, alamat, fakultas, prodi);

        simpanData.enqueue(new Callback<ResponseModel>() {
            @Override
            public void onResponse(Call<ResponseModel> call, Response<ResponseModel> response) {
                int kode = response.body().getKode();
                String pesan = response.body().getPesan();

                Toast.makeText(DaftarActivity.this, "kode : "+kode+" | Pesan : "+pesan, Toast.LENGTH_SHORT).show();
                finish();
            }

            @Override
            public void onFailure(Call<ResponseModel> call, Throwable t) {
                Toast.makeText(DaftarActivity.this, "Gagal Terhubung Server | "+t.getMessage(), Toast.LENGTH_SHORT).show();
            }
        });
    }
}