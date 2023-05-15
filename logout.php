<?php 

// Memuat konfigurasi 
include("config/konfigurasi.php");

// Hapus Cookie 
setcookie("key_login", "0", time()-(24*3600*30),"/"); 	

if(isset($_COOKIE['key_login'])) {
		
	$key_login = $_COOKIE['key_login']; 
	
	// Update catatan login 
	$sql_logout = "
	UPDATE s_login SET status = '0' 
	WHERE key_login = '$key_login'  
	LIMIT 1;
	";
	
	$query_logout = mysql_query($sql_logout); 
	
	if($query_logout) { 
		alihkan_halaman('index.php?p=form_login'); 
	} else {
		echo "Tidak sempurna logout."; 
	}
}



?>