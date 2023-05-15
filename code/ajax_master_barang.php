<?php
include "../config/koneksi_dashboard.php";
$id_product=$_GET['propinsi2'];
$login_area=$_GET['login_area'];
$id_lokasi=$_GET['kota2'];
$statuspart=$_GET['statuspart'];


$part = mysqli_fetch_array(mysqli_query($koneksi, "


select 

ms.qty_ss,
mp.id_product,
mk.id_kategori,
mpp.price,
msp.id_status_part


from master_stock ms

left join master_status_part msp on msp.id_status_part=ms.id_status_part
left join master_product mp on mp.id_product=ms.id_product
left join master_kategori mk on mk.id_kategori=mp.id_kategori
left join master_product_price mpp on mpp.id_product=ms.id_product 

where ms.id_product='".$id_product."' and ms.id_status_part='".$statuspart."'
 "));

 
$data_part = array(
    		'qty_ss'          => $part['qty_ss'],
            'id_product'          => $part['id_product'],
            'id_kategori'          => $part['id_kategori'],
            'id_status_part'          => $part['id_status_part'],
            'price'          => $part['price'],





            
            /*
            'merk'    		=>  $part['merk'],
            'uom'    		=>  $part['uom'],
            'id_uom'    		=>  $part['id_uom'],
            'id_merk'    		=>  $part['id_merk'],
            'stock'    		=>  $part['stock'],
            'id_lokasi'    		=>  $part['id_lokasi'],
            'temp'    		=>  $part['temp'],
            'statuspart'    		=>  $part['status_part_id'],

            'id_itemmat'    		=>  $part['id_itemmat'],
            'id_kategori_aset'    		=>  $part['id_kategori_aset'],
            'id_jenis'    		=>  $part['id_jenis'],
            */


            );
 echo json_encode($data_part);