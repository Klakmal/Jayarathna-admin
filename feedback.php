<html>
<head>
    <title>Feed-Back</title>

    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/menu/simple_menu.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/condolence_style.css">
</head>
<body>

<?php include 'temp/header.php';  ?>

<div class = "fbdiv1" align="center">
    <div class="fbdiv2">
    <?php
        require "dbcon/dbcon.php";

        $error=FALSE;
            $yourname = $fdback = $status = ""; 
            
            if (isset($_POST['submit'])) {
                
                if(empty($_POST['yourname'])){ 
                    $error = TRUE;
                }else{
                    $yourname = $_POST['yourname'];
                }
                
                if(empty($_POST['fdback'])){ 
                    $error = TRUE;
                }else{
                    $fdback = $_POST['fdback'];
                }
                
              if(empty($_POST['status'])){ 
                    $error = TRUE;
                }else{
                    $status = $_POST['status'];
                }
                
                if ($error==FALSE){
                $sql = "INSERT INTO `feedback`(`yourname`, `fdback`, `status`) VALUES ('$_POST[yourname]','$_POST[fdback]','$_POST[status]')";

                if(mysqli_query($conn,$sql)){
                    echo "<script>alert('Thank you for writing. I appreciate your feedback'); window.location.href='feedback.php'; </script>";
                    die();
                } else{
                    echo "<script type='text/javascript'>alert('Not successfully datatranfer!')</script>";}
                }
            }
        ?>
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <div id="feedback">
                <form id="fb5" action="feedback.php" method="post">
                    <table id="fb6">
                        <tr>
                            <td colspan="2">
                                <h1 id="headertable" align="center" style = "font-family: myfont1; color: #a86205;"><b>FEED-BACK</b></h1>
                                <hr>
                            </td>
                        
                        </tr>
                        <tr>
                            <td colspan="2">
                                <p id="headdis" align="center">
									We would love to hear your,thoughts, concerns, problems with anything so we can improve!<br> 
									Please take a minute to let us know what you think about us.
								</p>
                            </td>
                        
                        </tr>
                         <tr>
                            
                                <td><label for="yourname"></label></td>
                                
                                <td><input type="text" name="yourname" id="yourname" placeholder="Your Name" required></td>
                        
                        </tr>
                        <tr>
                            
                               <td><label for="fdback"></label></td>
                        
                             <td> <textarea name="fdback" id="fdback" rows="10" cols="40" placeholder="Enter your Feed-Back" required></textarea></td>
                        
                        </tr>
                       
                        <tr>
                            
                             <td><label for="status">Our Service : </label></span></td>
                                
                             <td>   <label for="fdback">Satisfied </label><input type="radio" name="status" value="Satisfied" required>
                                    <label for="fdback">Unsatisfied </label><input type="radio" name="status" value="Unsatisfied"><br/></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" value="Submit" name="submit" <?php if ($error==FALSE){}?>> 
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