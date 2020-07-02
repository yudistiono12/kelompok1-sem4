   <div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
    <button type="button" class="close btn-danger" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h3 style="display:block; text-align:center;" class="modal-title">Data Buku</h3>
  <br>
  <form id="form-buku" method="POST">
    <input type="hidden" value="" name="id_buku"/> 
    <div class="form-group row">
      <label class="col-md-3 control-label">ISBN</label>
      <div class="col-md-6">
        <input type="text" id="isbn" class="form-control" maxlength="20" placeholder="ISBN lengkap" name="isbn" onkeypress='return harusAngka(event)'> <!-- onkeypress='return harusHurufPen(event)' -->
      </div>
    </div>
    <div class="form-group row">
      <label class="col-md-3 control-label">Judul Buku</label>
      <div class="col-md-9">
        <input type="text" class="form-control"  placeholder="Judul BUku" name="judul"> <!-- onkeypress='return harusHurufPen(event)' -->
      </div> 
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group row" id="kategori">
          <label  class="col-md-6 control-label">Kategori</label>
          <div class="col-md-6">
          <select name="kategori" class="form-control select2" >
          <?php foreach ($data_kategori ->result_array() as $ktgr) :?>
              <option value="<?= $ktgr['id_kategori'] ?>">
                <?= $ktgr['nama_kategori']; ?>
              </option>
            <?php endforeach; ?>
          </select>
          </div>
        </div>
      </div>
      <div class="form-group row" id="prodi">
        <label  class="col-md-1 control-label">prodi</label>
        <div class="col-md-4">
        <select name="prodi" class="form-control select2" >
        <?php foreach ($data_prodi ->result_array() as $ktgr) :?>
            <option value="<?= $ktgr['id_prodi'] ?>">
              <?= $ktgr['prodi']; ?>
            </option>
          <?php endforeach; ?>
        </select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group row" id="pengarang">
          <label  class="col-md-6 control-label">pengarang</label>
          <div class="col-md-6">
          <select name="pengarang" class="form-control select2" >
          <?php foreach ($data_pengarang ->result_array() as $ktgr) :?>
              <option value="<?= $ktgr['id_pengarang'] ?>">
                <?= $ktgr['nama_pengarang']; ?>
              </option>
            <?php endforeach; ?>
          </select>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group row" id="penerbit">
          <label  class="col-md-2 control-label">penerbit</label>
          <div class="col-md-8">
          <select name="penerbit" class="form-control select2" >
          <?php foreach ($data_penerbit ->result_array() as $ktgr) :?>
              <option value="<?= $ktgr['id_penerbit'] ?>">
                <?= $ktgr['nama_penerbit']; ?>
              </option>
            <?php endforeach; ?>
          </select>
          </div>
        </div>
      </div>
    </div>
    <div class="form-group row" id="asal_buku">
      <label  class="col-md-3 control-label">Asal Buku</label>
      <div class="col-md-5">
      <select name="asal_buku" class="form-control select2" >
      <?php foreach ($data_asal_buku ->result_array() as $ktgr) :?>
          <option value="<?= $ktgr['id_asal_buku'] ?>">
            <?= $ktgr['keterangan']; ?>
          </option>
        <?php endforeach; ?>
      </select>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group row" id="tahun">
          <label  class="col-md-6 control-label">Tahun Terbit</label>
          <div class="col-md-6">
          <select name="tahun" class="form-control select2" >
            <?php
            $now=2030;

            for ($a=2012;$a<=$now;$a++)

            { ?>
              <option value="<?= $a; ?>">
                <?= $a ?>
              </option>
            <?php }
            ?>
          </select>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group row">
          <label for="tlp"  class="col-md-3 control-label">Edisi</label>
          <div class="col-md-8">
            <input type="text" class="form-control" maxlength="3" placeholder="Edisi" onkeypress='return harusAngka(event)' name="edisi">
          </div>
        </div>
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
        <h6><b>Keterangan :</b> untuk jumlah buku silahkan masuk ke tombol detail stok setelah disimpan </h6>
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