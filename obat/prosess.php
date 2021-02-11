<?php

require_once "../config/config.php";
require_once "../assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if (isset($_POST['add'])) {
  $uuid4 = Uuid::uuid4()->toString();
  $nama = trim(mysqli_real_escape_string($conn, $_POST['nama']));
  $ket = trim(mysqli_real_escape_string($conn, $_POST['ket']));
  mysqli_query($conn, "INSERT INTO tb_obat (id_obat, n_obat, ket_obat) VALUES('$uuid4', '$nama', '$ket')") or die(mysqli_error(($conn)));
  echo "<script>alert('Data Berhasil Ditambahkan')</script>";
  echo "<script>window.location='data_obat.php'</script>";
} else if (isset($_POST['edit'])) {
  $id = $_POST['id'];
  $nama = trim(mysqli_real_escape_string($conn, $_POST['nama']));
  $ket = trim(mysqli_real_escape_string($conn, $_POST['ket']));
  mysqli_query($conn, "UPDATE tb_obat SET n_obat = '$nama', ket_obat = '$ket' WHERE id_obat = '$id'") or die(mysqli_error(($conn)));
  echo "<script>alert('data Behasil DiUbah')</script>";
  echo "<script>window.location='data_obat.php'</script>";
}
