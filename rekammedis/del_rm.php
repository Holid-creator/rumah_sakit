<?php

require_once "../config/config.php";

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM tb_rekammedis WHERE id_rm = '$id'") or die(mysqli_error($conn));
echo "<script>alert('Data Berhasil Dihapus'); window.location = 'data_rm.php'</script>";
