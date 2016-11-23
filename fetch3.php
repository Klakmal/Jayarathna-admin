<?php  
 require "dbcon/dbcon.php";  
 $output2 = '';  
 $sql = "SELECT * FROM deathpersondetails WHERE university LIKE '%".$_POST["search"]."%'";
 $result = mysqli_query($conn, $sql);
 if(mysqli_num_rows($result) > 0)  
 {  
  //$output .= '<h4 align="center">Search Result</h4>'; 
  		
      while($row1 = mysqli_fetch_array($result))  
      {  
           $output2 .= ' 
            <option value="'.$row1["university"].'">
           ';  
      }  
 
      echo $output2;  
 }  
 else  
 {  
      echo 'Data Not Found';  
 }  
 ?>  