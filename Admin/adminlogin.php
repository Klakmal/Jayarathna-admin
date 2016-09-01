<html>
<head>
    <title>Login</title>
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
                    header('location:home.php');
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
			<form id="f1" action="adminlogin.php" method="post">
                <table id="tb1">
                <tr>
                    <th colspan="2" font-size:28px; color: white;><b>LOGIN</b></th> 
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
                   <tr> <td colspan="2" align="center"><input type="submit" value="Login" name="send"></td>
                </tr>
            
            
                </table> 
			</form>	
	</div>
    </div>
    
</body>
</html>