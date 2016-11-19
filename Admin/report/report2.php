<html>
<head>
<title>Coffin Report</title>
</head>
<body>
<?php
    require "dbcon/dbcon.php";
    $sql = "SELECT type.type, COUNT(id.id) , moq.moq FROM id, type, moq WHERE id.timeout > CURDATE() AND id.no = type.no AND type.type = moq.type GROUP BY type.type";
    $query=(mysqli_query($conn,$sql));
?>
<table>
    <tr>
        <th>Type</th>
        <th>Remaining</th> 
        <th>MOQ </th>
<?php
    while ($row = mysqli_fetch_assoc($query)){
         echo "<tr>";
        
            echo "<td>";
            echo $row['type'];
            echo "</td>";

            echo "<td>";
            echo $row['COUNT(id.id)'];
            echo "</td>";

            echo "<td>";
            echo $row['moq'];
            echo "</td>";


         echo "</tr>";}
?>
</table>
</body>
</html>