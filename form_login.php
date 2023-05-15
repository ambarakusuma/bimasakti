<?php 

// Jika user sudah login
// alihkan dari halaman ini 

if($user_sedang_login) {
	alihkan_halaman("index.php?p=home"); 
} 

?>

<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>Asset Management - Transvision</title>
	<meta name="description" content="Integrated Human Resource Information System Transvision - HC Operation Division - PT. Indonusa Telemedia"> 
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	 <!-- Google Chrome, Firefox & Opera -->
    <meta name="theme-color" content="#e9e9e9">
    <!-- Safari iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="#e9e9e9">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#e9e9e9">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css"> 
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">	
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.htm">	
    <link rel="stylesheet" type="text/css" href="css/login-style.css">
    <link rel="shortcut icon" href="https://hris.transvision.co.id/hr_new/img/favicon/favicon.gif" type="image/gif">
    <link rel="icon" href="https://hris.transvision.co.id/hr_new/img/favicon/favicon.gif" type="image/gif">
</head>
<body oncontextmenu="return false;">
	<div class="page-content">
		<div class="login-content">
			<div class="right-content">
				<div class="login-form">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="transvision-logo">
					        	<img src="img/palugada.jpeg" alt="Perlu Apa, Gw Ada">
								
					        	<span>Toko Palu Gada</span>
					      	</div>
							<form name="form1" method="post" action="proses_login.php" >
							    <div class="form-group input-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
								    <span class="border-lable-flt">
								      <input type="text" class="form-control input-lg-custom" id="txtUsername" name="username" oninput="this.value = this.value.toLowerCase()" required="">
								      <label for="txtUsername">Username</label>
								    </span>
								</div>
								<div class="form-group input-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
								    <span class="border-lable-flt">
								      <input type="password" class="form-control input-lg-custom" id="txtPassword" name="password" required="">
								      <label for="txtPassword">Password</label>
								    </span>
								</div>				    
						  	<button type="submit" class="btn btn-lg-custom btn-info col-xs-12 col-sm-12 col-md-12 col-lg-12"  style="font-weight: bold;" name="submit" >LOG IN</button>
							<br><p align='center'>Not A Member ? Please Sign Up <a href='index.php?p=register'>Here</a></p>
						  	
							</form>
						  	<div class="bottom-form">
						  		<table class="table-bottom" border="0">								    
								    <tbody><tr>
								    	<!--
										<td style="width: 50%;padding-left: 0"><a href="https://ldap.transvision.co.id/">Change Password</a></td>
								   		<td style="width: 50%; text-align:right;padding-right: 0"><a href="javascript:void(0);" onclick="return openNewWindow('https://tawk.to/chat/5e96fe0b69e9320caac3cda6/default')">Live Chat Helpdesk</a></td>	
										-->
								    </tr>
								</tbody></table>						  		
						  	</div>						  	
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="login-footer">
					        	<span>Kesusahan adalah Kemudahan Yang di Abaikan</span>
					        	<span>Do Your Magic..</span>
					      	</div>
						</div>
					</div>
				</div>
				<div class="bottom-bar">
					
				</div>
			</div>			
		</div>
	</div>
	<script src="js/jquery-2.js"></script>
	<script src="js/jquery-ui-1.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="css/jquery-ui-v1.htm"></script>
	<script src="js/jquery.js"></script>
	<script>
		$(document).ready(function(){
			site_url = 'https://hris.transvision.co.id/hr_new/index.php';
  			base_url = 'https://hris.transvision.co.id/hr_new/'; 
  			$('.zoom').zoom();		
			// $('#zoom5').zoom({url: 'https://hris.transvision.co.id/hr_new/img/carousel/new-normal-4.jpeg'});
		});
	</script>
	<script type="text/javascript">		
		$('.carousel').carousel({ interval: 4000, pause: "hover" });
		$('.input-lg-custom').on("keyup", function(){
		    $(".edit-messages").html('');
		    $(this).parent().removeClass('has-error').removeClass('has-success');
		    $(this).next('p').remove();
		});
	</script>
</body></html>