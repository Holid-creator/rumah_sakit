<?php
include_once('../header.php');

?>

<div class="box">
  <h1>Obat</h1>
  <h4><small>Edit Data Obat</small>
    <div class="pull-right">
      <a href="data_obat.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
    </div>
  </h4>
  <div class="row">
    <div class="col-lg-6 col-lg-offset-3">
      <?php
      $id = @$_GET['id'];
      $sql_obat = mysqli_query($conn, "SELECT * FROM tb_obat WHERE id_obat = '$id'");
      $data = mysqli_fetch_assoc($sql_obat);
      ?>
      <form action="prosess.php" method="post">
        <div class="form-group">
          <label for="nama">Nama Obat</label>
          <input type="hidden" name="id" value="<?= $data['id_obat'] ?>" required autofocus>
          <input type="text" name="nama" class="form-control" value="<?= $data['n_obat'] ?>" required autofocus>
        </div>
        <div class="form-group">
          <label for="ket">Keterangan</label>
          <textarea name="ket" class="form-control" required><?= $data['ket_obat'] ?></textarea>
        </div>
        <div class="form-group pull-right">
          <button type="submit" name="edit" class="btn btn-success">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include_once('../footer.php'); ?>