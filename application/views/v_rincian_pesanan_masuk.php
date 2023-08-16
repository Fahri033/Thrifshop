<!-- Rincian Pesanan - Controller Admin & M_pesanan_masuk - ADMIN -->

          <div class="col-12">
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-shopping-cart"></i> Rincian pesanan barang.
                  </h4>
                </div> <!-- /.col -->
              </div>
              <br>
              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>No Order</th>
                      <th>Nama</th>
                      <th>Barang</th>
                      <th>Harga</th>
                      <th>Qty</th>
                      <!-- <th>Action</th> -->
                    </tr>
                    </thead>
                    <tbody>

                    <?php $no = 1; //$grand_total = 0;
                    foreach ($rincian as $key => $value) { 
                      //$tot_harga = $value->qty * $value->harga;
                      //$grand_total = $grand_total + $tot_harga;
                    ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $value->no_order ?></td>
                      <td><?= $value->nama_penerima ?></td>
                      <td><?= $value->nama_barang ?></td>
                      <td>Rp. <?= number_format($value->harga, 0) ?></td>
                      <td><?= $value->qty ?></td>
                      <!-- <td class="text-center">
                          <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value->id_rinci ?>"><i class="fas fa-trash"></i></button>
                      </td> -->
                    </tr>
                    <?php } ?>

                    </tbody>
                  </table>
                  
                </div> <!-- /.col -->
              </div><br> <!-- /.row -->
            </div> <!-- /.invoice -->
          </div><!-- /.col -->


     