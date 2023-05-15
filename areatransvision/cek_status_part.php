<?php
include '../config/koneksi_dashboard.php';
$id_part = $_GET['no_part'];
$id_area = $_GET['id_area'];
$id_lokasi=$_GET['kota2'];
//$id_lokasi = $_GET['id_lokasi'];
$statuspart = mysql_query("SELECT

ms.no_part as no_part,
ms.id_area as nama_area,
ms.id_lokasi as nama_lokasi,
ms.`id_status_part` as status_part_id,
sts.n_status_part as n_status_part

from qty_master_stock ms

left join qty_a_status_part sts on sts.`id_status_part`=ms.`id_status_part`

 WHERE ms.id_area='".$id_area."' and ms.no_part='".$id_part."' and ms.id_lokasi='".$id_lokasi."' and ms.id_status_part in ('STS001','STS002','STS003','STS004') and ms.qty_ss > '0'");

echo "<option></option>";
while($kx = mysql_fetch_array($statuspart)){
    echo "<option value=\"".$kx['status_part_id']."\">".$kx['n_status_part']."</option>\n";
    $data_part = array(
            'id_lokasi'    		=>  $kx['id_lokasi'],
            'no_part'    		=>  $kx['no_part'],
            'id_status_part'    		=>  $kx['id_status_part'],


            );
}

 echo json_encode($data_part);

?>
