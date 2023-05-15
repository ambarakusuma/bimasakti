<?php 


// Memuat konfigurasi 
//include("../config/konfigurasi.php");


?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Asset Management Sistem  V.1</title>
<style type="text/css" >

body {
	margin: 30px 60px 30px 60px; 
}

</style>
</head>
<body>
<!-- Menu --> 
<?php 
//include("../menu.php");
?>
<hr size="1" color="#CCCCCC" />


<?php 

// Membaca variable p dalam URL 

if(isset($_GET['p'])) {
	if(strlen($_GET['p']) == 0) {
		$p = "form_login"; 
	} else {
		$p = $_GET['p']; 
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
</body>
</html>