<!-- TAMPILAN HALAMAN KATEGORI NAVBAR HOME - PELANGGAN -->
<!-- SLIDER -->
<!-- Garis tengah bawah  -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
  </ol>

  <!-- Gambar pada slider -->
  <div class="carousel-inner">
    <div class="carousel-item active">
        <img class="d-block w-100" src="<?= base_url() ?>assets/slider/Gambar1.jpg">
    </div>
    <div class="carousel-item">
        <img class="d-block w-100" src="<?= base_url() ?>assets/slider/Gambar2.jpg">
    </div>
  </div>

  <!-- Tombol next gambar -->
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true" ></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
     <span class="carousel-control-next-icon" aria-hidden="true"></span>
     <span class="sr-only">Next</span>
  </a>
</div>
<!-- /SLIDER -->

 <div class="card card-solid">
    <div class="card-body pb-0">
       <div class="row d-flex align-items-stretch">  
        <!-- isi dari kotak kecil yang menampilkan barang atau pakaian -->
        <?php foreach ($barang as $key => $value) { ?>
          <!-- Menu akan muncul apabila stok barang masih ada -->
          <?php if ( $value->stok != 0) : ?>
          <div class="col-sm-4 d-flex align-items-stretch">

            <?php
            echo form_open('belanja/add');
            echo form_hidden('id', $value->id_barang);
            echo form_hidden('qty', 1);
            echo form_hidden('price', $value->harga);
            echo form_hidden('name', $value->nama_barang);
            echo form_hidden('redirect_page', str_replace('index.php/','',current_url()));
            ?>

              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  <h1 class="lead"><b><?= $value->nama_barang ?></b></h1>
                   <p class="text-muted text-sm"><b><?= $value->nama_kategori ?></b></p>
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                     <!-- Gambar barang -->
                    <div class="col-12 text-center">
                      <img src="<?= base_url('assets/gambar/'. $value->gambar) ?>" alt="" class="img-fluid" width="320px" height="250px">
                    </div>
                  </div>
                </div>
                <!-- Menu dan harga barang -->
                <div class="card-footer">
                  <div class="row">
                    <!-- Kiri -->
                    <div class="col-sm-6">
                      <div class="text-left">
                        <h5><span class="badge bg-dark">Rp. <?= number_format($value->harga, 0) ?></span></h5>
                      </div>
                    </div>
                     <!-- Menu Kanan -->
                    <div class="col-sm-6">
                      <div class="text-right">
                          <!-- Menu Detail -->
                          <a href="<?= base_url('home/detail_barang/'. $value->id_barang) ?>" class="btn btn-sm btn btn-default">
                            <i class="fas fa-eye"></i>
                          </a>
                          <!-- Menu keranjan tambah -->
                          <button type="submit" class="btn btn-sm btn-dark swalDefaultSuccess">
                            <i class="fas fa-cart-plus"></i>
                          </button>
                        
                      </div>  
                    </div>
                  </div>
                </div>
              </div>
             <?php echo form_close(); ?>    
            </div>
            <?php endif ?>
          <?php } ?>

       </div>
    </div>
</div>

<!-- Notifikasi tambah barang -->
<script src="<?= base_url() ?>template/plugins/sweetalert2/sweetalert2.min.js"></script>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.swalDefaultSuccess').click(function() {
      Toast.fire({
        icon: 'success',
        title: 'Barang Berhasil Ditambahkan Ke Keranjang !'
      })
    });
  });
</script>
