<?php 
include 'config/koneksi_dashboard.php';
include 'config/function_transaksi.php';

$id_product =$_POST['id_product'];
$keterangan = $_POST['keterangan'];
$username = $_POST['user'];
$nama_product= $_POST['nama_product'];


			
					$trx=trx_product_edit();
										
					$update="
					UPDATE master_product set 
					idTransaksi='".$trx."',
					n_product='".$nama_product."',
					keterangan='".$keterangan."',
					tgl_posting=NOW(),
					username='".$username."'

					where id_product='".$id_product."'
					";

					$data_update=mysqli_query($koneksi,$update) or die(mysqli_error());;

					if($data_update){

						echo "berhasil";

						$query_input_trx="INSERT INTO 
						master_product_transaksi(
						idTransaksi,
						id_product,
						n_product,
						id_status_product,
						keterangan,
						username,
						tgl_posting,
						action
						)
						VALUES
						(
						'$trx',
						'$id_product',
						'$nama_product',
						'$id_status_product',
						'$keterangan',
						'$username',
						NOW(),
						'EDIT'
						)";
	
						//echo $query_input_trx;		
						$data_trx=mysqli_query($koneksi,$query_input_trx) or die(mysqli_error());;

						if($data_trx) {
							echo "Berhasillllllllllllllll";
							?>
							<meta http-equiv="refresh" content="0; url=index.php?p=code/list_product">
							Please Wait...... redirect
							<?php
						}
					}
				

?>	
<meta http-equiv="refresh" content="0; url=index.php?p=code/list_product">

Please Wait...... redirect

</body>
</html>