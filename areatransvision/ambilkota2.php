<?php
/*
mysql_connect("10.15.193.121","cpe_new","2vyLJ5LkQfxDbxX");
mysql_select_db("cpe_migrasi");
*/
include '../config/koneksi_dashboard.php';
$propinsi = $_GET['propinsi'];
$kota = mysql_query("SELECT id_area,nama_area FROM t_area WHERE id_region='$propinsi' order by nama_area");
//echo "<option>-- Pilih Kabupaten/Kota --</option>";
echo "<option></option>";
while($k = mysql_fetch_array($kota)){
    echo "<option value=\"".$k['id_area']."\">".$k['nama_area']."</option>\n";
}
?>
