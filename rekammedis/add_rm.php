<?php
include_once('../header.php');

?>

<div class="box">
  <h1>Rekam Medis</h1>
  <h4><small>Tambah Data Rekammedis</small>
    <div class="pull-right">
      <a href="data_rm.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
    </div>
  </h4>
  <div class="row">
    <div class="col-lg-6 col-lg-offset-3">
      <form action="proses_rm.php" method="post">
        <div class="form-group">
          <label for="pasien">Nama pasien</label>
          <select name="pasien" id="pasien" class="form-control" required>
            <option value="">-- Pilih Pasien --</option>
            <?php
            $sql_pasien = mysqli_query($conn, "SELECT * FROM tb_pasien ORDER BY n_pasien ASC") or die(mysqli_error($conn));
            while ($data = mysqli_fetch_array($sql_pasien)) { ?>
              <option value="<?= $data['id_pasien'] ?>"><?= $data['n_pasien']; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label for="keluhan">Keluhan</label>
          <textarea name="keluhan" id="keluhan" class="form-control" required></textarea>
        </div>
        <div class="form-group">
          <label for="">Dokter</label>
          <select name="dokter" id="dokter" class="form-control" required>
            <option value="">-- Pilih Dokter --</option>
            <?php
            $sql_dokter = mysqli_query($conn, "SELECT * FROM tb_dokter") or die(mysqli_error($conn));
            while ($data = mysqli_fetch_array($sql_dokter)) { ?>
              <option value="<?= $data['id_dokter'] ?>"><?= $data['n_dokter']; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label for="diagnosa">Diagnosa</label>
          <textarea name="diagnosa" class="form-control" id="diagnosa" required></textarea>
        </div>
        <div class="form-group">
          <label for="poliklinik">Poliklinik</label>
          <select name="poliklinik" class="form-control" required>
            <option value="">-- Pilih Polikilinik --</option>
            <?php
            $sql_poli = mysqli_query($conn, "SELECT * FROM tb_poliklinik ORDER BY n_poli ASC") or die(mysqli_error($conn));
            while ($data = mysqli_fetch_array($sql_poli)) {
            ?>
              <option value="<?= $data['id_poli'] ?>"><?= $data['n_poli']; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label for="">Obat</label>
          <select multiple name="obat[]" class="form-control" size="7" required>
            <?php
            $sql_obat = mysqli_query($conn, "SELECT * FROM tb_obat ORDER BY n_obat ASC") or die(mysqli_error($conn));
            while ($data = mysqli_fetch_array($sql_obat)) {
            ?>
              <option value="<?= $data['id_obat'] ?>"><?= $data['n_obat']; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label for="tgl">Tanggal Periksa</label>
          <input type="date" name="tgl" class="form-control" value="<?= date('Y-m-d') ?>" required>
        </div>
        <div class="form-group pull-right">
          <button type="submit" name="add" class="btn btn-success">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include_once('../footer.php'); ?>
<script>
  CKEDITOR.replace('keluhan', {
    uiColor: 'green'
  })
  CKEDITOR.replace('diagnosa')
</script>