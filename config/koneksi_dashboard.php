<?php


$server = "localhost";
$username = "root"; 
$password = "";
$database = "palugada"; 


mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");
$koneksi = mysqli_connect($server, $username, $password, $database);
?>
