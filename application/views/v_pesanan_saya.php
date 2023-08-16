<!-- TAMPILAN ISI DARI PESANAN SAYA - PELANGGAN -->
	<div class="row">
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
                    <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Order</a>
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
                  <!-- Order dan bayar -->
                  <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                     <table class="table">
                     	<tr>
                     		<th>No Order</th>
                     		<th>Tanggal Order</th>
                     		<th>Expedisi</th>
                     		<th>Total Bayar</th>
                     		<th></th>
                     	</tr>
                     	<?php foreach ($belum_bayar as $key => $value) { ?>
                     	 <tr>
                       		<td><?= $value->no_order ?></td>
                       		<td><?= $value->tgl_order ?></td>
                       		<td>
                       			<b><?= $value->expedisi ?></b><br>
                       			Paket : <?= $value->paket ?> <br>
                       			Ongkir : <?= number_format($value->ongkir, 0) ?>
                       		</td>
                       		<td>
                       			<b>Rp. <?= number_format($value->total_bayar, 0) ?></b><br>
                       			<!-- Notif apabila belum atau sudah membayar -->
                            <?php if ($value->status_bayar == 0) { ?>
                              <span class="badge badge-warning">Belum Bayar</span>
                            <?php } else { ?>
                              <span class="badge badge-success">Sudah Bayar</span><br>
                              <span class="badge badge-primary">Menunggu Verifikasi</span>
                            <?php } ?>
                       		</td>
                       		<td>
                            <!-- Notif apabila sudah membayar tombol bayar akan hilang -->
                            <?php if ($value->status_bayar == 0) { ?>
                              <a href="<?= base_url('pesanan_saya/bayar/'. $value->id_transaksi) ?>" class="btn btn-sm btn-flat btn-dark">Bayar</a>
                            <?php } ?>
                       		</td>
                     	 </tr>
                     	<?php } ?>
                     </table>
                  </div>

                  <!-- Diproses -->
                  <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                     <table class="table">
                      <tr>
                        <th>No Order</th>
                        <th>Tanggal Order</th>
                        <th>Expedisi</th>
                        <th>Total Bayar</th>
                        <th></th>
                      </tr>
                      <?php foreach ($diproses as $key => $value) { ?>
                       <tr>
                          <td><?= $value->no_order ?></td>
                          <td><?= $value->tgl_order ?></td>
                          <td>
                            <b><?= $value->expedisi ?></b><br>
                            Paket : <?= $value->paket ?> <br>
                            Ongkir : <?= number_format($value->ongkir, 0) ?>
                          </td>
                          <td>
                            <b>Rp. <?= number_format($value->total_bayar, 0) ?></b><br>
                            <span class="badge badge-success">Terverifikasi</span><br>
                            <span class="badge badge-primary">Diproses</span>
                          </td>
                       </tr>
                      <?php } ?>
                     </table>
                  </div>

                  <!-- Dikirim dan pesanan diterima -->
                  <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                     <table class="table">
                      <tr>
                        <th>No Order</th>
                        <th>Tanggal Order</th>
                        <th>Expedisi</th>
                        <th>Total Bayar</th>
                        <th>No Resi</th>
                      </tr>
                      <?php foreach ($dikirim as $key => $value) { ?>
                       <tr>
                          <td><?= $value->no_order ?></td>
                          <td><?= $value->tgl_order ?></td>
                          <td>
                            <b><?= $value->expedisi ?></b><br>
                            Paket : <?= $value->paket ?> <br>
                            Ongkir : <?= number_format($value->ongkir, 0) ?>
                          </td>
                          <td>
                            <b>Rp. <?= number_format($value->total_bayar, 0) ?></b><br>
                            <span class="badge badge-success">Dikirim</span><br>
                          </td>
                          <td>
                            <h5><?= $value->no_resi ?></h5>
                            <button data-toggle="modal" data-target="#diterima<?= $value->id_transaksi ?>" class="btn btn-sm btn-flat btn-dark">Pesanan Diterima</button>
                          </td>
                       </tr>
                      <?php } ?>
                     </table> 
                  </div>

                  <!-- Selesai -->
                  <div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
                    <table class="table">
                      <tr>
                        <th>No Order</th>
                        <th>Tanggal Order</th>
                        <th>Expedisi</th>
                        <th>Total Bayar</th>
                        <th>No Resi</th>
                      </tr>
                      <?php foreach ($selesai as $key => $value) { ?>
                       <tr>
                          <td><?= $value->no_order ?></td>
                          <td><?= $value->tgl_order ?></td>
                          <td>
                            <b><?= $value->expedisi ?></b><br>
                            Paket : <?= $value->paket ?> <br>
                            Ongkir : <?= number_format($value->ongkir, 0) ?>
                          </td>
                          <td>
                            <b>Rp. <?= number_format($value->total_bayar, 0) ?></b><br>
                            <span class="badge badge-success">Selesai</span>
                          </td>
                          <td>
                            <h5><?= $value->no_resi ?></h5>
                          </td>
                       </tr>
                      <?php } ?>
                     </table> 
                  </div>
                </div>
              </div> <!-- /.card -->
            </div>
          </div>
        </div>

        <?php foreach ($dikirim as $key => $value) { ?>
        <div class="modal fade" id="diterima<?= $value->id_transaksi ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Pesanan Diterima</h4>
            </div>
            <div class="modal-body">
              Apakah Anda Yakin Pesanan Telah Diterima ?
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
              <a href="<?= base_url('pesanan_saya/diterima/'. $value->id_transaksi) ?>" type="button" class="btn btn-primary">Ya</a>
            </div>
          </div> <!-- /.modal-content -->
        </div> <!-- /.modal-dialog -->
      </div> <!-- /.modal -->
      <?php } ?>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
