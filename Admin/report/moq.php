<html>
<head>
<title>type</title>
</head>
<body>
<?php
    require "dbcon/dbcon.php";
    $sql = "SELECT * FROM moq";
    $query=(mysqli_query($conn,$sql));
?>
<table>
    <tr>
        <th>Type</th> 
        <th>MOQ</th>
    </tr>
<?php
    while ($row = mysqli_fetch_assoc($query)){
         echo "<tr>";
        
            echo "<td>";
            echo $row['type'];
            echo "</td>";

            echo "<td>";
            echo $row['moq'];
            echo "</td>";
        
           
        echo "</tr>";}
?>
    </table>
    <?php
                    
                require "dbcon/dbcon.php";
                     $error=FALSE;
                        $typeerr = $moqerr = "";
                 if (isset($_POST['update'])) {
                     
                     if(empty($_POST['type'])){ 
                                $typeerr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $type = $_POST['type'];
                            }
                     if(empty($_POST['moq'])){ 
                                $moqerr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $moq = $_POST['moq'];
                            }
                 
                 
                if ($error==FALSE){

                $sql = "UPDATE moq SET moq='$moq' WHERE type='$type'";

                if (mysqli_query($conn, $sql)) {
                    //echo '<script>alert("Record updated successfully")</script>';
                    header('location:moq.php');
                } else {
                    echo "error" ;
                }
                }
                 }
                
                $error=FALSE;
                        $typeerr = $moqerr = "";
                 if (isset($_POST['insert'])) {
                    
                     if(empty($_POST['type'])){ 
                                $typeerr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $type = $_POST['type'];
                            }
                     if(empty($_POST['moq'])){ 
                                $moqerr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $moq = $_POST['moq'];
                            }
                    
                    $sql = "INSERT INTO moq (type,moq)
                VALUES ('".$type."','".$moq."')";

                if (mysqli_query($conn, $sql)) {
                    //echo '<script>alert("New record created successfully")</script>';
                    header('location:moq.php');
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }

                    
                    
                    
                }

                ?>

                <div id="type">
                <form method="post" action="moq.php">
                <table id="tb6">
                    <tr>
                        <th colspan="2" align="left"><b style="color:white; font-size:24px; text-shadow:2px 2px 2px gray;">Coffin Types</b></th> 
                    </tr>
                 
                    <tr>
                    <td><label for="type">Type</label><span class="error"><?php echo $typeerr;?></span></td>
                    <td><input type="text" name="type" placeholder="type"></td>
                    </tr>
                    <tr>
                    <tr>
                    <td><label for="moq">MOQ</label><span class="error"><?php echo $moqerr;?></span></td>
                    <td><input type="text" name="moq" placeholder="MOQ"></td>
                    </tr>
                   
                    
                        <td colspan="2" align="center">
                        <input type="submit" value="UPDATE" name="update">
                        <input type="submit" value="INSERT" name="insert">
                    </td>
                    
                    </tr>
                </table>
                </form>
                 </div>  

             </div>
         </div>
    </body>
</html>