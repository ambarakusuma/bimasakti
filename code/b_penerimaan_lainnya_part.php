<?php
include 'config/koneksi_dashboard.php';
//echo "sampe sini ga ? hati hati yaaaa";

//echo $jumlah_count2;

//stop();                    
                    
                    
                    for($i=0; $i < $jumlah_count2; $i++)
                    {

                    $id_product=$id_producty[$i];
                    $id_kategori=$id_kategoriy[$i];
                    $qty_in=$qty_iny[$i];
                    $status_part_y=$status_party[$i];


                    //$no_part=$no_party[$i];
                    //$id_uom=$id_uomy[$i];
                    //$qty_in=$qty_iny[$i];
                    //$id_merk=$id_merky[$i];
                    //$part_desc=$part_descy[$i];
                    
                    //$id_itemmat=$id_itemmaty[$i];
                    //$id_kategori_aset=$id_kategori_asety[$i];
                    //$id_jenis=$id_jenisy[$i];


                    //check stock awal
                    $ss="Select COALESCE(SUM(qty_ss),0) AS ss from master_stock where id_product='".$id_product."'  and id_status_part='".$status_part_y."' ";
                    echo $ss;
                    //stop();
                    $rss=mysqli_query($koneksi,$ss);
                    $values = mysqli_fetch_assoc($rss);
                    $qty_ss = $values['ss'];
                    
                    echo "Jumlah yang muncul :"; 
                    echo $qty_ss;
                    

                    //stop();

                    /*
                    while($xrss = mysqli_fetch_assoc($rss)){
                       $qty_ss=$xrss['ss'];
                       echo $qty_ss;
                    }
                    */

                    //echo "cek<br>";
                    //$qty_ss;
                    $qty_out='0';


                    //update ke table master_stock;
                    $stock_insert="
                    insert into master_stock(
                                                idTransaksi,
                                                id_kategori,
                                                id_product,
                                                keterangan,
                                                qty_sa,
                                                qty_in,
                                                qty_out,
                                                qty_ss,
                                                tgl_posting,
                                                username,
                                                id_jtransaksi,
                                                id_status_part
                                                
                                            ) values (
                                                '$trx',
                                                '$id_kategori',
                                                '$id_product',
                                                '$keterangan',
                                                '$qty_ss',
                                                '$qty_in',
                                                '$qty_out',
                                                '$qty_in',
                                                NOW(),
                                                '$id_user',
                                                '$jtransaksi',
                                                '$status_part_y'
                                                )

                                                ON DUPLICATE KEY UPDATE
                                                idTransaksi='$trx',
                                                qty_sa=qty_ss,
                                                qty_in=$qty_in,
												qty_out=$qty_out,
                                                qty_ss=qty_ss+$qty_in,
												keterangan='$keterangan',
												tgl_posting=NOW(),
												username='$id_user',
												id_jtransaksi='$jtransaksi'
												
                                            ";
                                            //echo "<hr>";
                                            //echo $stock_insert;
                                            //stop();
                                            $rstock_insert=mysqli_query($koneksi,$stock_insert);
                                            
                                            

                                            if($rstock_insert) {
                                                
                                                //echo "update master_stock berhasil";
                                                //echo "<hr><br>"; 
                                                
                                                echo "sampai";
                                                
                                                $temp_insert_header="
                                                insert into master_header(
                                                idTransaksi,
                                                id_product,
                                                qty_sa,
                                                qty_in,
                                                qty_out,
                                                qty_ss,
                                                tgl_posting,
                                                username,
                                                id_jtransaksi,
                                                id_status_part
                                                )
                            
                                                values (
                                                '$trx',
                                                '$id_product',
                                                '$qty_ss',
                                                '$qty_in',
                                                '$qty_out',
                                                ('$qty_ss'+'$qty_in'-'$qty_out'),
                                                NOW(),
                                                '$id_user',
                                                '$jtransaksi',
                                                '$status_part_y'
                                                )";

                                                //echo "<hr>"; 
                                                //echo $temp_insert_header;
                                               //stop();
                                                
                                                $rtemp_insert_header=mysqli_query($koneksi,$temp_insert_header);
                                                
                                                

                                                
                                                if ($rtemp_insert_header){
                                                    
                                                    //echo "insert ke stock header berhasil";
                                                    
                                                    /*
                                                    echo "<hr><br>";
                                                    echo "status part";
                                                    echo $status_part;
                                                    */

                                                    $temp_insert_detail="
                                                            insert into master_header_detail(
                                                            idTransaksi,
                                                            tgl_posting,
                                                            username,
                                                            nama_pengirim,
                                                            nama_penerima,
                                                            no_dokumen,
                                                            tgl_dokumen,
                                                            keterangan,
                                                            surat_jalan,
                                                            id_jpengiriman
                                                            )
                                        
                                                            values (
                                                            '$trx',
                                                            NOW(),
                                                            '$id_user',
                                                            '$nama_pengirim',
                                                            '$nama_penerima',
                                                            '$nomorbaru',
                                                            '$tanggal_dokumen2',
                                                            '$keterangan',
                                                            '$surat_jalan',
                                                            '$id_jpengiriman'
                                                            )";
                                                            
                                                            
                                                            //echo "<hr>";
                                                            //echo $temp_insert_detail;
                                                            //stop();

                                                            $rtemp_insert_detail=mysqli_query($koneksi,$temp_insert_detail);
                                                            
                                                            
                                                            

                                                            if ($rtemp_insert_detail){
                                                                //echo "insert ke stock detail berhasil";
                                                            //echo "<hr><br>";
                                                                          //  echo "<font color='blue'>Tambah ke data master stock berhasil</font> ";
                                                                            //delete tabel temporary setelah data berhasil diinsert
                                                                            $temp_delete="delete from transaksi_temp where username='".$id_user."'";
																			//echo $temp_delete;
                                                                            $rtemp_delete=mysqli_query($koneksi,$temp_delete);
                                                                            //echo $temp_delete;
                                         
                                                                                                               if ($rtemp_delete){
                                                                                                                //        echo "Delete Data Transaksi Temp Berhasil";
                                                                                                                        print '<script type="text/javascript">
                                                                                                  window.onload = function () { alert("Transaksi Penerimaan Berhasil"); }
                                                                                                 </script>';
                                                                                                 
                                                                                                 echo "
                                                                                                 <meta http-equiv='refresh' content='0; url=index.php?p=code/list_transaksi'>
                                                                                                 ";
                                                                                                 
                                                                                                               } else {
                                                                                                                   echo "delete data transaksi temp gagal";
                                                                                                               }

                                                                                                            } else {
                                                                                                                echo "insert data transaksi detail2 gagal";
                                                                                                            }
                                                                
                                         
                                         
                                                } else {
                                                    echo "insert data transaksi detail gagal";
                                                }



                                            } else {
                                                echo "transaksi insert header gagal";
                                            }
        
                                            }
?>