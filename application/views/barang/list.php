<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('_partials/header');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Barang</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Master</a></div>
        <div class="breadcrumb-item">Barang</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <a href="form/form_barang/tambah/0" class="btn btn-icon btn-info mb-4">Tambah Barang</a>
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                      <th class="text-center">Nomor</th>
                      <th>Kode Barang</th>
                      <th>Nama Barang</th>
                      <th>Tanggal Expired</th>
                      <th>Status</th>
                      <th>Barcode</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no = 0;
                    foreach($barang as $data) {
                      $no++;

                      $today = date('Y-m-d');
                      $date1 = new DateTime($today);
                      $date2 = new DateTime($data->expired_date);
                      $interval = $date1->diff($date2);
                      $willExpiredDay = $interval->days;

                      if ($willExpiredDay <= 7){
                        $status =  '<span class="badge badge-danger">Akan Kadaluarsa</span>';
                      } else {
                        $status =  '<div class="badge badge-success"><i class="fa fa-check"></i> Ready</div>';
                      }
                  ?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $data->kode_barang ?></td>
                      <td><?= $data->nama_barang ?></td>
                      <td><?= date('d-m-Y', strtotime($data->expired_date)) ?></td>
                      <td><?= $status ?></td>
                      <td><?= $data->barcode ?></td>
                      <td>
                        <a href="form/form_barang/edit/<?= $data->id ?>" class="btn btn-icon btn-primary" data-toggle="tooltip" data-placement="top" title data-original-title="Edit Barang"><i class="far fa-edit"></i></a>
                        <button class="btn btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title data-original-title="Hapus Barang" data-confirm="Apa Anda yakin ingin menghapus data ini?" data-confirm-yes="deleteData('<?= $data->id ?>');"><i class="fas fa-trash"></i></button>
                      </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php $this->load->view('_partials/footer'); ?>

<script>
  function deleteData(id) {
    const formData = {
      id: id,
      idName: 'id',
      table: 'app_barang'
    }

    $.post('<?= base_url('barang/actionDelete'); ?>', formData, function( data ) {
      window.location.reload();
    });
  }
</script>