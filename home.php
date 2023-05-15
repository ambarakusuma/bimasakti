<link rel='stylesheet' href='css/amsbarang/default.css'>
<link rel='stylesheet' href='css/amsbarang/tabel_customer.css'>
<link rel='stylesheet' href='css/new_design.css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="screen"/>


<?php



// Untuk mengakses halaman ini, harus login
if(!$user_sedang_login) {
    echo "Belum Login.";
    exit;
}

// Atur hak akses user, untuk halaman ini.
// Halaman ini bisa diakses oleh semua user login
if($hak_akses > 0) {
    // Lanjut
} else {
    echo "Tidak ada hak akses.";
    exit;
}

?>

<h1>Home</h1>

<p>
Selamat datang <b><?php echo $datauserlogin[0]['nama']; ?></b> dari <b><?php echo $datauserlogin[2]['region']; ?></b> <br/>
Halaman ini <u>bisa diakses oleh semua user login</u>.
</p>

ID Profilenya : 
<?php echo $datauserlogin[2]['id_profile'];?>
<p>
Informasi User yang sedang login (Anda) :
</p>
 <link rel='stylesheet' href='css/new_design.css'>
<table border="0" cellpadding="4" cellspacing="0" id='customers'>
  <tr >
    <td>ID User</td>
    <td><?php echo $datauserlogin[2]['id_user']; ?></td>
  </tr>
  <tr>
    <td>Username</td>
    <td><b><?php echo $datauserlogin[2]['username']; ?></b></td>
  </tr>
  <tr>
    <td>Nama</td>
    <td><?php echo $datauserlogin[2]['nama']; ?></td>
  </tr>
  <tr >
    <td>Email</td>
    <td><?php echo $datauserlogin[2]['email']; ?></td>
  </tr>
  <tr bgcolor="#FFFF99">
    <td>Hak Akses</td>
    <td><?php echo $datauserlogin[2]['hak_akses']; ?></td>
  </tr>
  <tr >
    <td>Waktu Login</td>
    <td><?php echo $datauserlogin[2]['waktu_login']; ?></td>
  </tr>
  <tr>
    <td>Waktu Kadaluarsa Login</td>
    <td><?php echo $datauserlogin[2]['waktu_kadaluarsa']; ?></td>
  </tr>
  <tr>
    <td>IP Address</td>
    <td><?php echo $datauserlogin[2]['ip']; ?></td>
  </tr>
  <tr>
    <td>PC dan Browser</td>
    <td><?php echo $datauserlogin[2]['pc_dan_browser']; ?></td>
  </tr>

  <tr>
    <td>Region</td>
    <td><?php echo $datauserlogin[2]['region']; ?></td>
  </tr>
      <td>Profile</td>
    <td><?php echo $datauserlogin[2]['id_profile']; ?></td>
  </tr>
</table>
