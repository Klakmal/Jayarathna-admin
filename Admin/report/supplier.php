<html>
<head>
<title>Supplier Detail</title>
</head>
<body>
<?php
    require "dbcon/dbcon.php";
    $sql = "SELECT * FROM supplier";
    $query=(mysqli_query($conn,$sql));
?>
<table>
    <tr>
        <th>SupplierNo</th>  
        <th>Supplier</th>
        <th>Contact No</th>
        <th>Address</th>
        <th>Email</th>
        <th>Platinum</th> 
        <th>Gold</th>
        <th>Silver</th>
        <th>Bronze</th>
    </tr>
<?php
    while ($row = mysqli_fetch_assoc($query)){
         echo "<tr>";
        
            echo "<td>";
            echo $row['supplierno'];
            echo "</td>";
                
            echo "<td>";
            echo $row['supplier'];
            echo "</td>";        

            echo "<td>";
            echo $row['contactno'];
            echo "</td>";

            echo "<td>";
            echo $row['address'];
            echo "</td>";

            echo "<td>";
            echo $row['email'];
            echo "</td>";

            echo "<td>";
            echo $row['platinum'];
            echo "</td>";

             echo "<td>";
            echo $row['gold'];
            echo "</td>";

             echo "<td>";
            echo $row['silver'];
            echo "</td>";

             echo "<td>";
            echo $row['bronze'];
            echo "</td>";
           
        echo "</tr>";}
?>
    </table>
    <?php
                    
                require "dbcon/dbcon.php";
                     $error=FALSE;
                        $suppliernoerr = $suppliererr =  $contactnoerr= $addresserr = $emailerr = $platinumerr =$golderr = $silvererr = $bronzeerr = "";
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
                     if(empty($_POST['platinum'])){ 
                                $platinumerr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $platinum = $_POST['platinum'];
                            }
                     if(empty($_POST['gold'])){ 
                                $golderr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $gold = $_POST['gold'];
                            }
                     if(empty($_POST['silver'])){ 
                                $silvererr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $silver = $_POST['silver'];
                            }
                      if(empty($_POST['bronze'])){ 
                                $bronzeerr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $bronze = $_POST['bronze'];
                            }

                 
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
                        $suppliernoerr = $suppliererr=  $emailerr =$addresserr = $contactnoerr = $platinumerr =$golderr = $silvererr = $bronzeerr = "";
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
                      if(empty($_POST['platinum'])){ 
                                $platinumerr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $platinum = $_POST['platinum'];
                            }
                      if(empty($_POST['gold'])){ 
                                $golderr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $gold = $_POST['gold'];
                            }
                      if(empty($_POST['silver'])){ 
                                $silvererr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $silver = $_POST['silver'];
                            }
                      if(empty($_POST['bronze'])){ 
                                $bronzeerr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $bronze = $_POST['bronze'];
                            }
                    
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

             </div>
         </div>
    </body>
</html>