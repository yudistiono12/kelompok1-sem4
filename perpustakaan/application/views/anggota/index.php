<?php echo "ini halaman AGGOTA"; ?>
<!DOCTYPE html>
<html>

<head>
     <meta charset="utf-8">
     <title>:Proses Pengembalian</title>
</head>

<body>

     <h2>Manajemen Proses Pengembalian</h2>
     <form action="proses_pengembalian.php" method="post">
          <input type="hidden" name="id_pijam_kembali" value="<?php echo $id ?>">
          <input type="hidden" name="tgl_pinjam" value="<?php echo $res['tgl_pinjam'] ?>">
          <input type="hidden" name="id_anggota" value="<?php echo $res['id_anggota'] ?>">
          <table>
               <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td> <input type="text" name="nama" readonly value="<?php echo $res['nama'] ?>"> </td>
               </tr>
               <tr>
                    <td>Kode Buku</td>
                    <td>:</td>
                    <td> <input type="text" name="kode_buku" readonly value="<?php echo $res['kode_buku'] ?>"> </td>
               </tr>
               <tr>
                    <td>Keterangan Buku</td>
                    <td>:</td>
                    <td>
                         <select name="keterangan_buku">
                              <option value="Tidak Ada">Tidak ada</option>
                              <option value="Rusak">Rusak</option>
                              <option value="Hilang">Hilang</option>
                         </select>
                    </td>
               </tr>
               <tr>
                    <td></td>
                    <td></td>
                    <td>
                         <input type="submit" name="" value="KIRIM">
                         <input type="reset" name="" value="RESET">
                    </td>
               </tr>
          </table>
     </form>

</body>

</html>