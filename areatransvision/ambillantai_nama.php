<?php
/*
mysql_connect("10.15.193.121","cpe_new","2vyLJ5LkQfxDbxX");
mysql_select_db("cpe_migrasi");
*/
include '../config/koneksi_dashboard.php';

$kec = $_GET['kec'];
//$x="SELECT id_lantai,n_lantai FROM a_lantai WHERE id_lantai='$kec' order by n_lantai";
//echo $x;
$lantai = mysql_query("SELECT id_lantai,n_lantai FROM a_lantai WHERE id_lokasi='$kec' and id_status='0' order by n_lantai");
echo "<option value=''></option>";
while($k = mysql_fetch_array($lantai)){
    //echo "<option>test</option>";
	echo "<option value=\"".$k['n_lantai']."\">".$k['n_lantai']."</option>\n";
}
?>
