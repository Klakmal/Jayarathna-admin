<html>
<head>
    <title>Sign Up</title>
<!--    <link rel="stylesheet" type="text/css" href="css/adminsingup.css">-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
    <style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
.w3-sidenav a,.w3-sidenav h4 {font-weight:bold}
body{
    background-image: url(img/background.jpg);
    background-size: cover;
    background-color: #5fab9f;
}

.reg_container{
	margin-top: 30px;
}

.reg_container1{
/*	background-color: ;
	margin-top: 5%;
	width: 700px;
	height: 425px;
	padding-top: 30px;
	border-radius: 20px;
	border: 1px solid white;
	-webkit-box-shadow: 0px 0px 10px 1px rgba(255,255,255,1);
    -moz-box-shadow: 0px 0px 10px 1px rgba(255,255,255,1);
    box-shadow: 0px 0px 10px 1px rgba(255,255,255,1);*/
}

input[type=text],[type=password],[type=email]{
	width: 275px;
	height: 30px;
	margin: 0px 20px 10px 20px;
	border-radius: 10px;
	background-color: #f8f8f8;
	border:1px solid gray;
	padding-left: 5px;
}

input[type=radio]{
    width: 15px;
	height: 15px;
	border-radius: 10px;
	background-color: #f8f8f8;
	border:1px solid gray;
	padding-left: 5px;
    margin: 0px 20px;
}

input[type=submit],[type=reset] {
	background-color:#599bb3;
	-moz-border-radius:8px;
	-webkit-border-radius:8px;
	border-radius:8px;
	border:1px solid #93b5cc;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:13px;
	font-weight:bold;
	padding:7px 35px;
	text-decoration:none;
	text-shadow:2px 2px 1px #3d768a;
    margin-right: 20px;
}
input[type=submit]:hover {
	background-color:#408c99;
}
input[type=submit]:active {
	position:relative;
	top:1px;
}

        label{
            margin: auto 20px;
        }
.error{
	color: red;
	font-size: 12px;
}
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
        

            $imagename=$_FILES["myimage"]["name"]; 
            //Get the content of the image and then add slashes to it 
            $imagetmp=addslashes (file_get_contents($_FILES['myimage']['tmp_name']));
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

            if(empty($_POST['dob'])){ 
                $doberr = "</br>* ";
                $error = TRUE;
            }else{
                $dob = $_POST['dob'];
            }

             if ($error==FALSE){
           
            $sql = "UPDATE employee SET fname='$fname',lname='$lname', email='$email',address='$address',nic='$nic',hnumber='$hnumber', mnumber='$mnumber', password='$password',repassword='$repassword',gender='$gender', dob='$dob', image_name='$imagename', image='$imagetmp' WHERE employeeid='$employeeid' AND temppassword='$temppassword'";
            if(mysqli_query($conn,$sql)){
                header('location:index.php');
                die();
            } else{echo "error";}
             
            }
        }
    
    ?>


    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">
    <div id="asignup" align="center">
        <form id="aform2" action="adminsignup.php" method="post" enctype="multipart/form-data">
        <table id="atable2">
            <tr>
                <td colspan="2">
                    <h1 id="aheading" align="center"><b>REGISTRATION FORM</b></h1>
                </td>
            
            </tr>
            <tr>
                
                   <td><label for="employeeid">Employee ID</label><span class="error"><?php echo $employeeiderr;?></span></td>
                   <td><label for="temppassword">Temporary Password </label><span class="error"><?php echo $temppassworderr;?></span></td>
                   
            
            </tr>
            <tr>
                
                   <td> <input type="text" name="employeeid" id="employeeid" required></td>
                   <td><input type="password" name="temppassword" id="temppassword" required></td>
                
            </tr>
            <tr>
                
                  <td><label for="fname">First Name</label><span class="error"><?php echo $fnameerr;?></span></td>
                  <td><label for="lname">Last Name</label><span class="error"><?php echo $lnameerr;?></span></td>
                
            </tr>
            <tr>
                
                    
                    <td><input type="text" name="fname" id="fname" required></td>
                    <td><input type="text" name="lname" id="lname" required></td>
            
            </tr>
            <tr>
                
                    <td><label for="hnumber">Home Phone No.</label><span class="error"><?php echo $hnumbererr;?></span></td>
                    <td><label for="mnumber">Mobile Phone No.</label><span class="error"><?php echo $mnumbererr;?></span></td>
                    
            
            </tr>
            <tr>
                
                    
                    <td><input type="text" name="hnumber" id="hnumber" required></td>
                    <td><input type="text" name="mnumber" id="mnumber" required></td>
            
            </tr>
            <tr>
                
                    <td><label for="nic">NIC</label><span class="error"><?php echo $nicerr;?></span></td>
                    <td><label for="address">Address</label><span class="error"><?php echo $addresserr;?></span></td>
                    
            
            </tr>
            <tr>
                
                    
                    <td><input type="text" name="nic" id="nic" required></td>
                    <td><input type="text" name="address" id="address" required></td>
            
            </tr>
             <tr>
                
                    <td><label for="password">Password</label></td>
                    <td><label for="Password">ReEnter Password</label></td>
                    
            </tr>
            <tr>
                
                    <td><input type="password" name="password" id="password" placeholder="<?php echo $passworderr;?>" required><span class="error"><?php echo $passworderr;?></span></td>
                    <td><input type="password" name="repassword" id="repassword" placeholder="<?php echo $repassworderr;?>" required></td>
            </tr>
            <tr>
                
                   <td><label for="email">Email</label><span class="error"><?php echo $emailerr;?></span></td>
                   <td><label for="dob">DOB</label><span class="error"></span></td>
                
                
            </tr>
            
<!--            <tr>
                
                 <td><label for="dob">DOB</label><span class="error"><?php echo $doberr;?></span></td>
                    
                   <td><input type="date" name="dob" id="dob" placeholder="yyyy-mm-dd" required></td>
            </tr>-->
            <tr>
                    <td><input type="email" name="email" id="email" required></td>
                    <td  align=left  ><input type=text name=dob id="datepicker" placeholder="mm/dd/yyyy"></td>
            </tr>
            <tr>
                <td><label>Gender</label></td>
                <td></td>
            </tr>
            <tr>
                <td style="display: inline;"> <input type="radio" name="gender" value="male" required>Male
                <input type="radio" name="gender" value="female">Female
                </td>
                <td>
                <input type="file" name="myimage">
                </td>
            </tr>
             <tr>
                <td colspan="2" align="right">
                    <input type="submit" value="Upload" name="submit">
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