<html>
<head>
<title>Payment Report</title>
</head>
<body>
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
</body>
</html>