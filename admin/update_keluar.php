<?php
 include '../config/koneksi.php';
 $sql=mysql_query("SELECT * FROM surat WHERE kd_surat='$_GET[kd]'");
 $bc=mysql_fetch_array($sql);
 ?>

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
<div class="box-header with-border" style="border-bottom:1px solid #E6E4E4;padding-left:15px;background:#F5F4FD">
  <h1 class="box-title" style="font-size:150%;">Surat Keluar</h1>
</div>
<section class="content-header">
  <font size="4px">Edit Surat Keluar</font>
</section>
<section class="content">
 <div class="box box-primary" style="width:100%;margin:0 auto;">
	<div class="box-body"  style="width:99.5%">
	  <table style="width:100%;line-height:40px;position:relative;top:-15px">
      <tr><div class="form-group">
          <td style="font-size:90%"><label for="exampleInputEmail1">Judul Surat</label></td><td>:</td>
          <td><input type="text" class="form-control" value="<?php echo $bc['judul_surat']; ?>" name="judul_surat" placeholder="" required></td>
          </div>
      </tr>
      <tr><div class="form-group">
          <td style="font-size:90%"><label for="exampleInputEmail1">Nomor Surat</label></td><td>:</td>
          <td><input type="text" class="form-control" value="<?php echo $bc['nmr_surat']; ?>" name="nmr_surat" placeholder="" required></td>
          </div>
      </tr>
      <tr><div class="form-group">
          <td style="font-size:90%"><label for="exampleInputEmail1">Tanggal Surat</label></td><td>:</td>
          <td><div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input type="text" name="tgl_surat" value="<?php echo $bc['tgl_surat'];?>" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
          </div></td>
          </div>
      </tr>
      <tr><div class="form-group">
          <td style="font-size:90%"><label for="exampleInputEmail1">Prihal</label></td><td>:</td>
          <td><input type="text" class="form-control" value="<?php echo $bc['prihal']; ?>" name="prihal" placeholder="" required></td>
          </div>
      </tr>
      <tr><div class="form-group">
          <td style="font-size:90%"><label for="exampleInputEmail1">Penerima Surat</label></td><td>:</td>
          <td><input type="text" class="form-control" value="<?php echo $bc['penerima']; ?>" name="penerima" placeholder="" required></td>
          </div>
      </tr>
      <tr><div class="form-group">
          <td style="font-size:90%"><label for="exampleInputEmail1">Tema Surat</label></td><td>:</td>
          <td><input type="text" class="form-control" value="<?php echo $bc['tema']; ?>" name="tema" placeholder="" required></td>
          </div>
      </tr>
      <tr><div class="form-group">
          <td style="font-size:90%"><label for="exampleInputEmail1">Jumlah Lapiran </label></td><td>:</td>
          <td><input type="text" class="form-control" value="<?php echo $bc['lampiran']; ?>" name="lampiran" placeholder="" required></td>
          </div>
      </tr>
      <tr><div class="form-group">
          <td style="font-size:90%" valign="top"><label for="exampleInputEmail1">Deskripsi Projek</label></td><td valign="top">:</td>
          <td><textarea class="textarea" name="keterangan" placeholder="" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $bc['keterangan']; ?></textarea></td>
          </div>
      </tr>
      <tr>
        <tr>
          <div class="form-group">
              <td style="font-size:90%" valign="top"><label for="exampleInputEmail1">File Surat</label></td><td valign="top">:</td>
              <td><input type="file" name="surat" value=""></td>
              </div>
        </tr>
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
@$judul_surat   = $_POST['judul_surat'];
@$nmr_surat     = $_POST['nmr_surat'];
@$prihal        = $_POST['prihal'];
@$penerima      = @$_POST['penerima'];
@$tema          = @$_POST['tema'];
@$lampiran      = $_POST['lampiran'];
@$bukti_surat   = $_POST['surat'];
@$keterangan    = @$_POST['keterangan'];
@$tgl_surat     = $_POST['tgl_surat'];
if (isset($_POST['submit'])) {
  include '../config/koneksi.php';
  $tipe_file=$_FILES['surat']['type'];
  $lokasifile=$_FILES['surat']['tmp_name'];

     $namafile=trim($_FILES['surat']['name']);
     $ukurangambar=$_FILES['surat']['size'];
                          //untuk memilih tipe file untuk masuk ke direktory
                          if(empty($namafile) and empty($tipe_file) and empty($lokasifile) and empty($ukurangambar)){
                                mysql_query("UPDATE surat SET judul_surat='$judul_surat', nmr_surat='$nmr_surat', tgl_surat='$tgl_surat', prihal='$prihal', jenis_surat='2', pengirim='tata usaha', penerima='$penerima', tema='$tema', lampiran='$lampiran', keterangan='$keterangan' WHERE kd_surat='$_GET[kd]'");
                          }else{

                          $FileType = pathinfo($namafile,PATHINFO_EXTENSION);
                          if($FileType != "doc" and
                             $FileType != "pdf" and
                             $FileType != "docx"){

                                   echo"file yang di masukan bukan file dokumen";

                        }else{
     $acak=rand(0000,9999);
     $namaupload=$acak.$namafile;
     $direktori="../bukti_surat/$namaupload";
move_uploaded_file($lokasifile,"$direktori");
       mysql_query("UPDATE surat SET judul_surat='$judul_surat', nmr_surat='$nmr_surat', tgl_surat='$tgl_surat', prihal='$prihal',
       jenis_surat='1', pengirim='tata usaha', penerima='$penerima', tema='$tema',
       lampiran='$lampiran', bukti_surat='$direktori', keterangan='$keterangan' WHERE kd_surat='$_GET[kd]'");
     }
  }
}
 ?>
