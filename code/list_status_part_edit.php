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

$user = $datauserlogin[2]['username'];

?>

<!DOCTYPE html>
<html>
<head>
	<title>status_part Edit</title>
	<link rel='stylesheet' href='css/new_design.css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="screen"/>
<link rel='stylesheet' href='css/amsbarang/default.css'>
</head>
<body>
	<br/>
 <?php

include "config/koneksi_dashboard.php";
	$id_status_part= $_GET['id_status_part'];
	$query_mysql = mysqli_query($koneksi,"SELECT * FROM master_status_part WHERE id_status_part='$id_status_part'")or die(mysqli_error());
	$nomor = 1;
	while($data = mysqli_fetch_array($query_mysql)){
	?>
	
	<a href="index.php?p=code/list_status_part">LIHAT SEMUA DATA</a>
	<form action="index.php?p=code/list_status_part_edit_aksi" method="post" >		
		<table id='customers'>
	
			<tr>
				<td>ID STATUS PART</td>
				<td>:</td><td><b><input type="hidden" name="id_status_part" value="<?php echo $data['id_status_part'] ?>"><?php echo $data['id_status_part'] ?></b>
				</td>					
			</tr>
						<tr>
				<td>NAMA STATUS PART</td>
				<td>:</td><td><b><input type="text" name="nama_status_part" value="<?php echo $data['n_status_part'] ?>"></b>
				</td>					
			</tr>
			<tr>
					<?php
					include "config/koneksi_transaksi.php";
					?>
				<td>Status Aktif</td><td>:</td><td><select name="id_status_aktif" required="required">
					<option>Pilih Status</option>
						<?php
							//mengambil nama-nama propinsi yang ada di database		
							$propinsi = mysqli_query($koneksi,"SELECT * FROM a_status_aktif ORDER BY id_status_aktif");
							while($p=mysqli_fetch_array($propinsi)){
							echo "<option value=\"$p[id_status_aktif]\">$p[nama_status_aktif]</option>\n";
																}
						?>
					</select>
				</td>
			</tr>
			
			<tr>
				<td>Keterangan</td>
				<td>:</td><td>
				<textarea rows="4" cols="50" name="keterangan"><?php echo $data['keterangan'] ?></textarea>
				</td>					
			</tr>	
			<tr>
				<td></td><td></td>
				<td><input type="submit" value="Simpan"></td>					
			</tr>				
		</table>
		<input type='hidden' name='user' value='<?php echo $user;?>'>
	</form>
	<?php } ?>