<?php
    include ('sessionItoperator.php');
?>
<html>
<head>
<title>feedback</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../css/adminindex.css">
<link rel="stylesheet" type="text/css" href="../css/adminfeedback.css">
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
            padding: 50px;
        }
</style>
</head>
<body>
<?php  
    require "../dbcon/dbcon.php";
    $sqlflag = "update feedback set flag = 1";
    $queryflag=(mysqli_query($conn,$sqlflag));
    
?>
<nav class="navi_menu" id="mySidenav">
  <?php include '../details.php'; ?>
    <a href="indexitoperator.php" class="navi"><img src="../img/home.png" class="image">&nbsp;&nbsp;HOME</a>
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
  <a href="feedbackitoperator.php" class="active"><img src="../img/feedback.png" class="image">&nbsp;&nbsp;FEED-BACK 
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
<h1 style="color:white; font-size:24px; text-shadow:2px 2px 2px gray;"><b>FEED-BACK</b></h1>
<?php
    require "../dbcon/dbcon.php";
    $sql = "SELECT * FROM feedback";
    $query=(mysqli_query($conn,$sql));

    while ($row = mysqli_fetch_assoc($query)){
        echo "<div class='loopdiv' align='left'>";
        echo "<span class='fname'><img src='../img/name.png' class='proimg'>".$row['yourname']."</span><hr class ='hor'>";
        
        echo "<span class='fdname'><b>Feed-Back : </b></span>";
        echo "<span class='fdname'>".$row['fdback']."</span><br><br><hr class ='hor'>";
        echo "<div class='st'><span class='status'>Status : ";
        echo $row['status']."</span></div>";
        echo "</div>";  
    }
?>
</div>
</div>
    </body>
</html>
        