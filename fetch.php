<?php  
 require "dbcon/dbcon.php";  
 $output = '';  
 $sql = "SELECT * FROM deathpersondetails WHERE deadPersonName LIKE '%".$_POST["search"]."%' AND homecity LIKE '%".$_POST["baba"]."%' AND school LIKE '%".$_POST["scl"]."%' AND university LIKE '%".$_POST["uni"]."%' AND employee LIKE '%".$_POST["emp"]."%'";
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
                   
              ';
                  $sql_image = "SELECT * FROM deathpersondetails WHERE deadPersonID = '".$row["deadPersonID"]."'";
                  $result_image = mysqli_query($conn, $sql_image);
                     if(mysqli_num_rows($result_image) > 0)  
                     {
                      while($row_img = mysqli_fetch_array($result_image))
                      { 
                      $output .= "<img src='img/profileImage/".$row['pro_img'].".jpg' width='50px' height='50px'>";
                      }
                  }
                $output .='  </span>
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