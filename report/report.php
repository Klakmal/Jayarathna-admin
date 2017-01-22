<?php
    include ('../manager/sessionManager.php');
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
  <?php include '../details.php'; ?>
  <a href="../manager/indexmanager.php" class="navi"><img src="../img/home.png" class="image">&nbsp;&nbsp;HOME</a>
  <a href="supplierpayment.php" class="navi"><img src="../img/payments.png" class="image">&nbsp;&nbsp;SUPPLIER PAYMENT</a>
  <a href="suppliertype.php" class="navi"><img src="../img/supplier.png" class="image">&nbsp;&nbsp;SUPPLIER/TYPE DETAILES</a>
  <a href="packages.php" class="navi"><img src="../img/package.png" class="image">&nbsp;&nbsp;PACKAGES</a>
    <a href="../manager/moq.php" class="navi"><img src="../img/updateprice.png" class="image">&nbsp;&nbsp;ADD/CHANGE MOQ</a>
  
</nav>

<div class="menu2" align="right">
    <div class="menu2in">
      <a href="../signout.php" class="myButton">Log Out</a>
    </div>
  </div>
  </body>
  </html>