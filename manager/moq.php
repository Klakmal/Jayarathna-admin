<?php
    include ('sessionManager.php');
?>
<html>
<head>
<title>Payment</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/adminindex.css">
    <link rel="stylesheet" type="text/css" href="../css/manage.css">
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
    background-color: ;
}
.con2{
    width: 500px;
    height: 100%;
    background-color: #eee;
    position: relative;
    margin-top: 100px;
    margin-left: 200px;
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
  <?php include '../details.php'; ?>
 
    
    <a href="../manager/indexmanager.php" class="navi"><img src="../img/home.png" class="image">&nbsp;&nbsp;HOME</a>
  <a href="../report/supplierpayment.php" class="navi"><img src="../img/payments.png" class="image">&nbsp;&nbsp;SUPPLIER PAYMENT</a>
  <a href="../report/suppliertype.php" class="navi"><img src="../img/supplier.png" class="image">&nbsp;&nbsp;SUPPLIER/TYPE DETAILES</a>
  <a href="../report/packages.php" class="navi"><img src="../img/package.png" class="image">&nbsp;&nbsp;PACKAGES</a>
    <a href="../manager/moq.php" class="active"><img src="../img/updateprice.png" class="image">&nbsp;&nbsp;ADD/CHANGE MOQ</a>
</nav>

<div class="menu2" align="right">
    <div class="menu2in">
      <a href="../signout.php" class="myButton">Log Out</a>
    </div>

<div class="con1" align="center">
<div class="con2">
    <?php
                    
                require "../dbcon/dbcon.php";
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
                    echo "<script>window.location('location:moq.php');</script>";
                } else {
                    echo "error" ;
                }
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
                        <td>
                            <select type="text" name="type" placeholder="type" required>
                                <option value="Platinum">Platinum</option>
                                <option value="Gold">Gold</option>
                                <option value="Silver">Silver</option>
                                <option value="Bronze">Bronze</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                    <tr>
                    <td><label for="moq">MOQ</label><span class="error"><?php echo $moqerr;?></span></td>
                    <td><input type="text" name="moq" placeholder="MOQ" required></td>
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
    $sql = "SELECT * FROM moq";
    $query=(mysqli_query($conn,$sql));
?>
<table class="tbl">
    <tr>
        <th class="th" >Type</th> 
        <th class="th" >MOQ</th>
    </tr>
<?php
    while ($row = mysqli_fetch_assoc($query)){
         echo '<tr class="tr" align="center">';
        
            echo '<td class="td">';
            echo $row['type'];
            echo "</td>";

            echo '<td class="td">';
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