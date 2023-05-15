<?php 

// Oleh Agussalim 
// Frombanda
// 23-Feb-2015 


// Memuat konfigurasi 
include("config/konfigurasi.php");

// Cek variable yang dikirim 
if(!isset($_POST['username'])) {
	echo "Tidak ada Username";
} 
if(!isset($_POST['password'])) {
	echo "Tidak ada Password";
}

// Proses variable 
$username = str_replace("'", "", $_POST['username']); 
//$password_post_md5 = md5($_POST['password']);
$password_post_md5 = $_POST['password'];

// Membuat SQL 
$sql_user = "
SELECT * 
FROM s_user 
WHERE 
username LIKE '$username' 
AND password LIKE '$password_post_md5' 
and id_status='0'
LIMIT 1; 
";

//echo $sql_user;
//stop();
// Proses Query 
$query_user = mysql_query($sql_user); 

// Cek Query 
if($query_user) {
	
	if(mysql_num_rows($query_user) > 0) {
		$datauser = mysql_fetch_assoc($query_user);
		
		// print_r($datauser); 
		$id_user = $datauser['id'];  
		//echo $id_user;
		//stop();
		$waktu_login = date('Y-m-d H:i:s', time());
		$waktu_kadaluarsa = date('Y-m-d H:i:s', time()+(24*3600)); 
		$key_login = time() . rand(1000,9000); // 13820573563348
		
		// Detect IP User 
		$ip = info_client_ip_getenv(); 
		
		// Detect Informasi PC dan Browser 
		$pc_dan_browser = info_pc_dan_browser(); 
		
		// Catat user login dalam database 
		$sql_login = "
		INSERT INTO s_login (key_login, id_user, waktu_login, waktu_kadaluarsa, status, ip, pc_dan_browser) VALUES 
		('$key_login', '$id_user', '$waktu_login', '$waktu_kadaluarsa', '1', '$ip', '$pc_dan_browser');
		"; 

		//echo $sql_login;
		//stop();
		
		// Proses catat login 
		$query_login = mysql_query($sql_login); 
		
		// Cek query login 
		if($query_login) { 
			
			// Catat login dalam cookies 
			setcookie("key_login", $key_login, time()+(24*3600),"/"); 	
			
			// Alihkan ke halaman home 
			header("location:index.php?p=home"); 
			exit; 
			
		} else { 
		
			// Menampilkan pesan 
			echo "Login tidak berhasil. #3"; 
			exit;	
		}	
	} else {
	
		// Menampilkan pesan  
		echo "Username atau Password salah."; 
		exit;	
	}	
} else { 

	// Menampilkan pesan 
	echo "Login tidak berhasil. #1"; 
	exit; 
} 

?>