<?php 
//include 'config/koneksi_dashboard.php';
include 'config/koneksi_transaksi.php';
//$id = $_POST['id_region'];
$kode =$_POST['kode'];
$idTransaksi_lama = $_POST['idTransaksi'];
$keterangan = $_POST['keterangan'];
$id_exit= $_POST['id_exit'];
$user = $datauserlogin[2]['username'];
$tgl_terima_doc		= $_POST['tgl_terima_doc'];
$tgl_resign			= $_POST['tgl_resign'];
$file_lama			= $_POST['file_lama'];

$npk			= $_POST['npk'];
$nama_pegawai			= $_POST['nama_pegawai'];

/*
echo "sampai disini";
echo $file_lama;
echo $npk;
echo $nama_pegawai;

stop();
*/
//convert tanggal agar sesuai dgn field database YYYY-MM-DD
$tgl_terima_doc2 = date("Y-m-d", strtotime($tgl_terima_doc));
$tgl_resign2 = date("Y-m-d", strtotime($tgl_resign));


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
				if($ukuran < 10044070){		
					
					$dirUpload="temp/";
					$trx=trx_exit_clearence();
					//$target=$trx.'_'.$nama;
                    $target=$trx.'_'.$npk.'_'.$nama_pegawai.'.pdf';

					//move_uploaded_file($file_tmp, 'exitclearence/'.date('Y-m-d H-i-s').'_'.$nama);
					move_uploaded_file($_FILES['file']['tmp_name'], $dirUpload.$target);
					


					//$doc=$trx.'_'.$nama;
                    $doc=$target;
										
					$update="
					update exit_clearence set 

					id_exit='$id_exit',
					keterangan='$keterangan',
					idTransaksi='$trx',
					username='$user',
					tgl_posting=NOW(),
					doc='$doc',
					tgl_terima_doc='$tgl_terima_doc2',
					tgl_resign='$tgl_resign2'

					where kode='$kode'";

					echo $update;		  

					$data=mysql_query($update) or die(mysql_error());;

					if($data){
					
					
					//works till here

					/*
					$ftp_server = "10.15.193.249";
					$ftp_user_name = "dewa";
					$ftp_user_pass = "6oTLThMa";
					*/
					include 'config/ftp_config.php';
					$file =$target;
					$target_old="/files/exitclearence/".$file_lama;
					echo $file;
					//$remote_file = "/exitclearence/".$file;
					$remote_file = "/files/exitclearence/".$file;


					// set up basic connection
					$conn_id = ftp_connect($ftp_server);

					// login with username and password
					$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
					//ftp_pasv($resource, true);

					// upload a file
					if (ftp_put($conn_id, $remote_file, $dirUpload.$file, FTP_BINARY)) {
					 echo "<br>successfully uploaded $file\n";
					//hapus file xls yang udah dibaca
					//unlink($_FILES['file']['name']);
					//unlink($dirUpload.$target);
					//echo $target;

					if (ftp_delete($conn_id, $target_old)) {
														 echo "<span style='color:#339900'><h2>$target_old deleted successful</h2></span>";
														} else {
														 echo "<span style='color:#FF0000'><h2>could not delete $target_old</h2></span>";
														}

					
					unlink($dirUpload.$target);
					// close the connection
					ftp_close($conn_id);

					} else {
					 echo "There was a problem while uploading $file\n";
					 //hapus file xls yang udah dibaca
					//unlink($_FILES['file']['name']);
					//unlink($dirUpload.$target);
					//echo $target;
					unlink($dirUpload.$target);

					// close the connection
					ftp_close($conn_id);

							}

				

						print '<script type="text/javascript">
					  window.onload = function () { alert("Data Sudah Berhasil di Update"); }
					</script>';
					}else{
					print '<script type="text/javascript">
					 window.onload = function () { alert("Update Data Gagal"); }
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
<meta http-equiv="refresh" content="0; url=index.php?p=list_exit_clearence">

Please Wait...... redirect

</body>
</html>