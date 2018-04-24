<?php
include '../config/koneksi.php';
  $sql = mysql_query("SELECT * FROM pengembalian WHERE kd_kembali='$_GET[kd]'");
  $bc  = mysql_fetch_array($sql);
  $baik  = $bc['jml_baik'];
  $rusak = $bc['jml_rusak'];

  $sql1 = mysql_query("SELECT * FROM aset WHERE kd_aset='$bc[kd_aset]'");
  $bc1   = mysql_fetch_array($sql1);

  $jml_aset   = $bc1['jml_aset'] - $baik - $rusak;
  $jml_rusak  = $bc1['jml_rusak'] - $rusak;
  $jml_baik   = $bc1['jml_baik'] - $baik;


  mysql_query("UPDATE aset SET jml_aset='$jml_aset', jml_baik='$jml_rusak', jml_rusak='$jml_baik' WHERE kd_aset='$bc[kd_aset]'");
  mysql_query("DELETE FROM pengembalian WHERE kd_kembali = '$_GET[kd]'");
    header('location:index.php?menu=pengembalian');
 ?>
