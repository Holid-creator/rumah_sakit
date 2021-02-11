<?php
include_once('../header.php');

mysqli_query($conn, "DELETE FROM tb_obat WHERE id_obat = '$_GET[id]'") or die(mysqli_error($conn));
echo "<script>alert('Data Berhasil DiHapus')</script>";
echo "<script>window.location = 'data_obat.php'</script>";


include_once('../footer.php');
