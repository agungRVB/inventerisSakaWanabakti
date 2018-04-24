<?php
include_once 'header.php';
    switch (@$_GET['menu']) {
          case 'aset':
            include 'view_aset.php';
            break;
          case 'input-aset':
            include 'create_aset.php';
            break;
          case 'edit-aset':
            include 'update_aset.php';
            break;



          case 'peminjaman':
            include 'view_peminjaman.php';
            break;
          case 'input-peminjaman':
            include 'create_peminjaman.php';
            break;
          case 'edit-peminjaman':
            include 'update_peminjaman.php';
            break;


          case 'pengajuan':
            include 'view_pengajuan.php';
            break;
          case 'input-pengajuan':
            include 'create_pengajuan.php';
            break;
          case 'edit-pengajuan':
            include 'update_pengajuan.php';
            break;


          case 'user':
            include 'view_user.php';
            break;
          case 'input-user':
            include 'create_user.php';
            break;
          case 'edit-user':
            include 'update_user.php';
            break;

          case 'pengembalian':
            include 'view_pengembalian.php';
            break;
          case 'input-pengembalian':
            include 'create_pengembalian.php';
            break;
          case 'edit-pengembalian':
            include 'update_pengembalian.php';
            break;
          case 'lihat-peminjaman':
            include 'lihat_peminjaman.php';
            break;


          case 'laporan-aset':
            include 'laporan_aset.php';
            break;
          case 'laporan-peminjaman':
            include 'laporan_peminjaman.php';
            break;
          case 'laporan-pengembalian':
            include 'laporan_pengembalian.php';
            break;
          case 'laporan-pengajuan':
            include 'laporan_pengajuan.php';
            break;
          case 'laporan-transaksi':
            include 'laporan_transaksi.php';
            break;


      default:
        echo "";
        break;
    }
include_once 'footer.php';
 ?>
