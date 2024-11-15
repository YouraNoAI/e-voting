	<div class="row">
	<?php if ($cekvoting < 1): ?>
		<div class="col-sm-12">
			<div class="box box-info box-solid">
				<div class="box-body">
					<h3 class="text-center"><i class="fa fa-warning"></i> Tidak Ada Voting !</h3>
				</div>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="box box-info box-solid">
				<div class="box-header with-border">
					<h3 class="box-title"><i class="fa fa-th"></i> Tambah Voting</h3>
				</div>
				<form action="<?=base_url('admin/tambah_voting');?>" method="POST" class="form-horizontal">
					<div class="box-body">
						<div class="form-group">
							<label for="NamaVoting" class="col-sm-2 control-label">Nama Voting :</label>
							<div class="col-sm-10">
								<input type="text" name="voting" class="form-control" placeholder="Masukkan Nama Voting" required="required">
							</div>
						</div>
						<div class="form-group">
							<label for="Kandidat" class="col-sm-2 control-label">Kandidat :</label>
							<div class="col-sm-10">
								<select name="kandidat[]" class="form-control select2" data-placeholder="Pilih Kandidat" multiple="multiple" style="width: 100%;" required="required">
									<?php foreach ($listkandidat as $lk): ?>
									<option value="<?=$lk->id_kandidat;?>"><?=$lk->nama_kandidat;?></option>
									<?php endforeach;?>
								</select>
								<?=(count($listkandidat) < 2) ? '<h5 class="text-red">Kandidat harus lebih dari satu!</5>' : ''?>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<button type="reset" class="btn btn-flat btn-default"><i class="fa fa-refresh"></i> Reset</button>
						<button class="btn btn-flat btn-danger" <?=(count($listkandidat) < 2) ? 'disabled' : ''?>><i class="fa fa-check"></i> Tambah Voting</button>
					</div>
				</form>
			</div>
		</div>
	<?php else: ?>
		<div class="col-sm-12">
			<div class="box box-info">
				<div class="box-body">
					<h2 class="text-center"><?=$voting->nama_voting;?></h2>
					<hr>
					<h3 class="text-center">Kandidat</h3>
					<hr>
					<div class="tengah">
						<?php foreach ($kandidat as $k):?>
						<div class="col-sm-4">
						<div class="box shadow rounded candidate-box">
							<div class="box-body box-profile p-4">
								<img src="<?= base_url('./../assets/img/kandidat/'.$k->foto); ?>" alt="Foto Kandidat" class="profile-user-img img-responsive img-kandidat img-circle mb-3 candidate-img">
								<h3 class="profile-username text-center"><?= $k->nama_kandidat; ?></h3>
								<p class="text-muted mb-1 text-center">Semester: <?= $k->semester; ?></p>
								<p class="text-muted mb-1 text-center">Angkatan: <?= $k->angkatan; ?></p>
								<h4 class="text-primary text-center">Visi</h4>
								<p class="text-muted text-center mb-4"><?= $k->visi; ?></p>
								<h4 class="text-primary text-center">Misi</h4>
								<p class="text-muted mb-4"><?= $k->misi; ?></p>
								<h3 class="text-center"><span class="label label-danger">Poin: <?= $k->poin ?></span></h3>
							</div>
							</div>

							<style>
							.candidate-box {
								background: #f7f9fc; /* Warna latar belakang yang lembut */
								border: 1px solid #d1d9e6; /* Border ringan untuk kesan elegan */
								border-radius: 10px;
								box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); /* Shadow halus */
								transition: box-shadow 0.3s ease, transform 0.3s ease;
							}

							.candidate-box:hover {
								box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
								transform: scale(1.02); /* Efek scale saat di-hover */
							}

							.candidate-img {
								border: 3px solid #007bff;
								padding: 5px; /* Menambahkan padding antara gambar dan border */
							}

							.text-primary {
								color: #007bff !important;
							}
							</style>

						</div>
					<?php endforeach;?>
					</div>
					<hr>
					<h3 class="text-center">Jumlah Pemilih <span class="label label-success"><?=$jmlpemilih;?></span></h3>
					<hr>
					<div class="col-sm-7">
						<div class="box box-info box-solid">
							<div class="box-header">
								<h4 class="box-title">Sudah Memilih</h4>
							</div>
							<div class="box-body">
								<table class="table table-pemilih table-hover table-bordered table-striped">
									<thead>
										<tr>
											<th>No.</th>
											<th>Nim</th>
											<th>Nama</th>
											<th>Angkatan</th>
											<th>Waktu</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1; foreach ($sudah_memilih as $sm): ?>
										<tr>
											<td><?=$no++?>.</td>
											<td><?=$sm->nim?></td>
											<td><?=$sm->nama?></td>
											<td><?=$sm->angkatan?></td>
											<td><?=$sm->waktu?></td>
										</tr>
										<?php endforeach ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="col-sm-5">
						<div class="box box-info box-solid">
							<div class="box-header">
								<h4 class="box-title">Belum Memilih</h4>
							</div>
							<div class="box-body">
								<table class="table table-pemilih table-hover table-bordered table-striped">
									<thead>
										<tr>
											<th>No.</th>
											<th>Nim</th>
											<th>Nama</th>
											<th>Angkatan</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1; foreach ($belum_memilih as $bm): ?>
										<tr>
											<td><?=$no++?>.</td>
											<td><?=$bm->nim?></td>
											<td><?=$bm->nama?></td>
											<td><?=$bm->angkatan?></td>
										</tr>
										<?php endforeach ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="box-footer">
					<button class="btn btn-warning btn-edit btn-flat" data-toggle="modal" data-target="#editVoting<?=$voting->id_voting;?>"><i class="fa fa-edit"></i> Edit</button>
					<button class="btn btn-danger btn-edit btn-flat pull-right hapus-voting" data='<?=$voting->id_voting?>'><i class="fa fa-trash"></i> Hapus Voting</button>
				</div>
			</div>
		</div>
		<!-- Modal edit voting -->
		<div class="modal fade" id="editVoting<?=$voting->id_voting;?>">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title"><i class="fa fa-th"></i> Edit Voting</h4>
					</div>
					<div class="modal-body">
						<form action="<?=base_url('admin/edit_voting/'.$voting->id_voting);?>" method="POST">
							<div class="form-group">
								<label for="NamaVoting">Nama Voting :</label>
								<input type="text" name="voting" class="form-control" value="<?=$voting->nama_voting;?>" placeholder="Masukkan Nama Voting" required="required">
							</div>
							<div class="form-group">
							<label for="StatusVoting">Status :</label>
							<select name="status_voting" class="form-control" required>
								<option value="">Pilih Status</option>
								<option value="aktif" <?= $voting->status_voting == 'aktif' ? 'selected' : ''; ?>>Aktif</option>
								<option value="nonaktif" <?= $voting->status_voting == 'nonaktif' ? 'selected' : ''; ?>>Nonaktif</option>
							</select>
							</div>

							<button type="reset" class="btn btn-flat btn-default"><i class="fa fa-refresh"></i> Reset</button>
							<button class="btn btn-flat btn-danger" <?=(count($listkandidat) < 2) ? 'disabled' : ''?>><i class="fa fa-check"></i> Simpan</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	<?php endif;?>
	</div>

	<script>
		$(function(){
			$('.select2').select2();
			$('.select22').select2();
			$('.table-pemilih').DataTable({
				'bFilter': false
			});
			$('.hapus-voting').on('click', function(e){
				e.preventDefault();
				var id = $(this).attr('data');
				Swal.fire({
					type: 'question',
					title: 'Hapus Voting ?',
					text: 'Anda yakin akan menghapus voting tersebut? Semua data terkait akan terhapus',
					showCancelButton: true,
					confirmButtonText: 'Hapus'
				}).then((result) => {
					if (result.value) {
						window.location.assign('<?=base_url("admin/hapus_voting/")?>'+id);
					}
				});
				return false;
			})
		})
	</script>
	<?=($this->session->flashdata('ubah')) ? '<script>Swal.fire("Berhasil", "Perubahan berhasil disimpan", "success")</script>' : '';?>