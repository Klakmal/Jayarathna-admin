<?php
    include ('sessionItoperator.php');
?>
<html>
    <head>
    <title>IT Operator</title>
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
        
        .hr {
            border: 0;
            height: 0;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        }
    </style>
    </head>
    <body>

<nav class="navi_menu" id="mySidenav">
  <?php include '../details.php'; ?>
    <a href="indexitoperator.php" class="active"><img src="../img/home.png" class="image">&nbsp;&nbsp;HOME</a>
  <a href="admincondolence.php" class="navi"><img src="../img/condolence.png" class="image">&nbsp;&nbsp;CONDOLENCE MESSAGE 
      <span class="noti">
          <?php
          require "../dbcon/dbcon.php";
          $query = "SELECT COUNT(*) FROM visitors";
          $result = mysqli_query($conn,$query);
          $rows = mysqli_fetch_row($result);
          echo $rows[0];
          ?>    
      </span>
  </a>
  <a href="webcastingadmin.php" class="navi"><img src="../img/webcasting.png" class="image">&nbsp;&nbsp;WEB CASTING</a>
  <a href="personalGalleryadmin.php" class="navi"><img src="../img/webcasting.png" class="image">&nbsp;&nbsp;PERSONAL GALLERY</a>
  <a href="feedbackitoperator.php" class="navi"><img src="../img/feedback.png" class="image">&nbsp;&nbsp;FEED-BACK 
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
    <a href="deathpersondetails.php" class="navi"><img src="../img/account.png" class="image">&nbsp;&nbsp;DEAD PERSON DETAILS</a>
    <a href="deadpersoninfo.php" class="navi"><img src="../img/account.png" class="image">&nbsp;&nbsp;DEAD PERSON INQUIRY</a>
  <a href="../itoperator/edititoperator.php" class="navi"><img src="../img/account.png" class="image">&nbsp;&nbsp;UPDATE PROFILE</a>
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
                <h6>Web Base - Funeral management system. </h6>
                <hr class="hr">
            </div>
        </div>    
    </div>
  </body>
</html>