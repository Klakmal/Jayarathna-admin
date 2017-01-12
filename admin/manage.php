<html>
    <head>
    <title>Administrator</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/adminindex.css">
    <link rel="stylesheet" type="text/css" href="../css/manage.css">
    <style>
    html,body,h1,h2,h3,h4,h5 {font-family: 'Ruda', sans-serif;}
    .w3-sidenav a,.w3-sidenav h4 {font-weight:bold;}
    </style>
    </head>
    <body>

<nav class="navi_menu" id="mySidenav">
  <div class="container">
    <div class="headdiv" align="center">
        <span class="headline">JAYARATNE FUNERALS</span>
    </div>
    <div class="navi_pro" align="center">
    <img class="propic" src="../img_avatar_g2.jpg"><br>
    <p style="color:#aeb2b7;">Welcome,</p>
    <h4 class="name"><b>Kasun Lakmal</b></h4>
<!--    <p class="other">Jayarathna Funrels</p>-->
        <hr>
    </div>
      <div class="menutitlediv">
          <p class="menutitle">Menu</p>
      </div>
  </div>
<a href="indexadmin.php" class="navi"><img src="../img/home.png" class="image">&nbsp;&nbsp;HOME</a>
  <a href="manage.php" class="navi"><img src="../img/stock.png" class="image">&nbsp;&nbsp;EMPLOYEE REGISTER</a>
  <a href="editadmin.php" class="navi"><img src="../img/profile.png" class="image">&nbsp;&nbsp;UPDATE PROFILE</a>
  
</nav>

<div class="menu2" align="right">
    <div class="menu2in">
      <a href="../signout.php" class="myButton">Log Out</a>
    </div>
  </div>

<div class="conner1" align="center">
            <div class="conner2">
                <?php
                    
                require "../dbcon/dbcon.php";
                     $error=FALSE;
                        $employeeiderr = $positionerr = "";
                 if (isset($_POST['update'])) {
                     
                     if(empty($_POST['employeeid'])){ 
                                $employeeiderr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $employeeid = $_POST['employeeid'];
                            }
                     if(empty($_POST['position'])){ 
                                $positionerr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $position = $_POST['position'];
                            }
                 
                 
                if ($error==FALSE){

                $sql = "UPDATE employee SET position='$position' WHERE employeeid='$employeeid'";

                if (mysqli_query($conn, $sql)) {
                    echo '<script>alert("Record updated successfully")</script>';
                } else {
                    echo "error" ;
                }
                }
                 }
                if (isset($_POST['delete'])) {
                     
                     $employeeid=$_POST["employeeid"];
                    
                 

                $sql = "DELETE FROM employee WHERE employeeid='$employeeid'";

                if (mysqli_query($conn, $sql)) {
                    echo '<script>alert("Record deleted successfully")</script>';
                } else {
                    echo "Error deleting record: " . mysqli_error($conn);
                }
                }
                   
                $error=FALSE;
                        $employeeiderr = $positionerr =$temppassworderr = "";
                 if (isset($_POST['insert'])) {
                     
                     if(empty($_POST['employeeid'])){ 
                                $employeeiderr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $employeeid = $_POST['employeeid'];
                            }
                     if(empty($_POST['position'])){ 
                                $positionerr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $position = $_POST['position'];
                            }
                     if(empty($_POST['temppassword'])){ 
                                $temppassworderr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $temppassword = $_POST['temppassword'];
                            }
                 
                    
                    $sql = "INSERT INTO employee (employeeid,position,temppassword)
                VALUES ('".$employeeid."','".$position."','".$temppassword."')";

                if (mysqli_query($conn, $sql)) {
                    echo '<script>alert("New record created successfully")</script>';
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }

                    
                    
                    
                }

                ?>

                <div id="manage">
                <form method="post" action="manage.php">
                <table id="tb5">
                    <tr>
                        <th colspan="2" align="left"><b style="color:white; font-size:24px; text-shadow:2px 2px 2px gray;">EMPLOYEE REGISTER</b></th> 
                    </tr>
                    <tr>
                    <td><label for="employeeid">Employee ID</label><span class="error"><?php echo $employeeiderr;?></span></td>
                    <td><input type="text" name="employeeid" placeholder="EmployeeID"></td>
                    </tr>    
                    <tr>
                    <td><label for="position">Position</label><span class="error"><?php echo $positionerr;?></span></td>
                    <td><select name=position><option disabled selected value> -- select an option --</option><option value='manager'>manager</option><option value='itoperator'>itoperator</option><option value='receptionist'>receptionist</option></select></td>
                    </tr>
                     <tr>
                    <td><label for="temppassword">Temporary Password</label><span class="error"><?php echo $temppassworderr;?></span></td>
                    <td><input type="password" name="temppassword" placeholder="temporary password"></td>
                    </tr>
                    <tr>
                    
                        <td colspan="2" align="center">
                        <input type="submit" value="UPDATE" name="update"> 
                        <input type="submit" value="DELETE" name="delete">
                        <input type="submit" value="INSERT" name="insert">
                    </td>
                    
                    </tr>
                </table>
                </form>
                 </div>  

             </div>
         </div>
    </body>
</html>