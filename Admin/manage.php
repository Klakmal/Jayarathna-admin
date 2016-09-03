<html>
    <head>
    <title>Admin page</title>
    </head>
<body>
<?php
    
require "dbcon/dbcon.php";
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
    echo "Record updated successfully";
} else {
    echo "error" ;
}
}
 }
if (isset($_POST['delete'])) {
     
     $employeeid=$_POST["employeeid"];
    
 

$sql = "DELETE FROM employee WHERE employeeid='$employeeid'";

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
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
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

    
    
    
}

?>
<div id="manage">
<form method="post" action="manage.php">
<table id="tb5">
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
    
        <td colspan="2">
        <input type="submit" value="UPDATE" name="update"> 
        <input type="submit" value="DELETE" name="delete">
        <input type="submit" value="INSERT" name="insert">
    </td>
    
    </tr>
</table>


    
</form>
 </div>  
    </body>
</html>