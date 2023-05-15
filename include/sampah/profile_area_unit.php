<!-- Profile Unit / Area -->
<!DOCTYPE html>
<html>
<head>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    border: 1px solid #e7e7e7;
    background-color: #f3f3f3;
}

li {
    float: left;
}

li a, .dropbtn {
    display: inline-block;
    color: black;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
    background-color: #ddd;
}

li.dropdown {
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}
</style>
</head>
<body>

<ul>


 <li><?php
 if($user_sedang_login != true) {
    echo '<a href="index.php?p=form_login" >Login</a>';
}
?>
</li>
  <li class="dropdown">
  <a href="#" class="dropbtn"><?php if($user_sedang_login == true) {
    if($hak_akses >= 8) {
        echo 'Transaksi';
    }
}
?></a>
  <div class="dropdown-content">


<?php if($user_sedang_login == true) {
    if($hak_akses >= 8) {
        echo '<a href="index.php?p=b_penerimaan" >Penerimaan</a>';
    }
}
?></a>
<?php if($user_sedang_login == true) {
    if($hak_akses >= 8) {
        echo '<a href="index.php?p=b_pengeluaran" >Pengeluaran</a>';
    }
}
?></a>
     <?php if($user_sedang_login == true) {
    if($hak_akses >= 8) {
        echo '<a href="index.php?p=trx_mutasi" >Mutasi</a>';
    }
}
?></a>
<?php if($user_sedang_login == true) {
    if($hak_akses >= 8) {
        echo '<a href="index.php?p=b_change_status" >Change Status</a>';
    }
}
?></a>
<?php if($user_sedang_login == true) {
    if($hak_akses >= 8) {
        echo '<a href="index.php?p=b_list_transaksi" >List Transaksi</a>';
    }
}
?></a>
</div></li>


<li class="dropdown">
  <a href="#" class="dropbtn"><?php if($user_sedang_login == true) {
    if($hak_akses >= 6) {
        echo 'Pencarian';
    }
}
?></a>
  <div class="dropdown-content">
 <?php if($user_sedang_login == true) {
    if($hak_akses >= 6) {
        echo '<a href="index.php?p=core/b_searching" >New Pencarian Aset</a>';
    }
}
?></a>
 <?php if($user_sedang_login == true) {
    if($hak_akses >= 6) {
        echo '<a href="index.php?p=core/b_history" >New History Aset</a>';
    }
}
?></a>
<?php if($user_sedang_login == true) {
    if($hak_akses >= 7) {
        echo '<a href="index.php?p=history" >History Aset Lama</a>';
    }
}
?></a>

</div></li>

<li class="dropdown">
  <a href="#" class="dropbtn"><?php if($user_sedang_login == true) {
    if($hak_akses >= 6) {
        echo 'Master';
    }
}
?></a>
  <div class="dropdown-content">
<?php if($user_sedang_login == true) {
    if($hak_akses >= 8) {
        echo '<a href="index.php?p=b_master_stock" >Master Stock</a>';
    }
}
?></a>
<?php if($user_sedang_login == true) {
    if($hak_akses >= 8) {
        echo '<a href="index.php?p=b_master_stock_transit" >Master Stock Transit</a>';
    }
}
?></a>
<?php if($user_sedang_login == true) {
    if($hak_akses >= 8) {
        echo '<a href="index.php?p=b_master_stock_pengembalian" >Master Stock Pengembalian</a>';
    }
}
?></a>


<?php if($user_sedang_login == true) {
    if($hak_akses >= 8) {
        echo '<a href="index.php?p=qty_stock_card" >Stock Card</a>';
    }
}
?></a>


<?php if($user_sedang_login == true) {
    if($hak_akses >= 8) {
        echo '<a href="index.php?p=b_master_vendor" >Master Supplier / Vendor</a>';
    }
}
?></a>
<?php if($user_sedang_login == true) {
    if($hak_akses >= 8) {
        echo '<a href="index.php?p=b_master_pengiriman" >Master Pengiriman</a>';
    }
}
?></a>
</div></li>

</div></li>
 <li class="dropdown">
  <a href="#" class="dropbtn"><?php if($user_sedang_login == true) {
    if($hak_akses >= 8) {
        echo 'Report';
    }
}
?></a>
  <div class="dropdown-content">
  <?php if($user_sedang_login == true) {
    if($hak_akses >= 8) {
        echo '<a href="index.php?p=rekapitulasi_aset">Laporan Rekapitulasi Aset Transvision</a>';
    }
}
?>
  <div class="dropdown-content">
  <?php if($user_sedang_login == true) {
    if($hak_akses >= 8) {
        echo '<a href="index.php?p=r_report_mutasi_penambahan">Laporan Mutasi Penambahan Aset Transvision</a>';
    }
}
?>
  <div class="dropdown-content">
  <?php if($user_sedang_login == true) {
    if($hak_akses >= 8) {
        echo '<a href="index.php?p=r_report_mutasi_pengurangan">Laporan Mutasi Pengurangan Aset Transvision</a>';
    }
}
?>
  <div class="dropdown-content">
  <?php if($user_sedang_login == true) {
    if($hak_akses >= 8) {
        echo '<a href="index.php?p=r_report_rekap_penambahan_pengurangan_ro">Rekap Penambahan dan Pengurangan RO/Area/Unit</a>';
    }
}
?>
  <div class="dropdown-content">
  <?php if($user_sedang_login == true) {
    if($hak_akses >= 8) {
        echo '<a href="index.php?p=r_report_data_detail_ro">Report Data Detail RO/Area/Unit</a>';
    }
}
?>

</div></li>

<li class="dropdown">
  <a href="#" class="dropbtn"><?php if($user_sedang_login == true) {
    if($hak_akses >= 8) {
        echo 'Approval';
    }
}
?></a>
  <div class="dropdown-content">
  <?php if($user_sedang_login == true) {
    if($hak_akses >= 8) {
        echo '<a href="index.php?p=list_approval">Approval FOC</a>';
    }
}
?>
  <div class="dropdown-content">
  <?php if($user_sedang_login == true) {
    if($hak_akses >= 8) {
        echo '<a href="index.php?p=list_approval">Approval Penjualan</a>';
    }
}
?>
</div></li>
 <li class="dropdown">
  <a href="#" class="dropbtn"><?php if($user_sedang_login == true) {
    if($hak_akses >= 8) {
        echo 'Photo';
    }
}
?></a>  <div class="dropdown-content">
  <?php if($user_sedang_login == true) {
    if($hak_akses >= 8) {
        echo '<a href="index.php?p=photo_searching">Project Photo</a>';
    }
}
?>
 <div class="dropdown-content">
  <?php if($user_sedang_login == true) {
    if($hak_akses >= 8) {
        echo '<a href="count/count.php">Jumlah Validasi</a>';
    }
}
?>
 <div class="dropdown-content">
  <?php if($user_sedang_login == true) {
    if($hak_akses >= 8) {
        echo '<a href="index.php?p=photo_satgas">Anomali</a>';
    }
}
?>
 <div class="dropdown-content">
  <?php if($user_sedang_login == true) {
    if($hak_akses >= 8) {
        echo '<a href="download_photo_blm_valid.php">Download Photo Blm Valid</a>';
    }
}
?>
 <div class="dropdown-content">
  <?php if($user_sedang_login == true) {
    if($hak_akses >= 8) {
        echo '<a href="photo_download.php">Download Photo Belum Ada</a>';
    }
}
?>
 <div class="dropdown-content">
  <?php if($user_sedang_login == true) {
    if($hak_akses >= 8) {
        echo '<a href="index.php?p=photo_summary">Rekap Photo</a>';
    }
}
?>
 <div class="dropdown-content">
  <?php if($user_sedang_login == true) {
    if($hak_akses >= 8) {
        echo '<a href="index.php?p=project_pindahan">Project Pindahan</a>';
    }
}
?>
</div></li>

<li><?php
if($user_sedang_login == true) {
    if($hak_akses >= 8) {
        echo '<a href="index.php?p=r_repstock_ga" >Dashboard</a>';
    }
}
?></a></li>

<li class="dropdown">
  <a href="#" class="dropbtn"><?php if($user_sedang_login == true) {
    if($hak_akses >= 8) {
        echo 'Stock Opname';
    }
}
?></a>
<div class="dropdown-content">
  <?php if($user_sedang_login == true) {
    if($hak_akses >= 8) {
        echo '<a href="index.php?p=b_setup_so_fixed">Stock Opname Fixed Aset</a>';
    }
}
?>
  <div class="dropdown-content">
  <?php if($user_sedang_login == true) {
    if($hak_akses >= 8) {
        echo '<a href="index.php?p=b_setup_so">Stock Opname Non Fixed Aset</a>';
    }
}
?>
</div></li>

<li class="dropdown">
  <a href="#" class="dropbtn"><?php if($user_sedang_login == true) {
    if($hak_akses >= 8) {
        echo 'Approval';
    }
}
?></a>
<div class="dropdown-content">
  <?php if($user_sedang_login == true) {
    if($hak_akses >= 8) {
        echo '<a href="index.php?p=list_approval_penerimaan">Approval Penerimaan</a>';
    }
}
?>
  <div class="dropdown-content">
  <?php if($user_sedang_login == true) {
    if($hak_akses >= 8) {
        echo '<a href="index.php?p=list_approval_pengeluaran">Approval Pengeluaran</a>';
    }
}
?>
</div></li>


 <li class="dropdown">
  <a href="#" class="dropbtn"><?php if($user_sedang_login == true) {
    if($hak_akses >= 8) {
        echo 'Profile';
    }
}
?></a>
  <div class="dropdown-content">
  <?php if($user_sedang_login == true) {
    if($hak_akses >= 8) {
        echo '<a href="index.php?p=list_user_single">Profile</a>';
    }
}
?>
  <div class="dropdown-content">
  <?php if($user_sedang_login == true) {
    if($hak_akses >= 8) {
        echo '<a href="index.php?p=list_lokasi">Update Lokasi / Alamat</a>';
    }
}
?>
</div></li>
<li><?php

    if($user_sedang_login == true) {
    echo '<a href="logout.php" >Logout</a> ';
    echo '( <b>'.$datauserlogin[2]["username"].'</b> )';
}

?></a></li>
</ul>

</body>
</html>
