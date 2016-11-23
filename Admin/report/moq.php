<html>
<head>
<title>type</title>
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
    </body>
</html>