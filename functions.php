<?php




// Cek user login 
function fb_cek_user_login() { 
	if(isset($_COOKIE['key_login'])) {
		
		$key_login = $_COOKIE['key_login']; 
		$waktu_sekarang = date('Y-m-d H:i:s', time());
		
		$sql_userlogin = "
		SELECT 

		u.id AS id_user, 
		u.username, 
		u.nama, 
		u.email, 
		u.hak_akses,
		u.region,
		u.id_region,
		u.id_area,
		u.id_level,
		u.ket_level,
        u.id_profile,
		u.id_lokasi,
		u.lantai,
		u.telp,
		u.atasan,
		u.email_atasan,
		u.ruangan,
		l.waktu_login, 
		l.waktu_kadaluarsa,
		l.ip,
		l.pc_dan_browser
		
		FROM s_login l 
		LEFT JOIN s_user u ON l.id_user = u.id 
		
		WHERE
		l.key_login = '$key_login' AND  
		u.status = 1 AND 
		l.status = 1 AND 
		'$waktu_sekarang' <= l.waktu_kadaluarsa
		
		
		LIMIT 1; 
		"; 
		
		$query_ceklogin = mysql_query($sql_userlogin);
		
		if($query_ceklogin) {
			if(mysql_num_rows($query_ceklogin) > 0) {
				
				$data_ceklogin = mysql_fetch_assoc($query_ceklogin);
				// print_r($data_ceklogin); 
				
				return array(true, 'berhasil', $data_ceklogin);
				
			} else {
				return array(false, '#3'); 	
			}
		} else {
			return array(false, '#2');	
		}
		
	} else {
		return array(false, '#1'); 	
	} 
} 

// redirect 
function alihkan_halaman($halaman_tujuan) { 
	error_reporting(0); 
	header("location:".$halaman_tujuan);
	echo '<meta http-equiv="refresh" content="0; url='.$halaman_tujuan.'">'; 
	echo '<script type="text/javascript"> window.location = "'.$halaman_tujuan.'";  </script>'; 
	echo '<a href="'.$halaman_tujuan.'" >Redirect</a>...';
	exit; 
} 

// Detect IP
function info_client_ip_getenv() {
     $ipaddress = '';
     if (getenv('HTTP_CLIENT_IP'))
         $ipaddress = getenv('HTTP_CLIENT_IP');
     else if(getenv('HTTP_X_FORWARDED_FOR'))
         $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
     else if(getenv('HTTP_X_FORWARDED'))
         $ipaddress = getenv('HTTP_X_FORWARDED');
     else if(getenv('HTTP_FORWARDED_FOR'))
         $ipaddress = getenv('HTTP_FORWARDED_FOR');
     else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
     else if(getenv('REMOTE_ADDR'))
         $ipaddress = getenv('REMOTE_ADDR');
     else
         $ipaddress = 'UNKNOWN';

     return $ipaddress; 
}

// Detect PC 
function info_pc_dan_browser() { 
	$ua = $_SERVER["HTTP_USER_AGENT"];
	return strtolower($ua); 
} 


?>