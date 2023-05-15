<?php
include '../config/koneksi_dashboard.php';
$propinsi2 = $_GET['propinsi2'];
$login_area = $_GET['login_area'];
$kota = mysql_query("select distinct 

m.no_label, 
tta.idTransaksi, 
bd.id_supplier, 
sup.nama_supplier,
mb.no_part 

from trx_master m 
left join master_barang mb on mb.no_part=m.no_part 
left join trx_tambah_aset tta on tta.no_label=m.no_label 
left join t_book_detail bd on bd.idTransaksi=tta.idTransaksi 
left join b_supplier sup on sup.id_supplier=bd.id_supplier 

where mb.id_kategori_aset='B' and m.id_area='".$login_area."' and bd.id_supplier='".$vendor."'");


//echo "<option>-- Pilih Kabupaten/Kota --</option>";
echo "<option value=''>Pilih Lokasi</option>";
while($k = mysql_fetch_array($kota)){
    echo "<option value=\"".$k['id_lokasi']."\">".$k['nama_lokasi']."</option>\n";
    $data_part = array(
            'id_lokasi'    		=>  $k['id_lokasi'],
            'no_part'    		=>  $k['no_part'],
            );
}

 echo json_encode($data_part);

?>
