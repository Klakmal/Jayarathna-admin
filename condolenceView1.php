<html>
<title>Condolence View screen</title>
<body>

<h1>Condolence messages</h1>
 <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
 <input type="text" name="deadname">
 <input type="submit" value="VIEW" name="view"> </form>
<?php


    require "dbcon/dbcon.php";	
	if (isset($_POST['view'])) {
                    
                    if(empty($_POST['deadname'])){ 
                        $deadnameerr = "</br>Dead person Name is required";
                        $error = TRUE;
                    }else{
                        $deadname = $_POST['deadname'];
						$error=FALSE;
                    }
                  if ($error==FALSE){
					  $sql = "SELECT * FROM acceptvisitor WHERE deadname='$deadname'";
	$query=(mysqli_query($conn,$sql));
    echo '<table class = tbl>';
		$url1=$_SERVER['REQUEST_URI'];
		header("Refresh: 30; URL=$url1");
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
				  }
	}





    
    ?>

</body>
</html>