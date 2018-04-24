Aset<?php
    include '../config/koneksi.php';
    $sql1 = mysql_query("SELECT * FROM peminjaman WHERE kd_pinjam='$_GET[kd]'");
    $bc1  = mysql_fetch_array($sql1);
 ?>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
<div class="box-header with-border" style="border-bottom:1px solid #E6E4E4;padding-left:15px;background:#F5F4FD">
  <h1 class="box-title" style="font-size:150%;">Peminjaman Aset</h1>
</div>
<section class="content-header">
  <font size="4px">Edit Peminjaman Aset</font>
</section>
<section class="content">
 <div class="box box-primary" style="width:100%;margin:0 auto;">
	<div class="box-body"  style="width:99.5%">
	  <table style="width:100%;line-height:40px;position:relative;top:-15px">
      <tr><div class="form-group">
          <td style="font-size:90%"><label for="exampleInputEmail1">Nama Peminjam</label></td><td>:</td>
          <td><input type="text" class="form-control" value="<?php echo $bc1['nm_peminjam'];?>" name="nm_peminjam" placeholder="" required></td>
          </div>
      </tr>
      <tr>
        <div class="form-group">
          <td style="font-size:90%"><label for="exampleInputEmail1">Nama Barang</label></td><td>:</td>
          <td><div>
              <select name="kd_aset"  class="form-control select2" required style="width:100%;">
                <?php
                    include '../config/koneksi.php';
                    $sql3 = mysql_query("SELECT * FROM aset WHERE kd_aset='$bc1[kd_aset]'");
                    $bc3  = mysql_fetch_array($sql3);
                    echo"<option value=$bc3[kd_aset] selected=selected> $bc3[nm_aset]</option>";
;
                 ?>

                  <?php
                      include '../config/koneksi.php';
                      $sql2 = mysql_query("SELECT * FROM aset");
                      while ($bc2=mysql_fetch_array($sql2)) {
                            echo "<option value=$bc2[kd_aset]> $bc2[nm_aset]</option>";
                      }
                   ?>
              </select>
              <input type="hidden" name="id_server" value="<?php echo $server_items['id']?>">
              </div>
          </td>
          </div>
      </tr>
      <tr><div class="form-group">
          <td style="font-size:90%"><label for="exampleInputEmail1">Jumlah Pinjam Kondisi Baik</label></td><td>:</td>
          <td><input type="text" class="form-control" value="<?php echo $bc1['jml_baik'];?>" name="jml_baik" placeholder="" required></td>
          </div>
      </tr>
      <tr><div class="form-group">
          <td style="font-size:90%"><label for="exampleInputEmail1">Jumlah Pinjam Kondisi Rusak</label></td><td>:</td>
          <td><input type="text" class="form-control" name="jml_rusak" value="<?php echo $bc1['jml_rusak'];?>" placeholder="" required></td>
          </div>
      </tr>
      <tr><div class="form-group">
          <td style="font-size:90%"><label for="exampleInputEmail1">Tanggal Pinjam</label></td><td>:</td>
          <td><div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input type="text" name="tgl_pinjam" class="form-control" value="<?php echo $bc1['tgl_pinjam'];?>" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
          </div></td>
          </div>
      </tr>


      <tr><div class="form-group">
          <td style="font-size:90%" valign="top"><label for="exampleInputEmail1">Keterangan</label></td><td valign="top">:</td>
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
@$kd_aset      = $_POST['kd_aset'];
@$jml_baik     = $_POST['jml_baik'];
@$jml_rusak    = $_POST['jml_rusak'];
@$tgl_pinjam   = $_POST['tgl_pinjam'];
@$keterangan   = $_POST['keterangan'];
@$nm_peminjam  = $_POST['nm_peminjam'];

      $sql3 = mysql_query("SELECT * FROM `peminjaman` WHERE kd_pinjam IN (SELECT MAX(kd_pinjam) FROM peminjaman)");
      $bc3  = mysql_fetch_array($sql3);
      $kode_terakhir = $bc3['kd_pinjam'] + 1;

      $sql5 = mysql_query("SELECT * FROM `peminjaman` WHERE kd_pinjam WHERE kd_pinjam='$bc3[kd_pinjam]'");
      $bc5  = mysql_fetch_array($sql5);


      $sql4 = mysql_query("SELECT * FROM aset WHERE kd_aset='$kd_aset'");
      $bc4  = mysql_fetch_array($sql4);
      $baik  =$bc4['jml_baik'] +  $bc5['jml_baik'];
      $rusak =$bc4['jml_rusak'] + $bc5['jml_rusak'];
      $aset  =$bc4['jml_aset'] + $bc5['jml_baik'] + $bc5['jml_rusak'];
      mysql_query("UPDATE aset SET jml_aset='$aset', jml_baik='$baik', jml_rusak='$rusak' WHERE kd_aset='$kd_aset'");


      $kurangbaik = $bc4['jml_baik'] - $jml_baik;
      $kurangrusak = $bc4['jml_rusak'] - $jml_rusak;
      $kurangjumlah = $bc4['jml_aset'] - ($jml_baik + $jml_rusak);

if (isset($_POST['submit'])) {

       mysql_query("UPDATE peminjaman SET kd_aset='$kd_aset', nm_peminjam='$nm_peminjam', jml_baik='$jml_baik', jml_rusak='$jml_rusak', tgl_pinjam='$tgl_pinjam', keterangan='$keterangan' WHERE kd_pinjam='$_GET[kd]'");
       //mysql_query("INSERT INTO transaksi (kd_transaksi, kd_detail, kd_aset, jns_transaksi, tgl_transaksi) VALUES ('', '$kode_terakhir', '$kd_aset', 'Peminjaman', '$tgl_pinjam');");
       mysql_query("UPDATE aset SET jml_aset='$kurangjumlah', jml_baik='$kurangbaik', jml_rusak='$kurangrusak' WHERE kd_aset='$kd_aset'");
}
 ?>
