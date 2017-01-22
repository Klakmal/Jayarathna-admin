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


.tbl {
    border-collapse: collapse;
    width: 600px;
    font-size: 13px;
}

.th, .td {
    text-align: left;
    padding: 8px;
    border-bottom: 1px solid gray;
}

.tr:nth-child(even){background-color: #f2f2f2}

.th {
    background-color: #41a3b1;
    color: white;
}
    
.updt {
	-moz-box-shadow:inset 0px 1px 0px 0px #9acc85;
	-webkit-box-shadow:inset 0px 1px 0px 0px #9acc85;
	box-shadow:inset 0px 1px 0px 0px #9acc85;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #74ad5a), color-stop(1, #68a54b));
	background:-moz-linear-gradient(top, #74ad5a 5%, #68a54b 100%);
	background:-webkit-linear-gradient(top, #74ad5a 5%, #68a54b 100%);
	background:-o-linear-gradient(top, #74ad5a 5%, #68a54b 100%);
	background:-ms-linear-gradient(top, #74ad5a 5%, #68a54b 100%);
	background:linear-gradient(to bottom, #74ad5a 5%, #68a54b 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#74ad5a', endColorstr='#68a54b',GradientType=0);
	background-color:#74ad5a;
	border:1px solid #3b6e22;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:13px;
	font-weight:bold;
	padding:3px 6px;
	text-decoration:none;
}
.updt:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #68a54b), color-stop(1, #74ad5a));
	background:-moz-linear-gradient(top, #68a54b 5%, #74ad5a 100%);
	background:-webkit-linear-gradient(top, #68a54b 5%, #74ad5a 100%);
	background:-o-linear-gradient(top, #68a54b 5%, #74ad5a 100%);
	background:-ms-linear-gradient(top, #68a54b 5%, #74ad5a 100%);
	background:linear-gradient(to bottom, #68a54b 5%, #74ad5a 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#68a54b', endColorstr='#74ad5a',GradientType=0);
	background-color:#68a54b;
}
.updt:active {
	position:relative;
	top:1px;
}
            
.rem {
	-moz-box-shadow:inset 0px 1px 0px 0px #c79090;
	-webkit-box-shadow:inset 0px 1px 0px 0px #c79090;
	box-shadow:inset 0px 1px 0px 0px #c79090;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #ff6161), color-stop(1, #d94141));
	background:-moz-linear-gradient(top, #ff6161 5%, #d94141 100%);
	background:-webkit-linear-gradient(top, #ff6161 5%, #d94141 100%);
	background:-o-linear-gradient(top, #ff6161 5%, #d94141 100%);
	background:-ms-linear-gradient(top, #ff6161 5%, #d94141 100%);
	background:linear-gradient(to bottom, #ff6161 5%, #d94141 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff6161', endColorstr='#d94141',GradientType=0);
	background-color:#ff6161;
	border:1px solid #a83b3b;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:13px;
	font-weight:bold;
	padding:3px 6px;
	text-decoration:none;
}
.rem:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #d94141), color-stop(1, #ff6161));
	background:-moz-linear-gradient(top, #d94141 5%, #ff6161 100%);
	background:-webkit-linear-gradient(top, #d94141 5%, #ff6161 100%);
	background:-o-linear-gradient(top, #d94141 5%, #ff6161 100%);
	background:-ms-linear-gradient(top, #d94141 5%, #ff6161 100%);
	background:linear-gradient(to bottom, #d94141 5%, #ff6161 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#d94141', endColorstr='#ff6161',GradientType=0);
	background-color:#d94141;
}
.rem:active {
	position:relative;
	top:1px;
}
</style>
</head>
<body>
<nav class="navi_menu" id="mySidenav">
  <?php include '../details.php'; ?>
  <a href="indexmanager.php" class="navi"><img src="../img/home.png" class="image">&nbsp;&nbsp;HOME</a>
  <a href="type.php" class="active"><img src="../img/updateprice.png" class="image">&nbsp;&nbsp;COFFIN PRICES</a>
  <a href="updateprices.php" class="navi"><img src="../img/updateprice.png" class="image">&nbsp;&nbsp;UPDATE PRICES</a>
  <a href="../report/payment.php" class="navi"><img src="../img/payments.png" class="image">&nbsp;&nbsp;PAYMENT</a>
  <a href="../report/supplier.php" class="navi"><img src="../img/supplier.png" class="image">&nbsp;&nbsp;SUPPLIER</a>
  
</nav>
<div class="menu2" align="right">
    <div class="menu2in">
      <a href="../signout.php" class="myButton">Log Out</a>
    </div>

<div class="con1" align="center">
<div class="con2">
    <?php
                    
                require "../dbcon/dbcon.php";
                     
                 if (isset($_POST['update'])) {
                     
                                $no=$_POST["no"];

                                $type = $_POST['type'];
                            
                     
                                $supplier = $_POST['supplier'];
                            
                     
                                $price = $_POST['price'];
                            
                 
                 
                if ($error==FALSE){

                $sql = "UPDATE type SET price='$price' WHERE no='$no' OR (type='$type' AND supplier='$supplier')";

                if (mysqli_query($conn, $sql)) {
                    echo '<script>window.location("Record updated successfully")</script>';
              
                } else {
                    echo "error" ;
                }
                }
                 }
                if (isset($_GET['remove'])) {
                     
                     $no=$_GET["remove"];
                    
                 

                $sql = "DELETE FROM type WHERE no='$no'";

                if (mysqli_query($conn, $sql)) {
                    echo '<script>window.location("Record deleted successfully")</script>';
                    
                } else {
                    echo "Error deleting record: " . mysqli_error($conn);
                }
                }
                   
                $error=FALSE;
                       
                 if (isset($_POST['insert'])) {
                     
                     
                                $no = $_POST['no'];
                            
                     
                                $price = $_POST['price'];
                            
                     
                                $type = $_POST['type'];
                            
                     
                                $supplier = $_POST['supplier'];
                            
                    
                    $sql = "INSERT INTO type (no,price,type,supplier)
                VALUES ('".$no."','".$price."','".$type."','".$supplier."')";

                if (mysqli_query($conn, $sql)) {
                    echo '<script>window.location("New record created successfully")</script>';
                    
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }

                    
                    
                    
                }

                ?>

                <div id="type">
                <form method="post" action="type.php">
                <table id="tb6">
                    <tr>
                        <th colspan="2" align="left"><b style="color:white; font-size:24px; text-shadow:2px 2px 2px gray;">Coffin Types</b></th> 
                    </tr>
                    <tr>
                    <td><label for="supplier">Supplier</label></td>
                    <td><input type="text" name="supplier" placeholder="supplier"></td>
                    </tr>
   
                    <tr>
                    <td><label for="type">Type</label></td>
                    <td><select name="type">
                        <option value= "Platinum">Platinum</option>    
                        <option value= "Gold">Gold</option>
                        <option value= "Silver">Silver</option>
                        <option value= "Bronze">Bronze</option>
                        </select>
                    </td>
                    </tr>
                 
                    <tr>
                    <td><label for="no">No</label></td>
                    <td><input type="text" name="no" placeholder="No"></td>
                    </tr>
                    <tr>
                    <td><label for="price">Price</label></td>
                    <td><input type="text" name="price" placeholder="Price"></td>
                    </tr>
                    <tr>
                    
                        <td colspan="2" align="center">
                        <input type="submit" value="INSERT" name="insert">
                    </td>
                    
                    </tr>
                </table>
                </form>
                 </div>  
<?php
    require "../dbcon/dbcon.php";
    $sql = "SELECT * FROM type";
    $query=(mysqli_query($conn,$sql));
?>
<table class="tbl">
    <tr>
        <th class="th">No</th> 
        <th class="th">Type</th> 
        <th class="th">Supplier</th>
        <th class="th">Price</th>
        <th class="th"></th>
        <th class="th"></th>
    </tr>
<?php
    while ($row = mysqli_fetch_assoc($query)){
        $no = $row['no'];
         echo '<tr class="tr" align="center">';
        
            echo '<td class="td">';
            echo $row['no'];
            echo "</td>";
                
            echo '<td class="td">';
            echo $row['type'];
            echo "</td>";

            echo '<td class="td">';
            echo $row['supplier'];
            echo "</td>";
        
            echo '<td class="td">';
            echo $row['price'];
            echo "</td>";
            
            ?>
        
            <td class="td">
                <button class='updt'  onclick="location.href='updateType.php?updatetype=<?php echo $no; ?>'">Update</button>
            </td>
            <td class="td">
                <button class='rem' onclick="location.href='type.php?remove=<?php echo $no; ?>'">Remove</button>
            </td>
            
        
        
    <?php       
        echo "</tr>";}
    ?>
    </table>
</div>
</div>
</body>
</html>