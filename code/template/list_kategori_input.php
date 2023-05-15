<?php
$user = $datauserlogin[2]['username'];

?>



<link rel='stylesheet' href='css/new_design.css'>

<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>


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

<!DOCTYPE html>
<html>
<head>
	<title>Exit Clearence</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<br/>
 <?php

?>

	<a href="index.php?p=list_exit_clearence">Lihat Semua Data</a>
 
	<br/>
	<h3>Input Exit Clearence</h3>
	
	<form action="index.php?p=exit_clearence_input_aksi" method="post" enctype="multipart/form-data">		
		<table>
			<tr>
				<td>Tanggal Terima Dokumen</td>
				<td>:</td><td><input type="text" id="tanggal_pengadaan" name="tgl_terima_doc" required="required"></td>	
			</tr>
			<tr>
				<td>Tanggal Resign</td>
				<td>:</td><td><input type="text" id="tanggal" name="tgl_resign" required="required"></td>	
			</tr>
			<tr>
			<td>Region Tujuan</td><td>:</td><td><select name="region" id="propinsi" required>
			  <option value=""></option>
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
			 <td>Area Tujuan</td><td>:</td><td><select name="area" id="kota" required>
				<option value=""></option>
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
				<td>NPK</td>
				<td>:</td><td><input type="text" onKeyUp="isi_otomatis()" id="npk" name="npk" required></td>	
			</tr>
			<tr>
				<td>Nama Pegawai</td>
				<td>:</td><td><input type="text" id="nama_pegawai" name="nama_pegawai" required></td>	
			</tr>
			<tr>
				<td>Jabatan</td>
				<td>:</td><td><input type="text" id="jabatan" name="jabatan"></td>	
			</tr>

			<tr>
				<td>Divisi</td>
				<td>:</td><td><input type="text" id="divisi" name="divisi"></td>	
			</tr>

			<tr>
				<td>Departemen</td>
				<td>:</td><td><input type="text" id="departemen" name="departemen"></td>	
			</tr>

			<tr>
				<td>Bagian</td>
				<td>:</td><td><input type="text" id="bagian" name="bagian"></td>	
			</tr>

			<tr>
				<td>Unit</td>
				<td>:</td><td><input type="text" id="unit" name="unit"></td>	
			</tr>

			<tr>
				<td>Direktorat</td>
				<td>:</td><td><input type="text" id="direktorat" name="direktorat"></td>	
			</tr>
			<td>Status Dokumen</td>
				<td>:</td>
			<td><select name="status_doc" required>
		        <option value=""></option>
		        <?php
												include "config/koneksi_dashboard.php";
												//mysql_connect("localhost", "root", "");
												//mysql_select_db("noncpeall");
												$sql = mysql_query("SELECT id_exit,nama_exit FROM a_status_doc_exit order by id_exit ASC");
												if(mysql_num_rows($sql) != 0){
												while($data = mysql_fetch_assoc($sql)){
												echo '<option value="'.$data['id_exit'].'">'.$data['nama_exit'].'</option>';
												 }		
											    }
												 ?>
	          </select></td>
			<tr>
				<td>Keterangan</td>
				<td>:</td><td><textarea rows="4" cols="50" name="keterangan" placeholder="Write something.." required="required"></textarea></td>					
			</tr>
			<tr>
			<td>Upload Doc</td>
			<td>:</td>
			<td><input type="file" name="file" required>*maks 5mb,extensi .pdf</td>
			</tr>
			<tr>
				<td></td>
				<td></td><td>
				<input type="hidden" name="user" id="user" value="<?php echo $user; ?>">
				<input type="submit" value="Simpan"></td>					
			</tr>				
		</table>
	</form>

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
<!-- script untuk menampilkan NPK otomatis -->


		<script src="js/jquery.min.js"></script>
		<script type="text/javascript">
		function isi_otomatis(){
		var npk= $("#npk").val();
		$.ajax({
		url: 'function/function_npk.php',
		data:"npk="+npk ,
		}).success(function (data) {
		var json = data,
		obj = JSON.parse(json);
		$('#nama_pegawai').val(obj.nama_pegawai);
		$('#jabatan').val(obj.jabatan);
		$('#divisi').val(obj.divisi);
		$('#departemen').val(obj.departemen);
		$('#bagian').val(obj.bagian);
		$('#unit').val(obj.unit);
		$('#direktorat').val(obj.direktorat);
		});
		}
		</script>