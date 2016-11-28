<html>
<head>
<tile><h1>Update Packages and Services prices</h1></tile>
</head>
<body>


 <?php
                    
                require "../dbcon/dbcon.php";
                     $error=FALSE;
                        $s_nameerr = $op1err =$op2err =$op3err =$op4err =$op5err = "";
                if (isset($_POST['update'])) {
                    
                     if(empty($_POST['s_name'])){ echo "00";
                                $s_nameerr = "</br>* ";
                                $error = TRUE;
                            }else{echo "o1";
                                $s_name = $_POST['s_name'];
                            }
                     if(empty($_POST['op1'])){ echo "o2";
                                $op1err = "</br>* ";
                                $error = TRUE;
                            }else{echo "o3";
                                $op1 = $_POST['op1'];
                            }
                     if(empty($_POST['op2'])){ 
                                $op2err = "</br>* ";
                                $error = TRUE;
                            }else{
                                $op2 = $_POST['op2'];
                            }
                     if(empty($_POST['op3'])){ 
                                $op3err = "</br>* ";
                                $error = TRUE;
                            }else{
                                $op3 = $_POST['op3'];
                            }
                     if(empty($_POST['op4'])){ 
                                $op4err = "</br>* ";
                                $error = TRUE;
                            }else{
                                $op4 = $_POST['op4'];
                            }
                     if(empty($_POST['op5'])){ 
                                $op5err = "</br>* ";
                                $error = TRUE;
                            }else{
                                $op5 = $_POST['op5'];
                            }

                 
	                 
	                if ($error==FALSE){

		                $sql = "UPDATE serviceprices SET gold='$op1',silver='$op2',bronze='$op3',platinum='$op4',deluxe='$op5' WHERE s_name='$s_name'";

		                if (mysqli_query($conn, $sql)) {
		                	header('location:comment.php');
		                    echo '<script>alert("Record updated successfully")</script>';
		                } else {
		                    echo "error" ;
		                }
	                }
                }
 ?> 


<form method="post" action="updateprices.php">
<table>
<tr>
<td>
<div id="s_name">
	<label for="s_name"><b>Package or Service name</b> :-</label>
	<input type="text" id="s_name">
</div>
</td></tr>

<tr>
<td>
<div id="op1">
	<label for="op1">option 1 :-</label>
	<input type="text" id="op1" >
</div>
</td>
</tr>

<tr>
<td>
<div id="op2">
	<label for="op2">option 2 :-</label>
	<input type="text" id="op2" value="0">
</div>
</td>
</tr>

<tr>
<td>
<div id="op3">
	<label for="op3">option 3 :-</label>
	<input type="text" id="op3" value="0">
</div>
</td>
</tr>

<tr>
<td>
<div id="op4">
	<label for="op4">option 4 :-</label>
	<input type="text" id="op4" value="0">
</div>
</td>
</tr>

<tr>
<td>
<div id="op5">
	<label for="op5">option 5 :-</label>
	<input type="text" id="op5" value="0">
</div>
</td>
</tr>
<tr>
                    
<td colspan="2" align="center">
   <input type="submit" value="UPDATE" name="update"> 
                        
</td>
                    
</tr>
</table>
</form>


</body>
</html>