<html>
<head>
<title>Supplier Detail</title>
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
    background-color: ;
}
.con2{
    width: 800px;
    height: 100%;
    background-color: #eee;
    position: relative;
    margin-top: 100px;
    margin-left: 300px;
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
    width:150px;
    background-color: #aaa;
}
.tb1{
    width: 150px;
}
.tb2{
    width:150px;
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
<div class="con1" align="center">
<div class="con2">
 <?php
                    
                require "dbcon/dbcon.php";
                     $error=FALSE;
                        $suppliernoerr = $suppliererr =  $contactnoerr= $addresserr = $emailerr  = "";
                 if (isset($_POST['update'])) {
                     
                     if(empty($_POST['supplierno'])){ 
                                $suppliernoerr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $supplierno = $_POST['supplierno'];
                            }
                     if(empty($_POST['supplier'])){ 
                                $suppliererr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $supplier = $_POST['supplier'];
                            }
                     
                     if(empty($_POST['contactno'])){ 
                                $contactnoerr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $contactno = $_POST['contactno'];
                            }
                     if(empty($_POST['address'])){ 
                                $addresserr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $address = $_POST['address'];
                            }
                     if(empty($_POST['email'])){ 
                                $emailerr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $email = $_POST['email'];
                            }                     
                     
                                $platinum = $_POST['platinum'];
                            
                     
                                $gold = $_POST['gold'];
                            
                   
                                $silver = $_POST['silver'];
                            
                      
                                $bronze = $_POST['bronze'];
                            

                 
                if ($error==FALSE){

                $sql = "UPDATE supplier SET supplier='$supplier', contactno='$contactno', address='$address', email='$email', platinum ='$platinum', gold= '$gold', silver= '$silver', bronze= '$bronze' WHERE supplierno= '$supplierno'";

                if (mysqli_query($conn, $sql)) {
                    //echo '<script>alert("Record updated successfully")</script>';
                    header('location:supplier.php');
                } else {
                    echo "error" ;
                }
                }
                 }
                if (isset($_POST['delete'])) {
                     
                     $supplierno=$_POST["supplierno"];
                    
                 

                $sql = "DELETE FROM supplier WHERE supplierno='$supplierno'";

                if (mysqli_query($conn, $sql)) {
                    //echo '<script>alert("Record deleted successfully")</script>';
                    header('location:supplier.php');
                } else {
                    echo "Error deleting record: " . mysqli_error($conn);
                }
                }
                   
                $error=FALSE;
                        $suppliernoerr = $suppliererr=  $emailerr =$addresserr = $contactnoerr = "";
                 if (isset($_POST['insert'])) {
                     
                     if(empty($_POST['supplierno'])){ 
                                $suppliernoerr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $supplierno = $_POST['supplierno'];
                            }
                     if(empty($_POST['supplier'])){ 
                                $suppliererr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $supplier = $_POST['supplier'];
                            }
                     if(empty($_POST['address'])){ 
                                $addresserr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $address = $_POST['address'];
                            }
                     if(empty($_POST['contactno'])){ 
                                $contactnoerr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $contactno = $_POST['contactno'];
                            }
                     if(empty($_POST['email'])){ 
                                $emailerr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $email = $_POST['email'];
                            }                    
                      
                                $platinum = $_POST['platinum'];
                            
                      
                                $gold = $_POST['gold'];
                            
                      
                                $silver = $_POST['silver'];
                            
                      
                                $bronze = $_POST['bronze'];
                            
                    
                    $sql = "INSERT INTO supplier (supplierno, supplier, address, contactno, email, platinum, gold, silver, bronze)
                VALUES ('".$supplierno."','".$supplier."','".$address."','".$contactno."','".$email."','".$platinum."','".$gold."','".$silver."','".$bronze."')";

                if (mysqli_query($conn, $sql)) {
                    //echo '<script>alert("New record created successfully")</script>';
                    header('location:supplier.php');
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                } 
                }

                ?>

                <div id="type">
                <form method="post" action="supplier.php">
                <table id="tb6">
                    <tr>
                        <th colspan="2" align="left"><b style="color:white; font-size:24px; text-shadow:2px 2px 2px gray;">Coffin Suppliers Details</b></th> 
                    </tr>
                    <tr>
                    <td><label for="no">Supplier No</label><span class="error"><?php echo $suppliernoerr;?></span></td>
                    <td><input type="text" name="supplierno" placeholder="Supplier No"></td>
                    </tr> 
                    <tr>
                    <td><label for="supplier">Supplier</label><span class="error"><?php echo $suppliererr;?></span></td>
                    <td><input type="text" name="supplier" placeholder="Supplier"></td>
                    </tr>   
                    <tr>
                    <td><label >Type</label></td>
                    <td>
                        <input type="checkbox" name="platinum">Platinum
                        <input type="checkbox" name="gold">Gold
                        <input type="checkbox" name="silver">Silver
                        <input type="checkbox" name="bronze">Bronze
                    </td>
                    </tr>
                    <tr>
                    <td><label for="address">Address</label><span class="error"><?php echo $addresserr;?></span></td>
                    <td><input type="text" name="address" placeholder="Address"></td>
                    <tr>
                    <tr>
                    <td><label for="contactno">Contactno</label><span class="error"><?php echo $contactnoerr;?></span></td>
                    <td><input type="text" name="contactno" placeholder="Contactno"></td>
                    </tr>
                    <tr>
                    <tr>
                    <td><label for="email">E-mail</label><span class="error"><?php echo $emailerr;?></span></td>
                    <td><input type="text" name="email" placeholder="Email"></td>
                    </tr>
                    <tr>
                    
                        <td colspan="2" align="center">
                        <input type="submit" value="UPDATE" name="update"> 
                        <input type="submit" value="DELETE" name="delete">
                        <input type="submit" value="INSERT" name="insert">
                    </td>
                    
                    </tr>
                </table>
                </form>
                 </div>  
<?php
    require "dbcon/dbcon.php";
    $sql = "SELECT * FROM supplier";
    $query=(mysqli_query($conn,$sql));
?>
<table>
    <tr>
        <th class="tb">SupplierNo</th>  
        <th class="tb">Supplier</th>
        <th class="tb">Contact No</th>
        <th class="tb">Address</th>
        <th class="tb">Email</th>
        <th class="tb">Platinum</th> 
        <th class="tb">Gold</th>
        <th class="tb">Silver</th>
        <th class="tb">Bronze</th>
    </tr>
<?php
    while ($row = mysqli_fetch_assoc($query)){
         echo '<tr class="tb1">';
        
            echo '<td class="tb2">';
            echo $row['supplierno'];
            echo "</td>";
                
            echo '<td class="tb2">';
            echo $row['supplier'];
            echo "</td>";        

            echo '<td class="tb2">';
            echo $row['contactno'];
            echo "</td>";

            echo '<td class="tb2">';
            echo $row['address'];
            echo "</td>";

            echo '<td class="tb2">';
            echo $row['email'];
            echo "</td>";

            echo '<td class="tb2">';
            echo $row['platinum'];
            echo "</td>";

            echo '<td class="tb2">';
            echo $row['gold'];
            echo "</td>";

            echo '<td class="tb2">';
            echo $row['silver'];
            echo "</td>";

            echo '<td class="tb2">';
            echo $row['bronze'];
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