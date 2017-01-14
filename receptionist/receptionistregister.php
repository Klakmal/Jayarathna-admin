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
    <a href="indexreceptionist.php" class="navi"><img src="../img/home.png" class="image">&nbsp;&nbsp;HOME</a>
   <a href="receptionistregister.php" class="navi"><img src="../img/account.png" class="image">&nbsp;&nbsp;REGISTRATION</a>
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

<div class="conner1" align="center">
            <div class="conner2" align="center">
    <?php
    require "../dbcon/dbcon.php";

    $error=FALSE;
        $cnameerr = $dnameerr = $connumbererr = $emailerr = $gendererr = $doberr = $nicerr= $addresserr ="";
        
        if (isset($_POST['submit'])) {
            
            
            if(empty($_POST['cusname'])){ 
                $cnameerr = "* ";
                $error = TRUE;
            }else{
                $cname = $_POST['cusname'];
            }
            
          if(empty($_POST['deadname'])){ 
                $dnameerr = "</br>* ";
                $error = TRUE;
            }else{
                $dname = $_POST['deadname'];
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
            
           
            
 /*           if(empty($_POST['dob'])){ 
                $doberr = "</br>* ";
                $error = TRUE;
            }else{
                $dob = $_POST['dob'];
            }
            */



$month=$_POST['month'];
$dt=$_POST['dt'];
$year=$_POST['year'];
$dob="$year-$month-$dt";

             if ($error==FALSE){
           
            $sql = "INSERT INTO customers (cusname,deadname,nic,address,connumber,email,gender,dob) VALUES ('".$cname."','".$dname."','".$nic."','".$address."','".$connumber."','".$email."','".$gender."','".$dob."')";
            if(mysqli_query($conn,$sql)){
                die();
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
                
                    <td><label for="deadname">Dead Person Name</label><span class="error"><?php echo $dnameerr;?></span></td>
                    
                    <td><input type="text" name="deadname" id="deadname" required></td>
            
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
            <tr><td><label for="dob">DOB</label><span class="error"></span></td><td  align=left  >   

<select name=month value=''>Select Month</option>
<option value='01'>January</option>
<option value='02'>February</option>
<option value='03'>March</option>
<option value='04'>April</option>
<option value='05'>May</option>
<option value='06'>June</option>
<option value='07'>July</option>
<option value='08'>August</option>
<option value='09'>September</option>
<option value='10'>October</option>
<option value='11'>November</option>
<option value='12'>December</option>
</select>



   

<select name=dt >

<option value='01'>01</option>
<option value='02'>02</option>
<option value='03'>03</option>
<option value='04'>04</option>
<option value='05'>05</option>
<option value='06'>06</option>
<option value='07'>07</option>
<option value='08'>08</option>
<option value='09'>09</option>
<option value='10'>10</option>
<option value='11'>11</option>
<option value='12'>12</option>
<option value='13'>13</option>
<option value='14'>14</option>
<option value='15'>15</option>
<option value='16'>16</option>
<option value='17'>17</option>
<option value='18'>18</option>
<option value='19'>19</option>
<option value='20'>20</option>
<option value='21'>21</option>
<option value='22'>22</option>
<option value='23'>23</option>
<option value='24'>24</option>
<option value='25'>25</option>
<option value='26'>26</option>
<option value='27'>27</option>
<option value='28'>28</option>
<option value='29'>29</option>
<option value='30'>30</option>
<option value='31'>31</option>
</select>

<input class="year" type=year name=year size=4 value="" pattern="^\d{4}$" maxlength="4" max="4" placeholder="year">
</td>
</tr>
             <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Sign Up" name="submit">
                    <input type="reset" value="Reset" name="cancle">
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