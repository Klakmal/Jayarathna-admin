<html>
<head>
<title>Payment Report</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/adminindex.css">
    <link rel="stylesheet" type="text/css" href="../css/manage.css">
    <style>
    html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
    .w3-sidenav a,.w3-sidenav h4 {font-weight:bold}

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
<nav class="navi_menu" id="mySidenav"><br>
  <div class="container">
    <div class="navi_pro">
    <img class="propic" src="../img_avatar_g2.jpg"><br>
    <h4 class=""><b>Kasun Lakmal</b></h4>
    <p class=""><h3>STOCK MANAGMENT</h3></p>
    </div>
  </div>
  <a href="../manager/indexmanager.php" class="navi"><img src="../img/home.png" class="image">&nbsp;&nbsp;HOME</a>

  <a href="../report/report1.php" class="navi">&nbsp;&nbsp;REPORT1</a>
  <a href="../report/report2.php" class="navi">&nbsp;&nbsp;REPORT2</a>
  <a href="../report/supplierpayment.php" class="navi">&nbsp;&nbsp;Supplier Payment</a>
  <a href="../report/suppliertype.php" class="navi">&nbsp;&nbsp;Supplier/Type Details</a>
  <a href="../report/packages.php" class="navi">&nbsp;&nbsp;Packages</a>
  <a href="../report/customerinfo.php" class="navi">&nbsp;&nbsp;Customer Information</a>
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
    $sql = "SELECT supplierno, supplier, SUM(buy), SUM(pay), SUM(due) FROM payment GROUP BY supplierno";
    $query=(mysqli_query($conn,$sql));
?>
<table>
    <tr>
        <th>SupplierNo</th> 
        <th>Supplier</th>
        <th>Total Buy</th>
        <th>Total Pay</th>
        <th>Total Due</th>
    </tr>
<?php
    while ($row = mysqli_fetch_assoc($query)){
         echo "<tr>";
        
            echo "<td>";
            echo $row['supplierno'];
            echo "</td>";
                
            echo "<td>";
            echo $row['supplier'];
            echo "</td>";

            echo "<td>";
            echo $row['SUM(buy)'];
            echo "</td>";

             echo "<td>";
            echo $row['SUM(pay)'];
            echo "</td>";
            
             echo "<td>";
            echo $row['SUM(due)'];
            echo "</td>";

         echo "</tr>";}
?>
</div>
</div>
</table>
</body>
</html>