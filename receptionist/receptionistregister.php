<?php
    include ('sessionReceptionist.php');
?>
<html>
<head>
    <title>login</title>
    <link rel="stylesheet" type="text/css" media="screen" href="../css/receptionistregister.css">
     <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/adminindex.css">
    <link rel="stylesheet" type="text/css" href="../css/resiptionistregister.css">
    
    <style>
    html,body,h1,h2,h3,h4,h5 {font-family: 'Ruda', sans-serif;}
    .w3-sidenav a,.w3-sidenav h4 {font-weight:bold;}
    </style>
    <!--date picker eke jquery -->
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <link rel="stylesheet" href="/resources/demos/style.css">
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <script>
      $( function() {
        $( "#datepicker" ).datepicker();
      } );

      </script>
    <!--date picker eke jquery -->
</head>
<body>


<nav class="navi_menu" id="mySidenav">
  <?php include '../details.php'; ?>
    <a href="indexreceptionist.php" class="navi"><img src="../img/home.png" class="image">&nbsp;&nbsp;HOME</a>
   <a href="receptionistregister.php" class="active"><img src="../img/account.png" class="image">&nbsp;&nbsp;REGISTRATION</a>
   <a href="customerinfo.php" class="navi"><img src="../img/profile.png" class="image">&nbsp;&nbsp;CUSTOMER INFORMATION</a>
  <a href="feedbackreceptionist.php" class="navi"><img src="../img/feedback.png" class="image">&nbsp;&nbsp;FEED-BACK 
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
  <a href="editreceptionist.php" class="navi"><img src="../img/profile.png" class="image">&nbsp;&nbsp;UPDATE PROFILE</a>
 
</nav>

<div class="menu2" align="right">
    <div class="menu2in">
      <a href="../signout.php" class="myButton">Log Out</a>
    </div>
</div>
<div class="conner1" align="center">
            <div class="conner2" align="center">
    <?php
    require "../dbcon/dbcon.php";

    $error=FALSE;
        $cnameerr = $doberror = $connumbererr = $emailerr = $gendererr = $doberr = $nicerr= $addresserr ="";
        
        if (isset($_POST['submit'])) {
            
            
            if(empty($_POST['cusname'])){ 
                $cnameerr = "* ";
                $error = TRUE;
            }else{
                $cname = $_POST['cusname'];
            }
            if(empty($_POST['nic'])){ 
                $nicerr = "* ";
                $error = TRUE;
            }else{
                $nic = $_POST['nic'];
            }
            if(empty($_POST['address'])){ 
                $addresserr = "</br>* ";
                $error = TRUE;
            }else{
                $address = $_POST['address'];
            }
            
            if(empty($_POST['connumber'])){ 
                $connumbererr = "</br>* ";
                $error = TRUE;
            }else{
                $connumber = $_POST['connumber'];
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
            
            if(empty($_POST['gender'])){ 
                $gendererr = "</br>* ";
                $error = TRUE;
            }else{
                $gender = $_POST['gender'];
            }
            
            if(empty($_POST['dob'])){ 
                $dobererr = "</br>* ";
                $error = TRUE;
            }else{
                $dob = $_POST['dob'];
            }
           
            
 /*           if(empty($_POST['dob'])){ 
                $doberr = "</br>* ";
                $error = TRUE;
            }else{
                $dob = $_POST['dob'];
            }
            */
            

             if ($error==FALSE){
           
            $sql = "INSERT INTO customers (cusname,nic,address,connumber,email,gender,dob,password,repassword) VALUES ('".$cname."','".$nic."','".$address."','".$connumber."','".$email."','".$gender."','".$dob."','0','0')";
            if(mysqli_query($conn,$sql)){
                echo "<script type='text/javascript'>window.location.href ='receptionistreservation.php';</script>";
            } else{echo "error";}
             
            }
        }
    ?>
<script type="text/javascript">
    function validateForm() {
        return checkPhone();
    }
    function checkPhone() {
            var connumber = document.forms["myForm"]["connumber"].value;
            var phoneNum = connumber.replace(/[^\d]/g, '');
            if(phoneNum.length == 10) {
                return true;
            }
            else {
                document.getElementById("connumber").className = document.getElementById("connumber").className + " error";
                return false;
            }
        }
</script>

    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" onsubmit = "return validateForm()">
    <div id="signup" align="center">
        <form id="f2" action="login.php" method="post">
        <table id="tb2">
            <tr>
                <td colspan="2">
                    <h2 id="heading2" style = "color:white; font-family:myfont1;"><b>REGISTRATION FORM</b></h2>
                </td>
            
            </tr>
            <tr>
                
                  <td><label for="cusname">Customer Name</label><span class="error"><?php echo $cnameerr;?></span></td>
                    
                <td> <input type="text" name="cusname" id="cusname" required></td>
                
            </tr>
            <tr>
                
                    <td><label for="nic">NIC</label><span class="error"><?php echo $nicerr;?></span></td>
                    
                    <td><input type="text" name="nic" id="nic" required></td>
            
            </tr>
             <tr>
                
                   <td><label for="connumber">Contact Number</label></td>
            
                   <td> <input type="tel" name="connumber" id="connumber" pattern="^\d{10}$" maxlength="10" minlength="10" required><span class="error"></span></td>
                    <td></td>
            </tr>
            <tr>
                
                    <td><label for="address">Address</label><span class="error"><?php echo $addresserr;?></span></td>
                    
                    <td><input type="text" name="address" id="address" required></td>
            
            </tr>
            
             <tr>
                
                 <td><label for="email">Email</label><span class="error"><?php echo $emailerr;?></span></td>
                    
                   <td><input type="email" name="email" id="email" required></td>
            </tr>
            <tr>
                <td><label>Gender</label><span class="error"><?php echo $gendererr;?></span></td>
                <td> <input type="radio" name="gender" value="male" required><label>Male</label>
                    <input type="radio" name="gender" value="female"><label>Female</label>
                </td>
             </tr>
<!--            <tr>
                
                 <td><label for="dob">DOB</label><span class="error"><?php echo $doberr;?></span></td>
                    
                   <td><input type="date" name="dob" id="dob" placeholder="yyyy-mm-dd" required></td>
            </tr>-->
            <tr>
                <td>
                    <label for="dob">DOB</label><span class="error"></span>
                </td>
                <td  align=left  >
                    <input class="year" id="datepicker" type="text" name="dob" placeholder="mm/dd/yyyy">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="reset" value="Reset" name="cancle">
                    <input type="submit" value="Reservation Form" name="submit">
                </td>
            
            </tr>
        </table>
        </form>
        </div>
    </form>
</div>
</div>
</div>
<!--form end -->
</body>
</html>