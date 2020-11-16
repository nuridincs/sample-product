<div class="card-body">
  <h3><?= $action ?> Produk</h3>
  <br><br>
  <form id="tambahform" action="<?= base_url("main/execute/".strtolower($action)."/product"); ?>" method="post">
    <div class="form-group">
      <input type="hidden" readonly name="id" value="<?= isset($result->id) ? $result->id : '' ?>">
      <label>Kode Produk</label>&nbsp;<span class="error" id="errKodeProduct"></span>
      <input type="text" <?= $action == 'Add' ? '' : 'readonly' ?> name="kode_product" id="kodeProduct" value="<?= isset($result->kode_product) ? $result->kode_product : '' ?>" maxlength="10" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Nama Produk</label>&nbsp;<span class="error" id="errorProductName"></span>
      <input type="text" name="nama_product" id="productName" value="<?= isset($result->nama_product) ? $result->nama_product : '' ?>" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Masa Simpan</label>&nbsp;<span class="error" id="errorMasaSimpan"></span>
      <select name="masa_simpan" id="masaSimpan" class="form-control" required>
        <?php
          for ($i=1; $i <= 2; $i++) {
            if($i == $result->masa_simpan){
              echo '<option value="'.$i.'" selected>'.$i.' Tahun</option>';
            } else {
              echo '<option value="'.$i.'">'.$i.' Tahun</option>';
            }
          }
        ?>
      </select>
    </div>
    <button type="submit" class="btn btn-primary btn-block"><?= $action ?></button>
  </form>
</div>