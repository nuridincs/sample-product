<div class="card-body">
  <h3>Tambah Sampel Product</h3>
  <br><br>
  <form id="tambahform" action="<?= base_url("main/execute/add/sample_product"); ?>" method="post">
    <div class="form-group">
      <input type="hidden" readonly name="kode_product" value="<?= isset($result->kode_product) ?>">
      <label>Kode Barang</label>&nbsp;<span class="error" id="err_kode_product"></span>
      <select name="kode_product" id="kode_product" class="form-control" required>
        <option value="">-Pilih Kode Barang-</option>
        <?php
          foreach ($result->result_array() as $value) {
            if($value['id'] == $result->kode_product){
              $option = "<option value='".$value['kode_product']."' selected>".$value['nama_product']."</option>";
            }else {
              $option = "<option value='".$value['kode_product']."'>".$value['nama_product']."</option>";
            }
            echo $option;
          }
        ?>
      </select>
    </div>
    <br>
    <div class="form-group">
      <label>Tanggal Expired</label>&nbsp;<span class="error" id="expired_date"></span>
      <input type="text" name="expired_date" id="expired_date" value="<?= isset($result->expired_date) ?>" class="form-control" maxlength="13" required>
    </div>
    <button type="submit" class="btn btn-primary btn-block">Tambah</button>
  </form>
</div>