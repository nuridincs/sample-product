<div align="left">
	<h3>Data User</h3>
</div>
<div class="row">
	<div class="col-sm-12">
		<div align="right">
			<button class="btn btn-primary" data-toggle="modal" data-target="#addmemberModal" >Tambah User</button>
		</div>
		<table class="table table-hover">
			<thead>
				<tr>
				<th class="text-center">Nomor</th>
					<th>Role</th>
					<th>Nama</th>
					<th>Email</th>
					<th>Action</th>
				</tr>
				</tr>
			</thead>
			<tbody>
			<?php
				$no = 0;
				foreach($result->result() as $data){
					$no++;
			?>
				<tr>
				<td><?= $no; ?></td>
				<td><?= $data->role ?></td>
				<td><?= $data->nama ?></td>
				<td><?= $data->email ?></td>
				<td>
					<a href="form/form_barang/edit/<?= $data->id ?>" class="btn btn-icon btn-primary" data-toggle="tooltip" data-placement="top" title data-original-title="Edit Barang">Edit</a>
					<button class="btn btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title data-original-title="Hapus Barang" data-confirm="Apa Anda yakin ingin menghapus data ini?" data-confirm-yes="deleteData('<?= $data->id ?>');">Hapus</button>
				</td>
				</tr>
			 <?php } ?>
			</tbody>
		</table>
		<div id="addmemberModal" class="modal fade" role="modal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3 class="modal-title"><span class="glyphicon glyphicon-plus"></span> Tambah Member</h3>
					</div>
					<div class="modal-body">
						<form id="tambahform" action="#" method="post" enctype="multipart/form-data">	
							<div class="form-group">
								<label>Nim/Nip</label>&nbsp;<span class="error" id="err_no_induk"></span>
								<input type="text" name="no_induk" id="no_induk" class="form-control" maxlength="13" required>
							</div>
							<div class="form-group">
								<label>Nama</label>&nbsp;<span class="error" id="report1"></span>
								<input type="text" id="fullname" name="fullname" class="form-control" maxlength="100" required>
							</div>
							<div class="form-group">
								<label>Fakultas</label>&nbsp;<span class="error" id="fakultas"></span>
								<select name="id_fakultas" id="id_fakultas" class="form-control">
									<option value="">-Pilih Fakultas-</option>
									<?php
										foreach ($fakultas as $value) {
											echo "<option value='".$value['id']."'>".$value['nama_fakultas']."</option>";
										}
									?>
								</select>
							</div>
							<div class="form-group">
								<label>Jurusan</label>&nbsp;<span class="error" id="jurusan"></span>
								<select name="id_jurusan" id="id_jurusan" class="form-control">
									<option value="">-Pilih Jurusan-</option>
									<?php
										foreach ($jurusan as $value) {
											echo "<option value='".$value['id']."'>".$value['nama_jurusan']."</option>";
										}
									?>
								</select>
							</div>
							<div class="form-group">
								<label>No. Kendaraan</label>&nbsp;<span class="error" id="no_kendaraan"></span>
								<input type="text" id="no_kendaraan" name="no_kendaraan" class="form-control" maxlength="100" required>
							</div>
							<div class="form-group">
								<label>Zona</label>&nbsp;<span class="error" id="zona"></span>
								<select name="id_zona" id="id_zona" class="form-control">
									<option value="">-Pilih Zona-</option>
									<?php
										foreach ($zona as $value) {
											echo "<option value='".$value['id']."'>".$value['nama_zona']."</option>";
										}
									?>
								</select>
							</div>
							<button type="submit" class="btn btn-primary" style="width:100%;" id="savemember">Simpan</button>
						</form>
						<!-- <div id="a"></div> -->
					</div>
				</div>
			</div>
		</div>
		<div id="updatememberModal" class="modal fade" role="modal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3 class="modal-title"><span class="glyphicon glyphicon-plus"></span> Update Member</h3>
					</div>
					<div class="modal-body">
						<form id="tambahform" action="#" method="post" enctype="multipart/form-data">	
							<div class="form-group">
								<label>Nim/Nip</label>&nbsp;<span class="error" id="err_no_induk"></span>
								<input type="text" name="update_no_induk" id="update_no_induk" class="form-control" maxlength="10" required>
							</div>
							<div class="form-group">
								<label>Nama</label>&nbsp;<span class="error" id="report1"></span>
								<input type="text" id="update_fullname" name="update_fullname" class="form-control" maxlength="100" required>
							</div>
							<div class="form-group">
								<label>Fakultas</label>&nbsp;<span class="error" id="fakultas"></span>
								<select name="update_id_fakultas" id="update_id_fakultas" class="form-control">
									<option value="">-Pilih Fakultas-</option>
									<?php
										foreach ($fakultas as $value) {
											echo "<option value='".$value['id']."'>".$value['nama_fakultas']."</option>";
										}
									?>
								</select>
							</div>
							<div class="form-group">
								<label>Jurusan</label>&nbsp;<span class="error" id="jurusan"></span>
								<select name="update_id_jurusan" id="update_id_jurusan" class="form-control">
									<option value="">-Pilih Jurusan-</option>
									<?php
										foreach ($jurusan as $value) {
											echo "<option value='".$value['id']."'>".$value['nama_jurusan']."</option>";
										}
									?>
								</select>
							</div>
							<div class="form-group">
								<label>No. Kendaraan</label>&nbsp;<span class="error" id="no_kendaraan"></span>
								<input type="text" id="update_no_kendaraan" name="update_no_kendaraan" class="form-control" maxlength="100" required>
							</div>
							<div class="form-group">
								<label>Zona</label>&nbsp;<span class="error" id="zona"></span>
								<select name="update_id_zona" id="update_id_zona" class="form-control">
									<option value="">-Pilih Zona-</option>
									<?php
										foreach ($zona as $value) {
											echo "<option value='".$value['id']."'>".$value['nama_zona']."</option>";
										}
									?>
								</select>
							</div>
							<button type="submit" class="btn btn-primary" style="width:100%;" id="updatemember">Simpan</button>
						</form>
						<!-- <div id="a"></div> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>