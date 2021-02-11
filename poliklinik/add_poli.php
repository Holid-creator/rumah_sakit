<?php include_once('../header.php') ?>

<div class="box">
  <h1>Poliklinik</h1>
  <h4><small>Tambah Data Poliklinik</small>
    <div class="pull-right">
      <a href="data_poli.php" class="btn btn-info btn-xs">Data</a>
      <a href="generate.php" class="btn btn-primary btn-xs">Tambah Data Lagi</a>
    </div>
  </h4>
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <form action="prosess_poli.php" method="post">
        <input type="hidden" name="total" value="<?= @$_POST['count_add'] ?>">
        <table class="table">
          <tr>
            <th>No</th>
            <th>Nama Poliklinik</th>
            <th>Gedung</th>
          </tr>
          <?php
          for ($i = 1; $i <= $_POST['count_add']; $i++) { ?>
            <tr>
              <td><?= $i; ?></td>
              <td><input type="text" name="nama-<?= $i ?>" class="form-control" required autofocus></td>
              <td><input type="text" name="gedung-<?= $i ?>" class="form-control" required></td>
            </tr>
          <?php } ?>
        </table>
        <div class="form-group pull-right">
          <button type="submit" name="add" class="btn btn-success">Simpan Semua</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include_once('../footer.php') ?>