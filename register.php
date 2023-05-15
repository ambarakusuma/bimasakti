<link rel='stylesheet' href='css/amsbarang/default.css'>
<link rel='stylesheet' href='css/amsbarang/tabel_customer.css'>
<link rel='stylesheet' href='css/new_design.css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="screen"/>

<!DOCTYPE html>
<html>
<head>
	<title>Register User</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<br/>
 <?php
?>
 
	<br/>
	<h3>Selamat Datang di Toko Palugada, Silahkan Input Data Diri Anda</h3>
	<form action="register_proses.php" method="post">		
		<table id='customers' width='auto'>
			<tr>
				<td>USERNAME</td>
				<td>:</td><td><input type="text" name="username" required="required" PLACEHOLDER="USERNAME"></td>
			</tr>
			<tr>
				<td>PASSWORD</td>
				<td>:</td><td><input type="text" name="password" required="required" PLACEHOLDER="PASSWORD"></td>
			</tr>
			
			<tr>
				<td>NAMA</td>
				<td>:</td><td><input type="text" name="nama" required="required" PLACEHOLDER="GUNAKAN NAMA LENGKAP"></td>
			</tr>
			<tr>
				<td>EMAIL</td>
				<td>:</td><td><input type="text" name="email" required="required" PLACEHOLDER="GUNAKAN EMAIL"></td>
			</tr>
			<tr>
				<td>HAK AKSES</td>
				<td>:</td><td><input type="hidden" name="hak_akses" VALUE="100" required="required">MEMBER</td>
			</tr>
            <tr>
                <td>NOMOR TELP</td>
                <td>:</td><td><input type="text" name="no_telp" placeholder="GUNAKAN 628XXXXXXX" required="required"></td>
            </tr>
            <tr>
				<td>KETERANGAN</td>
				<td>:</td><td><textarea rows="4" name="keterangan" placeholder='TERSERAH MAU ISI APA AJA' required="required">
				</textarea></td>					
			</tr>	
			<tr>
				<td></td>
				<td></td><td>
				<input type="hidden" name="id_region" id="region">
				<input type="hidden" name="id_profile" value='100'>
				<input type="submit" value="REGISTER"></td>					
			</tr>				
		</table>

		<p> Sudah Menjadi Member ? silahkan Login <a href="index.php">disini</a></p>
	</form>
