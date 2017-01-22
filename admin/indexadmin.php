<?php
    include ('sessionAdmin.php');
?>
<html>
    <head>
    <title>Administrator</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/adminindex.css">
    <link rel="stylesheet" type="text/css" href="../css/manage.css">
    <style>
    html,body,h1,h2,h3,h4,h5 {font-family: 'Ruda', sans-serif;}
    .w3-sidenav a,.w3-sidenav h4 {font-weight:bold;}
        
        .main_cover{
            width: 81%;
            height: 100%;
            margin-left: 19%;
            padding-top: 50px;
            background-color: #f1f1f1;
            color: dimgray;
        }
        .cover{
            padding-top: 10%;
        }
    </style>
    </head>
    <body>

<nav class="navi_menu" id="mySidenav">
  <?php include '../details.php'; ?>
<a href="indexadmin.php" class="active"><img src="../img/home.png" class="image">&nbsp;&nbsp;HOME</a>
  <a href="manage.php" class="navi"><img src="../img/stock.png" class="image">&nbsp;&nbsp;EMPLOYEE REGISTER</a>
  <a href="editadmin.php" class="navi"><img src="../img/profile.png" class="image">&nbsp;&nbsp;UPDATE PROFILE</a>
  
</nav>

<div class="menu2" align="right">
    <div class="menu2in">
      <a href="../signout.php" class="myButton">Log Out</a>
    </div>
  </div>
    <div class="main_cover" align="center">
        <div class="cover">
            <div class="logo" align = "center">
                <img class="logo_img" src="../img/logo.png" height="60px" width="auto">
            </div>
            <div><h3 style="color: #333333;">Jayaratna Funeral Directors (Pvt) Ltd.</h3>
                <h5>The Jayaratne VIP Service is provided by Jayaratne VIP Services Pvt Ltd </h5>
                <hr class="hr">
            </div>
        </div>    
    </div>
  </body>
  </html>