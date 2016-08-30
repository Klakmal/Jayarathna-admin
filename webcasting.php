<html>
<head>
<title>webcasting</title>
</head>
<body>
<?php
    require "dbcon/dbcon.php";
$query="";
    $error=FALSE;
        $deadnameerr = "";
        
        if (isset($_POST['view'])) {
            
            if(empty($_POST['deadname'])){ 
                $deadnameerr = "</br>Dead person Name is required";
                $error = TRUE;
            }else{
                $deadname = $_POST['deadname'];
            }
          if ($error==FALSE){  
        $sql="SELECT * FROM webcasting WHERE deadname='$deadname'";
        $query=(mysqli_query($conn,$sql));
        }
        }
?>
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
    <div id="webcasting">
        <form id="frm" action="webcasting.php" method="post">
        <table id="tbl">
            <tr>
                <td colspan="2">
                    <h2 id="heading2">Webcasting</h2>
                </td>
            
            </tr>
             <tr>
            
        <td><label for="deadname">Dead Person Name</label><span class="error"><?php echo $deadnameerr;?></span></td>
<td><input type="text" name="deadname" id="deadname"></td>
            </tr>
            <tr>
                    <td colspan="2">
                        <input type="submit" value="view" name="view"> 
                </td>
            </tr>
            </table>
            
            <a href="<?php
            while ($row = mysqli_fetch_assoc($query)){
            echo $row['url'];
        }
                     ?>">Your Link</a>
            
            
        </form>
        </div>
    </form>
    </body>
</html>
