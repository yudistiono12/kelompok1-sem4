<div class="msg" style="display:none;">
  <?= @$this->session->flashdata('msg'); ?>
</div>

<div class="box box-solid box-danger">
  <div class="box-header with-border">
    <h3 class="box-title"><i class="fa fa-book"></i> Daftar Prodi</h3>
    <div class="box-tools pull-right">
    
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="row">
      <div class="col-md-6" style="padding-bottom:9 ;">
          <button class="form-control btn btn-primary" onclick="prodi_tambah()"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
      </div>
    </div>
    <div class="form-group"></div>
    <table id="table" cellspacing="0" width="100%" class="table table-hover table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Prodi</th>
          <th>Jurusan</th>
           <th style="text-align: center;">Pilihan</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>
  <div class="box-footer">
    Menampilkan daftar Prodi, mengedit dan menghapus klik tombol pada kolom pilihan.<br>
    <b>F7</b> = Tambah data.
  </div><!-- box-footer -->
</div>
<?= $modal_prodi; ?>
<?php show_my_confirm2('konfirmasiHapus', 'hapus-dataProdi', 'Mahasiswa', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
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
        url :"<?= base_url('admin/masteranggota/prodi_list'); ?>",
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

  function prodi_tambah()
  {
      save_method = 'tambahProdi';
      $('#form-prodi')[0].reset(); 
      $('#prodi').modal('show');
      $('.form-msg').html('');
      $('.modal-title').text('Tambah prodi Baru'); 
  }

  function simpan()
{
    var url;

    if(save_method == 'tambahProdi') {
        url = "<?= site_url('admin/masteranggota/prodi_tambah')?>";
    } else {
        url = "<?= site_url('admin/masteranggota/prodi_proses_ubah')?>";
    }

    // ajax adding data to database

    var formData = new FormData($('#form-prodi')[0]);
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
                $('#prodi').modal('hide');
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

function prodi_ubah(id_prodi)
{
    save_method = 'ubahProdi';
    $('#form-prodi')[0].reset();
    $('#prodi').modal('show'); 
    $('.form-msg').html('');
    $('.modal-title').text('Ubah Data Prodi');


    //Ajax Load data from ajax
    $.ajax({
        url : "<?= site_url('admin/masteranggota/prodi_ubah')?>/" + id_prodi,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id_prodi"]').val(data.id_prodi);
            $('[name="prodi"]').val(data.prodi);
            $('[name="jurusan"]').val(data.jurusan);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('gagal menampilkan data');
        }
    });
}

var id_prodi;
  $(document).on("click", ".konfirmasiHapus-prodi", function() {
    id_prodi = $(this).attr("data-id");
  })
  $(document).on("click", ".hapus-dataProdi", function() {
    var id = id_prodi;
    
    $.ajax({
      method: "POST",
      url: "<?= base_url('admin/masteranggota/prodi_hapus'); ?>",
      data: "id_prodi=" +id
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
            prodi_tambah();
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