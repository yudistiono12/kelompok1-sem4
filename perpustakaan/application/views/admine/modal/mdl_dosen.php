   <div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
    <button type="button" class="close btn-danger" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h3 style="display:block; text-align:center;" class="modal-title">Data Mahasiswa</h3>
  <br>
  <form id="form-dosen" method="POST">
    <input type="hidden" value="" name="nip_sem"/> 
    <div class="form-group row">
      <label class="col-md-3 control-label">NIP</label>
      <div class="col-md-6">
        <input type="text" id="nim" class="form-control" maxlength="20" placeholder="NIP lengkap" name="nip"> <!-- onkeypress='return harusHurufPen(event)' -->
      </div>
    </div>
    <div class="form-group row">
      <label class="col-md-3 control-label">Nama Lengkap</label>
      <div class="col-md-9">
        <input type="text" class="form-control"  placeholder="Nama Dosen" name="nama_dosen"> <!-- onkeypress='return harusHurufPen(event)' -->
      </div> 
    </div>
    <div class="form-group row" id="jabatan">
      <label  class="col-md-3 control-label">jabatan</label>
      <div class="col-md-5">
      <select name="jabatan" class="form-control select2" >
        <?php
        foreach ($datajabatan as $jabatan) {
          ?>
          <option value="<?= $jabatan['id_jabatan'] ?>">
            <?= $jabatan['nama_jabatan']; ?>
          </option>
          <?php
        }
        ?>
      </select>
      </div>
    </div>
    <div class="form-group row">
      <label for="tlp"  class="col-md-3 control-label">No Telp</label>
      <div class="col-md-8">
        <input type="text" class="form-control" maxlength="15" placeholder="Nomor Telepon" onkeypress='return harusAngka(event)' name="no_tlp">
      </div>
    </div>
    <div class="form-group row" id="foto-preview">
      <input type="hidden" name="foto_lama" >
      <label  class="col-md-3">Foto Sebelumnya</label>
      <div class="new col-md-5">
        (Tidak Ada Foto)
      </div>
    </div>
    <div class="form-group row">
      <label for="foto" id="label-foto"  class="col-md-3 control-label">foto</label>
      <div class="col-md-8">
        <input type="file" name="img" id="img" onchange="tampilkanPreview(this,'preview')">
        <br><b>Preview Gambar</b><br>
            <img id="preview"  alt="" class="img-responsive" width="60%" />
      </div>
    </div>
    <div class="form-group row" id="keterangan">
      <div class="col-md-10">
        <!-- <label onclick="buatusername()" style="background-color: green;">Buat username dan Password</label> -->
        <h6><b>Keterangan :</b> untuk username dan password baru otomatis dibuatkan.</h6>
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-10 col-md-offset-1">
          <button type="button" id="btnSimpan" class="form-control btn btn-primary" onclick="simpan()"> <i class="glyphicon glyphicon-ok"></i>Simpan</button>
      </div>
    </div>
  </form>
</div>

<!-- <script type="text/javascript">
$(function () {
    $(".select2").select2();

    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });
});
</script> -->





<script>
function tampilkanPreview(img,idpreview)
{ //membuat objek gambar
  var gb = img.files;
  //loop untuk merender gambar
  for (var i = 0; i < gb.length; i++)
  { //bikin variabel
    var gbPreview = gb[i];
    var imageType = /image.*/;
    var preview=document.getElementById(idpreview);            
    var reader = new FileReader();
    if (gbPreview.type.match(imageType)) 
    { //jika tipe data sesuai
      preview.file = gbPreview;
      reader.onload = (function(element) 
      {
        return function(e) 
        {
          element.src = e.target.result;
        };
      })(preview);
      //membaca data URL gambar
      reader.readAsDataURL(gbPreview);
    }
      else
      { //jika tipe data tidak sesuai

        alert("Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg. Silahkan file gambarnya!" );
        preview.file = "salah";
      }
  }    
}

// function buatusername(){
//      const nim = $('#nim').val();
//      const prodi = $('#prodi').val();
//      const angkatan = $('#angkatan').val();


// }
</script>