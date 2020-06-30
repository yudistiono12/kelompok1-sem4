<!--  <div class="bradcam_area bradcam_bg_1">
      <div class="container">
          <div class="row">
              <div class="col-xl-12">
                  <div class="bradcam_text">
                      <h3>Pendaftaran Anggota Perpustakaan </h3>
                  </div>
              </div>
          </div>
      </div>
  </div>  -->
  <br><br><br><br><br><br>
 <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?= base_url('assets/anggota/'); ?>bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/anggota/'); ?>dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url('assets/anggota/'); ?>plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="#"><b>Pendaftaran</b>Anggota</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">form pendaftaran</p>

  <div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#mahasiswa" onclick="mahasiswa()" data-toggle="tab">Mahasiswa</a></li>
        <li><a href="#dosen" onclick="dosen()" data-toggle="tab">Dosen</a></li>
    </ul>
    <div class="tab-content">
      <div class="active tab-pane" id="mahasiswa">
        <?= $this->session->flashdata('message'); ?>
        <form method="post" action="<?= base_url('home/registermaha'); ?>">
        <div class="form-group row has-feedback">
          <label class="col-md-3 control-label">NIM</label>
          <div class="col-md-9">
            <input type="text" class="form-control" placeholder="Masukkan Nim" name="nim">
            <?= form_error('nim', ' <small class="text-danger pl-2">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row has-feedback">
          <label class="col-md-3 control-label">Nama lengkap</label>
          <div class="col-md-9">
            <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama">
            <?= form_error('nama', ' <small class="text-danger pl-2">', '</small>'); ?>
          </div>          
        </div>
        <div class="form-group row" id="prodi">
          <label for="prodi"  class="col-md-3 control-label">Prodi</label>
          <div class="col-md-8">
            <select name="prodi" class="form-control select2">
            <?php
            foreach ($dataProdi as $prodi) {
              ?>
              <option value="<?= $prodi['id_prodi'] ?>">
                <?= $prodi['prodi']; ?>
              </option>
              <?php
            }
            ?>
          </select>
          </div>
        </div>
        <div class="form-group row has-feedback">
          <label  class="col-md-3 control-label">Angkatan</label>
          <div class="col-md-4">
          <select name="angkatan" class="form-control select2" >
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
        <div class="form-group row has-feedback">
          <label  class="col-md-3 control-label">No Telp</label>
          <div class="col-md-8">
            <input type="text" name="no_tlp" class="form-control" placeholder="No Telepon">
            <?= form_error('no_tlp', ' <small class="text-danger pl-2">', '</small>'); ?>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-8">
            <h6 class="center">Sudah punya akun, Silahkan <u><a href="<?= base_url('Home/login') ?>">Login!</a></u></h6>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit"  class="btn btn-primary btn-block btn-flat">Daftar</button>
          </div>
        </div>
        </form>
    </div><!-- tutup mahasiswa  -->
    <div class="active tab-pane" id="dosen">
      <form method="post" action="<?= base_url('home/registerdos'); ?>">
        <div class="form-group row has-feedback">
          <label class="col-md-3 control-label">NIP</label>
          <div class="col-md-9">
            <input type="text" class="form-control" placeholder="NIP lengkap tidak ada spasi" name="nip">
          </div>
        </div>
        <div class="form-group row has-feedback">
          <label class="col-md-3 control-label">Nama lengkap</label>
          <div class="col-md-9">
            <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama_dosen">
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
        <div class="form-group row has-feedback">
          <label  class="col-md-3 control-label">No Telp</label>
          <div class="col-md-8">
            <input type="text" name="no_tlp" class="form-control" placeholder="No Telepon">
          </div>
        </div>
        <div class="row">
          <div class="col-xs-8"><h6 class="center">Sudah punya akun, Silahkan <u><a href="<?= base_url('Home/login') ?>">Login!</a></u></h6></div>
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Daftar</button>
          </div>
        </div>
        </form>
    </div><!-- tutup dosen  -->
  </div><!-- tutup content -->
      <div class="msg" style="display:none;">
        <?= @$this->session->flashdata('msg'); ?>
      </div>
        <!-- /.col -->
      </div>
    

    

   
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 2.2.3 -->
<script src="<?= base_url('assets/anggota/'); ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?= base_url('assets/anggota/'); ?>bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/anggota/'); ?>fastclick/fastclick.js"></script>
<!-- iCheck -->
<script src="<?= base_url('assets/anggota/'); ?>plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
  $('#dosen').hide();
  // function mahasiswa() {
  //   $('#dosen').hide();
  // }
  // function dosen() {
  //   $('#mahasiswa').hide();$('#dosen').show();
  // } 
//   <?php
//       if ($this->session->flashdata('msg') != '') {
//         echo "effect_msg();";
//       }
//     ?>
//    function simpan()
// {
//     var url= "<?= site_url('admin/Home/regismaha')?>"; 
//     var formData = new FormData($('#form-mahasiswa')[0]);
//     $.ajax({
//         url : url,
//         type: "POST",
//         data: formData,
//         contentType: false,
//         processData: false,
//         dataType: "JSON",
//         success: function(data)
//         {

//             if(data.status) //jika berhasil
//             {
//                 $('.form-msg').html(data.msg);
//                 effect_msg_form();
//             }
//             else
//             {
//                 // $('#preview').remove();
//                 $('#dosen').modal('hide');
//                 $('.msg').html(data.msg);
//                    effect_msg();
//                 reload_table();
//             }
//         },
//         error: function (jqXHR, textStatus, errorThrown)
//         {
//             alert('gagal');
//         }
//     });
// }
</script>
</body>
</html>
