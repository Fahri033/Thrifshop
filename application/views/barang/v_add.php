<!-- ADD BARANG - Controller Barang, M_barang & M_kategori - ADMIN -->

 <div class="col-md-12">
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Form Add Barang</h3>
        </div>

        <!-- Isi Card Add/Tambah Barang -->
        <div class="card-body">
        	
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
            echo form_open_multipart('barang/add')
            ?>
        		<div class="form-group">
                    <label>Nama Barang</label>
                    <input name="nama_barang" class="form-control" placeholder="Nama Barang" value="<?= set_value('nama_barang')?>">
                </div>

        		<div class="row"> <!-- Satu baris kategori, Ukuran & stok-->
                    <!-- Kategori -->
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Kategori</label>
                        <select name="id_kategori" class="form-control">
                        	<option value="">--Pilih Kategori--</option>
                            <?php foreach ($kategori as $key => $value) { ?>
                                <option value="<?= $value->id_kategori ?>"><?= $value->nama_kategori ?></option>
                            <?php } ?>
                        </select>
                      </div>
                    </div>
                    <!-- Ukuran atau Size -->
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Size</label>
                        <select name="ukuran" class="form-control" >
                            <option value="">--Size--</option>
                           <option value="M">M</option>
                           <option value="L">L</option>
                           <option value="XL">XL</option>
                        </select>
                      </div>
                    </div>
                    <!-- Stok Barang 18 juli jam 1 siang -->
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Stok</label>
                        <input type="number" min="0" max="1" name="stok" class="form-control" placeholder="Stock barang" value="<?= set_value('stok')?>">
                      </div>
                    </div>
                </div>

                <div class="row"> <!-- Satu baris berat & harga -->
                    <!-- Berat -->
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Berat (Gr)</label>
                        <input type="number" min="0" name="berat" class="form-control" placeholder="Berat Dalam Satuan Gram" value="<?= set_value('berat')?>">
                      </div>
                    </div>
                    <!-- Harga -->
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Harga</label>
                        <input name="harga" onkeypress="return HarusAngka(event)" class="form-control" placeholder="Harga Barang" value="<?= set_value('harga')?>">
                      </div>
                    </div>
                </div>

                <div class="row"> <!-- Satu baris Deskripsi & Keterangan -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Deskripsi Barang</label>
                            <textarea name="deskripsi" class="form-control" rows="5" placeholder="Deskripsi Barang..."><?= set_value('deskripsi')?></textarea>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Keterangan Kekurangan Barang</label>
                            <textarea name="keterangan" class="form-control" rows="5" placeholder="Kekurangan Barang..."><?= set_value('keterangan')?></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
	                <div class="col-sm-6">
	                   <div class="form-group">
	                       <label>Barang (Tipe Gambar: gif,jpg,jpeg,png | Max Size Gambar: 10000)</label>
	                       <input type="file" name="gambar" class="form-control" id="preview_gambar" required>
	                   </div>
	                </div>
                    <!-- Gambar no foto di sebelah kanan -->
	                <div class="col-sm-6"><br>
	                   <div class="form-group text-center">
	                       <img src="<?= base_url('assets/gambar/no_photo.png') ?>" id="gambar_load" width="250px">
	                   </div>
                	</div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-dark btn-sm">Simpan</button>
                    <a href="<?= base_url('barang') ?>" class="btn btn-secondary btn-sm" >Kembali</a>
                </div>
        	<?php echo form_close()?>

	    </div>
    </div>
</div>

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

<!-- Agar harga tetap angka -->
<script type="text/javascript">
    function HarusAngka(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        } 
    }
</script>