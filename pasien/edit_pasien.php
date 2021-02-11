<?php
include_once('../header.php');

?>

<div class="box">
  <h1>Pasien</h1>
  <h4><small>Edit Data Pasien</small>
    <div class="pull-right">
      <a href="data_pasien.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
    </div>
  </h4>
  <div class="row">
    <div class="col-lg-6 col-lg-offset-3">
      <?php
      $id = @$_GET['id'];
      $sql_pasien = mysqli_query($conn, "SELECT * FROM tb_pasien WHERE id_pasien = '$id'") or die(mysqli_error($conn));
      $data = mysqli_fetch_array($sql_pasien);
      ?>
      <form action="prosess_pasien.php" method="post">
        <div class="form-group">
          <label for="no_identitas">Nomor Identitas</label>
          <input type="hidden" name="id" value="<?= $data['id_pasien'] ?>">
          <input type="number" name="no_identitas" class="form-control" value="<?= $data['no_identitas'] ?>" autofocus>
        </div>
        <div class="form-group">
          <label for="n_pasien">Nama Pasien</label>
          <input type="text" name="n_pasien" class="form-control" value="<?= $data['n_pasien'] ?>">
        </div>
        <div class="form-group">
          <label for="jk">Jenis Kelamin</label>
          <div>
            <label class="radio-inline">
              <input type="radio" name="jk" id="jk" value="L" <?= $data['jk'] == "L" ? "checked" : null ?>>Laki-laki
            </label>
            <label class="radio-inline">
              <input type="radio" name="jk" id="jk" value="P" <?= $data['jk'] == "P" ? "checked" : null ?>>Perempuan
            </label>
          </div>
        </div>
        <div class="form-group">
          <label for="alamat">Alamat</label>
          <textarea name="alamat" class="form-control"><?= $data['alamat'] ?></textarea>
        </div>
        <div class="form-group">
          <label for="telp">No. Hp</label>
          <input type="number" name="telp" class="form-control" value="<?= $data['telp'] ?>">
        </div>
        <div class="form-group pull-right">
          <button type="submit" name="edit" class="btn btn-success">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include_once('../footer.php'); ?>