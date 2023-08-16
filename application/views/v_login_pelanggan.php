<!-- HALAMAN TAMPILAN LOGIN - PELANGGAN  -->
<div class="row">
  <div class="col-sm-4"></div>
    <div class="col-sm-4">
      <div class="register-box"><br><br><br>

      <div class="card">
        <div class="card-body register-card-body">
          <p class="login-box-msg">Silahkan Login</p>

          <?php
          echo validation_errors('<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fas fa-exclamation-triangle"></i>', '</div>');

          if ($this->session->flashdata('pesan')) {
            echo '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
            echo $this->session->flashdata('pesan');
            echo '</div>';
          }

          if ($this->session->flashdata('error')) {
          echo '<div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
          echo $this->session->flashdata('error');
          echo '</div>';
        }

          echo form_open('pelanggan/login'); ?>
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
            <div class="row">
              <div class="col-8">
                <p class="mb-0">Belum punya akun? 
                  <a href="<?= base_url('pelanggan/register') ?>"><b>Daftar</b></a>
                </p>
              </div> 
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Login</button>
              </div>
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
<br>
<br>
<br>