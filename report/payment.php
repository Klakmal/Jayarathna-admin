<?php
    include ('../manager/sessionManager.php');
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
  <a href="../manager/indexmanager.php" class="navi"><img src="../img/home.png" class="image">&nbsp;&nbsp;HOME</a>
  <a href="../manager/updateprices.php" class="navi"><img src="../img/updateprice.png" class="image">&nbsp;&nbsp;UPDATE PRICES</a>
  <a href="../report/payment.php" class="active"><img src="../img/payments.png" class="image">&nbsp;&nbsp;PAYMENT</a>
  <a href="../report/supplier.php" class="navi"><img src="../img/supplier.png" class="image">&nbsp;&nbsp;SUPPLIER</a>
  <a href="../report/type.php" class="navi"><img src="../img/678592-200.png" class="image">&nbsp;&nbsp;COFFIN PRICES</a>
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
                
                 if (isset($_POST['insert'])) {
                     
                     
                                $supplierno = $_POST['supplierno'];
                            
                     
                                $supplier = $_POST['supplier'];
                            
                     
                                $date = $_POST['date'];
                            
                     
                                $buy = $_POST['buy'];
                           
                     
                                $pay = $_POST['pay'];
                    

                                $due = $buy - $pay ;
                    
                    $sql = "INSERT INTO payment (supplierno,supplier,date,buy, pay, due)
                VALUES ('".$supplierno."','".$supplier."','".$date."','".$buy."','".$pay."','".$due."')";

                if (mysqli_query($conn, $sql)) {
                    //echo '<script>alert("New record created successfully")</script>';
                    echo "<script>window.location('location:payment.php');</script>";
                }
                else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                 }
    ?>
<form method="post" action="payment.php">
                <table id="tb7">
                    <tr>
                        <th colspan="2" align="left"><b style="color:white; font-size:24px; text-shadow:2px 2px 2px gray;">Coffin Types</b></th> 
                    </tr>
                    <tr>
                    <td><label for="supplierno">Supplier No</label></td>
                    <td><input type="text" name="supplierno" placeholder="SupplierNo" required></td>
                    </tr> 
                    <tr>
                    <td><label for="supplier">Supplier</label></td>
                    <td><input type="text" name="supplier" placeholder="supplier" required></td>
                    </tr>   
                    <tr>
                    <td><label for="date">Date</label></td>
                    <td><input type="text" name="date" placeholder="Date" required></td>
                    </tr>
                    <tr>
                    <tr>
                    <td><label for="buy">Buy</label></td>
                    <td><input type="text" name="buy" placeholder="Buy"></td>
                    </tr>
                    <tr>
                    <td><label for="pay">Pay</label></td>
                    <td><input type="text" name="pay" placeholder="Pay"></td>
                    </tr>
                    <tr>
                    <td colspan="2" align="center">
                    <input type="submit" value="INSERT" name="insert">
                    </td>
                    </tr>
                </table>
                </form>
<?php
    require "dbcon/dbcon.php";
    $sql = "SELECT * FROM payment";
    $query=(mysqli_query($conn,$sql));
?>
<table>
    <tr>
        <th class="tb">SupplierNo</th> 
        <th class="tb">Supplier</th>
        <th class="tb" >Date</th> 
        <th class="tb" >Buy</th>
        <th class="tb" >Pay</th>
        <th class="tb" >Due</th>
    </tr>
<?php
    while ($row = mysqli_fetch_assoc($query)){
         echo '<tr class="tb1">';
        
            echo '<td class="tb2">';
            echo $row['supplierno'];
            echo "</td>";
                
            echo '<td class="tb2">';
            echo $row['supplier'];
            echo "</td>";

            echo '<td class="tb2">';
            echo $row['date'];
            echo "</td>";
        
            echo '<td class="tb2">';
            echo $row['buy'];
            echo "</td>";

             echo '<td class="tb2">';
            echo $row['pay'];
            echo "</td>";
            
             echo '<td class="tb2">';
            echo $row['due'];
            echo "</td>";
         echo "</tr>";}
?>
</table>
    
</table>
  
</div>
</div>         
</body>
</html>