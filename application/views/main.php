<?php if ($pilih < 1): ?>
  <?php if ($passdefault): ?>
    <div class="col-sm-12 d-flex justify-content-center">
      <div class="tengah">
        <div class="col-sm-6">
          <div class="box shadow-sm border-0" style="border-radius: 10px; background-color: #f8d7da;">
            <div class="box-header text-center" style="background-color: #dc3545; color: white; border-top-left-radius: 10px; border-top-right-radius: 10px;">
              <h4 class="box-title" style="margin: 10px 0;">
                <i class="fa fa-lock"></i> Ganti Password
              </h4>
            </div>
            <div class="box-body" style="padding: 25px;">
              <p class="text-center text-muted">Silakan mengganti password untuk melanjutkan</p>
              <form id="formUbahPasswd">
                <div class="form-group">
                  <label for="PasswordLama" style="font-weight: 600;">Password Lama:</label>
                  <input type="password" name="passwdlama" class="form-control" placeholder="Masukkan Password Lama" style="border-radius: 5px;">
                </div>
                <div class="form-group">
                  <label for="PasswordBaru" style="font-weight: 600;">Password Baru:</label>
                  <input type="password" name="passwdbaru" class="form-control" placeholder="Masukkan Password Baru" style="border-radius: 5px;">
                </div>
                <div class="text-center">
                  <button class="btn btn-danger btn-lg" style="border-radius: 30px; padding: 10px 30px; font-weight: bold; transition: all 0.3s;">
                    Simpan
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <style>
      .box {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        transition: box-shadow 0.3s ease;
      }

      .box:hover {
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
      }

      .btn-danger {
        background-color: #dc3545;
        border: none;
        color: white;
        transition: all 0.3s ease;
      }

      .btn-danger:hover {
        background-color: #b52a3a;
        box-shadow: 0px 5px 15px rgba(220, 53, 69, 0.4);
        transform: scale(1.05);
      }
    </style>

  <?php else: ?>
    <div class="col-sm-12">
      <div class="voting-box box shadow-sm">
        <div class="box-body text-center">
          <h1 class="voting-title text-primary"><?= $voting->nama_voting ?></h1>
          <hr class="voting-divider">

          <div class="row justify-content-center">
            <?php foreach ($kandidat as $k): ?>
              <div class="col-md-4">
                <div class="candidate-box box shadow-sm">
                  <div class="box-body text-center candidate-content">
                    <img src="<?= base_url('assets/img/kandidat/'.$k->foto); ?>" alt="Foto Kandidat" class="candidate-img img-circle">
                    <h3 class="profile-username"><?= $k->nama_kandidat; ?></h3>
                    <p class="text-muted">Semester: <?= $k->semester; ?></p>
                    <p class="text-muted">Angkatan: <?= $k->angkatan; ?></p>
                    <h4 class="text-primary">Visi</h4>
                    <p class="text-muted"><?= $k->visi; ?></p>
                    <h4 class="text-primary">Misi</h4>
                    <p class="text-muted"><?= $k->misi; ?></p>
                    <?php if ($voting->status_voting != "nonaktif"): ?>
                      <button class="btn btn-primary pilih" data="<?= $k->id_kandidat ?>" data-voting="<?= $voting->id_voting ?>" data-nama="<?= $k->nama_kandidat ?>">Pilih</button>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>

          <h4 class="voting-status <?= $voting->status_voting !== 'aktif' ? 'text-danger' : 'text-muted' ?>">
            <?= $voting->status_voting !== 'aktif' ? '*Voting dilakukan setelah diresmikan atau diaktifkan oleh panitia' : '*Silakan pilih salah satu kandidat' ?>
          </h4>
        </div>
      </div>
    </div>

    <style>
      .voting-box {
        background-color: #f8f9fa;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease;
      }

      .voting-box:hover {
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
      }

      .voting-title {
        font-weight: bold;
        color: #007bff;
      }

      .voting-divider {
        width: 60%;
        margin: 15px auto;
        border-top: 2px solid #007bff;
      }

      .voting-status {
        margin-top: 20px;
      }

      .candidate-box {
        background-color: #ffffff;
        border-radius: 10px;
        margin-bottom: 20px;
        padding: 20px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease, transform 0.3s ease;
      }

      .candidate-box:hover {
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        transform: scale(1.02);
      }

      .candidate-img {
        width: 100px;
        height: 100px;
        margin-bottom: 15px;
        border: 3px solid #007bff;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.15);
      }

      .btn-primary.pilih {
        background-color: #007bff;
        border: none;
        border-radius: 30px;
        padding: 10px 25px;
        font-weight: bold;
        transition: all 0.3s ease;
      }

      .btn-primary.pilih:hover {
        background-color: #0056b3;
        box-shadow: 0px 5px 15px rgba(0, 91, 187, 0.4);
        transform: scale(1.05);
      }
    </style>

  <?php endif ?>
<?php else: ?>
  <div class="col-sm-12">
    <div class="box box-info box-solid shadow-sm" style="border-radius: 10px;">
      <div class="box-body text-center" style="padding: 30px;">
        <h2 class="text-primary">Terima Kasih!</h2>
        <p class="text-muted" style="font-size: 1.1em;">Anda telah berpartisipasi dalam pemilihan ini</p>
        <hr style="width: 50%; margin: 20px auto; border-top: 2px solid #007bff;">
        <div class="d-flex justify-content-center">
          <button class="btn btn-primary btn-lg logout" style="border-radius: 30px; padding: 10px 30px; font-weight: bold; transition: all 0.3s;">
            <i class="fa fa-sign-out"></i> LOGOUT
          </button>
        </div>
      </div>
    </div>
  </div>

  <style>
    .box.box-info.box-solid {
      background-color: #ffffff;
      border: 1px solid #007bff;
    }

    .btn-primary.logout {
      background-color: #007bff;
      border: none;
    }

    .btn-primary.logout:hover {
      background-color: #0056b3;
      transform: scale(1.05);
      box-shadow: 0px 5px 15px rgba(0, 91, 187, 0.4);
    }
  </style>
<?php endif ?>

<script>
  $('#formUbahPasswd').on('submit', function(e){
    e.preventDefault();
    var id = <?=$this->session->id?>;
    var passLama = $('[name="passwdlama"]').val(), passBaru = $('[name="passwdbaru"]').val();
    if (passLama != '' || passBaru != '') {
      $.ajax({
        type: 'POST',
        url: '<?=base_url("user/set_pass_id/")?>'+id,
        data: {passwdLama: passLama, passwdBaru: passBaru},
        success: function(data){
          if (data == 1) {
            $('#formUbahPasswd').trigger('reset');
            Swal.fire('Berhasil', 'Anda akan dialihkan dalam 5 detik', 'success');
            setTimeout(function(){
              window.location.reload()
            }, 5000);
          }
          else{
            $('#formUbahPasswd').trigger('reset');
            Swal.fire('Gagal', 'Password lama salah !', 'error');
          }
        }
      })
    }
    else{
      Swal.fire('Gagal', 'Form harus diisi !', 'error');
      return false;
    }
  })
  $('.pilih').on('click', function(e){
    e.preventDefault();
    var id = $(this).attr('data');
    var voting = $(this).attr('data-voting');
    var nama = $(this).attr('data-nama');
    Swal.fire({
      type: 'question',
      title: 'Pilih '+nama,
      text: 'Anda yakin akan memilih kandidat tersebut ?',
      showCancelButton: true,
      confirmButtonText: 'Pilih'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          type: 'POST',
          url: '<?=base_url("user/pilih/")?>'+voting+'/'+id,
          success: function(data){
            if (data == 1) {
              Swal.fire({
                type: 'success',
                title: 'Berhasil',
                text: 'Anda telah memilih '+nama,
              }).then((result) => {
                if (result.value) {
                  window.location.reload()
                }
              })
            }
          }
        })
      }
    })
  })
  $('.logout').on('click', function(e){
    e.preventDefault()
    window.location.assign('<?=base_url("user/logout")?>')
  })
</script>

<?php if ($pilih > 0): ?>
  <script>
    setTimeout(function(){
      window.location.assign('<?=base_url("user/logout")?>');
    }, 120000)
  </script>
<?php endif ?>
