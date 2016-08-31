<html>
<head>
<title>feedback</title>
<link rel="stylesheet" type="text/css" href="css/adminfeedback.css">
</head>
<body>
<div class="afb1" align="center">
<div class="afb2" align="left">
<h2>FEED-BACK</h2>
<?php
    require "dbcon/dbcon.php";
    $sql = "SELECT * FROM feedback";
    $query=(mysqli_query($conn,$sql));
    echo '<table class = tbl>';

    while ($row = mysqli_fetch_assoc($query)){
        echo '<tr class = "row">';
        echo '<td class = "col1">';
        echo "Name : ";
        echo '<br>';
        echo $row['yourname'];
        
        echo '</td>';
        
        
        echo '<td class = "col2">';
        echo "Feed-Back : ";
        echo '<br>';
        echo $row['fdback'];
        
        echo '</td>';
        
        
        echo '<td class = "col3">';
        echo "Status : ";
        echo '<br>';
        echo $row['status'];
        
        echo '</td>';
        echo '</tr>';

    }
    echo '</table>';
    
    ?>
</div>
</div>
    </body>
</html>
        