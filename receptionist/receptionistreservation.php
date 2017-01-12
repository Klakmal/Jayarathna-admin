<html>
<head>
    <title>Reservation Form</title>

    <link rel="stylesheet" type="text/css" media="screen" href="../css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/menu/simple_menu.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/reservationForm.css">
</head>
<body>

<?php include '../../temp/header.php';  ?>

<div class = "resd1 " align="center">
    <div class="resd2">
    <?php
        require "../dbcon/dbcon.php";

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

              /* if(empty($_POST['dildate'])){ 
                    $dildateerr = "required";
                    $error = TRUE;
                }else{
                    $dildate = $_POST['dildate'];
                }*/
$month=$_POST['month'];
$dt=$_POST['dt'];
$year=$_POST['year'];
$dildate="$year-$month-$dt";
                
                /*if(empty($_POST['diltime'])){ 
                    $diltmerr = "required";
                    $error = TRUE;
                }else{
                    $diltime = $_POST['diltime'];
                }*/
$hours=$_POST['hours'];
$mins=$_POST['mins'];
$ampm=$_POST['ampm'];
$diltime="$hours-$mins-$ampm";
                
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
                if(empty($_POST['service5'])){ 
                    $error = TRUE;
                }else{
                    $service3 = $_POST['service5'];
                }
                if(empty($_POST['service6'])){ 
                    $error = TRUE;
                }else{
                    $service3 = $_POST['service6'];
                }
                if(empty($_POST['service7'])){ 
                    $error = TRUE;
                }else{
                    $service3 = $_POST['service7'];
                }
                
                if ($error==FALSE){
               
                $sql = "INSERT INTO `reservations`(`cusname`, `diladd`, `dildate`, `diltime`, `mobilenum`,`packname`,`Floral tributes`,`Remembrance booklet`,`Chairs and tents`,`Obituary Notices`,`Crematorium booking`,`Monumental plaques`,`Funeral pyres`) VALUES ('$_POST[cusname]','$_POST[diladd]','$dildate','$diltime','$_POST[mobilenum]','$_POST[packname]','$_POST[service1]','$_POST[service2]','$_POST[service3]','$_POST[service4]','$_POST[service5]','$_POST[service6]','$_POST[service7]')";

                if(mysqli_query($conn,$sql)){
                    die();
                } else{echo "error";}
                 
                }
            }
        ?>
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <div id="res3">
            <form id="f4" action="reservationForm.php" method="post">
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
                        
                       <td><select name=month value='' required>
                        <option value='01'>January</option>
                        <option value='02'>February</option>
                        <option value='03'>March</option>
                        <option value='04'>April</option>
                        <option value='05'>May</option>
                        <option value='06'>June</option>
                        <option value='07'>July</option>
                        <option value='08'>August</option>
                        <option value='09'>September</option>
                        <option value='10'>October</option>
                        <option value='11'>November</option>
                        <option value='12'>December</option>
                        </select>



                           

                        <select name=dt required >

                        <option value='01'>01</option>
                        <option value='02'>02</option>
                        <option value='03'>03</option>
                        <option value='04'>04</option>
                        <option value='05'>05</option>
                        <option value='06'>06</option>
                        <option value='07'>07</option>
                        <option value='08'>08</option>
                        <option value='09'>09</option>
                        <option value='10'>10</option>
                        <option value='11'>11</option>
                        <option value='12'>12</option>
                        <option value='13'>13</option>
                        <option value='14'>14</option>
                        <option value='15'>15</option>
                        <option value='16'>16</option>
                        <option value='17'>17</option>
                        <option value='18'>18</option>
                        <option value='19'>19</option>
                        <option value='20'>20</option>
                        <option value='21'>21</option>
                        <option value='22'>22</option>
                        <option value='23'>23</option>
                        <option value='24'>24</option>
                        <option value='25'>25</option>
                        <option value='26'>26</option>
                        <option value='27'>27</option>
                        <option value='28'>28</option>
                        <option value='29'>29</option>
                        <option value='30'>30</option>
                        <option value='31'>31</option>
                        </select>


                       <input  type=text name=year size=4 value="" pattern="^\d{4}$" maxlength="4" max="4" placeholder="year" required></td>
                       
                </tr>
                <tr>
                    
                     <td><label for="diltime">Dilivery Time</label><span class="error"><?php echo $diltmerr;?></span></td>
                        
                       <td>
                       <select name=hours required>
                            <option value='00'>00</option>
                            <option value='01'>01</option>
                            <option value='02'>02</option>
                            <option value='03'>03</option>
                            <option value='04'>04</option>
                            <option value='05'>05</option>
                            <option value='06'>06</option>
                            <option value='07'>07</option>
                            <option value='08'>08</option>
                            <option value='09'>09</option>
                            <option value='10'>10</option>
                            <option value='11'>11</option>
                            <option value='12'>12</option>
                        </select>
                        <select name=mins required>
                            <option value='00'>00</option>
                            <option value='01'>01</option>
                            <option value='02'>02</option>
                            <option value='03'>03</option>
                            <option value='04'>04</option>
                            <option value='05'>05</option>
                            <option value='06'>06</option>
                            <option value='07'>07</option>
                            <option value='08'>08</option>
                            <option value='09'>09</option>
                            <option value='10'>10</option>
                            <option value='11'>11</option>
                            <option value='12'>12</option>
                            <option value='13'>13</option>
                            <option value='14'>14</option>
                            <option value='15'>15</option>
                            <option value='16'>16</option>
                            <option value='17'>17</option>
                            <option value='18'>18</option>
                            <option value='19'>19</option>
                            <option value='20'>20</option>
                            <option value='21'>21</option>
                            <option value='22'>22</option>
                            <option value='23'>23</option>
                            <option value='24'>24</option>
                            <option value='25'>25</option>
                            <option value='26'>26</option>
                            <option value='27'>27</option>
                            <option value='28'>28</option>
                            <option value='29'>29</option>
                            <option value='30'>30</option>
                            <option value='31'>31</option>
                            <option value='32'>32</option>
                            <option value='33'>33</option>
                            <option value='34'>34</option>
                            <option value='35'>35</option>
                            <option value='36'>36</option>
                            <option value='37'>37</option>
                            <option value='38'>38</option>
                            <option value='39'>39</option>
                            <option value='40'>40</option>
                            <option value='41'>41</option>
                            <option value='42'>42</option>
                            <option value='43'>43</option>
                            <option value='44'>44</option>
                            <option value='45'>45</option>
                            <option value='46'>46</option>
                            <option value='47'>47</option>
                            <option value='48'>48</option>
                            <option value='49'>49</option>
                            <option value='50'>50</option>
                            <option value='51'>51</option>
                            <option value='52'>52</option>
                            <option value='53'>53</option>
                            <option value='54'>54</option>
                            <option value='55'>55</option>
                            <option value='56'>56</option>
                            <option value='57'>57</option>
                            <option value='58'>58</option>
                            <option value='59'>59</option>
                            <option value='60'>60</option>
                        </select>

                       <select name=ampm required>
                                <option value='am'>Am</option>
                                <option value='pm'>Pm</option>
                            </select></td>
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

                            <label id="LearnMoreBtn">More details..</label>

                            <div id="overlay"></div>


                            <div id="popup" align="center">
                                <div id="btn" align="right">
                                <button id="CloseBtn">CLOSE</button>
                                </div>
                             <div id="popupcontent" align="center">
                                hi halooo eeee
                             </div>
                            </div>
<script type="text/javascript">
window.onload = function() {
  document.getElementById("LearnMoreBtn").onclick = function(){
        var overlay = document.getElementById("overlay");
        var popup = document.getElementById("popup");
        overlay.style.display = "block";
        popup.style.display = "block";
    };
    
  document.getElementById("CloseBtn").onclick = function(){
        var overlay = document.getElementById("overlay");
        var popup = document.getElementById("popup");
        overlay.style.display = "none";
        popup.style.display = "none";      
  }
};
</script>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div id="pa2"><font color ="white"><label for="service2">Provision of Remembrance Booklet - Quantity</label>
                            <input type="text" name="service2" id="service2" value="0"></font></div>
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
                            <div id="pa2"><font color ="white"><label for="service5">Crematorium Booking</label>
                            <input type="radio" name="service5" id="service5" value="true"></font></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            
                            <div id="pa2"><font color ="white"><label for="service6">Engraving, Supplying and erection of Monumental Plaques</label>
                            <select name=service6>
                                <option value='false'>--Choose-one--</option>
                                <option value='op1'>option1</option>
                                <option value='op2'>option2</option>
                                <option value='op3'>option3</option>
                                <option value='op4'>option4</option>
                            </select>
                            </font></div>
                        </td>
                    </tr>
                     <tr>
                        <td colspan="2">
                            
                            <div id="pa2"><font color ="white"><label for="service7">Construction of different types of funeral Pyres</label>
                            <select name=service7>
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