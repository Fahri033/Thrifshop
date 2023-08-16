<!-- PESANAN MASUK - Controller Admin, Rajaongkir & M_pesanan_masuk - ADMIN -->

		<div class="col-sm-12">
			<?php
				if ($this->session->flashdata('pesan')){
				echo '<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h5><i class="icon fas fa-check"></i>';
				echo $this->session->flashdata('pesan');
				echo '</h5></div>';
			} ?>
           <!-- Menu Atas Tabel -->
            <div class="card card-dark card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Pesanan Masuk</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Diproses</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Dikirim</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">Selesai</a>
                  </li>
                </ul>
              </div>

              <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">

                  <!-- Pesanan Masuk -->
                  <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                     <table class="table">
                     	<tr>
                        <th>Nama</th>
                        <th>No Telepon</th>
                     		<th>No Order</th>
                     		<th>Tanggal Order</th>
                     		<th>Expedisi</th>
                     		<th>Total Bayar</th>
                        <th></th>
                     	</tr>
                     	<?php foreach ($pesanan as $key => $value) { ?> <!-- controller 77 -->
                     	 <tr>
                          <td><?= $value->nama_penerima ?></td>
                          <td><?= $value->telepon_penerima ?></td>
                       		<td><?= $value->no_order ?></td>
                       		<td><?= $value->tgl_order ?></td>
                       		<td>
                       			<b><?= $value->expedisi ?></b><br>
                       			Paket : <?= $value->paket ?> <br>
                       			Ongkir : <?= number_format($value->ongkir, 0) ?>
                       		</td>
                       		<td>
                       			<b>Rp. <?= number_format($value->total_bayar, 0) ?></b><br>
                       			<!-- Notif apabila belum membayar -->
                            <?php if ($value->status_bayar == 0) { ?>
                              <span class="badge badge-warning">Belum Bayar</span>
                            <!-- Notif apabila sudah membayar -->
                            <?php } else { ?>
                              <span class="badge badge-success">Sudah Bayar</span><br>
                              <span class="badge badge-primary">Menunggu Verifikasi</span>
                            <?php } ?>
                       		</td>
                       		<td>
                            <!-- Notif apabila sudah membayar tombol bayar akan hilang -->
                            <?php if ($value->status_bayar == 1) { ?>
                              <button class="btn btn-sm btn-secondary btn-flat" data-toggle="modal" data-target="#cek<?= $value->id_transaksi ?>">Cek Bukti</button>
                              <a href="<?= base_url('admin/proses/'. $value->id_transaksi) ?>" class="btn btn-sm btn-flat btn-dark">Proses</a>
                            <?php } ?>
                            <!-- Hapus -->
                            <?php if ($value->status_bayar == 0) { ?>
                              <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value->id_transaksi ?>">Hapus Pesanan</button>
                            <?php } ?>
                          </td>
                     	 </tr>
                     	<?php } ?>
                     </table>
                  </div>

                  <!-- Hapus/Delete Pesanan Masuk -->
                  <?php foreach ($pesanan as $key => $value) { ?>
                    <div class="modal fade" id="delete<?= $value->id_transaksi ?>">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Delete</h4>
                          </div>
                          <!-- Menampilkan text di tengah -->
                          <div class="modal-body">
                            <h6>Apakah Anda Ingin Menghapus Pesanan ?</h6>
                          </div>
                          <!-- Menampilkan Menu Tidak & Hapus -->
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                            <a href="<?= base_url('admin/delete_transaksi/'. $value->id_transaksi) ?>" class="btn btn-dark">Hapus</a>
                          </div>  
                        </div> <!-- /.modal-content -->
                      </div> <!-- /.modal-dialog -->
                    </div>
                    <?php } ?>

                  <!-- Diproses -->
                  <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                     <table class="table">
                      <tr>
                        <th>Nama</th>
                        <th>No Telepon</th>
                        <th>No Order</th>
                        <th>Tanggal Order</th>
                        <th>Expedisi</th>
                        <th>Total Bayar</th>
                        <th></th>
                      </tr>
                      <?php foreach ($pesanan_diproses as $key => $value) { ?>
                       <tr>
                          <td><?= $value->nama_penerima ?></td>
                          <td><?= $value->telepon_penerima ?></td>
                          <td><?= $value->no_order ?></td>
                          <td><?= $value->tgl_order ?></td>
                          <td>
                            <b><?= $value->expedisi ?></b><br>
                            Paket : <?= $value->paket ?> <br>
                            Ongkir : <?= number_format($value->ongkir, 0) ?>
                          </td>
                          <td>
                            <b>Rp. <?= number_format($value->total_bayar, 0) ?></b><br>
                            <span class="badge badge-primary">Diproses</span>
                          </td>
                          <td>
                            <!-- Notif apabila sudah membayar tombol bayar akan hilang -->
                            <?php if ($value->status_bayar == 1) { ?>
                              <button class="btn btn-sm btn-flat btn-dark" data-toggle="modal" data-target="#kirim<?= $value->id_transaksi ?>">Kirim</button>
                            <?php } ?>
                          </td>
                       </tr>
                      <?php } ?>
                     </table>
                  </div>

                  <!-- Dikirim -->
                  <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                     <table class="table">
                      <tr>
                        <th>Nama</th>
                        <th>No Telepon</th>
                        <th>No Order</th>
                        <th>Tanggal Order</th>
                        <th>Expedisi</th>
                        <th>Total Bayar</th>
                        <th>No Resi</th>
                      </tr>
                      <?php foreach ($pesanan_dikirim as $key => $value) { ?>
                       <tr>
                          <td><?= $value->nama_penerima ?></td>
                          <td><?= $value->telepon_penerima ?></td>
                          <td><?= $value->no_order ?></td>
                          <td><?= $value->tgl_order ?></td>
                          <td>
                            <b><?= $value->expedisi ?></b><br>
                            Paket : <?= $value->paket ?> <br>
                            Ongkir : <?= number_format($value->ongkir, 0) ?>
                          </td>
                          <td>
                            <b>Rp. <?= number_format($value->total_bayar, 0) ?></b><br>
                            <span class="badge badge-success">Dikrim</span>
                          </td>
                          <td>
                            <h4><?= $value->no_resi ?></h4>
                          </td>
                       </tr>
                      <?php } ?>
                     </table>
                  </div>

                  <!-- Selesai -->
                  <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
                     <table class="table">
                      <tr>
                        <th>Nama</th>
                        <th>No Telepon</th>
                        <th>No Order</th>
                        <th>Tanggal Order</th>
                        <th>Expedisi</th>
                        <th>Total Bayar</th>
                        <th>No Resi</th>
                      </tr>
                      <?php foreach ($pesanan_selesai as $key => $value) { ?>
                       <tr>
                          <td><?= $value->nama_penerima ?></td>
                          <td><?= $value->telepon_penerima ?></td>
                          <td><?= $value->no_order ?></td>
                          <td><?= $value->tgl_order ?></td>
                          <td>
                            <b><?= $value->expedisi ?></b><br>
                            Paket : <?= $value->paket ?> <br>
                            Ongkir : <?= number_format($value->ongkir, 0) ?>
                          </td>
                          <td>
                            <b>Rp. <?= number_format($value->total_bayar, 0) ?></b><br>
                            <span class="badge badge-success">Pesanan Diterima</span>
                          </td>
                          <td>
                            <h4><?= $value->no_resi ?></h4>
                          </td>
                       </tr>
                      <?php } ?>
                     </table>
                  </div>
                </div>
              </div> <!-- /.card -->
            </div>
          </div>


<!-- Pesanan Masuk modal Cek Bukti pembayaran --> 
<?php foreach ($pesanan as $key => $value) { ?>
<div class="modal fade" id="cek<?= $value->id_transaksi ?>">
  <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><?= $value->no_order ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <table class="table">
                <tr>
                  <th>Nama Bank</th>
                  <th>:</th>
                  <td><?= $value->nama_bank ?></td>
                </tr>
                <tr>
                  <th>No Rek</th>
                  <th>:</th>
                  <td><?= $value->no_rek ?></td>
                </tr>
                <tr>
                  <th>Atas Nama</th>
                  <th>:</th>
                  <td><?= $value->atas_nama ?></td>
                </tr>
                <tr>
                  <th>Total Bayar</th>
                  <th>:</th>
                  <td>Rp. <?= number_format($value->total_bayar, 0) ?></td>
                </tr>
              </table>

              <img class="img-fluid pad" src="<?= base_url('assets/bukti_bayar/'. $value->bukti_bayar)?>" alt="">
            </div>
          </div> <!-- /.modal-content -->
  </div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->        
<?php } ?>

<!-- Diproses modal Kirim -->
<?php foreach ($pesanan_diproses as $key => $value) { ?>
<div class="modal fade" id="kirim<?= $value->id_transaksi ?>">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><?= $value->no_order ?></h4>
          </button>
        </div>
        <div class="modal-body">
        
          <?php echo form_open('admin/kirim/'. $value->id_transaksi) ?>
          <table class="table">
            <tr>
              <th>Nama Penerima</th>
              <th>:</th>
              <th><?= $value->nama_penerima ?></th>
            </tr>
            <tr>
              <th>No Telepon</th>
              <th>:</th>
              <th><?= $value->telepon_penerima ?></th>
            </tr>
            <tr>
              <th>Pesanan</th>
              <th>:</th>
              <th><?= $value->id_transaksi ?></th>
            </tr>
            <tr>
              <th>Alamat</th>
              <th>:</th>
              <th><?= $value->alamat ?></th>
            </tr>
            <tr>
              <th>Expedisi/Paket/Ongkir</th>
              <th>:</th>
              <th><?= $value->expedisi ?> / <?= $value->paket ?> / <?= number_format($value->ongkir, 0) ?></th>
            </tr>
            <tr>
              <th>No Resi</th>
              <th>:</th>
              <th><input name="no_resi" class="form-control" placeholder="No Resi..." required></th>
            </tr>
          </table>

        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
          <button type="submit" class="btn btn-dark">Kirim</button>
        </div>
        <?php echo form_close() ?>
    </div> <!-- /.modal-content -->
  </div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->
<?php } ?>
