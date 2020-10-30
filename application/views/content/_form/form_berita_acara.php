<div class="card-body">
  <h3>Musnahkan Produk</h3>
  <br><br>
  <form id="tambahform" action="<?= base_url("main/execute/update/beritaAcara"); ?>" method="post">
    <div class="form-group">
      <input type="hidden" readonly name="id" value="<?= $result->id ?>">
      <label>Kode Product</label>&nbsp;<span class="error" id="errKodeProduct"></span>
      <input type="text" name="kode_product" id="kodeProduct" value="<?= $result->kode_product ?>" disabled class="form-control" required>
    </div>
    <div class="form-group">
      <label>Berita Acara</label>&nbsp;<span class="error" id="errorProductName"></span>
      <textarea name="berita_acara" id="beritaAcara" class="form-control" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary btn-block"><?= $action ?></button>
  </form>
</div>