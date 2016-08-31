<html>
<head>
    <title>webcasting</title>
    </head>
<body>

    <?php
        require "dbcon/dbcon.php";

        $error=FALSE;
            $deadnameerr = $urlerr= "";
            
            if (isset($_POST['submit'])) {
                
                if(empty($_POST['deadname'])){ 
                    $deadnameerr = "";
                    $error = TRUE;
                }else{
                    $deadname = $_POST['deadname'];
                }
                
                if(empty($_POST['url'])){ 
                    $urlerr = "";
                    $error = TRUE;
                }else{
                    $url = $_POST['url'];
                }
                
              
                
                if ($error==FALSE){
               
                $sql = "INSERT INTO webcasting (deadname,url) VALUES ('".$deadname."','".$url."')";
                if(mysqli_query($conn,$sql)){
                    /*echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
                    header( "Location: webcasting.php");*/
                    echo "<script>alert('webcasting url successfully send'); window.location.href='webcastingadmin.php'; </script>";
                    die();
                } else{
                    echo "<script type='text/javascript'>alert('Not successfully datatranfer!')</script>";
                }
                 
                }
            }
        ?>
    
     <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <div id="condolence">
            <form id="frm1" action="webcastingadmin.php" method="post">
            <table id="tbl1">
                <tr>
                    <td colspan="2" align="center">
                        <h2 id="heading2" align="center"><b>Webcasting</b></h2>
						<hr>
                    </td>
                
                </tr>
				<tr>
                    <td colspan="2" align="center">
                        
						<br>
                    </td>
                
                </tr>
				<tr>
                    <td colspan="2" align="center">
                        
						<br>
                    </td>
                
                </tr>
                 <tr>
                    
                        <td><label for="deadname">Dead Person Name : </label><span class="error"><?php echo $deadnameerr;?></span></td>
                        
                        <td><input type="text" name="deadname" id="deadname" placeholder="Dead Person Name" required></td>
                
                </tr>
                <tr>
                    
                      <td><label for="url">URL: </label><span class="error"><?php echo $urlerr;?></span></td>
                        
                    <td> <input type="text" name="url" id="url" placeholder="url" required></td>
                    
                </tr>
               
                
                 <tr>
                    <td colspan="2">
                        <input type="submit" value="Submit" name="submit"> 
                        <input type="reset" value="Cancle" name="cancle">
                    </td>
                
                </tr>
                
                
                </table>
            </form>
            </div>
        </form>
    </body>
</html>
