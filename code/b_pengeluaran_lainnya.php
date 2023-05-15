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
// Halaman ini bisa diakses oleh semua user sbb :
if($hak_akses >= 2) {
    // Lanjut
} else {
    echo "Tidak ada hak akses.";
    exit;
}
?>
    <h3>Penjualan Barang</h3>

<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />

<link rel="Shortcut Icon" href="region/favicon.ico" />
<?php
$id_user = $datauserlogin[2]['username'];
$login_region = $datauserlogin[2]['id_region'];
$login_area = $datauserlogin[2]['id_area'];
$nama_user = $datauserlogin[2]['nama'];
$id_profile = $datauserlogin[2]['id_profile'];
//echo $id_profile;
//echo "isinya";



    //jika tombol submit ditekan maka :
    if(isset($_POST["tambah"]))
        {
          $qty_in=$_POST['qty_out'];
          //echo $qty_in;
          //stop();
          $qty_in2=floatval($qty_in);
          $qty_in_int = (int)$qty_in;
          $temp=$_POST['temp'];
          $temp2=floatval($temp);
          $sisa_stok=$_POST['sisa_stok'];
          $sisa_stok2=floatval($sisa_stok);

          $stok_keluar=$temp+$qty_in;
          $stok_akhir=$sisa_stok2-$temp-$qty_in;
          $act=$_POST['act'];
          $id_product=$_POST['id_product'];
          $price=$_POST['price'];
          //echo '|';
          //echo $stok_akhir;

          //exit();
          if($stok_akhir < 0) {
          print '<script type="text/javascript">
                                               window.onload = function () { alert("Kode Error : ED001 - Jumlah Pengeluaran Melebihi Stok yang Ada. Stok :'.$sisa_stok2.' Pengeluaran :'.$stok_keluar.' "); }
                                              </script>';
          } else {
          include 'b_pengeluaran_temp_part.php';
          }



        }
        //jika tombol submit ditekan maka :
    if(isset($_POST["proses"]))
        {
          //stop();
          $jtransaksi=$_POST['jtransaksi'];
		  if ($jtransaksi == 'PRHB' || $jtransaksi == 'PRPI'|| $jtransaksi == 'TRX001'|| $jtransaksi == 'PRHD' || $jtransaksi == 'PRBR'  || $jtransaksi == 'PRDP' ) {
			$jtransaksi2 ='CSTS';
		}	else {
				//echo "something";
                $jtransaksi2 ='CSTS';
			}

          $area_lama=$_POST['area_lama'];
          include 'function/function_nomor_dokumen_out.php';
          
         echo "sampai";
         
                    //stop();
                    //echo "Transaksi Pengeluarannya :".$jtransaksi."";

           //stop();
                     //mengambil idtransaksi untuk tambah barang
                     include 'config/function_transaksi.php';
                     include 'config/koneksi_dashboard.php';
					  //include 'config/email_setting.php';
                     //$trx_out=trx_pengeluaran_barang();
                     //$trx_in=trx_penerimaan_barang();

                     $trx_out=trx_pengeluaran_qty();
					 $trx_in=trx_penerimaan_qty2();


					 
					 //echo $trx_out;
					 //echo $trx_in;
					 //stop();


                     
                     
                     /*
                     echo "Trx Out :".$trx_out." <br>";
                     echo "Trx In :".$trx_in." <br>";
                     stop();
                    */
 
                     //mengambil jumlah data yang ada di table temporary
                     $jumlah_count=$_POST['jumlah'];
                     $jumlah_count2=floatval($jumlah_count);
                     $no_dokumen=$_POST['no_dokumen'];
                     $tanggal_dokumen=$_POST['tanggal_dokumen']; $tanggal_dokumen2 = date("Y-m-d", strtotime($tanggal_dokumen));
 
                     $region_baru=$_POST['region_baru'];
                     /*
                     echo "region baru";
                     echo $region_baru;
                     echo "br";
                     */
                     $area_baru=$_POST['area_baru'];
 
                     $lokasi_baru=$_POST['lokasi_baru'];
 
                     $region_lama=$_POST['region_lama'];
                     $area_lama=$_POST['area_lama'];
                     //$lokasi_lama=$_POST['lokasi_lama'];
 
                      $keterangan=strtoupper(mysqli_real_escape_string($_POST['keterangan']));
                     $id_user=$_POST['id_user'];
                     $nama_pengirim=strtoupper($_POST['nama_user']);
                     $nama_penerima=strtoupper(mysqli_real_escape_string($_POST['nama_penerima']));
                     $jenis_pengadaan=$_POST['jenis_pengadaan'];

                     $id_jpengiriman=strtoupper($_POST['jpengiriman']);
                     $act=$_POST['act'];

 
                     $qty_in='0';
 
                     $id_producty=$_POST['id_product'.$i];
                     $id_merky=$_POST['id_merk'.$i];
                     $id_uomy=$_POST['id_uom'.$i];
                     $qty_outy=$_POST['qty_out'.$i];
                     $part_descy=$_POST['part_desc'.$i];
                     $lokasi_lamay=$_POST['lokasi_lama'.$i];
                     $status_party=$_POST['status_part'.$i];


                     
                    $id_itemmaty=$_POST['id_itemmat'.$i];
                    $id_kategori_asety=$_POST['id_kategori_aset'.$i];
                    $id_jenisy=$_POST['id_jenis'];

                    
                                include 'b_pengeluaran_lain_part.php';
              
             }


                         
            
                        
                     



 
            

?>
<?php

?>
    <!--<form action="index.php?p=tambah_stok_proses" method="post">-->
        <form method="post" id='customers'>

                    <table id='customers' width='100%'>
            <tr>
            <th>Nama Product</th>
            <th>Status Part</th>
            <th>Sisa Stock</th>
            <th>Harga Satuan</th>
            <th>Jumlah Keluar</th>
            <th>Action</th>
            </tr>
            <?php
include "config/koneksi_dashboard.php";
$act="PLAIN";
?>
<td>
<select name='id_product' id='propinsi2' required>
<option value="">Pilih Part</option>
  <?php
//mengambil nama-nama propinsi yang ada di database

$propinsi_x="SELECT DISTINCT
ms.id_product,
mp.n_product

from master_stock ms

LEFT JOIN master_product mp on mp.id_product=ms.id_product
LEFT JOIN master_kategori mk on mk.id_kategori=mp.id_kategori";

$propinsi2= mysqli_query($koneksi,$propinsi_x);
while($p2=mysqli_fetch_array($propinsi2)){
echo "<option value=\"$p2[id_product]\">$p2[n_product] - $p2[id_product]</option>\n";
}
?>
  </select>
</td>

<td><select name="status_part" id="statuspart"  required>

</select></td>

              <!--<input type='hidden' name='part_description' id="part_description" placeholder='Part Desc' readonly >
              <input type='hidden' name='merk' id="merk" placeholder='Merk' readonly>
              <input type='hidden' name='satuan' id="uom" placeholder='Satuan' readonly>
-->

              <td><input type="text" size='2' name="sisa_stok" id='qty_ss' style="text-transform:uppercase" placeholder='Sisa Stok' readonly></td>
              <td><input type="text" size='2' name="price" id='price' style="text-transform:uppercase" placeholder='Harga Satuan' readonly></td>
              <input type="hidden" size='2' name="temp" id='temp' style="text-transform:uppercase" placeholder='Harga Satuan' readonly>
              <td><input type="number" min="0" name="qty_out" style="text-transform:uppercase" placeholder='Jumlah Keluar' required></td>

            <td><input type="submit" name="tambah" value="Tambah"></td>
            </tr>
        </table>
           <input type='hidden' name="id_user" value='<?php echo $id_user;?>'>
           <input type='hidden' name="region_lama" value='<?php echo $login_region;?>'>
           <input type='hidden' name="area_lama" value='<?php echo $login_area;?>'>
           <input type='hidden' name='id_uom' id="id_uom" placeholder='ID Satuan' readonly>
           <input type='hidden' name='login_area' id="login_area" value='<?php echo $login_area;?>'>
           <input type='hidden' name='id_merk' id="id_merk" placeholder='ID Merk' readonly>
           <input type='hidden' name='id_itemmat' id="id_itemmat" placeholder='id_itemmat' readonly>
           <input type='hidden' name='id_kategori_aset' id="id_kategori_aset" placeholder='id_kategori_aset' readonly>
           <input type='hidden' name='id_jenis' id="id_jenis" placeholder='id_jenis' readonly>
           <input type='hidden' name="act" value='<?php echo $act;?>'>


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
<th>Harga Satuan</th>
<th>Total</th>
<th>Status</th>

<th>Action</th>
</tr>

      


<?php

//echo $propinsi_x;
//menampilkan data yang berada di tabel temporary
$tampil="SELECT 
tt.idTransaksi,
tt.id_product,
tt.id_status_part,
tt.qty,
mp.n_product as nama_product,
mk.n_kategori as nama_kategori,
msp.n_status_part as nama_status_part,
mpp.price


from transaksi_temp tt

left join master_product mp on mp.id_product=tt.id_product
left join master_kategori mk on mk.id_kategori=mp.id_kategori
left join master_status_part msp on msp.id_status_part=tt.id_status_part
left join master_product_price mpp on mpp.id_product=tt.id_product
 where tt.username='".$id_user."' and tt.trx='".$act."'";
//echo $tampil;
$result_tampil=mysqli_query($koneksi,$tampil);

//menghitung jumlah item yang dikeluarkan
$jumlah_item="Select count(id_product) as jumlah_item from transaksi_temp where username='".$id_user."' and trx='".$act."'";
$rjumlah_item=mysqli_query($koneksi,$jumlah_item);
while ($item=mysqli_fetch_assoc($rjumlah_item))
{
           $jumlah_item=$item['jumlah_item'];

};

//mengakumulasi total part yang dikeluarkan
$total_item="Select sum(qty) as total_item from transaksi_temp where username='".$id_user."' and trx='".$act."'";
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
$price=$data_tampil['price'];
echo "<tr>

<td>".$no."</td>
<td>".$nama_kategori."</td>
<td>".$nama_product."</td>
<td>".number_format($qty,0)."</td>
<td>".number_format($price,0)."</td>
<td>".number_format($qty*$price,0)."</td>
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
<td><!--<b>".number_format($jtotal_item*$price)."</b>--></td>
<td></td>
<td></td>
</tr>";


echo "</table>";

echo "<br>";
echo "<b>Catatan :</b> <br>Pastikan Pada saat Transaksi Pengeluaran / Penerimaan, List Diatas Kosong, jika masih tersisa, silahkan di hapus terlebih dahulu untuk membersihkan cache</br>
";
echo "<br>";
//bataas
?>
<br>


<?php

$jumlah_data="SELECT id_product from transaksi_temp where username='$id_user' and trx='".$act."'";
$jresult=mysqli_query($koneksi,$jumlah_data);
$rjumlah_data=mysqli_num_rows($jresult);
//echo "Jumlah Part Yang di Transaksikan : ";
//echo $rjumlah_data;


?>
        <form method="post">
        <table id="customer" cellpadding="3" cellspacing="0"  border='0'>
        </tr>
        
         <tr>
              <td>No. Dokumen</td>
              <td>:</td>
              <td><input type="hidden" name="no_dokumen" required>
                Auto Generate By System</td>
            </tr>
         <tr>
              <td>Tanggal Dok</td >
              <td>:</td>
            <td><input type="text" name="tanggal_dokumen" id="tanggal" required></td>
            
            <tr>
              <td>Jenis Transaksi</td>
              <td>:</td>
              <td><select name="jtransaksi" required>
                                        <option value="">PILIH JENIS TRANSAKSI</option>
                                                <?php
                                                include "config/koneksi_dashboard.php";
                                                $sql_jtrx = mysqli_query($koneksi,"SELECT id_jtransaksi,n_jtransaksi FROM a_jenis_transaksi where id_kategori='OUT' order by n_jtransaksi ASC");
                                                
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

            <tr><td>Nama Penerima</td><td>:</td><td><input type='text' name='nama_penerima' style="text-transform:uppercase" placeholder='Isi Nama Penerimanya yaa' required >
            </tr>
            <tr>
            <td>Keterangan</td>
              <td>:</td>
              <td><textarea name="keterangan" style="text-transform:uppercase" placeholder='Makin lengkap makin bagus..maks 255 karakter yaa' required></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" name="proses" value="Proses"></td>
            </tr>
            
            <tr>
            <td></td>
            </tr>
            <input type="hidden" name="nama_pengirim" value="<?php echo $id_user;?>">
               <input type="hidden" name="jumlah" value="<?php echo $rjumlah_data;?>" >
                   <input type="hidden" name="region_lama" value="<?php echo $login_region;?>" >
                       <input type="hidden" name="area_lama" value="<?php echo $login_area;?>" >
                   <input type='hidden' name="id_user" value='<?php echo $id_user;?>'>
                   <input type='hidden' name="nama_user" value='<?php echo $nama_user;?>'>
                   <input type='hidden' name="act" value='<?php echo $act;?>'>
                   
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

                   where tt.username='".$id_user."' and tt.trx='".$act."'";
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
           <input type='hidden' name="id_merk[]" value='<?php echo $id_merk;?>'>
           <input type='hidden' name="id_uom[]" value='<?php echo $id_uom;?>'>
           <input type='hidden' name="qty_out[]" value='<?php echo $qty;?>'>
           <input type='hidden' name="part_desc[]" value='<?php echo $part_desc;?>'>
           <input type='hidden' name="lokasi_lama[]" value='<?php echo $lokasi_lama;?>'>
           <input type='hidden' name="status_part[]" value='<?php echo $status_part;?>'>

           
           <input type='hidden' name="id_itemmat[]" value='<?php echo $id_itemmat;?>'>
           <input type='hidden' name="id_kategori_aset[]" value='<?php echo $id_kategori_aset;?>'>
           <input type='hidden' name="id_jenis[]" value='<?php echo $id_jenis;?>'>





           <?php
                    };

           ?>
        <br>
        <br>

    </form>



<script type="text/javascript" src="areatransvision/jquery.js"></script>
<script type="text/javascript">
var htmlobjek;
$(document).ready(function(){
  //apabila terjadi event onchange terhadap object <select id=propinsi>
  $("#propinsi2").change(function(){
    var propinsi2 = $("#propinsi2").val();
    var login_area = $("#login_area").val();
    $.ajax({
        url: "code/cek_lokasi.php",
        data: "propinsi2="+propinsi2+"&login_area="+login_area,
        cache: false,
        success: function(msg){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=kota>
            $("#statuspart").html(msg);
        }
    });
  });

  $("#statuspart").change(function(){


  var propinsi2 = $("#propinsi2").val();
  var login_area = $("#login_area").val();
  var id_lokasi = $("#kota2").val();
  var statuspart = $("#statuspart").val();


  $.ajax({
            url: 'code/ajax_master_barang.php',
            data:"propinsi2="+propinsi2+"&login_area="+login_area+"&kota2="+id_lokasi+"&statuspart="+statuspart,
           //+"&id_lokasi="+id_lokasi

        }).success(function (data_part) {
            var json = data_part,
            obj = JSON.parse(json);
           // $('#part_description').val(obj.part_description);
           // $('#merk').val(obj.merk);
           // $('#uom').val(obj.uom);
            $('#id_product').val(obj.id_product);
            $('#id_kategori').val(obj.id_kategori);
            $('#price').val(obj.price);
            $('#id_status_part').val(obj.id_status_part);
            $('#qty_ss').val(obj.qty_ss);
            //$('#temp').val(obj.temp);
            //$('#statuspart').val(obj.statuspart);
            //$('#id_itemmat').val(obj.id_itemmat);
            //$('#id_kategori_aset').val(obj.id_kategori_aset);
            //$('#id_jenis').val(obj.id_jenis);


           });
        })
        })
   </script>


<!-- Note Dewa : Javascript untuk meload otomatis kategori pada saat pemilihan item material, perubahan tgl 9 juni 2017 -->
<script src="js/jquery.min.js"></script>
<script type="text/javascript">

function isi_otomatis_kategori(){
                var item_material= $("#item_material").val();
                //$("#n_kategori_aset").val('xx');
                $.ajax({
                    url: 'function/function_kategori.php',
                    data:"item_material="+item_material ,
                }).success(function (data) {
                        //console.log(data);
                    var json = data,
                    obj = JSON.parse(json);
                    $('#id_kategori_aset').val(obj.id_kategori_aset);
                    $('#n_kategori_aset').val(obj.n_kategori_aset);
                    $('#id_itemmat').val(obj.id_itemmat);
                });
            }
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
<!-- batas -->


<script src="js/lib/jquery.min.js"></script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
<script type="text/javascript">
    function cek_database(){
        var id_product = $("#id_product").val();
        var login_area = $("#login_area").val();
        //var id_lokasi = $("#id_lokasi").val();
        $.ajax({
            url: 'include/ajax_master_barang.php',
            data:"id_product="+id_product+"&login_area="+login_area,
           //+"&id_lokasi="+id_lokasi

        }).success(function (data) {
            var json = data,
            obj = JSON.parse(json);
            $('#part_description').val(obj.part_description);
            $('#merk').val(obj.merk);
            $('#materialgroup').val(obj.materialgroup);
            $('#uom').val(obj.uom);
            $('#stock').val(obj.stock);
            $('#id_merk').val(obj.id_merk);
            $('#id_uom').val(obj.id_uom);
            $('#temp').val(obj.temp);
            $('#id_lokasi').val(obj.id_lokasi);



        /*
            var $jenis_kelamin = $('input:radio[name=jenis_kelamin]');
        if(obj.jenis_kelamin == 'laki-laki'){
            $jenis_kelamin.filter('[value=laki-laki]').prop('checked', true);
        }else{
            $jenis_kelamin.filter('[value=perempuan]').prop('checked', true);
        }
        */
        });
        }
   </script>

<script src="js/lib/jquery.min.js"></script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
<script type="text/javascript">

   </script>

           <script src="js/jquery.min.js"></script>
        <script type="text/javascript">
        function isi_otomatis_npk(){
        var npk= $("#npk").val();
        $.ajax({
        url: 'function/function_npk.php',
        data:"npk="+npk ,
        }).success(function (data) {
        var json = data,
        obj = JSON.parse(json);
        $('#nama_pegawai').val(obj.nama_pegawai);
        $('#jabatan').val(obj.jabatan);
        $('#divisi').val(obj.divisi);
        $('#departemen').val(obj.departemen);
        $('#bagian').val(obj.bagian);
        $('#unit').val(obj.unit);
        $('#direktorat').val(obj.direktorat);
        });
        }
        </script>