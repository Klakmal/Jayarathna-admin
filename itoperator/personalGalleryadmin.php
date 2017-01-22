<?php
    include ('sessionItoperator.php');
?>
<html>
<head>
    <title>Personal gallery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/adminindex.css">
    <link rel="stylesheet" type="text/css" href="../css/personalGallery.css">
    <link rel="stylesheet" type="text/css" href="../css/manage.css">
    <style>
    html,body,h1,h2,h3,h4,h5 {font-family: 'Ruda', sans-serif;}
    .w3-sidenav a,.w3-sidenav h4 {font-weight:bold;}
    </style>
    </head>
<body>

<!--left navigation menu-->
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
  <a href="personalGalleryadmin.php" class="active"><img src="../img/webcasting.png" class="image">&nbsp;&nbsp;PERSONAL GALLERY</a>
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

<!--log out button-->
  <div class="menu2" align="right">
    <div class="menu2in">
      <a href="../signout.php" class="myButton">Log Out</a>
    </div>
  </div>

<div class = "web_container1" align="center">
<div class="web_container2">

    <?php
    #connecting to database 
        require "../dbcon/dbcon.php";

        $error=FALSE;
            
            if (isset($_POST['submit'])) {
                #taking the dead pearson id input
                if(empty($_POST['deadPersonID'])){ 
                    $error = TRUE;
                }else{
                    $deadPersonID = $_POST['deadPersonID'];
                }
                #taking the number of input
                if(empty($_POST['num_images'])){ 
                    $error = TRUE;
                }else{
                    $num_images = $_POST['num_images'];
                }                
                if ($error==FALSE){

                #insert details into the database
                $sql = "INSERT INTO personalgallery (deadPersonID,num_images) VALUES ('$deadPersonID','$num_images')";
                if(mysqli_query($conn,$sql)){
                    //set the directory path name
                    $dir = ("../../Project/personalGallery");

                    //make the directory
                    mkdir($dir, $deadPersonID);

                    #alert if data transfered successfully
                    echo "<script>alert('photos are successfully uploaded'); window.location.href='personalGalleryadmin.php'; </script>"; 
                    die();
                } else{
                    #alert if failed to enter data
                    echo "<script type='text/javascript'>alert('Not successfully data tranfer!')</script>"; 
                }
                 
              }
            }
              
              

      ?>

      <!--form for the personal gallery details-->
 
        <div id="pGallery">
            <form id="frm1" action="personalGalleryadmin.php" method="post">
            <table id="tbl1">
                
                        <h1 id="heading2" align="center"><b style="color:white; font-size:24px; text-shadow:2px 2px 2px gray;">Personal Gallery</b></h1>
						<hr>	
				    <tr>
                    <td colspan="2" align="center">
                        
						<br>
                    </td>
                
                </tr>
                 <tr>
                    
                        <td><label for="deadPersonID">Dead Person ID : </label></span></td>
                        
                        <td><input type="text" name="deadPersonID" id="deadPersonID" placeholder="Dead Person ID" required></td>
                
                </tr>

                <tr>
                    
                      <td><label for="num_images">Number Of Images: </label></td>
                        
                      <td> <input type="text" name="num_images" id="num_images" placeholder="Number of images" required></td>
                    
                </tr>
                               
                 <tr>
                    <td colspan="2" align="right">
                        <input type="submit" value="Submit" name="submit"> 
                        <input type="reset" value="Cancel" name="cancel">
                    </td>
                
                </tr>
                
                
                </table>
            </form>
            </div>

    </body>
</html>
