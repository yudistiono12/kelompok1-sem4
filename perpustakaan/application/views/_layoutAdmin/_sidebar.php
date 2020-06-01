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
      <li class="header">LIST MENU</li>
      <!-- Optionally, you can add icons to the links -->

      <li <?php if ($page == 'dashboard') {echo 'class="active"';} ?>>
        <a href="<?= base_url('admin/Dashboard'); ?>">
          <i class="fa fa-home"></i>
          <span>Dashboard</span>
        </a>
      </li>
      
      <li <?php if ($page == 'master') {echo 'class="treeview active"';} ?>>
        <a>
          <i class="fa fa-book"></i>
          <span>Koleksi Buku</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li <?php if ($pagae == 'literasi') {echo 'class="active"';} ?>>
            <a href="<?= base_url('admin/master/literasi'); ?>">
              <i class="fa fa-circle-o"></i>Buku Literasi Umum
            </a>
          </li>
          <li <?php if ($pagae == 'mapel') {echo 'class="active"';} ?>>
            <a href="<?= base_url('admin/master/mapel'); ?>">
              <i class="fa fa-circle-o"></i>Buku Mapel Kelas
            </a>
          </li>
          <li <?php if ($pagae == 'tahunan') {echo 'class="active"';} ?>>
            <a href="<?= base_url('admin/master/tahunan'); ?>"><i class="fa fa-circle-o"></i>Buku Tahunan Siswa
            </a>
          </li>
        </ul>
      </li>

      <li <?php if ($page == 'peminjaman') {echo 'class="treeview active"';} ?>>
        <a>
          <i class="fa fa-briefcase"></i>
          <span>Peminjaman</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li <?php if ($pagae == 'pem-literasi') {echo 'class="active"';} ?>>
            <a href="<?= base_url('admin/peminjaman/literasi'); ?>">
              <i class="fa fa-circle-o"></i>Buku Literasi Umum
            </a>
          </li>
          <li <?php if ($pagae == 'pem-mapel') {echo 'class="active"';} ?>>
            <a href="<?= base_url('admin/peminjaman/mapel'); ?>">
              <i class="fa fa-circle-o"></i>Buku Mapel Kelas
            </a>
          </li>
          <li <?php if ($pagae == 'pem-tahunan') {echo 'class="active"';} ?>>
            <a href="<?= base_url('admin/peminjaman/tahunan'); ?>"><i class="fa fa-circle-o"></i>Buku Tahunan Siswa
            </a>
          </li>
        </ul>
      </li>
      
      <li <?php if ($page == 'pengembalian') {echo 'class="treeview active"';} ?>>
        <a>
          <i class="fa fa-location-arrow"></i>
          <span>Pengembalian</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li <?php if ($pagae == 'pen-literasi') {echo 'class="active"';} ?>>
            <a href="<?= base_url('admin/pengembalian/literasi'); ?>">
              <i class="fa fa-circle-o"></i>Buku Literasi Umum
            </a>
          </li>
          <li <?php if ($pagae == 'pen-mapel') {echo 'class="active"';} ?>>
            <a href="<?= base_url('admin/pengembalian/mapel'); ?>">
              <i class="fa fa-circle-o"></i>Buku Mapel Kelas
            </a>
          </li>
          <li <?php if ($pagae == 'pen-tahunan') {echo 'class="active"';} ?>>
            <a href="<?= base_url('admin/pengembalian/tahunan'); ?>"><i class="fa fa-circle-o"></i>Buku Tahunan Siswa
            </a>
          </li>
        </ul>
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