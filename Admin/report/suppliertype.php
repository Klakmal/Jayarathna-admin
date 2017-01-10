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
                $error=FALSE;
                $frmerr = $toerr = $suppliererr=  $typeerr = "";
                if (isset($_POST['insert'])) {
                     
                     if(empty($_POST['supplier'])){ 
                                $suppliererr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $supplier = $_POST['supplier'];
                            }
                     if(empty($_POST['type'])){ 
                                $typeerr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $type = $_POST['type'];
                            }
                     if(empty($_POST['frm'])){ 
                                $frmerr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $frm = $_POST['frm'];
                            }
                     if(empty($_POST['to'])){ 
                                $toerr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $to = $_POST['to'];
                            }

                    $sql = "SELECT count(id.id), sum(type.price) FROM type, id WHERE '$frm' < id.timein< '$to' AND id.no=type.no AND type='$type' AND supplier='$supplier' GROUP BY supplier";
                    $query=(mysqli_query($conn,$sql));

?>
<table>
    <tr>
        <th>No of in</th>
        <th>Total Price</th>
    </tr>
<?php
    while ($row = mysqli_fetch_assoc($query)){
         echo "<tr>";
        
            /*echo "<td>";
            echo $row['supplier'];
            echo "</td>";

            echo "<td>";
            echo $row['type'];
            echo "</td>";
*/
            echo "<td>";
            echo $row['count(id.id)'];
            echo "</td>";
            
            echo "<td>";
            echo $row['sum(type.price)'];
            echo "</td>";

         echo "</tr>";}
?>
</table>
<?php
}
?>
<br>
        <div id="type">
                <form method="post" action="suppliertype.php">
                <table id="tb9">
                    <tr>
                    <th colspan="2" align="left"><b style="color:white; font-size:24px; text-shadow:2px 2px 2px gray;">Coffin Suppliers  Details</b></th> 
                    </tr>
                    <tr>
                    <td><label for="frm">From</label><span class="error"><?php echo $frmerr;?></span></td>
                    <td><input type="text" name="frm" placeholder="From"></td>
                    </tr> 
                    <tr>
                    <td><label for="to">To</label><span class="error"><?php echo $toerr;?></span></td>
                    <td><input type="text" name="to" placeholder="To"></td>
                    </tr> 
                    <tr>
                    <td><label for="supplier">Supplier</label><span class="error"><?php echo $suppliererr;?></span></td>
                    <td><input type="text" name="supplier" placeholder="Supplier"></td>
                    </tr> 
                    <tr>
                    <td><label for="type">Type</label><span class="error"><?php echo $typeerr;?></span></td>
                    <td><input type="text" name="type" placeholder="Type"></td>
                    </tr> 
                    <tr>
                        <td colspan="2" align="center">
                        <input type="submit" value="SEARCH" name="insert">
                    </td>
                    </tr>
</table>
</form>
</div>
</div>
</div>
</body>
</html>

