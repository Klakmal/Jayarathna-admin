<html>
<head>
    <title>Reservation Form</title>

    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/menu/simple_menu.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/reservationForm.css">
</head>
<body>

<?php include 'temp/header.php';  ?>

<div class = "resd1 " align="center">
    <div class="resd2">
    <?php
        require "dbcon/dbcon.php";

        $error=FALSE;
            $cusnameerr = $diladderr = $dildateerr = $diltmerr = $mobilenoerr = "";
            
            if (isset($_POST['submit'])) {
                
                if(empty($_POST['cusname'])){ 
                    $cusnameerr = "required";
                    $error = TRUE;
                }else{
                    $cusname = $_POST['cusname'];
                }
                
                if(empty($_POST['diladd'])){ 
                    $diladderr = "required";
                    $error = TRUE;
                }else{
                    $diladd = $_POST['diladd'];
                }

                if(empty($_POST['dildate'])){ 
                    $dildateerr = "required";
                    $error = TRUE;
                }else{
                    $dildate = $_POST['dildate'];
                }
                
                if(empty($_POST['diltime'])){ 
                    $diltmerr = "required";
                    $error = TRUE;
                }else{
                    $diltime = $_POST['diltime'];
                }
                
                if(empty($_POST['mobilenum'])){ 
                    $mobilenoerr = "";
                    $error = TRUE;
                }else{
                    $mobilenum = $_POST['mobilenum'];
                }
                
                
                if ($error==FALSE){
               
                $sql = "INSERT INTO `reservations`(`cusname`, `diladd`, `dildate`, `diltime`, `mobilenum`) VALUES ('$_POST[cusname]','$_POST[diladd]','$_POST[dildate]','$_POST[diltime]','$_POST[mobilenum]')";
                if(mysqli_query($conn,$sql)){
                    die();
                } else{echo "error";}
                 
                }
            }
        ?>
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <div id="res3">
            <form id="f4" action="reservaton.php" method="post">
            <table id="tb4">
                <tr>
                    <td colspan="2">
                        <h2 id="reshead">Reservation Form</h2>
                    </td>
                
                </tr>
                 <tr>
                    
                        <td><label for="cusname">Customer Name</label><span class="error"><?php echo $cusnameerr;?></span></td>
                        
                        <td><input type="text" name="cusname" id="cusname" required></td>
                
                </tr>
                <tr>
                    
                      <td><label for="diladd">Dilivery Address</label><span class="error"><?php echo $diladderr;?></span></td>
                        
                    <td> <input type="text" name="diladd" id="diladd" required></td>
                    
                </tr>
               
                <tr>
                    
                     <td><label for="dildate">Dilivery Date</label><span class="error"><?php echo $dildateerr;?></span></td>
                        
                       <td><input type="date" name="dildate" id="dildate" required></td>
                </tr>
                <tr>
                    
                     <td><label for="diltime">Dilivery Time</label><span class="error"><?php echo $diltmerr;?></span></td>
                        
                       <td><input type="text" name="diltime" id="diltime" required></td>
                </tr>
                 <tr>
                    
                       <td><label for="mobilenum">Mobile No</label><span class="error"><?php echo $mobilenoerr;?></span></td>
                
                     <td> <input type="text" name="mobilenum" id="mobile" required></input></td>
                
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


<div>
    <div id="tb"><table id="tbl1">

                <tr>
                    <td colspan="2">
                        <div id="p1" align="center"><h2><font color ="white" >Packages</font></h2></div>
                    </td>
                </tr>

                   <tr>
                        <td colspan="2">
                            <div id="pa1"><font color ="white">jjhgjh</font></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div id="pa1"><font color ="white">lhllgg</font></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div id="pa1"><font color ="white">lhllgg</font></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div id="pa1"><font color ="white">lhllgg</font></div>
                        </td>
                    </tr>

                <tr>
                <td colspan="2">
                    <div id="p1" align="center"><h2><font color ="white">Other Services</font></h2></div>
                </td>
                </tr>

                    <tr>
                        <td colspan="2">
                            <div id="pa2"><font color ="white">lhllgg</font></div>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <div id="pa3"><font color ="white">amount</font></div>
                        </td>
                    </tr>
                    <div id="onlinep">
                        fkffkfdhddh
                    </div>

        
    </table>
    </div>
</div>
</div>



    <!-- include footer -->
    <?php include 'temp/footer.php';  ?>
    </body>
</html>