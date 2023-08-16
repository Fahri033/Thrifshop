<!-- ADD GAMBAR BARANG - Controller Gambarbarang, m_gambarbarang & m_barang - ADMIN -->

<!-- Tampilan Isi Dari Menu Samping Kiri --> 
          <div class="col-md-12">
            <div class="card card-dark">
              <div class="card-header">
                <h3 class="card-title">Add : <?= $barang->nama_barang?> </h3>
              </div>

              <!-- Isi Card Barang -->
              <div class="card-body">
                <!-- Tampilan Notifikasi  -->
                <?php
                if ($this->session->flashdata('pesan'))
                {
                    echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i>';
                    echo $this->session->flashdata('pesan');
                    echo '</h5></div>';
                } ?>

                <?php 
                //notifikasi apabila form ada yang kosong ->
                echo validation_errors('<div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h5><i class="icon fas fa-ban"></i>', '</h5></div>');
                //notifikasi gagal upload ->
                if (isset($error_upload)) 
                {
                    echo '<div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h5><i class="icon fas fa-ban"></i>'.$error_upload.'</h5></div>';
                }
                echo form_open_multipart('gambarbarang/add/'.$barang->id_barang) ?>
                
                <div class="row">
                  <div class="col-sm-4">
                     <div class="form-group">
                        <label>Ket Gambar</label>
                        <input name="ket" class="form-control" placeholder="Keterangan...." value="<?= set_value('ket')?>">
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="form-group">
                         <label>Gambar</label>
                         <input type="file" name="gambar" class="form-control" id="preview_gambar" required>
                     </div>
                  </div>
                  <!-- Gambar no foto di pojok sebelah kanan -->
                  <div class="col-sm-4">
                     <div class="form-group text-center">
                         <img src="<?= base_url('assets/gambar/no_photo.png') ?>" id="gambar_load" width="170px">
                     </div>
                  </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-dark btn-sm">Simpan</button>
                    <a href="<?= base_url('gambarbarang') ?>" class="btn btn-secondary btn-sm" >Kembali</a>
                </div>
                
                <?php echo form_close()?> 

                <hr> <!-- Garis -->
                <br>
                
                <!-- Tampilan dari input Gambar Barang yang akan ditambahkan -->
                <div class="row">

                  <?php foreach ($gambar as $key => $value) { ?>
                  <div class="col-sm-3">
                     <div class="form-group text-center">
                         <img src="<?= base_url('assets/gambarbarang/'.$value->gambar) ?>" id="gambar_load" width="190px" height="180">
                     </div>
                     <label><?= $value->ket ?></label>
                     <button data-toggle="modal" data-target="#delete<?= $value->id_gambar ?>" class="btn btn-danger btn-sm btn-block" ><i class="fas fa-trash"></i> Hapus</button>
                  </div>
                  <?php } ?>

                </div>
              </div> <!-- /.card-body -->
            </div> <!-- /.card -->
          </div>

          <!--Hapus/Delete Barang -->
          <?php foreach ($gambar as $key => $value) { ?>
            <div class="modal fade" id="delete<?= $value->id_gambar ?>">
              <div class="modal-dialog">
                <div class="modal-content">
                  <!-- Menampilkan nama barang -->
                  <div class="modal-header">
                    <h4 class="modal-title">Delete <?= $value->ket ?> </h4>
                  </div>

                  <!-- Menampilkan text di tengah -->
                  <div class="modal-body text-center">
                    <div class="form-group">
                      <img src="<?= base_url('assets/gambarbarang/'. $value->gambar) ?>" id="gambar_load" width="170px" height="170">
                    </div>
                    <h6>Apakah Anda Ingin Menghapus <?= $barang->nama_kategori ?> Ini ?</h6>
                  </div>

                  <!-- Menampilkan Menu Tidak & Hapus -->
                  <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <a href="<?= base_url('gambarbarang/delete/'.$value->id_barang .'/'. $value->id_gambar) ?>" class="btn btn-dark">Hapus</a>
                  </div>
                </div> <!-- /.modal-content -->
              </div> <!-- /.modal-dialog -->
            </div>
            <?php } ?>

<script>
  function bacaGambar(input) 
    {
    if (input.files && input.files[0]) 
        {
      var reader = new FileReader();
      reader.onload = function(e) 
            {
        $('#gambar_load').attr('src',e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  $("#preview_gambar").change(function(){
    bacaGambar(this);
  });
</script>