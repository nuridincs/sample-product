<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('_partials/header');
?>
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Siapkan Barang</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="#">Form</a></div>
        <div class="breadcrumb-item">Siapkan Barang</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-body">
              <form action="<?= base_url('barang/updateBarangKeluar') ?>/actionAdd/buatPermintaan" method="post">
                <div class="form-group">
                  <label>Type</label>

                  <select class="form-control" name="jenis_type" id="jenis_type">
                    <option value="0">--Silahkan Pilih Type--</option>
                    <?php foreach($type as $data) { ?>
                      <option value="<?= $data->jenis_type ?>"><?= $data->jenis_type ?></option>
                    <?php } ?>
                  </select>
                </div>

                <div id="content"></div>
                <button class="btn btn-primary btn-block" id="submitBarangKeluar">Submit</button>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('_partials/js'); ?>

<script>
$("#jenis_type").change(function() {
  const jenis_type = $('#jenis_type').val();

  const formData = {
    idName: 'id_type',
    id: jenis_type,
    table1: 'app_barang_masuk',
    table2: 'app_barang',
  }

  $.post("<?= base_urL('barang/getBarangByType') ?>", formData, function( data ) {
    $('#content').html(data);
  });
});

function checkSS(part_number, id) {
  const jumlah_barang = document.getElementById("jumlah_barang"+id).value;

  const formData = {
    idName: 'part_number',
    part_number: part_number,
    id: id,
    table: 'app_barang',
    jumlah_barang: jumlah_barang
  }

  setTimeout(() => {
    $.post("<?= base_urL('barang/checkSafetyStock') ?>", formData, function( data ) {
      const response = JSON.parse(data);

      if (response.status === 'failed') {
        $('#submitBarangKeluar').prop('disabled', true);
        $('#error'+id).attr('style', 'display:inline-block;');
      } else {
        $('#submitBarangKeluar').prop('disabled', false);
        $('#error'+id).attr('style', 'display:none;');
      }
    });
  }, 200);
}
</script>