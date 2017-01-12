<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="css/adminsingup.css">
    <style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
.w3-sidenav a,.w3-sidenav h4 {font-weight:bold}
</style>
</head>
<body>
<div class="reg_container" align="center">
<div class="reg_container1" align="center">
    <?php
    require "dbcon/dbcon.php";
    
    $error=FALSE;
        $fnameerr = $lnameerr = $employeeiderr = $nicerr = $emailerr = $addresserr = $hnumbererr = $mnumbererr =$temppassworderr= $passworderr =$repassworderr = $gendererr = $doberr = "";
    if (isset($_POST['submit'])) {
        
        
            
            
            if(empty($_POST['fname'])){ 
                $fnameerr = "* ";
                $error = TRUE;
            }else{
                $fname = $_POST['fname'];
            }
            
          if(empty($_POST['lname'])){ 
                $lnameerr = "</br>* ";
                $error = TRUE;
            }else{
                $lname = $_POST['lname'];
            }
            
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

            if(empty($_POST['nic'])){ 
                $nicerr = "</br>* ";
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

            
            
            if(empty($_POST['gender'])){ 
                $gendererr = "</br>* ";
                $error = TRUE;
            }else{
                $gender = $_POST['gender'];
            }
            
            if(empty($_POST['temppassword'])){ 
                $temppassworderr = "</br>* ";
                $error = TRUE;
            }else{
                $temppassword = $_POST['temppassword'];
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
           
            $sql = "UPDATE employee SET fname='$fname',lname='$lname', email='$email',address='$address',nic='$nic',hnumber='$hnumber', mnumber='$mnumber', password='$password',repassword='$repassword',gender='$gender', dob='$dob'WHERE employeeid='$employeeid' AND temppassword='$temppassword'";
            if(mysqli_query($conn,$sql)){
                header('location:index.php');
                die();
            } else{echo "error";}
             
            }
        }
    
    ?>


    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
    <div id="asignup" align="center">
        <form id="aform2" action="adminsignup.php" method="post">
        <table id="atable2">
            <tr>
                <td colspan="2">
                    <h1 id="aheading" align="center"><b style="color:white; font-size:24px; text-shadow:2px 2px 2px gray;">REGISTRATION FORM</b></h1>
                </td>
            
            </tr>
            <tr>
                
                  <td><label for="fname">First Name</label><span class="error"><?php echo $fnameerr;?></span></td>
                    
                <td> <input type="text" name="fname" id="fname" required></td>
                
            </tr>
            <tr>
                
                    <td><label for="lname">Last Name</label><span class="error"><?php echo $lnameerr;?></span></td>
                    
                    <td><input type="text" name="lname" id="lname" required></td>
            
            </tr>
             <tr>
                
                   <td><label for="employeeid">Employee ID</label><span class="error"><?php echo $employeeiderr;?></span></td>
            
                   <td> <input type="text" name="employeeid" id="employeeid" required></td>
            
            </tr>
            <tr>
                
                    <td><label for="nic">NIC</label><span class="error"><?php echo $nicerr;?></span></td>
                    
                    <td><input type="text" name="nic" id="nic" required></td>
            
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
                
                <td><label for="temppassword">Temporary Password </label><span class="error"><?php echo $temppassworderr;?></span></td>
                   
                    <td><input type="password" name="temppassword" id="temppassword" required></td>
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
                <td><label>Gender</label></td>
                <td style="display: inline; color:gray;"> <input type="radio" name="gender" value="male" required>Male
                <input type="radio" name="gender" value="female">Female
                    
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

                    <input class="year" type=text name=year size=4 value="" pattern="^\d{4}$" maxlength="4" max="4" placeholder="year">
                </td>
            </tr>
             <tr>
                <td colspan="2" align="right">
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
<!--form end -->
</body>
</html>