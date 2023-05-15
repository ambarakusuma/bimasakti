<?php 
//include 'config/koneksi_dashboard.php';
include 'config/koneksi_transaksi.php';
//$id = $_POST['id_region'];
$id = $_POST['id'];
$username= $_POST['username'];
$password=$_POST['password'];
$nik=strtoupper($_POST['nik']);
$nama=strtoupper($_POST['nama']);
$email=strtoupper($_POST['email']);
$keterangan = strtoupper($_POST['keterangan']);
$id_region = strtoupper($_POST['id_region']);
$id_area = strtoupper($_POST['id_area']);
$username_create = $datauserlogin[2]['username'];
$no_telp = strtoupper($_POST['no_telp']);
$atasan = strtoupper($_POST['atasan']);
$atasan_email = strtoupper($_POST['atasan_email']);

$hak_akses= strtoupper($_POST['hak_akses']);
$status= strtoupper($_POST['status']);
$id_status= strtoupper($_POST['id_status']);
$id_level= strtoupper($_POST['id_level']);
$id_profile= strtoupper($_POST['id_profile']);

$id= $_POST['id'];

$waktu_add= $_POST['waktu_add'];
$waktu_modifi= $_POST['waktu_modifi'];


include 'function/function_transaksi.php';
$trx=user_edit();



$update_user="
UPDATE s_user SET 
idTransaksi='$trx',
password='$password', 
nik='$nik',
nama='$nama',
email='$email',
keterangan='$keterangan',
waktu_add=NOW(),
id_region='$id_region',
id_area='$id_area',
user_create='$username_create',
telp='$no_telp',
atasan='$atasan',
email_atasan='$atasan_email'
where username='$username'";

//echo $update_user;		  
$rupdate_user=mysql_query($update_user);

if ($rupdate_user) {

    $insert_user="INSERT INTO s_user_transaksi(
idTransaksi,
id,
username,
password,
nik,
nama,
email,
hak_akses,
waktu_add,
waktu_modifi,
status,
id_region,
id_area,
keterangan,
user_create,
id_level,
id_profile,
id_status,
telp,
atasan,
email_atasan,
action,
tgl_proses
)
VALUES
(
'$trx',
'$id',
'$username',
'$password',
'$nik',
'$nama',
'$email',
'$hak_akses',
'$waktu_add',
'$waktu_modifi',
'$status',
'$id_region',
'$id_area',
'$keterangan',
'$username_create',
'".$id_level."',
'".$id_profile."',
'".$id_status."',
'".$no_telp."',
'".$atasan."',
'".$atasan_email."',
'EDIT',
NOW()
)";

//echo $insert_user;
//stop();
    $rinsert_user=mysql_query($insert_user);


} else {
    echo "ada yang salah";
}


?>
<!--<meta http-equiv="refresh" content="0; url=http://www.kelasabil.com/halaman-baru.html">-->
<meta http-equiv="refresh" content="0; url=index.php?p=list_user&pesan=update">

Please Wait...... redirect

</body>
</html>