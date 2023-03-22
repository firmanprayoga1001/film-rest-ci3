
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="<?php echo base_url('assets/gambar/icon/'.$get_konfigurasi->icon) ?>">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css"> 
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css"> 
   <link rel="stylesheet" type="text/css" href="Font/css/all.min.css">
</head>
<body class="hold-transition login-page" style="background-image: linear-gradient(<?= $get_konfigurasi->warna_tema; ?>,<?= $get_konfigurasi->warna_latar_banner; ?>)">
<div class="login-box">
  <div class="login-logo">
    <a href="<?= site_url('dasbor') ?>">
    <img src="<?php echo base_url() ?>assets/gambar/logo/<?= $get_konfigurasi->gambar; ?>" alt="Logo Website" class="img"
           style="opacity: 100" height="100px">
    </a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg"><?= $get_konfigurasi->nama_website; ?> | Sign In Administrator</p>

      <form action="<?= site_url('auth1') ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Username...">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password...">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
      <!-- /.social-auth-links -->

      <!-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<?php
if($this->session->flashdata('sukses')) {
	echo '<div class="toast toastSukses">';
	echo '</div>';	
}
?>
<?php
if($this->session->flashdata('error')) {
	echo '<div class="toast toastError">';
	echo '</div>';	
}
?>
<?php
if($this->session->flashdata('info')) {
	echo '<div class="toast toastInfo">';
	echo '</div>';	
}
?>
<?php
if($this->session->flashdata('pesan')) {
	echo '<div class="toast toastPesan">';
	echo '</div>';	
}
?>
<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/admin/dist/js/adminlte.min.js"></script>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastSukses').show(function() {
      Toast.fire({
        icon: 'success',
        title: ('<?php echo $this->session->flashdata('sukses'); ?>')
      })
    });
    $('.toastInfo').show(function() {
      Toast.fire({
        icon: 'info',
        title: ('<?php echo $this->session->flashdata('info'); ?>')
      })
    });
    $('.toastError').show(function() {
      Toast.fire({
        icon: 'error',
        title: ('<?php echo $this->session->flashdata('error'); ?>')
      })
    });
    $('.toastPesan').show(function() {
      Toast.fire({
        icon: 'warning',
        title: ('<?php echo $this->session->flashdata('pesan'); ?>')
      })
    });
  });
</script>

</body>
</html>
