<?php
    include ('../manager/sessionManager.php');
?>
<html>
<head>
<title>Supplier Detail</title>
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
<nav class="navi_menu" id="mySidenav">
  <?php include '../details.php'; ?>
  <a href="../manager/indexmanager.php" class="navi"><img src="../img/home.png" class="image">&nbsp;&nbsp;HOME</a>
  <a href="../manager/updateprices.php" class="navi"><img src="../img/updateprice.png" class="image">&nbsp;&nbsp;UPDATE PRICES</a>
  <a href="../report/payment.php" class="navi"><img src="../img/payments.png" class="image">&nbsp;&nbsp;PAYMENT</a>
  <a href="../report/supplier.php" class="active"><img src="../img/supplier.png" class="image">&nbsp;&nbsp;SUPPLIER</a>
  <a href="../report/type.php" class="navi"><img src="../img/678592-200.png" class="image">&nbsp;&nbsp;COFFIN PRICES</a>
  <a href="../report/report.php" class="navi"><img src="../img/report.png" class="image">&nbsp;&nbsp;REPORT</a>
</nav>
<div class="menu2" align="right">
    <div class="menu2in">
      <a href="../signout.php" class="myButton">Log Out</a>
    </div>
<div class="con1" align="center">
<div class="con2">
 <?php
                    
                require "dbcon/dbcon.php";
                     
                 if (isset($_POST['update'])) {
                     
                     
                                $supplierno = $_POST['supplierno'];
                            
                     
                                $supplier = $_POST['supplier'];
                            
                     
                     
                                $contactno = $_POST['contactno'];
                            
                     
                                $address = $_POST['address'];
                            
                     
                                $email = $_POST['email'];
                                                
                     
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
                   
                
                 if (isset($_POST['insert'])) {
                     
                     
                                $supplierno = $_POST['supplierno'];
                            
                     
                                $supplier = $_POST['supplier'];
                            
                     
                                $address = $_POST['address'];
                            
                     
                                $contactno = $_POST['contactno'];
                            
                     
                                $email = $_POST['email'];

                    $platinum = null;
                    $gold = null;
                    $silver = null;
                    $bronze = null;
                    if (isset($_POST['types'])) {
                        foreach ($_POST['types'] as $key => $value) {
                            if ($value == 'platinum') {
                                $platinum = "Yes";
                            } elseif ($value == 'gold') {
                                $gold = 'Yes';
                            } elseif ($value == 'silver') {
                                $silver = 'Yes';
                            } elseif ($value == 'bronze') {
                                $bronze = 'Yes';
                            }
                        }
                    }
/*
                     if(isset($_POST['platinum'])){
                        $platinum = $_POST['platinum'];
                    }else{
                        $platinum = 'off';
                    }
                               
                      if(isset($_POST['gold'])){
                        $gold = $_POST['gold'];
                    }else{
                        $gold = 'off';
                    }
                        if(isset($_POST['silver'])){
                        $silver = $_POST['silver'];
                    }else{
                        $silver = 'off';
                    }
                        if(isset($_POST['bronze'])){
                        $bronze = $_POST['bronze'];
                    }else{
                        $bronze = 'off';
                    }
                               */
                    
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
                    <td><label for="no">Supplier No</label></td>
                    <td><input type="text" name="supplierno" placeholder="Supplier No" required></td>
                    </tr> 
                    <tr>
                    <td><label for="supplier">Supplier</label></td>
                    <td><input type="text" name="supplier" placeholder="Supplier" required></td>
                    </tr>   
                    <tr>
                    <td><label >Type</label></td>
                    <td>
                        <input type="checkbox" name=types[] value="platinum" checked>Platinum
                        <input type="checkbox" name=types[] value="gold" checked>Gold
                        <input type="checkbox" name=types[] value="silver" checked>Silver
                        <input type="checkbox" name=types[] value="bronze" checked>Bronze
                    </td>
                    </tr>
                    <tr>
                    <td><label for="address">Address</label></td>
                    <td><input type="text" name="address" placeholder="Address" required></td>
                    <tr>
                    <tr>
                    <td><label for="contactno">Contactno</label></td>
                    <td><input type="text" name="contactno" placeholder="Contactno" required></td>
                    </tr>
                    <tr>
                    <tr>
                    <td><label for="email">E-mail</label></td>
                    <td><input type="text" name="email" placeholder="Email" required></td>
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