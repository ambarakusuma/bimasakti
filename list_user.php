<?php
//include("config/konfigurasi.php");
//include("menu.php");
//include("index.php");

?>
<?php
// Untuk mengakses halaman ini, harus login
if(!$user_sedang_login) {
	echo "Belum Login.";
	exit;
}

// Atur hak akses user, untuk halaman ini.
// Halaman ini bisa diakses oleh semua user sbb :
if($hak_akses >= 2) {
	// Lanjut
} else {
	echo "Tidak ada hak akses.";
	exit;
}

$id_profile = $datauserlogin[2]['id_profile'];
if ($id_profile == '101'){
	// Lanjut
} else {
	echo "Profile Anda Tidak Bisa Mengakses Halaman Ini.";
	exit;
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Management User</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="screen"/>
<link rel='stylesheet' href='css/amsbarang/default.css'>

<link rel='stylesheet' href='css/new_design.css'>
</head>
<body>
		<?php

	if(isset($_GET['pesan'])){
		$pesan = $_GET['pesan'];
		if($pesan == "input"){
			echo '<script type="text/javascript">
          window.onload = function () { alert("Data Berhasil Di Input."); }
</script>';
		}else if($pesan == "update"){
			echo '<script type="text/javascript">
          window.onload = function () { alert("Data Berhasil Di Update."); }
</script>';
		}else if($pesan == "hapus"){
			echo '<script type="text/javascript">
          window.onload = function () { alert("Data Berhasil Di Hapus."); }
</script>';
		}
	}
?>
	<br/>


	<h3>Management User</h3>
        <a class="tombol" href="index.php?p=list_user_input">+ Tambah User</a>
	    <form name="formcari" method="POST" action="index.php?p=list_user_exe">
                    <table width="330" border="0" cellpadding="0">
                    <tr bgcolor="">
                    <td height="25" colspan="3">
                    <strong> Pencarian Data User</strong>
                    </td>
                    </tr>
                    <tr> <td>  Keyword :</td>
                    <td><strong> <input type="text" name="keyword"> </td></strong>
                    <td><strong><select name="pencarian" required></strong>
                                                            <option value="AREA">NAMA AREA</option>
                                                            <option value="PIC">NAMA PIC</option>

                                                        </select></td>
                    </tr>
                    <td></td>
                    <td> <input type="SUBMIT" name="SUBMIT" id="SUBMIT" value="search" > </td>

                    </table>
<link rel='stylesheet' href='css/amsbarang/tabel_customer.css'>
</form>
	<table border="0" id="customers" width="100%">
		<tr>

			<th>NO</th>
            <th>IDTRANSAKSI</th>
            <th>ID</th>
			<th>USERNAME</th>
			<th>NAMA</th>
			<th>EMAIL</th>
			<th>HAK AKSES</th>
			<th>WAKTU ADD</th>
			<th>WAKTU MODIFI</th>
			<th>STATUS</th>
			<th>KETERANGAN</th>
            <th>STATUS USER</th>
			<th>AKSI EDIT</th>
            <th>AKSI DELETE</th>

		</tr>
		<?php
		//include "koneksi_transaksi.php";
		//include "config/koneksi_npk.php";
		//include "config/konfigurasi.php";
		include "config/koneksi_dashboard.php";
		$halaman = 1000;
		$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
		$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
		//$result = mysql_query("SELECT * FROM s_user");

		$x="select 
        s_user.id as id,
        s_user.idTransaksi as idTransaksi,
		s_user.username as username,
		s_user.nama as nama,
		s_user.email as email,
		s_user.hak_akses as hak_akses,
		s_user.waktu_add as waktu_add,
		s_user.waktu_modifi as waktu_modifi,
		s_user.status as status,
		s_user.keterangan as keterangan, 
        sts.nama_status_aktif as status_user		

		from s_user s_user

		

		LEFT JOIN a_status_aktif sts on sts.id_status_aktif=s_user.id_status

		where s_user.id_profile in ('101','100')
		
		order by s_user.waktu_add asc";

		//echo $x;
		$result = mysql_query($x);
		$total = mysql_num_rows($result);
		$pages = ceil($total/$halaman);
		$y="select 
        s_user.id as id,
        s_user.idTransaksi as idTransaksi,
		s_user.username as username,
		s_user.nama as nama,
		s_user.email as email,
		s_user.hak_akses as hak_akses,
		s_user.waktu_add as waktu_add,
		s_user.waktu_modifi as waktu_modifi,
		s_user.status as status,
		s_user.keterangan as keterangan, 
		sts.nama_status_aktif as status_user	
		from s_user s_user

		LEFT JOIN a_status_aktif sts on sts.id_status_aktif=s_user.id_status


		where s_user.id_profile in ('101','100')
		
		order by s_user.waktu_add asc
		 
		
		 LIMIT $mulai, $halaman";
		// echo $y;
		$query = mysql_query($y)or die(mysql_error);
		$no =$mulai+1;

 while ($data = mysql_fetch_assoc($query)) {
    ?>
<tr>


			<td><?php echo $no++; ?></td>
            <td><?php echo $data['idTransaksi']; ?></td>
			<td><?php echo $data['id']; ?></td>
			<td><?php echo $data['username']; ?></td>
			<td><?php echo $data['nama']; ?></td>
			<td><?php echo $data['email']; ?></td>
			<td><?php echo $data['hak_akses']; ?></td>
			<td><?php echo $data['waktu_add']; ?></td>
			<td><?php echo $data['waktu_modifi']; ?></td>
			<td><?php echo $data['status']; ?></td>
			<td><?php echo strtoupper($data['keterangan']); ?></td>

            <td>
                <a class="edit" href="index.php?p=list_user_status&username=<?php echo $data['username']; ?>"><?php echo strtoupper($data['status_user']); ?></a>
            </td>
			<td>
				<a class="edit" href="index.php?p=list_user_edit&username=<?php echo $data['username']; ?>">Edit</a>
			</td>
            <td>
                <!--<a class="hapus" href="index.php?p=list_user_delete&username=<?php echo $data['username']; ?>">-->Hapus
            </td>
            </tr>
		<?php } ?>
	</table>
<div class="">
  <?php for ($i=1; $i<=$pages ; $i++){ ?>
  <a href="index.php?p=list_user&halaman=<?php echo $i; ?>"><?php echo $i; ?></a>

  <?php } ?>

</div>

