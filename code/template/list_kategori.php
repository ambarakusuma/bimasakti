<link rel='stylesheet' href='css/amsbarang/default.css'>
<link rel='stylesheet' href='css/amsbarang/tabel_customer.css'>
<link rel='stylesheet' href='css/new_design.css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="screen"/>
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
?>

<!DOCTYPE html>
<html>
<head>
    <title>Management Data Region</title>

<link rel='stylesheet' href='css/new_design.css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="screen"/>
</head>
<body>
        <?php
/*

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

*/
?>
<form name="formcari" method="POST" action="index.php?p=list_exit_clearence_exe">
<table width="330" border="0" cellpadding="0">
<tr bgcolor="">
<td height="25" colspan="3">
<strong> Pencarian Data Exit CLearence</strong>
</td>
</tr>
<tr> <td>  Keyword :</td>
<td><strong> <input type="text" name="keyword"> </td></strong>
<td><strong><select name="pencarian" required></strong>
                                        <option value=""></option>
                                                <?php
                                                //include "koneksi2.php";
                                                include "config/koneksi_dashboard.php";
                                                //mysql_connect("localhost", "root", "");
                                                //mysql_select_db("noncpeall");
                                                $sql = mysql_query("SELECT nama_pencarian,id_pencarian FROM a_pencarian_exit order by no DESC");
                                                if(mysql_num_rows($sql) != 0){
                                                while($data = mysql_fetch_assoc($sql)){
                                                echo '<option selected="selected" value="'.$data['id_pencarian'].'">'.$data['nama_pencarian'].'</option>';
                                                 }
                                                }
                                                 ?>
                                    </select></td>
</tr>
<td></td>
<td> <input type="SUBMIT" name="SUBMIT" id="SUBMIT" value="search" > </td>

</table>
</form>
<br />
<hr>
    <br/>
    <a class="tombol" href="index.php?p=exit_clearence_input">+ Tambah Data Baru</a> |<!--<a class="tombol" href="index.php?ptransaksi_upload_pegawai_resign">+ Upload Data Pegawai Resign</a> |--> <a class="tombol" href="index.php?p=pegawai_resign_input">+ Tambah Pegawai Resign</a> | <a class="tombol" href="index.php?p=list_pegawai_resign">+ List Pegawai Resign</a>

    <h3><center>List Exit Clearence</center></h3>
    <table border="1" class="table" id="customers" width='100%'>
        <tr>

            <th>No</th>
            <th>Kode</th>
            <th>idTransaksi</th>
            <th>Tgl Terima</th>
            <th>Tgl Resign</th>
            <th>Region</th>
            <th>Area</th>
            <th>NPK</th>
            <th>Nama Pegawai</th>
            <th>Jabatan</th>
            <th>Divisi</th>
            <th>Departemen</th>
            <th>Bagian</th>
            <th>Unit</th>
            <th>Direktorat</th>
            <th>Status Dok</th>
            <th>Keterangan</th>
            <th>Username</th>
            <th>Tgl posting</th>
            <th>File</th>
            <th>Action</th>

        </tr>
        <?php
        //include "koneksi_transaksi.php";
        include "config/koneksi_npk.php";
        $halaman = 1000;
        $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
        $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
        //$result = mysql_query("SELECT * FROM s_user");


        $result = mysql_query("select
        ec.kode as kode,
        ec.idTransaksi as idTransaksi,
        ec.tgl_terima_doc as tgl_terima_doc,
        ec.tgl_resign as tgl_resign,
        t_region.nama_region as id_region,
        t_area.nama_area as id_area,
        ec.npk as npk,
        ec.nama_pegawai as nama_pegawai,
        ec.jabatan as jabatan,
        ec.divisi as divisi,
        ec.departemen as departemen,
        ec.bagian as bagian,
        ec.unit as unit,
        ec.direktorat as direktorat,
        status_doc.`nama_exit` as status_dokumen,
        ec.id_exit as id_exit,
        ec.keterangan as keterangan,
        ec.username as username,
        ec.doc as file,
        ec.`tgl_posting` as tgl_posting

        from exit_clearence ec

        LEFT JOIN t_region t_region ON t_region.id_region=ec.id_region
        LEFT JOIN t_area t_area ON t_area.id_area=ec.id_area
        left join a_status_doc_exit status_doc on status_doc.`id_exit`=ec.`id_exit`
        ");
        $total = mysql_num_rows($result);
        $pages = ceil($total/$halaman);
        $query = mysql_query("select
        ec.kode as kode,
        ec.idTransaksi as idTransaksi,
        ec.tgl_terima_doc as tgl_terima_doc,
        ec.tgl_resign as tgl_resign,
        t_region.nama_region as id_region,
        t_area.nama_area as id_area,
        ec.npk as npk,
        ec.nama_pegawai as nama_pegawai,
        ec.jabatan as jabatan,
        ec.divisi as divisi,
        ec.departemen as departemen,
        ec.bagian as bagian,
        ec.unit as unit,
        ec.direktorat as direktorat,
        status_doc.`nama_exit` as status_dokumen,
        ec.id_exit as id_exit,
        ec.keterangan as keterangan,
        ec.username as username,
        ec.doc as file,
        ec.`tgl_posting` as tgl_posting

        from exit_clearence ec

        LEFT JOIN t_region t_region ON t_region.id_region=ec.id_region
        LEFT JOIN t_area t_area ON t_area.id_area=ec.id_area
        left join a_status_doc_exit status_doc on status_doc.`id_exit`=ec.`id_exit` ORDER BY ec.kode LIMIT $mulai, $halaman")or die(mysql_error);
        $no =$mulai+1;




 //while ($data = mysql_fetch_assoc($query)) {
while ($data = mysql_fetch_array($query))
{
    $kode=$data['kode'];
    $idTransaksi=$data['idTransaksi'];
    $tgl_terima_doc=$data['tgl_terima_doc'];
    $tgl_resign=$data['tgl_resign'];
    $nama_region=$data['id_region'];
    $nama_area=$data['id_area'];
    $npk=$data['npk'];
    $nama_pegawai=$data['nama_pegawai'];
    $jabatan=$data['jabatan'];
    $divisi=$data['divisi'];
    $departemen=$data['departemen'];
    $bagian=$data['bagian'];
    $unit=$data['unit'];
    $direktorat=$data['direktorat'];
    $status_doc=$data['status_dokumen'];
    $id_exit=$data['id_exit'];
    $keterangan=$data['keterangan'];
    $user=$data['username'];
    $tgl_posting=$data['tgl_posting'];
    $file=$data['file'];

if($id_exit=='ONP')
    {
    $status_doc2="<font color='RED'>".$status_doc."</font>";

    }else {

        $status_doc2="<font color='BLUE'>".$status_doc."</font>";
    };


        echo "<tr>";
        echo "<td>".$no."</td>";
        echo "<td><b>".$kode."</b></td>";
        echo "<td>".$idTransaksi."</td>";
        echo "<td>".$tgl_terima_doc."</td>";
        echo "<td>".$tgl_resign."</td>";
        echo "<td>".$nama_region."</td>";
        echo "<td>".$nama_area."</td>";
        echo "<td>".$npk."</td>";
        echo "<td>".$nama_pegawai."</td>";
        echo "<td>".$jabatan."</td>";
        echo "<td>".$divisi."</td>";
        echo "<td>".$departemen."</td>";
        echo "<td>".$bagian."</td>";
        echo "<td>".$unit."</td>";
        echo "<td>".$direktorat."</td>";
        echo "<td><b>".$status_doc2."</b></td>";
        echo "<td>".$keterangan."</td>";
        echo "<td>".$user."</td>";
        echo "<td>".$tgl_posting."</td>";
        echo "<td><a href=' /files/exitclearence/".$file."'>".$file."</a></td>";



        ?>
        <td>
                <a class="edit" href="index.php?p=exit_clearence_edit&kode=<?php echo $kode; ?>">EDIT</a>
        </td>
        <?php
        echo "</tr>";
        $no++;
?>
        <?php } ?>
    </table>
<div class="">
    <?php for ($i=1; $i<=$pages ; $i++){ ?>
    <a href="index.php?p=list_exit_clearence&halaman=<?php echo $i; ?>"><?php echo $i; ?></a>

    <?php } ?>

</div>
<br/>
<?php
include 'function/function_date.php';

$awal =date("Y-m-d");
$akhir=date("2019-01-11");
$newDateAkhir = date("Y-m-d", strtotime($akhir));
$durasi=datediff($newDateAkhir, $awal, "day");
?>
Fitur ini Live Per Tanggal 11 Januari 2019 dan sudah berjalan selama <b><?php echo $durasi;?> Hari</b>
<br/>
<br/>