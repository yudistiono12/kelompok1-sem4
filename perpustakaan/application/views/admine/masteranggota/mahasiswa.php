<div class="msg" style="display:none;">
  <?= @$this->session->flashdata('msg'); ?>
</div>

<div class="box box-solid box-danger">
  <div class="box-header with-border">
    <h3 class="box-title"><i class="fa fa-book"></i> Daftar Mahasiswa</h3>
    <div class="box-tools pull-right">
    
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="row">
      <div class="col-md-6" style="padding-bottom:9 ;">
          <button class="form-control btn btn-primary" onclick="mahasiswa_tambah()"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
      </div>
    
    <div class="col-md-3">
        <a href="<?= base_url('penerbit/export'); ?>" class="form-control btn btn-default"><i class="glyphicon glyphicon glyphicon-floppy-save"></i> Export Data Excel</a>
    </div>
    <div class="col-md-3">
        <button class="form-control btn btn-default" data-toggle="modal" data-target="#import-penerbit"><i class="glyphicon glyphicon glyphicon-floppy-open"></i> Import Data Excel</button>
    </div>
    </div>
    <div class="form-group"></div>
    <table id="table" cellspacing="0" width="100%" class="table table-hover table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th class="center"><i class="glyphicon glyphicon-plus"></i></th>
          <th>Nim</th>
          <th>username</th>
          <th>password</th>
          <th>Nama Mahasiswa</th>
          <th>Angkatan</th>
          <th>Prodi</th>
          <th>No Telp</th>
          <th>Foto</th>
          <th style="text-align: center;">Pilihan</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>
  <div class="box-footer">
    Menampilkan daftar Mahasiswa, mengedit dan menghapus klik tombol pada kolom pilihan.<br>
    <b>F7</b> = Tambah data.
  </div><!-- box-footer -->
</div>
<?= $modal_mahasiswa; ?>
<?php show_my_confirm('konfirmasiHapus', 'hapus-dataMahasiswa', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<script>
  var tablenya;
$(document).ready(function() {
    tablenya = $('#table').DataTable( {
      "serverSide": true,
      "stateSave" : false,
      "bAutoWidth": true,
      "oLanguage": {
        "sSearch": "<i class='fa fa-search fa-fw'></i> Pencarian : ",
        "sLengthMenu": "_MENU_ &nbsp;&nbsp;Data Per Halaman ",
        "sInfo": "Menampilkan _START_ s/d _END_ dari <b>_TOTAL_ data</b>",
        "sInfoFiltered": "(difilter dari _MAX_ total data)", 
        "sZeroRecords": "Pencarian tidak ditemukan", 
        "sEmptyTable": "Data kosong", 
        "sLoadingRecords": "Harap Tunggu...", 
        "oPaginate": {
          "sPrevious": "Sebelumnya",
          "sNext": "Selanjutnya"
        }
      },
      "aaSorting": [[ 0, "desc" ]],
      "columnDefs": [ 
        {
            "targets": [3],
            "visible": false,
        },
        {
            "targets": [4],
            "visible": false,
        },
        {
            "targets": [-2],
            "visible": false,
        },
        {
            "targets": [-3],
            "visible": false,
        },
        { 
          "targets": [ -1 ],
          "orderable": false, 
        },
        { 
          "targets": [ 1 ],
          "orderable": false, 
        }
          ],
      "sPaginationType": "simple_numbers", 
      "iDisplayLength": 10,
      "aLengthMenu": [[10, 20, 50, 100, 150], [10, 20, 50, 100, 150]],
      "ajax":{
        url :"<?= base_url('admin/masteranggota/mahasiswa_list'); ?>",
        type: "post",
        error: function(){ 
          $(".my-grid-error").html("");
          $("#my-grid").append('<tbody class="my-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
          $("#my-grid_processing").css("display","none");
        }
      }
      <?php
      if ($this->session->flashdata('msg') != '') {
        echo "effect_msg();";
      }
    ?>
    } );

     var tablee = $('#table').DataTable();
     // $('#table tbody').on('click', 'td.details-control', function () {
      $('.details-control').on("click", function(){
        var tr = $(this).closest('tr');
        var row = tablenya.row( tr );
 
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( format_mahasiswa(row.data()) ).show();
            tr.addClass('shown');
        }
  } );

  });

  function format_mahasiswa (d) {
        // `d` is the original data object for the row
        return '<div class="box box-info">'+
      '<div class="box-header with-border">'+
        '<h3 class="box-title">Detail Mahasiswa</h3>'+
      '</div>'+
      '<div class="box-body no-padding">'+
      '<table class="table table-striped">'+
                    '<tr>'+
                      '<td>NIM</td>'+
                      '<td>'+d[2]+'</td>'+
                    '</tr>'+
                     '<tr>'+
                      '<td>Nama</td>'+
                      '<td>'+d[5]+'</td>'+
                    '</tr>'+
                     '<tr>'+
                      '<td>Prodi</td>'+
                      '<td>'+d[7]+'</td>'+
                    '</tr>'+
                     '<tr>'+
                      '<td>Angkatan</td>'+
                      '<td>'+d[6]+'</td>'+
                    '</tr>'+
                     '<tr>'+
                      '<td>No Telp</td>'+
                      '<td>'+d[-2]+'</td>'+
                    '</tr>'+
                     '<tr>'+
                      '<td>Username</td>'+
                      '<td>'+d[3]+'</td>'+
                    '</tr>'+
                     '<tr>'+
                      '<td>Password</td>'+
                      '<td>'+d[4]+'</td>'+
                    '</tr>'+
                     '<tr>'+
                      '<td>Foto</td>'+
                      '<td>'+d[-2]+'</td>'+
                    '</tr>'+
                  '</table>'+
                '</div>'+
      '</div>'+
    '</div>';
    }
 
   function effect_msg_form() {
      // $('.form-msg').hide();
      $('.form-msg').show(1000);
      setTimeout(function() { $('.form-msg').fadeOut(1000); }, 3000);
    }

    function effect_msg() {
      // $('.msg').hide();
      $('.msg').show(1000);
      setTimeout(function() { $('.msg').fadeOut(1000); }, 3000);
    }

  function reload_table()
  {
      tablenya.ajax.reload(null,false); //refresh table
  }

  function mahasiswa_tambah()
  {
      save_method = 'tambahMahasiswa';
      $('#form-mahasiswa')[0].reset(); 
      $('#mahasiswa').modal('show');
      $('.form-msg').html('');
      $('.modal-title').text('Tambah Mahasiswa Baru'); 
      $('#label-foto').text('Upload Foto'); // merubah label
      $('#foto-preview').hide(); //menyembunyikan foto sebelumnya
      $('#prodi').show();$('#angkatan').show();$('#keterangan').show();
  }

  function simpan()
{
    var url;

    if(save_method == 'tambahMahasiswa') {
        url = "<?= site_url('admin/masteranggota/mahasiswa_tambah')?>";
    } else {
        url = "<?= site_url('admin/masteranggota/mahasiswa_proses_ubah')?>";
    }

    // ajax adding data to database

    var formData = new FormData($('#form-mahasiswa')[0]);
    $.ajax({
        url : url,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //jika berhasil
            {
                $('.form-msg').html(data.msg);
                effect_msg_form();
            }
            else
            {
                // $('#preview').remove();
                $('#mahasiswa').modal('hide');
                $('.msg').html(data.msg);
                   effect_msg();
                reload_table();
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('gagal');
        }
    });
}

function mahasiswa_ubah(nim)
{
    save_method = 'ubahMahasiswa';
    $('#form-mahasiswa')[0].reset();
    $('#mahasiswa').modal('show'); 
    $('.form-msg').html('');
     // $('#preview').html('');
    $('#foto-preview').show(); //mengeluarkan foto sebelumny
    $('.modal-title').text('Ubah Data Mahasiswa');

    $('#nim').attr('readonly',true);$('#prodi').hide();$('#angkatan').hide();$('#keterangan').hide();


    //Ajax Load data from ajax
    $.ajax({
        url : "<?= site_url('admin/masteranggota/mahasiswa_ubah')?>/" + nim,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="nim"]').val(data.nim);
            $('[name="nama_mahasiswa"]').val(data.nama);
            $('[name="no_tlp"]').val(data.no_tlp);
             $('[name="prodi"]').val(data.id_prodi);
            $('[name="angkatan"]').val(data.angkatan);
             $('[name="foto_lama"]').val(data.foto);
            // $('#foto-preview').show(); // show photo preview modal

            if(data.foto)
            {
                $('#label-foto').text('Ubah foto'); // label foto upload
                $('#foto-preview div').html('<img src="<?= base_url()?>upload/anggota/'+data.foto+'" class="img-responsive">'); // show photo
                $('#foto-preview div').append('<input type="checkbox" name="remove_photo" value="'+data.foto+'"/> hapus foto ketika disimpan'); // remove photo

            }
            else
            {
                $('#label-foto').text('Upload Photo'); // label photo upload
                $('#foto-preview div').text('(No photo)');
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('gagal menampilkan data');
        }
    });
}

var nim;
  $(document).on("click", ".konfirmasiHapus-mahasiswa", function() {
    nim = $(this).attr("data-id");
  })
  $(document).on("click", ".hapus-dataMahasiswa", function() {
    var id = nim;
    
    $.ajax({
      method: "POST",
      url: "<?= base_url('admin/masteranggota/mahasiswa_hapus'); ?>",
      data: "nim=" +id
    })
    .done(function(data) {
      $('#konfirmasiHapus').modal('hide');
      $('.msg').html(data);
      effect_msg();
      reload_table();
    })
  })

$(document).on('keydown', 'body', function(e){
        var charCode = ( e.which ) ? e.which : event.keyCode;

        if(charCode == 118) //F7
        {
            mahasiswa_tambah();
            return false;
        }
});
// function harusHurufPen(evt){
//         var charCode = (evt.which) ? evt.which : event.keyCode
//       if ((charCode < 65 || charCode > 90)&&(charCode < 97 || charCode > 122 )&&(charCode > 187 || charCode < 189 )&&charCode>32)
//       return false;
//       return true;
//   }
</script>