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
.tbl {
    border-collapse: collapse;
    width: 500px;
    font-size: 13px;
}

.th, .td {
    text-align: left;
    padding: 8px;
    border-bottom: 1px solid gray;
}

.tr:nth-child(even){background-color: #f2f2f2}

.th {
    background-color: #41a3b1;
    color: white;
}
    
    .con2{
        padding-top: 100px;
    }
    
    .main_cover{
            width: 81%;
            height: 100%;
            margin-left: 19%;
            padding-top: 50px;
            background-color: #f1f1f1;
            color: dimgray;
        }
        .cover{
            padding-top: 10%;
        }
</style>
    </head>
    <body>

<nav class="navi_menu" id="mySidenav">
  <?php include '../details.php'; ?>
  <a href="indexstockkeeper.php" class="navi"><img src="../img/home.png" class="image">&nbsp;&nbsp;HOME</a>
  <a href="reportstockkeeper/id.php" class="navi"><img src="../img/report.png" class="image">&nbsp;&nbsp;COFFIN ID REGISTRATION</a>
  <a href="reportstockkeeper/report1.php" class="navi"><img src="../img/stock.png" class="image">&nbsp;&nbsp;STOCK DETAILS</a>
  <a href="reportstockkeeper/report2.php" class="navi"><img src="../img/account.png" class="image">&nbsp;&nbsp;STOCK COUNT</a>
  
  
</nav>

<div class="menu2" align="right">
    <div class="menu2in">
      <a href="../signout.php" class="myButton">Log Out</a>
    </div>
  </div>
        
<div class="main_cover" align="center">
        <div class="cover">
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
                    <tr><br>  </tr>
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
                   
                    <tr>
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
<table class="tbl">
    <tr class="tr">
        <th class="th" >ID</th> 
        <th class="th" >Timein</th>
    </tr>
<?php
    while ($row = mysqli_fetch_assoc($query)){
         echo '<tr class="tr" align="center">';
        
            echo '<td class="td">';
            echo $row['id'];
            echo "</td>";

            echo '<td class="td">';
            echo $row['timein'];
            echo "</td>";
        
           
        echo "</tr>";}
?>

</table>

</div>


</div>

</body>
</html>