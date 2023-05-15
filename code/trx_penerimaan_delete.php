<?php
// Untuk mengakses halaman ini, harus login
if(!$user_sedang_login) {
    echo "Belum Login.";
    exit;
}

// Atur hak akses user, untuk halaman ini.
// Halaman ini bisa diakses oleh semua user sbb :
if($hak_akses >= 2) {
    // Lanjut
} else {
    echo "Tidak ada hak akses.";
    exit;
}
?>
<link rel='stylesheet' href='css/style_table_dashboard_all.css'>
 <link rel='stylesheet' href='css/new_design.css'>
<?php
$no_part=$_GET['no_part'];
$id_user=$_GET['username'];
$id_status_part=$_GET['status_part'];

$delete="delete from qty_transaksi_tambah_stock_temp where no_part='".$no_part."' and id_status_part='".$id_status_part."' and username='".$id_user."'";
$result=mysql_query($delete);
//echo $delete;

?>

<meta http-equiv="refresh" content="0; url=index.php?p=b_penerimaan_lainnya">