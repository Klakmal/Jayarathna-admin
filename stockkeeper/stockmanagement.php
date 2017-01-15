<?php
    include ('sessionStockkeeper.php');
?>
<html>
    <head>
    <title>Stock Keeper</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/adminindex.css">
    <link rel="stylesheet" type="text/css" href="../css/manage.css">
    <style>
    html,body,h1,h2,h3,h4,h5 {font-family: 'Ruda', sans-serif;}
    .w3-sidenav a,.w3-sidenav h4 {font-weight:bold;}
    </style>
    </head>
    <body>

<nav class="navi_menu" id="mySidenav">
  <?php include '../details.php'; ?>
  <a href="indexstockkeeper.php" class="navi"><img src="../img/home.png" class="image">&nbsp;&nbsp;HOME</a>
  <a href="reportstockkeeper/id.php" class="navi"><img src="../img/report.png" class="image">&nbsp;&nbsp;COFFIN ID REGISTRATION</a>
  <a href="reportstockkeeper/moq.php" class="navi"><img src="../img/updateprice.png" class="image">&nbsp;&nbsp;ADD/CHANGE MOQ</a>
  <a href="reportstockkeeper/report1.php" class="navi"><img src="../img/stock.png" class="image">&nbsp;&nbsp;STOCK DETAILS</a>
  <a href="reportstockkeeper/report2.php" class="navi"><img src="../img/account.png" class="image">&nbsp;&nbsp;STOCK COUNT</a>
  <a href="reportstockkeeper/graph.php" class="navi"><img src="../img/stock.png" class="image">&nbsp;&nbsp;COFFIN LEVEL</a>
  
</nav>

<div class="menu2" align="right">
    <div class="menu2in">
      <a href="../signout.php" class="myButton">Log Out</a>
    </div>
  </div>
        
<div class="con1" align="center">
<div class="con2">
    <?php
                    
                require "../dbcon/dbcon.php";
                     $error=FALSE;
                    $iderr = $noerr = "";
                 if (isset($_POST['update'])) {
                     
                     if(empty($_POST['id'])){ 
                                $iderr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $id = $_POST['id'];
                            }
                     if(empty($_POST['no'])){ 
                                $noerr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $no = $_POST['no'];
                            }
                 
                 
                if ($error==FALSE){

                $sql = "UPDATE id SET no='$no' WHERE id='$id'";

                if (mysqli_query($conn, $sql)) {
                    echo '<script>window.location("Record updated successfully")</script>';
                } else {
                    echo "error" ;
                }
            }
        }
    

                ?>

                <div id="type">
                <form method="post" action="stockmanagement.php">
                <table id="tb6">
                    <tr>
                        <th colspan="2" align="left"><b style="color:white; font-size:24px; text-shadow:2px 2px 2px gray;">Coffin Types</b></th> 
                    </tr>
                 
                    <tr>
                    <td><label for="type">ID : </label><span class="error"><?php echo $iderr;?></span></td>
                    <td><input type="text" name="id" placeholder="ID"></td>
                    </tr>
                    <tr>
                    <td><label for="moq">NO : </label><span class="error"><?php echo $noerr;?></span></td>
                    <td><input type="text" name="no" placeholder="NO"></td>
                    </tr>
                   
                    
                        <td colspan="2" align="center">
                        <input type="submit" value="UPDATE" name="update">
                    </td>
                    
                    </tr>
                </table>
                </form>
                 </div>  
<?php
    require "../dbcon/dbcon.php";
    $sql = "SELECT * FROM id WHERE no = 0";
    $query=(mysqli_query($conn,$sql));
?>
<table>
    <tr>
        <th class="tb" >ID</th> 
        <th class="tb" >Timein</th>
    </tr>
<?php
    while ($row = mysqli_fetch_assoc($query)){
         echo '<tr align="center">';
        
            echo '<td class="tb2">';
            echo $row['id'];
            echo "</td>";

            echo '<td class="tb2">';
            echo $row['timein'];
            echo "</td>";
        
           
        echo "</tr>";}
?>

    </table>

</div>


</div>

</div>  

</body>
</html>