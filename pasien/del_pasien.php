<?php
include_once "../config/config.php";
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM tb_pasien WHERE id_pasien = '$id'");
echo "<script>alert('data Berhasil Dihapus'); window.location = 'data_pasien.php'</script>";
