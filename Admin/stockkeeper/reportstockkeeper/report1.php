<html>
<head>
<title>Coffin Report</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/adminindex.css">
    <link rel="stylesheet" type="text/css" href="css/manage.css">
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
 <a href="../indexstockkeeper.php" class="navi"><img src="../../img/home.png" class="image">&nbsp;&nbsp;HOME</a>
  <a href="../reportstockkeeper/id.php" class="navi">&nbsp;&nbsp;Coffine ID Registration</a>
  <a href="../reportstockkeeper/moq.php" class="navi">&nbsp;&nbsp;Add/Change MOQ</a>

  <a href="report1.php" class="navi">&nbsp;&nbsp;Stock Details</a>
  <a href="report2.php" class="navi">&nbsp;&nbsp;Stock Count</a>
  
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
    $sql = "SELECT id.id, type.type, type.supplier, type.price, id.timein , id.timeout FROM id, type WHERE id.no = type.no";
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
</div>
</div>
</table>
</body>
</html>