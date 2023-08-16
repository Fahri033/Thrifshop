<!-- BARANG - Controller Barang & M_barang - ADMIN -->

<!-- Tampilan Isi Dari Menu Samping Kiri --> 
          <div class="col-md-12">
            <div class="card card-dark">
              <div class="card-header">
                <h3 class="card-title">Data Barang</h3>
                <div class="card-tools">
                  <a href="<?= base_url('barang/add') ?>" type="button" class="btn btn-dark btn-sm"><i class="fas fa-plus"></i> Add</a>
                </div> <!-- /.card-tools -->
              </div>

              <!-- Isi Card Barang -->
              <div class="card-body">
                <!-- Tampilan Notifikasi  -->
                <?php
                if ($this->session->flashdata('pesan')){
                    echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i>';
                    echo $this->session->flashdata('pesan');
                    echo '</h5></div>';
                } ?>
                <!-- Tampilan atas tabel  -->
                <table class="table table-bordered" id="example1">
                  <thead>
                    <tr class="text-center">
                      <th>No</th>
                      <th>Nama Barang</th>
                      <th>Kategori</th>
                      <th>Harga</th>
                      <th>Deskripsi</th>
                      <th>Gambar</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <!-- Tampilan isi dari tabel  -->
                  <tbody>
                    <?php $no = 1; 
                    foreach ($barang as $key => $value) { ?>
                    <tr class="text-center">
                      <td><?= $no++; ?></td>
                      <td>
                        <?= $value->nama_barang ?><br>
                        Size: <?= $value->ukuran ?><br>
                        Berat : <?= $value->berat ?> Gr<br>
                         <!-- Stok barang -->
                        Stok : <?= $value->stok ?>
                      </td>
                      <td><?= $value->nama_kategori ?></td>
                      <td>Rp. <?= number_format($value->harga, 0) ?></td>
                      <td>
                        <?= $value->deskripsi ?><br>
                        <?= $value->keterangan ?>
                      </td>
                      <td>
                        <img src="<?= base_url('assets/gambar/'.$value->gambar) ?>" width="150px">
                        <!-- Menambah dua gambar <br><imgsrc="<?=($value->gambar) ?>"width="150px"> -->
                      </td>
                      <td>
                        <a href="<?= base_url('barang/edit/'.$value->id_barang)?> " class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value->id_barang ?>"><i class="fas fa-trash"></i></button>
                      </td>
                    </tr>
                    <?php } ?>
                    
                  </tbody>
                </table>
              </div> <!-- /.card-body -->
            </div> <!-- /.card -->
          </div>
     
     <!--Hapus/Delete Barang -->
      <?php foreach ($barang as $key => $value) { ?>
        <div class="modal fade" id="delete<?= $value->id_barang ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- Menampilkan nama barang -->
              <div class="modal-header">
                <h4 class="modal-title">Delete <?= $value->nama_barang ?> </h4>
              </div>

              <!-- Menampilkan gambar & text di tengah -->
              <div class="modal-body text-center">
                <!-- Menampilkan gambar di tengah -->
                <div class="form-group">
                    <img src="<?= base_url('assets/gambar/'. $value->gambar) ?>" id="gambar_load" width="170px" height="170">
                    </div>
                <h6>Apakah Anda Ingin Menghapus <?= $value->nama_kategori ?> ini ?</h6>
              </div>

              <!-- Menampilkan Menu Tidak & Hapus -->
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <a href="<?= base_url('barang/delete/'. $value->id_barang) ?>" class="btn btn-dark">Hapus</a>
              </div>
            </div> <!-- /.modal-content -->
          </div> <!-- /.modal-dialog -->
        </div>
        <?php } ?>