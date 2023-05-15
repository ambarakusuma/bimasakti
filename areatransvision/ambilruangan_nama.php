<?php
/*
mysql_connect("10.15.193.121","cpe_new","2vyLJ5LkQfxDbxX");
mysql_select_db("cpe_migrasi");
*/
include '../config/koneksi_dashboard.php';

$lantai = $_GET['lantai'];
//$x="SELECT id_lantai,n_lantai FROM a_lantai WHERE id_lantai='$kec' order by n_lantai";
//echo $x;
$ruangan = mysql_query("SELECT id_ruangan,n_ruangan FROM a_ruangan WHERE id_lantai='$lantai' and id_status='0' order by n_ruangan");
echo "<option value=''></option>";
while($ru = mysql_fetch_array($ruangan)){
    //echo "<option>test</option>";
	echo "<option value=\"".$ru['n_ruangan']."\">".$ru['n_ruangan']."</option>\n";
}

?>
