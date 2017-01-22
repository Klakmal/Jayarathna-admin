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
    width: 650px;
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
}   </style>
</head>
<body>
<nav class="navi_menu" id="mySidenav">
  <?php include '../details.php'; ?>
  <a href="../manager/indexmanager.php" class="navi"><img src="../img/home.png" class="image">&nbsp;&nbsp;HOME</a>
  <a href="supplierpayment.php" class="active"><img src="../img/payments.png" class="image">&nbsp;&nbsp;SUPPLIER PAYMENT</a>
  <a href="suppliertype.php" class="navi"><img src="../img/supplier.png" class="image">&nbsp;&nbsp;SUPPLIER/TYPE DETAILES</a>
  <a href="packages.php" class="navi"><img src="../img/package.png" class="image">&nbsp;&nbsp;PACKAGES</a>
    <a href="../manager/moq.php" class="navi"><img src="../img/updateprice.png" class="image">&nbsp;&nbsp;ADD/CHANGE MOQ</a>
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
<table class="tbl">
    <tr>
    <th colspan="2" align="left"><b style="color:white; font-size:24px; text-shadow:2px 2px 2px gray;">Total Supplier Payments</b></th> 
    </tr>
    <tr class="tr">
        <th class="th">SupplierNo</th> 
        <th class="th">Supplier</th>
        <th class="th">Total Buy</th>
        <th class="th">Total Pay</th>
        <th class="th">Total Due</th>
    </tr>
<?php
    while ($row = mysqli_fetch_assoc($query)){
         echo "<tr class='tr'>";
        
            echo "<td class='td'>";
            echo $row['supplierno'];
            echo "</td>";
                
            echo "<td class='td'>";
            echo $row['supplier'];
            echo "</td>";

            echo "<td class='td'>";
            echo $row['SUM(buy)'];
            echo "</td>";

             echo "<td class='td'>";
            echo $row['SUM(pay)'];
            echo "</td>";
            
             echo "<td class='td'>";
            echo $row['SUM(due)'];
            echo "</td>";

         echo "</tr>";}
?>
</div>
</div>
</table>
</body>
</html>