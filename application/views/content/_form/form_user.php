<div class="card-body">
  <h3><?= $action ?> User</h3>
  <br><br>
  <form id="tambahUserform" action="<?= base_url("main/execute/".strtolower($action)."/user"); ?>" method="post">
    <div class="form-group">
      <input type="hidden" readonly name="id" value="<?= isset($result->id) ? $result->id : '';?>">
      <label>Nama</label>&nbsp;<span class="error" id="err_nama"></span>
      <input type="text" name="nama" id="nama" value="<?= isset($result->nama) ? $result->nama : '';?>" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Email</label>&nbsp;<span class="error" id="err_email"></span>
      <input type="email" name="email" id="email" value="<?= isset($result->email) ? $result->email : '';?>" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Password</label>&nbsp;<span class="error" id="err_password"></span>
      <input type="password" name="password" id="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengubah password" <?= $action == 'Add' ? 'required' : '' ?>>
    </div>
    <div class="form-group">
     <label>Role</label>&nbsp;<span class="error" id="err_nama"></span>
      <select name="role" id="role" class="form-control" required>
        <option value="">-Pilih Role-</option>
        <?php
          $user = ['admin', 'manager'];
          for ($i=0; $i < count($user); $i++) {
            if($user[$i] == $result->role){
              echo '<option value="'.$user[$i].'" selected>'.$user[$i].'</option>';
            } else {
              echo '<option value="'.$user[$i].'">'.$user[$i].'</option>';
            }
          }
        ?>
      </select>
    </div>
    <button type="submit" class="btn btn-primary btn-block"><?= $action ?></button>
  </form>
</div>