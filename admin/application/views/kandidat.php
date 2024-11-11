<div class="row">
    <div class="col-sm-12">
        <button class="btn btn-flat btn-success" data-toggle="modal" data-target="#tambahKandidat">
            <i class="fa fa-user-plus"></i> Tambah Kandidat
        </button>
        
        <!-- Modal Tambah Kandidat -->
        <div class="modal fade" id="tambahKandidat">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-user-plus"></i> Tambah Kandidat</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" enctype="multipart/form-data" action="<?= base_url('admin/tambah_kandidat'); ?>">
                            <div class="form-group">
                                <label for="nama">Nama Kandidat :</label>
                                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Kandidat" required>
                            </div>
							<div class="form-group">
								<label for="semester">Semester :</label>
								<select name="semester" class="form-control" required>
									<option value="" disabled selected>Pilih Semester</option>
									<?php for($i = 1; $i <= 6; $i++): ?>
										<option value="<?= $i; ?>">Semester <?= $i; ?></option>
									<?php endfor; ?>
								</select>
							</div>

							<div class="form-group">
								<label for="angkatan">Angkatan :</label>
								<select name="angkatan" class="form-control" required>
									<option value="" disabled selected>Pilih Angkatan</option>
									<?php 
									$currentYear = date('Y');
									for($year = $currentYear; $year >= $currentYear - 2; $year--): ?>
										<option value="<?= $year; ?>"><?= $year; ?></option>
									<?php endfor; ?>
								</select>
							</div>

                            <div class="form-group">
                                <label for="visi">Visi :</label>
                                <textarea name="visi" id="tambah-visi" class="form-control" placeholder="(ex: Visi)"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="misi">Misi :</label>
                                <textarea name="misi" id="tambah-misi" class="form-control" placeholder="(ex: Misi)"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="foto">Foto Kandidat :</label>
                                <input type="file" name="foto" required>
                            </div>
                            <button class="btn btn-flat btn-success">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-sm-12">
        <div class="tengah">
            <div class="col-sm-12">
                <h3 class="text-center">Daftar Kandidat</h3>
            </div>
            <?php if (count($kandidat) > 0): ?>
                <?php foreach($kandidat as $k): ?>
                <div class="col-sm-4">
                    <div class="box box-info shadow-sm rounded">
                        <div class="box-header position-relative">
                            <?php if ($k->id_ikut_kandidat): ?>
                                <a class="position-absolute top-0 end-0 p-2">
                                    <span class="label label-success"><i class="fa fa-check"></i> Terpilih</span>
                                </a>
                            <?php else: ?>
                                <button class="close hapus position-absolute top-0 end-0 p-2" data="<?= $k->id; ?>" aria-label="Delete">
                                    <i class="fa fa-trash text-danger"></i>
                                </button>
                            <?php endif; ?>
                        </div>
                        <div class="box-body box-profile text-center p-4">
                            <img src="<?= base_url('./../assets/img/kandidat/'.$k->foto); ?>" alt="Foto Kandidat" class="profile-user-img img-responsive img-kandidat img-circle mb-3" style="border: 3px solid #007bff;">
                            <h3 class="profile-username"><?= $k->nama_kandidat; ?></h3>
                            <p class="text-muted mb-1">Semester: <?= $k->semester; ?></p>
                            <p class="text-muted mb-1">Angkatan: <?= $k->angkatan; ?></p>
                            <h4 class="text-primary">Visi</h4>
                            <p class="text-muted text-center mb-4"><?= $k->visi; ?></p>
                            <h4 class="text-primary">Misi</h4>
                            <p class="text-muted text-center mb-4"><?= $k->misi; ?></p>
                            <button class="btn btn-flat btn-block btn-primary edit" data="<?= $k->id; ?>" style="border-radius: 5px;">Edit Profil</button>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-sm-12">
                    <div class="box box-danger box-solid">
                        <div class="box-body">
                            <h2 class="text-center"><i class="fa fa-warning"></i></h2>
                            <h3 class="text-center">Tidak Ada Kandidat</h3>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Modal Edit Kandidat -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="fa fa-user"></i> Edit Kandidat</h4>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/edit_kandidat') ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_kandidat">
                    <div class="tengah" id="img-kandidat"></div>
                    <div class="form-group">
                        <label for="nama">Nama Kandidat :</label>
                        <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Kandidat">
                    </div>
                    <div class="form-group">
						<label for="semester">Semester :</label>
						<select name="semester" class="form-control" required id="semester-select">
							<option value="" disabled>Pilih Semester</option>
							<?php for($i = 1; $i <= 6; $i++): ?>
								<option value="<?= $i; ?>">Semester <?= $i; ?></option>
							<?php endfor; ?>
						</select>
					</div>

					<div class="form-group">
						<label for="angkatan">Angkatan :</label>
						<select name="angkatan" class="form-control" required id="angkatan-select">
							<option value="" disabled>Pilih Angkatan</option>
							<?php 
							$currentYear = date('Y');
							for($year = $currentYear; $year >= $currentYear - 2; $year--): ?>
								<option value="<?= $year; ?>"><?= $year; ?></option>
							<?php endfor; ?>
						</select>
					</div>

                    <div class="form-group">
                        <label for="visi">Visi :</label>
                        <textarea name="visi" id="edit_visi" class="form-control" placeholder="(ex: Visi)"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="misi">Misi :</label>
                        <textarea name="misi" id="edit_misi" class="form-control" placeholder="(ex: Misi)"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto :</label>
                        <input type="file" name="foto">
                    </div>
                    <button class="btn btn-success btn-flat"><i class="fa fa-check"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
		tinymce.init({
			selector: '#edit_visi, #edit_misi,#tambah-visi, #tambah-misi',
			plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
			toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat'
		});

        $('.hapus').on('click', function() {
            var id = $(this).attr('data');
            var confirmation = confirm('Anda yakin ingin menghapus kandidat?');
            if (confirmation) {
                window.location.assign('<?= base_url("admin/hapus_kandidat/"); ?>' + id);
            }
            return false;
        });

		$('.edit').on('click', function() {
        var id = $(this).attr('data');
        $.ajax({
            type: 'GET',
            url: '<?= base_url("admin/get_kandidat/"); ?>' + id,
            dataType: 'json',
            success: function(data) {
                $('#edit').modal('show');
                $('[name="id_kandidat"]').val(data.id_kandidat);
                $('[name="nama"]').val(data.nama_kandidat);
                $('#semester-select').val(data.semester).trigger('change');
            	$('#angkatan-select').val(data.angkatan).trigger('change');


                // Memastikan TinyMCE siap sebelum memasukkan konten
                tinymce.get('edit_visi').setContent(data.visi);
                tinymce.get('edit_misi').setContent(data.misi);

                // Menampilkan foto kandidat
                var foto = '<img class="img-circle img-responsive img-kandidat" src="' + '<?= base_url("./../assets/img/kandidat/") ?>' + data.foto + '">';
                $('#img-kandidat').html(foto);
            }
        });
    });
    });
</script>

<?= ($this->session->flashdata('tambah')) ? '<script>Swal.fire("Sukses", "Kandidat berhasil ditambah", "success")</script>' : '' ?>
<?= ($this->session->flashdata('edit')) ? '<script>Swal.fire("Sukses", "Kandidat berhasil diedit", "success")</script>' : '' ?>
<?= ($this->session->flashdata('hapus')) ? '<script>Swal.fire("Sukses", "Kandidat berhasil dihapus", "success")</script>' : '' ?>
<?php if ($this->session->flashdata('error')) { ?>
    <script>
        Swal.fire('Gagal', '<?= $this->session->flashdata("error"); ?>', 'error');
    </script>
<?php } ?>
