<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
<div class="box-header with-border" style="border-bottom:1px solid #E6E4E4;padding-left:15px;background:#F5F4FD">
  <h1 class="box-title" style="font-size:150%;">Log Book</h1>
</div>
<section class="content-header">
  <font size="4px">Tambah Log Book</font>
</section>
<section class="content">
 <div class="box box-primary" style="width:100%;margin:0 auto;">
	<div class="box-body"  style="width:99.5%">
	  <table style="width:100%;line-height:40px;position:relative;top:-15px">
      <tr><div class="form-group">
          <td style="font-size:90%"><label for="exampleInputEmail1">Kegiatan</label></td><td>:</td>
          <td><input type="text" class="form-control" name="kegiatan" placeholder="" required></td>
          </div>
      </tr>
      <tr><div class="form-group">
          <td style="font-size:90%"><label for="exampleInputEmail1">Tanggal Kegiatan</label></td><td>:</td>
          <td><div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input type="text" name="tgl_kegiatan" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
          </div></td>
          </div>
      </tr>

      <tr><div class="form-group">
          <td style="font-size:90%" valign="top"><label for="exampleInputEmail1">Deskripsi Kegiatan</label></td><td valign="top">:</td>
          <td><textarea class="textarea" name="deskripsi_kegiatan" placeholder="" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea></td>
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
@$kegiatan           = $_POST['kegiatan'];
@$tgl_kegiatan       = $_POST['tgl_kegiatan'];
@$deskripsi_kegiatan = $_POST['deskripsi_kegiatan'];
if (isset($_POST['submit'])) {
  include '../config/koneksi.php';
       mysql_query("INSERT INTO `log_book` (`kd_kegitan`, `kegiatan`, `tgl_kegiatan`, `deskripsi_kegiatan`) VALUES (NULL, '$kegiatan', '$tgl_kegiatan', '$deskripsi_kegiatan')");
}
 ?>
