<?php 
//include 'config/koneksi_dashboard.php';
include 'config/koneksi_dashboard.php';

$query = "SELECT max(id) as maxKode FROM s_user";

//echo $query;
$hasil = mysql_query($query);
$data  = mysql_fetch_array($hasil);
$id = $data['maxKode'];

// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// misal 'BRG001', akan diambil '001'
// setelah substring bilangan diambil lantas dicasting menjadi integer
$noUrut = (int) substr($id, 0, 3);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut++;

// membentuk kode anggota baru
// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
//$char = "UID";
//$new_id = $char . sprintf("%03s", $noUrut);
$new_id =sprintf("%03s", $noUrut);


//echo $new_id;
//stop();





$username = $_POST['username'];
$password = $_POST['password'];
$nama = strtoupper($_POST['nama']);
$email = strtoupper($_POST['email']);
//$hak_akses = strtoupper($_POST['hak_akses']);
$hak_akses='8';
//$status = strtoupper($_POST['status']);
$id_profile=strtoupper($_POST['id_profile']);
$keterangan = strtoupper($_POST['keterangan']);
$no_telp = strtoupper($_POST['no_telp']);

include 'config/function_transaksi.php';
$trx=user_insert();


$insert_user="INSERT INTO s_user(
idTransaksi,
id,
username,
password,
nama,
email,
hak_akses,
waktu_add,
waktu_modifi,
keterangan,
id_profile,
id_status,
telp
)
VALUES
(
'$trx',
'$new_id',
'$username',
'$password',
'$nama',
'$email',
'$hak_akses',
NOW(),
NOW(),
'$keterangan',
'100',
'1',
'".$no_telp."'
)";

//echo $insert_user;
//stop();
$rinsert_user=mysql_query($insert_user);

if ($rinsert_user)
{
    $update_user="INSERT INTO s_user_transaksi(
idTransaksi,
id,
username,
password,
nama,
email,
hak_akses,
waktu_add,
waktu_modifi,
keterangan,
user_create,
id_level,
id_profile,
id_status,
telp,
action
)
VALUES
(
'$trx',
'$new_id',
'$username',
'$password',
'$nik',
'$nama',
'$email',
'$hak_akses',
NOW(),
NOW(),
'$keterangan',
'$username_create',
'3',
'$id_profile',
'1',
'".$no_telp."',
'INSERT'
)";

//echo $update_user;
//stop();
    $rupdate_user=mysql_query($update_user);



}
?>

//SEND EMAIL AKTIVASI
<?php include 'email_validate.php';?>

CHECK YOUR EMAIL

    <meta http-equiv="refresh" content="0; url=index.php">

Please Wait...... redirect

</body>
</html>