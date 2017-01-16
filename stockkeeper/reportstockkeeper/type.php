<?php
    require "../../dbcon/dbcon.php";
    session_start();// Starting Session
    // Storing Session
    $checkID = $_SESSION['employeeid'];
    $ses_sql= "SELECT * FROM employee WHERE employeeid = '".$checkID."'";
    $query = mysqli_query($conn,$ses_sql);
    $res = mysqli_fetch_array($query);
    $login_session = $res['position'];
    if($login_session != 'stockkeeper'){
        mysql_close($conn); // Closing Connection
        header('Location: ../../index.php'); // Redirecting To Home Page
    }
?>
<html>
<head>
<title>Coffin Report</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../css/adminindex.css">
    <link rel="stylesheet" type="text/css" href="../../css/manage.css">
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
    
</head>
<body>
<nav class="navi_menu" id="mySidenav">
  <?php include '../../details.php'; ?>
  <a href="../indexstockkeeper.php" class="navi"><img src="../../img/home.png" class="image">&nbsp;&nbsp;HOME</a>
  <a href="type.php" class="active"><img src="../../img/updateprice.png" class="image">&nbsp;&nbsp;COFFIN PRICES</a>
  <a href="id.php" class="navi"><img src="../../img/report.png" class="image">&nbsp;&nbsp;COFFIN ID REGISTRATION</a>
  <a href="moq.php" class="navi"><img src="../../img/updateprice.png" class="image">&nbsp;&nbsp;ADD/CHANGE MOQ</a>
  <a href="report1.php" class="navi"><img src="../../img/stock.png" class="image">&nbsp;&nbsp;STOCK DETAILS</a>
  <a href="report2.php" class="navi"><img src="../../img/account.png" class="image">&nbsp;&nbsp;STOCK COUNT</a>
  <a href="graph.php" class="navi"><img src="../../img/stock.png" class="image">&nbsp;&nbsp;COFFIN LEVEL</a>
  
</nav>

<div class="menu2" align="right" style="margin-bottom: 100px;">
    <div class="menu2in">
      <a href="../../signout.php" class="myButton">Log Out</a>
    </div>
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
                            
                 
                 
                if ($error==FALSE){

                $sql = "UPDATE type SET price='$price' WHERE no='$no' OR (type='$type' AND supplier='$supplier')";

                if (mysqli_query($conn, $sql)) {
                    //echo '<script>alert("Record updated successfully")</script>';
                    header('location:type.php');
                } else {
                    echo "error" ;
                }
                }
                 }
                if (isset($_POST['delete'])) {
                     
                     $no=$_POST["no"];
                    
                 

                $sql = "DELETE FROM type WHERE no='$no'";

                if (mysqli_query($conn, $sql)) {
                    //echo '<script>alert("Record deleted successfully")</script>';
                    header('location:type.php');
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
                    //echo '<script>alert("New record created successfully")</script>';
                    header('location:type.php');
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

    </body>
</html>