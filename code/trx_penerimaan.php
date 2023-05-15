<link rel='stylesheet' href='css/amsbarang/default.css'>
<link rel='stylesheet' href='css/amsbarang/tabel_customer.css'>
<link rel='stylesheet' href='css/new_design.css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="screen"/>

<?php
/*History :
11/9/2018 : Implementasi Alasan Pada Saat Transaksi Tambah Asset
*/

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
    <h3>Penerimaan Barang</h3>

<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />

<link rel="Shortcut Icon" href="region/favicon.ico" />
<script src='js/stock_remove.js' type='text/javascript'></script>
<?php
$id_user = $datauserlogin[2]['username'];
$region_login = $datauserlogin[2]['id_region'];
$area_login = $datauserlogin[2]['id_area'];
$nama_user = $datauserlogin[2]['nama'];





    //jika tombol submit ditekan maka :
    if(isset($_POST["tambah"]))
        {
                     $keterangan_penerimaan="IN";
                     //echo "stop disini";
                     //stop();
                    include 'trx_penerimaan_temp.php';

        }
        //jika tombol submit ditekan maka :
    if(isset($_POST["proses"]))
        {
                    //stop();

                    echo "sini";
                    

                    //mengambil idtransaksi untuk tambah barang
                    include 'config/function_transaksi.php';
                    //$trx=trx_penerimaan_awal_barang();
                    $trx=trx_penerimaan_qty();
                    //echo $trx;

                    echo "sini";
                    //stop();

                    //mengambil jumlah data yang ada di table temporary
                    $jumlah_count=$_POST['jumlah'];
                    $jumlah_count2=floatval($jumlah_count);
                    $id_supplier=$_POST['supplier'];
                    $no_dokumen=$_POST['no_dokumen'];
                    $no_po=$_POST['no_po'];
                    $nama_penerima=strtoupper($_POST['nama_penerima']);
                    $nama_pengirim=strtoupper($_POST['nama_pengirim']);   
                    $tanggal_dokumen=$_POST['tanggal_dokumen']; $tanggal_dokumen2 = date("Y-m-d", strtotime($tanggal_dokumen));
                    $jenis_pengadaan=$_POST['jenis_pengadaan'];
                    $region_baru=$_POST['region_baru'];
                    $area_baru=$_POST['area_baru'];
                    $lokasi_baru=$_POST['lokasi_baru'];
                    $keterangan=strtoupper($_POST['keterangan']);
                    $id_user=$_POST['id_user'];
                    $jenis_pengadaan=$_POST['jenis_pengadaan'];
                    $jtransaksi=$_POST['jtransaksi'];

                    $surat_jalan=strtoupper($_POST['surat_jalan']);
                    $id_jpengiriman=strtoupper($_POST['jpengiriman']);



                    $id_producty=$_POST['id_product'.$i];
                    $id_kategoriy=$_POST['id_kategori'.$i];
                    //$id_merky=$_POST['id_merk'.$i];
                    //$id_uomy=$_POST['id_uom'.$i];
                    $qty_iny=$_POST['qty'.$i];
                    //$part_descy=$_POST['part_desc'.$i];
                    $status_party=$_POST['status_part'.$i];

                    //$id_itemmaty=$_POST['id_itemmat'.$i];
                    //$id_kategori_asety=$_POST['id_kategori_aset'.$i];
                    //$id_jenisy=$_POST['id_jenis'];

                    //echo $id_itemmaty;
                    //echo $id_kategori_asety;

                    //stop();

					//echo "sampai disini ?";


                    include 'function/function_nomor_dokumen.php';
                    //stop();
                    if($jtransaksi=='TRVD') {
                        //echo "transaksi penerimaan vendor";
                        
            
                    } else {
                        //echo "peneriman selain vendor";
                        include 'b_penerimaan_lainnya_part.php';
                    }



                                        }

?>


    <!--<form action="index.php?p=tambah_stok_proses" method="post">-->
    <form method="post">

<table cellpadding="0" cellspacing="0" id='customers' width='100%'>
<tr>
            <th>Nama Product</th>
            <th>Status Part</th>
            <th>Jumlah Penerimaan</th>
            <th>Action</th>
            </tr>
<tr>

<?php
include "config/koneksi_dashboard.php";
?>

<td><select onchange="cek_database()" name='no_part' id="no_part"  required>
<option value='' selected>- Pilih -</option>
<?php
include "config/koneksi_dashboard.php";
$part = mysqli_query($koneksi,
"
SELECT DISTINCT

id_product,
n_product

from master_product;



");
while ($row = mysqli_fetch_array($part)) {
echo "<option value='$row[id_product]'>$row[id_product] - $row[n_product]</option>";
}
?>
</select></td>

<td><select name='status_part'  required>
<option value='' selected>- Pilih -</option>
<?php
$spart = mysqli_query($koneksi,
"SELECT 
id_status_part as id_part,
n_status_part as n_status_part

from master_status_part 
");
while ($s = mysqli_fetch_array($spart)) {
echo "<option value='$s[id_part]'>$s[n_status_part]</option>";
}
?>
</select></td>



<td><input type="number" name="qty" placeholder='Jumlah' min="0" required></td>
<td><input type="submit" name="tambah" value="Tambah"></td>
</tr>
</table>
<input type='hidden' name="id_user" value='<?php echo $id_user;?>'>
</form>
 <br>
<link rel='stylesheet' href='css/new_design.css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="screen"/>

<table id="customers" width='100%'>
<tr bgcolor="#CCCCCC">
<th><span class="no">No</span</th>
<th><span class="no_part">Nama Kategori</span></th>
<th><span class="no_part">Nama Product</span></th>
<th>Jumlah</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php
$keterangan_penerimaan="IN";
//menampilkan data yang berada di tabel temporary
$tampil="SELECT 
tt.idTransaksi,
tt.id_product,
tt.id_status_part,
tt.qty,
mp.n_product as nama_product,
mk.n_kategori as nama_kategori,
msp.n_status_part as nama_status_part


from transaksi_temp tt

left join master_product mp on mp.id_product=tt.id_product
left join master_kategori mk on mk.id_kategori=mp.id_kategori
left join master_status_part msp on msp.id_status_part=tt.id_status_part
 where tt.username='".$id_user."' and tt.trx='".$keterangan_penerimaan."'";
//echo $tampil;
$result_tampil=mysqli_query($koneksi,$tampil);

//menghitung jumlah item yang dikeluarkan
$jumlah_item="Select count(id_product) as jumlah_item from transaksi_temp where username='".$id_user."' and trx='".$keterangan_penerimaan."'";
$rjumlah_item=mysqli_query($koneksi,$jumlah_item);
while ($item=mysqli_fetch_assoc($rjumlah_item))
{
           $jumlah_item=$item['jumlah_item'];

};

//mengakumulasi total part yang dikeluarkan
$total_item="Select sum(qty) as total_item from transaksi_temp where username='".$id_user."' and trx='".$keterangan_penerimaan."'";
$rtotal_item=mysqli_query($koneksi,$total_item);
while ($t_item=mysqli_fetch_assoc($rtotal_item))
{
           $jtotal_item=$t_item['total_item'];

};


$no='1';
while ($data_tampil=mysqli_fetch_array($result_tampil)) {

$nama_kategori=$data_tampil['nama_kategori'];
$nama_product=$data_tampil['nama_product'];
$qty=$data_tampil['qty'];
$user=$data_tampil['user'];
$nama_status_part=$data_tampil['nama_status_part'];
echo "<tr>

<td>".$no."</td>
<td>".$nama_kategori."</td>
<td>".$nama_product."</td>
<td>".number_format($qty,0)."</td>
<td>".$nama_status_part."</td>
";?>
<td><a class="hapus" href="index.php?p=b_penerimaan_lainnya_delete&no_part=<?php echo $no_part; ?>&username=<?php echo $id_user; ?>&status_part=<?php echo $status_part_in_id; ?>">Hapus</a></td>

<?php
echo "</tr>";
$no++;
}
echo "<tr>
<td colspan='1'><b>Jumlah Item</b></td>
<td><b>".$jumlah_item."</b></td>
<td colspan='1'><b>Total Item</b></td>
<td><b>".number_format($jtotal_item)."</b></td>
<td></td>
<td></td>
</tr>";


echo "</table>";



//bataas
?>
<br>


<?php

$jumlah_data="SELECT id_product from transaksi_temp where username='$id_user'";

//ECHO $jumlrjumlah_dataah_data;
$jresult=mysqli_query($koneksi,$jumlah_data);
$rjumlah_data=mysqli_num_rows($jresult);
//echo "Jumlah Part Yang di Transaksikan : ";
//echo $rjumlah_data;


?>      <form method="post">
        <table id='customer' cellpadding="3" cellspacing="0" id='customer' border='0'>
        <tr>
              <td>No. Dokumen</td>
              <td>:</td>
              <td><input type="hidden" name="no_dokumen" style="text-transform:uppercase" required>Generate Otomatis By System</td>
            </tr>
                     <tr>
              <td>Nama Penerima</td>
              <td>:</td>
              <td><input type="hidden" name="nama_penerima" style="text-transform:uppercase" value='<?php echo $nama_user;?>' required><?php echo $nama_user;?></td>
            </tr>
         <tr>
        <tr>
              <td>Jenis Transaksi</td>
              <td>:</td>
              <td><select name="jtransaksi" required>
                                        <option value="">PILIH JENIS TRANSAKSI</option>
                                                <?php
                                                include "config/koneksi_dashboard.php";
                                                $sql_jtrx = mysqli_query($koneksi,"SELECT id_jtransaksi,n_jtransaksi FROM a_jenis_transaksi where id_kategori='IN' order by n_jtransaksi ASC");
                                                
                                                if(mysqli_num_rows($sql_jtrx) != 0){
                                                while($data2 = mysqli_fetch_assoc($sql_jtrx)){
                                                echo '<option value="'.$data2['id_jtransaksi'].'">'.$data2['id_jtransaksi'].' - '.$data2['n_jtransaksi'].'</option>';
                                                 }
                                                }
                                                 ?>
                                    </select></td>

                                                <?php
include "config/koneksi_dashboard.php";
?>
</tr>
<tr>
            <td>Jenis Pengiriman</td >
            <td>:</td>
            <td><select name="jpengiriman" required>
                                        <option value="">PILIH PENGIRIMAN</option>
                                                <?php
                                                include "config/koneksi_dashboard.php";
                                                //mysqli_connect("localhost", "root", "");
                                                //mysqli_select_db("noncpeall");
                                                $sql = mysqli_query($koneksi,"SELECT id_jpengiriman,UPPER(n_jpengiriman) as n_jpengiriman FROM a_jenis_pengiriman");
                                                if(mysqli_num_rows($sql) != 0){
                                                while($l = mysqli_fetch_assoc($sql)){
                                                echo '<option value="'.$l['id_jpengiriman'].'">'.$l['id_jpengiriman'].' - '.$l['n_jpengiriman'].'</option>';
                                                 }
                                                }
                                                 ?>
            </tr>

        <tr>
              <td>Nama Pengirim</td>
              <td>:</td>
              <td><input type="text" name="nama_pengirim" style="text-transform:uppercase" required></td>
            </tr>
            <tr>
              <td>Surat Jalan</td>
              <td>:</td>
              <td><input type="text" name="surat_jalan" style="text-transform:uppercase"></td>
            </tr>


              <td>Tanggal Dok</td >
              <td>:</td>
            <td><input type="text" name="tanggal_dokumen" id="tanggal" required></td>
            </tr>
            <tr>
            <td>Keterangan</td>
              <td>:</td>
              <td><textarea name="keterangan" style="text-transform:uppercase" required></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" name="proses" value="Proses"></td>
            </tr>
            <tr>
            <td></td>
            </tr>
               <input type="hidden" name="jumlah" value="<?php echo $rjumlah_data;?>" >
               <input type='hidden' name="id_user" value='<?php echo $id_user;?>'>
        </table>

       <?php
           $tambah_temp="SELECT

                    tt.id_product as id_product,
                    tt.qty,
                    tt.username,
                    tt.id_status_part,
                    mk.id_kategori
                    
                    from transaksi_temp tt

                    left join master_product mp on mp.id_product=tt.id_product
                    left join master_kategori mk on mk.id_kategori=mp.id_kategori

                    where tt.username='".$id_user."' and tt.trx='".$keterangan_penerimaan."'";
                    //echo $tambah_temp;
                    //echo "<br>";
                    $r_tambah_temp=mysqli_query($koneksi,$tambah_temp);
                    for($i=0; $i < $jumlah_count2; $i++)
                    //$MultiDimArray = array();
                    $no_part = array();
                    while($cek = mysqli_fetch_array($r_tambah_temp)){
                               $id_productx=$cek['id_product'];
                               $qty=$cek['qty'];
                               $status_part=$cek['id_status_part'];
                               $id_kategori=$cek['id_kategori'];
                               //echo $no_partx;
                               //echo $id_merk;
                               //echo $id_uom;
                    ?>

                    <input type='hidden' name="id_product[]" value='<?php echo $id_productx;?>'>
                    
                   
                    <input type='hidden' name="qty[]" value='<?php echo $qty;?>'>
                    <!-- 
                        <input type='hidden' name="part_desc[]" value='<?php echo $part_desc;?>'>
                         <input type='hidden' name="id_uom[]" value='<?php echo $id_uom;?>'>
                        <input type='hidden' name="id_merk[]" value='<?php echo $id_merk;?>'>
                    -->
                    <input type='hidden' name="status_part[]" value='<?php echo $status_part;?>'>
                    <input type='hidden' name="id_kategori[]" value='<?php echo $id_kategori;?>'>
                    
                    <!--<input type='hidden' name="id_itemmat[]" value='<?php echo $id_itemmat;?>'>
                    <input type='hidden' name="id_kategori_aset[]" value='<?php echo $id_kategori_aset;?>'>
                    <input type='hidden' name="id_jenis[]" value='<?php echo $id_jenis;?>'>
                    -->
                    <?php
                    };

           ?>
        <br>
        <br>

    </form>

    <!-- Note Dewa : JawaScript untuk menampilkan tanggal secara dinamis -->
<link href="js/tanggal/jquery-ui-1.11.4/smoothness/jquery-ui.css" rel="stylesheet" />
  <script src="js/tanggal/jquery-ui-1.11.4/external/jquery/jquery.js"></script>
  <script src="js/tanggal/jquery-ui-1.11.4/jquery-ui.js"></script>
  <script src="js/tanggal/jquery-ui-1.11.4/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="js/tanggal/jquery-ui-1.11.4/jquery-ui.theme.css">
  <script>
var $jnoc=jQuery.noConflict();
   $jnoc(document).ready(function(){
    $jnoc("#tanggal").datepicker({
    })
   })
  </script>
  <!-- Note Dewa : JawaScript untuk menampilkan tanggal secara dinamis -->
<link href="js/tanggal/jquery-ui-1.11.4/smoothness/jquery-ui.css" rel="stylesheet" />
  <script src="js/tanggal/jquery-ui-1.11.4/external/jquery/jquery.js"></script>
  <script src="js/tanggal/jquery-ui-1.11.4/jquery-ui.js"></script>
  <script src="js/tanggal/jquery-ui-1.11.4/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="js/tanggal/jquery-ui-1.11.4/jquery-ui.theme.css">
  <script>
var $jnoc=jQuery.noConflict();
   $jnoc(document).ready(function(){
    $jnoc("#tanggal_pengadaan").datepicker({
    })
   })
  </script>
</body>
</html>