<div class="box-header with-border" style="border-bottom:1px solid #E6E4E4;padding-left:15px;background:#F5F4FD">
    <h1 class="box-title" style="font-size:150%;">Pengembalian Barang</h1>
</div>
<!-- Main content -->
<section class="content">
  <div class="row">
          <?php// if (!$note==NULL) {
          ?><!--<div class="alert alert-info alert-dismissable" style="float:right;width:30%;margin:2px -30px 0 0;padding:0 30px 0 0;overflow:hidden">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="position:relative;padding-top:7px;font-size:25px">&times;</button>
              <h4 style="padding:7px 0 0 10px"><i class="icon fa fa-info"></i><?php//  echo $note;?></h4>
            </div>--><?php
        //  }?>
          <div style="width:28%;margin:5px 15px 0 5px ;padding:0 30px 0 0;overflow:hidden">
            <font size="4px" style="float:left;padding:10px;">Laporan Pengembalian Aset</font>
          </div>
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped" style="font-size:100%">
            <thead>
              <tr>
                <th width="2%">No</th>
                <th>Nama Barang</th>
                <th>Nama Peminjam</th>
                <th>Kondisi Barang</th>
                <th>Tanggal Pinjam</th>
                <th>Keterangan</th>
              </tr>
            </thead>
            <tbody>
            <?php
            $no=1;
              include '../config/koneksi.php';
              $sql1=mysql_query("SELECT * FROM pengembalian");
              while ($bc1=mysql_fetch_array($sql1)){
                  $sql2 = mysql_query("SELECT * FROM aset WHERE kd_aset='$bc1[kd_aset]'");
                  $bc2   = mysql_fetch_array($sql2);

                  $sql3 = mysql_query("SELECT * FROM peminjaman WHERE kd_pinjam='$bc1[kd_pinjam]'");
                  $bc3   = mysql_fetch_array($sql3);

              ?><tr>
                  <td align="center"><?php echo $no; $no++;;?></td>
                  <td><?php echo $bc2['nm_aset']; ?></td>
                  <td><?php echo $bc3['nm_peminjam']; ?></td>
                  <td><?php echo $bc1['jml_baik']." Baik | ".$bc1['jml_rusak']." Rusak"; ?></td>
                  <td><?php echo $bc1['tgl_kembali']; ?></td>
                  <td><?php echo $bc1['keterangan']; ?></td>

                  <!--<td align="center">
                      <!--<a class="action" href="<?php echo $bc1['bukti_surat']; ?>" style="padding:2.3px 4px 2.3px 8px;" >
                        <i class="fa fa-download" style="color:orange;"> </i>Unduh
                      </a>-->
                      <!--<a class="action" href="?menu=edit-pengembalian&kd=<?php echo $bc1['kd_pinjam']; ?>" style="padding:2.3px 4px 2.3px 8px;" >
                        <i class="fa fa-edit" style="color:green;"> </i>Ubah
                      </a>
                      <a class="action" href="hapus_pengembalian.php?kd=<?php echo $bc1['kd_pinjam'];?>" style="padding:2.3px 4px 2.3px 8px;" >
                        <i class="fa fa-close" style="color:red"> </i>Hapus
                      </a>
                  </td>-->
                </tr>
              <?php
            }
            ?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
  <table width="1120px">
    <tr align="right">
      <td><img src="../images/btn_print.png" onClick="javascript:window.print()" /></td>
    </tr>
  </table>
</section><!-- /.content -->
