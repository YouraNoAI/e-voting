<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title; ?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
  <!-- Pace style -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/plugins/pace/pace.min.css'); ?>">
  <!-- AdminLTE Style -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/dist/css/AdminLTE.min.css'); ?>">
  <!-- Custom Skin -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/dist/css/skins/skin-blue.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/admin.css'); ?>">

  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700">
  
  <style>
    body, html {
      font-family: 'Source Sans Pro', sans-serif;
      background-color: #f4f6f9;
    }
    .navbar-brand {
      font-weight: bold;
      /* color: #007bff !important; */
    }
    .profile-user-img {
      width: 120px;
      height: 120px;
      border: 2px solid #007bff;
      margin: 15px auto;
    }
    .box-solid {
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
      border-radius: 10px;
      background: #ffffff;
    }
    .box-header {
      background: #007bff;
      color: #ffffff;
      text-align: center;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
    }
    .text-primary {
      color: #007bff !important;
    }
    .main-footer {
      background: #f9fafc;
      border-top: 1px solid #dee2e6;
      padding: 15px;
    }
    .content-header h1, .content-header .breadcrumb {
      font-weight: bolder;
      color: #007bff;
    }
    .breadcrumb a {
      color: #6c757d;
    }
     /* Animasi kelap-kelip */
  .blink-text {
    color: #007bff;
    font-weight: bold;
    animation: blink 1s infinite alternate;
  }

  @keyframes blink {
    0% { opacity: 1; }
    50% { opacity: 0.5; }
    100% { opacity: 1; }
  }
  </style>
</head>

<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="" class="navbar-brand">E-<b>Voting</b></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li><a><?= strftime('%A, %d %B %Y'); ?> - <span class="live-clock"><?= date('H:i:s'); ?></span></a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header -->
      <section class="content-header text-center">
      <img src="<?= base_url('assets/img/logo.jpg'); ?>" alt="Logo" style="width: 240px; height: 150px; margin-bottom: 10px; mix-blend-mode: multiply;">
        <h1 class="blink-text">Hasil Voting</h1>
      </section>

      <!-- Main content -->
      <section class="content">
        <?php if (empty($voting)): ?>
        <div class="col-sm-12">
          <div class="box box-info box-solid text-center">
            <div class="box-body">
              <h2 class="text-center text-muted"><i class="fa fa-warning"></i> Tidak Ada Data !</h2>
            </div>
          </div>
        </div>
        <?php else: ?>
        <div class="col-sm-12">
          <h3 class="text-center text-primary"><?= $voting->nama_voting; ?></h3>
          <hr>
          <div class="row justify-content-center">
            <?php foreach ($kandidat as $k): ?>
            <div class="col-md-4">
              <div class="box box-solid box-info text-center">
                <div class="box-body box-profile">
                  <img src="<?= base_url('assets/img/kandidat/' . $k->foto); ?>" class="profile-user-img img-circle">
                  <h3 class="profile-username"><?= $k->nama_kandidat; ?></h3>
                  <p class="text-muted">Semester: <?= $k->semester; ?></p>
                  <p class="text-muted">Angkatan: <?= $k->angkatan; ?></p>
                  <h4 class="text-primary">Visi</h4>
                  <p class="text-muted"><?= $k->visi; ?></p>
                  <h4 class="text-primary">Misi</h4>
                  <p class="text-muted"><?= $k->misi; ?></p>
                  <h3><span class="label label-primary">Poin : <?= $k->poin; ?></span></h3>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
        <?php endif; ?>
      </section>
    </div>
  </div>

  <footer class="main-footer">
    <div class="container text-center">
      <div class="pull-right hidden-xs">
        <b>Version</b> 3.0
      </div>
      <strong>&copy; <?= date('Y'); ?> <a href="#" target="_blank">HIMATIF</a></strong>. All rights reserved.
    </div>
  </footer>
</div>

<!-- jQuery 3 -->
<script src="<?= base_url('assets/adminlte/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('assets/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
<!-- FastClick -->
<script src="<?= base_url('assets/adminlte/bower_components/fastclick/lib/fastclick.js'); ?>"></script>
<!-- PACE -->
<script src="<?= base_url('assets/adminlte/bower_components/PACE/pace.min.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/adminlte/dist/js/adminlte.min.js'); ?>"></script>
<script>
  $(document).ready(function(){
    setInterval(function(){
      var date = new Date();
      var h = ('0' + date.getHours()).slice(-2),
          m = ('0' + date.getMinutes()).slice(-2),
          s = ('0' + date.getSeconds()).slice(-2);
      $('.live-clock').html(`${h}:${m}:${s}`);
    }, 1000);
    setInterval(function(){
      window.location.reload();
    }, 180000);
  });
</script>
</body>
</html>
