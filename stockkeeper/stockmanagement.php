<?php
    include ('sessionStockkeeper.php');
?>
<html>
    <head>
    <title>Stock Keeper</title>
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
  <a href="indexstockkeeper.php" class="navi"><img src="../img/home.png" class="image">&nbsp;&nbsp;HOME</a>
  <a href="reportstockkeeper/id.php" class="navi"><img src="../img/report.png" class="image">&nbsp;&nbsp;COFFIN ID REGISTRATION</a>
  <a href="reportstockkeeper/moq.php" class="navi"><img src="../img/updateprice.png" class="image">&nbsp;&nbsp;ADD/CHANGE MOQ</a>
  <a href="reportstockkeeper/report1.php" class="navi"><img src="../img/stock.png" class="image">&nbsp;&nbsp;STOCK DETAILS</a>
  <a href="reportstockkeeper/report2.php" class="navi"><img src="../img/account.png" class="image">&nbsp;&nbsp;STOCK COUNT</a>
  
</nav>

<div class="menu2" align="right">
    <div class="menu2in">
      <a href="../signout.php" class="myButton">Log Out</a>
    </div>
  </div>
  </body>
  </html>