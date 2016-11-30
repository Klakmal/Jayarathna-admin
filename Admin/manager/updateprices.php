<html>
<head>
<tile><h1>Update Packages and Services prices</h1></tile>
</head>
<body>


 <?php
                    
                require "../dbcon/dbcon.php";

                     $error=FALSE;
                        $s_nameerr = $golderr =$silvererr =$bronzeerr =$platinumerr =$deluxeerr = "";
                if (isset($_POST['submit'])) {
                    
                     if(empty($_POST['s_name'])){ 
                                $s_nameerr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $s_name = $_POST['s_name'];
                            }
                     if(empty($_POST['gold'])){ 
                                $golderr = "</br>* ";
                                //$error = TRUE;
                            }else{
                                $gold = $_POST['gold'];
                            }
                     if(empty($_POST['silver'])){ 
                                $silvererr = "</br>* ";
                                //$error = TRUE;
                            }else{
                                $silver = $_POST['silver'];
                            }
                     if(empty($_POST['bronze'])){ 
                                $bronzeerr = "</br>* ";
                                //$error = TRUE;
                            }else{
                                $bronze = $_POST['bronze'];
                            }
                     if(empty($_POST['platinum'])){ 
                                $platinumerr = "</br>* ";
                                //$error = TRUE;
                            }else{
                                $platinum = $_POST['platinum'];
                            }
                     if(empty($_POST['deluxe'])){ 
                                $deluxeerr = "</br>* ";
                                //$error = TRUE;
                            }else{
                                $deluxe = $_POST['deluxe'];
                            }

                 
	                 
	                if ($error==FALSE){

		                $sql = "UPDATE serviceprices SET gold='$gold',silver='$silver',bronze='$bronze',platinum='$platinum',deluxe='$deluxe' WHERE s_name='$s_name'";
                        

		                if (mysqli_query($conn, $sql)) {
		                	header('location:updateprices.php');
                            echo "llll";
		                    echo '<script>alert("Record updated successfully")</script>';
		                } else {
                            echo "oooo";
		                    echo "Error: " . $sql. "<br>" . mysqli_error($con);
		                }
	                }
                }
 ?> 
<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
<div id="updateprices">
<form method="post" action="updateprices.php">
<table>
<tr>
<td>
<div id="s_name">
	<label for="s_name"><b>Package or Service name</b> :-</label>
	<input type="text" name="s_name"><span class="error"><?php echo $s_nameerr;?></span>
</div>
</td></tr>

<tr>
<td>
<div id="gold">
	<label for="gold">option 1 :-</label>
	<input type="text" name="gold" ><span class="error"><?php echo $golderr;?></span>
</div>
</td>
</tr>

<tr>
<td>
<div id="silver">
	<label for="silver">option 2 :-</label>
	<input type="text" name="silver" ><span class="error"><?php echo $silvererr;?></span>
</div>
</td>
</tr>

<tr>
<td>
<div id="bronze">
	<label for="bronze">option 3 :-</label>
	<input type="text" name="bronze" ><span class="error"><?php echo $bronzeerr;?></span>
</div>
</td>
</tr>

<tr>
<td>
<div id="platinum">
	<label for="platinum">option 4 :-</label>
	<input type="text" name="platinum"><span class="error"><?php echo $platinumerr;?></span>
</div>
</td>
</tr>

<tr>
<td>
<div id="deluxe">
	<label for="deluxe">option 5 :-</label>
	<input type="text" name="deluxe" ><span class="error"><?php echo $deluxeerr;?></span>
</div>
</td>
</tr>
<tr>
                    
<td colspan="2" align="center">
   <input type="submit" value="UPDATE" name="submit"> 
                        
</td>
                    
</tr>
</table>
</form>
</div>
</form>
</body>
</html>