<!-- TAMPILAN ISI DARI PEMBAYARAN - PELANGGAN -->
<!-- Tabel kiri -->
<div class="row">
  <div class="col-sm-6">
    <div class="card card-dark">
      <div class="card-header">
        <h3 class="card-title">No Rekening Toko</h3>
      </div>
      <div class="card-body">

          <p>Silakan Transfer Ke No Rekening Di Bawah ini Sebesar : <h1 class="text-dark">Rp. <?= number_format($pesanan->total_bayar, 0) ?>.-</h1>
          </p>
          <table class="table">
            <tr>
              <th>Bank</th>
              <th>No Rekening</th>
              <th>Atas Nama</th>
            </tr>
              <tr>
                <td>BCA</td>
                <td>4424-5083-5432-7249</td>
                <td>Faiz Saputra</td>
              </tr>

              <tr>
                <td>BRI</td>
                <td>4424-5083-5432-4544</td>
                <td>Faiz Saputra</td>
              </tr>
          </table>

      </div>
    </div>
  </div>

         <!-- Tabel kanan -->
         <div class=col-sm-6>
            <div class="card card-dark">
              <div class="card-header">
                <h3 class="card-title">Upload Bukti Pembayaran</h3>
              </div>
             
              <?php
              echo form_open_multipart('pesanan_saya/bayar/'. $pesanan->id_transaksi);
              ?>
                <div class="card-body">
                  <div class="form-group">
                    <label>Atas Nama</label>
                    <input name="atas_nama" class="form-control" placeholder="Atas Nama" required>
                  </div>

                  <div class="form-group">
                    <label>Nama Bank</label>
                    <input name="nama_bank" class="form-control" placeholder="Nama Bank" required>
                  </div>

                  <div class="form-group">
                    <label>No Rekening</label>
                    <input name="no_rek" class="form-control" placeholder="No Rekening" required>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Bukti Bayar</label>
                    <input type="file" name="bukti_bayar" class="form-control" required>
                  </div>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-dark">Bayar</button>
                  <a href="<?= base_url('pesanan_saya') ?>" class="btn btn-secondary">Kembali</a>
                </div>
              <?php
              echo form_close()
              ?>
            </div>
          </div>
</div>