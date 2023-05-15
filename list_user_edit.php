<link rel='stylesheet' href='css/amsbarang/default.css'>
<link rel='stylesheet' href='css/amsbarang/tabel_customer.css'>
<link rel='stylesheet' href='css/new_design.css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="screen"/>


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
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<br/>
 <?php
/*

include "config/koneksi_dashboard.php";
$query = "SELECT max(id_region) as maxKode FROM t_region";
$hasil = mysql_query($query);
$data  = mysql_fetch_array($hasil);
$id_region = $data['maxKode'];

// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// misal 'BRG001', akan diambil '001'
// setelah substring bilangan diambil lantas dicasting menjadi integer
$noUrut = (int) substr($id_region, 3, 3);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut++;

// membentuk kode anggota baru
// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
$char = "REG";
$new_id_region = $char . sprintf("%03s", $noUrut);

*/

include "koneksi_database2.php";
	$id= $_GET['username'];
	$query_mysql = mysql_query("SELECT * FROM s_user WHERE username='$id'")or die(mysql_error());
	$nomor = 1;
	while($data = mysql_fetch_array($query_mysql)){
	?>
	
	<a href="index.php?p=list_user">Lihat Semua Data</a>
	<form action="index.php?p=list_user_edit_aksi" method="post">
        <table id='customers'>
			<tr>
				<td>username</td>
				<td>:</td><td><b><input type="hidden" name="username" value="<?php echo $data['username'] ?>"><?php echo $data['username'] ?></b>
				</td>
			</tr>	
			<tr>
				<td>password</td>
				<td>:</td><td>
					<input type="text" name="password" value="<?php echo $data['password'] ?>">
				</td>					
			</tr>
				
			<tr>
				<td>nik</td>
				<td>:</td><td>
					<input type="text" name="nik" value="<?php echo $data['nik'] ?>">
				</td>					
			</tr>
			<tr>
				<td>nama</td>
				<td>:</td><td>
					<input type="text" name="nama" value="<?php echo $data['nama'] ?>">
				</td>					
			</tr>	
			<tr>
				<td>email</td>
				<td>:</td><td>
					<input type="text" name="email" value="<?php echo $data['email'] ?>">
				</td>					
			</tr>	
			<tr>
				<td>hak_akses</td>
				<td>:</td><td><b><input type="hidden" name="hak_akses" value="<?php echo $data['hak_akses'] ?>"><?php echo $data['hak_akses'] ?></b>
				</td>					
			</tr>	
			<tr>
				<td>status</td>
				<td>:</td><td><b><input type="hidden" name="status" value="<?php echo $data['status'] ?>"><?php echo $data['status'] ?></b>
				</td>
			</tr>
			<tr>
					<?php
					include "config/koneksi_transaksi.php";
					?>
				<td>Id Region</td><td>:</td><td><select name="id_region" id="propinsi" required="required">
					<option></option>
						<?php
							//mengambil nama-nama propinsi yang ada di database		
							$propinsi = mysql_query("SELECT * FROM t_region ORDER BY nama_region");
							while($p=mysql_fetch_array($propinsi)){
							echo "<option value=\"$p[id_region]\">$p[nama_region]</option>\n";
																}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Area Tujuan</td><td>:</td><td><select name="id_area" id="kota">
<option></option>
<?php
//mengambil nama-nama propinsi yang ada di database
$kota = mysql_query("SELECT * FROM t_area ORDER BY id_area");
while($p=mysql_fetch_array($propinsi)){
//echo "<option value=\"$p[id_kabkot]\">$p[nama_kabkot]</option>\n";
echo "<option value=\"$p[id_area]\">$p[nama_area]</option>\n";
}
?>
</select></td>			
			</tr>
            <tr>
                <td>NOMOR TELP</td>
                <td>:</td><td><input type="text" name="no_telp" value="<?php echo $data['telp'] ?>" placeholder="GUNAKAN 628XXXXXXX" required="required"></td>
            </tr>
            <tr>
                <td>NAMA ATASAN</td>
                <td>:</td><td><input type="text" name="atasan" value="<?php echo $data['atasan'] ?>" placeholder="ISI NAMA ATASAN LANGSUNG YA" required="required"></td>
            </tr>
            <tr>
                <td>EMAIL ATASAN</td>
                <td>:</td><td><input type="text" name="atasan_email" value="<?php echo $data['email_atasan'] ?>" placeholder="ISI ALAMAT EMAIL ATASAN LANGSUNG YA" required="required"></td>
            </tr>
			<tr>
				<td>Keterangan</td>
				<td>:</td><td>
				<textarea rows="4" name="keterangan" value="<?php echo $data['keterangan'] ?>"><?php echo $data['keterangan'] ?></textarea>
				</td>
				<!-- <input type="text" name="keterangan" value="<?php echo $data['keterangan'] ?>"> -->					
			</tr>	
			<tr>
				<td></td><td></td>
				<td><input type="submit" value="Simpan"></td>

                <input type="hidden" name="id_level" value="<?php echo $data['id_level'] ?>">
                <input type="hidden" name="id_profile" value="<?php echo $data['id_profile'] ?>">
                <input type="hidden" name="id_status" value="<?php echo $data['id_status'] ?>">
                <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                <input type="hidden" name="waktu_add" value="<?php echo $data['waktu_add'] ?>">
                <input type="hidden" name="waktu_modifi" value="<?php echo $data['waktu_modifi'] ?>">

			</tr>				
		</table>
	</form>
	<?php } ?>


<script type="text/javascript" src="areatransvision/jquery.js"></script>
<script type="text/javascript">
var htmlobjek;
$(document).ready(function(){
  //apabila terjadi event onchange terhadap object <select id=propinsi>
  $("#propinsi").change(function(){
    var propinsi = $("#propinsi").val();
    $.ajax({
        url: "areatransvision/ambilkota.php",
        data: "propinsi="+propinsi,
        cache: false,
        success: function(msg){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=kota>
            $("#kota").html(msg);
        }
    });
  });
  $("#kota").change(function(){
    var kota = $("#kota").val();
    $.ajax({
        url: "areatransvision/ambilkecamatan.php",
        data: "kota="+kota,
        cache: false,
        success: function(msg){
            $("#kec").html(msg);
        }
    });
  });
});

</script>
