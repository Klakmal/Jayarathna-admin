<?php
    include ('../manager/sessionManager.php');
?>
<html>
<head>
<title>type</title>
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
    margin-left: 100px;
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
</head>
<body>
<nav class="navi_menu" id="mySidenav">
  <?php include '../details.php'; ?>
  <a href="../manager/indexmanager.php" class="navi"><img src="../img/home.png" class="image">&nbsp;&nbsp;HOME</a>
  <a href="../manager/updateprices.php" class="navi"><img src="../img/updateprice.png" class="image">&nbsp;&nbsp;UPDATE PRICES</a>
  <a href="../report/payment.php" class="navi"><img src="../img/payments.png" class="image">&nbsp;&nbsp;PAYMENT</a>
  <a href="../report/supplier.php" class="navi"><img src="../img/supplier.png" class="image">&nbsp;&nbsp;SUPPLIER</a>
  <a href="../report/type.php" class="active"><img src="../img/678592-200.png" class="image">&nbsp;&nbsp;COFFIN PRICES</a>
  <a href="../report/report.php" class="navi"><img src="../img/report.png" class="image">&nbsp;&nbsp;REPORT</a>
</nav>
<div class="menu2" align="right">
    <div class="menu2in">
      <a href="../signout.php" class="myButton">Log Out</a>
    </div>
<div class="con1" align="center">
<div class="con2">
    <?php
                    
                require "dbcon/dbcon.php";
                     
                 if (isset($_POST['update'])) {
                     
                     			$no=$_POST["no"];

                                $type = $_POST['type'];
                            
                     
                                $supplier = $_POST['supplier'];
                            
                     
                                $price = $_POST['price'];
                            
                 
                 
               

                $sql = "UPDATE type SET price='$price' WHERE no='$no' OR (type='$type' AND supplier='$supplier')";

                if (mysqli_query($conn, $sql)) {
                    //echo '<script>alert("Record updated successfully")</script>';
                    echo "<script>window.location('location:type.php')</script>";
                } else {
                    echo "error" ;
                }
                }
                 
                if (isset($_POST['delete'])) {
                     
                     $no=$_POST["no"];
                    
                 

                $sql = "DELETE FROM type WHERE no='$no'";

                if (mysqli_query($conn, $sql)) {
                    //echo '<script>alert("Record deleted successfully")</script>';
                    echo "<script>window.location('location:type.php')</script>";
                } else {
                    echo "Error deleting record: " . mysqli_error($conn);
                }
                }
                   
                
                       
                 if (isset($_POST['insert'])) {
                     
                     
                                $no = $_POST['no'];
                            
                     
                                $price = $_POST['price'];
                            
                     
                                $type = $_POST['type'];
                            
                     
                                $supplier = $_POST['supplier'];
                            
                    
                    $sql = "INSERT INTO type (no,price,type,supplier)
                VALUES ('".$no."','".$price."','".$type."','".$supplier."')";

                if (mysqli_query($conn, $sql)) {
                    //echo '<script>alert("New record created successfully")</script>';
                    echo "<script>window.location('location:type.php')</script>";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }

                    
                    
                    
                }

                ?>

                <div id="type">
                <form method="post" action="type.php">
                <table id="tb6">
                    <tr>
                        <th colspan="2" align="left"><b style="color:white; font-size:24px; text-shadow:2px 2px 2px gray;">Coffin Prices</b></th> 
                    </tr>
                    <tr>
                    <td><label for="no">No</label></td>
                    <td><input type="text" name="no" placeholder="No"></td>
                    </tr>    
                    <tr>
                    <td><label for="type">Type</label></td>
                    <td><input type="text" name="type" placeholder="type"></td>
                    </tr>
                    <tr>
                    <tr>
                    <td><label for="supplier">Supplier</label></td>
                    <td><input type="text" name="supplier" placeholder="supplier"></td>
                    </tr>
                    <tr>
                    <td><label for="price">Price</label></td>
                    <td><input type="text" name="price" placeholder="Price"></td>
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
<?php
    require "dbcon/dbcon.php";
    $sql = "SELECT * FROM type";
    $query=(mysqli_query($conn,$sql));
?>
<table class="tbl">
    <tr>
        <th class="th">No</th> 
        <th class="th">Type</th> 
        <th class="th">Supplier</th>
        <th class="th">Price</th>
    </tr>
<?php
    while ($row = mysqli_fetch_assoc($query)){
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
        
           
        echo "</tr>";}
?>
    </table>
             </div>
         </div>
</div>
</div>
    </body>
</html>