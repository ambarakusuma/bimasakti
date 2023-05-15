<link rel='stylesheet' href='css/amsbarang/default.css'>
<link rel='stylesheet' href='css/amsbarang/tabel_customer.css'>
<link rel='stylesheet' href='css/new_design.css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="screen"/>
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
?>

<!DOCTYPE html>
<html>
<head>
    <title>STOCK CARD HISTORY</title>

<link rel='stylesheet' href='css/new_design.css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="screen"/>
</head>
<body>
        <?php
?>
<form name="formcari" method="POST" action="index.php?p=list_exit_clearence_exe">
<table width="330" border="0" cellpadding="0">
<tr bgcolor="">
<td height="25" colspan="3">
<strong> PENCARIAN PRODUCT STOCK CARD HISTORY</strong>
</td>
</tr>
<tr> <td>  Keyword :</td>
<td><strong> <input type="text" name="keyword"> </td></strong>
<td><strong><select name="pencarian" required></strong>
                                        <option value=""></option>
                                                <?php
                                                //include "koneksi2.php";
                                                include "../config/koneksi_dashboard.php";
                                                //mysqli_connect("localhost", "root", "");
                                                //mysqli_select_db("noncpeall");
                                                $sql = mysqli_query($koneksi,"SELECT nama_pencarian,id_pencarian FROM a_pencarian_exit order by no DESC");
                                                if(mysqli_num_rows($sql) != 0){
                                                while($data1 = mysqli_fetch_assoc($sql)){
                                                echo '<option selected="selected" value="'.$data1['id_pencarian'].'">'.$data1['nama_pencarian'].'</option>';
                                                 }
                                                }
                                                 ?>
                                    </select></td>
</tr>
<td></td>
<td> <input type="SUBMIT" name="SUBMIT" id="SUBMIT" value="search" > </td>

</table>
</form>
<br />
<hr>
    <br/>
    <h3><center>LIST STOCK CARD HISTORY</center></h3>
    <table border="1" class="table" id="customers" width='100%'>
        <tr>

            <th>NO</th>
			<th>IDTRANSAKSI</th>
            <th>NAMA KATEGORI</th>
            <th>NAMA PRODUCT</th>
			<th>JENIS TRANSAKSI</th>
            <th>STOCK AWAL</th>
            <th>STOCK IN</th>
            <th>STOCK OUT</th>
            <th>STOCK SEHARUSNYA</th>
            <th>STATUS PART</th>
            <th>USERNAME</th>
            <th>TGL POSTING</th>
        </tr>
        <?php
        //include "koneksi_transaksi.php";
        include "config/koneksi_dashboard.php";
        $halaman = 1000;
        $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
        $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
        //$result = mysqli_query("SELECT * FROM s_user");


        $result = mysqli_query($koneksi,"SELECT distinct
        mh.idTransaksi,
        mp.n_product,
        mk.n_kategori,
        mh.qty_sa,
        mh.qty_in,
        mh.qty_out,
        mh.qty_ss,
        mh.username,
        DATE(mh.tgl_posting) as tgl_posting,
        msp.n_status_part,
        jt.n_jtransaksi


        from master_header mh

        left join master_product mp on mp.id_product=mh.id_product
        left join master_kategori mk on mk.id_kategori=mk.id_kategori
        left join master_status_part msp on msp.id_status_part=mh.id_status_part
        left join a_jenis_transaksi jt on jt.id_jtransaksi=mh.id_jtransaksi



		");
        $total = mysqli_num_rows($result);
        $pages = ceil($total/$halaman);
        $query = mysqli_query($koneksi,"SELECT distinct
        mh.idTransaksi,
        mp.n_product,
        mk.n_kategori,
        mh.qty_sa,
        mh.qty_in,
        mh.qty_out,
        mh.qty_ss,
        mh.username,
        DATE(mh.tgl_posting) as tgl_posting,
        msp.n_status_part,
        jt.n_jtransaksi


        from master_header mh

        left join master_product mp on mp.id_product=mh.id_product
        left join master_kategori mk on mk.id_kategori=mp.id_kategori
        left join master_status_part msp on msp.id_status_part=mh.id_status_part
        left join a_jenis_transaksi jt on jt.id_jtransaksi=mh.id_jtransaksi

        order by mh.tgl_posting,idTransaksi

		
		 LIMIT $mulai, $halaman")or die(mysqli_error);
        $no =$mulai+1;
 //while ($data = mysqli_fetch_assoc($query)) {
while ($data2 = mysqli_fetch_array($query))
{
    $idTransaksi=$data2['idTransaksi'];
	$nama_kategori=$data2['n_kategori'];
    $nama_product=$data2['n_product'];
	$keterangan=$data2['keterangan'];
    $username=$data2['username'];
    $tgl_posting=$data2['tgl_posting'];
    $status_part=$data2['n_status_part'];
    $stock_awal=$data2['qty_sa'];
    $stock_in=$data2['qty_in'];
    $stock_out=$data2['qty_out'];
    $stock_ss=$data2['qty_ss'];
    $jenis_transaksi=$data2['n_jtransaksi'];
    

        echo "<tr>";
        echo "<td>".$no."</td>";
        echo "<td><b>".$idTransaksi."</b></td>";
        echo "<td>".$nama_kategori."</td>";
        echo "<td>".$nama_product."</td>";
        echo "<td>".$jenis_transaksi."</td>";
        echo "<td>".$stock_awal."</td>";
        echo "<td>".$stock_in."</td>";
        echo "<td>".$stock_out."</td>";
        echo "<td>".$stock_ss."</td>";
        echo "<td>".$status_part."</td>";
        echo "<td>".$username."</td>";
        echo "<td>".$tgl_posting."</td>";
        ?>
        <?php
        echo "</tr>";
        $no++;
?>
        <?php } ?>
    </table>
<div class="">
    <?php for ($i=1; $i<=$pages ; $i++){ ?>
    <a href="index.php?p=list_exit_clearence&halaman=<?php echo $i; ?>"><?php echo $i; ?></a>

    <?php } ?>

</div>
<br/>
