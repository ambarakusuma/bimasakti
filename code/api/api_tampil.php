<?php
require_once('../../config/koneksi_dashboard.php');
$myArray = array();
if ($result = mysqli_query($koneksi, "SELECT * FROM master_product ORDER BY id_product ASC")) {
    	while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        	$myArray[] = $row;
    	}
	mysqli_close($koneksi);
    	echo json_encode($myArray);
}