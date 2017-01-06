<html>
<head>
<title>Payment</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/adminindex.css">
    <link rel="stylesheet" type="text/css" href="../css/manage.css">
    <style>
    html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
    .w3-sidenav a,.w3-sidenav h4 {font-weight:bold}
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
<nav class="navi_menu" id="mySidenav"><br>
  <div class="container">
    <div class="navi_pro">
    <img class="propic" src="../img_avatar_g2.jpg"><br>
    <h4 class=""><b>Kasun Lakmal</b></h4>
    <p class=""><h3>STOCK MANAGMENT</h3></p>
    </div>
  </div>
  <a href="../manager/indexmanager.php" class="navi"><img src="../img/home.png" class="image">&nbsp;&nbsp;HOME</a>
  <a href="../report/id.php" class="navi">&nbsp;&nbsp;ID</a>
  <a href="../report/moq.php" class="navi">&nbsp;&nbsp;TYPE MOQ</a>
  <a href="../report/payment.php" class="navi">&nbsp;&nbsp;PAYMENT</a>
  <a href="../report/supplier.php" class="navi">&nbsp;&nbsp;SUPPLIER</a>
  <a href="../report/type.php" class="navi">&nbsp;&nbsp;COFFIN TYPES</a>
  <a href="report.php" class="navi">&nbsp;&nbsp;REPORT</a>
</nav>
<div class="menu2" align="right">
    <div class="menu2in">
      <a href="../signout.php" class="myButton">Log Out</a>
    </div>

<div class="con1" align="center">
<div class="con2">
<?php
                require "dbcon/dbcon.php";
                $error=FALSE;
                $suppliernoerr = $dateerr =$buyerr = $suppliererr = $payerr = "";
                 if (isset($_POST['insert'])) {
                     
                     if(empty($_POST['supplierno'])){ 
                                $suppliernoerr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $supplierno = $_POST['supplierno'];
                            }
                     if(empty($_POST['supplier'])){ 
                                $suppliererr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $supplier = $_POST['supplier'];
                            }
                     if(empty($_POST['date'])){ 
                                $dateerr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $date = $_POST['date'];
                            }
                     if(empty($_POST['buy'])){ 
                                $buyerr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $buy = $_POST['buy'];
                            }
                     if(empty($_POST['pay'])){ 
                                $payerr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $pay = $_POST['pay'];
                            }
                            

                                $due = $buy - $pay ;
                    
                    $sql = "INSERT INTO payment (supplierno,supplier,date,buy, pay, due)
                VALUES ('".$supplierno."','".$supplier."','".$date."','".$buy."','".$pay."','".$due."')";

                if (mysqli_query($conn, $sql)) {
                    //echo '<script>alert("New record created successfully")</script>';
                    header('location:payment.php');
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
                    <td><label for="supplierno">Supplier No</label><span class="error"><?php echo $suppliernoerr;?></span></td>
                    <td><input type="text" name="supplierno" placeholder="SupplierNo"></td>
                    </tr> 
                    <tr>
                    <td><label for="supplier">Supplier</label><span class="error"><?php echo $suppliererr;?></span></td>
                    <td><input type="text" name="supplier" placeholder="supplier"></td>
                    </tr>   
                    <tr>
                    <td><label for="date">Date</label><span class="error"><?php echo $dateerr;?></span></td>
                    <td><input type="text" name="date" placeholder="Date"></td>
                    </tr>
                    <tr>
                    <tr>
                    <td><label for="buy">Buy</label><span class="error"><?php echo $buyerr;?></span></td>
                    <td><input type="text" name="buy" placeholder="Buy"></td>
                    </tr>
                    <tr>
                    <td><label for="pay">Pay</label><span class="error"><?php echo $payerr;?></span></td>
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