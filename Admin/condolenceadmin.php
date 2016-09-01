<html>
<head>
<title>feedback</title>
</head>
<body>
<?php
    require "dbcon/dbcon.php";
    $sql = "SELECT * FROM visitors";
    $query=(mysqli_query($conn,$sql));
?>
<table>
    <tr>
        <th>No</th> 
        <th>Deadperson name</th> 
        <th>visitor name</th>
        <th>Visitor NIC</th>
        <th>Relationship</th>
        <th>Message</th> 
        <th>BLAH</th>
        <th>BLAH2</th>
    </tr>
<?php
    while ($row = mysqli_fetch_assoc($query)){
         echo "<tr>";
        
            echo "<td>";
            echo $row['msg_no'];
            echo "</td>";
                
            echo "<td>";
            echo $row['deadname'];
            echo "</td>";

            echo "<td>";
            echo $row['visname'];
            echo "</td>";
        
            echo "<td>";
            echo $row['visnic'];
            echo "</td>";
        
            echo "<td>";
            echo $row['relation'];
            echo "</td>";
        
            echo "<td>";
            echo $row['message'];
            echo "</td>";

            echo "<td>";
            echo "<input type='submit' name='but' value = 'accept'></input>";
            echo "</td>";

            echo "<td>";
            echo "<input type='submit' name='but' value = 'reject'></input>";
            echo "</td>";
        echo "</tr>";}
?>
    </table>
    </body>
</html>