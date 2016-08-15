<html>
<head>
    <title>Condolence Screen</title>
</head>
<body>
<?php
    require "dbcon/dbcon.php";

    $error=FALSE;
        $deadnameerr = $visnameerr = $visnicerr = $relationerr = $messageerr = "";
        
        if (isset($_POST['submit'])) {
            
            if(empty($_POST['deadname'])){ 
                $deadnameerr = "</br>Dead person Name is required";
                $error = TRUE;
            }else{
                $deadname = $_POST['deadname'];
            }
            
            if(empty($_POST['visname'])){ 
                $visnameerr = "</br>visitor Name is required";
                $error = TRUE;
            }else{
                $visname = $_POST['visname'];
            }
            
          if(empty($_POST['visnic'])){ 
                $visnicerr = "</br>Visitor NIC is required";
                $error = TRUE;
            }else{
                $visnic = $_POST['visnic'];
            }
            
            if(empty($_POST['relation'])){ 
                $relationerr = "</br>Relationship of visitor to the deadperson is required";
                $error = TRUE;
            }else{
                $relation = $_POST['relation'];
            }
            if(empty($_POST['message'])){ 
                $messagerr = "</br>Condolence message is required";
                $error = TRUE;
            }else{
                $message = $_POST['message'];
            }
            
            if ($error==FALSE){
           
            $sql = "INSERT INTO visitors (deadname,visname,visnic,relation,message) VALUES ('".$deadname."','".$visname."','".$visnic."','".$relation."','".$message."')";
            if(mysqli_query($conn,$sql)){
                die();
            } else{echo "error";}
             
            }
        }
    ?>
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
    <div id="condolence">
        <form id="f3" action="condolence.php" method="post">
        <table id="tb3">
            <tr>
                <td colspan="2">
                    <h2 id="heading2">Condolence message screen</h2>
                </td>
            
            </tr>
             <tr>
                
                    <td><label for="deadname">Dead Person Name</label><span class="error"><?php echo $deadnameerr;?></span></td>
                    
                    <td><input type="text" name="deadname" id="deadname"></td>
            
            </tr>
            <tr>
                
                  <td><label for="visname">visitor Name</label><span class="error"><?php echo $visnameerr;?></span></td>
                    
                <td> <input type="text" name="visname" id="visname"></td>
                
            </tr>
           
            <tr>
                
                 <td><label for="visnic">Visitor NIC</label><span class="error"><?php echo $visnicerr;?></span></td>
                    
                   <td><input type="visnic" name="visnic" id="visnic"></td>
            </tr>
            <tr>
                
                 <td><label for="relation">Relationship</label><span class="error"><?php echo $relationerr;?></span></td>
                    
                   <td><input type="text" name="relation" id="relation"></td>
            </tr>
             <tr>
                
                   <td><label for="message">Condolence Message</label><span class="error"><?php echo $messageerr;?></span></td>
            
                 <td> <textarea name="message" id="message" rows="10" cols="60">Input your condolence message here</textarea></td>
            
            </tr>
             <tr>
                <td colspan="2">
                    <input type="submit" value="submit" name="submit"> 
                    <input type="reset" value="cancle" name="cancle">
                </td>
            
            </tr>
            
            
            </table>
        </form>
        </div>
    </form>
    </body>
</html>