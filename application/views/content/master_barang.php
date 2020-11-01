<div align="left">
	<h3>Data Barang</h3>
</div>
<div class="row">
	<div class="col-sm-12">
		<div align="right">
			<a href="<?= base_url('main/form/form_master_product/add'); ?>" class="btn btn-primary">Tambah Produk</a>
		</div>
		<table class="table table-hover">
			<thead>
				<tr>
				<th>Nomor</th>
					<th>Kode Produk</th>
					<th>Nama Produk</th>
					<th>Masa Simpan</th>
					<th>Barcode Number</th>
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
				<td><?= $data->kode_product ?></td>
				<td><?= $data->nama_product ?></td>
				<td><?= $data->masa_simpan ?> Tahun</td>
				<td>
					<img src="<?php echo base_url(); ?>assets/barcode/<?php echo $data->barcode_number ?>.jpg" class="img-responsive2">
					<br>
					<a class="btn btn-sm label label-danger" href="#" onclick="window.open('<?= base_url('main/cetak/barcode/'.$data->barcode_number) ?>','POPUP WINDOW TITLE HERE','width=650,height=800').print()">Print Barcode</a>
				</td>
				<td>
					<a href="form/form_barang/edit/<?= $data->id ?>" class="btn btn-icon btn-primary">Edit</a>
					<button class="btn btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title data-original-title="Hapus Barang" data-confirm="Apa Anda yakin ingin menghapus data ini?" data-confirm-yes="deleteData('<?= $data->id ?>');">Hapus</button>
				</td>
				</tr>
			 <?php } ?>
			</tbody>
		</table>
	</div>
</div>