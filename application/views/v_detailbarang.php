<!-- TAMPILAN HALAMAN DETAIL BARANG DI MENU MATA - PELANGGAN -->
      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none"><?= $barang->nama_barang ?></h3>
              <div class="col-12">
                <img src="<?= base_url('assets/gambar/'. $barang->gambar) ?>" class="product-image" alt="Product Image">
              </div>
              <div class="col-12 product-image-thumbs">
                <div class="product-image-thumb active">
                  <img src="<?= base_url('assets/gambar/'. $barang->gambar) ?>" alt="Product Image">
                </div>

                <?php foreach ($gambar as $key => $value) { ?>
                  <div class="product-image-thumb" >
                    <img src="<?= base_url('assets/gambarbarang/'. $value->gambar) ?>" alt="Product Image">
                  </div>
                <?php } ?>

              </div>
            </div>

             <!-- Tampilan Kanan -->
            <div class="col-12 col-sm-6">
              <h3 class="my-3"><?= $barang->nama_barang ?></h3>
              <hr> <!-- Garis -->
              <h4><?= $barang->nama_kategori ?></h4>
              <hr>
              <h5>Size: <?= $barang->ukuran ?> </h5>
              <hr>
              <p><?= $barang->deskripsi ?></p>
              <hr>
              <p><?= $barang->keterangan ?></p>
              <hr>
              <div class="bg-gray py-2 px-3 mt-4">
                <h3 class="mb-0">
                  Rp. <?= number_format($barang->harga,0) ?>
                </h3>
              </div>
              <hr>
              
              <?php 
              echo form_open('belanja/add');
              echo form_hidden('id', $barang->id_barang);
              echo form_hidden('price', $barang->harga);
              echo form_hidden('name', $barang->nama_barang);
              echo form_hidden('redirect_page', str_replace('index.php/','',current_url()));
              ?>
              <div class="mt-4">
                <div class="row">
                  <div class="col-sm-2">
                    <input type="number" name="qty" class="form-control" value="1" min="1" max="1">
                  </div>

                  <div class="col-sm-8">
                    <button type="submit" class="btn btn-dark btn-lg btn-flat swalDefaultSuccess">
                      <i class="fas fa-cart-plus fa-lg mr-2"></i> 
                      Add to Cart
                    </button>
                  </div>
                  
                </div> 
              </div>
              <?php echo form_close(); ?>
            </div>
            
          </div>
        </div> <!-- /.card-body -->
      </div> <!-- /.card -->

<!-- Notifikasi tambah barang -->
<script src="<?= base_url() ?>template/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- jQuery - Agar bisa menampilkan gambar2 yang ada di bawah -->
<script src="<?= base_url() ?>template/dist/js/demo.js"></script>
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