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
                
                if(empty($_POST['deadname'])){ 
                    $deadnameerr = "";
                    $error = TRUE;
                }else{
                    $deadname = $_POST['deadname'];
                }
                
                if(empty($_POST['url'])){ 
                    $urlerr = "";
                    $error = TRUE;
                }else{
                    $url = $_POST['url'];
                }
                
              
                
                if ($error==FALSE){
               
                $sql = "INSERT INTO webcasting (deadname,url) VALUES ('".$deadname."','".$url."')";
                if(mysqli_query($conn,$sql)){
                    /*echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
                    header( "Location: webcasting.php");*/
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
                    
                        <td><label for="deadname">Dead Person Name : </label><span class="error"><?php echo $deadnameerr;?></span></td>
                        
                        <td><input type="text" name="deadname" id="deadname" placeholder="Dead Person Name" required></td>
                
                </tr>
                <tr>
                    
                      <td><label for="url">URL: </label><span class="error"><?php echo $urlerr;?></span></td>
                        
                    <td> <input type="text" name="url" id="url" placeholder="url" required></td>
                    
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
    </div>
</div>
    </body>
</html>
