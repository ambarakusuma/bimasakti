<?php 
                    include 'config/function_transaksi.php';
                    include 'config/koneksi_dashboard.php';
                    $trx=trx_tambah_stock_barang_temp();
                    $id_product=strtoupper($_POST['no_part']);
                    //$part_description=$_POST['part_description'];
                    $qty=$_POST['qty'];
                    //$qty_in=number_format($qty, 2, '.', '');
                    //echo "isi";
                    //echo $qty;
                    $id_user=$_POST['id_user'];
                    //$merk=$_POST['merk'];
                    $status_part=$_POST['status_part'];
                    //$satuan=$_POST['satuan'];
                    //$id_merk=$_POST['id_merk'];
                    //$id_uom=$_POST['id_uom'];
                    //$id_itemmat=$_POST['id_itemmat'];
                    //$id_kategori_aset=$_POST['id_kategori_aset'];
                    //$id_jenis=$_POST['id_jenis'];

                    


                    $temp="INSERT into transaksi_temp
                    (
                    idTransaksi,
                    id_product,
                    qty,
                    tgl_posting,
                    username,
                    id_status_part,
                    trx
                    )
                     values
                     (
                     '$trx',
                     '$id_product',
                     '$qty',
                     NOW(),
                     '$id_user',
                     '$status_part',
                     '$keterangan_penerimaan'

                     )
                      on duplicate key update qty=qty+'$qty'";
                     //echo $temp;
                     //stop();

                    $result=mysqli_query($koneksi,$temp);
                        if ($result){
                       echo "<font color='blue'>Tambah Data ke Table Transaksi Temp Berhasil</font>";
                      }
                      else
                      {
                       echo "<font color='red'>Tambah Data ke Table Transaksi Temp Gagal</font>";
                    }

?>