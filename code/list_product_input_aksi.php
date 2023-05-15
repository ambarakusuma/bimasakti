<?php 
//include 'config/koneksi_dashboard.php';
include 'config/koneksi_dashboard.php';
$id_kategori=$_POST['id_kategori'];
echo "isi";
echo $id_kategori;
$nama_product=$_POST['nama_product'];
$id_status_product=$_POST['id_status_product'];
$keterangan=$_POST['keterangan'];
$username=$_POST['user'];
?>

<?php
//generate unik kode
$query = "SELECT max(id_product) as maxKode FROM master_product";
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
$char = "PRO";
$new_kode = $char . sprintf("%03s", $noUrut);
  ?>
<?php
include 'config/function_transaksi.php';
$trx=trx_product_add();


					$query_input="INSERT INTO 
					master_product(
					idTransaksi,
					id_product,
					id_kategori,
					n_product,
					id_status_product,
					keterangan,
					username,
					tgl_posting
					)
					VALUES
					(
					'$trx',
					'$new_kode',
					'$id_kategori',
					'$nama_product',
					'$id_status_product',
					'$keterangan',
					'$username',
					NOW()
					)";

					echo $query_input;	
					//stop();	
					$data2=mysqli_query($koneksi,$query_input) or die(mysqli_error());;
					//stop(); 

					
					if($data2){

						
						$query_input_trx="INSERT INTO 
						master_product_transaksi(
						idTransaksi,
						id_kategori,
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
						'$id_kategori',
						'$new_kode',
						'$nama_product',
						'$id_status_product',
						'$keterangan',
						'$username',
						NOW(),
						'INSERT'
						)";
	
						echo $query_input_trx;		
						$data_trx=mysqli_query($koneksi,$query_input_trx) or die(mysqli_error());;

						//ECHO "SAMPAI DISINI";

						if($data_trx) {
							echo "Berhasillllllllllllllll";
							?>
							<meta http-equiv="refresh" content="0; url=index.php?p=code/list_product">
							Please Wait...... redirect
							<?php
						}
					}
				
				
			

?>
</body>
</html>