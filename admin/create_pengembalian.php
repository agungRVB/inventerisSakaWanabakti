<?php
include '../config/koneksi.php';
$sql1 = mysql_query("SELECT * FROM peminjaman WHERE kd_pinjam='$_GET[kd]'");
$bc1  = mysql_fetch_array($sql1);
$sql2 = mysql_query("SELECT * FROM aset WHERE kd_aset='$bc1[kd_aset]'");
$bc2  = mysql_fetch_array($sql2);
 ?>

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
<div class="box-header with-border" style="border-bottom:1px solid #E6E4E4;padding-left:15px;background:#F5F4FD">
  <h1 class="box-title" style="font-size:150%;">Pengembalian Aset</h1>
</div>
<section class="content-header">
  <font size="4px">Tambah Pengembalian Aset</font>
</section>
<section class="content">
 <div class="box box-primary" style="width:100%;margin:0 auto;">
	<div class="box-body"  style="width:99.5%">
	  <table style="width:100%;line-height:40px;position:relative;top:-15px">
      <tr><div class="form-group">
          <td style="font-size:90%"><label for="exampleInputEmail1">Nama Peminjam</label></td><td>:</td>
          <td><?php echo $bc1['nm_peminjam']; ?></td>
          </div>
      </tr>
      <tr><div class="form-group">
          <td style="font-size:90%"><label for="exampleInputEmail1">Nama Barang</label></td><td>:</td>
          <td><?php echo $bc2['nm_aset']." ".$bc1['jml_baik']." Kondisi Baik | ".$bc1['jml_rusak']." Kondisi Rusak"; ?></td>
          </div>
      </tr>
      <tr><div class="form-group">
          <td style="font-size:90%"><label for="exampleInputEmail1">Tanggal Peminjam</label></td><td>:</td>
          <td><?php echo $bc1['tgl_pinjam']; ?></td>
          </div>
      </tr>
      <tr><div class="form-group">
          <td style="font-size:90%"><label for="exampleInputEmail1">Jumlah Kembali Kondisi Baik</label></td><td>:</td>
          <td><input type="text" class="form-control" name="jml_baik" placeholder="" required></td>
          </div>
      </tr>
      <tr><div class="form-group">
          <td style="font-size:90%"><label for="exampleInputEmail1">Jumlah Kembali Kondisi Rusak</label></td><td>:</td>
          <td><input type="text" class="form-control" name="jml_rusak" placeholder="" required></td>
          </div>
      </tr>
      <tr><div class="form-group">
          <td style="font-size:90%"><label for="exampleInputEmail1">Tanggal Kembali</label></td><td>:</td>
          <td><div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input type="text" name="tgl_kembali" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
          </div></td>
          </div>
      </tr>


      <tr><div class="form-group">
          <td style="font-size:90%" valign="top"><label for="exampleInputEmail1">Keterangan</label></td><td valign="top">:</td>
          <td><textarea class="textarea" name="keterangan" placeholder="" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea></td>
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
@$kd_pinjam    = $bc1['kd_pinjam'];
@$kd_aset      = $bc2['kd_aset'];
@$jml_baik     = $_POST['jml_baik'];
@$jml_rusak    = $_POST['jml_rusak'];
@$tgl_kembali  = $_POST['tgl_kembali'];
@$keterangan   = $_POST['keterangan'];


      $sql3 = mysql_query("SELECT * FROM `pengembalian` WHERE kd_kembali IN (SELECT MAX(kd_kembali) FROM pengembalian)");
      $bc3  = mysql_fetch_array($sql3);
      $kode_terakhir = $bc3['kd_kembali'] + 1;

      $sql4 = mysql_query("SELECT * FROM aset WHERE kd_aset='$kd_aset'");
      $bc4  = mysql_fetch_array($sql4);
      $tambahbaik = $bc4['jml_baik'] - $jml_baik;
      $tambahrusak = $bc4['jml_rusak'] - $jml_rusak;
      $tambahjumlah = $bc4['jml_aset'] - ($jml_baik + $jml_rusak);

if (isset($_POST['submit'])) {

       mysql_query("UPDATE peminjaman SET stts_pinjam='Dikembalikan' WHERE kd_pinjam='$kd_pinjam'");
       mysql_query("INSERT INTO pengembalian (kd_kembali, kd_pinjam, kd_aset, jml_baik, jml_rusak, tgl_kembali, keterangan) VALUES ('', '$kd_pinjam', '$kd_aset', '$jml_baik', '$jml_rusak', '$tgl_kembali', '$keterangan');");
      // mysql_query("INSERT INTO transaksi (kd_transaksi, kd_detail, kd_aset, jns_transaksi, tgl_transaksi) VALUES ('', '$kode_terakhir', '$kd_aset', 'Pengembalian', '$tgl_kembali');");
       mysql_query("UPDATE aset SET jml_aset='$tambahjumlah', jml_baik='$tambahbaik', jml_rusak='$tambahrusak' WHERE kd_aset='$kd_aset'");
}
 ?>
