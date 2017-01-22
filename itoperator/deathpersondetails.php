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
    <a href="deathpersondetails.php" class="active"><img src="../img/account.png" class="image">&nbsp;&nbsp;DEAD PERSON DETAILS</a>
    <a href="deadpersoninfo.php" class="navi"><img src="../img/account.png" class="image">&nbsp;&nbsp;DEAD PERSON INQUIRY</a>
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
    
    
    if (isset($_POST['submit'])) {
        

                $imagename=$_FILES["image"]["name"]; 
                //Get the content of the image and then add slashes to it 
                $imagetmp=addslashes (file_get_contents($_FILES['image']['tmp_name']));
            
            
                $deadPersonName = $_POST['deadPersonName'];
            
            
                $school = $_POST['school'];

            
                $homecity = $_POST['homecity'];
            
          
                $university = $_POST['university'];
            
            
                $employee = $_POST['employee'];
                    
            
                $discription = $_POST['discription'];
            
           
            $sql = "INSERT INTO deathpersondetails (deadPersonName,pro_img,school,homecity,university,employee,Description) VALUES ('".$deadPersonName."','".$imagetmp."','".$school."','".$homecity."','".$university."','".$employee."','".$discription."')";
            if(mysqli_query($conn,$sql)){
                echo "<script>window.location('location:deathpersondetails.php')</script>";
            } else{echo "error";}

        }
    ?>


    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">
    <div id="asignup" align="center">
        <form id="aform2" action="deathpersondetails.php" method="post" enctype="multipart/form-data">
        <table id="atable2">
             <tr>
                <td colspan="2">
                    <h2 id="heading2" style = "color:white; font-family:myfont1;"><b>DEAD PERSON DETAILS</b></h2>
                </td>
            
            </tr>
            <tr>
                
                  <td><label for="deadPersonName">Dead Person Name</label></td>
                    
                <td> <input type="text" name="deadPersonName" id="deadPersonName" required></td>
                
            </tr>
            
            <tr>
                
                    <td><label for="school">School</label></td>
                    
                    <td><input type="text" name="school" id="school" required></td>
            
            </tr>
            
            <tr>
                
                    <td><label for="homecity" >Homecity</label></td>
                    
                    <td><input type="text" name="homecity" id="homecity" required></td>
            
            </tr>
            
             <tr>
                
                   <td><label for="university">University</label></td>
            
                   <td> <input type="text" name="university" id="university" required></td>
                    <td></td>
            </tr>
            
            <tr>
                
                    <td><label for="employee">Work Place</label></td>
                    
                    <td><input type="text" name="employee" id="employee" required></td>
            
            </tr>
            
            <tr>
                
                    <td><label for="image">Profile Image</label></td>
                    
                    <td><input type="file" name="image" id="image" required></td>
            
            </tr>
             
             <tr>
                
                 <td><label for="discription">Discription</label></td>
                    
                 <td><textarea type="text" name="discription" id="discription" column="20" rows="5" required></textarea></td>
            </tr>

             <tr>
                <td colspan="2">
                    <input type="submit" value="Submit" name="submit">
                    <input type="reset" value="Reset" name="cancle">
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
        