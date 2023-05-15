<?php 
//include 'config/koneksi_dashboard.php';
include 'config/koneksi_dashboard.php';

$tgl_terima_doc		= $_POST['tgl_terima_doc'];
$tgl_resign			= $_POST['tgl_resign'];
$id_region				= $_POST['region'];
$id_area				= $_POST['area'];
$npk				= $_POST['npk'];
$nama_pegawai		= $_POST['nama_pegawai'];
$jabatan			= $_POST['jabatan'];
$divisi				= $_POST['divisi'];
$departemen			= $_POST['departemen'];
$bagian				= $_POST['bagian'];
$unit				= $_POST['unit'];
$direktorat			= $_POST['direktorat'];
$keterangan			= $_POST['keterangan'];
$user				= $_POST['user'];
$status_doc				= $_POST['status_doc'];

$tgl_terima_doc2 = date("Y-m-d", strtotime($tgl_terima_doc));
$tgl_resign2 = date("Y-m-d", strtotime($tgl_resign));


//echo $npk;
//echo $nama_pegawai;

//stop();

?>

<?php
//generate unik kode
$query = "SELECT max(kode) as maxKode FROM exit_clearence";
$hasil = mysql_query($query);
$data  = mysql_fetch_array($hasil);
$kode = $data['maxKode'];

// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// misal 'BRG001', akan diambil '001'
// setelah substring bilangan diambil lantas dicasting menjadi integer
$noUrut = (int) substr($kode, 4, 3);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut++;

// membentuk kode anggota baru
// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
$char = "EXIT";
$new_kode = $char . sprintf("%03s", $noUrut);
  ?>
<?php
//menjalankan pemeriksaan file 
			$ekstensi_diperbolehkan	= array('png','jpg','pdf');
			$nama = $_FILES['file']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];	
			//$target_upload =$location.date('Y-m-d H-i-s').'_'.basename($_FILES['fileexcel']['name']) ;
			//kode idTransaksi
			include 'function/function_transaksi.php';
			
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 10044070)
					
			{			
					$dirUpload="temp/";
					$trx=trx_exit_clearence();
					//$target=$trx.'_'.$nama;
                    $target=$trx.'_'.$npk.'_'.$nama_pegawai.'.pdf';
					//move_uploaded_file($file_tmp, 'exitclearence/'.date('Y-m-d H-i-s').'_'.$nama);
					
					//move_uploaded_file($file_tmp, 'exitclearence/'.$trx.'_'.$nama);
					//move_uploaded_file($file_tmp, 'exitclearence/'.$trx.'_'.$nama);
					move_uploaded_file($_FILES['file']['tmp_name'], $dirUpload.$target);
			
					
			
					$doc=$target;
										
					


					$query_input="INSERT INTO 
					exit_clearence(
					kode,
					idTransaksi,
					tgl_terima_doc,
					tgl_resign,
					id_region,
					id_area,
					npk,
					nama_pegawai,
					jabatan,
					divisi,
					departemen,
					bagian,
					unit,
					direktorat,
					id_exit,
					keterangan,
					username,
					tgl_posting,
					doc
					)
					VALUES
					(
					'$new_kode',
					'$trx',
					'$tgl_terima_doc2',
					'$tgl_resign2',
					'$id_region',
					'$id_area',
					'$npk',
					'$nama_pegawai',
					'$jabatan',
					'$divisi',
					'$departemen',
					'$bagian',
					'$unit',
					'$direktorat',
					'$status_doc',
					'$keterangan',
					'$user',
					NOW(),
					'$doc'
					)";

					echo $query_input;		  
					$data=mysql_query($query_input) or die(mysql_error());;

					if($data){
					
					
					//works till here

					/*
					$ftp_server = "10.15.193.249";
					$ftp_user_name = "dewa";
					$ftp_user_pass = "6oTLThMa";
					*/

					include 'config/ftp_config.php';
					
					
					$file = $dirUpload.$target;
					$name = $target;
					$remote_file = "files/exitclearence/".$name;


					// set up basic connection
					$conn_id = ftp_connect($ftp_server);

					// login with username and password
					$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
					ftp_pasv($resource, true);

					// upload a file
					if (ftp_put($conn_id, $remote_file, $file, FTP_BINARY)) {
					 echo "<br>successfully uploaded $file\n";
					//hapus file xls yang udah dibaca
					//unlink($_FILES['file']['name']);
					unlink($dirUpload.$target);
					//echo $target;

					// close the connection
					ftp_close($conn_id);

					} else {
					 echo "There was a problem while uploading $file\n";
					 //hapus file xls yang udah dibaca
					//unlink($_FILES['file']['name']);
					unlink($dirUpload.$target);
					//echo $target;

					// close the connection
					ftp_close($conn_id);

							}

				

						print '<script type="text/javascript">
					  window.onload = function () { alert("Data Sudah Berhasil di Input"); }
					</script>';
					}else{
					print '<script type="text/javascript">
					 window.onload = function () { alert("Input Data Gagal"); }
					</script>';
					}
				}else{
					print '<script type="text/javascript">
		    		  window.onload = function () { alert("Ukuran File Terlalu Besar"); }
					</script>';
				}
			}else{
									print '<script type="text/javascript">
							  window.onload = function () { alert("EXT Tidak diperbolehkan"); }
					</script>';
			}

?>
<!--<meta http-equiv="refresh" content="0; url=http://www.kelasabil.com/halaman-baru.html">-->


<meta http-equiv="refresh" content="0; url=index.php?p=list_exit_clearence">

Please Wait...... redirect
</body>
</html>