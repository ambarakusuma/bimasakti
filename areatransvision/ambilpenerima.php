<?php
/*
mysql_connect("10.15.193.121","cpe_new","2vyLJ5LkQfxDbxX");
mysql_select_db("cpe_migrasi");
*/
include '../config/koneksi_dashboard.php';
$penerima = $_GET['penerima'];
$penerima = mysql_query("

select 

a.username,
a.nama,
are.id_area,
lok.id_lokasi

from s_user a

left join t_area are on are.id_area=a.id_area
left join t_lokasi lok on lok.id_area=are.`id_area`

where lok.id_lokasi='$penerima'
");
echo "<option value=''></option>";
while($z = mysql_fetch_array($penerima)){
    //echo "<option>test</option>";
	echo "<option value=\"".$z['username']."\">".$z['nama']."</option>\n";
}
?>
