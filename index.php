<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/adminlogin.css">
    <style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
.w3-sidenav a,.w3-sidenav h4 {font-weight:bold}
</style>
</head>
<body>
    <?php
     require "dbcon/dbcon.php";
          $error= "" ;
        
        if(isset($_POST['send'])){
            
            $empid = $_POST['empid'];
            $pwd = $_POST['pwd'];
       if($empid != '' and $pwd != ''){
            
                $query = mysqli_query($conn,"SELECT * FROM employee WHERE employeeid='".$empid."' AND password='".$pwd."' ") or die("There is an error");
                $res = mysqli_fetch_array($query);
                if(!empty($res['employeeid']) && !empty($res['password'])){
                    session_start();
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
                    <th colspan="2" align="left"><b style="color:white; font-size:24px; text-shadow:2px 2px 2px gray;">LOGIN</b></th> 
                </tr>
                    <tr><td colspan="2"><span class="error"><?php echo $error ?></span></td></tr>
                <tr>
                    <td><label for="employeeid">Employee ID</label></td>
                    <td><input type="text" name="empid"  placeholder="Employee ID"></td>
                </tr>
                <tr>
                    <td><label for="password">Password</label></td>
                    <td><input type="password" name="pwd"  placeholder="Password"></td>
                
                </tr>
                   <tr> <td colspan="2" align="right"><input type="submit" value="Login" name="send"></td>
                </tr>
            
            
                </table> 
			</form>	
        <a href ="adminsignup.php">Create an account</a>
	</div>
    </div>
    
</body>
</html>