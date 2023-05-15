<!-- Profile Unit / Area -->
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

<ul>


 <li><?php
 if($user_sedang_login != true) {
    echo '<a href="index.php?p=form_login" >Login</a>';
}
?>
</li>
  <li class="dropdown">
  <a href="#" class="dropbtn"><?php if($user_sedang_login == true) {
    if($hak_akses >= 8) {
        echo 'Transaksi';
    }
}
?></a>
  <div class="dropdown-content">


<?php if($user_sedang_login == true) {
    if($hak_akses >= 8) {
        echo '<a href="index.php?p=code/master_stock" >List Product</a>';
    }
}
?></a>
<?php if($user_sedang_login == true) {
    if($hak_akses >= 8) {
        echo '<a href="index.php?p=code/b_pengeluaran_lainnya" >Transaksi</a>';
    }
}
?></a>
     <?php if($user_sedang_login == true) {
    if($hak_akses >= 8) {
        echo '<a href="index.php?p=code/list_history" >History</a>';
    }
}
?></a>
</div></li>

 <li class="dropdown">
  <a href="#" class="dropbtn"><?php if($user_sedang_login == true) {
    if($hak_akses >= 8) {
        echo 'Profile';
    }
}
?></a>
  <div class="dropdown-content">
  <?php if($user_sedang_login == true) {
    if($hak_akses >= 8) {
        echo '<a href="index.php?p=list_user_single">Profile</a>';
    }
}
?>
  <div class="dropdown-content">
  <?php if($user_sedang_login == true) {
    if($hak_akses >= 8) {
        echo '<a href="index.php?p=list_lokasi">Update Lokasi / Alamat</a>';
    }
}
?>
</div></li>
<li><?php

    if($user_sedang_login == true) {
    echo '<a href="logout.php" >Logout</a> ';
    echo '( <b>'.$datauserlogin[2]["username"].'</b> )';
}

?></a></li>
</ul>

</body>
</html>
