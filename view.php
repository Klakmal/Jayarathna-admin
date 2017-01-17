<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/view.css">
    </head>
    <body>
        <div class="container" align="center">
        <img src="img/logo.png">
        <?php
                require "dbcon/dbcon.php";     
                if (isset($_POST['insert'])) {
                    $deadPersonID = $_POST['deadPersonID'];

                $sql = "SELECT * FROM acceptvisitor WHERE deadPersonID = '$deadPersonID'";
                $query=(mysqli_query($conn,$sql));

                while ($row = mysqli_fetch_assoc($query)){
                    echo "<div class='loopdiv'>";
                    echo "<div align='left'><span class='fname'><img src='img/name.png' class='proimg'><b>".$row['visname']."</b></span><hr class ='hor'></div>";

                    echo "<div align='left'><span class='fdname'><b>Message : </b></span>";
                    echo "<span class='fdname'>".$row['message']."</span></div><br><hr class ='hor'>";
                    echo "<div class='st' align='right'><span class='status'><b>Relation : </b>";
                    echo $row['relation']."</span></div>";
                    echo "</div>";
                    sleep(0);
                }
            }
            ?>
        </div>
    </body>
</html>