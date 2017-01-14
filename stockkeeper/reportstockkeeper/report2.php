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
<?php
require "dbcon/dbcon.php";

    $result = mysqli_query($conn, "SELECT COUNT(id.id) FROM id, type, moq WHERE id.timeout > CURDATE() AND id.no = type.no AND type.type = moq.type AND type.type = 'platinum'");
    $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
    $platinum = $result[0] ["COUNT(id.id)"];

    $result = mysqli_query($conn, "SELECT COUNT(id.id) FROM id, type, moq WHERE id.timeout > CURDATE() AND id.no = type.no AND type.type = moq.type AND type.type = 'gold'");
    $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
    $gold = $result[0] ["COUNT(id.id)"];

    $result = mysqli_query($conn, "SELECT COUNT(id.id) FROM id, type, moq WHERE id.timeout > CURDATE() AND id.no = type.no AND type.type = moq.type AND type.type = 'silver'");
    $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
    $silver = $result[0] ["COUNT(id.id)"];

    $result = mysqli_query($conn, "SELECT COUNT(id.id) FROM id, type, moq WHERE id.timeout > CURDATE() AND id.no = type.no AND type.type = moq.type AND type.type = 'bronze'");
    $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
    $bronze = $result[0] ["COUNT(id.id)"];



?>
<nav class="navi_menu" id="mySidenav">
  <?php include '../../details.php'; ?>
  <a href="../indexstockkeeper.php" class="navi"><img src="../../img/home.png" class="image">&nbsp;&nbsp;HOME</a>
  <a href="id.php" class="navi"><img src="../../img/report.png" class="image">&nbsp;&nbsp;COFFIN ID REGISTRATION</a>
  <a href="moq.php" class="navi"><img src="../../img/updateprice.png" class="image">&nbsp;&nbsp;ADD/CHANGE MOQ</a>
  <a href="report1.php" class="navi"><img src="../../img/stock.png" class="image">&nbsp;&nbsp;STOCK DETAILS</a>
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
<?php
    require "dbcon/dbcon.php";
    $sql = "SELECT type.type, COUNT(id.id) , moq.moq FROM id, type, moq WHERE (id.timeout > CURDATE() OR id.timeout='0000-00-00') AND id.no = type.no AND type.type = moq.type GROUP BY type.type";
    $query=(mysqli_query($conn,$sql));
?>
<table>
    <tr>
        <th>Type</th>
        <th>Remaining</th> 
        <th>MOQ </th>
<?php
    while ($row = mysqli_fetch_assoc($query)){
         echo "<tr>";
        
            echo "<td>";
            echo $row['type'];
            echo "</td>";

            echo "<td>";
            echo $row['COUNT(id.id)'];
            echo "</td>";

            echo "<td>";
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
<script type="text/javascript">
    
    function createGraph(platinum,gold,silver,bronze){
        $('#mychart1').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Current Coffin Levels'
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Number of Coffins'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.0f}'
                    }
                }
            },

            tooltip: {
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f}</b> <br/>'
            },

            series: [{
                colorByPoint: true,
                data: [{name: 'Platinum',
                        y:platinum,
                },{
                    name: 'Gold',
                    y:gold,
                }, {
                    name: 'Silver',
                    y:silver ,
                },{
                    name: 'Bronze',
                    y:bronze,
                }]
            }]
        });

    }
    var platinum = parseInt('<?php echo $platinum; ?>');
    var gold = parseInt('<?php echo $gold; ?>');
    var silver = parseInt('<?php echo $silver; ?>');
    var bronze = parseInt('<?php echo $bronze; ?>');
    createGraph(platinum,gold,silver,bronze);

</script>
