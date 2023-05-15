<?php
include '../config/koneksi_dashboard.php';
//$propinsi2 = $_GET['propinsi2'];
$login_area = $_GET['id_area'];
$vendor = mysql_query("select 

distinct m.no_label, 
tta.idTransaksi, 
bd.id_supplier, 
sup.nama_supplier from trx_master m 
left join master_barang mb on mb.no_part=m.no_part 
left join trx_tambah_aset tta on tta.no_label=m.no_label 
left join t_book_detail bd on bd.idTransaksi=tta.idTransaksi 
left join b_supplier sup on sup.id_supplier=bd.id_supplier 

where mb.id_kategori_aset='B' and m.id_area='ARE016'");


//echo "<option>-- Pilih Kabupaten/Kota --</option>";
echo "<option value=''>Pilih Vendor</option>";
while($v = mysql_fetch_array($vendor)){
    echo "<option value=\"".$v['id_supplier']."\">".$v['nama_supplier']."</option>\n";
    $data_part = array(
            'id_supplier'    		=>  $v['id_supplier'],
            'nama_supplier'    		=>  $v['nama_supplier'],


            );
}

 echo json_encode($data_vendor);

?>
