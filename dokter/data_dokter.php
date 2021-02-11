<?php include_once('../header.php') ?>

<div class="box">
  <h1>Dokter</h1>
  <h4><small>Data Dokter</small>
    <div class="pull-right">
      <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
      <a href="add_dokter.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i> Tambah Dokter</a>
    </div>
  </h4>
  <div>
  </div>
  <form name="prosess" method="post">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" id="dokter">
        <thead>
          <tr>
            <th width="10px" class="text-center">
              <input type="checkbox" onchange="checkAll(this)" value="">
            </th>
            <th width="50px">No</th>
            <th>Nama Dokter</th>
            <th>Spesialis</th>
            <th>Alamat</th>
            <th>No. Hp</th>
            <th style="text-align: center;"><i class="glyphicon glyphicon-cog"></i></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          $sql_dokter = mysqli_query($conn, "SELECT * FROM tb_dokter order by n_dokter asc") or die(mysqli_error($conn));
          while ($data = mysqli_fetch_array($sql_dokter)) { ?>
            <tr>
              <td align="center">
                <input type="checkbox" name="checked[]" class="check" value="<?= $data['id_dokter'] ?>">
              </td>
              <td><?= $no++; ?></td>
              <td><?= $data['n_dokter']; ?></td>
              <td><?= $data['spesialis']; ?></td>
              <td><?= $data['alamat']; ?></td>
              <td><?= $data['telp']; ?></td>
              <td width="50px"><a href="edit_dokter.php?id=<?= $data['id_dokter'] ?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a></td>
            </tr>
          <?php }
          ?>
        </tbody>
      </table>
    </div>
</div>
<div class="box pull-right">
  <button class="btn btn-danger btn-sm" onclick="hapus()">Hapus</button>
</div>
</form>
</div>

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

  function hapus() {
    var conf = confirm('Yakin akan dihapus !')
    if (conf) {
      document.prosess.action = 'del_dokter.php';
      document.prosess.submit();
    }
  }
</script>

<?php include_once('../footer.php') ?>

<script>
  $(document).ready(function() {
    $('#dokter').DataTable({
      columnDefs: [{
        "searchable": false,
        "orderable": false,
        "targets": [0, 6]
      }],
      "order": [1, "asc"]
    })
  })
</script>