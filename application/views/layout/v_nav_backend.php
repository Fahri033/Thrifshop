<!-- Tampilan Menu Samping Kiri - ADMIN -->
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url() ?>template/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <!-- Menampilkan nama user yang login -->
        <div class="info">
          <a href="#" class="d-block">Admin <?= $this->session->userdata('nama_user')?></a>
        </div>
      </div>

      <!-- Menu-menu samping kiri -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <!-- Memanggil ('admin') Controller -->
          <li class="nav-item">
            <a href="<?= base_url('admin') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'admin' and $this->uri->segment(2) == "") { echo "active"; }?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <!-- Memanggil ('kategori') Controller -->
          <li class="nav-item">
            <a href="<?= base_url('kategori') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'kategori') { echo "active"; }?>">
              <i class="nav-icon fas fa-list"></i>
              <p>Kategori</p>
            </a>
          </li>
          
          <!-- Memanggil ('barang') Controller -->
           <li class="nav-item">
            <a href="<?= base_url('barang') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'barang') { echo "active"; }?>">
              <i class="nav-icon fas fa-cubes"></i>
              <p>Barang</p>
            </a>
          </li>

          <!-- Memanggil ('barang') Controller -->
           <li class="nav-item">
            <a href="<?= base_url('gambarbarang') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'gambarbarang') { echo "active"; }?>">
              <i class="nav-icon fas fa-image"></i>
              <p>Gambar Barang</p>
            </a>
          </li>

          <!-- Memanggil ('Admin') Controller -->
          <li class="nav-item">
            <a href="<?= base_url('admin/pesanan_masuk') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'pesanan_masuk' and $this->uri->segment(1) == 'admin') { echo "active"; }?>">
              <i class="nav-icon fas fa-download"></i>
              <p>Pesanan Masuk</p>
            </a>
          </li>

          <!-- Memanggil ('Admin') Controller -->
          <li class="nav-item">
            <a href="<?= base_url('admin/rincian_pesanan_masuk') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'rincian_pesanan_masuk' and $this->uri->segment(1) == 'admin') { echo "active"; }?>">
              <i class="nav-icon fas fa-download"></i>
              <p>rincian pesanan masuk</p>
            </a>
          </li>

           <!-- Memanggil ('laporan') Controller -->
          <li class="nav-item">
            <a href="<?= base_url('laporan') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'laporan') { echo "active"; }?>">
              <i class="nav-icon fas fa-file"></i>
              <p>Laporan</p>
            </a>
          </li>

          <!-- Memanggil ('admin/setting') Controller -->
          <li class="nav-item">
            <a href="<?= base_url('admin/setting') ?>" class="nav-link  <?php if ($this->uri->segment(2) == 'setting' and $this->uri->segment(1) == 'admin') { echo "active"; }?>">
              <i class="nav-icon fas fa-asterisk"></i>
              <p>Setting</p>
            </a>
          </li>

          <!-- Memanggil ('user') Controller -->
          <li class="nav-item"> 
            <a href="<?= base_url('user') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'user') { echo "active"; }?>">
              <i class="nav-icon fas fa-user"></i>
              <p>Data User</p>
            </a>
          </li>

          <!-- Memanggil ('pelanggan') Controller -->
          <li class="nav-item"> 
            <a href="<?= base_url('datapelanggan') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'datapelanggan') { echo "active"; }?>">
              <i class="nav-icon fas fa-users"></i>
              <p>Data Pelanggan</p>
            </a>
          </li>

          <!-- Memanggil ('auth') Controller -->
          <li class="nav-item">
            <a href="<?= base_url('auth/logout_user') ?>" class="nav-link">
              <i class="nav-icon fas fa-sign"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav> <!-- /.sidebar-menu -->
    </div> <!-- /.sidebar -->
  </aside>

<!-- Tampilan Text Kanan Atas Web Admin -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?= $title ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Bankndut Second</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div> <!-- /.content-header -->

    <div class="content">
      <div class="container-fluid">
        <div class="row">