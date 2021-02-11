<?php

require_once "../config/config.php";
require_once "../assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if (isset($_POST['add'])) {
  $uuid4 = Uuid::uuid4()->toString();
  $nama = trim(mysqli_real_escape_string($conn, $_POST['nama']));
  $spesialis = trim(mysqli_real_escape_string($conn, $_POST['spesialis']));
  $alamat = trim(mysqli_real_escape_string($conn, $_POST['alamat']));
  $telp = trim(mysqli_real_escape_string($conn, $_POST['telp']));
  mysqli_query($conn, "INSERT INTO tb_dokter (id_dokter, n_dokter, spesialis, alamat, telp) VALUES('$uuid4', '$nama', '$spesialis', '$alamat', '$telp')") or die(mysqli_error(($conn)));
  echo "<script>alert('Data Berhasil Ditambahkan')</script>";
  echo "<script>window.location='data_dokter.php'</script>";
} else if (isset($_POST['edit'])) {
  $id = $_POST['id'];
  $nama = trim(mysqli_real_escape_string($conn, $_POST['nama']));
  $spesialis = trim(mysqli_real_escape_string($conn, $_POST['spesialis']));
  $alamat = trim(mysqli_real_escape_string($conn, $_POST['alamat']));
  $telp = trim(mysqli_real_escape_string($conn, $_POST['telp']));
  mysqli_query($conn, "UPDATE tb_dokter SET n_dokter = '$nama', spesialis = '$spesialis', alamat = '$alamat', telp = '$telp' WHERE id_dokter = '$id'") or die(mysqli_error(($conn)));
  echo "<script>alert('data Behasil DiUbah')</script>";
  echo "<script>window.location='data_dokter.php'</script>";
}
