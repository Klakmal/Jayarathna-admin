<html>
<head>
<title>Payment Report</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/adminindex.css">
    <link rel="stylesheet" type="text/css" href="../css/manage.css">
    <style>
    html,body,h1,h2,h3,h4,h5 {font-family: 'Ruda', sans-serif;}
    .w3-sidenav a,.w3-sidenav h4 {font-weight:bold;}

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
    background-color: ;
    position: relative;

    margin-left: 200px;
    padding: 20px;
    border-radius: 10px;
}
th{
    width:100px;
    background-color: #aaa;
}
tr{
    width: ;
}
td{
    width:100px;
    float: center;
    background-color: white;
}
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
  <a href="../manager/indexmanager.php" class="navi"><img src="../img/home.png" class="image">&nbsp;&nbsp;HOME</a>


  <a href="supplierpayment.php" class="navi"><img src="../img/payments.png" class="image">&nbsp;&nbsp;SUPPLIER PAYMENT</a>
  <a href="suppliertype.php" class="navi"><img src="../img/supplier.png" class="image">&nbsp;&nbsp;SUPPLIER/TYPE DETAILES</a>
  <a href="packages.php" class="navi"><img src="../img/package.png" class="image">&nbsp;&nbsp;PACKAGES</a>
  <a href="customerinfo.php" class="navi"><img src="../img/account.png" class="image">&nbsp;&nbsp;CUSTOMER INFORMATION</a>
</nav>

<div class="menu2" align="right" style="margin-bottom: 100px;">
    <div class="menu2in">
      <a href="../signout.php" class="myButton">Log Out</a>
    </div>
  </div>
  <div class="con1" align="center">
<div class="con2">

<?php
                require "dbcon/dbcon.php";
                $error=FALSE;
                $frmerr = $toerr = $suppliererr=  $typeerr = "";
                if (isset($_POST['all'])) {

                	if(empty($_POST['frm'])){ 
                                $frmerr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $frm = $_POST['frm'];
                            }
                     if(empty($_POST['to'])){ 
                                $toerr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $to = $_POST['to'];
                            }

                	if(!empty($_POST['supplier']) && !empty($_POST['type'])){

                		$supplier = $_POST['supplier'];
                		$type = $_POST['type'];

                		$sql = "SELECT count(id.id), sum(type.price) FROM type, id WHERE '$frm' < id.timein< '$to' AND id.no=type.no AND type='$type' AND supplier='$supplier' GROUP BY supplier";
                    	$query=(mysqli_query($conn,$sql));
                    	?>
                    	<table>
    					<tr>
				        <th>No of in</th>
				        <th>Total Price</th>
    					</tr>
						<?php
						    while ($row = mysqli_fetch_assoc($query)){
						         echo "<tr>";
						        
						            /*echo "<td>";
						            echo $row['supplier'];
						            echo "</td>";

						            echo "<td>";
						            echo $row['type'];
						            echo "</td>";
						*/
						            echo "<td>";
						            echo $row['count(id.id)'];
						            echo "</td>";
						            
						            echo "<td>";
						            echo $row['sum(type.price)'];
						            echo "</td>";

						         echo "</tr>";}
						?>
						</table>
						<?php
						}

					
                     
                     if(empty($_POST['supplier']) && !empty($_POST['type'])){ 
                     	
                     			$type = $_POST['type'];

                               $sql = "SELECT supplier,count(id.id), sum(type.price) FROM type, id WHERE '$frm' < id.timein< '$to' AND id.no=type.no AND type='$type' GROUP BY supplier ";
                    			$query=(mysqli_query($conn,$sql));
                    			?>

                    			<table>
							    <tr>
							        <th>Supplier</th>
							        <th>No of in</th>
							        <th>Total Price</th>
							        
							    </tr>
							<?php
							    while ($row = mysqli_fetch_assoc($query)){
							         echo "<tr>";
							        
							            /*echo "<td>";
							            echo $row['supplier'];
							            echo "</td>";
							*/
							            echo "<td>";
							            echo $row['supplier'];
							            echo "</td>";

							            echo "<td>";
							            echo $row['count(id.id)'];
							            echo "</td>";

							            echo "<td>";
							            echo $row['sum(type.price)'];
							            echo "</td>";
							            
							         echo "</tr>";}
							?>
							</table>

							<?php
                            }

                     if(empty($_POST['type']) && !empty($_POST['supplier'])){ 

                     			$supplier = $_POST['supplier'];
                                 $sql = "SELECT type,count(id.id), sum(type.price) FROM type, id WHERE '$frm' < id.timein< '$to' AND id.no=type.no AND supplier='$supplier' GROUP BY type ";
                                 $query=(mysqli_query($conn,$sql));
                                 ?>
                                 <table>
							    <tr>
							        <th>type</th>
							        <th>No of in</th>
							        <th>Total Price</th>
							        
							    </tr>
							<?php
							    while ($row = mysqli_fetch_assoc($query)){
							         echo "<tr>";
							        
							            /*echo "<td>";
							            echo $row['supplier'];
							            echo "</td>";
							*/
							            echo "<td>";
							            echo $row['type'];
							            echo "</td>";

							            echo "<td>";
							            echo $row['count(id.id)'];
							            echo "</td>";

							            echo "<td>";
							            echo $row['sum(type.price)'];
							            echo "</td>";
							            
							         echo "</tr>";}
							?>
							</table>
					<?php
                    	
                            }
                     

                    }

					?>






        <div id="type">
                <form method="post" action="suppliertype.php">
                <table id="tb9">
                    <tr>
                    <th colspan="2" align="left"><b style="color:white; font-size:24px; text-shadow:2px 2px 2px gray;">Coffin Suppliers  Details</b></th> 
                    </tr>
                    <tr>
                    <td><label for="frm">From</label><span class="error"><?php echo $frmerr;?></span></td>
                    <td><input type="text" name="frm" placeholder="From"></td>
                    </tr> 
                    <tr>
                    <td><label for="to">To</label><span class="error"><?php echo $toerr;?></span></td>
                    <td><input type="text" name="to" placeholder="To"></td>
                    </tr> 
                    <tr>
                    <td><label for="supplier">Supplier</label></td>
                    <td><input type="text" name="supplier" placeholder="Supplier"></td>
                    </tr> 
                    <tr>
                    <td><label for="type">Type</label></td>
                    <td><input type="text" name="type" placeholder="Type"></td>
                    </tr> 
                    <tr>
                        <td colspan="2" align="center">
                        <input type="submit" value="ALL" name="all">
                    </td>
                       
                    </tr>
</table>
</form>
</div>
</div>
</div>
</body>
</html>