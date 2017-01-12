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
<title>type</title>
  

<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../css/adminindex.css">
    <link rel="stylesheet" type="text/css" href="../../css/manage.css">
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
    margin-top: 100px;
}
.con2{
    padding-left: 150px; 
    width: 300px;
    height: 100%;
    margin-left: 150px;
}
.tb{
    width:100px;
    background-color: #aaa;
    padding: 3px;
}
.tb1{
    width: ;
}
.tb2{
    width:100px;
    float: center;
    background-color: white;
    padding: 3px;

}
</style>
</head>
<body>

<nav class="navi_menu" id="mySidenav">
  <div class="container">
    <div class="headdiv" align="center">
        <span class="headline">JAYARATNE FUNERALS</span>
    </div>
    <div class="navi_pro" align="center">
    <img class="propic" src="../../img_avatar_g2.jpg"><br>
    <p style="color:#aeb2b7;">Welcome,</p>
    <h4 class="name"><b>Kasun Lakmal</b></h4>
<!--    <p class="other">Jayarathna Funrels</p>-->
        <hr>
    </div>
      <div class="menutitlediv">
          <p class="menutitle">Menu</p>
      </div>
  </div>
  <a href="../indexstockkeeper.php" class="navi"><img src="../../img/home.png" class="image">&nbsp;&nbsp;HOME</a>
  <a href="id.php" class="navi"><img src="../../img/report.png" class="image">&nbsp;&nbsp;COFFIN ID REGISTRATION</a>
  <a href="moq.php" class="navi"><img src="../../img/updateprice.png" class="image">&nbsp;&nbsp;ADD/CHANGE MOQ</a>
  <a href="report1.php" class="navi"><img src="../../img/stock.png" class="image">&nbsp;&nbsp;STOCK DETAILS</a>
  <a href="report2.php" class="navi"><img src="../../img/account.png" class="image">&nbsp;&nbsp;STOCK COUNT</a>
  
</nav>
<div class="menu2" align="right">
    <div class="menu2in">
      <a href="../../signout.php" class="myButton">Log Out</a>
    </div>

<div class="con1" align="center">
<div class="con2">
    <?php
                    
                require "dbcon/dbcon.php";
                     $error=FALSE;
                        $typeerr = $moqerr = "";
                 if (isset($_POST['update'])) {
                     
                     if(empty($_POST['type'])){ 
                                $typeerr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $type = $_POST['type'];
                            }
                     if(empty($_POST['moq'])){ 
                                $moqerr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $moq = $_POST['moq'];
                            }
                 
                 
                if ($error==FALSE){

                $sql = "UPDATE moq SET moq='$moq' WHERE type='$type'";

                if (mysqli_query($conn, $sql)) {
                    //echo '<script>alert("Record updated successfully")</script>';
                    header('location:moq.php');
                } else {
                    echo "error" ;
                }
                }
                 }
                
                $error=FALSE;
                        $typeerr = $moqerr = "";
                 if (isset($_POST['insert'])) {
                    
                     if(empty($_POST['type'])){ 
                                $typeerr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $type = $_POST['type'];
                            }
                     if(empty($_POST['moq'])){ 
                                $moqerr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $moq = $_POST['moq'];
                            }
                    
                    $sql = "INSERT INTO moq (type,moq)
                VALUES ('".$type."','".$moq."')";

                if (mysqli_query($conn, $sql)) {
                    //echo '<script>alert("New record created successfully")</script>';
                    header('location:moq.php');
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }

                    
                    
                    
                }

                ?>

                <div id="type">
                <form method="post" action="moq.php">
                <table id="tb6">
                    <tr>
                        <th colspan="2" align="left"><b style="color:white; font-size:24px; text-shadow:2px 2px 2px gray;">Coffin Types</b></th> 
                    </tr>
                 
                    <tr>
                    <td><label for="type">Type</label><span class="error"><?php echo $typeerr;?></span></td>
                    <td><input type="text" name="type" placeholder="type"></td>
                    </tr>
                    <tr>
                    <tr>
                    <td><label for="moq">MOQ</label><span class="error"><?php echo $moqerr;?></span></td>
                    <td><input type="text" name="moq" placeholder="MOQ"></td>
                    </tr>
                   
                    
                        <td colspan="2" align="center">
                        <input type="submit" value="UPDATE" name="update">
                        <input type="submit" value="INSERT" name="insert">
                    </td>
                    
                    </tr>
                </table>
                </form>
                 </div>  
<?php
    require "dbcon/dbcon.php";
    $sql = "SELECT * FROM moq";
    $query=(mysqli_query($conn,$sql));
?>
<table>
    <tr>
        <th class="tb" >Type</th> 
        <th class="tb" >MOQ</th>
    </tr>
<?php
    while ($row = mysqli_fetch_assoc($query)){
         echo '<tr align="center">';
        
            echo '<td class="tb2">';
            echo $row['type'];
            echo "</td>";

            echo '<td class="tb2">';
            echo $row['moq'];
            echo "</td>";
        
           
        echo "</tr>";}
?>

    </table>

</div>

             </div>

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