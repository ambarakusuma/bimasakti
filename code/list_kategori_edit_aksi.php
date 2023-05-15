<?php 
include 'config/koneksi_dashboard.php';
include 'config/function_transaksi.php';

$id_kategori =$_POST['id_kategori'];
$keterangan = $_POST['keterangan'];
$username = $_POST['user'];
$nama_kategori= $_POST['nama_kategori'];


			
					$trx=trx_kategori_edit();
										
					$update="
					UPDATE master_kategori set 
					idTransaksi='".$trx."',
					n_kategori='".$nama_kategori."',
					keterangan='".$keterangan."',
					tgl_posting=NOW(),
					username='".$username."'

					where id_kategori='".$id_kategori."'
					";

					$data_update=mysqli_query($koneksi,$update) or die(mysqli_error());;

					if($data_update){

						echo "berhasil";

						$query_input_trx="INSERT INTO 
						master_kategori_transaksi(
						idTransaksi,
						id_kategori,
						n_kategori,
						id_status_kategori,
						keterangan,
						username,
						tgl_posting,
						action
						)
						VALUES
						(
						'$trx',
						'$id_kategori',
						'$nama_kategori',
						'$id_status_kategori',
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
							<meta http-equiv="refresh" content="0; url=index.php?p=code/list_kategori">
							Please Wait...... redirect
							<?php
						}
					}
				

?>	
<meta http-equiv="refresh" content="0; url=index.php?p=code/list_kategori">

Please Wait...... redirect

</body>
</html>