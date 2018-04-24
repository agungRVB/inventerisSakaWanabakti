<?php
   include '../config/koneksi.php';
   $sql1  = mysql_query("SELECT * FROM aset WHERE kd_aset='$_GET[kd]'");
   $bc1   = mysql_fetch_array($sql1);
 ?>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
<div class="box-header with-border" style="border-bottom:1px solid #E6E4E4;padding-left:15px;background:#F5F4FD">
  <h1 class="box-title" style="font-size:150%;">Aset</h1>
</div>
<section class="content-header">
  <font size="4px">Tambah Aset</font>
</section>
<section class="content">
 <div class="box box-primary" style="width:100%;margin:0 auto;">
	<div class="box-body"  style="width:99.5%">
	  <table style="width:100%;line-height:40px;position:relative;top:-15px">
      <tr><div class="form-group">
          <td style="font-size:90%"><label for="exampleInputEmail1">Nama Aset</label></td><td>:</td>
          <td><input type="text" class="form-control" value="<?php echo $bc1['nm_aset'];?>" name="nm_aset" placeholder="" required></td>
          </div>
      </tr>
      <tr><div class="form-group">
          <td style="font-size:90%"><label for="exampleInputEmail1">Jumlah Kondisi Baik</label></td><td>:</td>
          <td><input type="text" class="form-control" value="<?php echo $bc1['jml_baik'];?>" name="jml_baik" placeholder="" required></td>
          </div>
      </tr>
      <tr><div class="form-group">
          <td style="font-size:90%"><label for="exampleInputEmail1">Jumlah Kondisi Rusak</label></td><td>:</td>
          <td><input type="text" class="form-control" name="jml_rusak" value="<?php echo $bc1['jml_rusak'];?>" placeholder="" required></td>
          </div>
      </tr>
      <tr><div class="form-group">
          <td style="font-size:90%" valign="top"><label for="exampleInputEmail1">Keterangan Aset</label></td><td valign="top">:</td>
          <td><textarea class="textarea" name="keterangan" placeholder="" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $bc1['keterangan'];?></textarea></td>
          </div>
      </tr>
      <tr>
        <td></td>
        <td colspan="2"><div class="box-footer">
              <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> &nbsp Save</button> &nbsp
              <button type="reset" class="btn btn-primary" style="background:#713A3A">Reset</button> &nbsp
              <input type="button" class="btn btn-primary" style="color:white;font-weight:bold;background:#6B6B6B" value="Back" onclick="history.back(-1)" >
            </div>
        </td>
      </tr>
    </table>
    </div>
  </div>
</section>
</form>
<?php

@$nm_aset       = $_POST['nm_aset'];
@$jml_baik      = $_POST['jml_baik'];
@$jml_rusak     = $_POST['jml_rusak'];
@$keterangan    = $_POST['keterangan'];
@$jml_aset      = $jml_baik + $jml_rusak;
if (isset($_POST['submit'])) {
  include '../config/koneksi.php';

       mysql_query("UPDATE aset SET nm_aset='$nm_aset', jml_aset='$jml_aset', jml_baik='$jml_baik', jml_rusak='$jml_rusak', keterangan='$keterangan' WHERE kd_aset='$_GET[kd]'");

}
 ?>
