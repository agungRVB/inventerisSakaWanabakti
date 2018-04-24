        <div class="box-header with-border" style="border-bottom:1px solid #E6E4E4;padding-left:15px;background:#F5F4FD">
            <h1 class="box-title" style="font-size:150%;">Surat Masuk</h1>
        </div>
        <!-- Main content -->
        <section class="content">
          <div class="row">
                  <a href="?menu=input-masuk" style="color:#595757;float:right;">
                  <div class="tab-pane" id="glyphicons">
                    <ul class="bs-glyphicons">
                      <li>
                        <span class="glyphicon glyphicon-edit"></span>
                        <span class="glyphicon-class">Tambah</span>
                      </li>
                    </ul>
                  </div><!-- /#ion-icons -->
                  </a>
                  <?php// if (!$note==NULL) {
                  ?><!--<div class="alert alert-info alert-dismissable" style="float:right;width:30%;margin:2px -30px 0 0;padding:0 30px 0 0;overflow:hidden">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="position:relative;padding-top:7px;font-size:25px">&times;</button>
                      <h4 style="padding:7px 0 0 10px"><i class="icon fa fa-info"></i><?php//  echo $note;?></h4>
                    </div>--><?php
                //  }?>
                  <div style="width:28%;margin:5px 15px 0 5px ;padding:0 30px 0 0;overflow:hidden">
                    <font size="4px" style="float:left;padding:10px;">Data Aset Masuk</font>
                  </div>
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped" style="font-size:100%">
                    <thead>
                      <tr>
                        <th width="2%">No</th>
                        <th>Index Surat</th>
                        <th>Nomor Surat</th>
                        <th>Tanggal Surat</th>
                        <th>Prihal</th>
                        <th>Pengirim</th>
                        <th>lampiran</th>
                        <th>keterangan</th>
                        <th width="15%">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no=1;
                      include '../config/koneksi.php';
                      $sql1=mysql_query("select * from surat where jenis_surat='1'");
                      while ($bc1=mysql_fetch_array($sql1)){
                      ?><tr>
                          <td align="center"><?php echo $no; $no++;;?></td>
                          <td><?php echo $bc1['judul_surat']; ?></td>
                          <td><?php echo $bc1['nmr_surat']; ?></td>
                          <td><?php echo $bc1['tgl_surat']; ?></td>
                          <td><?php echo $bc1['prihal']; ?></td>
                          <td><?php echo $bc1['pengirim']; ?></td>
                          <td><?php echo $bc1['lampiran']; ?></td>
                          <td><?php echo $bc1['keterangan']; ?></td>
                          <td align="center">
                              <a class="action" href="<?php echo $bc1['bukti_surat']; ?>" style="padding:2.3px 4px 2.3px 8px;" >
                                <i class="fa fa-download" style="color:orange;"> </i>Unduh
                              </a><br>
                              <a class="action" href="?menu=edit-masuk&kd=<?php echo $bc1['kd_surat']; ?>" style="padding:2.3px 4px 2.3px 8px;" >
                                <i class="fa fa-edit" style="color:green;"> </i>Ubah
                              </a><br>
                              <a class="action" href="hapus_masuk.php?kd=<?php echo $bc1['kd_surat'];?>" style="padding:2.3px 4px 2.3px 8px;" >
                                <i class="fa fa-close" style="color:red"> </i>Hapus
                              </a>
                          </td>
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
        </section><!-- /.content -->
