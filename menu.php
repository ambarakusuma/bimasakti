<!DOCTYPE html>
<html>
<head>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
	border: 1px solid #e7e7e7;
    background-color: #f3f3f3;
}

li {
    float: left;
}

li a, .dropbtn {
    display: inline-block;
    color: black;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
    background-color: #ddd;
}

li.dropdown {
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}
</style>
</head>
<body>
<?php
/*
echo "profile :";
echo $id_profile;
echo "<hr>";
echo "status login :";
echo $user_sedang_login;
echo "<hr>";
echo "hak akses :";
echo $hak_akses;
echo "<hr>";
*/

?>
<ul>
 <li><?php
 if($user_sedang_login != true) {
	echo '<a href="index.php?p=form_login" >Login</a>';
}
?>
</li>
  <li><?php if($user_sedang_login == true) {
	echo '<a href="index.php?p=home" >Home</a>';
} ?>
</li>

<?php
$id_profile=$datauserlogin[2]["id_profile"];

if ($id_profile == '0'){

	include 'include/profile_developer.php';
		} elseif ($id_profile =='1'){
			include 'include/profile_asset_register.php';

				} elseif ($id_profile =='2'){
					include 'include/profile_asset_control.php';

					} elseif ($id_profile =='3'){
						include 'include/profile_asset_disposal.php';
                        } elseif ($id_profile =='4'){
						include 'include/profile_asset_approval.php';
						} elseif ($id_profile =='5'){
					   	include 'include/profile_general_affair.php';
						} elseif ($id_profile =='6'){
						include 'include/profile_region.php';
						} elseif ($id_profile =='7'){
						include 'include/profile_area_unit.php';
						} elseif ($id_profile =='8'){
						include 'include/profile_reporting.php';
                        } elseif ($id_profile =='9'){
						include 'include/profile_stock_opname.php';
						} elseif ($id_profile =='10'){
						include 'include/profile_logistik_report.php';

						}
						//profile member
						elseif ($id_profile =='100'){
							include 'include/profile_member.php';
						}
						//profile admin 
						elseif ($id_profile =='101'){
								include 'include/profile_admin.php';


						} elseif ($id_profile =='11'){
						include 'include/profile_bidder.php';




            } else {

		/*echo "menu tidak tersedia karena login anda ilegal, login anda adalah ".$id_profile."";*/
		?>
		<li><?php

	if($user_sedang_login == true) {
	echo '<a href="logout.php" >Logout</a> ';
    echo '( <b>'.$datauserlogin[2]["username"].'</b> )';
    //echo '( <b>'.$datauserlogin[2]["id_profile"].'</b> )';
	//echo '( <b>'.$datauserlogin[2]["nama"].'</b> )';
	//echo '( <b>testingggg</b> )';
}

?></a></li>
<?php

}

?>





</ul>

</body>
</html>
