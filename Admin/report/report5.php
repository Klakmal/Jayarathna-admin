<html>
<head>
<title>Package Report</title>
</head>
<body>
<?php
    require "dbcon/dbcon.php";
    $sql = "SELECT packname, amount, COUNT(res_id) FROM reservations WHERE date BETWEEN date1 AND date2 GROUP BY packname";
    $query=(mysqli_query($conn,$sql));
?>
<table>
    <tr>
        <th>Package</th>
        <th>No of Orders</th>
        <th>Total Amount</th>
    </tr> 
<?php
    while ($row = mysqli_fetch_assoc($query)){
         echo "<tr>";
        
            echo "<td>";
            echo $row['packname'];
            echo "</td>";

            echo "<td>";
            echo $row['COUNT(res_id)'];
            echo "</td>";


            echo "<td>";
            echo $row['amount'];
            echo "</td>";

         echo "</tr>";}
?>
</table>
<?php
                require "dbcon/dbcon.php";
                $error=FALSE;
                $date1err = $date2err =  "";
                 if (isset($_POST['insert'])) {
                     
                     if(empty($_POST['date1'])){ 
                                $date1err = "</br>* ";
                                $error = TRUE;
                            }else{
                                $date1 = $_POST['date1'];
                            }
                     if(empty($_POST['date2'])){ 
                                $date2err = "</br>* ";
                                $error = TRUE;
                            }else{
                                $date2 = $_POST['date2'];
                            }
?>
<div id="id">
                <form method="post" action="report5.php">
                <table id="tb10">
                    <tr>
                        <th colspan="2" align="left"><b style="color:white; font-size:24px; text-shadow:2px 2px 2px gray;">ID</b></th> 
                    </tr>
                    <tr>
                    <td><label for="date1">From</label><span class="error"><?php echo $date1err;?></span></td>
                    <td><input type="text" name="date1" placeholder="From"></td>
                    </tr> 
                    <tr>
                    <td><label for="date2">To</label><span class="error"><?php echo $date2err;?></span></td>
                    <td><input type="text" name="date2" placeholder="To"></td>
                    </tr>
                    <tr>
                    <td colspan="2" align="center">
                    <input type="submit" value="Search" name="insert">
                    </td>
                    </tr>

                </table>
            
                </form>
                </div>  

</body>
</html>