<?php
$chk = $_POST['checked'];
if (!isset($chk)) {
  echo "<script>alert('Tidak Ada data yang dipilih !'); window.location = 'data_poli.php'</script>";
} else {
  include_once('../header.php') ?>

  <div class="box">
    <h1>Poliklinik</h1>
    <h4><small>Edit Data Poliklinik</small>
      <div class="pull-right">
        <a href="data_poli.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>
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
            $no = 1;
            foreach ($chk as $id) {
              $sql_poli = mysqli_query($conn, "SELECT * FROM tb_poliklinik WHERE id_poli = '$id'");
              while ($data = mysqli_fetch_array($sql_poli)) {
            ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <input type="hidden" name="id[]" value="<?= $data['id_poli'] ?>">
                  <td><input type="text" name="nama[]" value="<?= $data['n_poli'] ?>" class="form-control" required autofocus></td>
                  <td><input type="text" name="gedung[]" value="<?= $data['gedung'] ?>" class="form-control" required></td>
                </tr>
            <?php }
            } ?>
          </table>
          <div class="form-group pull-right">
            <button type="submit" name="edit" class="btn btn-success">Simpan Semua</button>
          </div>
        </form>
      </div>
    </div>
  </div>

<?php }
include_once('../footer.php') ?>