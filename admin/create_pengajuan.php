<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
<div class="box-header with-border" style="border-bottom:1px solid #E6E4E4;padding-left:15px;background:#F5F4FD">
  <h1 class="box-title" style="font-size:150%;">Pengajuan Aset</h1>
</div>
<section class="content-header">
  <font size="4px">Tambah Pengajuan Aset</font>
</section>
<section class="content">
 <div class="box box-primary" style="width:100%;margin:0 auto;">
	<div class="box-body"  style="width:99.5%">
	  <table style="width:100%;line-height:40px;position:relative;top:-15px">
      <tr>
        <div class="form-group">
          <td style="font-size:90%"><label for="exampleInputEmail1">Nama Barang</label></td><td>:</td>
          <td><div>
              <select name="kd_aset"  class="form-control select2" required style="width:100%;">
                <option value="0"> -Pilih Barang-</option>

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
          <td style="font-size:90%"><label for="exampleInputEmail1">Jumlah Pengajuan</label></td><td>:</td>
          <td><input type="text" class="form-control" name="jml_pesan" placeholder="" required></td>
          </div>
      </tr>
      <!--<tr><div class="form-group">
          <td style="font-size:90%"><label for="exampleInputEmail1">Tanggal Pinjam</label></td><td>:</td>
          <td><div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input type="text" name="tgl_pesan" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
          </div></td>
          </div>
      </tr>-->


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
@$kd_aset     = $_POST['kd_aset'];
@$jml_pesan   = $_POST['jml_pesan'];
@$keterangan  = $_POST['keterangan'];
@$tgl_pesan    = date("d/m/Y");
$sql3 = mysql_query("SELECT * FROM `pesanan` WHERE kd_pesan IN (SELECT MAX(kd_pesan) FROM pesanan)");
$bc3  = mysql_fetch_array($sql3);
$kode_terakhir = $bc3['kd_pesan'] + 1;

if (isset($_POST['submit'])) {

       mysql_query("INSERT INTO pesanan (kd_pesan, kd_aset, jml_pesan, tgl_pesan, keterangan) VALUES ('', '$kd_aset', '$jml_pesan', '$tgl_pesan', '$keterangan');");
       mysql_query("INSERT INTO transaksi (kd_transaksi, kd_detail, kd_aset, jns_transaksi, tgl_transaksi) VALUES ('', '$kode_terakhir', '$kd_aset', 'Pemesanan', '$tgl_pinjam');");
       //mysql_query("UPDATE aset SET jml_aset='$kurangjumlah', jml_baik='$kurangbaik', jml_rusak='$kurangrusak' WHERE kd_aset='$kd_aset'");
}
 ?>
