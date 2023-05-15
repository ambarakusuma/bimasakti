<?php 
//generate nomor document 
                    include "function_romawi.php";
                    include "../config/koneksi_dashboard.php";
                    $bulan = date('n');
                    $romawi = getRomawi($bulan);
                    $tahun = date ('Y');
                    $nomor = "/".$jtransaksi."/".$area_lama."/".$romawi."/".$tahun;


                    // membaca kode  terbesar dari penomoran yang ada didatabase berdasarkan tanggal
                    $query = "SELECT max(no_dokumen) as maxKode FROM qty_transaksi_stock_detail WHERE month(tgl_dokumen)='$bulan' and id_jtransaksi='$jtransaksi'";
                    //echo $query;
                    $hasil = mysql_query($query);
                    $datax  = mysql_fetch_array($hasil);
                    $no= $datax['maxKode'];
                    $noUrut= $no + 1;
                    //Membuat Nomor dengan awalan depan 0 misalnya , 01,02 
                    //Jika ingin 003 ,tinggal ganti %03
                    $kode =  sprintf("%05s", $noUrut);
                    $nomorbaru = $kode.$nomor;
                    //echo $nomorbaru;
                    

?>