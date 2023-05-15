<?php
$user = $datauserlogin[2]['username'];

?>



<link rel='stylesheet' href='css/new_design.css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="screen"/>
<link rel='stylesheet' href='css/amsbarang/default.css'>


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
	<title>INPUT PRODUCT</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<br/>
 <?php

?>

	<a href="index.php?p=code/list_product">LIHAT LIST PRODUCT</a>
 
	<br/>
	<h3>INPUT PRODUCT</h3>
	
	<form action="index.php?p=code/list_product_input_aksi" method="post">		
		<table>
			<tr>
				<td>ID PRODUCT</td>
				<td>:</td><td><input type="hidden"  name="id_product">GENERATE BY SYSTEM</td>	
			</tr>
			<tr>
			<td>NAMA KATEGORI</td>
				<td>:</td>
				<td><select name="id_kategori" required>
		        <option value=""></option>
		        <?php
												include "config/koneksi_dashboard.php";
												//mysqli_connect("localhost", "root", "");
												//mysqli_select_db("noncpeall");
												$sql_kat = mysqli_query($koneksi,"SELECT id_kategori,n_kategori FROM master_kategori order by id_kategori ASC");
												if(mysqli_num_rows($sql_kat) != 0){
												while($data_kat = mysqli_fetch_assoc($sql_kat)){
												echo '<option value="'.$data_kat['id_kategori'].'">'.$data_kat['id_kategori'].' - '.$data_kat['n_kategori'].'</option>';
												 }		
											    }
												 ?>
	          </select></td>
											</tr>
			<tr>
				<td>NAMA PRODUCT</td>
				<td>:</td><td><input type="text" name="nama_product" required></td>	
			</tr>
			<tr>
			<td>STATUS PRODUCT</td>
				<td>:</td>
			<td><select name="id_status_product" required>
		        <option value=""></option>
		        <?php
												include "config/koneksi_dashboard.php";
												//mysqli_connect("localhost", "root", "");
												//mysqli_select_db("noncpeall");
												$sql = mysqli_query($koneksi,"SELECT id_status_aktif,nama_status_aktif FROM a_status_aktif order by id_status_aktif ASC");
												if(mysqli_num_rows($sql) != 0){
												while($data = mysqli_fetch_assoc($sql)){
												echo '<option value="'.$data['id_status_aktif'].'">'.$data['nama_status_aktif'].'</option>';
												 }		
											    }
												 ?>
	          </select></td>
											</tr>
			<tr>
				<td>KETERANGAN</td>
				<td>:</td><td><textarea rows="4" cols="50" name="keterangan" placeholder="Write something.." required="required"></textarea></td>					
			</tr>
			<tr>
				<td></td>
				<td></td><td>
				<input type="hidden" name="user" id="user" value="<?php echo $user; ?>">
				<input type="submit" value="Simpan"></td>					
			</tr>				
		</table>
	</form>
