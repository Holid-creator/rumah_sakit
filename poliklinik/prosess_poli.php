<?php

require_once "../config/config.php";
require_once "../assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if (isset($_POST['add'])) {
  $total = $_POST['total'];
  for ($i = 1; $i <= $total; $i++) {
    $uuid4 = Uuid::uuid4()->toString();
    $nama = trim(mysqli_real_escape_string($conn, $_POST['nama-' . $i]));
    $gedung = trim(mysqli_real_escape_string($conn, $_POST['gedung-' . $i]));
    $sql = mysqli_query($conn, "INSERT INTO tb_poliklinik (id_poli, n_poli, gedung) VALUES('$uuid4', '$nama', '$gedung')") or die(mysqli_error(($conn)));
  }
  if ($sql) {
    echo "<script>alert('" . $total . " Data Berhasil Ditambahkan'); window.location = 'data_poli.php'</script>";
  } else {
    echo "<script>alert('Gagal Tambah Data, Coba Lagi !'); window.location = 'data_poli.php'</script>";
  }
} else if (isset($_POST['edit'])) {
  for ($i = 0; $i < count($_POST['id']); $i++) {
    $id = $_POST['id'][$i];
    $nama = $_POST['nama'][$i];
    $gedung = $_POST['gedung'][$i];
    mysqli_query($conn, "UPDATE tb_poliklinik SET n_poli = '$nama', gedung = '$gedung' WHERE id_poli = '$id'") or die(mysqli_error($conn));
    echo "<script>alert('Data Berhasil Diubah'); window.location = 'data_poli.php'</script>";
  }
}
