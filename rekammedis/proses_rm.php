<?php

require_once "../config/config.php";
require_once "../assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if (isset($_POST['add'])) {
  $uuid4 = Uuid::uuid4()->toString();
  $pasien = trim(mysqli_real_escape_string($conn, $_POST['pasien']));
  $keluhan = trim(mysqli_real_escape_string($conn, $_POST['keluhan']));
  $dokter = trim(mysqli_real_escape_string($conn, $_POST['dokter']));
  $diagnosa = trim(mysqli_real_escape_string($conn, $_POST['diagnosa']));
  $poliklinik = trim(mysqli_real_escape_string($conn, $_POST['poliklinik']));
  $tgl = trim(mysqli_real_escape_string($conn, $_POST['tgl']));


  mysqli_query($conn, "INSERT INTO tb_rekammedis (id_rm, id_pasien, keluhan, id_dokter, diagnosa, id_poli, tgl_periksa) VALUES('$uuid4', '$pasien', '$keluhan', '$dokter', '$diagnosa', '$poliklinik', '$tgl')") or die(mysqli_error(($conn)));

  $obat = $_POST['obat'];
  foreach ($obat as $obt) {
    mysqli_query($conn, "INSERT INTO rm_obat (id_rm, id_obat) VALUES ('$uuid4', '$obt')") or die(mysqli_error($conn));
  }
  echo "<script>alert('Data Berhasil Ditambahkan')</script>";
  echo "<script>window.location='data_rm.php'</script>";
} else if (isset($_POST['edit'])) {
  $id = $_POST['id'];
  $no_identitas = trim(mysqli_real_escape_string($conn, $_POST['no_identitas']));
  $n_pasien = trim(mysqli_real_escape_string($conn, $_POST['n_pasien']));
  $jk = trim(mysqli_real_escape_string($conn, $_POST['jk']));
  $alamat = trim(mysqli_real_escape_string($conn, $_POST['alamat']));
  $telp = trim(mysqli_real_escape_string($conn, $_POST['telp']));
  $cek_identitas = mysqli_query($conn, "SELECT * FROM tb_pasien WHERE no_identitas = '$no_identitas' AND id_pasien != '$id'") or die(mysqli_error($conn));
  mysqli_query($conn, "UPDATE tb_pasien SET no_identitas = '$no_identitas', n_pasien = '$n_pasien', jk = '$jk', alamat = '$alamat', telp = '$telp' WHERE id_pasien = '$id'") or die(mysqli_error(($conn)));
  echo "<script>alert('data Behasil DiUbah')</script>";
  echo "<script>window.location='data_pasien.php'</script>";
} else if (isset($_POST['import'])) {
  $file = $_FILES['file']['name'];
  $ekstensi = explode(".", $file);
  $file_name = "file-" . round(microtime(true)) . "." . end($ekstensi);
  $sumber = $_FILES['file']['tmp_name'];
  $target_dir = "../file/";
  $target_file = $target_dir . $file_name;
  move_uploaded_file($sumber, $target_file);

  $obj = PHPExcel_IOFactory::load($target_file);
  $all_data = $obj->getActiveSheet()->toArray(null, true, true, true);

  $sql = "INSERT INTO tb_pasien (id_pasien, no_identitas, n_pasien, jk, alamat, telp) VALUES";
  for ($i = 3; $i <= count($all_data); $i++) {
    $uuid4 = Uuid::uuid4()->toString();
    $no_identitas = $all_data[$i]['A'];
    $n_pasien = $all_data[$i]['B'];
    $jk = $all_data[$i]['C'];
    $alamat = $all_data[$i]['D'];
    $telp = $all_data[$i]['E'];
    $sql .= "('$uuid4', '$no_identitas', '$n_pasien', '$jk', '$alamat', '$telp'),";
  }
  $sql = substr($sql, 0, -1);
  mysqli_query($conn, $sql) or die(mysqli_error($conn));
  unlink($target_file);
  echo "<script>alert('Data Pasien Berhasil Ditambahkan'); window.location='data_pasien.php'</script>";
}
