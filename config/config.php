<?php
date_default_timezone_set('Asia/Jakarta');
session_start();

include_once "conn.php";

$conn = mysqli_connect($conn['host'], $conn['user'], $conn['pass'], $conn['db']);
if (mysqli_connect_errno()) {
  echo mysqli_connect_error();
}

function base_url($url = null)
{
  $base_url = "http://localhost/rumah-sakit/";
  if ($url != null) {
    return $base_url . $url;
  } else {
    return $base_url;
  }
}

function tgl_indo($tgl)
{
  $tanggal = date('d M Y', strtotime($tgl));
  return $tanggal;
}
