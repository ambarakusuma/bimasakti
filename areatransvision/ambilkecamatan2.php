<?php
/*
mysql_connect("10.15.193.121","cpe_new","2vyLJ5LkQfxDbxX");
mysql_select_db("cpe_migrasi");
*/
include '../config/koneksi_dashboard.php';
$kota = $_GET['kota'];
$kec = mysql_query("SELECT id_lokasi,nama_lokasi FROM t_lokasi WHERE id_area='$kota' and (id_status_aktif='0' or id_status_aktif='1') order by nama_lokasi");
echo "<option value=''></option>";
while($k = mysql_fetch_array($kec)){
    //echo "<option>test</option>";
	echo "<option value=\"".$k['id_lokasi']."\">".$k['nama_lokasi']."</option>\n";
}
?>
