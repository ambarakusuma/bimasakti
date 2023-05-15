<?php 

//I DEWA MADE AMBARA KUSUMA


// Variable Koneksi ke Database 
// ===================================================== 


$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'palugada';

$server = "localhost";
$username = "root"; 
$password = "";
$database = "palugada"; 


// ===================================================== 

// Setting Time zone
date_default_timezone_set('Asia/Jakarta'); 
$waktu_server = date('Y-m-d H:i:s', time());

// Setting tidak menampilkan error 
error_reporting(0); 

// Membuat Koneksi ke database 
$con = mysql_connect($host,$user,$pass);

// Menangani kondisi koneksi 
if (!$con) {
	die('Tidak ada koneksi ke Database : ' . mysql_error());
} 

// Memilih Database 
mysql_select_db($db, $con); 

// Memuat functions 
include("./functions.php");

// Memuat informasi User Login 
// Mendeteksi informasi tentang user login 
$datauserlogin = fb_cek_user_login(); 

// Data berikut ini ada saat user login 
// Memuat informasi Sudah Login atau Belum 
// $user_sedang_login bernilai true saat user sedang login 
if(isset($datauserlogin[0])) {
	$user_sedang_login = $datauserlogin[0]; 
} else {
	$user_sedang_login = false; 
}

// Data berikut ini ada saat user login 
// Memuat informasi Hak Akses 
// $hak_akses bernilai 1 sampai 10, jika user sedang login 
if(isset($datauserlogin[2]['hak_akses'])) {
	$hak_akses = $datauserlogin[2]['hak_akses']; 
} else {
	$hak_akses = 0; 
}

?>