<html>
<title>Condolence View screen</title>
<body>

<h1>Condolence messages</h1>
<?php


    require "dbcon/dbcon.php";
	$deadname = "roshan"
    $sql = "SELECT * FROM acceptvisitor WHERE deadname = '$deadname'";
    while ($row = mysql_fetch_array($sql))
	$query=(mysqli_query($conn,$sql));
    echo '<table class = tbl>';
    while ($row = mysqli_fetch_assoc($query)){
        echo '<tr class = "row">';
        echo '<td class = "col1">';

        echo $row['visname'];
        echo '<br>';
                echo '<br>';
        echo "message : ";

        echo $row['message'];
        
        echo '</td>';
        
        
        echo '<td class = "col2">';
        echo "relation";
        echo '<br>';
        echo $row['relation'];
        
        echo '</td>';
        echo '</tr>';

    }
    echo '</table>';


	$url1=$_SERVER['REQUEST_URI'];
	header("Refresh: 5; URL=$url1");


    
    ?>

</body>
</html>