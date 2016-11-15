<?php  
 require "dbcon/dbcon.php";  
 $output = '';  
 $sql = "SELECT * FROM customers WHERE cusname LIKE '%".$_POST["search"]."%' AND deadname LIKE '%".$_POST["baba"]."%'";
 $result = mysqli_query($conn, $sql);  
 if(mysqli_num_rows($result) > 0)  
 {  
  //      $output .= '<h4 align="center">Search Result</h4>';  
      $output .= '<div id="drop_box1">
                      <ul class="drop_list">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= ' 
            <li class="drop_item">
                <a href="" class="person_link">
                  <span>
                    <img src="img/mrjayaratne.jpg" width="30px" height="30px">
                  </span>
                  <span>
                    '.$row["cusname"].'
                  </span>
                  <span>
                     
                  </span>
                  <span>
                    '.$row["gender"].'
                  </span>
                </a>
            </li> 
           ';  
      }  
      echo $output;  
 }  
 else  
 {  
      echo 'Data Not Found';  
 }  
 ?>  