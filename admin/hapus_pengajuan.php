<?php
include '../config/koneksi.php';
    mysql_query("DELETE FROM pesanan WHERE kd_pesan='$_GET[kd]'");
    header('location:index.php?menu=pengajuan');
 ?>
