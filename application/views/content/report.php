<div align="left">
	<h3>Data Laporan</h3>
</div>
<div class="row">
	<div class="col-sm-12">
		<table class="table table-hover">
			<thead>
				<tr>
				<th>Nomor</th>
					<th>Status</th>
					<th>Total Data</th>
					<th>Action</th>
				</tr>
				</tr>
			</thead>
			<tbody>
			<?php
				$no = 0;
				foreach($result as $data){
					$no++;
			?>
				<tr>
				<td><?= $no; ?></td>
				<td><?= $data->status_expired ?></td>
				<td><?= $data->total_data ?></td>
				<td>
          <?php
            $seeDetailUrl = "main/sampleProduct";
            if ($data->status_expired == 'expired') {
              $seeDetailUrl = "main/productExpired";
            }
          ?>
					<a href="<?= base_url($seeDetailUrl) ?>" class="btn btn-icon btn-primary">Lihat Detail</a>
          <a class="btn btn-sm btn btn-danger" href="#" onclick="window.open('<?= base_url('main/cetak/laporan/'.$data->status) ?>','POPUP WINDOW TITLE HERE','width=650,height=800').print()">Cetak</a>
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