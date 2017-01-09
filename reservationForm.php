
<html>
<head>
    <title>Reservation Form</title>

    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/menu/simple_menu.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/reservationForm.css">

    <style type="text/css">
    input[type=tex] {
        background-color: #a5adaf;
    }
    .packv{
        background-color:#a5adaf;
        width:200px;
        height:20px;
        position: relative;
        float: right;
        padding: 10px;
        padding-bottom: 30px;
        margin: 0px;
        border: 2px solid darkgray;
        border-collapse: 10px;
        border-bottom-right-radius: 10px;
        border-top-left-radius: 10px;
        transition: box-shadow 0.3s, border 1s;
    }

    #s3,#s1,#s2,#s4,#s5,#s6,#s7,#s8,#s9,#total{
        background-color: #a5adaf;
        width:150px;
        height:10px;
        position: relative;
        float: right;
        padding: 5px;
        padding-bottom: 10px;
        margin: 0px;
        border: 2px solid darkgray;
        border-collapse: 10px;
        border-bottom-right-radius: 10px;
        border-top-left-radius: 10px;
        transition: box-shadow 0.3s, border 1s;
    }

    input[type=submit],[type=reset]{
        margin: 5px;
        float: center;
        border:none;
        background-color: #70102e;
        color:white;
        width: 85px;
        height: 30px;
        float:right;
        margin-bottom: 100px;
        margin-top: 100px;
    }
    #ida{
        width: 600px;
    }
    </style>
</head>
<body>

<?php include 'temp/header.php';  ?>

<div class = "resd1 " align="center">
    <div class="resd2">
    <?php
        require "dbcon/dbcon.php";

        $error=FALSE;
            $cusnameerr = $diladderr = $dildateerr = $diltmerr = $mobilenoerr =$packname = $service1 = $service2 = $service3=$service4=$service5= $service6= $service7=$service8s="";
            
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

             
                $month=$_POST['month'];
                $dt=$_POST['dt'];
                $year=$_POST['year'];
                $dildate="$year-$month-$dt";
                
                
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
                    $service4 = $_POST['service4'];
                }
                if(empty($_POST['service5'])){ 
                    $error = TRUE;
                }else{
                    $service5 = $_POST['service5'];
                }
                if(empty($_POST['service6'])){ 
                    $error = TRUE;
                }else{
                    $service6 = $_POST['service6'];
                }
                if(empty($_POST['service7'])){ 
                    $error = TRUE;
                }else{
                    $service7 = $_POST['service7'];
                }
                if(empty($_POST['service8'])){ 
                    $error = TRUE;
                }else{
                    $service8 = $_POST['service8'];
                }
                if(empty($_POST['service9'])){ 
                    $error = TRUE;
                }else{
                    $service9 = $_POST['service9'];
                }
                
                if ($error==FALSE){
               
                $sql = "INSERT INTO `reservations`(`cusname`, `diladd`, `dildate`, `diltime`, `mobilenum`,`packname`,`Floral_tributes`,`Remembrance_booklet`,`Chairs_and_tents`,`Obituary_Notices`,`Crematorium_booking`,`Monumental_plaques`,`Funeral_pyres`,`Web_casting`,`Condolence_messeges`) VALUES ('$_POST[cusname]','$_POST[diladd]','$dildate','$diltime','$_POST[mobilenum]','$_POST[packname]','$_POST[service1]','$_POST[service2]','$_POST[service3]','$_POST[service4]','$_POST[service5]','$_POST[service6]','$_POST[service7]','$_POST[service8]','$_POST[service9]')";

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
                    
                     <td><label for="dildate">Funeral Date</label><span class="error"><?php echo $dildateerr;?></span></td>
                        
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


                       <input  type=text name=year size=4 value="" pattern="^\d{4}$" maxlength="4" max="4" placeholder="year" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" required></td>
                       
                </tr>
                <tr>
                    
                     <td><label for="diltime">Funeral Time</label><span class="error"><?php echo $diltmerr;?></span></td>
                        
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
                
                     <td> <input type="text" name="mobilenum" id="mobile" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" required></input></td>
                
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
                            <label for="packname"><h4>VIP BRONZE PACKAGE</label><input type="radio" name="packname" onchange="getValue(bronze);" value="VIP BRONZE PACKAGE" required></h4>
                                <p>Bronze package will include "VOLVO" S80 Limousine Hearse and 04 floral arrangements with special vehicle to carry floral tributes.
                            Free of charge photo album with 60 photographs on the day of funeral and other things like embalming with the best english preservations, casket, carpet, oil lamp, brass canopy and etc</p>
                            <?php $we=5;?>
                            <script>
                                total=0;
                                var bronze=<?php  require "dbcon/dbcon.php";
                                                $sql = "SELECT * FROM serviceprices WHERE s_name='s0'";
                                                $query=(mysqli_query($conn,$sql));
                                                $row = mysqli_fetch_assoc($query);
                                                echo $row['bronze'] ?>;
                                
                                
                                //bronze=275000;
                                var gold=<?php  require "dbcon/dbcon.php";
                                                $sql = "SELECT * FROM serviceprices WHERE s_name='s0'";
                                                $query=(mysqli_query($conn,$sql));
                                                $row = mysqli_fetch_assoc($query);
                                                echo $row['gold'] ?>;
                                var silver=<?php  require "dbcon/dbcon.php";
                                                $sql = "SELECT * FROM serviceprices WHERE s_name='s0'";
                                                $query=(mysqli_query($conn,$sql));
                                                $row = mysqli_fetch_assoc($query);
                                                echo $row['silver'] ?>;
                                var platinum=<?php  require "dbcon/dbcon.php";
                                                $sql = "SELECT * FROM serviceprices WHERE s_name='s0'";
                                                $query=(mysqli_query($conn,$sql));
                                                $row = mysqli_fetch_assoc($query);
                                                echo $row['platinum'] ?>;
                                var deluxe=<?php  require "dbcon/dbcon.php";
                                                $sql = "SELECT * FROM serviceprices WHERE s_name='s0'";
                                                $query=(mysqli_query($conn,$sql));
                                                $row = mysqli_fetch_assoc($query);
                                                echo $row['deluxe'] ?>;

                                function getValue(s){
                                    document.getElementById("packval").innerHTML= s ;
                                    total=total+s;
                                    document.getElementById("total").innerHTML= total ;
                                }
                               
                            </script>
                            
                            </font></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                              <div id="pa1"><font color ="white" size="2px">
                            <label for="packname"><h4>VIP SILVER PACKAGE</label><input type="radio" name="packname" onchange="getValue(silver)" value="VIP SILVER PACKAGE"></h4>
                            <p>Silver package will include "VOLVO" S80 Limousine Hearse and 04 floral arrangements with special vehicle to carry floral tributes.
                            Free of charge video coverage and photo album with 60 photographs on the day of funeral and other things like embalming with the best english preservations, casket, carpet, oil lamp, brass canopy and etc</p>
                           
                            
                            </font></div>

                    </tr>
                    <tr>
                        <td colspan="2">
                            <div id="pa1"><font color ="white" size="2px">
                            <label for="packname"><h4>VIP GOLD PACKAGE</label><input type="radio" name="packname" onchange="getValue(gold)" value="VIP GOLD PACKAGE"></h4>
                            <p>Gold package will include S80 "Volvo/Mercedes Benz" Hearse according to availability and 04 large floral arrangements with special vehicle to carry floral tributes.
                            Free of charge video coverage photo album with 80 photographs on the day of funeral and other things like embalming with the best english preservations, casket, carpet, oil lamp, brass canopy and etc</p>
                         
                                </font></div>
                        </td>
                        </td>
                        <td><div class="packv" align="center" "><p id="packval">Package Prize</p></div></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div id="pa1"><font color ="white" size="2px">
                            <label for="packname"><h4>VIP PLATINUM PACKAGE</label><input type="radio" name="packname" onchange="getValue(platinum)" value="VIP PLATINUM PACKAGE"></h4>
                            <p>Platinum package will include Brand New Mercedes Benz Hearse and 04 large floral arrangements with special vehicle to carry floral tributes.
                            Free of charge photo video coveragalbum with 100 photographs on the day of funeral and other things like embalming with the best english preservations, casket, carpet, oil lamp, brass canopy, special complimentary floral arrangement for casket and etc</p>
                            
                            </font></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                           <div id="pa1"><font color ="white" size="2px">
                            <label for="packname"><h4>DELUXE PACKAGE</label><input type="radio" name="packname" onchange="getValue(deluxe)" value="DELUXE PACKAGE"></h4><p>
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
                            <select id="service1" onchange="s1func()" name=service1>
                                <option value='false'>---None---</option>
                                <option value='op1'>Gold</option>
                                <option value='op2'>Silver</option>
                                <option value='op3'>Bronze</option>
                            </select>
                            <script>

                                function s1func() {
                                    var x = document.getElementById("service1").value;
                                    if(x=='false'){var y=0;}
                                    if(x=='op1'){var y=<?php  require "dbcon/dbcon.php";
                                                $sql = "SELECT * FROM serviceprices WHERE s_name='s1'";
                                                $query=(mysqli_query($conn,$sql));
                                                $row = mysqli_fetch_assoc($query);
                                                echo $row['gold'] ?>;}
                                    if(x=='op2'){var y=<?php  require "dbcon/dbcon.php";
                                                $sql = "SELECT * FROM serviceprices WHERE s_name='s1'";
                                                $query=(mysqli_query($conn,$sql));
                                                $row = mysqli_fetch_assoc($query);
                                                echo $row['silver'] ?>;}
                                    if(x=='op3'){var y=<?php  require "dbcon/dbcon.php";
                                                $sql = "SELECT * FROM serviceprices WHERE s_name='s1'";
                                                $query=(mysqli_query($conn,$sql));
                                                $row = mysqli_fetch_assoc($query);
                                                echo $row['bronze'] ?>;}
                                    document.getElementById("s1").innerHTML =  y;
                                    total=total+y;
                                    document.getElementById("total").innerHTML = total;
                                }
                            </script>
                            

                        </td>
                        <td><p id="s1"></p></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div id="pa2"><font color ="white"><label for="service2">Provision of Remembrance Booklet - Quantity</label>
                            <input type="tex" id="service2" onchange="s2func()" name="service2" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" value="0" >
                            </font></div>
                        </td>
                        <script>
                            function s2func() {
                                var x = document.getElementById("service2");
                                y = x.value*<?php  require "dbcon/dbcon.php";
                                                $sql = "SELECT * FROM serviceprices WHERE s_name='s2'";
                                                $query=(mysqli_query($conn,$sql));
                                                $row = mysqli_fetch_assoc($query);
                                                echo $row['gold'] ?>;
                                document.getElementById("s2").innerHTML =  y;
                                total=total+y;
                                document.getElementById("total").innerHTML = total;
                            }
                        </script>
                        <td><p id="s2"></p></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            
                            <div id="pa2"><font color ="white"><label for="service3">Assisting to hire Chairs and tents</label>
                            <select id="service3" onchange="s3func()" name=service3>
                                <option value='false'>--None--</option>
                                <option value='op1'>Gold</option>
                                <option value='op2'>Silver</option>
                                <option value='op3'>Bronze</option>
                            </select>
                            </font></div>
                        </td>
                         <script>
                                function s3func() {
                                    var x = document.getElementById("service3").value;
                                    if(x=='false'){var y=0;}
                                    if(x=='op1'){var y=<?php  require "dbcon/dbcon.php";
                                                $sql = "SELECT * FROM serviceprices WHERE s_name='s3'";
                                                $query=(mysqli_query($conn,$sql));
                                                $row = mysqli_fetch_assoc($query);
                                                echo $row['gold'] ?>;}
                                    if(x=='op2'){var y=<?php  require "dbcon/dbcon.php";
                                                $sql = "SELECT * FROM serviceprices WHERE s_name='s3'";
                                                $query=(mysqli_query($conn,$sql));
                                                $row = mysqli_fetch_assoc($query);
                                                echo $row['silver'] ?>;}
                                    if(x=='op3'){var y=<?php  require "dbcon/dbcon.php";
                                                $sql = "SELECT * FROM serviceprices WHERE s_name='s3'";
                                                $query=(mysqli_query($conn,$sql));
                                                $row = mysqli_fetch_assoc($query);
                                                echo $row['bronze'] ?>;}
                                    document.getElementById("s3").innerHTML =  y;
                                    total=total+y;
                                    document.getElementById("total").innerHTML = total;
                                }
                                </script>
                            

                        </td>
                        <td><p id="s3"></p></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            
                            <div id="pa2"><font color ="white"><label for="service4">Arranging Obituary Notices</label>
                            <select id="service4" onchange="s4func()" name=service4>
                                <option value='false'>----------None----------</option>
                                <option value='Newspaper'>Newspaper</option>
                                <option value='Radio Announcement'>Radio Announcement</option>
                                
                            </select>
                            </font></div>
                        </td>
                        <script>
                                function s4func() {
                                    var x = document.getElementById("service4").value;
                                    if(x=='false'){y=0;}
                                    if(x=='Newspaper'){var y=<?php  require "dbcon/dbcon.php";
                                                $sql = "SELECT * FROM serviceprices WHERE s_name='s4'";
                                                $query=(mysqli_query($conn,$sql));
                                                $row = mysqli_fetch_assoc($query);
                                                echo $row['gold'] ?>;}
                                    if(x=='Radio Announcement'){var y=<?php  require "dbcon/dbcon.php";
                                                $sql = "SELECT * FROM serviceprices WHERE s_name='s4'";
                                                $query=(mysqli_query($conn,$sql));
                                                $row = mysqli_fetch_assoc($query);
                                                echo $row['silver'] ?>;}
                                    
                                    document.getElementById("s4").innerHTML =  y;
                                    total=total+y;
                                    document.getElementById("total").innerHTML = total;
                                }
                                </script>
                            

                        </td>
                        <td><p id="s4"></p></td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <div id="pa2"><font color ="white"><label for="service5">Crematorium Booking</label>
                            <select id="service5" onchange="s5func()" name=service5>
                                <option value='no'> No </option>
                                <option value='yes'>Yes</option>
                                
                            </select></font></div>
                        </td>
                        <script>
                                function s5func() {
                                    var x = document.getElementById("service5").value;
                                    if(x=='no'){y=0;}
                                    if(x=='yes'){var y=<?php  require "dbcon/dbcon.php";
                                                $sql = "SELECT * FROM serviceprices WHERE s_name='s5'";
                                                $query=(mysqli_query($conn,$sql));
                                                $row = mysqli_fetch_assoc($query);
                                                echo $row['gold'] ?>;}
                                    
                                    document.getElementById("s5").innerHTML =  y;
                                    total=total+y;
                                    document.getElementById("total").innerHTML = total;
                                }
                                </script>
                            

                        </td>
                        <td><p id="s5"></p></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            
                            <div id="pa2"><font color ="white"><label for="service6">Engraving, Supplying and erection of Monumental Plaques</label>
                            <select id="service6" onchange="s6func()" name=service6>
                                <option value='false'>---None---</option>
                                <option value='op1'>Gold</option>
                                <option value='op2'>Silver</option>
                                <option value='op3'>Bronze</option>
                                <option value='op4'>Deluxe</option>
                            </select>
                            </font></div>
                        </td>
                        <script>
                                function s6func() {
                                    var x = document.getElementById("service6").value;
                                    if(x=='false'){y=0;}
                                    if(x=='op1'){var y=<?php  require "dbcon/dbcon.php";
                                                $sql = "SELECT * FROM serviceprices WHERE s_name='s6'";
                                                $query=(mysqli_query($conn,$sql));
                                                $row = mysqli_fetch_assoc($query);
                                                echo $row['gold'] ?>;}
                                    if(x=='op2'){var y=<?php  require "dbcon/dbcon.php";
                                                $sql = "SELECT * FROM serviceprices WHERE s_name='s6'";
                                                $query=(mysqli_query($conn,$sql));
                                                $row = mysqli_fetch_assoc($query);
                                                echo $row['silver'] ?>;}
                                    if(x=='op3'){var y=<?php  require "dbcon/dbcon.php";
                                                $sql = "SELECT * FROM serviceprices WHERE s_name='s6'";
                                                $query=(mysqli_query($conn,$sql));
                                                $row = mysqli_fetch_assoc($query);
                                                echo $row['bronze'] ?>;}
                                    if(x=='op4'){var y=<?php  require "dbcon/dbcon.php";
                                                $sql = "SELECT * FROM serviceprices WHERE s_name='s6'";
                                                $query=(mysqli_query($conn,$sql));
                                                $row = mysqli_fetch_assoc($query);
                                                echo $row['deluxe'] ?>;}
                                    document.getElementById("s6").innerHTML =  y;
                                    total=total+y;
                                    document.getElementById("total").innerHTML = total;
                                }
                                </script>
                            

                        </td>
                        <td><p id="s6"></p></td>
                    </tr>
                     <tr>
                        <td colspan="2">
                            
                            <div id="pa2"><font color ="white"><label for="service7">Construction of different types of funeral Pyres</label>
                            <select id="service7" onchange="s7func()" name=service7>
                                <option value='false'>--None--</option>
                                <option value='op1'>Gold</option>
                                <option value='op2'>Silver</option>
                                <option value='op3'>Bronze</option>
                                
                            </select>
                            </font></div>
                        </td>
                        <script>
                                function s7func() {
                                    var x = document.getElementById("service7").value;
                                    if(x=='false'){y=0;}
                                    if(x=='op1'){var y=<?php  require "dbcon/dbcon.php";
                                                $sql = "SELECT * FROM serviceprices WHERE s_name='s7'";
                                                $query=(mysqli_query($conn,$sql));
                                                $row = mysqli_fetch_assoc($query);
                                                echo $row['gold'] ?>;}
                                    if(x=='op2'){var y=<?php  require "dbcon/dbcon.php";
                                                $sql = "SELECT * FROM serviceprices WHERE s_name='s7'";
                                                $query=(mysqli_query($conn,$sql));
                                                $row = mysqli_fetch_assoc($query);
                                                echo $row['silver'] ?>;}
                                    if(x=='op3'){var y=<?php  require "dbcon/dbcon.php";
                                                $sql = "SELECT * FROM serviceprices WHERE s_name='s7'";
                                                $query=(mysqli_query($conn,$sql));
                                                $row = mysqli_fetch_assoc($query);
                                                echo $row['bronze'] ?>;}
                                    document.getElementById("s7").innerHTML =  y;
                                    total=total+y;
                                    document.getElementById("total").innerHTML = total;
                                }
                                </script>
                            

                        </td>
                        <td><p id="s7"></p></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div id="pa2"><font color ="white"><label for="service8">web casting</label>
                            <select id="service8" onchange="s8func()" name=service8>
                                <option value='no'> No </option>
                                <option value='yes'>Yes</option>
                                
                            </select></font></div>
                        </td>
                        <script>
                                function s8func() {
                                    var x = document.getElementById("service8").value;
                                    if(x=='no'){y=0;}
                                    if(x=='yes'){var y=<?php  require "dbcon/dbcon.php";
                                                $sql = "SELECT * FROM serviceprices WHERE s_name='s8'";
                                                $query=(mysqli_query($conn,$sql));
                                                $row = mysqli_fetch_assoc($query);
                                                echo $row['gold'] ?>;}

                                    
                                    document.getElementById("s8").innerHTML =  y;
                                    total=total+y;
                                    document.getElementById("total").innerHTML = total;
                                }
                                </script>
                            

                        </td>
                        <td><p id="s8"></p></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div id="pa2"><font color ="white"><label for="service9">Condolence messeges screening Feature</label>
                            <select id="service9" onchange="s9func()" name=service9>
                                <option value='no'> No </option>
                                <option value='yes'>Yes</option>
                                
                            </select></font></div>
                        </td>
                        <script>
                                function s9func() {
                                    var x = document.getElementById("service9").value;
                                    if(x=='no'){y=0;}
                                    if(x=='yes'){var y=<?php  require "dbcon/dbcon.php";
                                                $sql = "SELECT * FROM serviceprices WHERE s_name='s9'";
                                                $query=(mysqli_query($conn,$sql));
                                                $row = mysqli_fetch_assoc($query);
                                                echo $row['gold'] ?>;}
                                    
                                    document.getElementById("s9").innerHTML =  y;
                                    total=total+y;
                                    document.getElementById("total").innerHTML = total;
                                }
                                </script>
                            

                        </td>
                        <td><p id="s9"></p></td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <div id="pa2"><font color ="white"><label for="total">TOTAL</label>
                    </font></div></td>

                    <td>
                            <p id="total"></p>
                    <script>
                        
                        document.getElementById("total").innerHTML = total;
                        
                    </script>
                    </td>

                    </tr>
                    
                    
                
                <div id="payHere">
                    <tr>
                        <td>
                        <form action="reservationForm.php" method="POST">
                          <div id="ida"></div>
                        </form>
                        </td>
                        <td>
                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post">

                          <!-- Identify your business so that you can collect the payments. -->
                          <input type="hidden" name="business" value="jayaratnefuneraldirectors@gmail.com">

                          <!-- Specify a Buy Now button. -->
                          <input type="hidden" name="cmd" value="_xclick">

                          <!-- Specify details about the item that buyers will purchase. -->
                          <input type="hidden" name="item_name" value="Package-fee">
                          
                          <input type="hidden" name="amount" value="152">
                          <input type="hidden" name="currency_code" value="USD">

                          <!-- Display the payment button. -->
                          <input type="image" name="submit" border="0"
                          src="https://www.surfaceskimmers.com/wp-content/uploads/2016/10/1431389879455.png" width="200" height="50"
                          alt="Buy Now">
                          <img alt="" border="0" width="1" height="1"
                          src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

                        </form>
                        </td>
                    </tr>
                </div>

                    
                
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