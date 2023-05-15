<link rel='stylesheet' href='css/amsbarang/default.css'>
<?php
//include("config/konfigurasi.php");
//include("menu.php");
//include("index.php");
?>
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
$login_area = $datauserlogin[2]['id_area'];
echo $login_area;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Management Data Region</title>
</head>
<body>

     <link rel='stylesheet' href='css/amsbarang/tabel_customer.css'>
     <!--<link rel='stylesheet' href='css/tambah_stock.css'>-->
     <link rel='stylesheet' href='css/new_design.css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="screen"/>

<table width='100%' border='0'>
        <tr>
            <td><a href="index.php?p=trx_penerimaan"><img src="img/add-folder-xxl.png" width="30" height="30" alt="tambah_penerimaan_barang" align='left'>Tambah Penerimaan</a>
</td>
<td><td><a href="index.php?p=trx_pengeluaran"><img src="img/add-folder-xxl.png" width="30" height="30" alt="tambah_pengeluaran_barang" align='left'>Tambah Pengeluaran</a>
</td>
        </tr>
</table>

Transaksi Terakhir<br>
<table id="customers" width='100%'>
        <tr>
            <th>No</th>
            <th>idTransaksi</th>
            <th>Jenis Transaksi</th>
            <th>Nama Pengirim</th>
            <th>No Dokumen</th>
            <th>Tgl Dokumen</th>
            <th>Region Kirim</th>
            <th>Area Kirim</th>
            <th>Lokasi Kirim</th>
            <th>Username</th>
            <th>Tgl System</th>
            <th>BA</th>
            <th>Lampiran</th>
            
        </tr>
        <?php
        $id_user = $datauserlogin[2]['username'];
        include "config/koneksi_dashboard.php";
        $halaman = 50;
        $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
        $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
        $result = mysql_query("SELECT DISTINCT

        ts.idTransaksi AS idTransaksi,
        tsd.nama_pengirim AS nama_pengirim,
        tsd.no_dokumen AS no_dokumen,
        tsd.tgl_dokumen AS tgl_dokumen,
        tsd.id_region_terima AS id_region_terima,
        reg.nama_region as region_terima,
        tsd.id_area_terima AS id_area_terima,
        are.nama_area as area_terima,
        tsd.id_lokasi_terima AS id_lokasi_terima,
        lok.nama_lokasi as lokasi_terima,
        DATE(ts.tgl_posting) AS tgl_execute,
        ts.username AS username,
        jt.n_jtransaksi AS jenis_transaksi
        
        FROM qty_transaksi_stock ts
        
        
        LEFT JOIN qty_transaksi_stock_detail tsd ON tsd.idTransaksi=ts.idTransaksi
        LEFT JOIN qty_a_jtransaksi jt ON jt.`id_jtransaksi`=ts.`id_jtransaksi`

        LEFT JOIN t_region reg on reg.id_region=tsd.id_region_terima
        LEFT JOIN t_area are on are.id_area=tsd.id_area_terima
        LEFT JOIN t_lokasi lok on lok.id_lokasi=tsd.id_lokasi_terima

        where ts.id_area='".$login_area."' and jt.kategori='IN' order by ts.tgl_posting desc"
);
        $total = mysql_num_rows($result);
        $pages = ceil($total/$halaman);
        $query = mysql_query("SELECT DISTINCT

        ts.idTransaksi AS idTransaksi,
        tsd.nama_pengirim AS nama_pengirim,
        tsd.no_dokumen AS no_dokumen,
        tsd.tgl_dokumen AS tgl_dokumen,
        tsd.id_region_terima AS id_region_terima,
        reg.nama_region as region_terima,
        tsd.id_area_terima AS id_area_terima,
        are.nama_area as area_terima,
        tsd.id_lokasi_terima AS id_lokasi_terima,
        lok.nama_lokasi as lokasi_terima,
        DATE(ts.tgl_posting) AS tgl_execute,
        ts.username AS username,
        jt.id_jtransaksi as id_jenis_transaksi,
        jt.n_jtransaksi AS jenis_transaksi

        FROM qty_transaksi_stock ts
        
        
        LEFT JOIN qty_transaksi_stock_detail tsd ON tsd.idTransaksi=ts.idTransaksi
        LEFT JOIN qty_a_jtransaksi jt ON jt.`id_jtransaksi`=ts.`id_jtransaksi`

        LEFT JOIN t_region reg on reg.id_region=tsd.id_region_terima
        LEFT JOIN t_area are on are.id_area=tsd.id_area_terima
        LEFT JOIN t_lokasi lok on lok.id_lokasi=tsd.id_lokasi_terima

        where ts.id_area='".$login_area."' and jt.kategori='IN' order by ts.tgl_posting desc

LIMIT $mulai, $halaman")or die(mysql_error);
        $no =$mulai+1;

 while ($data = mysql_fetch_assoc($query)) {
 $idTransaksi=$data['idTransaksi'];
 $jenis_transaksi=$data['jenis_transaksi'];

  ?>
<tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $data['idTransaksi']; ?></td>
            <td><?php echo $data['jenis_transaksi']; ?></td>
            <td><?php echo $data['nama_pengirim']; ?></td>
            <td><?php echo $data['no_dokumen']; ?></td>
            <td><?php echo $data['tgl_dokumen']; ?></td>
            <td><?php echo $data['region_terima']; ?></td>
            <td><?php echo $data['area_terima']; ?></td>
            <td><?php echo $data['lokasi_terima']; ?></td>
            <td><?php echo $data['username']; ?></td>
            <td><?php echo $data['tgl_execute']; ?></td>
            
            <td><a class="edit" TARGET='_BLANK' href="qty_ba_penerimaan_x.php?&idTransaksi=<?php echo $idTransaksi; ?>&id_jtransaksi=<?php echo $data['id_jenis_transaksi']; ?>">BA</a></td>
            <td><a class="edit" TARGET='_BLANK' href="qty_ba_penerimaan_lampiran_x.php?&idTransaksi=<?php echo $idTransaksi; ?>&id_jtransaksi=<?php echo $data['id_jenis_transaksi']; ?>">Lampiran</a></td>
        
        </tr>
        <?php } ?>
    </table>
<div class="">
    <?php for ($i=1; $i<=$pages ; $i++){ ?>
    <a href="index.php?p=b_penerimaan&halaman=<?php echo $i; ?>"><?php echo $i; ?></a>

    <?php } ?>

</div>
<br>
<br>
<br>
<br>
<br>
<br>
<p align='left'>
</p>
