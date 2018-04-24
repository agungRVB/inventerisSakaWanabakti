<?php
include '../config/koneksi.php';
    mysql_query("UPDATE aset SET stts='0' WHERE kd_aset='$_GET[kd]'");
    header('location:index.php?menu=aset');
 ?>
