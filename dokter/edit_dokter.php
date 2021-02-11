<?php
include_once('../header.php');

?>

<div class="box">
  <h1>Dokter</h1>
  <h4><small>Tambah Data Dokter</small>
    <div class="pull-right">
      <a href="data_dokter.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
    </div>
  </h4>
  <div class="row">
    <div class="col-lg-6 col-lg-offset-3">
      <?php
      $id = @$_GET['id'];
      $sql_dokter = mysqli_query($conn, "SELECT * FROM tb_dokter WHERE id_dokter = '$id'");
      $data = mysqli_fetch_assoc($sql_dokter);
      ?>
      <form action="prosess_dokter.php" method="post">
        <div class="form-group">
          <label for="nama">Nama Dokter</label>
          <input type="hidden" name="id" value="<?= $data['id_dokter'] ?>">
          <input type="text" name="nama" class="form-control" value="<?= $data['n_dokter'] ?>" autofocus>
        </div>
        <div class="form-group">
          <label for="spesialis">Spesialis</label>
          <input type="text" name="spesialis" class="form-control" value="<?= $data['spesialis'] ?>">
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