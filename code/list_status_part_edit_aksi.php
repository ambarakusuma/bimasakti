<?php 
include 'config/koneksi_dashboard.php';
include 'config/function_transaksi.php';

$id_status_part =$_POST['id_status_part'];
$id_status_aktif=$_POST['id_status_aktif'];
$keterangan = $_POST['keterangan'];
$username = $_POST['user'];
$nama_status_part= $_POST['nama_status_part'];


			
					$trx=trx_status_part_edit();
										
					$update="
					UPDATE master_status_part set 
					idTransaksi='".$trx."',
					n_status_part='".$nama_status_part."',
					id_status_aktif='".$id_status_aktif."',
					keterangan='".$keterangan."',
					tgl_posting=NOW(),
					username='".$username."'

					where id_status_part='".$id_status_part."'
					";

					$data_update=mysqli_query($koneksi,$update) or die(mysqli_error());;

					if($data_update){

						echo "berhasil";

						$query_input_trx="INSERT INTO 
						master_status_part_transaksi(
						idTransaksi,
						id_status_part,
						n_status_part,
						id_status_aktif,
						keterangan,
						username,
						tgl_posting,
						action
						)
						VALUES
						(
						'$trx',
						'$id_status_part',
						'$nama_status_part',
						'$id_status_aktif',
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
							<meta http-equiv="refresh" content="0; url=index.php?p=code/list_status_part">
							Please Wait...... redirect
							<?php
						}
					}
				

?>	
<meta http-equiv="refresh" content="0; url=index.php?p=code/list_status_part">

Please Wait...... redirect

</body>
</html>