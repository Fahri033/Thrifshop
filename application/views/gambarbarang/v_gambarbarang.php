<!-- GAMBAR BARANG - Controller Gambarbarang & M_gambarbarang - ADMIN -->

<!-- Tampilan Isi Dari Menu Samping Kiri --> 
          <div class="col-md-12">
            <div class="card card-dark">
              <div class="card-header">
                <h3 class="card-title">Data Gambar Barang</h3>
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
                <!-- Tampilan atas tabel  -->
                <table class="table table-bordered" id="example1">
                  <thead>
                    <tr class="text-center">
                      <th>No</th>
                      <th>Nama Barang</th>
                      <th>Gambar</th>
                      <th>Jumlah</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <!-- Tampilan isi dari tabel  -->
                  <tbody>
                    <?php $no = 1;
                    foreach ($gambarbarang as $key => $value) { ?>
                      <tr class="text-center">
                        <td><?= $no++; ?></td>
                        <td><?= $value->nama_barang ?></td>
                        <td><img src="<?= base_url('assets/gambar/'.$value->gambar) ?>" width="120px"></td>
                        <td><?= $value->total_gambar ?></td>
                        <td>
                          <a href="<?= base_url('gambarbarang/add/'.$value->id_barang) ?>" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Add Gambar</a>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div> <!-- /.card-body -->
            </div> <!-- /.card -->
          </div>