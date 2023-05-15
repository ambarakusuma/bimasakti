<?php
/*
mysql_connect("10.15.193.121","cpe_new","2vyLJ5LkQfxDbxX");
mysql_select_db("cpe_migrasi");
*/
include '../config/koneksi_dashboard.php';

$npkbaru = $_GET['npkbaru'];
//$kec = mysql_query("SELECT id_lokasi,nama_lokasi FROM t_lokasi WHERE id_area='$kota' order by nama_lokasi");
$npkx = mysql_query("SELECT 
a.npk as npk_parameter,
b.nama_pegawai as nama_pegawai_parameter,
b.jabatan,
b.divisi,
b.departemen,
b.bagian,
b.unit,
b.direktorat

FROM parameter_karyawan a

LEFT JOIN karyawan b ON b.`npk`=a.`npk`

where a.id_area='$npkbaru' and a.id_status='0'");


echo "<option value=''></option>";
while($kx = mysql_fetch_array($npkx)){
    //echo "<option>test</option>";
	echo "<option value=\"".$kx['npk_parameter']."\">".$kx['npk_parameter']." - ".$kx['nama_pegawai_parameter']."</option>\n";
}
?>
