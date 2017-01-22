<?php
    include ('../manager/sessionManager.php');
?>
<html> 
<head>
<title>Supplier Detail</title>
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
    width: 800px;
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
    width: 900px;
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
</style>
</head>
<body>
<nav class="navi_menu" id="mySidenav">
  <?php include '../details.php'; ?>
  <a href="../manager/indexmanager.php" class="navi"><img src="../img/home.png" class="image">&nbsp;&nbsp;HOME</a>
  <a href="../manager/type.php" class="navi"><img src="../img/updateprice.png" class="image">&nbsp;&nbsp;COFFIN PRICES</a>
  <a href="../manager/updateprices.php" class="navi"><img src="../img/updateprice.png" class="image">&nbsp;&nbsp;UPDATE PRICES</a>
  <a href="payment.php" class="navi"><img src="../img/payments.png" class="image">&nbsp;&nbsp;PAYMENT</a>
  <a href="supplier.php" class="active"><img src="../img/supplier.png" class="image">&nbsp;&nbsp;SUPPLIER</a>
  <a href="../manager/moq.php" class="navi"><img src="../img/updateprice.png" class="image">&nbsp;&nbsp;ADD/CHANGE MOQ</a>
</nav>
<div class="menu2" align="right">
    <div class="menu2in">
      <a href="../signout.php" class="myButton">Log Out</a>
    </div>
<div class="con1" align="center">
<div class="con2">
                
                <?php
                    require "dbcon/dbcon.php";
                    if ($_GET['update']){
                        $no = $_GET['update'];
                        $sql1 = 'SELECT * FROM supplier WHERE supplierno = "'.$_GET['update'].'"';
                        $result1 = mysqli_query($conn,$sql1);
                        if ($row0 = mysqli_fetch_assoc($result1)){
                ?>
                <div id="type">
                <form method="post" action="updatesupp.php">
                <table id="tb6">
                    <tr>
                        <th colspan="2" align="left"><b style="color:white; font-size:24px; text-shadow:2px 2px 2px gray;">Coffin Suppliers Details</b><br><br></th> 
                    </tr>
                    <tr>
                    <td><label for="no">Supplier No</label></td>
                    <td> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row0['supplierno']; ?> <input type="hidden" name="supplierno" value="<?php echo $row0['supplierno']; ?>"></td>
                    </tr> 
                    <tr>
                    <td><label for="supplier">Supplier</label></td>
                    <td><input type="text" name="supplier" value="<?php echo $row0['supplier']; ?>" placeholder="Supplier"></td>
                    </tr>   
                    <tr>
                    <td><label >Type</label></td>
                    <td>
                        <input type="checkbox" name=types[] value="platinum" checked>Platinum
                        <input type="checkbox" name=types[] value="gold" checked>Gold
                        <input type="checkbox" name=types[] value="silver" checked>Silver
                        <input type="checkbox" name=types[] value="bronze" checked>Bronze
                    </td>
                    </tr>
                    <tr>
                    <td><label for="address">Address</label></td>
                    <td><input type="text" name="address" value="<?php echo $row0['address']; ?>" placeholder="Address"></td>
                    <tr>
                    <tr>
                    <td><label for="contactno">Contactno</label></td>
                    <td><input type="text" name="contactno" value="<?php echo $row0['contactno']; ?>" placeholder="Contactno"></td>
                    </tr>
                    <tr>
                    <tr>
                    <td><label for="email">E-mail</label></td>
                    <td><input type="text" name="email" value="<?php echo $row0['email']; ?>" placeholder="Email"></td>
                    </tr>
                    <tr>
                    
                        <td colspan="2" align="center">
                        <input type="submit" value="UPDATE" name="submit">
                    </td>
                    
                    </tr>
                </table>
                </form>
                 </div>  
    
                
            <?php
                        }
                    }
            ?>

             </div>
         </div>

   </div>
    </body>
</html>