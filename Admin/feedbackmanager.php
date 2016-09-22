<html>
<head>
<title>feedback</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/adminindex.css">
<link rel="stylesheet" type="text/css" href="css/adminfeedback.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
.w3-sidenav a,.w3-sidenav h4 {font-weight:bold}
</style>
</head>
<body>

<nav class="navi_menu" id="mySidenav"><br>
  <div class="container">
    <div class="navi_pro">
    <img class="propic" src="img_avatar_g2.jpg"><br>
    <h4 class=""><b>Kasun Lakmal</b></h4>
    <p class="">Jayarathna Funrels</p>
    </div>
  </div>
  <a href="indexmanager.php" class="navi"><img src="img/home.png" class="image">&nbsp;&nbsp;HOME</a>
  <a href="admincondolence.php" class="navi"><img src="img/condolence.png" class="image">&nbsp;&nbsp;CONDOLENCE MESSAGE <span class="noti">5</span></a>
  <a href="feedbackadmin.php" class="navi"><img src="img/feedback.png" class="image">&nbsp;&nbsp;FEED-BACK <span class="noti">12</span></a>
  <a href="adminpackage.php" class="navi"><img src="img/package.png" class="image">&nbsp;&nbsp;PACKAGE AND SERVICES <span class="noti">2</span></a>
  <a href="webcastingadmin.php" class="navi"><img src="img/webcasting.png" class="image">&nbsp;&nbsp;WEB CASTING</a>
  <a href="manage.php" class="navi"><img src="img/stock.png" class="image">&nbsp;&nbsp;EMPLOYEE REGISTER</a>
  <a href="stockmanagement.php" class="navi"><img src="img/stock.png" class="image">&nbsp;&nbsp;STOCK MANAGMENT</a>
   
  
</nav>

  <div class="menu2" align="right">
    <div class="menu2in">
      <a href="#" class="myButton">Log Out</a>
    </div>
  </div>

<div class="afb1" align="center">
<div class="afb2" align="left">
<h1 style="color:white; font-size:24px; text-shadow:2px 2px 2px gray;"><b>FEED-BACK</b></h1>
<?php
    require "dbcon/dbcon.php";
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
        