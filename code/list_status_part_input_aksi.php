<?php 
//include 'config/koneksi_dashboard.php';
include 'config/koneksi_dashboard.php';

$n_status_part=$_POST['n_status_part'];
$id_status_aktif=$_POST['id_status_aktif'];
$keterangan=$_POST['keterangan'];
$username=$_POST['user'];
?>

<?php
//generate unik kode
$query = "SELECT max(id_status_part) as maxKode FROM master_status_part";
$hasil = mysqli_query($koneksi,$query);
$data  = mysqli_fetch_array($hasil);
$kode = $data['maxKode'];

// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// misal 'BRG001', akan diambil '001'
// setelah substring bilangan diambil lantas dicasting menjadi integer
$noUrut = (int) substr($kode, 3, 3);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut++;

// membentuk kode anggota baru
// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
$char = "STS";
$new_kode = $char . sprintf("%03s", $noUrut);
  ?>
<?php
include 'config/function_transaksi.php';
$trx=trx_status_part_add();


					$query_input="INSERT INTO 
					master_status_part(
					idTransaksi,
					id_status_part,
					n_status_part,
					id_status_aktif,
					keterangan,
					username,
					tgl_posting
					)
					VALUES
					(
					'$trx',
					'$new_kode',
					'$n_status_part',
					'$id_status_aktif',
					'$keterangan',
					'$username',
					NOW()
					)";

					//echo $query_input;		
					$data2=mysqli_query($koneksi,$query_input) or die(mysqli_error());;
					//stop(); 

					
					if($data2){

						echo "sampai ga ? ";

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
						'$new_kode',
						'$n_status_part',
						'$id_status_aktif',
						'$keterangan',
						'$username',
						NOW(),
						'INSERT'
						)";
	
						//echo $query_input_trx;		
						$data_trx=mysqli_query($koneksi,$query_input_trx) or die(mysqli_error());;

						//ECHO "SAMPAI DISINI";

						if($data_trx) {
							echo "Berhasillllllllllllllll";
							?>
							<meta http-equiv="refresh" content="0; url=index.php?p=code/list_status_part">
							Please Wait...... redirect
							<?php
						}
					}
?>
</body>
</html>