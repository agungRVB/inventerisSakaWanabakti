<?php
include '../config/koneksi.php';
    mysql_query("DELETE FROM user WHERE id_user='$_GET[kd]'");
    header('location:index.php?menu=user');
 ?>
