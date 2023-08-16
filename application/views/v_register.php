<!-- HALAMAN TAMPILAN DAFTAR - PELANGGAN -->
<div class="row">
  <div class="col-sm-4"></div>
    <div class="col-sm-4">
      <div class="register-box"><br>

      <div class="card">
        <div class="card-body register-card-body">
          <p class="login-box-msg">Daftar Akun</p>

          <?php
          echo validation_errors('<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fas fa-exclamation-triangle"></i>', '</div>');

          if ($this->session->flashdata('pesan')) {
            echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fas fa-check"></i>';
            echo $this->session->flashdata('pesan');
            echo '</div>';
          }
          echo form_open('pelanggan/register'); ?>
            <div class="input-group mb-3">
              <input type="text" name="nama_pelanggan" value="<?= set_value('nama_pelanggan') ?>" class="form-control" placeholder="Nama Lengkap">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="email" name="email" value="<?= set_value('email') ?>" class="form-control" placeholder="Email">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" name="password" value="<?= set_value('password') ?>" class="form-control" placeholder="Password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" name="ulangi_password" value="<?= set_value('ulangi_password') ?>" class="form-control" placeholder="Ulangi Password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-8">
                <a href="<?= base_url('pelanggan/login') ?>" class="text-center">Sudah Punya Akun?</a>
              </div>
              <!-- /.col -->
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Daftar</button>
              </div>
              <!-- /.col -->
            </div>
          <?php echo form_close() ?>

          
        </div> <!-- /.form-box -->
      </div><!-- /.card -->
    </div>
  </div>
  <div class="sm-4"></div>
</div>
<br>
<br>
<br>
<br>