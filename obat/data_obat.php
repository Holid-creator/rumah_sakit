<?php include_once('../header.php') ?>

<div class="box">
  <h1>Obat</h1>
  <h4><small>Data Obat</small>
    <div class="pull-right">
      <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
      <a href="add_obat.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i> Tambah Obat</a>
    </div>
  </h4>
  <div>
    <form action="" method="post" class="form-group">
      <div class="row">
        <div class="col-md-4">
          <div class="input-group">
            <input type="text" class="form-control" name="cari" placeholder="Cari....">
            <span type="submit" class="btn btn-primary input-group-addon"><i class="glyphicon glyphicon-search" aria-hidden="true"></i></span>
          </div>
        </div>
      </div>
    </form>
  </div>
  <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover obat" id="obat">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Obat</th>
          <th>Keterangan</th>
          <th class="text-center"><span class="glyphicon glyphicon-cog"></span></th>
        </tr>
      </thead>
      <tbody>
        <?php
        $batas = 5;
        $hal = @$_GET['hal'];
        if (empty($hal)) {
          $posisi = 0;
          $hal = 1;
        } else {
          $posisi = ($hal - 1) * $batas;
        }
        $no = 1;
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
          $cari = trim(mysqli_real_escape_string($conn, $_POST['cari']));
          if ($cari != '') {
            $sql = "SELECT * FROM tb_obat WHERE n_obat LIKE '%$cari%'";
            $query = $sql;
            $qr_jml = $sql;
          } else {
            $query = "SELECT * FROM tb_obat LIMIT $posisi, $batas";
            $qr_jml = "SELECT * FROM tb_obat";
            $no = $posisi + 1;
          }
        } else {
          $query = "SELECT * FROM tb_obat LIMIT $posisi, $batas";
          $qr_jml = "SELECT * FROM tb_obat";
          $no = $posisi + 1;
        }
        $sql_obat = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if (mysqli_num_rows($sql_obat) > 0) {
          while ($data = mysqli_fetch_assoc($sql_obat)) { ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $data['n_obat']; ?></td>
              <td><?= $data['ket_obat']; ?></td>
              <td width="180px">
                <a href="edit_obat.php?id=<?= $data['id_obat'] ?>" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <a id="btn_hps" href="del_obat.php?id=<?= $data['id_obat'] ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
              </td>
            </tr>
        <?php }
        } else {
          echo "<tr><td colspan=\"4\" align=\"center\">Data Tidak Ditemukan</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
  <?php if (isset($_POST['cari']) == '') { ?>

    <div style="float:left">
      <?php
      $jml = mysqli_num_rows(mysqli_query($conn, $qr_jml));
      echo "Jumlah Data : <b>$jml</b>";
      ?>
    </div>
    <div style="float: right;">
      <ul class="pagination pagination-sm" style="margin: 0;">
        <?php
        $jml_hal = ceil($jml / $batas);
        for ($i = 1; $i <= $jml_hal; $i++) {
          if ($i != $hal) {
            echo "<li><a href=\"?hal=$i\">$i</a></li>";
          } else {
            echo "<li class=\"active\"><a>$i</a></li>";
          }
        }
        ?>
      </ul>
    </div>
  <?php
  } else {
    echo "<div style=\"float:left;\">";
    $jml = mysqli_num_rows(mysqli_query($conn, $qr_jml));
    echo "Data hasil Pencarian : <b>$jml</b>";
    echo "</div>";
  } ?>
</div>

<?php include_once('../footer.php') ?>

<script>
  $(document).ready(function() {
    $('#obat').DataTable({
      columnDefs: [{
        "searchable": false,
        "orderable": false,
        "targets": [0, 3]
      }],
      "order": [1, "asc"]
    })
  })
</script>