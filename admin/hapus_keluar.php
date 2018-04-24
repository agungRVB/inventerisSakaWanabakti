<?php
include '../config/koneksi.php';
    mysql_query("DELETE FROM surat WHERE kd_surat='$_GET[kd]'");
    header('location:index.php?menu=surat-keluar');
 ?>
