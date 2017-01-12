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
  <a href="datainquiry.php" class="navi"><img src="../img/stock.png" class="image">&nbsp;&nbsp; DATA INQUIRY</a>
  <a href="adminReservation.php" class="navi"><img src="../img/package.png" class="image">&nbsp;&nbsp; PACKAGE AND SERVICES</a>
  <a href="feedbackmanager.php" class="navi"><img src="../img/feedback.png" class="image">&nbsp;&nbsp; FEED-BACK 
      <span class="noti">
          <?php
              require "../dbcon/dbcon.php";
              $query = "SELECT COUNT(*) FROM feedback WHERE flag = 0";
              $result = mysqli_query($conn,$query);
              $rows = mysqli_fetch_row($result);
              echo $rows[0];
          ?>
      </span>
    </a>
    <a href="editmanager.php" class="navi"><img src="../img/profile.png" class="image">&nbsp;&nbsp; UPDATE PROFILE</a>
    <br>
</nav>

<div class="menu2" align="right">
    <div class="menu2in">
      <a href="../signout.php" class="myButton">LOG OUT</a>
    </div>
  </div>
  </body>
  </html>