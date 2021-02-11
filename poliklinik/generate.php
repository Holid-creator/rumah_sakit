<?php include_once('../header.php') ?>

<div class="box">
  <h1>Poliklinik</h1>
  <h4><small>Tambah Data Poliklinik</small>
    <div class="pull-right">
      <a href="data_poli.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>
    </div>
  </h4>
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <form action="add_poli.php" method="post">
        <div class="form-group">
          <label for="count_add">Banyak Record yang Akan Ditambahakan</label>
          <input type="text" name="count_add" name="count_add" id="count_add" class="form-control" maxlength="2" pattern="[0-9]+" required autofocus>
        </div>
        <div class="form-group pull-right">
          <button type="submit" name="gerate" class="btn btn-success">Generate</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include_once('../footer.php') ?>