<!-- KATEGORI - Controller Kategori & M_kategori - ADMIN -->

<!-- Tampilan Isi Dari Menu Samping Kiri --> 
          <div class="col-md-12">
            <div class="card card-dark">
              <div class="card-header">
                <h3 class="card-title">Data Kategori</h3>
                <div class="card-tools">
                  <button data-toggle="modal" data-target="#add" type="button" class="btn btn-dark btn-sm"><i class="fas fa-plus"></i> Add</button>
                </div> <!-- /.card-tools -->
              </div>

              <!-- Isi Card Kategori -->
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
                <!-- Tampilan atas tabel  -->
                <table class="table table-bordered" id="example1">
                  <thead>
                    <tr class="text-center">
                      <th>No</th>
                      <th>Nama Kategori</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <!-- Tampilan isi dari tabel  -->
                  <tbody>
                    <?php $no = 1; 
                    foreach ($kategori as $key => $value) { ?>
                      <tr class="text-center">
                        <td><?= $no++; ?></td>
                        <td><?= $value->nama_kategori ?></td>
                        <td class="text-center">
                          <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $value->id_kategori ?>"><i class="fas fa-edit"></i></button>
                          <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value->id_kategori ?>"><i class="fas fa-trash"></i></button>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div> <!-- /.card-body -->
            </div> <!-- /.card -->
          </div>

          <!-- Card Add/Tambah Kategori -->
          <div class="modal fade" id="add">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Add Kategori</h4>
                </div>
                <div class="modal-body">

                  <?php
                  echo form_open('kategori/add');
                  ?>
                  <div class="form-group">
                   <label>Nama Kategori</label>
                   <input type="text" name="nama_kategori" class="form-control" placeholder="Nama Kategori" required>
                  </div>

                 </div>

                 <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                  <button type="submit" class="btn btn-dark">Simpan</button>
                 </div>
                  <?php
                  echo form_close('');
                  ?>

            </div> <!-- /.modal-content -->
          </div> <!-- /.modal-dialog -->
        </div>

        <!-- Edit Kategori -->
        <?php foreach ($kategori as $key => $value) { ?>
          <div class="modal fade" id="edit<?= $value->id_kategori ?>">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Edit Ketegori</h4>
                  </button>
                </div>
                <div class="modal-body">

                  <?php
                  echo form_open('kategori/edit/' . $value->id_kategori);
                  ?>
                  <div class="form-group">
                   <label>Nama Kategori</label>
                   <input type="text" name="nama_kategori" value="<?= $value->nama_kategori ?>" class="form-control" placeholder="Nama Kategori" required>
                  </div>

                 </div>
                 <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                  <button type="submit" class="btn btn-dark">Simpan Perubahan</button>
                 </div>
                  <?php
                  echo form_close('');
                  ?>

            </div> <!-- /.modal-content -->
          </div> <!-- /.modal-dialog -->
        </div>
      <?php } ?>

      <!-- Hapus/Delete Kategori -->
      <?php foreach ($kategori as $key => $value) { ?>
        <div class="modal fade" id="delete<?= $value->id_kategori ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <!-- Menampilkan nama kategori -->
                <h4 class="modal-title">Delete <?= $value->nama_kategori ?></h4>
              </div>
              <!-- Menampilkan text di tengah -->
              <div class="modal-body">
                <h6>Apakah Anda Ingin Menghapus Data Ini ?</h6>
              </div>
              <!-- Menampilkan Menu Tidak & Hapus -->
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <a href="<?= base_url('kategori/delete/'. $value->id_kategori) ?>" class="btn btn-dark">Hapus</a>
              </div>  
            </div> <!-- /.modal-content -->
          </div> <!-- /.modal-dialog -->
        </div>
        <?php } ?>