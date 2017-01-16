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
    textarea{
        width: 205px;
        height: 75px;
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
    <a href="deadpersoninfo.php" class="active"><img src="../img/account.png" class="image">&nbsp;&nbsp;DEAD PERSON INQUIRY</a>
  <a href="../itoperator/edititoperator.php" class="navi"><img src="../img/account.png" class="image">&nbsp;&nbsp;UPDATE PROFILE</a>
</nav>

  <div class="menu2" align="right">
    <div class="menu2in">
      <a href="../signout.php" class="myButton">Log Out</a>
    </div>
  </div>
  <div class="afb1" align="center">
<div class="afb2" align="left">
  <?php
                require "../dbcon/dbcon.php";
                
                 if (isset($_POST['insert'])) {
                     
                     
                                $deadPersonName = $_POST['deadPersonName'];
                            
    $sql = "SELECT * FROM deathpersondetails WHERE deadPersonName = '$deadPersonName'";
    $query=(mysqli_query($conn,$sql));
?>
<table>
    <tr> 
        <th>Dead Person ID</th>
        <th>Dead Person Name</th> 
        <th>School</th>
        <th>University</th>
        <th>Homecity</th>
        <th>Employee</th>  
    </tr>

<?php
    while ($row = mysqli_fetch_assoc($query)){
         echo "<tr>";
                
            echo "<td>";
            echo $row['deadPersonID'];
            echo "</td>";

            echo "<td>";
            echo $row['deadPersonName'];
            echo "</td>";

            echo "<td>";
            echo $row['school'];
            echo "</td>";
                
            echo "<td>";
            echo $row['university'];
            echo "</td>";

             echo "<td>";
            echo $row['homecity'];
            echo "</td>";
                
            echo "<td>";
            echo $row['employee'];
            echo "</td>";

         echo "</tr>";}
?>
</table>
<?php
}
?>

<div id="id">
                <form method="post" action="deadpersoninfo.php">
                <table id="tb11">
                    <tr>
                        <th colspan="2" align="left"><b style="color:white; font-size:24px; text-shadow:2px 2px 2px gray;">DEAD PERSON INFORMATION</b></th> 
                    </tr>
                    <tr>
                    <td><label for="deadPersonName">Dead Person Name</label></td>
                    <td><input type="text" name="deadPersonName" placeholder="Dead Person Name" required></td>
                    </tr> 
                    <tr>
                    <td colspan="2" align="center">
                    <input type="submit" value="Search" name="insert">
                    </td>
                    </tr>

                </table>
            
                </form>
                </div>  

</div>
</div>

</body>
</html>