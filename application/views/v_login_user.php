<!-- HALAMAN TAMPILAN LOGIN USER Atau ADMIN - ADMIN -->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Toko Thrift | <?= $title ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>template/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<!-- Tampilan Nama Toko  -->
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="<?= base_url() ?>"><b>Toko</b> Thrift</a>
    </div>
    
    <!-- Tampilan Card Login  -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Silahkan Login</p>

        <!-- Tampilan Notifikasi  -->
        <?php 
        echo validation_errors('<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="icon fas fa-exclamation-triangle"></i>', '</div>');

        if ($this->session->flashdata('error')) {
          echo '<div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <i class="icon fas fa-ban"></i>';
          echo $this->session->flashdata('error');
          echo '</div>';
        }

        if ($this->session->flashdata('pesan')) {
          echo '<div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <i class="icon fas fa-check"></i>';
          echo $this->session->flashdata('pesan');
          echo '</div>';
        }

        echo form_open('auth/login_user')
        ?>
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <p class="mb-3">
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-dark btn-block">Login</button>
          </div>
        </div>
        </p>
        <?php 
        echo form_close() 
        ?>

      </div> <!-- /.login-card-body -->
    </div>
  </div> <!-- /.login-box -->

  <!-- Durasi waktu notifikasi -->
  <script>
    window.setTimeout(function(){
      $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
      });
    }, 950)
  </script>

  <!-- jQuery -->
  <script src="<?= base_url() ?>template/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url() ?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>template/dist/js/adminlte.min.js"></script>

</body>
</html>
