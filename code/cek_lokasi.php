<?php
include '../config/koneksi_dashboard.php';
$propinsi2 = $_GET['propinsi2'];
//$login_area = $_GET['login_area'];
$kota = mysqli_query($koneksi,"

SELECT 
ms.id_product,
msp.n_status_part,
ms.id_status_part

FROM master_stock ms

left join master_status_part msp on msp.id_status_part=ms.id_status_part


 WHERE ms.id_product='".$propinsi2."' and msp.id_status_aktif='0'");


//echo "<option>-- Pilih Kabupaten/Kota --</option>";
echo "<option value=''>Pilih Status</option>";
while($k = mysqli_fetch_array($kota)){
    echo "<option value=\"".$k['id_status_part']."\">".$k['n_status_part']."</option>\n";
    $data_part = array(
            'n_status_part'    		=>  $k['n_status_part'],
            'id_product'    		=>  $k['id_product'],


            );
}

 echo json_encode($data_part);

?>
