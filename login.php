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
<div class="header">
  <div id="site_title"><a href="index.html"><img src="img/logo.png" alt=""></a></div>
  <!-- Dynamic Menu -->
  <ol id="menu" class="simple_menu simple_menu_css horizontal black_menu">
    <li><a href="index.html">Home</a></li>
    <li><a href="#">Our Services</a>
      <!-- sub menu -->
      <ol>
        <li><a href="Packeges.html">Packeges and Services</a></li>
        <li><a href="ReservationForm.html">Reservation Form</a></li>
        <li><a href="ReservationForm.html">Pre-Paid Plan</a></li>
      </ol>
      <!-- end sub menu -->
    <li><a href="gallery/gallery.html">Gallery</a></li>
    <li><a href="fullscreen-gallery.html">Contact Us</a></li>
    <li class="last"><a href="news.html">About Us</a></li>
  </ol>
  <div class="clr"></div>
  <!-- menu 2 -->
  <ol id="menu2" class="simple_menu simple_menu_css horizontal black_menu">
    <li><a href="gallery.html">Condolence Screen Message</a></li>
    <li><a href="gallery.html">Web Casting</a></li>
    <li><a href="gallery.html">Feed-Back</a></li>
  </ol>
  <div class="clr"></div>
</div>
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
                $cnameerr = "</br>* Customer Name is required";
                $error = TRUE;
            }else{
                $cname = $_POST['cusname'];
            }
            
          if(empty($_POST['deadname'])){ 
                $dnameerr = "</br>* Dead person Name is required";
                $error = TRUE;
            }else{
                $dname = $_POST['deadname'];
            }
            
            if(empty($_POST['connumber'])){ 
                $connumbererr = "</br>* Contact Number is required";
                $error = TRUE;
            }else{
                $connumber = $_POST['connumber'];
            }
            
            if(empty($_POST['email'])){ 
                $emailerr = "</br>* Email is required";
                $error = TRUE;
            }else{
                $email = $_POST['email'];
                if (strpos($email, '@') == FALSE) {
                    $emailerr =  "* Invalid Email";
                    $error = TRUE;
                }
            }
            
            if(empty($_POST['gender'])){ 
                $gendererr = "</br>* Gender is required";
                $error = TRUE;
            }else{
                $gender = $_POST['gender'];
            }
            
           
            if(empty($_POST['password'])){ 
                $passworderr = "</br>* Passowrd is required";
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
                $doberr = "</br>* Date of Birth is required";
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
                    
                <td> <input type="text" name="cusname" id="cusname"></td>
                
            </tr>
            <tr>
                
                    <td><label for="deadname">Dead Person Name</label><span class="error"><?php echo $dnameerr;?></span></td>
                    
                    <td><input type="text" name="deadname" id="deadname" ></td>
            
            </tr>
             <tr>
                
                   <td><label for="connumber">Contact Number</label><span class="error"><?php echo $connumbererr;?></span></td>
            
                   <td> <input type="text" name="connumber" id="connumber" ></td>
            
            </tr>
             <tr>
                
                    <td><label for="password">Password</label><span class="error"><?php echo $passworderr;?></span></td>
                   
                    <td><input type="password" name="password" id="password" ></td>
            </tr>
            <tr>
                
                    <td><label for="Password">Reenter Password</label><span class="error"><?php echo $repassworderr;?></span></td>
                   
                    <td><input type="password" name="repassword" id="repassword" ></td>
            </tr>
             <tr>
                
                 <td><label for="email">Email</label><span class="error"><?php echo $emailerr;?></span></td>
                    
                   <td><input type="email" name="email" id="email" ></td>
            </tr>
            <tr>
                <td><label>Gender</label><span class="error"><?php echo $gendererr;?></span></td>
                <td> <input type="radio" name="gender" value="male"><label>Male</label>
                    <input type="radio" name="gender" value="female"><label>Female</label>
                </td>
             </tr>
            <tr>
                
                 <td><label for="dob">DOB</label><span class="error"><?php echo $doberr;?></span></td>
                    
                   <td><input type="date" name="dob" id="dob" placeholder="yyyy-mm-dd"></td>
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
<div style="clear:both; height: 40px"></div>
<div id="footer">
  <div style="width:960px; margin: auto; padding-bottom: 30px">
    <div class="one-fourth">
      <h3>About us</h3>
      <ul style="font-family: Georgia, 'Times New Roman'; margin: 0 15px 0 0">
        <li style="border-bottom: 1px dotted #737a84; border-top: 1px dotted #737a84; padding: 3px 20px; letter-spacing: 2px"><a href="#" style="color:gray;">Who are we..</a></li>
        
        
      </ul>
    </div>
    <div class="one-fourth">
      <h3>Our services</h3>
      <ul style="font-family: Georgia, 'Times New Roman'; margin: 0 15px 0 0">
        <li style="border-bottom: 1px dotted #737a84; border-top: 1px dotted #737a84; padding: 3px 20px; letter-spacing: 2px"><a href="Packeges.html" style="color:gray;">Packages and services</a></li>
        <li style="border-bottom: 1px dotted #737a84; padding: 3px 20px; letter-spacing: 2px"><a href="ReservationForm.html" style="color:gray;">Reservation form</a></li>
        <li style="border-bottom: 1px dotted #737a84; padding: 3px 20px; letter-spacing: 2px"><a href="Pre-paid plan.html" style="color:gray;">Pre-paid plan</a></li>
      </ul>
    </div>
    <div class="one-fourth">
      <h3>Contact us</h3>
      <ul style="font-family:;, 'Times New Roman'; margin: 0 15px 0 0">
        <li style="border-bottom: 1px dotted #737a84; border-top: 1px dotted #737a84; padding: 3px 20px; letter-spacing: 2px"><a href="#" style="color:gray;">+94112686981</a></li>
        <li style="border-bottom: 1px dotted #737a84; padding: 3px 20px; letter-spacing: 2px"><a  href="#" style="color:gray;">+94112686999</a></li>
        
      </ul>
    </div>
    <div class="one-fourth last">
      <h3>Socialize</h3>
      <img src="img/icon_fb.png" alt=""> <img src="img/icon_twitter.png" alt=""> <img src="img/icon_in.png" alt=""> </div>
    <div style="clear:both"></div>
  </div>
</div>
<div id="shadow"></div>
</body>
</html>