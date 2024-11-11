<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title; ?> | Log in</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url('./../assets/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('./../assets/adminlte/bower_components/font-awesome/css/font-awesome.min.css'); ?>">  
  <!-- Sweetalert -->
  <link rel="stylesheet" href="<?= base_url('./../assets/css/sweetalert2.min.css'); ?>">
  <!-- Custom Style -->
  <link rel="stylesheet" href="<?= base_url('./../assets/adminlte/dist/css/AdminLTE.min.css'); ?>">
  
  <style>
    body, html {
      height: 100%;
      font-family: 'Source Sans Pro', sans-serif;
      background: #e9f1f7;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .login-box {
      width: 100%;
      max-width: 400px;
      padding: 30px;
      background-color: #ffffff;
      box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.15);
      border-radius: 10px;
      text-align: center;
    }

    .login-logo img {
      width: 240px;
      height: 150px;
      margin-bottom: 10px;
    }

    .login-logo a {
      color: #007bff;
      font-weight: bold;
      font-size: 1em;
      display: block;
    }

    .login-box-msg {
      font-size: 1.1em;
      color: #555;
      /* margin: 20px 0; */
    }

    .form-group {
      position: relative;
      margin-bottom: 20px;
    }

    .form-control {
      border-radius: 30px;
      padding-left: 45px;
      padding-right: 15px;
      font-size: 14px;
      border: 1px solid #007bff;
      height: 45px;
    }

    .form-control:focus {
      border-color: #0056b3;
      box-shadow: none;
    }

    .form-control-feedback {
      position: absolute;
      top: 50%;
      left: 15px;
      transform: translateY(-50%);
      color: #007bff;
      font-size: 18px;
    }

    .btn-primary-custom {
      background: #007bff;
      color: #ffffff;
      border-radius: 30px;
      padding: 10px;
      font-size: 16px;
      transition: background 0.3s ease;
    }

    .btn-primary-custom:hover {
      background: #0056b3;
    }
  </style>
</head>
<body>

<div class="login-box">
  <div class="login-logo">
    <img src="<?= base_url('./../assets/img/logo.jpg'); ?>" alt="Logo">
    <a href="#"><?= $title; ?></a>
  </div>

  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="<?= base_url('Auth/actlogin'); ?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Username" required>
        <span class="fa fa-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <span class="fa fa-lock form-control-feedback"></span>
      </div>
      <button type="submit" class="btn btn-primary-custom btn-block btn-flat">Sign In</button>
    </form>
  </div>
</div>

<!-- jQuery 3 -->
<script src="<?= base_url('./../assets/adminlte/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('./../assets/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
<!-- Sweetalert -->
<script src="<?= base_url('./../assets/js/sweetalert2.all.min.js'); ?>"></script>
<?= ($this->session->flashdata('gagal')) ? '<script>Swal.fire("Gagal!", "Username/Password salah", "error")</script>' : '' ?>

</body>
</html>
