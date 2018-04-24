<?php
include '../config/koneksi.php';
    mysql_query("DELETE FROM log_book WHERE kd_kegitan='$_GET[kd]'");
    header('location:index.php?menu=log');
 ?>
