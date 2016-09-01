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
            $cusnameerr = $diladderr = $dildateerr = $diltmerr = $mobilenoerr =$packname = $service1 = $service2 = $service3=  "";
            
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
                if(empty($_POST['packname'])){ 
                    $error = TRUE;
                }else{
                    $packname = $_POST['packname'];
                }
                if(empty($_POST['service1'])){ 
                    $error = TRUE;
                }else{
                    $service1 = $_POST['service1'];
                }
                 if(empty($_POST['service2'])){ 
                    $error = TRUE;
                }else{
                    $service2 = $_POST['service2'];
                }
                if(empty($_POST['service3'])){ 
                    $error = TRUE;
                }else{
                    $service3 = $_POST['service3'];
                }
                if(empty($_POST['service4'])){ 
                    $error = TRUE;
                }else{
                    $service3 = $_POST['service4'];
                }
                
                if ($error==FALSE){
               
                $sql = "INSERT INTO `reservations`(`cusname`, `diladd`, `dildate`, `diltime`, `mobilenum`,`packname`,`Floral tributes`,`Remembrance booklet`,`Chairs and tents`,`Obituary Notices`) VALUES ('$_POST[cusname]','$_POST[diladd]','$_POST[dildate]','$_POST[diltime]','$_POST[mobilenum]','$_POST[packname]','$_POST[service1]','$_POST[service2]','$_POST[service3]','$_POST[service4]')";

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
                        <h2 id="reshead" align="center" style = "font-family: myfont1; color: #a86205;" >Reservation Form</h2>
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

            </table>
            
            </div>


            <div>
                <div id="tb"><table id="tbl1">

                <tr>
                    <td colspan="2">
                        <div id="p1" align="left"><h2><font color ="white"><h5 style="font-family:myfont1; font-size:28px; color: white;">Packages</h5></font></h2></div>
                    </td>
                </tr>

                   <tr>
                        <td colspan="2">
                            <div id="pa1"><font color ="white" size="2px">
                            
                            <label for="packname"><h4>VIP BRONZE PACKAGE</label><input type="radio" name="packname" value="VIP BRONZE PACKAGE" required></h4>
                                <p>Bronze package will include "VOLVO" S80 Limousine Hearse and 04 floral arrangements with special vehicle to carry floral tributes.
                            Free of charge photo album with 60 photographs on the day of funeral and other things like embalming with the best english preservations, casket, carpet, oil lamp, brass canopy and etc</p>

                            </font></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                              <div id="pa1"><font color ="white" size="2px">
                            <label for="packname"><h4>VIP SILVER PACKAGE</label><input type="radio" name="packname" value="VIP SILVER PACKAGE"></h4>
                            <p>Silver package will include "VOLVO" S80 Limousine Hearse and 04 floral arrangements with special vehicle to carry floral tributes.
                            Free of charge video coverage and photo album with 60 photographs on the day of funeral and other things like embalming with the best english preservations, casket, carpet, oil lamp, brass canopy and etc</p>
                            </font></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div id="pa1"><font color ="white" size="2px">
                            <label for="packname"><h4>VIP GOLD PACKAGE</label><input type="radio" name="packname" value="VIP GOLD PACKAGE"></h4>
                            <p>Gold package will include S80 "Volvo/Mercedes Benz" Hearse according to availability and 04 large floral arrangements with special vehicle to carry floral tributes.
                            Free of charge video coverage photo album with 80 photographs on the day of funeral and other things like embalming with the best english preservations, casket, carpet, oil lamp, brass canopy and etc</p>
                                </font></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div id="pa1"><font color ="white" size="2px">
                            <label for="packname"><h4>VIP PLATINUM PACKAGE</label><input type="radio" name="packname" value="VIP PLATINUM PACKAGE"></h4>
                            <p>Platinum package will include Brand New Mercedes Benz Hearse and 04 large floral arrangements with special vehicle to carry floral tributes.
                            Free of charge photo video coveragalbum with 100 photographs on the day of funeral and other things like embalming with the best english preservations, casket, carpet, oil lamp, brass canopy, special complimentary floral arrangement for casket and etc</p>
                            </font></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                           <div id="pa1"><font color ="white" size="2px">
                            <label for="packname"><h4>DELUXE PACKAGE</label><input type="radio" name="packname" value="DELUXE PACKAGE"></h4><p>
                            Deluxe package is for funerals held at our newly renovated parlour.This package will include Luxury Grey Volvo 960 Hearse or Vauxhall Omega Hearse, 
                            fresh flower arrangements, embalming with the best english preservations and casket with important fittings.
                            </p>

                            </font></div>
                        </td>
                    </tr>




                <tr>
                <td colspan="2">
                    <div id="p1" align="left"><h2><font color ="white"><h5 style="font-family:myfont1; font-size:28px; color: white;">Other Services</h5></font></h2></div>
                </td>
                </tr>

                    <tr>
                        <td colspan="2">
                            
                            <div id="pa2"><font color ="white"><label for="service1">Arrangement of Floral Tributes</label>
                            <select name=service1>
                                <option value='false'>--Choose-one--</option>
                                <option value='op1'>option1</option>
                                <option value='op2'>option2</option>
                                <option value='op3'>option3</option>
                            </select>
                            </font></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div id="pa2"><font color ="white"><label for="service2">Provision of Remembrance Booklet</label>
                            <input type="text" name="service2" id="service2"></font></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            
                            <div id="pa2"><font color ="white"><label for="service3">Assisting to hire Chairs and tents</label>
                            <select name=service3>
                                <option value='false'>--Choose-one--</option>
                                <option value='op1'>option1</option>
                                <option value='op2'>option2</option>
                                <option value='op3'>option3</option>
                            </select>
                            </font></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            
                            <div id="pa2"><font color ="white"><label for="service4">Arranging Obituary Notices</label>
                            <select name=service4>
                                <option value='false'>------Choose-one--------</option>
                                <option value='Newsaper'>Newsaper</option>
                                <option value='Radio Announcement'>Radio Announcement</option>
                                
                            </select>
                            </font></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div id="pa2"><font color ="white"><label for="service2">Crematorium Booking</label>
                            <input type="radio" name="service5" id="service5"></font></div>
                        </td>
                    </tr>
                    
                    
                <tr>
                     <td colspan="2">
                        <input type="submit" value="Submit" name="submit"> 
                        <input type="reset" value="Cancle" name="cancle">
                    </td>
                </tr>
        
    </table>

    </div>
    </div>
        </form>
        </form>
    </div>
</div>



    <!-- include footer -->
    <?php include 'temp/footer.php';  ?>
    </body>
</html>