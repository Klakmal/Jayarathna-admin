<html>
<head>
<title>type</title>
</head>
<body>
<?php
    require "dbcon/dbcon.php";
    $sql = "SELECT * FROM type";
    $query=(mysqli_query($conn,$sql));
?>
<table>
    <tr>
        <th>No</th> 
        <th>Type</th> 
        <th>Supplier</th>
        <th>Price</th>
    </tr>
<?php
    while ($row = mysqli_fetch_assoc($query)){
         echo "<tr>";
        
            echo "<td>";
            echo $row['no'];
            echo "</td>";
                
            echo "<td>";
            echo $row['type'];
            echo "</td>";

            echo "<td>";
            echo $row['supplier'];
            echo "</td>";
        
            echo "<td>";
            echo $row['price'];
            echo "</td>";
        
           
        echo "</tr>";}
?>
    </table>
    <?php
                    
                require "dbcon/dbcon.php";
                     $error=FALSE;
                        $noerr = $priceerr = "";
                 if (isset($_POST['update'])) {
                     
                     if(empty($_POST['no'])){ 
                                $noerr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $no = $_POST['no'];
                            }
                     if(empty($_POST['price'])){ 
                                $priceerr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $price = $_POST['price'];
                            }
                 
                 
                if ($error==FALSE){

                $sql = "UPDATE type SET price='$price' WHERE no='$no'";

                if (mysqli_query($conn, $sql)) {
                    //echo '<script>alert("Record updated successfully")</script>';
                    header('location:type.php');
                } else {
                    echo "error" ;
                }
                }
                 }
                if (isset($_POST['delete'])) {
                     
                     $no=$_POST["no"];
                    
                 

                $sql = "DELETE FROM type WHERE no='$no'";

                if (mysqli_query($conn, $sql)) {
                    //echo '<script>alert("Record deleted successfully")</script>';
                    header('location:type.php');
                } else {
                    echo "Error deleting record: " . mysqli_error($conn);
                }
                }
                   
                $error=FALSE;
                        $noerr = $priceerr =$typeerr = $suppliererr = "";
                 if (isset($_POST['insert'])) {
                     
                     if(empty($_POST['no'])){ 
                                $noerr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $no = $_POST['no'];
                            }
                     if(empty($_POST['price'])){ 
                                $priceerr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $price = $_POST['price'];
                            }
                     if(empty($_POST['type'])){ 
                                $typeerr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $type = $_POST['type'];
                            }
                     if(empty($_POST['supplier'])){ 
                                $suppliererr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $supplier = $_POST['supplier'];
                            }
                    
                    $sql = "INSERT INTO type (no,price,type,supplier)
                VALUES ('".$no."','".$price."','".$type."','".$supplier."')";

                if (mysqli_query($conn, $sql)) {
                    //echo '<script>alert("New record created successfully")</script>';
                    header('location:type.php');
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }

                    
                    
                    
                }

                ?>

                <div id="type">
                <form method="post" action="type.php">
                <table id="tb6">
                    <tr>
                        <th colspan="2" align="left"><b style="color:white; font-size:24px; text-shadow:2px 2px 2px gray;">Coffin Types</b></th> 
                    </tr>
                    <tr>
                    <td><label for="no">No</label><span class="error"><?php echo $noerr;?></span></td>
                    <td><input type="text" name="no" placeholder="No"></td>
                    </tr>    
                    <tr>
                    <td><label for="type">Type</label><span class="error"><?php echo $typeerr;?></span></td>
                    <td><input type="text" name="type" placeholder="type"></td>
                    </tr>
                    <tr>
                    <tr>
                    <td><label for="supplier">Supplier</label><span class="error"><?php echo $suppliererr;?></span></td>
                    <td><input type="text" name="supplier" placeholder="supplier"></td>
                    </tr>
                    <tr>
                    <td><label for="price">Price</label><span class="error"><?php echo $priceerr;?></span></td>
                    <td><input type="text" name="price" placeholder="Price"></td>
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