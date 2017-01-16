<?php
    include ('../manager/sessionManager.php');
?>
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
.tbl {
    border-collapse: collapse;
    width: 100%;
}

.th, .td {
    text-align: left;
    padding: 8px;
}

.tr:nth-child(even){background-color: #f2f2f2}

.th {
    background-color: #41a3b1;
    color: white;
}
    </style>
    <!--date picker jquery -->

     <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
 $(function(){
        $("#to").datepicker({ dateFormat: 'yy-mm-dd' });
        $("#frm").datepicker({ dateFormat: 'yy-mm-dd' }).bind("change",function(){
            var minValue = $(this).val();
            minValue = $.datepicker.parseDate("yy-mm-dd", minValue);
            minValue.setDate(minValue.getDate()+1);
            $("#to").datepicker( "option", "minDate", minValue );
        })
    });
  
  </script>
<!--date picker jquery -->
</head>
<body>
<nav class="navi_menu" id="mySidenav">
  <?php include '../details.php'; ?>
  <a href="../manager/indexmanager.php" class="navi"><img src="../img/home.png" class="image">&nbsp;&nbsp;HOME</a>
  <a href="supplierpayment.php" class="navi"><img src="../img/payments.png" class="image">&nbsp;&nbsp;SUPPLIER PAYMENT</a>
  <a href="suppliertype.php" class="active"><img src="../img/supplier.png" class="image">&nbsp;&nbsp;SUPPLIER/TYPE DETAILES</a>
  <a href="customerinfo.php" class="navi"><img src="../img/account.png" class="image">&nbsp;&nbsp;CUSTOMER INFORMATION</a>
  <a href="packages.php" class="navi"><img src="../img/package.png" class="image">&nbsp;&nbsp;PACKAGES</a>
  <a href="graph2.php" class="navi"><img src="../img/package.png" class="image">&nbsp;&nbsp;GRAPH PACKAGES</a>
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
                if (isset($_POST['submit'])) {

                	
                                $frm = $_POST['frm'];
                            
                     
                                $to = $_POST['to'];
                            

                	if(!empty($_POST['supplier']) && !empty($_POST['type'])){

                		$supplier = $_POST['supplier'];
                		$type = $_POST['type'];

                		$sql = "SELECT count(id.id), sum(type.price) FROM type, id WHERE '$frm' < id.timein< '$to' AND id.no=type.no AND type='$type' AND supplier='$supplier' GROUP BY supplier";
                    	$query=(mysqli_query($conn,$sql));
                    	?>
                    	<table class="tbl">
    					<tr class="tr">
				        <th class="th">No of in</th>
				        <th class="th">Total Price</th>
    					</tr>
						<?php
						    while ($row = mysqli_fetch_assoc($query)){
						         echo "<tr class='tr'>";
						        
						            /*echo "<td>";
						            echo $row['supplier'];
						            echo "</td>";

						            echo "<td>";
						            echo $row['type'];
						            echo "</td>";
						*/
						            echo "<td class='td'>";
						            echo $row['count(id.id)'];
						            echo "</td>";
						            
						            echo "<td class='td'>";
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
                    <td><input type="text" name="frm" id="frm" placeholder="From"></td>
                    </tr> 
                    <tr>
                    <td><label for="to">To</label><span class="error"><?php echo $toerr;?></span></td>
                    <td><input type="text" name="to" id="to" placeholder="To"></td>
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
                        <input type="submit" value="Submit" name="submit">
                    </td>
                       
                    </tr>
</table>
</form>
</div>
</div>
</div>
</body>
</html>