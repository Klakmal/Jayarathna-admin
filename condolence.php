<html>
<head>
    <title>Condolence Screen</title>

    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/menu/simple_menu.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/condolence_style.css">
</head>
<body>

<?php include 'temp/header.php';  ?>

<div class = "condol" align="center">
    <div class="conform">
    <?php
        require "dbcon/dbcon.php";

        $error=FALSE;
            $deadnameerr = $visnameerr = $visnicerr = $relationerr = $messageerr = "";
            
            if (isset($_POST['submit'])) {
                
                if(empty($_POST['deadname'])){ 
                    $deadnameerr = "";
                    $error = TRUE;
                }else{
                    $deadname = $_POST['deadname'];
                }
                
                if(empty($_POST['visname'])){ 
                    $visnameerr = "";
                    $error = TRUE;
                }else{
                    $visname = $_POST['visname'];
                }
                
              if(empty($_POST['visnic'])){ 
                    $visnicerr = "";
                    $error = TRUE;
                }else{
                    $visnic = $_POST['visnic'];
                }
                
                if(empty($_POST['relation'])){ 
                    $relationerr = "";
                    $error = TRUE;
                }else{
                    $relation = $_POST['relation'];
                }
                if(empty($_POST['message'])){ 
                    $messagerr = "";
                    $error = TRUE;
                }else{
                    $message = $_POST['message'];
                }
                
                if ($error==FALSE){
               
                $sql = "INSERT INTO visitors (deadname,visname,visnic,relation,message) VALUES ('".$deadname."','".$visname."','".$visnic."','".$relation."','".$message."')";
                if(mysqli_query($conn,$sql)){
                    /*echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
                    header( "Location: condolence.php");*/
                    echo "<script>alert('Thank you for writing. Condolence message'); window.location.href='condolence.php'; </script>";
                    die();
                } else{
                    echo "<script type='text/javascript'>alert('Not successfully datatranfer!')</script>";
                }
                 
                }
            }
        ?>
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <div id="condolence">
            <form id="f3" action="condolence.php" method="post">
            <table id="tb3">
                <tr>
                    <td colspan="2" align="center">
                        <h2 id="heading2" align="center"><b>CONDOLENCE MESSAGE SCREEN</b></h2>
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
                        <div class="conimg" align="center"><img src="img/condolencepic.png"></div>
                        <div class="disdiv">
							<p id="discond">As part of our service to those arranging a funeral, each client will be 
offered the choice to have a condelence screen on the funeral day. This is one
of our unique services which allows anyone anywhere in the world to share 
their precious memories with their loved ones at the funeral.</p><p> This service can be 
easily accessed from our website allowing the family and friends to leave 
their thoughts and personal messages of condolence which also is a
personal tribute to the passed away person on his/her final day. 
All those messages will be put on display through this screen near the coffin.
The place and the number of days of its screening can be arranged according to
the clients' will. When displaying, all the messages will be screened after the
supervision of our team members. </p>
						</div>
                    </td>
                
                </tr>
				<tr>
                    <td colspan="2" align="center">
                        
						<br>
                    </td>
                
                </tr>
                 <tr>
                    
                        <td><label for="deadname">Dead Person Name : </label><span class="error"><?php echo $deadnameerr;?></span></td>
                        
                        <td>
                        
                        
                                <?php 
                                    
                                    echo '<input type="text" list="deadname" name="deadname" placeholder="Dead Person Name" required>';
                                    echo '<datalist id="deadname">';
                                    
                                    $sql1 = "SELECT `deadname` FROM `visitors`";
                                    $result1= mysqli_query($conn, $sql1);
                                     while($r=mysqli_fetch_row($result1))
                                     { 
                                           echo '<option id='.$r[0].'>'.$r[0].'</option>';
                                     }
                                    echo '</datalist>';
                                ?>
                            
                        </td>
                
                </tr>
                <tr>
                    
                      <td><label for="visname">Visitor Name : </label><span class="error"><?php echo $visnameerr;?></span></td>
                        
                    <td> <input type="text" name="visname" id="visname" placeholder="Visitor Name" required></td>
                    
                </tr>
               
                <tr>
                    
                     <td><label for="visnic">Visitor NIC : </label><span class="error"><?php echo $visnicerr;?></span></td>
                        
                       <td><input type="visnic" name="visnic" id="visnic" pattern="^\d[0-9V]{9}$" maxlength="10" placeholder="Visitor NIC - XXXXXXXXXV" required></td>
                </tr>
                <tr>
                    
                     <td><label for="relation">Relationship : </label><span class="error"><?php echo $relationerr;?></span></td>
                        
                       <td><input type="text" name="relation" id="relation" placeholder="Relationship" required></td>
                </tr>
                 <tr>
                    
                       <td><label for="message"></label><span class="error"><?php echo $messageerr;?></span></td>
                
                     <td> <textarea name="message" id="message" rows="10" cols="60" placeholder="Input Your Condolence Message Here" required></textarea></td>
                
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
    </div>
</div>

    <!-- include footer -->
    <?php include 'temp/footer.php';  ?>
    </body>
</html>