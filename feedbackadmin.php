<html>
<head>
<title>feedback</title>
</head>
<body>
<?php
    require "dbcon/dbcon.php";
    $sql = "SELECT * FROM feedback";
    $query=(mysqli_query($conn,$sql));
    while ($row = mysqli_fetch_assoc($query)){
        echo '<div>';
        echo $row['yourname'];
        echo '<br>';
        echo '</div>';
        echo '<div>';
        echo $row['fdback'];
        echo '<br>';
        echo '</div>';
        echo '<div>';
        echo $row['status'];
        echo '<br>';
        echo '</div>';
    }
    ?>
    </body>
</html>
        