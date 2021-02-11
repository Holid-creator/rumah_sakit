<?php include_once('../header.php') ?>

<div class="box">
  <h1>Rekam Medis</h1>
  <h4><small>Data Rekam Medis</small>
    <div class="pull-right">
      <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
      <a href="add_rm.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i> Tambah Rekammedis</a>
    </div>
  </h4>
  <div>
  </div>
  <div>
    <table class="table table-striped table-bordered table-hover" id="rekammedis">
      <thead>
        <tr>
          <th width="50px">No</th>
          <th>Nama Pasien</th>
          <th>Keluhan</th>
          <th>Nama Dokter</th>
          <th>Diagnosa</th>
          <th>Poliklinik</th>
          <th>Tanggal Periksa</th>
          <th>Obat</th>
          <th style="text-align: center;"><i class="glyphicon glyphicon-cog"></i></th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        $sql_rm = mysqli_query($conn, "SELECT * FROM tb_rekammedis INNER JOIN tb_pasien ON tb_rekammedis.id_pasien = tb_pasien.id_pasien INNER JOIN tb_dokter ON tb_rekammedis.id_dokter=tb_dokter.id_dokter INNER JOIN tb_poliklinik ON tb_rekammedis.id_poli=tb_poliklinik.id_poli ORDER BY n_pasien ASC") or die(mysqli_error($conn));
        while ($data = mysqli_fetch_array($sql_rm)) {
        ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $data['n_pasien']; ?></td>
            <td><?= $data['keluhan']; ?></td>
            <td><?= $data['n_dokter']; ?></td>
            <td><?= $data['diagnosa']; ?></td>
            <td><?= $data['n_poli']; ?></td>
            <td><?= tgl_indo($data['tgl_periksa']); ?></td>
            <td>
              <?php
              $sql_obat = mysqli_query($conn, "SELECT * FROM rm_obat JOIN tb_obat ON rm_obat.id_obat=tb_obat.id_obat WHERE id_rm='$data[id_rm]'") or die(mysqli_error($conn));
              while ($obat = mysqli_fetch_array($sql_obat)) {
                echo $obat['n_obat'] . "<br>";
              } ?>
            </td>
            <td>
              <a onclick="return confirm('Yakin')" href="del_rm.php?id=<?= $data['id_rm'] ?>" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>

<?php include_once('../footer.php') ?>

<script>
  $(document).ready(function() {
    $('#rekammedis').DataTable({
      "scrollX": true,
      columnDefs: [{
        "searchable": false,
        "orderable": false,
        "targets": [0, 3]
      }],
      "order": [1, "asc"]
    });
  })
</script>