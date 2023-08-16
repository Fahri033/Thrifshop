<!-- HALAMAN TAMPILAN ISI DARI AKUN SAYA - PELANGGAN -->
<!-- Profile Image -->
<div class="card card-outline">
	<div class="card-body box-profile">

		<?php foreach ($akun as $key => $value) { ?>
		<div class="text-center">
			<img class="profile-user-img img-fluid img-circle" src="<?= base_url('assets/foto/'.$value->foto) ?>" >
		</div>
		<h3 class="profile-username text-center"><?= $value->nama_pelanggan ?></h3>
		<p class="text-muted text-center"><?= $value->email ?></p>
		<?php } ?>

	</div> <!-- /.card-body -->
</div> <!-- /.card -->
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>