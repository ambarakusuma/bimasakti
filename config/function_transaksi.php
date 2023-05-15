<?php

//Kode BA untuk transaksi Update Status Aset
function trx_statusaset(){
$format = date("Ymd");
$sql=mysql_query("SELECT idTransaksi FROM transaksi_update_status_aset WHERE substr(idTransaksi,1,2)='SA' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);

if($d>0){
$r=mysql_fetch_array($sql);
$d=$r['idTransaksi'];
$str=substr($d,11,5);
$No_Urut = (int)$str;
}else{
$No_Urut = 0;
}

$No_Urut = $No_Urut + 1;
$Nol="";
$nilai=5-strlen($No_Urut);
for ($i=1;$i<=$nilai;$i++){
$Nol= $Nol."0";
}

$Kd_Trans ="SA".$format.$Nol.$No_Urut;
return $Kd_Trans;
}

//Kode BA untuk transaksi Update Status Fisik
function trx_statusfisik(){
$format = date("Ymd");
$sql=mysql_query("SELECT idTransaksi FROM transaksi_update_status WHERE substr(idTransaksi,1,2)='SF' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);

if($d>0){
$r=mysql_fetch_array($sql);
$d=$r['idTransaksi'];
$str=substr($d,11,5);
$No_Urut = (int)$str;
}else{
$No_Urut = 0;
}

$No_Urut = $No_Urut + 1;
$Nol="";
$nilai=5-strlen($No_Urut);
for ($i=1;$i<=$nilai;$i++){
$Nol= $Nol."0";
}

$Kd_Trans ="SF".$format.$Nol.$No_Urut;
return $Kd_Trans;
}

//Kode BA untuk transaksi Aset Redistribusi
function trx_redistribusi(){
$format = date("Ymd");
$sql=mysql_query("SELECT idTransaksi FROM transaksi_distribusi WHERE substr(idTransaksi,1,2)='RD' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);

if($d>0){
$r=mysql_fetch_array($sql);
$d=$r['idTransaksi'];
$str=substr($d,11,5);
$No_Urut = (int)$str;
}else{
$No_Urut = 0;
}

$No_Urut = $No_Urut + 1;
$Nol="";
$nilai=5-strlen($No_Urut);
for ($i=1;$i<=$nilai;$i++){
$Nol= $Nol."0";
}

$Kd_Trans ="RD".$format.$Nol.$No_Urut;
return $Kd_Trans;
}

//Kode BA untuk transaksi Aset Mutasi
function trx_asetmutasi(){
$format = date("Ymd");
$sql=mysql_query("SELECT idTransaksi FROM transaksi WHERE substr(idTransaksi,1,2)='MT' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);

if($d>0){
$r=mysql_fetch_array($sql);
$d=$r['idTransaksi'];
$str=substr($d,11,5);
$No_Urut = (int)$str;
}else{
$No_Urut = 0;
}

$No_Urut = $No_Urut + 1;
$Nol="";
$nilai=5-strlen($No_Urut);
for ($i=1;$i<=$nilai;$i++){
$Nol= $Nol."0";
}

$Kd_Trans ="MT".$format.$Nol.$No_Urut;
return $Kd_Trans;
}

//Kode BA untuk transaksi Aset Mutasi
function trx_asetmutasinew(){
	$format = date("Ymd");
	$sql=mysql_query("SELECT idTransaksi FROM trx_mutasi WHERE substr(idTransaksi,1,2)='MT' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);
	
	if($d>0){
	$r=mysql_fetch_array($sql);
	$d=$r['idTransaksi'];
	$str=substr($d,11,5);
	$No_Urut = (int)$str;
	}else{
	$No_Urut = 0;
	}
	
	$No_Urut = $No_Urut + 1;
	$Nol="";
	$nilai=5-strlen($No_Urut);
	for ($i=1;$i<=$nilai;$i++){
	$Nol= $Nol."0";
	}
	
	$Kd_Trans ="MT".$format.$Nol.$No_Urut;
	return $Kd_Trans;
	}

//Kode BA untuk transaksi Aset Mutasi
function trx_penerimaan(){
$format = date("Ymd");
$sql=mysql_query("SELECT idTransaksi FROM transaksi_penerimaan WHERE substr(idTransaksi,1,2)='AT' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);

if($d>0){
$r=mysql_fetch_array($sql);
$d=$r['idTransaksi'];
$str=substr($d,11,5);
$No_Urut = (int)$str;
}else{
$No_Urut = 0;
}

$No_Urut = $No_Urut + 1;
$Nol="";
$nilai=5-strlen($No_Urut);
for ($i=1;$i<=$nilai;$i++){
$Nol= $Nol."0";
}

$Kd_Trans ="AT".$format.$Nol.$No_Urut;
return $Kd_Trans;
}

//Kode BA untuk transaksi Tambah Aset (Register Aset)
function trx_tambah_aset(){
$format = date("Ymd");
$sql=mysql_query("SELECT idTransaksi FROM transaksi_tambah_aset WHERE substr(idTransaksi,1,2)='RA' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);

if($d>0){
$r=mysql_fetch_array($sql);
$d=$r['idTransaksi'];
$str=substr($d,11,5);
$No_Urut = (int)$str;
}else{
$No_Urut = 0;
}

$No_Urut = $No_Urut + 1;
$Nol="";
$nilai=5-strlen($No_Urut);
for ($i=1;$i<=$nilai;$i++){
$Nol= $Nol."0";
}

$Kd_Trans ="RA".$format.$Nol.$No_Urut;
return $Kd_Trans;
}




//Kode BA untuk transaksi Asset Approval (Approval Register Aset)

//Kode BA untuk transaksi Aset Mutasi
function trx_aset_approval(){
$format = date("Ymd");
$sql=mysql_query("SELECT idTransaksi FROM transaksi_approval WHERE substr(idTransaksi,1,2)='AA' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);

if($d>0){
$r=mysql_fetch_array($sql);
$d=$r['idTransaksi'];
$str=substr($d,11,5);
$No_Urut = (int)$str;
}else{
$No_Urut = 0;
}

$No_Urut = $No_Urut + 1;
$Nol="";
$nilai=5-strlen($No_Urut);
for ($i=1;$i<=$nilai;$i++){
$Nol= $Nol."0";
}

$Kd_Trans ="AA".$format.$Nol.$No_Urut;
return $Kd_Trans;
}


//Kode Transaksi untuk insert dan update karyawan
function trx_insert_update_karyawan(){
$format = date("Ymd");
$sql=mysql_query("SELECT idTransaksi FROM karyawan WHERE substr(idTransaksi,1,2)='IK' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);

if($d>0){
$r=mysql_fetch_array($sql);
$d=$r['idTransaksi'];
$str=substr($d,11,5);
$No_Urut = (int)$str;
}else{
$No_Urut = 0;
}

$No_Urut = $No_Urut + 1;
$Nol="";
$nilai=5-strlen($No_Urut);
for ($i=1;$i<=$nilai;$i++){
$Nol= $Nol."0";
}

$Kd_Trans ="IK".$format.$Nol.$No_Urut;
return $Kd_Trans;
}






//Kode BA untuk Insert Jenis Pengadaan
function trx_insert_jenis_pengadaan(){
$format = date("Ymd");
$sql=mysql_query("SELECT idTransaksi FROM transaksi_a_jenis_pengadaan WHERE substr(idTransaksi,1,2)='IJ' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);

if($d>0){
$r=mysql_fetch_array($sql);
$d=$r['idTransaksi'];
$str=substr($d,11,5);
$No_Urut = (int)$str;
}else{
$No_Urut = 0;
}

$No_Urut = $No_Urut + 1;
$Nol="";
$nilai=5-strlen($No_Urut);
for ($i=1;$i<=$nilai;$i++){
$Nol= $Nol."0";
}

$Kd_Trans ="IJ".$format.$Nol.$No_Urut;
return $Kd_Trans;
}


//Kode BA untuk Insert Jenis Pengadaan
function trx_edit_jenis_pengadaan(){
$format = date("Ymd");
$sql=mysql_query("SELECT idTransaksi FROM transaksi_a_jenis_pengadaan WHERE substr(idTransaksi,1,2)='JP' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);

if($d>0){
$r=mysql_fetch_array($sql);
$d=$r['idTransaksi'];
$str=substr($d,11,5);
$No_Urut = (int)$str;
}else{
$No_Urut = 0;
}

$No_Urut = $No_Urut + 1;
$Nol="";
$nilai=5-strlen($No_Urut);
for ($i=1;$i<=$nilai;$i++){
$Nol= $Nol."0";
}

$Kd_Trans ="JP".$format.$Nol.$No_Urut;
return $Kd_Trans;
}


//Kode Transaksi Update Nama Pegawai
function trx_update_nama_pegawai(){
$format = date("Ymd");
$sql=mysql_query("SELECT idTransaksi FROM transaksi_update_nama_pegawai WHERE substr(idTransaksi,1,2)='NP' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);

if($d>0){
$r=mysql_fetch_array($sql);
$d=$r['idTransaksi'];
$str=substr($d,11,5);
$No_Urut = (int)$str;
}else{
$No_Urut = 0;
}

$No_Urut = $No_Urut + 1;
$Nol="";
$nilai=5-strlen($No_Urut);
for ($i=1;$i<=$nilai;$i++){
$Nol= $Nol."0";
}

$Kd_Trans ="NP".$format.$Nol.$No_Urut;
return $Kd_Trans;
}

//Kode Transaksi Update Nama Pegawai
function trx_update_warna(){
$format = date("Ymd");
$sql=mysql_query("SELECT idTransaksi FROM transaksi_update_warna WHERE substr(idTransaksi,1,2)='UW' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);

if($d>0){
$r=mysql_fetch_array($sql);
$d=$r['idTransaksi'];
$str=substr($d,11,5);
$No_Urut = (int)$str;
}else{
$No_Urut = 0;
}

$No_Urut = $No_Urut + 1;
$Nol="";
$nilai=5-strlen($No_Urut);
for ($i=1;$i<=$nilai;$i++){
$Nol= $Nol."0";
}

$Kd_Trans ="UW".$format.$Nol.$No_Urut;
return $Kd_Trans;
}

//Kode Transaksi Update Nama Pegawai
function trx_update_type_sn(){
$format = date("Ymd");
$sql=mysql_query("SELECT idTransaksi FROM transaksi_update_type_sn WHERE substr(idTransaksi,1,2)='US' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);

if($d>0){
$r=mysql_fetch_array($sql);
$d=$r['idTransaksi'];
$str=substr($d,11,5);
$No_Urut = (int)$str;
}else{
$No_Urut = 0;
}

$No_Urut = $No_Urut + 1;
$Nol="";
$nilai=5-strlen($No_Urut);
for ($i=1;$i<=$nilai;$i++){
$Nol= $Nol."0";
}

$Kd_Trans ="US".$format.$Nol.$No_Urut;
return $Kd_Trans;
}


//Kode Transaksi Update Nama Pegawai
function trx_insert_update_stock(){
$format = date("Ymd");
$sql=mysql_query("SELECT nidtransaksi FROM master_data_transaksi_upload WHERE substr(nidtransaksi,1,2)='IS' AND substr(nidtransaksi,3,8) like '%".$format."%' ORDER BY nidtransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);

if($d>0){
$r=mysql_fetch_array($sql);
$d=$r['nidtransaksi'];
$str=substr($d,11,5);
$No_Urut = (int)$str;
}else{
$No_Urut = 0;
}

$No_Urut = $No_Urut + 1;
$Nol="";
$nilai=5-strlen($No_Urut);
for ($i=1;$i<=$nilai;$i++){
$Nol= $Nol."0";
}

$Kd_Trans ="IS".$format.$Nol.$No_Urut;
return $Kd_Trans;
}

//Kode untuk pengurangan
function trx_update_pengurangan(){
$format = date("Ymd");
$sql=mysql_query("SELECT idTransaksi FROM transaksi_update_pengurangan WHERE substr(idTransaksi,1,2)='PG' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);

if($d>0){
$r=mysql_fetch_array($sql);
$d=$r['idTransaksi'];
$str=substr($d,11,5);
$No_Urut = (int)$str;
}else{
$No_Urut = 0;
}

$No_Urut = $No_Urut + 1;
$Nol="";
$nilai=5-strlen($No_Urut);
for ($i=1;$i<=$nilai;$i++){
$Nol= $Nol."0";
}

$Kd_Trans ="PG".$format.$Nol.$No_Urut;
return $Kd_Trans;
}

//Kode Transaksi Update Lantai Ruangan
function trx_update_lantai_ruangan(){
$format = date("Ymd");
$sql=mysql_query("SELECT idTransaksi FROM transaksi_update_lantai_ruangan WHERE substr(idTransaksi,1,2)='LR' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);

if($d>0){
$r=mysql_fetch_array($sql);
$d=$r['idTransaksi'];
$str=substr($d,11,5);
$No_Urut = (int)$str;
}else{
$No_Urut = 0;
}

$No_Urut = $No_Urut + 1;
$Nol="";
$nilai=5-strlen($No_Urut);
for ($i=1;$i<=$nilai;$i++){
$Nol= $Nol."0";
}

$Kd_Trans ="LR".$format.$Nol.$No_Urut;
return $Kd_Trans;
}

//Kode Transaksi Cancel
function trx_cancel(){
$format = date("Ymd");
$sql=mysql_query("SELECT idTransaksi_cancel FROM transaksi_cancel WHERE substr(idTransaksi_cancel,1,2)='TC' AND substr(idTransaksi_cancel,3,8) like '%".$format."%' ORDER BY idTransaksi_cancel DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);

if($d>0){
$r=mysql_fetch_array($sql);
$d=$r['idTransaksi_cancel'];
$str=substr($d,11,5);
$No_Urut = (int)$str;
}else{
$No_Urut = 0;
}

$No_Urut = $No_Urut + 1;
$Nol="";
$nilai=5-strlen($No_Urut);
for ($i=1;$i<=$nilai;$i++){
$Nol= $Nol."0";
}

$Kd_Trans ="TC".$format.$Nol.$No_Urut;
return $Kd_Trans;
}

//fungsi untuk approval edit
function trx_aset_approval_edit(){
$format = date("Ymd");
$sql=mysql_query("SELECT idTransaksi FROM transaksi_approval_edit WHERE substr(idTransaksi,1,2)='AE' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);

if($d>0){
$r=mysql_fetch_array($sql);
$d=$r['idTransaksi'];
$str=substr($d,11,5);
$No_Urut = (int)$str;
}else{
$No_Urut = 0;
}

$No_Urut = $No_Urut + 1;
$Nol="";
$nilai=5-strlen($No_Urut);
for ($i=1;$i<=$nilai;$i++){
$Nol= $Nol."0";
}

$Kd_Trans ="AE".$format.$Nol.$No_Urut;
return $Kd_Trans;
}



//fungsi untuk transaksi ganti_label
function trx_aset_ganti_label(){
$format = date("Ymd");
$sql=mysql_query("SELECT idTransaksi FROM transaksi_ganti_label WHERE substr(idTransaksi,1,2)='GL' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);

if($d>0){
$r=mysql_fetch_array($sql);
$d=$r['idTransaksi'];
$str=substr($d,11,5);
$No_Urut = (int)$str;
}else{
$No_Urut = 0;
}

$No_Urut = $No_Urut + 1;
$Nol="";
$nilai=5-strlen($No_Urut);
for ($i=1;$i<=$nilai;$i++){
$Nol= $Nol."0";
}

$Kd_Trans ="GL".$format.$Nol.$No_Urut;
return $Kd_Trans;
}


//fungsi untuk exit clrearence
function trx_exit_clearence(){
$format = date("Ymd");
$sql=mysql_query("SELECT idTransaksi FROM exit_clearence WHERE substr(idTransaksi,1,2)='EX' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);

if($d>0){
$r=mysql_fetch_array($sql);
$d=$r['idTransaksi'];
$str=substr($d,11,5);
$No_Urut = (int)$str;
}else{
$No_Urut = 0;
}

$No_Urut = $No_Urut + 1;
$Nol="";
$nilai=5-strlen($No_Urut);
for ($i=1;$i<=$nilai;$i++){
$Nol= $Nol."0";
}

$Kd_Trans ="EX".$format.$Nol.$No_Urut;
return $Kd_Trans;
}

//fungsi untuk image
function trx_upload_image(){
$format = date("Ymd");
$sql=mysql_query("SELECT idTransaksi FROM image WHERE substr(idTransaksi,1,2)='TI' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);

if($d>0){
$r=mysql_fetch_array($sql);
$d=$r['idTransaksi'];
$str=substr($d,11,5);
$No_Urut = (int)$str;
}else{
$No_Urut = 0;
}

$No_Urut = $No_Urut + 1;
$Nol="";
$nilai=5-strlen($No_Urut);
for ($i=1;$i<=$nilai;$i++){
$Nol= $Nol."0";
}

$Kd_Trans ="TI".$format.$Nol.$No_Urut;
return $Kd_Trans;
}
//fungsi untuk image
function trx_edit_image(){
$format = date("Ymd");
$sql=mysql_query("SELECT idTransaksi FROM image WHERE substr(idTransaksi,1,2)='TE' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);

if($d>0){
$r=mysql_fetch_array($sql);
$d=$r['idTransaksi'];
$str=substr($d,11,5);
$No_Urut = (int)$str;
}else{
$No_Urut = 0;
}

$No_Urut = $No_Urut + 1;
$Nol="";
$nilai=5-strlen($No_Urut);
for ($i=1;$i<=$nilai;$i++){
$Nol= $Nol."0";
}

$Kd_Trans ="TE".$format.$Nol.$No_Urut;
return $Kd_Trans;
}
//fungsi untuk transaksi_image
function trx_validasi_image(){
$format = date("Ymd");
$sql=mysql_query("SELECT idTransaksi FROM transaksi_validasi_image WHERE substr(idTransaksi,1,2)='TV' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);

if($d>0){
$r=mysql_fetch_array($sql);
$d=$r['idTransaksi'];
$str=substr($d,11,5);
$No_Urut = (int)$str;
}else{
$No_Urut = 0;
}

$No_Urut = $No_Urut + 1;
$Nol="";
$nilai=5-strlen($No_Urut);
for ($i=1;$i<=$nilai;$i++){
$Nol= $Nol."0";
}

$Kd_Trans ="TV".$format.$Nol.$No_Urut;
return $Kd_Trans;
}

//fungsi untuk pegawai resign
function trx_pegawai_resign(){
$format = date("Ymd");
$sql=mysql_query("SELECT idTransaksi FROM pegawai_resign WHERE substr(idTransaksi,1,2)='RI' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);

if($d>0){
$r=mysql_fetch_array($sql);
$d=$r['idTransaksi'];
$str=substr($d,11,5);
$No_Urut = (int)$str;
}else{
$No_Urut = 0;
}

$No_Urut = $No_Urut + 1;
$Nol="";
$nilai=5-strlen($No_Urut);
for ($i=1;$i<=$nilai;$i++){
$Nol= $Nol."0";
}

$Kd_Trans ="RI".$format.$Nol.$No_Urut;
return $Kd_Trans;
}
//fungsi pegawai resign edit
function trx_pegawai_resign_edit(){
$format = date("Ymd");
$sql=mysql_query("SELECT idTransaksi FROM pegawai_resign WHERE substr(idTransaksi,1,2)='RE' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);

if($d>0){
$r=mysql_fetch_array($sql);
$d=$r['idTransaksi'];
$str=substr($d,11,5);
$No_Urut = (int)$str;
}else{
$No_Urut = 0;
}

$No_Urut = $No_Urut + 1;
$Nol="";
$nilai=5-strlen($No_Urut);
for ($i=1;$i<=$nilai;$i++){
$Nol= $Nol."0";
}

$Kd_Trans ="RE".$format.$Nol.$No_Urut;
return $Kd_Trans;
}

//transaksi insert warna
function trx_warna_insert(){
$format = date("Ymd");
$sql=mysql_query("SELECT idTransaksi FROM a_warna WHERE substr(idTransaksi,1,2)='WI' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);

if($d>0){
$r=mysql_fetch_array($sql);
$d=$r['idTransaksi'];
$str=substr($d,11,5);
$No_Urut = (int)$str;
}else{
$No_Urut = 0;
}

$No_Urut = $No_Urut + 1;
$Nol="";
$nilai=5-strlen($No_Urut);
for ($i=1;$i<=$nilai;$i++){
$Nol= $Nol."0";
}

$Kd_Trans ="WI".$format.$Nol.$No_Urut;
return $Kd_Trans;
}

//transaksi edit warna
function trx_warna_edit(){
$format = date("Ymd");
$sql=mysql_query("SELECT idTransaksi FROM a_warna WHERE substr(idTransaksi,1,2)='WE' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);

if($d>0){
$r=mysql_fetch_array($sql);
$d=$r['idTransaksi'];
$str=substr($d,11,5);
$No_Urut = (int)$str;
}else{
$No_Urut = 0;
}

$No_Urut = $No_Urut + 1;
$Nol="";
$nilai=5-strlen($No_Urut);
for ($i=1;$i<=$nilai;$i++){
$Nol= $Nol."0";
}

$Kd_Trans ="WE".$format.$Nol.$No_Urut;
return $Kd_Trans;
}


function trx_email(){
	$format = date("Ymd");
	$sql=mysql_query("SELECT idTransaksiEmail FROM transaksi_email WHERE substr(idTransaksiEmail,1,2)='EM' AND substr(idTransaksiEmail,3,8) like '%".$format."%' ORDER BY idTransaksiEmail DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);

	if($d>0){
	$r=mysql_fetch_array($sql);
	$d=$r['idTransaksiEmail'];
	$str=substr($d,11,5);
	$No_Urut = (int)$str;
	}else{
	$No_Urut = 0;
	}

	$No_Urut = $No_Urut + 1;
	$Nol="";
	$nilai=5-strlen($No_Urut);
	for ($i=1;$i<=$nilai;$i++){
	$Nol= $Nol."0";
	}

	$Kd_Trans ="EM".$format.$Nol.$No_Urut;
	return $Kd_Trans;
	}


//transaksi update nilai aset
function trx_nilai(){
	$format = date("Ymd");
	$sql=mysql_query("SELECT idTransaksi FROM transaksi_nilai_aset WHERE substr(idTransaksi,1,2)='NA' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);

	if($d>0){
	$r=mysql_fetch_array($sql);
	$d=$r['idTransaksi'];
	$str=substr($d,11,5);
	$No_Urut = (int)$str;
	}else{
	$No_Urut = 0;
	}

	$No_Urut = $No_Urut + 1;
	$Nol="";
	$nilai=5-strlen($No_Urut);
	for ($i=1;$i<=$nilai;$i++){
	$Nol= $Nol."0";
	}

	$Kd_Trans ="NA".$format.$Nol.$No_Urut;
	return $Kd_Trans;
	}







//fungsi untuk merubah tanggal 
function ubahTanggal($tanggal_dokumen)
			{
				$pisah = explode('/',$tanggal_dokumen);
				$array = array($pisah[2],$pisah[0],$pisah[1]);
				$satukan = implode('-',$array);
				return $satukan;
			}

//function untuk trx update ruangan massal
			function trx_ruangan(){
				$format = date("Ymd");
				$sql=mysql_query("SELECT idTransaksi FROM transaksi_update_ruangan WHERE substr(idTransaksi,1,2)='RU' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1") or die (mysql_error());$d=mysql_num_rows($sql);
				echo $x;

				if($d>0){
				$r=mysql_fetch_array($sql);
				$d=$r['idTransaksi'];
				$str=substr($d,11,5);
				$No_Urut = (int)$str;
				}else{
				$No_Urut = 0;
				}

				$No_Urut = $No_Urut + 1;
				$Nol="";
				$nilai=5-strlen($No_Urut);
				for ($i=1;$i<=$nilai;$i++){
				$Nol= $Nol."0";
				}

				$Kd_Trans ="RU".$format.$Nol.$No_Urut;
				return $Kd_Trans;
				}

                //function untuk trx update lantai massal
			function trx_lantai(){
				$format = date("Ymd");
				$sql=mysql_query("SELECT idTransaksi FROM transaksi_update_lantai WHERE substr(idTransaksi,1,2)='LA' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);

				if($d>0){
				$r=mysql_fetch_array($sql);
				$d=$r['idTransaksi'];
				$str=substr($d,11,5);
				$No_Urut = (int)$str;
				}else{
				$No_Urut = 0;
				}

				$No_Urut = $No_Urut + 1;
				$Nol="";
				$nilai=5-strlen($No_Urut);
				for ($i=1;$i<=$nilai;$i++){
				$Nol= $Nol."0";
				}

				$Kd_Trans ="LA".$format.$Nol.$No_Urut;
				return $Kd_Trans;
				}

				function trx_insert_parameter_karyawan(){
							$format = date("Ymd");
							$sql=mysql_query("SELECT idTransaksi FROM transaksi_parameter_karyawan WHERE substr(idTransaksi,1,2)='PK' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);
							
							if($d>0){
							$r=mysql_fetch_array($sql);
							$d=$r['idTransaksi'];
							$str=substr($d,11,5);
							$No_Urut = (int)$str;
							}else{
							$No_Urut = 0;
							}
							
							$No_Urut = $No_Urut + 1;
							$Nol="";
							$nilai=5-strlen($No_Urut);
							for ($i=1;$i<=$nilai;$i++){
							$Nol= $Nol."0";
							}
							
							$Kd_Trans ="PK".$format.$Nol.$No_Urut;
							return $Kd_Trans;
							}

							function trx_edit_parameter_karyawan(){
								$format = date("Ymd");
								$sql=mysql_query("SELECT idTransaksi FROM transaksi_parameter_karyawan WHERE substr(idTransaksi,1,2)='PE' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);
								
								if($d>0){
								$r=mysql_fetch_array($sql);
								$d=$r['idTransaksi'];
								$str=substr($d,11,5);
								$No_Urut = (int)$str;
								}else{
								$No_Urut = 0;
								}
								
								$No_Urut = $No_Urut + 1;
								$Nol="";
								$nilai=5-strlen($No_Urut);
								for ($i=1;$i<=$nilai;$i++){
								$Nol= $Nol."0";
								}
								
								$Kd_Trans ="PE".$format.$Nol.$No_Urut;
								return $Kd_Trans;
								}

							function trx_status_parameter_karyawan(){
								$format = date("Ymd");
								$sql=mysql_query("SELECT idTransaksi FROM transaksi_parameter_karyawan WHERE substr(idTransaksi,1,2)='PS' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);
								
								if($d>0){
								$r=mysql_fetch_array($sql);
								$d=$r['idTransaksi'];
								$str=substr($d,11,5);
								$No_Urut = (int)$str;
								}else{
								$No_Urut = 0;
								}
								
								$No_Urut = $No_Urut + 1;
								$Nol="";
								$nilai=5-strlen($No_Urut);
								for ($i=1;$i<=$nilai;$i++){
								$Nol= $Nol."0";
								}
								
								$Kd_Trans ="PS".$format.$Nol.$No_Urut;
								return $Kd_Trans;
								}

								//kode transaksi update_noncpe
								function trx_feedback_noncpe(){
									$format = date("Ymd");
									$sql=mysql_query("SELECT so_idTransaksi FROM transaksi_feedback_so WHERE substr(so_idTransaksi,1,2)='FB' AND substr(so_idTransaksi,3,8) like '%".$format."%' ORDER BY so_idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);
									
									if($d>0){
									$r=mysql_fetch_array($sql);
									$d=$r['so_idTransaksi'];
									$str=substr($d,11,5);
									$No_Urut = (int)$str;
									}else{
									$No_Urut = 0;
									}
									
									$No_Urut = $No_Urut + 1;
									$Nol="";
									$nilai=5-strlen($No_Urut);
									for ($i=1;$i<=$nilai;$i++){
									$Nol= $Nol."0";
									}
									
									$Kd_Trans ="FB".$format.$Nol.$No_Urut;
									return $Kd_Trans;
									}

								//function untuk trx update SN 

							function trx_sn(){
								$format = date("Ymd");
								$sql=mysql_query("SELECT idTransaksi FROM transaksi_update_sn WHERE substr(idTransaksi,1,2)='SN' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);
								
								if($d>0){
								$r=mysql_fetch_array($sql);
								$d=$r['idTransaksi'];
								$str=substr($d,11,5);
								$No_Urut = (int)$str;
								}else{
								$No_Urut = 0;
								}
								
								$No_Urut = $No_Urut + 1;
								$Nol="";
								$nilai=5-strlen($No_Urut);
								for ($i=1;$i<=$nilai;$i++){
								$Nol= $Nol."0";
								}
								
								$Kd_Trans ="SN".$format.$Nol.$No_Urut;
								return $Kd_Trans;
								}

								//function untuk trx update type 

							function trx_type(){
								$format = date("Ymd");
								$sql=mysql_query("SELECT idTransaksi FROM transaksi_update_type WHERE substr(idTransaksi,1,2)='TY' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);
								
								if($d>0){
								$r=mysql_fetch_array($sql);
								$d=$r['idTransaksi'];
								$str=substr($d,11,5);
								$No_Urut = (int)$str;
								}else{
								$No_Urut = 0;
								}
								
								$No_Urut = $No_Urut + 1;
								$Nol="";
								$nilai=5-strlen($No_Urut);
								for ($i=1;$i<=$nilai;$i++){
								$Nol= $Nol."0";
								}
								
								$Kd_Trans ="TY".$format.$Nol.$No_Urut;
								return $Kd_Trans;
								}
							
							function trx_ttd(){
								$format = date("Ymd");
								$sql=mysql_query("SELECT idTransaksi FROM transaksi_ttd WHERE substr(idTransaksi,1,2)='TT' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);
								
								if($d>0){
								$r=mysql_fetch_array($sql);
								$d=$r['idTransaksi'];
								$str=substr($d,11,5);
								$No_Urut = (int)$str;
								}else{
								$No_Urut = 0;
								}
								
								$No_Urut = $No_Urut + 1;
								$Nol="";
								$nilai=5-strlen($No_Urut);
								for ($i=1;$i<=$nilai;$i++){
								$Nol= $Nol."0";
								}
								
								$Kd_Trans ="TT".$format.$Nol.$No_Urut;
								return $Kd_Trans;
								}
									
								function trx_update_lokasi(){
								$format = date("Ymd");
								$sql=mysql_query("SELECT idTransaksi FROM transaksi_update_lokasi WHERE substr(idTransaksi,1,2)='LO' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);
								
								if($d>0){
								$r=mysql_fetch_array($sql);
								$d=$r['idTransaksi'];
								$str=substr($d,11,5);
								$No_Urut = (int)$str;
								}else{
								$No_Urut = 0;
								}
								
								$No_Urut = $No_Urut + 1;
								$Nol="";
								$nilai=5-strlen($No_Urut);
								for ($i=1;$i<=$nilai;$i++){
								$Nol= $Nol."0";
								}
								
								$Kd_Trans ="LO".$format.$Nol.$No_Urut;
								return $Kd_Trans;
								}

								//transaksi insert lantai
function trx_lantai_insert(){
	$format = date("Ymd");
	$sql=mysql_query("SELECT idTransaksi FROM a_lantai WHERE substr(idTransaksi,1,2)='LI' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);
	
	if($d>0){
	$r=mysql_fetch_array($sql);
	$d=$r['idTransaksi'];
	$str=substr($d,11,5);
	$No_Urut = (int)$str;
	}else{
	$No_Urut = 0;
	}
	
	$No_Urut = $No_Urut + 1;
	$Nol="";
	$nilai=5-strlen($No_Urut);
	for ($i=1;$i<=$nilai;$i++){
	$Nol= $Nol."0";
	}
	
	$Kd_Trans ="LI".$format.$Nol.$No_Urut;
	return $Kd_Trans;
	}
	
	//transaksi edit lantai
	function trx_lantai_edit(){
	$format = date("Ymd");
	$sql=mysql_query("SELECT idTransaksi FROM a_lantai WHERE substr(idTransaksi,1,2)='LE' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);
	
	if($d>0){
	$r=mysql_fetch_array($sql);
	$d=$r['idTransaksi'];
	$str=substr($d,11,5);
	$No_Urut = (int)$str;
	}else{
	$No_Urut = 0;
	}
	
	$No_Urut = $No_Urut + 1;
	$Nol="";
	$nilai=5-strlen($No_Urut);
	for ($i=1;$i<=$nilai;$i++){
	$Nol= $Nol."0";
	}
	
	$Kd_Trans ="LE".$format.$Nol.$No_Urut;
	return $Kd_Trans;
	}

	//transaksi insert rack
function trx_rack_insert(){
		$format = date("Ymd");
		$sql=mysql_query("SELECT idTransaksi FROM a_rack WHERE substr(idTransaksi,1,2)='RC' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);
		
		if($d>0){
		$r=mysql_fetch_array($sql);
		$d=$r['idTransaksi'];
		$str=substr($d,11,5);
		$No_Urut = (int)$str;
		}else{
		$No_Urut = 0;
		}
		
		$No_Urut = $No_Urut + 1;
		$Nol="";
		$nilai=5-strlen($No_Urut);
		for ($i=1;$i<=$nilai;$i++){
		$Nol= $Nol."0";
		}
		
		$Kd_Trans ="RC".$format.$Nol.$No_Urut;
		return $Kd_Trans;
		}
	
//transaksi edit rack
function trx_rack_edit(){
		$format = date("Ymd");
		$sql=mysql_query("SELECT idTransaksi FROM a_rack WHERE substr(idTransaksi,1,2)='RX' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);
		
		if($d>0){
		$r=mysql_fetch_array($sql);
		$d=$r['idTransaksi'];
		$str=substr($d,11,5);
		$No_Urut = (int)$str;
		}else{
		$No_Urut = 0;
		}
		
		$No_Urut = $No_Urut + 1;
		$Nol="";
		$nilai=5-strlen($No_Urut);
		for ($i=1;$i<=$nilai;$i++){
		$Nol= $Nol."0";
		}
		
		$Kd_Trans ="RX".$format.$Nol.$No_Urut;
		return $Kd_Trans;
		}

//transaksi insert ruangan
function trx_ruangan_insert(){
		$format = date("Ymd");
		$sql=mysql_query("SELECT idTransaksi FROM a_ruangan WHERE substr(idTransaksi,1,2)='RY' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);
		
		if($d>0){
		$r=mysql_fetch_array($sql);
		$d=$r['idTransaksi'];
		$str=substr($d,11,5);
		$No_Urut = (int)$str;
		}else{
		$No_Urut = 0;
		}
		
		$No_Urut = $No_Urut + 1;
		$Nol="";
		$nilai=5-strlen($No_Urut);
		for ($i=1;$i<=$nilai;$i++){
		$Nol= $Nol."0";
		}
		
		$Kd_Trans ="RY".$format.$Nol.$No_Urut;
		return $Kd_Trans;
		}
		
//transaksi edit ruangan
function trx_ruangan_edit(){
		$format = date("Ymd");
		$sql=mysql_query("SELECT idTransaksi FROM a_ruangan WHERE substr(idTransaksi,1,2)='RZ' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);
		
		if($d>0){
		$r=mysql_fetch_array($sql);
		$d=$r['idTransaksi'];
		$str=substr($d,11,5);
		$No_Urut = (int)$str;
		}else{
		$No_Urut = 0;
		}
		
		$No_Urut = $No_Urut + 1;
		$Nol="";
		$nilai=5-strlen($No_Urut);
		for ($i=1;$i<=$nilai;$i++){
		$Nol= $Nol."0";
		}
		
		$Kd_Trans ="RZ".$format.$Nol.$No_Urut;
		return $Kd_Trans;
		}
		
//UPDATE RACK
function trx_rack(){
	$format = date("Ymd");
	$sql=mysql_query("SELECT idTransaksi FROM transaksi_update_rack WHERE substr(idTransaksi,1,2)='RK' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1") or die (mysql_error());$d=mysql_num_rows($sql);
	echo $x;
	
	if($d>0){
	$r=mysql_fetch_array($sql);
	$d=$r['idTransaksi'];
	$str=substr($d,11,5);
	$No_Urut = (int)$str;
	}else{
	$No_Urut = 0;
	}
	
	$No_Urut = $No_Urut + 1;
	$Nol="";
	$nilai=5-strlen($No_Urut);
	for ($i=1;$i<=$nilai;$i++){
	$Nol= $Nol."0";
	}
	
	$Kd_Trans ="RK".$format.$Nol.$No_Urut;
	return $Kd_Trans;
	}


	
	

/*
//FUNCTION UNTUK ENCRYPT LINK
			function encrypt( $s ) {
				$cryptKey  = 'd8578edf8458ce06fbc5bb76a58c5ca4';
				$qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $s, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
				return( $qEncoded );
			}
//FUNCTION UNTUK DECRYPT LINK
			
			function decrypt($s) {
				$cryptKey  = 'd8578edf8458ce06fbc5bb76a58c5ca4';
				$qDecoded  = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $s ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
				return( $qDecoded );
			}
*/
			function encrypt($str) {
				$kunci = '979a218e0632df2935317f98d47956c7';
				for ($i = 0; $i < strlen($str); $i++) {
					$karakter = substr($str, $i, 1);
					$kuncikarakter = substr($kunci, ($i % strlen($kunci))-1, 1);
					$karakter = chr(ord($karakter)+ord($kuncikarakter));
					$hasil .= $karakter;
				}
				return urlencode(base64_encode($hasil));
			}
			function decrypt($str) {
				$str = base64_decode(urldecode($str));
				$hasil = '';
				$kunci = '979a218e0632df2935317f98d47956c7';
				for ($i = 0; $i < strlen($str); $i++) {
					$karakter = substr($str, $i, 1);
					$kuncikarakter = substr($kunci, ($i % strlen($kunci))-1, 1);
					$karakter = chr(ord($karakter)-ord($kuncikarakter));
					$hasil .= $karakter;
				}
				return $hasil;
			}
				function trx_fixed_aset(){
				$format = date("Ymd");
				$sql=mysql_query("SELECT idTransaksi FROM t_stock_opname_fixed WHERE substr(idTransaksi,1,2)='FA' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);
				
				if($d>0){
				$r=mysql_fetch_array($sql);
				$d=$r['idTransaksi'];
				$str=substr($d,11,5);
				$No_Urut = (int)$str;
				}else{
				$No_Urut = 0;
				}
				
				$No_Urut = $No_Urut + 1;
				$Nol="";
				$nilai=5-strlen($No_Urut);
				for ($i=1;$i<=$nilai;$i++){
				$Nol= $Nol."0";
				}
				
				$Kd_Trans ="FA".$format.$Nol.$No_Urut;
				return $Kd_Trans;
				}

				function trx_non_fixed_aset(){
					$format = date("Ymd");
					$sql=mysql_query("SELECT idTransaksi FROM t_stock_opname WHERE substr(idTransaksi,1,2)='NF' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);
					
					if($d>0){
					$r=mysql_fetch_array($sql);
					$d=$r['idTransaksi'];
					$str=substr($d,11,5);
					$No_Urut = (int)$str;
					}else{
					$No_Urut = 0;
					}
					
					$No_Urut = $No_Urut + 1;
					$Nol="";
					$nilai=5-strlen($No_Urut);
					for ($i=1;$i<=$nilai;$i++){
					$Nol= $Nol."0";
					}
					
					$Kd_Trans ="NF".$format.$Nol.$No_Urut;
					return $Kd_Trans;
					}

				
					function region_insert(){
					$format = date("Ymd");
					$sql=mysql_query("SELECT idTransaksi FROM t_region WHERE substr(idTransaksi,1,2)='DI' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);
					
					if($d>0){
					$r=mysql_fetch_array($sql);
					$d=$r['idTransaksi'];
					$str=substr($d,11,5);
					$No_Urut = (int)$str;
					}else{
					$No_Urut = 0;
					}
					
					$No_Urut = $No_Urut + 1;
					$Nol="";
					$nilai=5-strlen($No_Urut);
					for ($i=1;$i<=$nilai;$i++){
					$Nol= $Nol."0";
					}
					
					$Kd_Trans ="DI".$format.$Nol.$No_Urut;
					return $Kd_Trans;
					}

					function region_edit(){
					$format = date("Ymd");
					$sql=mysql_query("SELECT idTransaksi FROM t_region WHERE substr(idTransaksi,1,2)='DE' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);
					
					if($d>0){
					$r=mysql_fetch_array($sql);
					$d=$r['idTransaksi'];
					$str=substr($d,11,5);
					$No_Urut = (int)$str;
					}else{
					$No_Urut = 0;
					}
					
					$No_Urut = $No_Urut + 1;
					$Nol="";
					$nilai=5-strlen($No_Urut);
					for ($i=1;$i<=$nilai;$i++){
					$Nol= $Nol."0";
					}
					
					$Kd_Trans ="DE".$format.$Nol.$No_Urut;
					return $Kd_Trans;
					}


					function area_insert(){
					$format = date("Ymd");
					$sql=mysql_query("SELECT idTransaksi FROM t_area WHERE substr(idTransaksi,1,2)='AI' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);
					
					if($d>0){
					$r=mysql_fetch_array($sql);
					$d=$r['idTransaksi'];
					$str=substr($d,11,5);
					$No_Urut = (int)$str;
					}else{
					$No_Urut = 0;
					}
					
					$No_Urut = $No_Urut + 1;
					$Nol="";
					$nilai=5-strlen($No_Urut);
					for ($i=1;$i<=$nilai;$i++){
					$Nol= $Nol."0";
					}
					
					$Kd_Trans ="AI".$format.$Nol.$No_Urut;
					return $Kd_Trans;
					}

					function area_edit(){
					$format = date("Ymd");
					$sql=mysql_query("SELECT idTransaksi FROM t_area WHERE substr(idTransaksi,1,2)='AR' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);
					
					if($d>0){
					$r=mysql_fetch_array($sql);
					$d=$r['idTransaksi'];
					$str=substr($d,11,5);
					$No_Urut = (int)$str;
					}else{
					$No_Urut = 0;
					}
					
					$No_Urut = $No_Urut + 1;
					$Nol="";
					$nilai=5-strlen($No_Urut);
					for ($i=1;$i<=$nilai;$i++){
					$Nol= $Nol."0";
					}
					
					$Kd_Trans ="AR".$format.$Nol.$No_Urut;
					return $Kd_Trans;
					}


					function lokasi_insert(){
					$format = date("Ymd");
					$sql=mysql_query("SELECT idTransaksi FROM t_lokasi WHERE substr(idTransaksi,1,2)='KI' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);
					
					if($d>0){
					$r=mysql_fetch_array($sql);
					$d=$r['idTransaksi'];
					$str=substr($d,11,5);
					$No_Urut = (int)$str;
					}else{
					$No_Urut = 0;
					}
					
					$No_Urut = $No_Urut + 1;
					$Nol="";
					$nilai=5-strlen($No_Urut);
					for ($i=1;$i<=$nilai;$i++){
					$Nol= $Nol."0";
					}
					
					$Kd_Trans ="KI".$format.$Nol.$No_Urut;
					return $Kd_Trans;
					}

					function lokasi_edit(){
					$format = date("Ymd");
					$sql=mysql_query("SELECT idTransaksi FROM t_lokasi WHERE substr(idTransaksi,1,2)='KE' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);
					
					if($d>0){
					$r=mysql_fetch_array($sql);
					$d=$r['idTransaksi'];
					$str=substr($d,11,5);
					$No_Urut = (int)$str;
					}else{
					$No_Urut = 0;
					}
					
					$No_Urut = $No_Urut + 1;
					$Nol="";
					$nilai=5-strlen($No_Urut);
					for ($i=1;$i<=$nilai;$i++){
					$Nol= $Nol."0";
					}
					
					$Kd_Trans ="KE".$format.$Nol.$No_Urut;
					return $Kd_Trans;
                    }
                    

                    //LELANG
                    function lelang_insert(){
                        $format = date("Ymd");
                        $sql=mysql_query("SELECT idTransaksi FROM lelang_list WHERE substr(idTransaksi,1,2)='LB' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);
                        
                        if($d>0){
                        $r=mysql_fetch_array($sql);
                        $d=$r['idTransaksi'];
                        $str=substr($d,11,5);
                        $No_Urut = (int)$str;
                        }else{
                        $No_Urut = 0;
                        }
                        
                        $No_Urut = $No_Urut + 1;
                        $Nol="";
                        $nilai=5-strlen($No_Urut);
                        for ($i=1;$i<=$nilai;$i++){
                        $Nol= $Nol."0";
                        }
                        
                        $Kd_Trans ="LB".$format.$Nol.$No_Urut;
                        return $Kd_Trans;
                        }

                        function lelang_edit(){
                            $format = date("Ymd");
                            $sql=mysql_query("SELECT idTransaksi FROM lelang_list WHERE substr(idTransaksi,1,2)='LC' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);
                            
                            if($d>0){
                            $r=mysql_fetch_array($sql);
                            $d=$r['idTransaksi'];
                            $str=substr($d,11,5);
                            $No_Urut = (int)$str;
                            }else{
                            $No_Urut = 0;
                            }
                            
                            $No_Urut = $No_Urut + 1;
                            $Nol="";
                            $nilai=5-strlen($No_Urut);
                            for ($i=1;$i<=$nilai;$i++){
                            $Nol= $Nol."0";
                            }
                            
                            $Kd_Trans ="LC".$format.$Nol.$No_Urut;
                            return $Kd_Trans;
                            }

                            function lelang_bid(){
                                $format = date("Ymd");
                                $sql=mysql_query("SELECT idTransaksi FROM lelang_proses WHERE substr(idTransaksi,1,2)='LD' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);
								//echo $sql;
                                
                                if($d>0){
                                $r=mysql_fetch_array($sql);
                                $d=$r['idTransaksi'];
                                $str=substr($d,11,5);
                                $No_Urut = (int)$str;
                                }else{
                                $No_Urut = 0;
                                }
                                
                                $No_Urut = $No_Urut + 1;
                                $Nol="";
                                $nilai=5-strlen($No_Urut);
                                for ($i=1;$i<=$nilai;$i++){
                                $Nol= $Nol."0";
                                }
                                
                                $Kd_Trans ="LD".$format.$Nol.$No_Urut;
                                return $Kd_Trans;
                                }

					 function lelang_image_insert(){
                                $format = date("Ymd");
                                $sql=mysql_query("SELECT idTransaksi FROM lelang_image WHERE substr(idTransaksi,1,2)='II' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);
                                
                                if($d>0){
                                $r=mysql_fetch_array($sql);
                                $d=$r['idTransaksi'];
                                $str=substr($d,11,5);
                                $No_Urut = (int)$str;
                                }else{
                                $No_Urut = 0;
                                }
                                
                                $No_Urut = $No_Urut + 1;
                                $Nol="";
                                $nilai=5-strlen($No_Urut);
                                for ($i=1;$i<=$nilai;$i++){
                                $Nol= $Nol."0";
                                }
                                
                                $Kd_Trans ="II".$format.$Nol.$No_Urut;
                                return $Kd_Trans;
                                }

						function lelang_image_edit(){
                                $format = date("Ymd");
                                $sql=mysql_query("SELECT idTransaksi FROM lelang_image WHERE substr(idTransaksi,1,2)='IE' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);
                                
                                if($d>0){
                                $r=mysql_fetch_array($sql);
                                $d=$r['idTransaksi'];
                                $str=substr($d,11,5);
                                $No_Urut = (int)$str;
                                }else{
                                $No_Urut = 0;
                                }
                                
                                $No_Urut = $No_Urut + 1;
                                $Nol="";
                                $nilai=5-strlen($No_Urut);
                                for ($i=1;$i<=$nilai;$i++){
                                $Nol= $Nol."0";
                                }
                                
                                $Kd_Trans ="IE".$format.$Nol.$No_Urut;
                                return $Kd_Trans;
                                }

						function lelang_winner(){
                                $format = date("Ymd");
                                $sql=mysql_query("SELECT idTransaksi FROM lelang_pemenang WHERE substr(idTransaksi,1,2)='WN' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);
                                
                                if($d>0){
                                $r=mysql_fetch_array($sql);
                                $d=$r['idTransaksi'];
                                $str=substr($d,11,5);
                                $No_Urut = (int)$str;
                                }else{
                                $No_Urut = 0;
                                }
                                
                                $No_Urut = $No_Urut + 1;
                                $Nol="";
                                $nilai=5-strlen($No_Urut);
                                for ($i=1;$i<=$nilai;$i++){
                                $Nol= $Nol."0";
                                }
                                
                                $Kd_Trans ="WN".$format.$Nol.$No_Urut;
                                return $Kd_Trans;
                                }
                            
                            
                                function kode_lelang(){
                                    $query = "SELECT max(kode_lelang) as maxKode FROM lelang_list";
                                    $hasil = mysql_query($query);
                                    $data  = mysql_fetch_array($hasil);
                                    $id_lelang = $data['maxKode'];
                                    
                                    // mengambil angka atau bilangan dalam kode anggota terbesar,
                                    // dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
                                    // misal 'BRG001', akan diambil '001'
                                    // setelah substring bilangan diambil lantas dicasting menjadi integer
                                    $noUrut = (int) substr($id_lelang, 6, 6);
                                    
                                    // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
                                    $noUrut++;
                                    
                                    // membentuk kode anggota baru
                                    // perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
                                    // misal sprintf("%03s", 12); maka akan dihasilkan '012'
                                    // atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
                                    $char = "LELANG";
                                    $new_id_lelang = $char . sprintf("%06s", $noUrut);
                                    return $new_id_lelang;
                                    }




function user_insert(){
    $format = date("Ymd");
    $sql=mysql_query("SELECT idTransaksi FROM s_user WHERE substr(idTransaksi,1,2)='IU' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);

    if($d>0){
        $r=mysql_fetch_array($sql);
        $d=$r['idTransaksi'];
        $str=substr($d,11,5);
        $No_Urut = (int)$str;
    }else{
        $No_Urut = 0;
    }

    $No_Urut = $No_Urut + 1;
    $Nol="";
    $nilai=5-strlen($No_Urut);
    for ($i=1;$i<=$nilai;$i++){
        $Nol= $Nol."0";
    }

    $Kd_Trans ="IU".$format.$Nol.$No_Urut;
    return $Kd_Trans;
}

function user_edit(){
    $format = date("Ymd");
    $sql=mysql_query("SELECT idTransaksi FROM s_user WHERE substr(idTransaksi,1,2)='UE' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);

    if($d>0){
        $r=mysql_fetch_array($sql);
        $d=$r['idTransaksi'];
        $str=substr($d,11,5);
        $No_Urut = (int)$str;
    }else{
        $No_Urut = 0;
    }

    $No_Urut = $No_Urut + 1;
    $Nol="";
    $nilai=5-strlen($No_Urut);
    for ($i=1;$i<=$nilai;$i++){
        $Nol= $Nol."0";
    }

    $Kd_Trans ="UE".$format.$Nol.$No_Urut;
    return $Kd_Trans;
}


function trx_nilai_asset(){
    $format = date("Ymd");
    $sql=mysql_query("SELECT idTransaksi FROM transaksi_update_nilai_asset WHERE substr(idTransaksi,1,2)='NS' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);

    if($d>0){
        $r=mysql_fetch_array($sql);
        $d=$r['idTransaksi'];
        $str=substr($d,11,5);
        $No_Urut = (int)$str;
    }else{
        $No_Urut = 0;
    }

    $No_Urut = $No_Urut + 1;
    $Nol="";
    $nilai=5-strlen($No_Urut);
    for ($i=1;$i<=$nilai;$i++){
        $Nol= $Nol."0";
    }

    $Kd_Trans ="NS".$format.$Nol.$No_Urut;
    return $Kd_Trans;
}


function asset_pending(){
    $format = date("Ymd");
    $sql=mysql_query("SELECT koderev FROM t_asset_pending WHERE substr(koderev,1,2)='AP' AND substr(koderev,3,8) like '%".$format."%' ORDER BY koderev DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);

    if($d>0){
        $r=mysql_fetch_array($sql);
        $d=$r['koderev'];
        $str=substr($d,11,5);
        $No_Urut = (int)$str;
    }else{
        $No_Urut = 0;
    }

    $No_Urut = $No_Urut + 1;
    $Nol="";
    $nilai=5-strlen($No_Urut);
    for ($i=1;$i<=$nilai;$i++){
        $Nol= $Nol."0";
    }

    $Kd_Trans ="AP".$format.$Nol.$No_Urut;
    return $Kd_Trans;
}




function trx_merk_insert(){
    $format = date("Ymd");
    $sql=mysql_query("SELECT idTransaksi FROM transaksi_a_merk WHERE substr(idTransaksi,1,2)='MR' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);

    if($d>0){
        $r=mysql_fetch_array($sql);
        $d=$r['idTransaksi'];
        $str=substr($d,11,5);
        $No_Urut = (int)$str;
    }else{
        $No_Urut = 0;
    }

    $No_Urut = $No_Urut + 1;
    $Nol="";
    $nilai=5-strlen($No_Urut);
    for ($i=1;$i<=$nilai;$i++){
        $Nol= $Nol."0";
    }

    $Kd_Trans ="MR".$format.$Nol.$No_Urut;
    return $Kd_Trans;
}

function trx_merk_edit(){
    $format = date("Ymd");
    $sql=mysql_query("SELECT idTransaksi FROM transaksi_a_merk WHERE substr(idTransaksi,1,2)='ME' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);

    if($d>0){
        $r=mysql_fetch_array($sql);
        $d=$r['idTransaksi'];
        $str=substr($d,11,5);
        $No_Urut = (int)$str;
    }else{
        $No_Urut = 0;
    }

    $No_Urut = $No_Urut + 1;
    $Nol="";
    $nilai=5-strlen($No_Urut);
    for ($i=1;$i<=$nilai;$i++){
        $Nol= $Nol."0";
    }

    $Kd_Trans ="ME".$format.$Nol.$No_Urut;
    return $Kd_Trans;
}


function trx_delete_stok(){
    $format = date("Ymd");
    $sql=mysql_query("SELECT idTransaksi FROM trx_master_delete WHERE substr(idTransaksi,1,2)='DL' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);

    if($d>0){
        $r=mysql_fetch_array($sql);
        $d=$r['idTransaksi'];
        $str=substr($d,11,5);
        $No_Urut = (int)$str;
    }else{
        $No_Urut = 0;
    }

    $No_Urut = $No_Urut + 1;
    $Nol="";
    $nilai=5-strlen($No_Urut);
    for ($i=1;$i<=$nilai;$i++){
        $Nol= $Nol."0";
    }

    $Kd_Trans ="DL".$format.$Nol.$No_Urut;
    return $Kd_Trans;
}



function trx_dokumen(){
    $format = date("Ymd");
    $sql=mysql_query("SELECT idTransaksi FROM t_dokumen WHERE substr(idTransaksi,1,2)='DC' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);

    if($d>0){
        $r=mysql_fetch_array($sql);
        $d=$r['idTransaksi'];
        $str=substr($d,11,5);
        $No_Urut = (int)$str;
    }else{
        $No_Urut = 0;
    }

    $No_Urut = $No_Urut + 1;
    $Nol="";
    $nilai=5-strlen($No_Urut);
    for ($i=1;$i<=$nilai;$i++){
        $Nol= $Nol."0";
    }

    $Kd_Trans ="DC".$format.$Nol.$No_Urut;
    return $Kd_Trans;
}


//fungsi untuk exit clrearence
function trx_project_document(){
	$format = date("Ymd");
	$sql=mysql_query("SELECT idTransaksi FROM t_project WHERE substr(idTransaksi,1,2)='PR' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);
	
	if($d>0){
	$r=mysql_fetch_array($sql);
	$d=$r['idTransaksi'];
	$str=substr($d,11,5);
	$No_Urut = (int)$str;
	}else{
	$No_Urut = 0;
	}
	
	$No_Urut = $No_Urut + 1;
	$Nol="";
	$nilai=5-strlen($No_Urut);
	for ($i=1;$i<=$nilai;$i++){
	$Nol= $Nol."0";
	}
	
	$Kd_Trans ="PR".$format.$Nol.$No_Urut;
	return $Kd_Trans;
	}





//fungsi untuk kategori
function trx_kategori_add(){
	$format = date("Ymd");
	$sql=mysql_query("SELECT idTransaksi FROM master_kategori WHERE substr(idTransaksi,1,2)='KT' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);
	
	if($d>0){
	$r=mysql_fetch_array($sql);
	$d=$r['idTransaksi'];
	$str=substr($d,11,5);
	$No_Urut = (int)$str;
	}else{
	$No_Urut = 0;
	}
	
	$No_Urut = $No_Urut + 1;
	$Nol="";
	$nilai=5-strlen($No_Urut);
	for ($i=1;$i<=$nilai;$i++){
	$Nol= $Nol."0";
	}
	
	$Kd_Trans ="KT".$format.$Nol.$No_Urut;
	return $Kd_Trans;
	}
	
	function trx_kategori_edit(){
		$format = date("Ymd");
		$sql=mysql_query("SELECT idTransaksi FROM master_kategori WHERE substr(idTransaksi,1,2)='KE' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);
		
		if($d>0){
		$r=mysql_fetch_array($sql);
		$d=$r['idTransaksi'];
		$str=substr($d,11,5);
		$No_Urut = (int)$str;
		}else{
		$No_Urut = 0;
		}
		
		$No_Urut = $No_Urut + 1;
		$Nol="";
		$nilai=5-strlen($No_Urut);
		for ($i=1;$i<=$nilai;$i++){
		$Nol= $Nol."0";
		}
		
		$Kd_Trans ="KE".$format.$Nol.$No_Urut;
		return $Kd_Trans;
		}

		//fungsi untuk product
function trx_product_add(){
	$format = date("Ymd");
	$sql=mysql_query("SELECT idTransaksi FROM master_product WHERE substr(idTransaksi,1,2)='PT' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);
	
	if($d>0){
	$r=mysql_fetch_array($sql);
	$d=$r['idTransaksi'];
	$str=substr($d,11,5);
	$No_Urut = (int)$str;
	}else{
	$No_Urut = 0;
	}
	
	$No_Urut = $No_Urut + 1;
	$Nol="";
	$nilai=5-strlen($No_Urut);
	for ($i=1;$i<=$nilai;$i++){
	$Nol= $Nol."0";
	}
	
	$Kd_Trans ="PT".$format.$Nol.$No_Urut;
	return $Kd_Trans;
	}
	
	function trx_product_edit(){
		$format = date("Ymd");
		$sql=mysql_query("SELECT idTransaksi FROM master_product WHERE substr(idTransaksi,1,2)='PE' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);
		
		if($d>0){
		$r=mysql_fetch_array($sql);
		$d=$r['idTransaksi'];
		$str=substr($d,11,5);
		$No_Urut = (int)$str;
		}else{
		$No_Urut = 0;
		}
		
		$No_Urut = $No_Urut + 1;
		$Nol="";
		$nilai=5-strlen($No_Urut);
		for ($i=1;$i<=$nilai;$i++){
		$Nol= $Nol."0";
		}
		
		$Kd_Trans ="PE".$format.$Nol.$No_Urut;
		return $Kd_Trans;
		}
		

//fungsi untuk product
function trx_status_part_add(){
	$format = date("Ymd");
	$sql=mysql_query("SELECT idTransaksi FROM master_status_part WHERE substr(idTransaksi,1,2)='ST' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);
	
	if($d>0){
	$r=mysql_fetch_array($sql);
	$d=$r['idTransaksi'];
	$str=substr($d,11,5);
	$No_Urut = (int)$str;
	}else{
	$No_Urut = 0;
	}
	
	$No_Urut = $No_Urut + 1;
	$Nol="";
	$nilai=5-strlen($No_Urut);
	for ($i=1;$i<=$nilai;$i++){
	$Nol= $Nol."0";
	}
	
	$Kd_Trans ="ST".$format.$Nol.$No_Urut;
	return $Kd_Trans;
	}
	
	function trx_status_part_edit(){
		$format = date("Ymd");
		$sql=mysql_query("SELECT idTransaksi FROM master_status_part WHERE substr(idTransaksi,1,2)='SE' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);
		
		if($d>0){
		$r=mysql_fetch_array($sql);
		$d=$r['idTransaksi'];
		$str=substr($d,11,5);
		$No_Urut = (int)$str;
		}else{
		$No_Urut = 0;
		}
		
		$No_Urut = $No_Urut + 1;
		$Nol="";
		$nilai=5-strlen($No_Urut);
		for ($i=1;$i<=$nilai;$i++){
		$Nol= $Nol."0";
		}
		
		$Kd_Trans ="SE".$format.$Nol.$No_Urut;
		return $Kd_Trans;
		}


		function trx_tambah_stock_barang_temp(){
			$format = date("Ymd");
			$sql=mysql_query("SELECT idTransaksi FROM transaksi_temp WHERE substr(idTransaksi,1,2)='BI' AND substr(idTransaksi,3,8) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);
			
			if($d>0){
			$r=mysql_fetch_array($sql);
			$d=$r['idTransaksi'];
			$str=substr($d,11,5);
			$No_Urut = (int)$str;
			}else{
			$No_Urut = 0;
			}
			
			$No_Urut = $No_Urut + 1;
			$Nol="";
			$nilai=5-strlen($No_Urut);
			for ($i=1;$i<=$nilai;$i++){
			$Nol= $Nol."0";
			}
			
			$Kd_Trans ="BI".$format.$Nol.$No_Urut;
			return $Kd_Trans;
			}

			function trx_penerimaan_qty(){
				$format = date("Ymd");
				$jtransaksi=$_POST['jtransaksi'];
				$sql=mysql_query("SELECT idTransaksi FROM master_header WHERE substr(idTransaksi,1,4)='".$jtransaksi."' AND substr(idTransaksi,5,11) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);
				if($d>0){
				$r=mysql_fetch_array($sql);
				$d=$r['idTransaksi'];
				$str=substr($d,13,5);
				$No_Urut = (int)$str;
				}else{
				$No_Urut = 0;
				}
				
				$No_Urut = $No_Urut + 1;
				$Nol="";
				$nilai=5-strlen($No_Urut);
				for ($i=1;$i<=$nilai;$i++){
				$Nol= $Nol."0";
				}
				
				$Kd_Trans ="".$jtransaksi."".$format.$Nol.$No_Urut;
				return $Kd_Trans;
				}


				function trx_pengeluaran_qty(){
					$format = date("Ymd");
					$jtransaksi=$_POST['jtransaksi'];
					$sql=mysql_query("SELECT idTransaksi FROM master_header WHERE substr(idTransaksi,1,4)='".$jtransaksi."' AND substr(idTransaksi,5,11) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);
					
					if($d>0){
					$r=mysql_fetch_array($sql);
					$d=$r['idTransaksi'];
					$str=substr($d,13,5);
					$No_Urut = (int)$str;
					}else{
					$No_Urut = 0;
					}
					
					$No_Urut = $No_Urut + 1;
					$Nol="";
					$nilai=5-strlen($No_Urut);
					for ($i=1;$i<=$nilai;$i++){
					$Nol= $Nol."0";
					}
					
					$Kd_Trans ="".$jtransaksi."".$format.$Nol.$No_Urut;
					return $Kd_Trans;
					}

					function trx_penerimaan_qty2(){
						$format = date("Ymd");
						$jtransaksi=$_POST['jtransaksi'];
					
						
						$sql=mysql_query("SELECT idTransaksi FROM master_header WHERE substr(idTransaksi,1,4)='".$jtransaksi2."' AND substr(idTransaksi,5,11) like '%".$format."%' ORDER BY idTransaksi DESC LIMIT 1 ") or die (mysql_error());$d=mysql_num_rows($sql);
						if($d>0){
						$r=mysql_fetch_array($sql);
						$d=$r['idTransaksi'];
						$str=substr($d,13,5);
						$No_Urut = (int)$str;
						}else{
						$No_Urut = 0;
						}
						
						$No_Urut = $No_Urut + 1;
						$Nol="";
						$nilai=5-strlen($No_Urut);
						for ($i=1;$i<=$nilai;$i++){
						$Nol= $Nol."0";
						}
						
						$Kd_Trans ="".$jtransaksi2."".$format.$Nol.$No_Urut;
						return $Kd_Trans;
						}
					
?>