<?php
    include ('sessionManager.php');
?>
<html>
<head>
<title>Payment</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/adminindex.css">
    <link rel="stylesheet" type="text/css" href="../css/manage.css">
    <style>
    html,body,h1,h2,h3,h4,h5 {font-family: 'Ruda', sans-serif;}
    .w3-sidenav a,.w3-sidenav h4 {font-weight:bold;}
    </style>
<style> 
body{ 
    margin:0px;
    background-color: #eee;
}
.con1{
    width: 100%;
    height: 100%;
    background-color: ;
}
.con2{
    width: 500px;
    height: 100%;
    background-color: #eee;
    position: relative;
    margin-top: 100px;
    margin-left: 200px;
    padding: 20px;
    border-radius: 10px;
}

input[type=text]:hover,[type=password]:hover{
    width: 200px;
    height: 30px;
    margin: 5px;
    border-radius: 10px;
    background-color: #fff;
    border:1px solid white;
    padding-left: 5px;
}


.tb{
    width:100px;
    background-color: #aaa;
}
.tb1{
    width: ;
}
.tb2{
    width:100px;
    float: center;
    background-color: white;
}
</style>
</head>
<body>
<nav class="navi_menu" id="mySidenav">
  <?php include '../details.php'; ?>
  <a href="indexmanager.php" class="navi"><img src="../img/home.png" class="image">&nbsp;&nbsp;HOME</a>
  <a href="type.php" class="navi"><img src="../img/updateprice.png" class="image">&nbsp;&nbsp;COFFIN PRICES</a>
  <a href="updateprices.php" class="active"><img src="../img/updateprice.png" class="image">&nbsp;&nbsp;UPDATE PRICES</a>
  <a href="../report/payment.php" class="navi"><img src="../img/payments.png" class="image">&nbsp;&nbsp;PAYMENT</a>
  <a href="../report/supplier.php" class="navi"><img src="../img/supplier.png" class="image">&nbsp;&nbsp;SUPPLIER</a>
  <a href="moq.php" class="navi"><img src="../img/updateprice.png" class="image">&nbsp;&nbsp;ADD/CHANGE MOQ</a>
</nav>
<div class="menu2" align="right">
    <div class="menu2in">
      <a href="../signout.php" class="myButton">Log Out</a>
    </div>

<div class="con1" align="center">
<div class="con2">


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
                                $error = TRUE;
                            }else{
                                $gold = $_POST['gold'];
                            }
                     if(empty($_POST['silver'])){ 
                                //$silvererr = "</br>* ";
                                $silver = 0;
                            }else{
                                $silver = $_POST['silver'];
                            }
                     if(empty($_POST['bronze'])){ 
                                //$bronzeerr = "</br>* ";
                                $bronze =0;
                            }else{
                                $bronze = $_POST['bronze'];
                            }
                     if(empty($_POST['platinum'])){ 
                                //$platinumerr = "</br>* ";
                                $platinum =0;
                            }else{
                                $platinum = $_POST['platinum'];
                            }
                     if(empty($_POST['deluxe'])){ 
                                //$deluxeerr = "</br>* ";
                                $deluxe =0;
                            }else{
                                $deluxe = $_POST['deluxe'];
                            }

                 
	                 
	                if ($error==FALSE){

		                $sql = "UPDATE serviceprices SET gold='$gold',silver='$silver',bronze='$bronze',platinum='$platinum',deluxe='$deluxe' WHERE s_name='$s_name'";
                        

		                if (mysqli_query($conn, $sql)) {
		                	echo "<script>window.location('location:updateprices.php');</script>";
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
	
    
    <select type="text" name="s_name" placeholder="select one" required>
                                <option value="s0">Main package</option>
                                <option value="s1">Floral tributes</option>
                                <option value="s2">Rememberence booklets</option>
                                <option value="s3">Chairs and tents</option>
                                <option value="s4">Obituary notices</option>
                                <option value="s5">Crematorium booking</option>
                                <option value="s6">Monumential plaques</option>
                                <option value="s7">Funeral Pyres</option>
                                <option value="s8">Web Casting</option>
                                <option value="s9">Condolence message screen</option>
                            </select>
    
</div>
</td></tr>

<tr>
<td>
<div id="gold">
	<label for="gold">Gold Price</label>
	<input type="text" name="gold" ><span class="error"><?php echo $golderr;?></span>
</div>
</td>
</tr>

<tr>
<td>
<div id="silver">
	<label for="silver">Silver Price</label>
    
	<input type="text" name="silver" ><span class="error"><?php echo $silvererr;?></span>
</div>
</td>
</tr>

<tr>
<td>
<div id="bronze">
	<label for="bronze">Bronze Price</label>
	<input type="text" name="bronze" ><span class="error"><?php echo $bronzeerr;?></span>
</div>
</td>
</tr>

<tr>
<td>
<div id="platinum">
	<label for="platinum">Platinum Price</label>
	<input type="text" name="platinum"><span class="error"><?php echo $platinumerr;?></span>
</div>
</td>
</tr>

<tr>
<td>
<div id="deluxe">
	<label for="deluxe">Deluxe Price</label>
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
    </div>
    </div>
    </div>
</body>
</html>