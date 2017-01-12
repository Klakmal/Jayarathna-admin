<?php
    include ('sessionManager.php');
?>
<html>
    <head>
    <title>Manager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/adminindex.css">
    <link rel="stylesheet" type="text/css" href="../css/manage.css">
    <style>
    html,body,h1,h2,h3,h4,h5 {font-family: 'Ruda', sans-serif;}
    .w3-sidenav a,.w3-sidenav h4 {font-weight:bold;}
    </style>
    </head>
    <body>

<nav class="navi_menu" id="mySidenav">
  <div class="container">
    <div class="headdiv" align="center">
        <span class="headline">JAYARATNE FUNERALS</span>
    </div>
    <div class="navi_pro" align="center">
    <img class="propic" src="../img_avatar_g2.jpg"><br>
    <p style="color:#aeb2b7;">Welcome,</p>
    <h4 class="name"><b>Kasun Lakmal</b></h4>
<!--    <p class="other">Jayarathna Funrels</p>-->
        <hr>
    </div>
      <div class="menutitlediv">
          <p class="menutitle">Menu</p>
      </div>
  </div>
  <a href="indexmanager.php" class="navi"><img src="../img/home.png" class="image">&nbsp;&nbsp;HOME</a>
  <a href="updateprices.php" class="navi"><img src="../img/updateprice.png" class="image">&nbsp;&nbsp;UPDATE PRICES</a>
  <a href="../report/payment.php" class="navi"><img src="../img/payments.png" class="image">&nbsp;&nbsp;PAYMENT</a>
  <a href="../report/supplier.php" class="navi"><img src="../img/supplier.png" class="image">&nbsp;&nbsp;SUPPLIER</a>
  <a href="../report/type.php" class="navi"><img src="../img/678592-200.png" class="image">&nbsp;&nbsp;COFFIN TYPES</a>
  <a href="../report/report.php" class="navi"><img src="../img/report.png" class="image">&nbsp;&nbsp;REPORT</a>
</nav>

<div class="menu2" align="right">
    <div class="menu2in">
      <a href="../signout.php" class="myButton">Log Out</a>
    </div>
  </div>
  </body>
  </html>