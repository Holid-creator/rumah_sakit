<?php include_once('../header.php') ?>

<div class="box">
  <h1>Pasien</h1>
  <h4><small>Data Pasien</small>
    <div class="pull-right">
      <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
      <a href="add_pasien.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i> Tambah Pasien</a>
      <a href="import_pasien.php" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-import"></i> Import Pasien</a>
    </div>
  </h4>
  <div>

    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" id="pasien">
        <thead>
          <tr>
            <th>Nomor Identitas</th>
            <th>Nama Pasien</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>No. Hp</th>
            <th style="text-align: center;"><i class="glyphicon glyphicon-cog"></i></th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php include_once('../footer.php') ?>
<script>
  $(document).ready(function() {
    $('#pasien').DataTable({
      "processing": true,
      "serverSide": true,
      "ajax": "data.php",
      scrollY: '300px',
      dom: 'Bfrtip',
      buttons: [{
          extend: 'pdf',
          oriented: 'potrait',
          pageSize: 'Legal',
          title: 'Data pasien',
          download: 'open'
        },
        'csv', 'excel', 'print', 'copy'
      ],
      columnDefs: [{
        "searchable": false,
        "orderable": false,
        "targets": 5,
        "render": function(data, type, row) {
          var btn = "<center><a href=\"edit_pasien.php?id=" + data + "\" class=\"btn btn-warning btn-xs\" ><i class = \"glyphicon glyphicon-edit\"></i></a> <a onclick=\"return confirm('Yakin Hapus')\" href=\"del_pasien.php?id=" + data + "\" class=\"btn btn-danger btn-xs\" > <i class = \"glyphicon glyphicon-trash\"></i></a></center>"
          return btn;
        }
      }]
    });
  });
</script>