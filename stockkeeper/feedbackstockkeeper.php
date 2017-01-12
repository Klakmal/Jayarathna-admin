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
  <a href="stockmanagement.php" class="navi"><img src="../img/stock.png" class="image">&nbsp;&nbsp;STOCK MANAGMENT</a>
 
  <a href="feedbackstockkeeper.php" class="navi"><img src="../img/feedback.png" class="image">&nbsp;&nbsp;FEED-BACK </a>
  <a href="editstockkeeper.php" class="navi"><img src="../img/profile.png" class="image">&nbsp;&nbsp;UPDATE PROFILE</a>
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
    echo '<table class = tbl>';

    while ($row = mysqli_fetch_assoc($query)){
        echo '<tr class = "row">';
        echo '<td class = "col1">';

        echo $row['yourname'];
        echo '<br>';
                echo '<br>';
        echo "Feed-Back : ";

        echo $row['fdback'];
        
        echo '</td>';
        
        
        echo '<td class = "col2">';
        echo "Status";
        echo '<br>';
        echo $row['status'];
        
        echo '</td>';
        echo '</tr>';

    }
    echo '</table>';
    
    ?>
</div>
</div>
    </body>
</html>
        