<html>
<head>
    <title>login</title>
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/menu/simple_menu.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/signup.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <style type="text/css">
        #correctname,#nic_status,#length_error,#notmatch,#check4n,#dateerror,#gnderr,#nic_status,#email_status{
            color: red;
            font-size: 14px;
        }
    </style>
    <script>
        $( function() {
        $( "#datepicker" ).datepicker();
        $( "#datepicker1" ).datepicker();
        $( "input" ).checkboxradio();
        } );
        function allletters(){
        	document.getElementById("correctname").innerHTML = "";
        	var text1 = document.getElementById("cusname");
        	var letters = /^[A-Za-z]+$/;
        	if(text1.value.match(letters))  
		    {  
		      	return true;  
		    }  
		    else  
		    {  
		     	document.getElementById("correctname").innerHTML = "please Enter correct name";
		     	return false;
		    }  
        }
        function checknic(){
            var nic = document.getElementById("nic").value;
            var val = /^[0-9]{9}[vVxX]$/;
            if (nic){
                if (nic.match(val)) {
                    $.ajax({
                          type: 'post',
                          url: 'checkNIC.php',
                          data: {
                          user_nic:nic
                          },
                          success: function (response) {
                           $( '#nic_status' ).html(response);
                               if(response=="OK")   
                               {
                                    return response;    
                               }
                               else
                               {
                                    return response;   
                               }
                          }
                    });
                }else{
                    document.getElementById("nic_status").innerHTML = "Invaild NIC";
                    return false;
                }
            }
        }
        function mypassword(){
        	var str = document.getElementById("password");
        	var x = str.value.length;
        	if (x==0) {
        		document.getElementById("length_error").innerHTML = "";
        	}else if (x<8) {
        		document.getElementById("length_error").innerHTML = "Too Short";
        	}else{
        		document.getElementById("length_error").innerHTML = "";
        	}
        }

        function repassword1(){
        	var pass = document.getElementById("password");
        	var repass = document.getElementById("repassword");
            if (pass.value != "" && repass.value != ""){
                if (pass.value == repass.value) {
                    document.getElementById("notmatch").innerHTML = "Password Matched";
                    return true;
                }else{
                    document.getElementById("notmatch").innerHTML = "Password not Match";
                    return false;
                }
            }else{
            document.getElementById("notmatch").innerHTML = "";
            }
        }

        function checkPhone() {
            var connumber = document.getElementById("connumber").value;
            connumber = connumber.replace(/-/g, "");
            connumber = connumber.replace(/ /g, "");
            document.getElementById("check4n").innerHTML = connumber;
            var phoneno = /^[0][0-9]{9}$/;
            if (connumber != "") {
                if(connumber.match(phoneno)) {
                	document.getElementById("check4n").innerHTML = "";
                    return true;
                }
                else {
                    document.getElementById("check4n").innerHTML = "Invaild Phone Number";
                    return false;
                }
            }else{
                document.getElementById("check4n").innerHTML = " ";
            }
        }

        function finalresult(){
            document.getElementById("nic_status").innerHTML = "";
            document.getElementById("dateerror").innerHTML = "";
            document.getElementById("gnderr").innerHTML = "";
        	var nicno = document.getElementById("nic").value;
        	var res = nicno.substring(0,2);
        	
        	var bdate = document.getElementById("datepicker").value;
        	var res1 = bdate.substring(bdate.length-2,bdate.length);
        	
        	var gr = document.getElementById("get").value;
        	var gender;
        	if (document.getElementById('m').checked) {
			  	gender = document.getElementById('m').value;
			}else if (document.getElementById('f').checked) {
				gender = document.getElementById('f').value;
			}
			var mf = nicno.substring(5,10);
			var mfnum = parseInt(mf);
			
			var mof;
			if (mfnum < 500) {
				mof = "male";
			}else {
				mof = "female";
			}

			if ( mof == gender && res == res1){
				document.getElementById("nic_status").innerHTML = "ok";
				document.getElementById("dateerror").innerHTML = "ok";
				document.getElementById("gnderr").innerHTML = "ok";
				return true;
			}else {
				document.getElementById("nic_status").innerHTML = "Invaild";
				document.getElementById("dateerror").innerHTML = "Deos not match";
				document.getElementById("gnderr").innerHTML = "Deos not match";
				return false;
			}

        }
        function validation(){
            var nicno = document.getElementById("nic").value;
            var nicyear = nicno.substring(0,2);
            var days = nicno.substring(2,5);
            var gr = document.getElementById("get").value;
            var gender;
            var mfnum = parseInt(nicno.substring(2,5));
            var mof;
            var bday = document.getElementById("datepicker").value;
            var bday_year = bday.substring(bday.length-2,bday.length);
            var birtharray = bday.split("/");
            var year = parseInt(birtharray[2]);
            var day = parseInt(birtharray[1]);
            var month = parseInt(birtharray[0]);

            if (document.getElementById('m').checked) {
                gender = document.getElementById('m').value;
            }else if (document.getElementById('f').checked) {
                gender = document.getElementById('f').value;
            }
            
            if (0 < mfnum && mfnum < 367) {
                document.getElementById("nic_status").innerHTML = "";
                mof = "male";
            }else if (500 < mfnum && mfnum < 867) {
                document.getElementById("nic_status").innerHTML = "";
                mof = "female";
                mfnum = mfnum - 500;
            }else {
                document.getElementById("nic_status").innerHTML = "Invalid NIC";
                return false;
            }
            if (mof != gender){
                document.getElementById("dateerror").innerHTML = "Gender does not Match";
                return false;
            }
            if (mof == gender && bday_year == nicyear && countdays(year,month,day,mfnum)) {
                document.getElementById("gnderr").innerHTML = "OK";
                document.getElementById("dateerror").innerHTML = "OK";
                document.getElementById("nic_status").innerHTML = "OK";
            }else{
                document.getElementById("gnderr").innerHTML = "Gender does not Match";
                document.getElementById("dateerror").innerHTML = "Date does not Match";
                document.getElementById("nic_status").innerHTML = "Invalid NIC";
                return false;
            }
        }

        function countdays(year,month,day,days) {
            var count = 1;
            for (i = 1; i<month+1; i++){
                if (i == 2) {
                    count = count + 31;
                }
                if (i == 3) {
                    if (year%4 == 0){
                        count = count + 29-1;
                    }else{
                        count = count + 28;
                    } 
                }
                if (i == 4 ) {
                    count = count + 31;
                }
                if (i == 5) {
                    count = count + 30;
                }
                if (i == 6) {
                    count = count + 31;
                }
                if (i == 7) {
                    count = count + 30;
                }
                if (i == 8) {
                    count = count + 31;
                }
                if (i == 9) {
                    count = count + 31;
                }
                if (i == 10) {
                    count = count + 30;
                }
                if (i == 11) {
                    count = count + 31;
                }
                if (i == 12) {
                    count = count + 30;
                }
                if (month == i){
                    count = count + day;
                }
            }
            if (days == count){
                return true;
            }else {
                return false;
            }
        }


        function validatedate()  
          {  
          var inputText = document.getElementById("datepicker"); 
          var dateformat = /^(0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])[\/\-]\d{4}$/;  
          
          if(inputText.value.match(dateformat))  
              {
                  document.getElementById("dateerror").innerHTML = inputText;
                  var opera1 = inputText.value.split('/');  
                  var opera2 = inputText.value.split('-');  
                  lopera1 = opera1.length;
                  lopera2 = opera2.length;
                  if (lopera1>1)  
                  {  
                    var pdate = inputText.value.split('/');  
                  }  
                    else if (lopera2>1)  
                  {  
                  var pdate = inputText.value.split('-');  
                  }  
                  var mm  = parseInt(pdate[0]);  
                  var dd = parseInt(pdate[1]);  
                  var yy = parseInt(pdate[2]);  
                  var ListofDays = [31,28,31,30,31,30,31,31,30,31,30,31];  
                  var ListofDays1 = [31,29,31,30,31,30,31,31,30,31,30,31];
                  var d = new Date();
                  var n = d.getFullYear();

                    if (1900 < yy && yy < n-15) {
                        if (yy%4==0){
                            if (0 < mm && mm < 13) {
                                if (0 < dd && dd < (ListofDays1[mm-1]+1) ) {
                                    document.getElementById("dateerror").innerHTML = "";
                                    return true;
                                }else{
                                    document.getElementById("dateerror").innerHTML = "Day is not match";
                                    return false;
                                }
                            }else{
                                document.getElementById("dateerror").innerHTML = "Invalid Date input";
                            }
                        }else {
                            if (0 < mm && mm < 13) {
                                if (0 < dd && dd < (ListofDays[mm-1]+1) ) {
                                    document.getElementById("dateerror").innerHTML = "OK";
                                    return true;
                                }else{
                                    document.getElementById("dateerror").innerHTML = "Day is not match";
                                    return false;
                                }
                            }else{
                                document.getElementById("dateerror").innerHTML = "Invalid Date input";
                                return false;
                            }
                        }
                    }else{
                        document.getElementById("dateerror").innerHTML = "Invalid Date input";
                        return false;
                    }
              }else{  
                      document.getElementById("dateerror").innerHTML = "Invalid Date input";
                      return false;  
                  }  
        }

        function checkemail()
        {
             var email=document.getElementById( "email" ).value;
             if(email)
             {
                  $.ajax({
                      type: 'post',
                      url: 'checkEmail.php',
                      data: {
                      user_email:email
                    },
                  success: function (data) {
                       $( '#email_status' ).html(data);
                       if(data=="OK")   
                       {
                            return data;    
                       }
                       else
                       {
                            return data;   
                       }
                      }
                  });
             }
             else
             {
                $( '#email_status' ).html("Enter Email Address");
             }
        }
    </script>
</head>
<body>
    <?php
     require "dbcon/dbcon.php";
          $error= "" ;
        
        if(isset($_POST['send'])){
            
            $mail = $_POST['mail'];
            $pwd = $_POST['pwd'];
       if($mail != '' and $pwd != ''){
           if($mail=="admin@admin.com" && $pwd=="admin"){
                        header('location:Admin/adminsignup.php');
                    }
            
                $query = mysqli_query($conn,"SELECT * FROM customers WHERE email='".$mail."' AND password='".$pwd."' ") or die("There is an error");
                $res = mysqli_fetch_array($query);
                if(!empty($res['email']) && !empty($res['password'])){
                    session_start();
                    $_SESSION['email']=$mail;
                    header('location:reservationForm.php');
                }else{
                    $error = "Invaild username or password";
                }
                
            }else{
                $error = "Please Enter Username and Password ";
            }
            
        }
        
            
     ?>

<!--header-->
<?php include 'temp/header.php'; ?>
<!--header end-->
    
    <div id="login" align = "center">
	<div id="log1" align = "center">
			<form id="f1" action="login.php" method="post">
                <table id="tb1">
                <tr>
                    <th colspan="2" style="font-family:myfont1; font-size:28px; color: white;"><b>LOGIN</b></th> 
                </tr>
                    <tr><td colspan="2"><span class="error"><?php echo $error ?></span></td></tr>
                <tr>
                    <td><label for="email">Email</label></td>
                    <td><input type="email" name="mail"  placeholder="Email Address"></td>
                </tr>
                <tr>
                <td colspan="2"><p id = ""></p></td>
                </tr>
                <tr>
                    <td><label for="password">Password</label></td>
                    <td><input type="password" name="pwd"  placeholder="Password"></td>
                
                </tr>
                <tr>
                <td colspan="2"><p id = ""></p></td>
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
        $cnameerr = $dnameerr = $connumbererr = $passworderr = $repassworderr = $emailerr = $gendererr = $doberr = $nicerr= $addresserr ="";
        
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
           
            $sql = "INSERT INTO customers (cusname,deadname,nic,address,connumber,password,repassword,email,gender,dob) VALUES ('".$cname."','".$dname."','".$nic."','".$address."','".$connumber."','".$password."','".$repassword."','".$email."','".$gender."','".$dob."')";
            if(mysqli_query($conn,$sql)){
                die();
            } else{echo "error";}
             
            }
        }
    ?>

    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" onsubmit="return(validation())">
    <div id="signup" align="center">
        <form id="f2" action="login.php" method="post" onsubmit="return(validation())">
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
                <td colspan="2"><p id = ""><span id="correctname"></span></p></td>
            </tr>
            <tr>
                
                    <td><label for="deadname">Dead Person Name</label><span class="error"><?php echo $dnameerr;?></span></td>
                    
                    <td><input type="text" name="deadname" id="deadname" required></td>
            
            </tr>
            <tr>
                <td colspan="2"><p id = ""></p></td>
            </tr>
            <tr>
                
                    <td><label for="nic" >NIC</label><span class="error"><?php echo $nicerr;?></span></td>
                    
                    <td><input type="text" name="nic" id="nic" maxlength="10" minlength="10" onblur="checknic()" required></td>
            
            </tr>
            <tr>
                <td colspan="2"><p id = ""><span id="nic_status"></span></p></td>
            </tr>
             <tr>
                
                   <td><label for="connumber">Contact Number</label></td>
            
                   <td> <input type="tel" name="connumber" id="connumber" onblur="checkPhone()" required><span class="error"></span></td>
                    <td></td>
            </tr>
            <tr>
                <td colspan="2"><p id = ""><span id="check4n"></span></p></td>
            </tr>
            <tr>
                
                    <td><label for="address">Address</label><span class="error"><?php echo $addresserr;?></span></td>
                    
                    <td><input type="text" name="address" id="address" required></td>
            
            </tr>
            <tr>
                <td colspan="2"><p id = ""></p></td>
            </tr>
             <tr>
                
                    <td><label for="password">Password</label></td>
                   
                    <td><input type="password" name="password" id="password" placeholder="<?php echo $passworderr;?>" onkeydown="mypassword()" required><span class="error"><?php echo $passworderr;?></span></td>
                    
            </tr>
            <tr>
                <td colspan="2"><p id = ""><span id="length_error"></span></p></td>
            </tr>
            <tr>
                
                    <td><label for="Password">Reenter Password</label></td>
                   
                    <td><input type="password" name="repassword" id="repassword" placeholder="<?php echo $repassworderr;?>" onblur="repassword1()" required></td>
            </tr>
            <tr>
                <td colspan="2"><p id = ""><span id="notmatch"></span></p></td>
            </tr>
             <tr>
                
                 <td><label for="email">Email</label><span class="error"><?php echo $emailerr;?></span></td>
                    
                   <td><input type="email" name="email" id="email" onblur="checkemail()" required></td>
            </tr>
            <tr>
                <td colspan="2"><p id = ""><span id="email_status"></span></p></td>
            </tr>
            <tr>
                <td><label>Gender</label><span class="error"><?php echo $gendererr;?></span></td>
                <td><div id="get"> <input type="radio" name="gender" id="m" value="male" required><label>Male</label>
                    <input type="radio" name="gender" id="f" value="female"><label>Female</label> </div>
                </td>
             </tr>
             <tr>
                <td colspan="2"><p id = ""><span id="gnderr"></span></p></td>
            </tr>
            <tr>
	            <td>
	            	<label for="dob">DOB</label><span class="error"></span>
	            </td>
	            <td>
	            	<input type="text" id="datepicker" name = "dob" onblur="validatedate()" placeholder="month/day/year" >
	            </td>
	        </tr>
            <tr>
                <td colspan="2"><p id = ""><span id="dateerror"></span></p></td>
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