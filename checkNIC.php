<?php  
 require "dbcon/dbcon.php"; 
 	if ($_POST['user_nic']) 
 	{
	 	 $nic = $_POST['user_nic'];
		 $sql = "SELECT * FROM customers WHERE nic = '$nic'";

		 $result = mysqli_query($conn, $sql);  
		 if(mysqli_num_rows($result) > 0)  
		 { 
		 	echo "NIC Already Exist.";
		 }  
		 else
		 {  
		    echo "OK";
		 }  
	}
 ?> 