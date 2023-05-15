<?php
 //echo "menjalankan jenis transaksi prwh";
 //echo "<br>";
echo "sampai disini bro";

$status_baru='STS002';

//stop();




                     for($i=0; $i < $jumlah_count2; $i++)
                    {

                    $id_product=$id_producty[$i];
                    //$id_uom=$id_uomy[$i];
                    $qty_out=$qty_outy[$i];
                    //$id_merk=$id_merky[$i];
                    //$part_desc=$part_descy[$i];
                    //$lokasi_lama=$lokasi_lamay[$i];
                    $status_partx=$status_party[$i];

                    //$id_itemmat=$id_itemmaty[$i];
                    //$id_kategori_aset=$id_kategori_asety[$i];
                    //$id_jenis=$id_jenisy[$i];




                    //check stock awal untuk melengkapi transaksi out
                    $ss_out="Select 

					COALESCE(sum(qty_sa),0) as sa,
					COALESCE(sum(qty_ss),0) as ss
                    
                    from master_stock where id_product='".$id_product."' and id_status_part='".$status_partx."'";
                    echo "<hr>";
                    echo $ss_out;
					//stop();
                    $rss_out=mysqli_query($koneksi,$ss_out);
                    while($xrss_out = mysqli_fetch_assoc($rss_out)){
                       $qty_sa=$xrss_out['sa'];
                       $qty_ss=$xrss_out['ss'];
                       
                       echo "<br>";
                       echo $qty_sa;
                       echo "<br>";
                       echo $qty_ss;
                       echo "<hr>";
                       
                    }
					//stop();

					//check stock status baru untuk melengkapi transaksi in
                    $ss_in="Select 

					
					COALESCE(sum(qty_sa),0) as sa,
					COALESCE(sum(qty_ss),0) as ss
                    
                    from qty_master_stock where id_product='".$id_product."' and id_status_part='".$status_baru."'";
                    echo $ss_in;
					//stop();
                    $rss_in=mysqli_query($ss_in);
                    while($xrss_in = mysqli_fetch_assoc($rss_in)){
                       $qty_sa_in=$xrss_in['sa'];
                       $qty_ss_in=$xrss_in['ss'];
                       
                    //   echo "<br>";
                    //  echo $qty_sa_in;
                    //  echo "<br>";
                    //  echo $qty_ss_in;
                    //  echo "<hr>";
                       
                    }

					//stop();

                    
                    //SQL UNTUK MENGURANGI STOCK AREA AWAL
                    $masterstok_mengurangi="UPDATE master_stock set
                    qty_sa='".$qty_ss."',
                    qty_in='0.00',
                    qty_out='".$qty_out."',
                    qty_ss=qty_sa-$qty_out,
                    idTransaksi='".$trx_out."',
                    keterangan='".$keterangan."',
                    tgl_posting=NOW(),
                    username='".$id_user."',
                    id_jtransaksi='".$jtransaksi."'

                    where
                    id_product='".$id_product."' and 
                    id_status_part='".$status_partx."'
                    ";


                    echo "<br>";
                    echo $masterstok_mengurangi;
                    echo "<br>";
                    echo "<hr>";
                    
                    
                    //stop();


                    $rmasterstok_mengurangi=mysqli_query($koneksi,$masterstok_mengurangi);


                           if($rmasterstok_mengurangi) {

                           //echo "Menambah WH Transit Berhasil";
                           //mencatat ke table transaksi sebagai transaksi pengeluaran
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
                                                '$trx_out',
                                                '$id_product',
                                                '$qty_ss',
                                                '$qty_in',
                                                '$qty_out',
                                                ('$qty_ss'+'$qty_in'-'$qty_out'),
                                                NOW(),
                                                '$id_user',
                                                '$jtransaksi',
                                                '$status_partx'
                                                )";
                                                
                                                
                                                echo "<br>";
												echo "<hr>";
                                                echo $temp_insert_header;

												//stop();
                                                
                                                $rtemp_insert_header=mysqli_query($koneksi,$temp_insert_header);
                                               
                                                if($rtemp_insert_header){
                                                   //echo "Insert ke Transaksi header Berhasil";
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
                                                            id_jpengiriman
                                                            )
                                        
                                                            values (
                                                            '$trx_out',            
                                                            NOW(),
                                                            '$id_user',
                                                            '$nama_pengirim',
                                                            '$nama_penerima',
                                                            '$nomorbaru',
                                                            '$tanggal_dokumen2',
                                                            '$keterangan',
                                                            '$id_jpengiriman'
                                                            
                                                            )";

                                                            
                                                          echo "<br>";
														  echo "<hr>";
                                                          echo $temp_insert_detail;
                                                            
                                                       // stop();
                                                            $rtemp_insert_detail=mysqli_query($koneksi,$temp_insert_detail);

                                                            if ($rtemp_insert_detail){

																 //SQL UNTUK MENAMBAH STOCK LOKASI BARU
																		                           $insert_stok="insert into master_stock(
																									  idTransaksi,
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
																									  '".$trx_in."',
																									  '".$id_product."',
																									  '".$keterangan."',
																									  '$qty_sa_in',
																									  '$qty_out',
																									  '0.00',
																									  qty_sa+$qty_out,
																									  NOW(),
																									  '".$id_user."',
																									  '".$jtransaksi2."',
																									  '".$status_baru."'
																									  
																									  )
																				 
																									  ON DUPLICATE KEY UPDATE
																									  idTransaksi='$trx_in',
																									  qty_sa=qty_ss,
																									  qty_in='".$qty_out."',
																									  qty_out='0.00',
																									  qty_ss=qty_sa+'$qty_out',
																									  keterangan='".$keterangan."',
																									  tgl_posting=NOW(),
																									  username='".$id_user."',
																									  id_jtransaksi='".$jtransaksi2."'
																									  ";
																		


																		echo "<br>";
																		echo $insert_stok;
																		echo "<br>";
																		echo "<hr>";
																		
																		
																		//stop();


																		$rmasterstok_menambah=mysqli_query($koneksi,$insert_stok);


																			   if($rmasterstok_menambah) {

																			   //echo "Menambah WH Transit Berhasil";
																			   //mencatat ke table transaksi sebagai transaksi pengeluaran
																			   $insert_ts_tambah="
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
																									'$trx_in',
																									'$id_product',
																									'$qty_ss_in',
																									'$qty_out',
																									'0.00',
																									'$qty_ss_in'+'$qty_out',
																									NOW(),
																									'$id_user',
																									'$jtransaksi2',
																									'$status_baru'
																									)";
																									
																									
																									echo "<br>";
																								    echo "<hr>";
																									echo $insert_ts_tambah;

																									//stop();
																									
																									$rinsert_ts_tambah=mysqli_query($koneksi,$insert_ts_tambah);
																								   
																									if($rinsert_ts_tambah){
																									   //echo "Insert ke Transaksi header Berhasil";
																									   $insert_tsd_tambah_="
																												insert into master_header_detail(
																												idTransaksi,
																												id_product,
																												tgl_posting,
																												username,
																												nama_pengirim,
																												nama_penerima,
																												no_dokumen,
																												tgl_dokumen,
																												keterangan,
																												id_jpengiriman
																												)
																							
																												values (
																												'$trx_in',
																												'$id_product',
																												NOW(),
																												'$id_user',
																												'$nama_pengirim',
																												'$nama_penerima',
																												'$nomorbaru',
																												'$tanggal_dokumen2',
																												'$keterangan',
																												'$status_partx'
																												
																												)";

																												
																										//	echo "<br>";
																										//	echo "<hr>";
																										//	echo //$insert_tsd_tambah_;
																												
																										//stop();
																												$rinsert_tsd_tambah_=mysqli_query($koneksi,$insert_tsd_tambah_);




                                                               
                                                             

                                                               
                                                               
                                                               //echo "insert ke stock detail berhasil";
                                                           //echo "<hr><br>";
                                                                          // echo "<font color='blue'>Tambah ke data master stock berhasil</font> ";
                                                                           //delete tabel temporary setelah data berhasil diinsert
                                                                           $temp_delete="delete from transaksi_temp where id_product='".$id_product."' and id_status_part='".$status_partx."' and trx='".$act."'";
                                                                           //$temp_serial="delete from b_serial_temp where id_product='".$id_product."' and id_lokasi='".$lokasi_lama."' and id_status_part='".$status_partx."' and trx='".$act."'";
                                                                          // $rtemp_serial=mysqli_query($temp_serial);  

                                                                           $rtemp_delete=mysqli_query($koneksi,$temp_delete);
                                                                           //echo $temp_delete;
                                        
                                                                                                              if ($rtemp_delete){
                                                                                                                 
                                                                                                                    //   echo "Delete Data Transaksi Temp Berhasil";
                                                                                                                       print '<script type="text/javascript">
                                                                                                 window.onload = function () { alert("Transaksi Pengeluaran Berhasil"); }
                                                                                                </script>';
                                                                                                
                                                                                                echo "
                                                                                                <meta http-equiv='refresh' content='0; url=index.php?p=code/b_pengeluaran_lainnya'>
                                                                                                ";
																								
																								//stop();
                                                                                                
                                                                                                
                                                                                                
                                                                                                              } else {
                                                                                                                  echo "delete data transaksi temp gagal";
                                                                                                              }

                                                                                                           } else {
                                                                                                               echo "insert data transaksi detail2 gagal";
                                                                                                           }

																										 


                                                } else {
                                                   echo "Insert ke Transaksi header Gagal";

                                                }


                                             } else {
                                                echo "Insert WH Transit Transaksi Gagal";

                                             }




                        } else {
                           echo "Menambah WH Transit Gagal";

                        }

                       } else {
                          echo "Mengurangi Master Stock Gagal";
                       }
                    }




    ?>