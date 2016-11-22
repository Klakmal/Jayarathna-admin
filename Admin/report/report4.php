<html>
<head>
<title>Payment Report</title>
</head>
<body>


<?php
            $error=FALSE;
               $frmerr = $toerr = $suppliererr=  $typeerr = "";
               $frm = $to = $supplier=  $type = "";
                 if (isset($_POST['insert'])) {
                     
                     if(empty($_POST['supplier'])){ 
                                $suppliererr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $supplier = $_POST['supplier'];
                            }
                     if(empty($_POST['type'])){ 
                                $typeerr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $type = $_POST['type'];
                            }
                     if(empty($_POST['frm'])){ 
                                $frmerr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $frm = $_POST['frm'];
                            }
                     if(empty($_POST['to'])){ 
                                $toerr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $to = $_POST['to'];
                            }

        require "dbcon/dbcon.php";
        $sql = "SELECT count(id.id), sum(type.price) FROM type, id WHERE (id.timein BETWEEN '$frm' AND '$to') AND type.no = id.no GROUP BY supplier";
        $query=(mysqli_query($conn,$sql));

?>
<table>
    <tr>
        <th>No of in</th>
        <th>Total Price</th>
    </tr>
<?php
    while ($row = mysqli_fetch_assoc($query)){
         echo "<tr>";
        
            /*echo "<td>";
            echo $row['supplier'];
            echo "</td>";

            echo "<td>";
            echo $row['type'];
            echo "</td>";*/

            echo "<td>";
            echo $row['count(id.id)'];
            echo "</td>";
            
            echo "<td>";
            echo $row['sum(type.price)'];
            echo "</td>";

         echo "</tr>";
     }
?>
</table>
<?php 
}
?>

        <div id="type">
                <form method="post" action="report4.php">
                <table id="tb9">
                    <tr>
                    <th colspan="2" align="left"><b style="color:white; font-size:24px; text-shadow:2px 2px 2px gray;">Coffin Suppliers  Details</b></th> 
                    </tr>
                    <tr>
                    <td><label for="frm">From</label><span class="error"><?php echo $frmerr;?></span></td>
                    <td><input type="date" name="frm" placeholder="From"></td>
                    </tr> 
                    <tr>
                    <td><label for="to">To</label><span class="error"><?php echo $toerr;?></span></td>
                    <td><input type="date" name="to" placeholder="To"></td>
                    </tr> 
                    <tr>
                    <td><label for="supplier">Supplier</label><span class="error"><?php echo $suppliererr;?></span></td>
                    <td><input type="text" name="supplier" placeholder="Supplier"></td>
                    </tr> 
                    <tr>
                    <td><label for="type">Type</label><span class="error"><?php echo $typeerr;?></span></td>
                    <td><input type="text" name="type" placeholder="Type"></td>
                    </tr> 
                    <tr>
                        <td colspan="2" align="center">
                        <input type="submit" value="SEARCH" name="insert">
                    </td>
                    </tr>
</table>
</form>
</div>
</table>
</body>
</html>

