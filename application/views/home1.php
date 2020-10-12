<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="<?= base_url('assets/login/style.css')?>" />

    <!-- Custom fonts for this template-->
    <link href="<?=base_url();?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <!-- <link href="<?=base_url();?>assets/css/sb-admin-2.min.css" rel="stylesheet"> -->

    <title>Monitoring Project</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="<?php echo base_url('Auth/process_pegawai');?>" method="post" class="sign-in-form">
            <?php echo $this->session->flashdata('pesan');?>
            <h2 class="title">Login Pegawai</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="email" name="email" id="email" placeholder="Email" required autofocus />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" required/>
            </div>
            <button type="submit" class="btn solid" name="login_pegawai">Login</button>
            <p class="social-text">Silahkan login sebagai Pegawai.</p>
          </form>
          <form action="<?php echo base_url('Auth/process_mitra');?>" method="post" class="sign-up-form">
            <?php echo $this->session->flashdata('pesan');?>
            <h2 class="title">Login Mitra</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="email" name="email" id="email" placeholder="Email" required autofocus />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" placeholder="Password" required />
            </div>
            <button type="submit" class="btn" name="login_mitra">Login</button>
            <p class="social-text">Silahkan login sebagai Mitra.</p>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Apakah Anda Mitra?</h3>
            <p>
              Silahkan login disini jika Anda adalah Mitra.
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Mitra
            </button>
          </div>
          <img src="<?= base_url('assets/login/img/pegawai.svg')?>" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Apakah Anda Pegawai?</h3>
            <p>
              Silahkan login disini jika Anda adalah Pegawai.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Pegawai
            </button>
          </div>
          <img src="<?= base_url('assets/login/img/mitra.svg')?>" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="<?= base_url('assets/login/app.js')?>"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="<?=base_url();?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=base_url();?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=base_url();?>assets/js/sb-admin-2.min.js"></script>

  </body>
</html>
