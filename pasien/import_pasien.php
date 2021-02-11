<?php
include_once('../header.php');

?>

<div class="box">
  <h1>Pasien</h1>
  <h4><small>Import Data Pasien</small>
    <div class="pull-right">
      <a href="../file/sample/pasien.xlsx" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-download-alt"></i> Download Format Excel</a>
      <a href="data_pasien.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
    </div>
  </h4>
  <div class="row">
    <div class="col-lg-6 col-lg-offset-3">
      <form action="prosess_pasien.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="file">File Excel</label>
          <input type="file" name="file" id="file" class="form-control" required autofocus>
        </div>
        <div class="form-group pull-right">
          <button type="submit" name="import" class="btn btn-success">Import</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include_once('../footer.php'); ?>