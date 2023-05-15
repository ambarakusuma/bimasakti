<?php
include '../config/koneksi_dashboard.php';
$propinsi2 = $_GET['propinsi2'];
$login_area = $_GET['login_area'];
$statuspart = $_GET['statuspart'];
$kota = mysql_query("SELECT
mb.no_part AS no_part,
mb.part_description AS part_description,
a_merk.`n_merk` AS merk,
matgroup.`nama_materialgroup` AS materialgroup,
a_uom.`nama_uom` AS uom,
a_uom.id_uom as id_uom,
a_merk.id_merk as id_merk,
ms.`qty_ss` AS stock,
ms.id_lokasi as id_lokasi,
t_lokasi.nama_lokasi as nama_lokasi

FROM master_barang mb
LEFT JOIN a_merk a_merk ON a_merk.`id_merk`=mb.`id_merk`
LEFT JOIN a_materialgroup matgroup ON matgroup.`id_materialgroup`=mb.`id_materialgroup`
LEFT JOIN a_uom a_uom ON a_uom.`id_uom`=mb.`id_uom`
LEFT JOIN qty_master_stock ms ON mb.`no_part`=ms.`no_part`
LEFT JOIN t_lokasi t_lokasi ON ms.`id_lokasi`=t_lokasi.`id_lokasi`

 WHERE ms.id_area='".$login_area."' and mb.no_part='".$propinsi2."' and mb.id_statuspart='".$statuspart."'");


//echo "<option>-- Pilih Kabupaten/Kota --</option>";
echo "<option value=''></option>";
while($k = mysql_fetch_array($kota)){
    echo "<option value=\"".$k['id_lokasi']."\">".$k['nama_lokasi']."</option>\n";
    $data_part = array(
            'id_lokasi'    		=>  $k['id_lokasi'],
            'no_part'    		=>  $k['no_part'],


            );
}

 echo json_encode($data_part);

?>
