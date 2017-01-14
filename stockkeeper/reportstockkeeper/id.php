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


.tb{
    width:100px;
    background-color: #aaa;
}
.tb1{
    width: ;
}
.tb2{
    width:100px;
    float: center;
    background-color: white;
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
  <a href="graph.php" class="navi"><img src="../../img/account.png" class="image">&nbsp;&nbsp;COFFIN LEVEL</a>

  
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
                     /*if(empty($_POST['timein'])){ 
                                $timeinerr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $timein = $_POST['timein'];
                            }*/
                     $timein = date("Y/m/d");

                     if(empty($_POST['timeout'])){ 
                                $timeouterr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $timeout = $_POST['timeout'];
                            }
                    $status="out";
                    while($count>0){

                    $sql = "INSERT INTO id (id , no, status,timein ,timeout)
                VALUES ('".$id."','".$no."','".$status."','".$timein."','".$timeout."')";
                if (mysqli_query($conn, $sql)) {
                    header('location:id.php');
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
                    <!-- <tr>
                    <td><label for="timein">TimeIn</label><span class="error"><?php echo $timeinerr;?></span></td>
                    <td><input type="text" name="timein" placeholder="Timein"></td>
                    </tr> 
                    <tr>
                    <td><label for="timeout">TimeOut</label><span class="error"><?php echo $timeouterr;?></span></td>
                    <td><input type="text" name="timeout" placeholder="Timeout"></td>
                    </tr>    
                    <tr>-->
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
<table>
    <tr>
        <th class="tb">ID</th> 
        <th class="tb">No</th>
        <th class="tb">Status</th>
        <th class="tb">Time in</th>
        <th class="tb">Time out</th>
    </tr>
<?php
    while ($row = mysqli_fetch_assoc($query)){
         echo '<tr class="tb1" align="center">';
         $today=date("Y-m-d");
         
        if($row["timein"]== $today){
            echo '<td class="tb2">';
            echo $row['id'];
            echo "</td>";
                
            echo '<td class="tb2">';
            echo $row['no'];
            echo "</td>";

            echo '<td class="tb2">';
            echo $row['status'];
            echo "</td>";

            echo '<td class="tb2">';
            echo $row['timein'];
            echo "</td>";

            echo '<td class="tb2">';
            echo $row['timeout'];
            echo "</td>";
         echo "</tr>";}
     	}
?>       
</div> 
</div>
</body>
</html>