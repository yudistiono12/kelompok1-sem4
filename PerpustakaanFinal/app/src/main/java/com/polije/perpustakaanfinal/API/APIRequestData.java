package com.polije.perpustakaanfinal.API;

import com.polije.perpustakaanfinal.Model.ResponseModel;

import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.GET;
import retrofit2.http.POST;

public interface APIRequestData {
    @GET("retrieve.php")
    Call<ResponseModel> ardRerieveData();

    @FormUrlEncoded
    @POST("create.php")
    Call<ResponseModel> ardCreateData(
            @Field("nim") String nim,
            @Field("nama") String nama,
            @Field("password") String Password,
            @Field("alamat") String alamat,
            @Field("fakultas") String fakultas,
            @Field("prodi") String prodi
    );

}
