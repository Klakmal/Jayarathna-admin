<?php  
 require "dbcon/dbcon.php";  
 $output1 = '';  
 $sql = "SELECT * FROM deathpersondetails WHERE homesity LIKE '%".$_POST["search"]."%'";
 $result = mysqli_query($conn, $sql);
 if(mysqli_num_rows($result) > 0)  
 {  
  //      $output .= '<h4 align="center">Search Result</h4>'; 
  		
      while($row1 = mysqli_fetch_array($result))  
      {  
           $output1 .= ' 
            <option value="'.$row1["homesity"].'">
           ';  
      }  
 
      echo $output1;  
 }  
 else  
 {  
      echo 'Data Not Found';  
 }  
 ?>  