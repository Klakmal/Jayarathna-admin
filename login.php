<html>
<head>
    <title>login</title>
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/menu/simple_menu.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/signup.css">
</head>
<body>
    <?php
     require "dbcon/dbcon.php";
          $error= "" ;
        
        if(isset($_POST['send'])){
            
            $mail = $_POST['mail'];
            $pwd = $_POST['pwd'];
       if($mail != '' and $pwd != ''){
            
                $query = mysqli_query($conn,"SELECT * FROM customers WHERE email='".$mail."' AND password='".$pwd."' ") or die("There is an error");
                $res = mysqli_fetch_array($query);
                if(!empty($res['email']) && !empty($res['password'])){
                    session_start();
                    $_SESSION['email']=$mail;
                    header('location:form.html');
                }else{
                    $error = "Invaild username or password";
                }
                
            }else{
                $error = "Please Enter Username and Password ";
            }
            
        }
        
            
     ?>

<!--header-->
<?php include 'temp/loginfooter.php'; ?>
<!--header end-->
    
    <div id="login" align = "center">
	<div id="log1" align = "center">
			<form id="f1" action="login.php" method="post">
                <table id="tb1">
                <tr>
                    <th colspan="2" style="font-family:fantasy; font-size:28px; color: white;">Login</th> 
                </tr>
                    <tr><td colspan="2"><span class="error"><?php echo $error ?></span></td></tr>
                <tr>
                    <td><label for="email">Email</label></td>
                    <td><input type="email" name="mail"  placeholder="Email Address"></td>
                </tr>
                <tr>
                    <td><label for="password">Password</label></td>
                    <td><input type="password" name="pwd"  placeholder="Password"></td>
                
                </tr>
                   <tr> <td colspan="2" align="center"><input type="submit" value="Login" name="send"></td>
                </tr>
            
            
                </table> 
			</form>	
	</div>
    </div>
    

<!--form -->
    <?php
    require "dbcon/dbcon.php";

    $error=FALSE;
        $cnameerr = $dnameerr = $connumbererr = $passworderr = $repassworderr = $emailerr = $gendererr = $doberr = "";
        
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
           
            $sql = "INSERT INTO customers (cusname,deadname,connumber,password,repassword,email,gender,dob) VALUES ('".$cname."','".$dname."','".$connumber."','".$password."','".$repassword."','".$email."','".$gender."','".$dob."')";
            if(mysqli_query($conn,$sql)){
                die();
            } else{echo "error";}
             
            }
        }
    ?>
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
    <div id="signup" align="center">
        <form id="f2" action="login.php" method="post">
        <table id="tb2">
            <tr>
                <td colspan="2">
                    <h2 id="heading2" style = "color:white;">Registration Form</h2>
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
                
                   <td><label for="connumber">Contact Number</label><span class="error"><?php echo $connumbererr;?></span></td>
            
                   <td> <input type="text" name="connumber" id="connumber" required></td>
            
            </tr>
             <tr>
                
                    <td><label for="password">Password</label><span class="error"><?php echo $passworderr;?></span></td>
                   
                    <td><input type="password" name="password" id="password" required></td>
            </tr>
            <tr>
                
                    <td><label for="Password">Reenter Password</label><span class="error"><?php echo $repassworderr;?></span></td>
                   
                    <td><input type="password" name="repassword" id="repassword" required></td>
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
            <tr>
                
                 <td><label for="dob">DOB</label><span class="error"><?php echo $doberr;?></span></td>
                    
                   <td><input type="date" name="dob" id="dob" placeholder="yyyy-mm-dd" required></td>
            </tr>

             <tr>
                <td colspan="2">
                    <input type="submit" value="Sign Up" name="submit">
                    <input type="reset" value="Reset" name="cancle">
                </td>
            
            </tr>
        </table>
        </form>
        </div>
    </form>
<!--form end -->
<!--footer -->
<?php include 'temp/footer.php';  ?>
</body>
</html>