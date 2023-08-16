<!-- TAMPILAN Check Out Belanja 
    Belanja.php,
    Rajaongkir.php,
    m_transaksi - PELANGGAN -->

            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-shopping-cart"></i> CheckOut.
                    <small class="float-right">Date: <?= date('d-m-Y')?></small>
                  </h4>
                </div> <!-- /.col -->
              </div> <!-- info row -->
              <br>

              <!-- Isi dari tabel chek out -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th width="140">Qty</th>
                      <th width="190">Harga</th>
                      <th width="500">Barang</th>
                      <th class="text-center">Total Harga</th>
                      <th class="text-center">Berat</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php 
                      $i = 1;
                      $tot_berat = 0;
                      foreach ($this->cart->contents() as $items) {
                        $barang = $this->m_home->detail_barang($items['id']);
                        $berat =  $items['qty'] * $barang->berat;
                        $tot_berat = $tot_berat + $berat; ?>
                      <tr>
                        <td><?php echo $items['qty']; ?></td>
                        <td>Rp. <?php echo number_format($items['price'], 0); ?></td>
                        <td><?php echo $items['name']; ?></td>
                        <td class="text-center">Rp. <?php echo number_format($items['subtotal'], 0); ?></td>
                        <td class="text-center"><?= $berat ?> Gr</td>
                    <?php } ?>

                    </tbody>
                  </table>
                </div> <!-- /.col -->
              </div> <!-- /.row -->

              <!-- Isi dibawah tabel cekout -->
              <?php 
                //notifikasi apabila form ada yang kosong ->
                echo validation_errors('<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                ', '</div>');
              ?>
              <?php 
                echo form_open('belanja/cekout');
                $no_order = date('Ymd') . strtoupper(random_string('alnum', 8)); // No Order tanggal & acak 
              ?>
              <!-- Tujuan Pengiriman -->
              <div class="row">
                <div class="col-sm-8 invoice-col">
                  <b>Tujuan Pengiriman:</b>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Provinsi</label>
                        <select name="provinsi" class="form-control"></select>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Kota/Kabupaten</label>
                        <select name="kota" class="form-control"></select>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Expedisi</label>
                        <select name="expedisi" class="form-control"></select>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Paket</label>
                        <select name="paket" class="form-control"></select>
                      </div>
                    </div>

                    <div class="col-sm-8">
                      <div class="form-group">
                        <label>Alamat Lengkap</label>
                        <input name="alamat" class="form-control" placeholder="Alamat..." required></input>
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Kode Pos</label>
                        <input name="kode_pos" class="form-control" required></input>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Nama Penerima</label>
                        <input name="nama_penerima" class="form-control" required></input>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input name="telepon_penerima" class="form-control" required></input>
                      </div>
                    </div>
                  </div>
                </div> <!-- /.col -->

                <!-- Tampilan Total Pesanan Kanan Bawah  -->
                <div class="col-4"><br><br>
                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Grand Total:</th>
                        <th>Rp. <?php echo number_format($this->cart->total(), 0);?></th>
                      </tr>
                      <!-- <tr>
                        <th>Berat:</th>
                        <th><?= $tot_berat ?> Gr</th>
                      </tr> -->
                      <tr>
                        <th>Ongkir:</th>
                        <th><label id="ongkir"></label></th>
                      </tr>
                      <tr>
                        <th>Total Bayar:</th>
                        <th><label id="total_bayar"></label></th>
                      </tr>
                    </table>
                  </div>
                </div> <!-- /.col -->
              </div> <!-- /.row -->

              <!-- Simpan Transaksi | Hidden: menyembunyikan -->
              <input name="no_order" value="<?= $no_order ?>" hidden>  <!-- No Order -->
              <input name="estimasi" hidden>
              <input name="ongkir" hidden>
              <input name="berat" value="<?= $tot_berat ?>" hidden>
              <input name="grand_total" value="<?= $this->cart->total() ?>" hidden>
              <input name="total_bayar" hidden>
              <!-- /Simpan Transaksi -->

              <!-- Simpan Rinci Transaksi -->
              <?php 
              $i = 1;
                  foreach ($this->cart->contents() as $items) {
                    echo form_hidden('qty'. $i++, $items['qty']);
                  }
              ?> <!-- /Simpan Rinci Transaksi -->

              <div class="row no-print">
                <div class="col-12"><br>
                  <a href="<?= base_url('belanja') ?>" class="btn btn-secondary"> <i class="fas fa-backward"></i> Kembali Ke Keranjang</a>
                  <button type="submit" class="btn btn-dark float-right" style="margin-right: 5px;">
                    <i class="fas fa-shopping-cart"></i> Proses Check Out
                  </button>
                </div>
              </div>
              <?php echo form_close() ?>
            </div>



<script>
  // Rajaongkir
    $(document).ready(function() {
        //masukan data ke select PROVINSI
        $.ajax({
            type: "POST",
            url: "<?= base_url('rajaongkir/provinsi') ?>",
            success: function(hasil_provinsi) {
                //console.log(hasil_provinsi);
                $("select[name=provinsi]").html(hasil_provinsi);
            }
        });
        
        $("select[name=provinsi]").on("change", function() {
            var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");
            //masukan data ke select KOTA
            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/kota') ?>",
                data: 'id_provinsi=' + id_provinsi_terpilih,
                success: function(hasil_kota) {
                   $("select[name=kota]").html(hasil_kota);
                }
            });
        });

        // mendapatkan data expedisi
        $("select[name=kota]").on("change", function() {
            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/expedisi') ?>",
                success: function(hasil_expedisi) {
                   $("select[name=expedisi]").html(hasil_expedisi);
                }
            });
        });

        // mendapatkan data paket
        $("select[name=expedisi]").on("change", function() {
            // mendapatkan expedisi terpilih
            var expedisi_terpilih = $("select[name=expedisi]").val();
            // mendapatkan kota tujuan terpilih
            var id_kota_tujuan_terpilih = $("option:selected","select[name=kota]").attr('id_kota');
            // mengambil data ongkos kirim
            var total_berat = <?= $tot_berat ?>;
            
            $.ajax({
                type: "POST",
                url: "<?= base_url('rajaongkir/paket') ?>",
                data: 'expedisi=' + expedisi_terpilih + '&id_kota=' + id_kota_tujuan_terpilih + '&berat=' + total_berat,
                success: function(hasil_paket) {
                   $("select[name=paket]").html(hasil_paket);
                }
            });
        });

        $("select[name=paket]").on("change", function() {
            // menampilkan ongkir di bagian kanan
            var dataongkir = $("option:selected",this).attr('ongkir');
            var reverse = dataongkir.toString().split('').reverse().join(''),
              ribuan_ongkir = reverse.match(/\d{1,3}/g);
            ribuan_ongkir = ribuan_ongkir.join(',').split('').reverse().join('');

            $("#ongkir").html("Rp. " + ribuan_ongkir)

            // menampilkan total bayar di bagian kanan
            var ongkir = $("option:selected", this).attr('ongkir');
            var data_total_bayar = parseInt(ongkir) + parseInt(<?= $this->cart->total() ?>);
            var reverse2 = data_total_bayar.toString().split('').reverse().join(''),
              ribuan_total_bayar = reverse2.match(/\d{1,3}/g);
            ribuan_total_bayar = ribuan_total_bayar.join(',').split('').reverse().join('');

            $("#total_bayar").html("Rp. " + ribuan_total_bayar);

            // estimasi dan ongkir 
            var estimasi = $("option:selected",this).attr('estimasi');
            $("input[name=estimasi]").val(estimasi);
            $("input[name=ongkir]").val(dataongkir);
            $("input[name=total_bayar]").val(data_total_bayar);

        });

    });
</script>