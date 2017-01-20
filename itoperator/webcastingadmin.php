<?php
    include ('sessionItoperator.php');
?>
<html>
<head>
    <title>webcasting</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/adminindex.css">
    <link rel="stylesheet" type="text/css" href="../css/webcastingadmin.css">
    <link rel="stylesheet" type="text/css" href="../css/manage.css">
    <style>
    html,body,h1,h2,h3,h4,h5 {font-family: 'Ruda', sans-serif;}
    .w3-sidenav a,.w3-sidenav h4 {font-weight:bold;}
    </style>
    </head>
<body>

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
  <a href="webcastingadmin.php" class="active"><img src="../img/webcasting.png" class="image">&nbsp;&nbsp;WEB CASTING</a>
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

<div class = "web_container1" align="center">
<div class="web_container2">

    <?php
        require "../dbcon/dbcon.php";

        $error=FALSE;
            $deadnameerr = $urlerr= "";
            
            if (isset($_POST['submit'])) {
                
                if(empty($_POST['deadid'])){ 
                    $deadnameerr = "";
                    $error = TRUE;
                }else{
                    $deadid = $_POST['deadid'];
                }
                
                if(empty($_POST['url'])){ 
                    $urlerr = "";
                    $error = TRUE;
                }else{
                    $url = $_POST['url'];
                }
                
              
                
                if ($error==FALSE){
               
                $sql = "INSERT INTO webcasting (deadPersonID,url) VALUES ('".$deadid."','".$url."')";//INSERT DETAILS INTO WEBCASTING
                if(mysqli_query($conn,$sql)){
                    
                    echo "<script>alert('webcasting url successfully send'); window.location.href='webcastingadmin.php'; </script>";
                    die();
                } else{
                    echo "<script type='text/javascript'>alert('Not successfully datatranfer!')</script>";
                }
                 
                }
            }
        ?>
    
     <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <div id="condolence">
            <form id="frm1" action="webcastingadmin.php" method="post">
            <table id="tbl1">
                
                        <h1 id="heading2" align="center"><b style="color:white; font-size:24px; text-shadow:2px 2px 2px gray;">Webcasting</b></h1>
						<hr>
                   
				
				<tr>
                    <td colspan="2" align="center">
                        
						<br>
                    </td>
                
                </tr>
                 <tr>
                    
                    <td><label for="deadid">Dead Person ID : </label><span class="error"><?php echo $deadnameerr;?></span></td>                        
                    <td><input type="text" name="deadid" id="deadid" placeholder="Dead Person ID" required></td>
                
                </tr>
                <tr>
                    
                    <td><label for="url">URL: </label><span class="error"><?php echo $urlerr;?></span></td>                        
                    <td> <input type="text" name="url" id="url" placeholder="URL" required></td>
                    
                </tr>
               
                
                 <tr>
                    <td colspan="2" align="right">
                        <input type="submit" value="Submit" name="submit"> 
                        <input type="reset" value="Cancle" name="cancle">
                    </td>
                
                </tr>
                
                
                </table>
            </form>
            </div>
        </form>
   
  <?php
                require "../dbcon/dbcon.php";
                
                 if (isset($_POST['insert'])) {
                     
                     
                                $deadPersonName = $_POST['deadPersonName'];
                            
    $sql = "SELECT * FROM deathpersondetails WHERE deadPersonName = '$deadPersonName'";//TAKE ALL DETAILS FROM DEATHPERSONDETAILS WITH GIVEN DEAD PERSON NAME
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
                <form method="post" action="webcastingadmin.php">
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
