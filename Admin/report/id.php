<html>
<head>
<title>ID</title>
</head>
<body>
<?php
    require "dbcon/dbcon.php";
    $sql = "SELECT * FROM id";
    $query=(mysqli_query($conn,$sql));
?>
<table>
    <tr>
        <th>ID</th> 
        <th>No</th>
    </tr>
<?php
    while ($row = mysqli_fetch_assoc($query)){
         echo "<tr>";
        
            echo "<td>";
            echo $row['id'];
            echo "</td>";
                
            echo "<td>";
            echo $row['no'];
            echo "</td>";

           
         echo "</tr>";}
?>
</table>
    <?php
                require "dbcon/dbcon.php";
                $error=FALSE;
                $iderr = $noerr = "";
                 if (isset($_POST['insert'])) {
                     
                     if(empty($_POST['id'])){ 
                                $iderr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $id = $_POST['id'];
                            }
                     if(empty($_POST['no'])){ 
                                $noerr = "</br>* ";
                                $error = TRUE;
                            }else{
                                $no = $_POST['no'];
                            }
                    
                    
                    $sql = "INSERT INTO payment (id , no)
                VALUES ('".$id."','".$no."')";

                if (mysqli_query($conn, $sql)) {
                    //echo '<script>alert("New record created successfully")</script>';
                    header('location:id.php');
                }
                else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                 }
    ?>
                <div id="id">
                <form method="post" action="id.php">
                <table id="tb8">
                    <tr>
                        <th colspan="2" align="left"><b style="color:white; font-size:24px; text-shadow:2px 2px 2px gray;">ID</b></th> 
                    </tr>
                    <tr>
                    <td><label for="id">ID</label><span class="error"><?php echo $iderr;?></span></td>
                    <td><input type="text" name="id" placeholder="id"></td>
                    </tr> 
                    <tr>
                    <td><label for="no">No</label><span class="error"><?php echo $noerr;?></span></td>
                    <td><input type="text" name="no" placeholder="no"></td>
                    </tr>   
                    <tr>
                    <td colspan="2" align="center">
                    <input type="submit" value="INSERT" name="insert">
                    </td>
                    </tr>
                </table>
                </form>
                </div>              
</body>
</html>