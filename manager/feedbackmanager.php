<?php
    include ('sessionManager.php');
?>
<html>
<head>
<title>feedback</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../css/adminindex.css">
<link rel="stylesheet" type="text/css" href="../css/adminfeedback.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: 'Ruda', sans-serif;}
    .w3-sidenav a,.w3-sidenav h4 {font-weight:bold;}
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
  <a href="indexmanager.php" class="navi"><img src="../img/home.png" class="image">&nbsp;&nbsp; HOME</a>
  <a href="datainquiry.php" class="navi"><img src="../img/stock.png" class="image">&nbsp;&nbsp; DATA ENTERING</a>
  <a href="report.php" class="navi"><img src="../img/stock.png" class="image">&nbsp;&nbsp; REPORTS</a>
  <a href="adminReservation.php" class="navi"><img src="../img/package.png" class="image">&nbsp;&nbsp; PACKAGE AND SERVICES</a>
  <a href="feedbackmanager.php" class="active"><img src="../img/feedback.png" class="image">&nbsp;&nbsp; FEED-BACK 
    </a>
    <a href="editmanager.php" class="navi"><img src="../img/profile.png" class="image">&nbsp;&nbsp; UPDATE PROFILE</a>
    <br>
</nav>

  <div class="menu2" align="right">
    <div class="menu2in">
      <a href="../signout.php" class="myButton">Log Out</a>
    </div>
  </div>

<div class="afb1" align="center">
<div class="afb2" align="left">
<h1 style="color:white; font-size:24px; text-shadow:2px 2px 2px gray;"><b>FEED-BACK</b></h1>
<?php
    require "../dbcon/dbcon.php";
    $sql = "SELECT * FROM feedback";
    $query=(mysqli_query($conn,$sql));

    while ($row = mysqli_fetch_assoc($query)){
        echo "<div class='loopdiv'>";
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
        