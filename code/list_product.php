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
    <title>Management Data Region</title>

<link rel='stylesheet' href='css/new_design.css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="screen"/>
</head>
<body>
        <?php
?>
<form name="formcari" method="POST" action="index.php?p=code/list_product">
<table width="330" border="0" cellpadding="0">
<tr bgcolor="">
<td height="25" colspan="3">
<strong> PENCARIAN product</strong>
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
    <a class="tombol" href="index.php?p=code/list_product_input">+ Tambah Data Baru</a> 
    <h3><center>LIST product</center></h3>
    <table border="1" class="table" id="customers" width='100%'>
        <tr>

            <th>NO</th>
			<th>IDTRANSAKSI</th>
            <th>ID PRODUCT</th>
            <th>NAMA PRODUCT</th>
			<th>STATUS PRODUCT</th>
            <th>KETERANGAN</th>
            <th>USERNAME</th>
            <th>TGL POSTING</th>
            <th>ACTION</th>
        </tr>
        <?php
        //include "koneksi_transaksi.php";
        include "config/koneksi_dashboard.php";
        $halaman = 1000;
        $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
        $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
        //$result = mysqli_query("SELECT * FROM s_user");


        $result = mysqli_query($koneksi,"
		select 
		idTransaksi,
		id_product,
		n_product,
		keterangan,
		username,
		tgl_posting,
		id_status_product
		
		from master_product
		");
        $total = mysqli_num_rows($result);
        $pages = ceil($total/$halaman);
        $query = mysqli_query($koneksi,"select 
		idTransaksi,
		id_product,
		n_product,
		keterangan,
		username,
		tgl_posting,
		id_status_product 
		
		from master_product
		
		 LIMIT $mulai, $halaman")or die(mysqli_error);
        $no =$mulai+1;
 //while ($data = mysqli_fetch_assoc($query)) {
while ($data2 = mysqli_fetch_array($query))
{
    $idTransaksi=$data2['idTransaksi'];
	$id_product=$data2['id_product'];
	$n_product=$data2['n_product'];
    $keterangan=$data2['keterangan'];
    $username=$data2['username'];
    $tgl_posting=$data2['tgl_posting'];
    $id_status_product=$data2['id_status_product'];


if($id_exit=='ONP')
    {
    $status_doc2="<font color='RED'>".$status_doc."</font>";

    }else {

        $status_doc2="<font color='BLUE'>".$status_doc."</font>";
    };


        echo "<tr>";
        echo "<td>".$no."</td>";
        echo "<td><b>".$idTransaksi."</b></td>";
        echo "<td>".$id_product."</td>";
        echo "<td>".$n_product."</td>";
        echo "<td>".$id_status_product."</td>";
        echo "<td>".$keterangan."</td>";
        echo "<td>".$username."</td>";
        echo "<td>".$tgl_posting."</td>";
        ?>
        <td>
                <a class="edit" href="index.php?p=code/list_product_edit&id_product=<?php echo $id_product; ?>">EDIT</a>
        </td>
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
