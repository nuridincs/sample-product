<div align="left">
	<h3>Data User</h3>
</div>
<div class="row">
	<div class="col-sm-12">
		<div align="right">
			<a href="<?= base_url('main/form/form_user/add'); ?>" class="btn btn-primary">Tambah User</a>
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
					<a href="form/form_user/update/<?= $data->id ?>" class="btn btn-icon btn-primary">Edit</a>
					<button class="btn btn-icon btn-danger" onclick="deleteData(<?php echo $data->id;?>);">Hapus</button>
				</td>
				</tr>
			 <?php } ?>
			</tbody>
		</table>
	</div>
</div>
<script>
	var url="<?php echo base_url(); ?>";

	function deleteData(id){
		var r = confirm("Apa Anda yakin ingin menghapus data ini?");
		if (r == true) {
			window.location = url+"main/execute/delete/app_users/"+id;
		} else {
			return false;
		}
	}
</script>