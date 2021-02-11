<?php
include_once('../header.php');

?>

<div class="box">
  <h1>Pasien</h1>
  <h4><small>Tambah Data Pasien</small>
    <div class="pull-right">
      <a href="data_pasien.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
    </div>
  </h4>
  <div class="row">
    <div class="col-lg-6 col-lg-offset-3">
      <form action="prosess_pasien.php" method="post">
        <div class="form-group">
          <label for="no_identitas">Nomor Identitas</label>
          <input type="number" name="no_identitas" class="form-control" required autofocus>
        </div>
        <div class="form-group">
          <label for="n_pasien">Nama Pasien</label>
          <input type="text" name="n_pasien" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="jk">Jenis Kelamin</label>
          <div>
            <label class="radio-inline">
              <input type="radio" name="jk" id="jk" value="L" required>Laki-laki
            </label>
            <label class="radio-inline">
              <input type="radio" name="jk" id="jk" value="P" required>Perempuan
            </label>
          </div>
        </div>
        <div class="form-group">
          <label for="alamat">Alamat</label>
          <textarea name="alamat" class="form-control" required></textarea>
        </div>
        <div class="form-group">
          <label for="telp">No. Hp</label>
          <input type="number" name="telp" class="form-control" required>
        </div>
        <div class="form-group pull-right">
          <button type="submit" name="add" class="btn btn-success">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include_once('../footer.php'); ?>