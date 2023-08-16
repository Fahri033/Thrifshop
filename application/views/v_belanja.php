<!-- TAMPILAN ISI DARI LIHAT KERANJANG/KERANJANG BELANJA - PELANGGAN -->

<!-- Catatan untuk pelanggan -->
<div class="callout callout-info">
	<h5><i class="fas fa-info"></i> Catatan:</h5>
    Stock produk hanya ada satu, sebelum melakukan chekout diharapkan update QTY dengan jumlah 1 dan juga cek barang di home apakah barang masih tersedia atau tidak.
</div>

<!-- Tabel Keranjang -->
<div class="card card-solid">
   <div class="card-body pb-0">
      <div class="row">
      	<div class="col-sm-12">
        <div class="row">
           <div class="col-12">
             <h4>
               <i class="fas fa-shopping-cart"></i> Keranjang.
             </h4>
           </div> <!-- /.col -->
        </div> <!-- info row -->
        <br>

      <?php echo form_open('belanja/update'); ?>
		<table class="table" cellpadding="6" cellspacing="1" style="width:100%" border="0">
			<!-- Text atas table -->
			<tr>
			  <th width="100px">QTY</th>
			  <th>Nama Barang</th>
			  <th style="text-align:right">Harga</th>
			  <th style="text-align:right">Sub-Total</th>
			  <!--<th style="text-align:center">Berat</th> -->
			  <th class="text-center">Action</th>
			</tr>

		<?php $i = 1; ?>

		<?php 
		$tot_berat = 0;
		foreach ($this->cart->contents() as $items) {
			$barang = $this->m_home->detail_barang($items['id']);
			$berat =  $items['qty'] * $barang->berat;
			$tot_berat = $tot_berat + $berat;
		?>
		<!-- Isi table belanja/keranjang belanja -->
		<tr>
	  	  <td><?php echo form_input(array(
	  	  	'name' => $i.'[qty]',
	  	  	'value' => $items['qty'],
	  	  	'maxlength' => '3',
	  	  	'size' => '5',
	  	  	'type'=>'number',
	  	  	'min'=>'0',
	  	  	'max'=>'1',
	  	  	'class'=>'form-control'
	  	  	)); 
	  	  	?>	
	  	  </td>
	  	  <td><?php echo $items['name']; ?></td>
		  <td style="text-align:right">Rp. <?php echo number_format($items['price'], 0); ?></td>
		  <td style="text-align:right">Rp. <?php echo number_format($items['subtotal'], 0); ?></td>
		  <!-- <td class="text-center"><?= $berat ?> Gr</td> -->
		  <td class="text-center">
		  	<a href="<?= base_url('belanja/delete/'. $items['rowid'] )?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
		  </td>
		</tr>

		<?php $i++; ?>

		<?php } ?>

		<tr>
		  <!-- <td colspan="2"></td>  -->
		  <td class="right"><h4>Total :</h4></td>
		  <td class="right"><h4>Rp. <?php echo number_format($this->cart->total(), 0);?></h4></td>
		  <!-- <th>Total Berat : <?= $tot_berat ?> Gr</th>-->
		</tr>
		</table><br>
		<!-- Tombol update barang, hapus semua dan chekot  -->
	  	<button type="submit" class="btn btn-dark"><i class="fa fa-save"></i> Update</button>
	  	<a href="<?= base_url('belanja/clear') ?>" class="btn btn-secondary"><i class="fa fa-recycle"></i> Clear</button></a>
	  	<a href="<?= base_url('belanja/cekout') ?>" class="btn btn-dark"><i class="fa fa-check-square"></i> Chek Out</button></a>
	  	<?php echo form_close(); ?><br>

	  	</div>
      </div>
    </div>
</div>  
<br>
<br>
<br>
<br>