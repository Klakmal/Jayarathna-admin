<html>
<head>
<title>ID</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/adminindex.css">
    <link rel="stylesheet" type="text/css" href="../css/manage.css">
    <style>
    html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
    .w3-sidenav a,.w3-sidenav h4 {font-weight:bold}
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
<nav class="navi_menu" id="mySidenav"><br>
  <div class="container">
    <div class="navi_pro">
    <img class="propic" src="../img_avatar_g2.jpg"><br>
    <h4 class=""><b>Kasun Lakmal</b></h4>
    <p class=""><h3>STOCK MANAGMENT</h3></p>
    </div>
  </div>
  <a href="../manager/indexmanager.php" class="navi"><img src="../img/home.png" class="image">&nbsp;&nbsp;HOME</a>
  <a href="../report/id.php" class="navi">&nbsp;&nbsp;ID</a>
  <a href="../report/moq.php" class="navi">&nbsp;&nbsp;TYPE MOQ</a>
  <a href="../report/payment.php" class="navi">&nbsp;&nbsp;PAYMENT</a>
  <a href="../report/supplier.php" class="navi">&nbsp;&nbsp;SUPPLIER</a>
  <a href="../report/type.php" class="navi">&nbsp;&nbsp;COFFIN TYPES</a>
  <a href="report.php" class="navi">&nbsp;&nbsp;REPORT</a>
</nav>
<div class="menu2" align="right">
    <div class="menu2in">
      <a href="../signout.php" class="myButton">Log Out</a>
    </div>
<div class="containerx" align="center">
<div class="container1">
</table>
 <?php
                require "dbcon/dbcon.php";
                $error=FALSE;
                $iderr = $timeouterr = "";
                 if (isset($_POST['insert'])) {
                     
                     if(empty($_POST['id'])){ 
                                $iderr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $id = $_POST['id'];
                            }
                     /*if(empty($_POST['no'])){ 
                                $noerr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $no = $_POST['no'];
                            }
                     if(empty($_POST['timein'])){ 
                                $timeinerr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $timein = $_POST['timein'];
                            }
                     $timein = date("Y/m/d");*/

                     if(empty($_POST['timeout'])){ 
                                $timeouterr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $timeout = $_POST['timeout'];
                            }
                    
                    
                    $sql = "UPDATE id SET timeout='$timeout' WHERE id='$id'";
                
                if (mysqli_query($conn, $sql)) {
                    header('location:idout.php');
                }
                else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                 }
                ?>
                <div id="id out">
                <form method="post" action="idout.php">
                <table id="tb8">
                    <tr>
                        <th colspan="2" align="left"><b style="color:white; font-size:24px; text-shadow:2px 2px 2px gray;">Coffin OUT</b></th> 
                    </tr>
                    <tr>
                    <td><label for="id">ID</label><span class="error"><?php echo $iderr;?></span></td>
                    <td><input type="text" name="id" placeholder="id"></td>
                    </tr> 
                    <!--tr>
                    <td><label for="no">No</label><span class="error"><?php echo $noerr;?></span></td>
                    <td><input type="text" name="no" placeholder="no"></td>
                    </tr>
                    <tr>
                    <td><label for="timein">TimeIn</label><span class="error"><?php echo $timeinerr;?></span></td>
                    <td><input type="text" name="timein" placeholder="Timein"></td>
                    </tr>--> 
                    <tr>
                    <td><label for="timeout">TimeOut</label><span class="error"><?php echo $timeouterr;?></span></td>
                    <td><input type="text" name="timeout" placeholder="Timeout"></td>
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
<table>
    <tr>
        <th class="tb">ID</th> 
        <th class="tb">No</th>
        <th class="tb">Time in</th>
        <th class="tb">Time out</th>
    </tr>
<?php
    while ($row = mysqli_fetch_assoc($query)){
         echo '<tr class="tb1" align="center">';
        
            echo '<td class="tb2">';
            echo $row['id'];
            echo "</td>";
                
            echo '<td class="tb2">';
            echo $row['no'];
            echo "</td>";

            echo '<td class="tb2">';
            echo $row['timein'];
            echo "</td>";

            echo '<td class="tb2">';
            echo $row['timeout'];
            echo "</td>";
         echo "</tr>";}
?>       
</div> 
</div>
</body>
</html>