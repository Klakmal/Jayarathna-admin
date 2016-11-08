<html>
<head>
<title>Coffin Report</title>
</head>
<body>
<?php
    require "dbcon/dbcon.php";
    $sql = "SELECT id.id, type.type, type.supplier, type.price FROM id, type WHERE id.no = type.no";
    $query=(mysqli_query($conn,$sql));
?>
<table>
    <tr>
        <th>ID</th> 
        <th>Type</th>
        <th>Supplier</th> 
        <th>Price</th>
    </tr>
<?php
    while ($row = mysqli_fetch_assoc($query)){
         echo "<tr>";
        
            echo "<td>";
            echo $row['id'];
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
</body>
</html>