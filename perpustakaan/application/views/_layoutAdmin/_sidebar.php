<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?= base_url(); ?>assets/admin/img/pustakawan/ibu.jpg" class="img-circle" alt="User Image"> 
        <!-- gambar ambil dari session -->
      </div>
      <div class="pull-left info">
        <p>nama pustakawan dari session</p>
        <!-- Status -->
        <a href="<?= base_url(); ?>assets/#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">Master Data</li>
      <li <?php if ($page == 'masteranggota') {echo 'class="treeview active"';} ?>>
        <a>
          <i class="fa fa-users"></i>
          <span>Master Anggota</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li <?php if ($pagae == 'datamahasiswa') {echo 'class="active"';} ?>>
            <a href="<?= base_url('admin/masteranggota/datamahasiswa'); ?>">
              <i class="fa fa-user"></i>Data Mahasiswa
            </a>
          </li>
          <li <?php if ($pagae == 'datadosen') {echo 'class="active"';} ?>>
            <a href="<?= base_url('admin/masteranggota/datadosen'); ?>">
              <i class="fa fa-user"></i>Data Dosen
            </a>
          </li>
          <li <?php if ($pagae == 'dataprodi') {echo 'class="active"';} ?>>
            <a href="<?= base_url('admin/masteranggota/dataprodi'); ?>">
              <i class="fa fa-moon-o"></i>Data prodi
            </a>
          </li>
        </ul>
      </li>

      <li <?php if ($page == 'masterbuku') {echo 'class="treeview active"';} ?>>
        <a>
          <i class="fa fa-book"></i>
          <span>Master Buku</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li <?php if ($pagae == 'databuku') {echo 'class="active"';} ?>>
            <a href="<?= base_url('admin/masterbuku/databuku'); ?>">
              <i class="fa fa-book"></i>Data Buku
            </a>
          </li>
          <li <?php if ($pagae == 'datakategori') {echo 'class="active"';} ?>>
            <a href="<?= base_url('admin/masterbuku/datakategori'); ?>">
              <i class="fa fa-tags"></i>Data kategori
            </a>
          </li>
          <li <?php if ($pagae == 'datapenerbit') {echo 'class="active"';} ?>>
            <a href="<?= base_url('admin/masterbuku/datapenerbit'); ?>">
              <i class="fa fa-user-secret"></i>Data Penerbit
            </a>
          </li>
          <li <?php if ($pagae == 'datapengarang') {echo 'class="active"';} ?>>
            <a href="<?= base_url('admin/masterbuku/datapengarang'); ?>">
              <i class="fa fa-pencil-square-o"></i>Data Pengarang
            </a>
          </li>
        </ul>
      </li>

      <li class="header">Transaksi</li>
      <li <?php if ($page == 'peminjaman') {echo 'class="active"';} ?>>
        <a href="<?= base_url('admin/peminjaman'); ?>">
          <i class="fa fa-briefcase"></i>
          <span>Peminjaman</span>
        </a>
      </li>
      <li <?php if ($page == 'pengembalian') {echo 'class="active"';} ?>>
        <a href="<?= base_url('admin/pengembalian'); ?>">
          <i class="fa fa-location-arrow"></i>
          <span>Pengembalian</span>
        </a>
      </li>
            
      <li <?php if ($page == 'laporan') {echo 'class="treeview active"';} ?>>
        <a>
          <i class="fa fa-location-arrow"></i>
          <span>Laporan</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li <?php if ($pagae == 'pen-literasi') {echo 'class="active"';} ?>>
            <a href="<?= base_url('admin/pengembalian/literasi'); ?>">
              <i class="fa fa-circle-o"></i>Pengunjung
            </a>
          </li>
          <li <?php if ($pagae == 'pen-mapel') {echo 'class="active"';} ?>>
            <a href="<?= base_url('admin/pengembalian/mapel'); ?>">
              <i class="fa fa-circle-o"></i>peminjaman
            </a>
          </li>
          <li <?php if ($pagae == 'pen-tahunan') {echo 'class="active"';} ?>>
            <a href="<?= base_url('admin/pengembalian/tahunan'); ?>"><i class="fa fa-circle-o"></i>pengembalian
            </a>
          </li>
          <li <?php if ($pagae == 'pen-tahunan') {echo 'class="active"';} ?>>
            <a href="<?= base_url('admin/pengembalian/tahunan'); ?>"><i class="fa fa-circle-o"></i>Buku favorit
            </a>
        </ul>
      </li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>