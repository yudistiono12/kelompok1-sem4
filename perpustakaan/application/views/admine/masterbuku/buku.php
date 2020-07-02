<div class="msg" style="display:none;">
  <?= @$this->session->flashdata('msg'); ?>
</div>

<div class="box box-solid box-danger">
  <div class="box-header with-border">
    <h3 class="box-title"><i class="fa fa-book"></i> Daftar Buku</h3>
    <div class="box-tools pull-right">
    
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="row">
      <div class="col-md-6" style="padding-bottom:9 ;">
          <button class="form-control btn btn-primary" onclick="buku_tambah()"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
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
          <th class="center"><b>+</b></i></th>
          <th>judul</th>
          <th>Id buku</th>
          <th>ISBN</th>
          <th>Kategori</th>
          <th>Penerbit</th>
          <th>Pengarang</th>
          <th>Stok Tersedia</th>
          <th>Stok Dipinjam</th>
          <th>Tahun Terbit</th>
          <th>Exemplar</th>
          <th>Foto</th>
          <th style="text-align: center;">Pilihan</th>
        </tr>
      </thead>
      <tbody>
<?php
  $no = 1;
    foreach($data_buku->result_array() as $buku)
    {
    ?>
            <tr>
                <td><?= $no++ ;?></td>
                <td class="details-control"><i class="btn btn-box-tool" data-toggle="tooltip" title="Tampilkan Detail"><i class="glyphicon glyphicon-plus"></i></i>
                </td>
                <td><?= $buku['judul'];?></td>
                <td><?= $buku['id_buku'];?></td>
                <td><?= $buku['ISBN'];?></td>
                <td><?php $kategori=$buku['id_kategori'];
                    foreach ($data_kategori ->result_array()  as $ktg) {
                      if($ktg['id_kategori']==$kategori){
                          echo $ktg['nama_kategori'];
                      }
                    }?></td>
                <td><?php $penerbit=$buku['id_penerbit'];
                    foreach ($data_penerbit ->result_array()  as $pnb) {
                      if($pnb['id_penerbit']==$penerbit){
                          echo $pnb['nama_penerbit'];
                      }
                    }?></td>
                <td><?php $pengarang=$buku['id_pengarang'];
                    foreach ($data_pengarang->result_array()  as $png) {
                      if($png['id_pengarang']==$pengarang){
                          echo $png['nama_pengarang'];
                      }
                    }?></td>
                <td><?php $model->countRow(1,$buku['id_buku']);?></td>
                <td><?php $hola= $model->countRow(0,$buku['id_buku']);?></td>
                <td><?= $buku['tahun_terbit'];?></td>
                <td><?= $buku['exp'];?></td>
                <td class="text-left"><a href="<?= base_url('upload/buku/') ?><?= $buku['foto']?>" target="_blank"><center><img src="<?= base_url('upload/buku/')?><?= $buku['foto']  ?>" class="img-responsive" style="height:180px; width:160px"/></center></a></td>
                <td>
                <?= 
                    '<div class="btn-group">
                    <a href="'.base_url().'petugas/Buku/detail_stok/?id_buku='.$buku['id_buku'].'" class="btn btn-info btn-xs" role="button" data-toggle="tooltip" title="Detail Stok"><i class="fa fa-list"></i></a>
                    </div>
                     <a class="btn btn-xs btn-warning" href="javascript:void(0)" title="Ubah" onclick="buku_ubah('."'".$buku['id_buku']."'".')"><i class="fa fa-edit"></i></a>
                   <button class="btn btn-danger btn-xs konfirmasiHapus-buku" data-id="'.$buku['id_buku'].'" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-trash"></i></button>
                </td>
            </tr>';?>
<?php
    }
  ?>            
      </tbody>
    </table>
  </div>
  <div class="box-footer">
    Menampilkan daftar Buku, mengedit dan menghapus klik tombol pada kolom pilihan.<br>
    <b>F7</b> = Tambah data.
  </div><!-- box-footer -->
</div>
<?= $modal_buku; ?>
<?php show_my_confirm2('konfirmasiHapus', 'hapus-dataBuku', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<script>
$(document).ready(function() {
     $('#table').DataTable( {
        "columnDefs": [
            {
                "targets": [ 3 ],
                "visible": false,
            },
            {
                "targets": [ 4 ],
                "visible": false,
            },
            {
                "targets": [ -4 ],
                "visible": false
            },
            {
                "targets": [ -3 ],
                "visible": false
            },
            {
                "targets": [ -2 ],
                "visible": false
            },
            { 
              "targets": [ 1 ],
              "orderable": false, 
            },
            { 
              "targets": [ -1 ],
              "orderable": false, 
            },
        ]
    } );

       var table = $('#table').DataTable();
      $('#table tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
 
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( format_buku(row.data()) ).show();
            tr.addClass('shown');
        }
    } );
  } );
function format_buku ( d ) {
    // `d` is the original data object for the row
    return '<div class="box box-info">'+
  '<div class="box-header with-border">'+
    '<h3 class="box-title">Detail Buku</h3>'+
  '</div>'+
  '<div class="box-body no-padding">'+
  '<table class="table table-striped">'+
                '<tr>'+
                  '<td>ID Buku</td>'+
                  '<td>'+d[3]+'</td>'+
                '</tr>'+
                 '<tr>'+
                  '<td>ISBN</td>'+
                  '<td>'+d[4]+'</td>'+
                '</tr>'+
                 '<tr>'+
                  '<td>Judul Buku</td>'+
                  '<td>'+d[2]+'</td>'+
                '</tr>'+
                 '<tr>'+
                  '<td>Kategori</td>'+
                  '<td>'+d[5]+'</td>'+
                '</tr>'+
                 '<tr>'+
                  '<td>Penerbit</td>'+
                  '<td>'+d[6]+'</td>'+
                '</tr>'+
                 '<tr>'+
                  '<td>Pengarang</td>'+
                  '<td>'+d[7]+'</td>'+
                '</tr>'+
                 '<tr>'+
                  '<td>Tahun Terbit</td>'+
                  '<td>'+d[10]+'</td>'+
                '</tr>'+
                 '<tr>'+
                  '<td>Total Stok</td>'+
                  '<td>'+d[11]+'</td>'+
                '</tr>'+
                '</tr>'+
                 '<tr>'+
                  '<td>foto</td>'+
                  '<td>'+d[12]+'</td>'+
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
    function buku_tambah()
    {
      save_method = 'tambahBuku';
      $('#form-buku')[0].reset(); 
      $('#foto-preview').hide(); //menyembunyikan foto sebelumnya
      $('#buku').modal('show');
      $('.form-msg').html('');
      $('.modal-title').text('Tambah Buku Baru'); 
    }
    function simpan()
{
    var url;

    if(save_method == 'tambahBuku') {
        url = "<?= site_url('admin/masterbuku/buku_tambah')?>";
    } else {
        url = "<?= site_url('admin/masterbuku/buku_proses_ubah')?>";
    }

    // ajax adding data to database

    var formData = new FormData($('#form-buku')[0]);
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
                $('#buku').modal('hide');
                $('.msg').html(data.msg);
                effect_msg();
                  
              setTimeout(function() { location.reload(); }, 4500);
                
                // reload_table();
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('gagal');
        }
    });
}

function buku_ubah(id_buku)
{
    save_method = 'ubahBuku';
    $('#form-buku')[0].reset();
    $('#buku').modal('show'); 
    $('.form-msg').html('');
     // $('#preview').html('');
    $('#foto-preview').show(); //mengeluarkan foto sebelumny
    $('.modal-title').text('Ubah Data Buku');

    //Ajax Load data from ajax
    $.ajax({
        url : "<?= site_url('admin/masterbuku/buku_ubah')?>/" + id_buku,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id_buku"]').val(data.id_buku);
            $('[name="isbn"]').val(data.ISBN);
            $('[name="judul"]').val(data.judul);
            $('[name="kategori"]').val(data.id_kategori);
            $('[name="prodi"]').val(data.id_prodi);
            $('[name="pengarang"]').val(data.id_pengarang);
            $('[name="id_penerbit"]').val(data.id_id_penerbit );
            $('[name="asal_buku"]').val(data.asal_buku);
             $('[name="edisi"]').val(data.edisi);
            $('[name="foto_lama"]').val(data.foto);
            // $('#foto-preview').show(); // show photo preview modal

            if(data.foto)
            {
                $('#label-foto').text('Ubah foto'); // label foto upload
                $('#foto-preview div').html('<img src="<?= base_url()?>upload/buku/'+data.foto+'" class="img-responsive">'); // show photo
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

var id_buku;
  $(document).on("click", ".konfirmasiHapus-buku", function() {
    id_buku = $(this).attr("data-id");
  })
  $(document).on("click", ".hapus-dataBuku", function() {
    var id = id_buku;
    
    $.ajax({
      method: "POST",
      url: "<?= base_url('admin/masterbuku/buku_hapus'); ?>",
      data: "id_buku=" +id
    })
    .done(function(data) {
      $('#konfirmasiHapus').modal('hide');
      $('.msg').html(data);
      effect_msg();
      setTimeout(function() { location.reload(); }, 4500);
    })
  })

$(document).on('keydown', 'body', function(e){
        var charCode = ( e.which ) ? e.which : event.keyCode;

        if(charCode == 118) //F7
        {
            buku_tambah();
            return false;
        }
});   
</script>