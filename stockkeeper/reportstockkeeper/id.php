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
<title>ID</title>
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
.containerx{
    width: 100%;
    height: 100%;
    background-color: ;
}
.container1{
    width: 500px;
    height: 100%;
    background-color: #eee  ;
    position: relative;
    margin-top: 100px;
    padding: 20px;
    border-radius: 10px;
}

input[type=text]:hover,[type=password]:hover{
    width: 200px;
    height: 30px;
    margin: 5px;
    border-radius: 10px;
    background-color: #fff;
    border:1px solid white;
    padding-left: 5px;
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
   input[type=button]{
        align-content:left;
        padding: 8px;
        
    }
</style>
<script>
function openWin() {
    window.open("http://www.w3schools.com","_blank");
}    
</script>
    
</head>
<body>
<nav class="navi_menu" id="mySidenav">
  <?php include '../../details.php'; ?>
  <a href="../indexstockkeeper.php" class="navi"><img src="../../img/home.png" class="image">&nbsp;&nbsp;HOME</a>
  <a href="type.php" class="navi"><img src="../../img/updateprice.png" class="image">&nbsp;&nbsp;COFFIN PRICES</a>
  <a href="id.php" class="active"><img src="../../img/report.png" class="image">&nbsp;&nbsp;COFFIN ID REGISTRATION</a>
  <a href="moq.php" class="navi"><img src="../../img/updateprice.png" class="image">&nbsp;&nbsp;ADD/CHANGE MOQ</a>
  <a href="report1.php" class="navi"><img src="../../img/stock.png" class="image">&nbsp;&nbsp;STOCK DETAILS</a>
  <a href="report2.php" class="navi"><img src="../../img/account.png" class="image">&nbsp;&nbsp;STOCK COUNT</a>
  <a href="graph.php" class="navi"><img src="../../img/stock.png" class="image">&nbsp;&nbsp;COFFIN LEVEL</a>

  
</nav>
<div class="menu2" align="right">
    <div class="menu2in">
      <a href="../../signout.php" class="myButton">Log Out</a>
    </div>
<div class="containerx" align="center">
<div class="container1">
</table>
    <?php
                require "dbcon/dbcon.php";
                $error=FALSE;
                $iderr =$counterr = $noerr = $timeouterr = "";
                 if (isset($_POST['insert'])) {
                     
                     if(empty($_POST['id'])){ 
                                $iderr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $id = $_POST['id'];
                            }
                     if(empty($_POST['count'])){ 
                                $counterr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $count = $_POST['count'];
                            }
                     if(empty($_POST['no'])){ 
                                $noerr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $no = $_POST['no'];
                            }
                    
                     
                    $status="out";
                    while($count>0){

                    $sql = "INSERT INTO id (id , no, status)
                VALUES ('".$id."','".$no."','".$status."')";
                if (mysqli_query($conn, $sql)) {
                   
                }
                else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }

                $id++;
            	$count--;}

                
                 }
                ?>
                <div id="id in">
                
                <form method="post" action="id.php">
                <table id="tb8">
                    <tr>
                        <th colspan="2" align="left"><b style="color:white; font-size:24px; text-shadow:2px 2px 2px gray;">Coffin IN</b></th> 
                    </tr>
                    <tr>
                    <td><label for="id">Start ID</label><span class="error"><?php echo $iderr;?></span></td>
                    <td><input type="text" name="id" placeholder="id"></td>
                    </tr> 
                     <tr>
                    <td><label for="count">Count</label><span class="error"><?php echo $counterr;?></span></td>
                    <td><input type="text" name="count" placeholder="count"></td>
                    </tr>
                    <tr>
                    <td><label for="no">No</label><span class="error"><?php echo $noerr;?></span></td>
                    <td><input type="text" name="no" placeholder="no"></td>
                    </tr>
                      
                    <tr>
                    <td colspan="2" align="center">
                    <input type="submit" value="INSERT" name="insert">
                    </td>
                    </tr>
                </table>
                </form>
                </div>

                
                
<?php
    require "dbcon/dbcon.php";
    $sql = "SELECT * FROM id";
    $query=(mysqli_query($conn,$sql));
?>
    <div class="clientbutton" align="right">
                <a href="client.php" onclick="window.open(window.location.href,'_blank');window.open(this.href,'_self');"><input type="button" value="Load ID log" name="clintbtn" ></a>
     </div>
<table class="tbl">
    <tr class="tr">
        <th class="th">ID</th> 
        <th class="th">No</th>
        <th class="th">Status</th>
        <th class="th">Time in</th>
        <th class="th">Time out</th>
    </tr>
<?php
    while ($row = mysqli_fetch_assoc($query)){
         echo '<tr class="tr" align="center">';
         $today=date("Y-m-d");
         
        if($row["timein"]== $today){
            echo '<td class="td">';
            echo $row['id'];
            echo "</td>";
                
            echo '<td class="td">';
            echo $row['no'];
            echo "</td>";

            echo '<td class="td">';
            echo $row['status'];
            echo "</td>";

            echo '<td class="td">';
            echo $row['timein'];
            echo "</td>";

            echo '<td class="td">';
            echo $row['timeout'];
            echo "</td>";
         echo "</tr>";}
     	}
?>       
</div> 
</div>
</body>
</html>