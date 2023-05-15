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
	<title>Exit Clearence</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel='stylesheet' href='css/new_design.css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="screen"/>
<link rel='stylesheet' href='css/amsbarang/tabel_customer.css'>
</head>
<body>
	<br/>
 <?php

include "config/koneksi_dashboard.php";
	$kode= $_GET['kode'];
	$query_mysql = mysql_query("SELECT * FROM exit_clearence WHERE kode='$kode'")or die(mysql_error());
	$nomor = 1;
	while($data = mysql_fetch_array($query_mysql)){
	?>
	
	<a href="index.php?p=list_exit_clearence">Lihat Semua Data</a>
	<form action="index.php?p=exit_clearence_edit_aksi" method="post" enctype="multipart/form-data">		
		<table id='customers'>
	
			<tr>
				<td>Kode</td>
				<td>:</td><td><b><input type="hidden" name="kode" value="<?php echo $data['kode'] ?>"><?php echo $data['kode'] ?></b>
				</td>					
			</tr>
						<tr>
				<td>idTransaksi</td>
				<td>:</td><td><b><input type="hidden" name="idTransaksi" value="<?php echo $data['idTransaksi'] ?>"><?php echo $data['idTransaksi'] ?></b>
				</td>					
			</tr>
			<tr>
				<td>Tanggal Terima Dokumen</td>
				<td>:</td><td><input type="text" id="tanggal_pengadaan" name="tgl_terima_doc" required="required" value="<?php echo $data['tgl_terima_doc'] ?>"></td>	
			</tr>
			<tr>
				<td>Tanggal Resign</td>
				<td>:</td><td><input type="text" id="tanggal" name="tgl_resign" required="required" value="<?php echo $data['tgl_resign'] ?>"></td>	
			</tr>
			<tr>


			<tr>
				<td>Region</td>
				<td>:</td><td>
					<?php echo $data['id_region'] ?>
				</td>					
			</tr>	
			<tr>
				<td>Area</td>
				<td>:</td><td>
					<?php echo $data['id_area'] ?>
				</td>					
			</tr>	
			<tr>
				<td>NPK</td>
				<td>:</td><td><input type="hidden" name="npk" value="<?php echo $data['npk'] ?>"><?php echo $data['npk'] ?>


				</td>					
			</tr>	
						<tr>
				<td>Nama Pegawai</td>
				<td>:</td><td><input type="hidden" name="nama_pegawai" value="<?php echo $data['nama_pegawai'] ?>"><?php echo $data['nama_pegawai'] ?>


				</td>					
			</tr>	
						<tr>
				<td>Jabatan</td>
				<td>:</td><td><?php echo $data['jabatan'] ?>


				</td>					
			</tr>	
						<tr>
				<td>Divisi</td>
				<td>:</td><td><?php echo $data['divisi'] ?>


				</td>					
			</tr>	
						<tr>
				<td>Departemen</td>
				<td>:</td><td><?php echo $data['departemen'] ?>


				</td>					
			</tr>	
						<tr>
				<td>Bagian</td>
				<td>:</td><td><?php echo $data['bagian'] ?>


				</td>					
			</tr>	
						<tr>
				<td>Unit</td>
				<td>:</td><td><?php echo $data['unit'] ?>


				</td>					
			</tr>	
						<tr>
				<td>Direktorat</td>
				<td>:</td><td><?php echo $data['direktorat'] ?>


				</td>					
			</tr>	
			<tr>
					<?php
					include "config/koneksi_transaksi.php";
					?>
				<td>Status Dokumen</td><td>:</td><td><select name="id_exit" id="propinsi" required="required">
					<option>Pilih Status</option>
						<?php
							//mengambil nama-nama propinsi yang ada di database		
							$propinsi = mysql_query("SELECT * FROM a_status_doc_exit ORDER BY id_exit");
							while($p=mysql_fetch_array($propinsi)){
							echo "<option value=\"$p[id_exit]\">$p[nama_exit]</option>\n";
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
			<td>Upload Doc</td>
			<td>:</td>
			<td><input type="file" name="file" required>*maks 3mb,extensi .pdf</td>
			</tr>
			<tr>
				<td></td><td></td>
				<td><input type="submit" value="Simpan"></td>					
			</tr>				
		</table>
		<input type='hidden' name='file_lama' value='<?php echo $data['doc'];?>'>
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

<!-- Note Dewa : JawaScript untuk menampilkan tanggal secara dinamis -->
<link href="tanggal/jquery-ui-1.11.4/smoothness/jquery-ui.css" rel="stylesheet" />
  <script src="tanggal/jquery-ui-1.11.4/external/jquery/jquery.js"></script>
  <script src="tanggal/jquery-ui-1.11.4/jquery-ui.js"></script>
  <script src="tanggal/jquery-ui-1.11.4/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="tanggal/jquery-ui-1.11.4/jquery-ui.theme.css">
  <script>
var $jnoc=jQuery.noConflict();
   $jnoc(document).ready(function(){
    $jnoc("#tanggal").datepicker({
    })
   })
  </script>
  <!-- Note Dewa : JawaScript untuk menampilkan tanggal secara dinamis -->
<link href="tanggal/jquery-ui-1.11.4/smoothness/jquery-ui.css" rel="stylesheet" />
  <script src="tanggal/jquery-ui-1.11.4/external/jquery/jquery.js"></script>
  <script src="tanggal/jquery-ui-1.11.4/jquery-ui.js"></script>
  <script src="tanggal/jquery-ui-1.11.4/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="tanggal/jquery-ui-1.11.4/jquery-ui.theme.css">
  <script>
var $jnoc=jQuery.noConflict();
   $jnoc(document).ready(function(){
    $jnoc("#tanggal_pengadaan").datepicker({
    })
   })
  </script>