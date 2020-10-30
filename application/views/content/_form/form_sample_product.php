<div class="card-body">
  <h3><?= $action ?> Sampel Product</h3>
  <br><br>
  <form id="tambahform" action="<?= base_url("main/execute/".strtolower($action)."/sampleProduct"); ?>" method="post">
    <div class="form-group">
      <input type="hidden" readonly name="id" value="<?= isset($result->id) ? $result->id : '';?>">
      <label>Kode Barang</label>&nbsp;<span class="error" id="err_kode_product"></span>
      <select name="kode_product" id="kodeProduct" class="form-control" required>
        <option value="">-Pilih Kode Barang-</option>
        <?php
          foreach ($resultProduct->result_array() as $value) {
            if($value['kode_product'] == $result->kode_product){
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
      <input type="text" name="expired_date" id="expired_date" value="<?= isset($result->expired_date) ? $result->expired_date : '';?>" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary btn-block"><?= $action ?></button>
  </form>
</div>