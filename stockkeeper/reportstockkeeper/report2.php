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
    <a href="type.php" class="navi"><img src="../../img/updateprice.png" class="image">&nbsp;&nbsp;COFFIN PRICES</a>
  <a href="id.php" class="navi"><img src="../../img/report.png" class="image">&nbsp;&nbsp;COFFIN ID REGISTRATION</a>
  <a href="moq.php" class="navi"><img src="../../img/updateprice.png" class="image">&nbsp;&nbsp;ADD/CHANGE MOQ</a>
  <a href="report1.php" class="navi"><img src="../../img/stock.png" class="image">&nbsp;&nbsp;STOCK DETAILS</a>
  <a href="report2.php" class="active"><img src="../../img/account.png" class="image">&nbsp;&nbsp;STOCK COUNT</a>
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
    $sql = "SELECT type.type, COUNT(id.id) , moq.moq FROM id, type, moq WHERE (id.timeout > CURDATE() OR id.timeout='0000-00-00') AND id.no = type.no AND type.type = moq.type GROUP BY type.type";
    $query=(mysqli_query($conn,$sql));
?>
<table class="tbl">
    <tr>
        <th colspan="2" align="left"><br><b style="color:white; font-size:24px; text-shadow:2px 2px 2px gray;">Stock Count</b></th> 
    </tr>

    <tr>
        <th class="th">Type</th>
        <th class="th">Remaining</th> 
        <th class="th">MOQ </th>
<?php
    while ($row = mysqli_fetch_assoc($query)){
         echo "<tr class='tr'>";
        
            echo "<td class='td'>";
            echo $row['type'];
            echo "</td>";

            echo "<td class='td'>";
            echo $row['COUNT(id.id)'];
            echo "</td>";

            echo "<td class='td'>";
            echo $row['moq'];
            echo "</td>";


         echo "</tr>";}
?>
</table>
</div>

<div style="position: fixed; width: 700px; height: 500px; margin-top: 40px;margin-left: 120px">
    <div>
        <div style="text-align: center" id="mychart1"></div>
    </div>
</div>
</div>
</body>
</html>