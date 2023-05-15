<?php
//report ini dijalankan tiap jam 8.30 tiap hari

require 'class/PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;

// Konfigurasi SMTP
$mail->isSMTP();
//$mail->Host = 'smtp.transvision.co.id';
$mail->Host = 'smtp.transvision.co.id';
$mail->SMTPAuth = true;
$mail->Username = 'made.ambara@transvision.co.id';
$mail->Password = 'dewamade';
$mail->SMTPSecure = 'tls';
$mail->Port = 25; //587 //465

$mail->SMTPOptions = array(
'ssl' => array(
'verify_peer' => false,
'verify_peer_name' => false,
'allow_self_signed' => true
)
);

$mail->setFrom('made.ambara@transvision.co.id', 'PaluGada Guard');
$mail->addReplyTo('made.ambara@transvision.co.id', 'AMS2');


$mail->addAddress($email);

// Menambahkan cc atau bcc
//$mail->addCC('ho_asset@transvision.co.id');
$mail->addBCC('made.ambara@transvision.co.id');
//$mail->addBCC($user_email);


// Subjek email
//$mail->Subject = 'Kirim Email via SMTP Server di PHP menggunakan PHPMailer';


$date=date("d-m-Y"); //date("Y-m-d");
$date_waktu=date("Y-m-d h:i:s");
//$mail->Subject = "Notifikasi Transaksi Tambah Warna ".$nama_warna."";
//$mail->Subject = "Distribusi Aset ".$data3['nama_item']." (".$no_label.")";
$mail->Subject = "Link Aktivasi User ".$date."";



// mengatur tampilan debug, 0 hidden, 1 dimunculkan
$mail->SMTPDebug = 0;


$mailContent .="
 <table class='main center' width='100%' border='0' cellspacing='0' cellpadding='0'>
        <tbody>
        <tr>
            <td class='column'>
                <div class='column-top'>&nbsp;</div>
                <table class='content' border='0' cellspacing='0' cellpadding='0'>
                    <tbody>
                    <tr>
                        <td class='padded'>
                          <h3>Link Aktivasi User  ".$username."</h3>

Dear All,

<br>
Pada hari ini ".$date_waktu.", anda telah mendaftar sebagai user 

Mohon Klik Link ini Untuk Proses Aktivasi
    ";








$mail->Body = $mailContent;
//$mail->AltBody=$mailcontent2;
// Mengatur format email ke HTML
$mail->isHTML(true);
//$mail->AltBody = $mailContent2;

// Menambahakn lampiran
//$mail->addAttachment('lmp/file1.pdf');
//$mail->addAttachment('lmp/file2.png', 'nama-baru-file2.png'); //atur nama baru


//email berhasil


// Kirim email
if(!$mail->send()){
        echo 'Pesan email tidak dapat dikirim.';
        $x_email_gagal=mysql_query($email_gagal);
        echo 'Mailer Error: ' . $mail->ErrorInfo;
}else{

        $x_email_sukses=mysql_query($email_sukses);
        echo 'Pesan email telah terkirim';
}
?>