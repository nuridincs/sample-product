<div align="left">
	<h3>Data Sampel Barang</h3>
</div>
<div class="row">
	<div class="col-sm-12">
		<div align="right">
			<a href="<?= base_url('main/add/form_sample_product'); ?>" class="btn btn-primary">Tambah Barang</a>
		</div>
		<!-- <form action="<?php //echo base_url('main/daftarmember'); ?>" class="form-horizontal" method="post">
			<input type="text" name="search2" id="search2" placeholder="Search..." required>
			<button>Cari</button>
			<a href="<?//= base_url('main/daftarmember') ?>" class="btn btn-default">
				Lihat Semua
			</a>
		</form> -->
		<table class="table table-hover">
			<thead>
				<tr>
				<th>Nomor</th>
					<th>Kode Produk</th>
					<th>Nama Produk</th>
					<th>Tanggal Expired</th>
					<th>Status</th>
					<th>Barcode</th>
					<th>Action</th>
				</tr>
				</tr>
			</thead>
			<tbody>
			<?php
				$no = 0;
				foreach($result as $data){
					$no++;

					$today = date('Y-m-d');
					$date1 = new DateTime($today);
					$date2 = new DateTime($data->expired_date);
					$interval = $date1->diff($date2);
					$willExpiredDay = $interval->days;

					if ($willExpiredDay <= 7){
						$btnArchive = '<a href="form/form_barang/edit/<?= $data->id ?>" class="btn btn-icon btn-warning">Musnahkan</a>';
						$status =  '<span class="label label-danger">Akan Kadaluarsa</span>';
					} else {
						$btnArchive = "";
						$status =  '<div class="label label-success"><i class="fa fa-check"></i> Ready</div>';
					}
			?>
				<tr>
				<td><?= $no; ?></td>
				<td><?= $data->kode_product ?></td>
				<td><?= $data->nama_product ?></td>
				<td><?= date('d-m-Y', strtotime($data->expired_date)) ?></td>
				<td><?= $status ?></td>
				<td>
					<img src="<?php echo base_url(); ?>assets/qrcode/<?php echo $data->id ?>.png" alt="" style="border-radius: 10px;border: 1px solid #000;margin: 5px;" class="img-responsive2">
				</td>
				<td>
					<?= $btnArchive ?>
					<a href="form/form_barang/edit/<?= $data->id ?>" class="btn btn-icon btn-primary">Edit</a>
					<button class="btn btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title data-original-title="Hapus Barang" data-confirm="Apa Anda yakin ingin menghapus data ini?" data-confirm-yes="deleteData('<?= $data->id ?>');">Hapus</button>
				</td>
				</tr>
			 <?php } ?>
			</tbody>
		</table>
	</div>
</div>