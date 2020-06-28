package com.polije.perpustakaanbeta.api;

import com.polije.perpustakaanbeta.model.Value;

import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.POST;

public interface RegisterAPI {
    @POST("insert.php")
    Call<Value> daftar(@Field("nim") String nim,
                       @Field("nama") String nama,
                       @Field("jk") String jk,
                       @Field("fakultas") String fakultas,
                       @Field("prodi") String prodi);
}
