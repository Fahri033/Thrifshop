<!-- Tampilan Menu Atas Web - PELANGGAN -->

 <!-- Navbar Menu Kiri -->
  <nav class="navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a class="navbar-brand">
       <i class="fas fa-store text-dark"></i> <!-- ikon toko -->
        <span class="brand-text font-weight-dark">TOKO THRIFT</span>
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <!-- Home -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="<?= base_url() ?>"class="nav-link">Home</a>
          </li>

          <!-- Kategori -->
          <?php $kategori = $this->m_home->get_all_data_kategori(); ?>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Kategori</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <?php foreach ($kategori as $key => $value) { ?>
              <li>
                <a href="<?=base_url('home/kategori/'. $value->id_kategori) ?>" class="dropdown-item"><?= $value->nama_kategori ?></a>
              </li>
              <?php } ?>
            </ul>
          </li>
        </ul>
      </div>

      <!-- Navbar Menu Kanan -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Ikon profil pelanggan -->
        <li class="nav-item">
          <!-- tampilan halaman utama pelanggan belum login -->
          <?php if ($this->session->userdata('email') == "") { ?>
            <a class="nav-link" href="<?= base_url('pelanggan/login') ?>">
              <span class="brand-text font-weight-dark">Login</span>
            </a>            
          <?php }else{ ?>

          <!-- navbar pelanggan sesudah login -->
          <a class="nav-link" data-toggle="dropdown" href="#">
            <span class="brand-text font-weight-dark"><?= $this->session->userdata('nama_pelanggan') ?></span>
            <img src="<?= base_url('assets/foto/'. $this->session->userdata('foto')) ?>" class="brand-image img-circle elevation-1" width="30" height="30" style="opacity: .8">
          </a>
           <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <div class="dropdown-divider"></div>
            <a href="<?= base_url('pelanggan/akun') ?>" class="dropdown-item text-center">
              <i class="fas fa-user mr-2"></i> Akun Saya
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?= base_url('pesanan_saya') ?>" class="dropdown-item text-center">
              <i class="fas fa-shopping-cart mr-2"></i> Pesanan Saya
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?= base_url('pelanggan/logout') ?>" class="dropdown-item dropdown-footer">Logout</a>
          </div>
          <?php } ?>
        </li>

        <!-- Menu keranjang -->
        <?php 
        $keranjang = $this->cart->contents();
        $jml_item = 0; 
        foreach ($keranjang as $key => $value) {
          $jml_item = $jml_item + $value['qty'];
        } ?>
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-shopping-cart text-dark"></i>
            <span class="badge badge-danger navbar-badge"><?= $jml_item ?></span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <!-- Tampilan tidak ada barang -->
            <?php if(empty($keranjang)) { ?>
                <a href="#" class="dropdown-item text-center">
                  <p class="fas fa-shopping-cart"> Keranjang Belanja Kosong</p>
                </a>
            <!-- Barang Start -->
            <?php }else {
                foreach ($keranjang as $key => $value) { 
                $barang = $this->m_home->detail_barang($value['id']); ?>
              <div class="dropdown-divider"></div>
            <?php } ?> 
            <!-- /Barang End -->
              <!-- Tampilan ada barang -->
              <div class="dropdown-divider"></div>
              <a href="<?= base_url('belanja') ?>" class="dropdown-item text-center">
               <p class="fas fa-shopping-cart"> Lihat Keranjang</p>
              </a>
            <?php } ?>
          </div>
        </li>

      </ul>
    </div>
  </nav> <!-- /.navbar -->

<!-- Tampilan text dibawah kanan Menu Navbar Web Home -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?= $title ?></h1>
          </div> <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url() ?>">Bankndut Second</a></li>
              <li class="breadcrumb-item"><?= $title ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div> <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
      