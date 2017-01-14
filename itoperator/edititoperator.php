<?php
    include ('sessionItoperator.php');
?>
<html>
<head>
    <title>Edit profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/adminindex.css">
    <link rel="stylesheet" type="text/css" href="../css/manage.css">
    <link rel="stylesheet" type="text/css" href="../css/adminfeedback.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: 'Ruda', sans-serif;}
    .w3-sidenav a,.w3-sidenav h4 {font-weight:bold;}
    
body{
    margin:0px;
    background-color: #eee;
}
.con1{
    width: 100%;
    height: 100%;
    background-color: ;
}
.con2{
    width: 500px;
    height: 100%;
    background-color: #eee;
    position: relative;
    margin-top: 100px;
    margin-left: 200px;
    padding: 20px;
    border-radius: 10px;
}

input[type=text]:hover,[type=password]:hover{
    width: 200px;
    height: 30px;
    margin: 5px;
    border-radius: 10px;
    background-color: #fff;
    border:1px solid white;
    padding-left: 5px;
}


.tb{
    width:100px;
    background-color: #aaa;
}
.tb1{
    width: ;
}
.tb2{
    width:100px;
    float: center;
    background-color: white;
}
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

<div class="afb1" align="center">
<div class="afb2" align="left">
    <?php
    require "../dbcon/dbcon.php";
    
    $error=FALSE;
       $employeeiderr = $emailerr = $addresserr = $hnumbererr = $mnumbererr = $passworderr =$repassworderr = "";
    if (isset($_POST['submit'])) {

            if(empty($_POST['employeeid'])){ 
                $employeeiderr = "</br>* ";
                $error = TRUE;
            }else{
                $employeeid = $_POST['employeeid'];
            }
        
            if(empty($_POST['email'])){ 
                $emailerr = "</br>* ";
                $error = TRUE;
            }else{
                $email = $_POST['email'];
                if (strpos($email, '@') == FALSE) {
                    $emailerr =  "* Invalid Email";
                    $error = TRUE;
                }
            }

           
            if(empty($_POST['address'])){ 
                $addresserr = "</br>* ";
                $error = TRUE;
            }else{
                $address = $_POST['address'];
            }

            if(empty($_POST['hnumber'])){ 
                $hnumbererr = "</br>* ";
                $error = TRUE;
            }else{
                $hnumber = $_POST['hnumber'];
            }

            if(empty($_POST['mnumber'])){ 
                $mnumbererr = "</br>* ";
                $error = TRUE;
            }else{
                $mnumber = $_POST['mnumber'];
            }

    
           
            if(empty($_POST['password'])){ 
                $passworderr = "</br>* ";
                $error = TRUE;
            }else{
                $password = $_POST['password'];
            }
            
            if(empty($_POST['repassword'])){ 
                $repassworderr = "</br>* Reenter your password";
                $error = TRUE;
            }else{
                $repassword = $_POST['repassword'];
                if (strcmp($password, $repassword) !== 0) {
                    $repassworderr = "* Passwords don't match ";
                    $error = TRUE;
                }
            }

 
             if ($error==FALSE){
           
            $sql = "UPDATE employee SET email='$email',address='$address',hnumber='$hnumber', mnumber='$mnumber', password='$password',repassword='$repassword' WHERE employeeid='$employeeid'";
            if(mysqli_query($conn,$sql)){
                header('location:adminlogin.php');
                die();
            } else{echo "error";}
             
            }
        }
    
    ?>


    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
    <div id="asignup" align="center">
        <form id="bform5" action="edit.php" method="post">
        <table id="btable5">
            <tr>
                <td colspan="2">
                    <h1 id="aheading" align="center"><b style="color:white; font-size:24px; text-shadow:2px 2px 2px gray;">EDIT PROFILE</b></h1>
                </td>
            
            </tr>
            
             <tr>
                
                   <td><label for="employeeid">Employee ID</label><span class="error"><?php echo $employeeiderr;?></span></td>
            
                   <td> <input type="text" name="employeeid" id="employeeid" required></td>
            
            </tr>
           
            <tr>
                
                 <td><label for="email">Email</label><span class="error"><?php echo $emailerr;?></span></td>
                    
                   <td><input type="email" name="email" id="email" required></td>
            </tr>
            <tr>
                
                    <td><label for="address">Address</label><span class="error"><?php echo $addresserr;?></span></td>
                    
                    <td><input type="text" name="address" id="address" required></td>
            
            </tr>
            <tr>
                
                    <td><label for="hnumber">Home Phone No.</label><span class="error"><?php echo $hnumbererr;?></span></td>
                    
                    <td><input type="text" name="hnumber" id="hnumber" required></td>
            
            </tr>
            <tr>
                
                    <td><label for="mnumber">Mobile Phone No.</label><span class="error"><?php echo $mnumbererr;?></span></td>
                    
                    <td><input type="text" name="mnumber" id="mnumber" required></td>
            
            </tr>
            
             <tr>
                
                    <td><label for="password">Password</label></td>
                   
                    <td><input type="password" name="password" id="password" placeholder="<?php echo $passworderr;?>" required><span class="error"><?php echo $passworderr;?></span></td>
            </tr>
            <tr>
                
                    <td><label for="Password">ReEnter Password</label></td>
                   
                    <td><input type="password" name="repassword" id="repassword" placeholder="<?php echo $repassworderr;?>" required></td>
            </tr>
            
             <tr>
                <td colspan="2" align="right">
                    <input type="submit" value="UPDATE" name="submit">
                    <input type="reset" value="RESET" name="cancle">
                </td>
            </tr>
        </table>
        </form>
        </div>
    </form>

</div>
</div>
<!--form end -->
</body>
</html>