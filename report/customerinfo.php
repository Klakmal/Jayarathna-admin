<?php
    include ('../manager/sessionManager.php');
?>
<html>
<head>
<title>Coffin Report</title>
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
    background-color: #eee;
    margin-left: 200px;
    padding: 20px;
    border-radius: 10px;
}

    </style>
</head>
<body>
<nav class="navi_menu" id="mySidenav">
  <?php include '../details.php'; ?>
  <a href="../manager/indexmanager.php" class="navi"><img src="../img/home.png" class="image">&nbsp;&nbsp;HOME</a>
  <a href="supplierpayment.php" class="navi"><img src="../img/payments.png" class="image">&nbsp;&nbsp;SUPPLIER PAYMENT</a>
  <a href="suppliertype.php" class="navi"><img src="../img/supplier.png" class="image">&nbsp;&nbsp;SUPPLIER/TYPE DETAILES</a>
  <a href="customerinfo.php" class="active"><img src="../img/account.png" class="image">&nbsp;&nbsp;CUSTOMER INFORMATION</a>
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
                
                 if (isset($_POST['insert'])) {
                     
                     
                                $cusname = $_POST['cusname'];
                            
    $sql = "SELECT cusname, deadname, connumber, address, email, gender, nic FROM customers WHERE cusname = '$cusname'";
    $query=(mysqli_query($conn,$sql));
?>
<table>
    <tr> 
        <th>Customer Name</th>
        <th>Dead Person Name</th> 
        <th>Contact Number</th>
        <th>Address</th>
        <th>Email</th>
        <th>Gender</th>  
        <th>NIC</th>
    </tr>

<?php
    while ($row = mysqli_fetch_assoc($query)){
         echo "<tr>";
                
            echo "<td>";
            echo $row['cusname'];
            echo "</td>";

            echo "<td>";
            echo $row['deadname'];
            echo "</td>";

            echo "<td>";
            echo $row['connumber'];
            echo "</td>";
                
            echo "<td>";
            echo $row['address'];
            echo "</td>";

             echo "<td>";
            echo $row['email'];
            echo "</td>";
                
            echo "<td>";
            echo $row['gender'];
            echo "</td>";

            echo "<td>";
            echo $row['nic'];
            echo "</td>";

         echo "</tr>";}
?>
</table>
<?php
}
?>

<div id="id">
                <form method="post" action="customerinfo.php">
                <table id="tb11">
                    <tr>
                        <th colspan="2" align="left"><b style="color:white; font-size:24px; text-shadow:2px 2px 2px gray;">ID</b></th> 
                    </tr>
                    <tr>
                    <td><label for="cusname">Customer Name</label></td>
                    <td><input type="text" name="cusname" placeholder="Customer Name" required></td>
                    </tr> 
                    <tr>
                    <td colspan="2" align="center">
                    <input type="submit" value="Search" name="insert">
                    </td>
                    </tr>

                </table>
            
                </form>
                </div>  

</div>
</div>
</table>
</body>
</html>