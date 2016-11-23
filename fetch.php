<?php  
 require "dbcon/dbcon.php";  
 $output = '';  
 $sql = "SELECT * FROM deathpersondetails WHERE deadPersonName LIKE '%".$_POST["search"]."%' AND homesity LIKE '%".$_POST["baba"]."%' AND school LIKE '%".$_POST["scl"]."%' AND university LIKE '%".$_POST["uni"]."%' AND employee LIKE '%".$_POST["emp"]."%'";
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
                <a href="profile.php?id='.$row["deadPersonID"].'" class="person_link">
                  <span>
                    <img src="img/mrjayaratne.jpg" width="30px" height="30px">
                  </span>
                  <span>
                    '.$row["deadPersonName"].'
                  </span>
                  <br>
                  <span>
                  </span>
                  <span>
                    '.$row["Description"].'
                  </span>
                </a>
            </li> 
            <hr>
           ';  
      }  
      echo $output;  
 }  
 else  
 {  
      echo 'Data Not Found';  
 }  
 ?>  