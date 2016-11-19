<html>
<head>
<title>Payment</title>
</head>
<body>
<?php
    require "dbcon/dbcon.php";
    $sql = "SELECT * FROM payment GROUP BY supplierno";
    $query=(mysqli_query($conn,$sql));
?>
<table>
    <tr>
        <th>SupplierNo</th> 
        <th>Supplier</th>
        <th>Date</th> 
        <th>Buy</th>
        <th>Pay</th>
        <th>Due</th>
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
            echo $row['date'];
            echo "</td>";
        
            echo "<td>";
            echo $row['buy'];
            echo "</td>";

             echo "<td>";
            echo $row['pay'];
            echo "</td>";
            
             echo "<td>";
            echo $row['due'];
            echo "</td>";
         echo "</tr>";}
?>
</table>
    <?php
                require "dbcon/dbcon.php";
                $error=FALSE;
                $suppliernoerr = $dateerr =$buyerr = $suppliererr = $payerr = "";
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
                     if(empty($_POST['date'])){ 
                                $dateerr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $date = $_POST['date'];
                            }
                     if(empty($_POST['buy'])){ 
                                $buyerr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $buy = $_POST['buy'];
                            }
                     if(empty($_POST['pay'])){ 
                                $payerr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $pay = $_POST['pay'];
                            }
                            

                                $due = $buy - $pay ;
                    
                    $sql = "INSERT INTO payment (supplierno,supplier,date,buy, pay, due)
                VALUES ('".$supplierno."','".$supplier."','".$date."','".$buy."','".$pay."','".$due."')";

                if (mysqli_query($conn, $sql)) {
                    //echo '<script>alert("New record created successfully")</script>';
                    header('location:payment.php');
                }
                else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                 }
    ?>

    <?php
    require "dbcon/dbcon.php";
    $sql = "SELECT supplierno, supplier, SUM(buy), SUM(pay), SUM(due) FROM payment GROUP BY supplierno";
    $query=(mysqli_query($conn,$sql));
?>
<table>
    <tr>
        <th>SupplierNo</th> 
        <th>Supplier</th>
        <th>Total Buy</th>
        <th>Total Pay</th>
        <th>Total Due</th>
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
            echo $row['SUM(buy)'];
            echo "</td>";

             echo "<td>";
            echo $row['SUM(pay)'];
            echo "</td>";
            
             echo "<td>";
            echo $row['SUM(due)'];
            echo "</td>";
         echo "</tr>";}
?>
</table>

                <div id="payment">
                <form method="post" action="payment.php">
                <table id="tb7">
                    <tr>
                        <th colspan="2" align="left"><b style="color:white; font-size:24px; text-shadow:2px 2px 2px gray;">Coffin Types</b></th> 
                    </tr>
                    <tr>
                    <td><label for="supplierno">Supplier No</label><span class="error"><?php echo $suppliernoerr;?></span></td>
                    <td><input type="text" name="supplierno" placeholder="SupplierNo"></td>
                    </tr> 
                    <tr>
                    <td><label for="supplier">Supplier</label><span class="error"><?php echo $suppliererr;?></span></td>
                    <td><input type="text" name="supplier" placeholder="supplier"></td>
                    </tr>   
                    <tr>
                    <td><label for="date">Date</label><span class="error"><?php echo $dateerr;?></span></td>
                    <td><input type="text" name="date" placeholder="Date"></td>
                    </tr>
                    <tr>
                    <tr>
                    <td><label for="buy">Buy</label><span class="error"><?php echo $buyerr;?></span></td>
                    <td><input type="text" name="buy" placeholder="Buy"></td>
                    </tr>
                    <tr>
                    <td><label for="pay">Pay</label><span class="error"><?php echo $payerr;?></span></td>
                    <td><input type="text" name="pay" placeholder="Pay"></td>
                    </tr>
                    <tr>
                    <td colspan="2" align="center">
                    <input type="submit" value="INSERT" name="insert">
                    </td>
                    </tr>
                </table>
                </form>
                </div>              
</body>
</html>