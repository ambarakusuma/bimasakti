<?php
require_once('../../config/koneksi_dashboard.php');

if (isset($_POST['id_product']) && isset($_POST['n_product']) && isset($_POST['keterangan']) && isset($_POST['id_status_product'])) {
	$id_product   	        = $_POST['id_product'];
	$n_product 	            = $_POST['n_product'];
	$keterangan 			= $_POST['keterangan'];
	$id_status_product 	    = $_POST['id_status_product'];
	$sql = $koneksi->prepare("INSERT INTO master_product (id_product, n_product, keterangan, id_status_product) VALUES (?, ?, ?, ?)");
	$sql->bind_param('ssdd', $id_product, $n_product, $keterangan, $id_status_product);
	$sql->execute();
	if ($sql) {
		//echo json_encode(array('RESPONSE' => 'SUCCESS'));
		header("location:../readapi/tampil.php");
	} else {
		echo json_encode(array('RESPONSE' => 'FAILED'));
	}
} else {
	echo "GAGAL";
}