<?php  
 require "dbcon/dbcon.php"; 
 	if ($_POST['user_email']) 
 	{
	 	 $email = $_POST['user_email'];
		 $sql = "SELECT * FROM customers WHERE email = '$email'";

		 $result = mysqli_query($conn, $sql);  
		 if(mysqli_num_rows($result) > 0)  
		 { 
		 	echo "Email Already Exist.";
		 }  
		 else  
		 {  
		    echo "OK";
		 }  
	}
 ?> 