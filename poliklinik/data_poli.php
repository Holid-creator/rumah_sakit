<?php include_once('../header.php') ?>

<div class="box">
  <h1>Poliklinik</h1>
  <h4><small>Data Poliklinik</small>
    <div class="pull-right">
      <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
      <a href="generate.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i> Tambah Poliklinik</a>
    </div>
  </h4>
  <div>
  </div>
  <form name="prosess" method="post">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" id="poli">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Poliklinik</th>
            <th>Gedung</th>
            <th class="text-center">
              <input type="checkbox" onchange="checkAll(this)" value="">
            </th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          $sql_poli = mysqli_query($conn, "SELECT * FROM tb_poliklinik order by n_poli asc") or die(mysqli_error($conn));
          if (mysqli_num_rows($sql_poli) > 0) {
            while ($data = mysqli_fetch_array($sql_poli)) { ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $data['n_poli']; ?></td>
                <td><?= $data['gedung']; ?></td>
                <td width="50px" align="center">
                  <input type="checkbox" name="checked[]" class="check" value="<?= $data['id_poli'] ?>">
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
    <div class="box pull-right">
      <button class="btn btn-warning btn-sm" onclick="edit()">Edit</button>
      <button class="btn btn-danger btn-sm" onclick="hapus()">Hapus</button>
    </div>
  </form>
</div>

<script>
  $(document).ready(function() {
    $('#poli').DataTable();
  })
</script>

<script>
  function checkAll(box) {
    let checkboxes = document.getElementsByTagName('input');

    if (box.checked) { // jika checkbox teratar dipilih maka semua tag input juga dipilih
      for (let i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].type == 'checkbox') {
          checkboxes[i].checked = true;
        }
      }
    } else { // jika checkbox teratas tidak dipilih maka semua tag input juga tidak dipilih
      for (let i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].type == 'checkbox') {
          checkboxes[i].checked = false;
        }
      }
    }
  }

  function edit() {
    document.prosess.action = 'edit_poli.php';
    document.prosess.submit();
  }

  function hapus() {
    var conf = confirm('Yakin akan dihapus !')
    if (conf) {
      document.prosess.action = 'del_poli.php';
      document.prosess.submit();
    }
  }
</script>

<?php include_once('../footer.php') ?>

<script>
  $(document).ready(function() {
    $('#poli').DataTable({
      columnDefs: [{
        "searchable": false,
        "orderable": false,
        "targets": [0, 3]
      }],
      "order": [1, "asc"]
    });
  })
</script>