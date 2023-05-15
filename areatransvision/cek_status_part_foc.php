<?php
include '../config/koneksi_dashboard.php';
$id_supplier = $_GET['vendor'];
$id_area = $_GET['id_area'];
$no_part=$_GET['part'];
$lokasi=$_GET['lokasi'];



//$id_lokasi = $_GET['id_lokasi'];
$statuspart = mysql_query("SELECT DISTINCT

m.no_part AS no_part,
mb.part_description AS part_description,
lok.id_lokasi as id_lokasi,
lok.nama_lokasi as nama_lokasi,
sfisik.id_status_part as id_status_part,
sfisik.n_status_part as nama_status_part

FROM trx_master m

LEFT JOIN master_barang mb ON mb.no_part=m.no_part
LEFT JOIN t_region reg ON reg.id_region=m.id_region
LEFT JOIN t_area are ON are.id_area=m.id_area
LEFT JOIN t_lokasi lok ON lok.id_lokasi=m.id_lokasi
LEFT JOIN a_warna warna ON warna.id_warna=m.id_warna
LEFT JOIN qty_a_status_part sfisik ON sfisik.`id_status_part`=m.`id_sfisik`
LEFT JOIN a_status_aset saset ON saset.`id_saset`=m.`id_saset`
LEFT JOIN trx_tambah_aset tta ON tta.no_label=m.`no_label`
LEFT JOIN a_merk merk ON merk.`id_merk`=mb.`id_merk`
LEFT JOIN a_item_material item ON item.`id_itemmat`=mb.`id_itemmat`
LEFT JOIN a_kategori_aset kat ON kat.`id_kategori_aset`=mb.`id_kategori_aset`
LEFT JOIN karyawan karyawan ON karyawan.npk=m.npk
LEFT JOIN t_book_serial bss on bss.no_label=bss.no_label
left join t_book_detail tbd on tbd.idTransaksi=tta.idTransaksi
left join b_supplier sup on sup.id_supplier=tbd.id_supplier

where sup.id_supplier='$id_supplier' and m.id_area='$id_area'

and m.id_sfisik in ('STS001','STS002','STS003','STS004')

and mb.no_part='$no_part'

and lok.id_lokasi='$lokasi'


and m.no_label not in (select bss.no_label from t_book_serial bss left join t_book b on b.idTransaksi=bss.idTransaksi where b.id_approval='0')

and m.id_statusdist='1'

");

echo "<option></option>";
while($kx = mysql_fetch_array($statuspart)){
    echo "<option value=\"".$kx['id_status_part']."\">".$kx['nama_status_part']."</option>\n";
    $data_part = array(
            'id_lokasi'    		=>  $kx['id_lokasi'],
            'no_part'    		=>  $kx['no_part'],
            'id_status_part'    		=>  $kx['id_status_part'],


            );
}

 echo json_encode($data_part);

?>
