<?php
require_once "../config/config.php";

$chk = $_POST['checked'];
if (!isset($chk)) {
  echo "<script>alert('Tidak ada data yang dipilih'); window.location = 'data_poli.php'</script>";
} else {
  foreach ($chk as $id) {
    $sql = mysqli_query($conn, "DELETE FROM tb_poliklinik WHERE id_poli = '$id'") or die(mysqli_error($conn));
  }
  if ($sql) {
    echo "<script>alert('" . count($chk) . "Data Berhasil Dihapus'); window.location = 'data_poli.php'</script>";
  } else {
    echo "<script>alert('Data Gagal Dihapus'); window.location = 'data_poli.php'</script>";
  }
}
