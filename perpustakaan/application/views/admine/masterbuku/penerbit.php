<div class="msg" style="display:none;">
  <?= @$this->session->flashdata('msg'); ?>
</div>

<div class="box box-solid box-danger">
  <div class="box-header with-border">
    <h3 class="box-title"><i class="fa fa-book"></i> Daftar Penerbit</h3>
    <div class="box-tools pull-right">
    
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="row">
    <div class="col-md-6" style="padding-bottom:9 ;">
        <button class="form-control btn btn-primary" onclick="penerbit_tambah()"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
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
          <th>Nama Penerbit</th>
          <th>Alamat</th>
           <th style="text-align: center;">Pilihan</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>
  <div class="box-footer">
    Menampilkan daftar Penerbit, mengedit dan menghapus klik tombol pada kolom pilihan.<br>
    <b>F7</b> = Tambah data.
  </div><!-- box-footer -->
</div>
<?= $modal_penerbit; ?>
<?php show_my_confirm('konfirmasiHapus', 'hapus-dataPenerbit', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<script>
  var dataTable;
$(document).ready(function() {
    dataTable = $('#table').DataTable( {
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
          "targets": 'no-sort',
          "orderable": false,
        },
        { 
          "targets": [ -1 ],
          "orderable": false, 
        },
          ],
      "sPaginationType": "simple_numbers", 
      "iDisplayLength": 10,
      "aLengthMenu": [[10, 20, 50, 100, 150], [10, 20, 50, 100, 150]],
      "ajax":{
        url :"<?= base_url('admin/masterbuku/penerbit_list'); ?>",
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

  });
 
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
      dataTable.ajax.reload(null,false); //refresh table
  }

  function penerbit_tambah()
  {
      save_method = 'tambahPenerbit';
      $('#form-penerbit')[0].reset(); 
      $('#penerbit').modal('show');
      $('.form-msg').html('');
      $('.modal-title').text('Tambah Penerbit Baru'); 
  }

  function simpan()
{
    var url;

    if(save_method == 'tambahPenerbit') {
        url = "<?= site_url('admin/masterbuku/penerbit_tambah')?>";
    } else {
        url = "<?= site_url('admin/masterbuku/penerbit_proses_ubah')?>";
    }

    // ajax adding data to database

    var formData = new FormData($('#form-penerbit')[0]);
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
                $('#penerbit').modal('hide');
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

function penerbit_ubah(id_penerbit)
{
    save_method = 'ubahPenerbit';
    $('#form-penerbit')[0].reset();
    $('#penerbit').modal('show'); 
    $('.form-msg').html('');
    $('.modal-title').text('Ubah Data Penerbit');


    //Ajax Load data from ajax
    $.ajax({
        url : "<?= site_url('admin/masterbuku/penerbit_ubah')?>/" + id_penerbit,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id_penerbit"]').val(data.id_penerbit);
            $('[name="nama_penerbit"]').val(data.nama_penerbit);
            $('[name="alamat"]').val(data.alamat);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('gagal menampilkan data');
        }
    });
}

var id_penerbit;
  $(document).on("click", ".konfirmasiHapus-penerbit", function() {
    id_penerbit = $(this).attr("data-id");
  })
  $(document).on("click", ".hapus-dataPenerbit", function() {
    var id = id_penerbit;
    
    $.ajax({
      method: "POST",
      url: "<?= base_url('admin/masterbuku/penerbit_hapus'); ?>",
      data: "id_penerbit=" +id
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
            penerbit_tambah();
            return false;
        }
});
</script>