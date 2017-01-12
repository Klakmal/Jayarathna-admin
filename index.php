<html>
<head>
    <title>Login</title>
<!--    <link rel="stylesheet" type="text/css" href="css/adminlogin.css">-->
    <style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
.w3-sidenav a,.w3-sidenav h4 {font-weight:bold}
        
body{
    background-image: url(img/background.jpg);
    background-size: cover;
}

#login1{
	margin-top: 50px;
}

#login2{
	background-color: ;
	margin-top: 5%;
	width: 425px;
	height: 425px;
	padding-top: 50px;
	border-radius: 20px;
	border: 1px solid white;
	-webkit-box-shadow: 0px 0px 10px 1px rgba(255,255,255,1);
    -moz-box-shadow: 0px 0px 10px 1px rgba(255,255,255,1);
    box-shadow: 0px 0px 10px 1px rgba(255,255,255,1);
}

input[type=text],[type=password]{
	width: 275px;
	height: 30px;
	margin: 5px;
	border-radius: 10px;
	background-color: #f8f8f8;
	border:1px solid white;
	padding-left: 5px;
    text-align: center;
}

input[type=submit] {
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
	padding:7px 65px;
	text-decoration:none;
	text-shadow:2px 2px 1px #3d768a;
}
input[type=submit]:hover {
	background-color:#408c99;
}
input[type=submit]:active {
	position:relative;
	top:1px;
}

label{
	color: gray;
}

.error{
	color: red;
	font-size: 12px;
}
</style>
</head>
<body>
    <?php
     require "dbcon/dbcon.php";
          $error= "" ;
        session_start();
        if(isset($_POST['send'])){
            
            $empid = $_POST['empid'];
            $pwd = $_POST['pwd'];
       if($empid != '' and $pwd != ''){
            
                $query = mysqli_query($conn,"SELECT * FROM employee WHERE employeeid='".$empid."' AND password='".$pwd."' ") or die("There is an error");
                $res = mysqli_fetch_array($query);
                if(!empty($res['employeeid']) && !empty($res['password'])){
                    
                    $_SESSION['employeeid']=$empid;
                    $position = $res['position'];
                    
                    switch($position){
                        case "manager":
                            header('location:manager/indexmanager.php');
                            break;
                        case "receptionist":
                            header('location:receptionist/indexreceptionist.php');
                            break;
                        case "itoperator":
                            header('location:itoperator/indexitoperator.php');
                            break;
                        case "admin":
                            header('location:admin/indexadmin.php');
                                break;
                        case "stockkeeper":
                            header('location:stockkeeper/indexstockkeeper.php');
                                break;
                        default:
                            header('location:#');
                            
                    }
                    
                  
                }else{
                    $error = "Invaild UserID or Password";
                }
                
            }else{
                $error = "Please Enter UserID and Password ";
            }
            
        }
        
            
     ?>

    <div id="login1" align = "center">
	<div id="login2" align = "center">
			<form id="f1" action="index.php" method="post">
                <table id="tb1">
                <tr>
                    <th><span><img src="img/logo.png"></span><br><p>Jayaratna Funeral Directors (Pvt) Ltd.</p><br></th> 
                </tr>
                <tr>
                    <th align="left"><b>LOGIN</b></th> 
                </tr>
                    <tr><td><span class="error"><?php echo $error ?></span></td></tr>
                <tr>
               <!--     <td><label for="employeeid">Employee ID</label></td>-->
                    <td align="center"><input type="text" name="empid"  placeholder="Employee ID"></td>
                </tr>
                <tr>
              <!--      <td><label for="password">Password</label></td>     -->
                    <td align="center"><input type="password" name="pwd"  placeholder="Password"></td>
                
                </tr>
                   <tr> <td align="center"><input type="submit" value="Login" name="send"><hr></td>
                </tr>
            
            
                </table> 
			</form>	
        <a href ="adminsignup.php" style="text-decoration: none;">Create an account</a>
	</div>
    </div>
    
</body>
</html>