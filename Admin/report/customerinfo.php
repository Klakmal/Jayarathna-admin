<html>
<head>
<title>Coffin Report</title>
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
    background-color: #eee;
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

  <a href="supplierpayment.php" class="navi">&nbsp;&nbsp;Supplier Payment</a>
  <a href="suppliertype.php" class="navi">&nbsp;&nbsp;Supplier/Type Details</a>
  <a href="packages.php" class="navi">&nbsp;&nbsp;Packages</a>
  <a href="customerinfo.php" class="navi">&nbsp;&nbsp;Customer Information</a>
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
                $cusnameerr=  "";
                 if (isset($_POST['insert'])) {
                     
                     if(empty($_POST['cusname'])){ 
                                $cusnameerr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $cusname = $_POST['cusname'];
                            }
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
                    <td><label for="cusname">Customer Name</label><span class="error"><?php echo $cusnameerr;?></span></td>
                    <td><input type="text" name="cusname" placeholder="Customer Name"></td>
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