<?php
/*
mysql_connect("10.15.193.121","cpe_new","2vyLJ5LkQfxDbxX");
mysql_select_db("cpe_migrasi");
*/
include '../config/koneksi_dashboard.php';
$kota = $_GET['npk'];
$npk = mysql_query("
SELECT 
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
        
        where a.id_area='$kota' and a.id_status='0'");

echo "<option value=''></option>";
while($k = mysql_fetch_array($npk)){
    //echo "<option>test</option>";
	echo "<option value=\"".$k['npk_parameter']."\">".$k['nama_pegawai_parameter']." - ".$k['npk_parameter']."</option>\n";
}
?>
