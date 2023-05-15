<?php 


// Memuat konfigurasi 
include("config/konfigurasi.php");


?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Toko Palugada</title>
<style type="text/css" >

body {
	margin: 30px 60px 30px 60px; 
}

</style>
</head>
<body>

<!-- Menu --> 
<?php 
?>
<hr size="1" color="#CCCCCC" />


<?php 

// Membaca variable p dalam URL 

if(isset($_GET['p'])) {
	if(strlen($_GET['p']) == 0) {
		$p = "form_login"; 
	} else {
		$p = $_GET['p']; 
		include("menu.php");

	} 
} else { 
	$p = "form_login"; 
} 

// Memuat file 

if(file_exists($p . ".php")) {
	include($p . ".php"); 
} else {
	echo "Halaman tidak ditemukan.";
}

?>

<!-- Footer -->
<br/>
<br/>
<br/>
<br/>
<hr size="1" color="#CCCCCC" />
<table>
<center>
	&copy; <a href="www.transvision.co.id" >Kesusahan adalah Kemudahan Yang diabaikan</a><br/>
		<?php echo $waktu_server; ?>
</center>
</table>
</body>
</html>