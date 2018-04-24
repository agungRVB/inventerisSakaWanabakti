<?php
include '../config/koneksi.php';
    $sql1 = mysql_query("SELECT * FROM pesanan WHERE kd_pesan='$_GET[kd]'");
    $bc1  = mysql_fetch_array($sql1);

    if ($bc1['stts_pesan']==1){
      $status=2;
    }elseif($bc1['stts_pesan']==2){
      $status=1;
    }
mysql_query("UPDATE pesanan SET stts_pesan='$status' WHERE kd_pesan='$_GET[kd]'");

if ($status==2) {
  ?>
      <script type="text/javascript">
          window.location.href="index.php?menu=pengajuan";
      </script>
  <?php
}elseif ($status==1) {
  ?>
      <script type="text/javascript">
          window.location.href="index.php?menu=pengajuan-acc";
      </script>
  <?php
}

 ?>
