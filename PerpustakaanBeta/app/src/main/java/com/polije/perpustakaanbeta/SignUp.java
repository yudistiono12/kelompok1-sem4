package com.polije.perpustakaanbeta;

import androidx.appcompat.app.AppCompatActivity;

import android.app.ProgressDialog;
import android.os.Bundle;
import android.view.WindowManager;
import android.widget.EditText;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.Toast;

import com.polije.perpustakaanbeta.api.RegisterAPI;
import com.polije.perpustakaanbeta.model.Value;

import butterknife.BindView;
import butterknife.ButterKnife;
import butterknife.OnClick;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;
import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;

public class SignUp extends AppCompatActivity {
    public static final String URL = "";
    private RadioButton radioJKButton;
    private ProgressDialog progress;
    String nim,nama,fakultas,prodi;

    @BindView(R.id.radiojk) RadioGroup radioGroup;
    @BindView(R.id.nim)  EditText editTextnim;
    @BindView(R.id.nama) EditText editTextnama;
    @BindView(R.id.fakultas) EditText editTextfakultas;
    @BindView(R.id.prodi) EditText editTextprodi;


    @OnClick(R.id.buttonregis)void daftar() {
        //menampilkan progress dialog
        progress = new ProgressDialog(this);
        progress.setCancelable(false);
        progress.setMessage("Loading...");
        progress.show();

        nim = editTextnim.getText().toString();
        fakultas = editTextfakultas.getText().toString();
        prodi = editTextprodi.getText().toString();

        int selectedId = radioGroup.getCheckedRadioButtonId();
        radioJKButton = (RadioButton) findViewById(selectedId);
        String jk = radioJKButton.getText().toString();

        Retrofit retrofit = new Retrofit.Builder()
                .baseUrl(URL)
                .addConverterFactory(GsonConverterFactory.create())
                .build();

        RegisterAPI api = retrofit.create(RegisterAPI.class);
        Call<Value> call = api.daftar(nim,nama,fakultas,prodi,jk);

        call.enqueue(new Callback<Value>() {
            @Override
            public void onResponse(Call<Value> call, Response<Value> response) {
                String value = response.body().getValue();
                String message = response.body().getMessage();
                progress.dismiss();

                if(value.equals("1")) {
                    Toast.makeText(SignUp.this, message, Toast.LENGTH_SHORT).show();
                }else{
                    Toast.makeText(SignUp.this, message, Toast.LENGTH_SHORT).show();
                }
            }

            @Override
            public void onFailure(Call<Value> call, Throwable t) {
                t.printStackTrace();
                progress.dismiss();
                Toast.makeText(SignUp.this,"Jaringan Error!",Toast.LENGTH_SHORT).show();
            }
        });

    }


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_sign_up);
        getWindow().setBackgroundDrawableResource(R.drawable.background);
        this.getWindow().setSoftInputMode(WindowManager.LayoutParams.SOFT_INPUT_STATE_ALWAYS_HIDDEN);
        ButterKnife.bind(this);
    }
}