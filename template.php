<?php 

// Oleh Agussalim 
// Frombanda
// https://sites.google.com/site/agussalim2309/agussalim 
// 23 Februari 2015 


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


<hr />
<p>Catatan : <br />
Halaman Update STB<br>
  Halaman ini <u>bisa diakses oleh user, dengan hak akses >= 2</u>. <br>
  <span style="background-color:#FF9;" >Hak akses user yang sedang login adalah <b><?php echo $hak_akses; ?></b></span>.</p>

<br/>

<br/>
<br/>