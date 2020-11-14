<div align="left">
	<h3>Data Barang Expired</h3>
</div>
<div class="row">
	<div class="col-sm-12">
		<table class="table table-hover">
			<thead>
				<th class="text-center">Nomor</th>
					<th>Kode Produk</th>
					<th>Nama Produk</th>
					<th>Tanggal Expired</th>
					<th>Berita Acara</th>
					<th>Status</th>
					<th>Action</th>
				</th>
			</thead>
			<tbody>
			<?php
				$no = 0;
				foreach($result as $data){
					$no++;
			?>
				<tr>
					<td><?= $no; ?></td>
					<td><?= $data->kode_product ?></td>
					<td><?= $data->nama_product ?></td>
					<td><?= date('d-m-Y', strtotime($data->expired_date)) ?></td>
					<td><?= $data->berita_acara ?></td>
					<td><span class="label label-danger">Kadaluarsa</span></td>
					<td>
						<a class="btn btn-sm btn btn-warning" href="#" onclick="window.open('<?= base_url('main/cetak/expired/'.$data->id) ?>','POPUP WINDOW TITLE HERE','width=650,height=800').print()">Cetak</a>
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
			window.location = url+"main/execute/delete/app_sample_product/"+id;
		} else {
			return false;
		}
	}
</script>