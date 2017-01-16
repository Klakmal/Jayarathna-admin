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
<title>Stock Details</title>
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
    background-color: #eee;
    margin-left: 200px;
    padding: 20px;
    border-radius: 10px;
}
    </style>
</head>
<body>
<nav class="navi_menu" id="mySidenav">
  <?php include '../../details.php'; ?>
  <a href="../indexstockkeeper.php" class="navi"><img src="../../img/home.png" class="image">&nbsp;&nbsp;HOME</a>
  <a href="id.php" class="navi"><img src="../../img/report.png" class="image">&nbsp;&nbsp;COFFIN ID REGISTRATION</a>
  <a href="moq.php" class="navi"><img src="../../img/updateprice.png" class="image">&nbsp;&nbsp;ADD/CHANGE MOQ</a>
  <a href="report1.php" class="active"><img src="../../img/stock.png" class="image">&nbsp;&nbsp;STOCK DETAILS</a>
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
    
<div id="id">
                <form method="post" action="report1.php">
                <table id="tb8">
                    <tr>
                        <th colspan="2" align="left"><b style="color:white; font-size:24px; text-shadow:2px 2px 2px gray;">ID</b></th> 
                    </tr>
                    <tr>
                    <td><label for="date1">From</label></td>
                    <td><input type="text" name="date1" placeholder="From"></td>
                    </tr> 
                    <tr>
                    <td><label for="date2">To</label></td>
                    <td><input type="text" name="date2" placeholder="To"></td>
                    </tr>
                    <tr>
                    <td colspan="2" align="center">
                    <input type="submit" value="Search" name="insert">
                    </td>
                    </tr>

                </table>
            
                </form>
            </div>  
<?php
                require "dbcon/dbcon.php";
                
                 if (isset($_POST['insert'])) {
                     
                     
                                $date1 = $_POST['date1'];
                            
                    
                                $date2 = $_POST['date2'];
                            
                $sql = "SELECT packname, COUNT(res_id) FROM reservations,id WHERE id.timein > '$date1' AND id.timein < '$date2' GROUP BY packname";
                $query=(mysqli_query($conn,$sql));


    require "dbcon/dbcon.php";
    $sql = "SELECT id.id, type.type, type.supplier, type.price, id.timein , id.timeout FROM id, type WHERE id.timein > '$date1' AND id.timein < '$date2'";
    $query=(mysqli_query($conn,$sql));
?>
<table>
    <tr>
        <th>ID</th> 
        <th>Type</th>
        <th>Supplier</th> 
        <th>Price</th>
        <th>Time In</th>
        <th>Time Out</th>
    </tr>
<?php
    while ($row = mysqli_fetch_assoc($query)){
         echo "<tr>";
        
            echo "<td>";
            echo $row['id'];
            echo "</td>";
                
            echo "<td>";
            echo $row['type'];
            echo "</td>";

            echo "<td>";
            echo $row['supplier'];
            echo "</td>";
                
            echo "<td>";
            echo $row['price'];
            echo "</td>";

             echo "<td>";
            echo $row['timein'];
            echo "</td>";
                
            echo "<td>";
            echo $row['timeout'];
            echo "</td>";


         echo "</tr>";}
?>
</table>
<?php
}
?>
</div>
</div>
</table>
</body>
</html>