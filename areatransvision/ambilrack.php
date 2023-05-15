<?php
/*
mysql_connect("10.15.193.121","cpe_new","2vyLJ5LkQfxDbxX");
mysql_select_db("cpe_migrasi");
*/
include '../config/koneksi_dashboard.php';

$ruangan = $_GET['ruangan'];
//$x="SELECT id_lantai,n_lantai FROM a_lantai WHERE id_lantai='$kec' order by n_lantai";
//echo $x;
$rack = mysql_query("SELECT id_rack,n_rack FROM a_rack WHERE id_ruangan='$ruangan' and id_status='0' order by n_rack");
echo "<option value=''></option>";
while($rc = mysql_fetch_array($rack)){
    //echo "<option>test</option>";
	echo "<option value=\"".$rc['id_rack']."\">".$rc['n_rack']."</option>\n";
}
?>
