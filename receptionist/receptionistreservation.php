<?php
    include ('sessionReceptionist.php');
?>
<html>
<head>
    <title>Reservation Form</title>
    <link rel="stylesheet" type="text/css" media="screen" href="../css/receptionistregister.css">
    <link rel="stylesheet" type="text/css" href="../css/adminindex.css">
    <link rel="stylesheet" type="text/css" href="../css/resiptionistregister.css">
    
    <style>
    html,body,h1,h2,h3,h4,h5 {font-family: 'Ruda', sans-serif;}
    .w3-sidenav a,.w3-sidenav h4 {font-weight:bold;}
    </style>

<!--date picker eke jquery -->

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#dildate" ).datepicker();
  } );
  
  </script>
<!--date picker eke jquery -->

</head>
<body>
<nav class="navi_menu" id="mySidenav">
  <?php include '../details.php'; ?>
    <a href="indexreceptionist.php" class="navi"><img src="../img/home.png" class="image">&nbsp;&nbsp;HOME</a>
   <a href="receptionistregister.php" class="active"><img src="../img/account.png" class="image">&nbsp;&nbsp;REGISTRATION</a>
   <a href="customerinfo.php" class="navi"><img src="../img/profile.png" class="image">&nbsp;&nbsp;CUSTOMER INFORMATION</a>
  <a href="feedbackreceptionist.php" class="navi"><img src="../img/feedback.png" class="image">&nbsp;&nbsp;FEED-BACK 
      <span class="noti">
          <?php
              require "../dbcon/dbcon.php";
              $query = "SELECT COUNT(*) FROM feedback WHERE flag = 0";
              $result = mysqli_query($conn,$query);
              $rows = mysqli_fetch_row($result);
              echo $rows[0];
          ?>
      </span>   
    </a>
  <a href="editreceptionist.php" class="navi"><img src="../img/profile.png" class="image">&nbsp;&nbsp;UPDATE PROFILE</a>
 
</nav>

<div class="menu2" align="right">
    <div class="menu2in">
      <a href="../signout.php" class="myButton">Log Out</a>
    </div>
</div>
<div class="conner1" align="center">
            <div class="conner2" align="center">
<div class = "resd1 " align="center">
    <div class="resd2">
    <?php
        require "../dbcon/dbcon.php";
        $error=FALSE;
            $deadnameerr = $diladderr = $dildateerr = $diltmerr = $mobilenoerr =$packname = $service1 = $service2 = $service3=$service4=$service5= $service6= $service7=$service8s="";
            
            if (isset($_POST['submit'])) {
                
                if(empty($_POST['deadname'])){ 
                    $cusnameerr = "required";
                    $error = TRUE;
                }else{
                    $cusname = $_POST['deadname'];
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
                    if (time("m/d/Y") < strtotime($dildate)){
                        $error = TRUE;
                    }
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
                if(empty($_POST['totalam'])){
                    $error = TRUE;
                }
                
                if ($error==FALSE){
               
                $sql1 = "INSERT INTO `reservations`(`customer_Id`,`deadPersonName`, `diladd`, `dildate`,  `mobilenum`,`packname`,`Floral_tributes`,`Remembrance_booklet`,`Chairs_and_tents`,`Obituary_Notices`,`Crematorium_booking`,`Monumental_plaques`,`Funeral_pyres`,`Web_casting`,`Condolence_messeges`,`total`) VALUES ($checkid,'$_POST[deadname]','$_POST[diladd]','$dildate','$_POST[mobilenum]','$_POST[packname]','$_POST[service1]','$_POST[service2]','$_POST[service3]','$_POST[service4]','$_POST[service5]','$_POST[service6]','$_POST[service7]','$_POST[service8]','$_POST[service9]','$_POST[totalam]')";


                if(mysqli_query($conn,$sql1)){
                    #$_GET['no']=mysqli_insert_id($conn);
                    $_SESSION['no']=mysqli_insert_id($conn);
                    
                    echo "<script type='text/javascript'>window.location.href ='payhere.php';</script>";
                        #echo "<script type='text/javascript'>window.location.href = 'payhere.php?t='+amount;</script>";
                                        
                } else{echo "error";}
                }
            }
        ?>
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        
            <form id="f4" action="reservationForm.php" method="post" onsubmit="return finalfun()">
                <div id="res3">
            <table id="tb4">
                <tr>
                    <td colspan="2">
                        <h2 id="reshead" align="center" style = "font-family: myfont1; color: #a86205;" >Reservation Form</h2>
                    </td>
                
                </tr>
                 <tr> 
                    <td><label for="deadname">Customer Name</label><span class="error"><?php echo $deadnameerr;?></span></td>
                        
                    <td><input type="text" name="deadname" id="deadname" required></td>
                
                </tr>
                <tr>
                    <td><label for="diladd">Dilivery Address</label><span class="error"><?php echo $diladderr;?></span></td>
                        
                    <td> <input type="text" name="diladd" id="diladd" required></td>
                    
                </tr>
               
                <tr>
                    
                     <td><label for="dildate">Funeral Date</label><span class="error"><?php echo $dildateerr;?></span></td>
                        
                       


                       <td><input  type=text name=dildate id="dildate" required></td>
                       
                </tr>
                 <tr>
                    
                       <td><label for="mobilenum">Mobile No</label><span class="error"><?php echo $mobilenoerr;?></span></td>
                
                     <td> <input type="text" name="mobilenum" id="mobile" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" required></td>
                
                </tr>

            </table>
            
            </div>


            <div>
                <div id="tb"><table id="tbl1">

                <tr>
                    <td colspan="2">
                        <div id="p1" align="left"><h2><font color ="dimgray"><h5 style="font-family:myfont1; font-size:28px; color: dimgray;">Packages</h5></font></h2></div>
                    </td>
                </tr>

                   <tr>
                        <td colspan="2">
                            <div id="pa1"><font color ="dimgray" size="2px">
                            <label for="packname"><h4>VIP BRONZE PACKAGE</label><input type="radio" name="packname" onchange="getValue(bronze);" value="VIP BRONZE PACKAGE" required></h4>
                                <p>Bronze package will include "VOLVO" S80 Limousine Hearse and 04 floral arrangements with special vehicle to carry floral tributes.
                            Free of charge photo album with 60 photographs on the day of funeral and other things like embalming with the best english preservations, casket, carpet, oil lamp, brass canopy and etc</p>
                            <?php $we=5;?>
                            <script>
                                total=0;
                                var bronze=<?php
                                                $sql = "SELECT * FROM serviceprices WHERE s_name='s0'";
                                                $query=(mysqli_query($conn,$sql));
                                                $row = mysqli_fetch_assoc($query);
                                                echo $row['bronze'] ?>;
                                
                                
                                //bronze=275000;
                                var gold=<?php
                                                $sql = "SELECT * FROM serviceprices WHERE s_name='s0'";
                                                $query=(mysqli_query($conn,$sql));
                                                $row = mysqli_fetch_assoc($query);
                                                echo $row['gold'] ?>;
                                var silver=<?php
                                                $sql = "SELECT * FROM serviceprices WHERE s_name='s0'";
                                                $query=(mysqli_query($conn,$sql));
                                                $row = mysqli_fetch_assoc($query);
                                                echo $row['silver'] ?>;
                                var platinum=<?php
                                                $sql = "SELECT * FROM serviceprices WHERE s_name='s0'";
                                                $query=(mysqli_query($conn,$sql));
                                                $row = mysqli_fetch_assoc($query);
                                                echo $row['platinum'] ?>;
                                var deluxe=<?php
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
                              <div id="pa1"><font color ="dimgray" size="2px">
                            <label for="packname"><h4>VIP SILVER PACKAGE</label><input type="radio" name="packname" onchange="getValue(silver)" value="VIP SILVER PACKAGE"></h4>
                            <p>Silver package will include "VOLVO" S80 Limousine Hearse and 04 floral arrangements with special vehicle to carry floral tributes.
                            Free of charge video coverage and photo album with 60 photographs on the day of funeral and other things like embalming with the best english preservations, casket, carpet, oil lamp, brass canopy and etc</p>
                           
                            
                            </font></div>

                    </tr>
                    <tr>
                        <td colspan="2">
                            <div id="pa1"><font color ="dimgray" size="2px">
                            <label for="packname"><h4>VIP GOLD PACKAGE</label><input type="radio" name="packname" onchange="getValue(gold)" value="VIP GOLD PACKAGE"></h4>
                            <p>Gold package will include S80 "Volvo/Mercedes Benz" Hearse according to availability and 04 large floral arrangements with special vehicle to carry floral tributes.
                            Free of charge video coverage photo album with 80 photographs on the day of funeral and other things like embalming with the best english preservations, casket, carpet, oil lamp, brass canopy and etc</p>
                         
                                </font></div>
                        </td>
                        
                        <td><div class="packv" align="center"><p id="packval">Package Prize</p></div></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div id="pa1"><font color ="dimgray" size="2px">
                            <label for="packname"><h4>VIP PLATINUM PACKAGE</label><input type="radio" name="packname" onchange="getValue(platinum)" value="VIP PLATINUM PACKAGE"></h4>
                            <p>Platinum package will include Brand New Mercedes Benz Hearse and 04 large floral arrangements with special vehicle to carry floral tributes.
                            Free of charge photo video coveragalbum with 100 photographs on the day of funeral and other things like embalming with the best english preservations, casket, carpet, oil lamp, brass canopy, special complimentary floral arrangement for casket and etc</p>
                            
                            </font></div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                           <div id="pa1"><font color ="dimgray" size="2px">
                            <label for="packname"><h4>DELUXE PACKAGE</label><input type="radio" name="packname" onchange="getValue(deluxe)" value="DELUXE PACKAGE"></h4><p>
                            Deluxe package is for funerals held at our newly renovated parlour.This package will include Luxury Grey Volvo 960 Hearse or Vauxhall Omega Hearse, 
                            fresh flower arrangements, embalming with the best english preservations and casket with important fittings.
                            </p>
                            
                            </font></div>
                        </td>
                    </tr>




                <tr>
                <td colspan="2">
                    <div id="p1" align="left"><h2><font color ="dimgray"><h5 style="font-family:myfont1; font-size:28px; color: dimgray;">Other Services</h5></font></h2></div>
                </td>
                </tr>

                    <tr>
                        <td colspan="2">
                            
                            <div id="pa2"><font color ="dimgray"><label for="service1">Arrangement of Floral Tributes</label>
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
                                    if(x=='op1'){var y=<?php
                                                $sql = "SELECT * FROM serviceprices WHERE s_name='s1'";
                                                $query=(mysqli_query($conn,$sql));
                                                $row = mysqli_fetch_assoc($query);
                                                echo $row['gold'] ?>;}
                                    if(x=='op2'){var y=<?php
                                                $sql = "SELECT * FROM serviceprices WHERE s_name='s1'";
                                                $query=(mysqli_query($conn,$sql));
                                                $row = mysqli_fetch_assoc($query);
                                                echo $row['silver'] ?>;}
                                    if(x=='op3'){var y=<?php 
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
                            <div id="pa2"><font color ="dimgray"><label for="service2">Provision of Remembrance Booklet - Quantity</label>
                            <input type="tex" id="service2" onchange="s2func()" name="service2" onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" value="0" >
                            </font></div>
                        </td>
                        <script>
                            function s2func() {
                                var x = document.getElementById("service2");
                                y = x.value*<?php 
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
                            
                            <div id="pa2"><font color ="dimgray"><label for="service3">Assisting to hire Chairs and tents</label>
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
                                    if(x=='op1'){var y=<?php 
                                                $sql = "SELECT * FROM serviceprices WHERE s_name='s3'";
                                                $query=(mysqli_query($conn,$sql));
                                                $row = mysqli_fetch_assoc($query);
                                                echo $row['gold'] ?>;}
                                    if(x=='op2'){var y=<?php 
                                                $sql = "SELECT * FROM serviceprices WHERE s_name='s3'";
                                                $query=(mysqli_query($conn,$sql));
                                                $row = mysqli_fetch_assoc($query);
                                                echo $row['silver'] ?>;}
                                    if(x=='op3'){var y=<?php 
                                                $sql = "SELECT * FROM serviceprices WHERE s_name='s3'";
                                                $query=(mysqli_query($conn,$sql));
                                                $row = mysqli_fetch_assoc($query);
                                                echo $row['bronze'] ?>;}
                                    document.getElementById("s3").innerHTML =  y;
                                    total=total+y;
                                    document.getElementById("total").innerHTML = total;
                                }


                                </script>
                            

               
                        <td><p id="s3"></p></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            
                            <div id="pa2"><font color ="dimgray"><label for="service4">Arranging Obituary Notices</label>
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
                                    if(x=='Newspaper'){var y=<?php 
                                                $sql = "SELECT * FROM serviceprices WHERE s_name='s4'";
                                                $query=(mysqli_query($conn,$sql));
                                                $row = mysqli_fetch_assoc($query);
                                                echo $row['gold'] ?>;}
                                    if(x=='Radio Announcement'){var y=<?php
                                                $sql = "SELECT * FROM serviceprices WHERE s_name='s4'";
                                                $query=(mysqli_query($conn,$sql));
                                                $row = mysqli_fetch_assoc($query);
                                                echo $row['silver'] ?>;}
                                    
                                    document.getElementById("s4").innerHTML =  y;
                                    total=total+y;
                                    document.getElementById("total").innerHTML = total;
                                }


                                </script>
                            

                  
                        <td><p id="s4"></p></td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <div id="pa2"><font color ="dimgray"><label for="service5">Crematorium Booking</label>
                            <select id="service5" onchange="s5func()" name=service5>
                                <option value='no'> No </option>
                                <option value='yes'>Yes</option>
                                
                            </select></font></div>
                        </td>
                        <script>
                                function s5func() {
                                    var x = document.getElementById("service5").value;
                                    if(x=='no'){y=0;}
                                    if(x=='yes'){var y=<?php 
                                                $sql = "SELECT * FROM serviceprices WHERE s_name='s5'";
                                                $query=(mysqli_query($conn,$sql));
                                                $row = mysqli_fetch_assoc($query);
                                                echo $row['gold'] ?>;}
                                    
                                    document.getElementById("s5").innerHTML =  y;
                                    total=total+y;
                                    document.getElementById("total").innerHTML = total;
                                }
                                </script>
                            

                   
                        <td><p id="s5"></p></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            
                            <div id="pa2"><font color ="dimgray"><label for="service6">Engraving, Supplying and erection of Monumental Plaques</label>
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
                                    if(x=='op1'){var y=<?php 
                                                $sql = "SELECT * FROM serviceprices WHERE s_name='s6'";
                                                $query=(mysqli_query($conn,$sql));
                                                $row = mysqli_fetch_assoc($query);
                                                echo $row['gold'] ?>;}
                                    if(x=='op2'){var y=<?php 
                                                $sql = "SELECT * FROM serviceprices WHERE s_name='s6'";
                                                $query=(mysqli_query($conn,$sql));
                                                $row = mysqli_fetch_assoc($query);
                                                echo $row['silver'] ?>;}
                                    if(x=='op3'){var y=<?php 
                                                $sql = "SELECT * FROM serviceprices WHERE s_name='s6'";
                                                $query=(mysqli_query($conn,$sql));
                                                $row = mysqli_fetch_assoc($query);
                                                echo $row['bronze'] ?>;}
                                    if(x=='op4'){var y=<?php 
                                                $sql = "SELECT * FROM serviceprices WHERE s_name='s6'";
                                                $query=(mysqli_query($conn,$sql));
                                                $row = mysqli_fetch_assoc($query);
                                                echo $row['deluxe'] ?>;}
                                    document.getElementById("s6").innerHTML =  y;
                                    total=total+y;
                                    document.getElementById("total").innerHTML = total;
                                }
                                </script>
                            

                       
                        <td><p id="s6"></p></td>
                    </tr>
                     <tr>
                        <td colspan="2">
                            
                            <div id="pa2"><font color ="dimgray"><label for="service7">Construction of different types of funeral Pyres</label>
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
                                    if(x=='op1'){var y=<?php 
                                                $sql = "SELECT * FROM serviceprices WHERE s_name='s7'";
                                                $query=(mysqli_query($conn,$sql));
                                                $row = mysqli_fetch_assoc($query);
                                                echo $row['gold'] ?>;}
                                    if(x=='op2'){var y=<?php 
                                                $sql = "SELECT * FROM serviceprices WHERE s_name='s7'";
                                                $query=(mysqli_query($conn,$sql));
                                                $row = mysqli_fetch_assoc($query);
                                                echo $row['silver'] ?>;}
                                    if(x=='op3'){var y=<?php 
                                                $sql = "SELECT * FROM serviceprices WHERE s_name='s7'";
                                                $query=(mysqli_query($conn,$sql));
                                                $row = mysqli_fetch_assoc($query);
                                                echo $row['bronze'] ?>;}
                                    document.getElementById("s7").innerHTML =  y;
                                    total=total+y;
                                    document.getElementById("total").innerHTML = total;
                                }
                                </script>
                            

                     
                        <td><p id="s7"></p></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div id="pa2"><font color ="dimgray"><label for="service8">web casting</label>
                            <select id="service8" onchange="s8func()" name=service8>
                                <option value='no'> No </option>
                                <option value='yes'>Yes</option>
                                
                            </select></font></div>
                        </td>
                        <script>
                                function s8func() {
                                    var x = document.getElementById("service8").value;
                                    if(x=='no'){y=0;}
                                    if(x=='yes'){var y=<?php 
                                                $sql = "SELECT * FROM serviceprices WHERE s_name='s8'";
                                                $query=(mysqli_query($conn,$sql));
                                                $row = mysqli_fetch_assoc($query);
                                                echo $row['gold'] ?>;}

                                    
                                    document.getElementById("s8").innerHTML =  y;
                                    total=total+y;
                                    document.getElementById("total").innerHTML = total;
                                }
                                </script>
                            

                       
                        <td><p id="s8"></p></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div id="pa2"><font color ="dimgray"><label for="service9">Condolence messeges screening Feature</label>
                            <select id="service9" onchange="s9func()" name=service9>
                                <option value='no'> No </option>
                                <option value='yes'>Yes</option>
                                
                            </select></font></div>
                        </td>
                        <script>
                                function s9func() {
                                    var x = document.getElementById("service9").value;
                                    if(x=='no'){y=0;}
                                    if(x=='yes'){var y=<?php 
                                                $sql = "SELECT * FROM serviceprices WHERE s_name='s9'";
                                                $query=(mysqli_query($conn,$sql));
                                                $row = mysqli_fetch_assoc($query);
                                                echo $row['gold'] ?>;}
                                    
                                    document.getElementById("s9").innerHTML =  y;
                                    total=total+y;
                                    document.getElementById("total").innerHTML = total;
                                    var amount = document.getElementById("total").innerHTML;

                                    document.getElementById("totalam").value = total;
                                   
                                }
                                </script>
                                 <?php 
                                    $amount="<script>amount</script>";
                                    $_SESSION['amount']= $amount;
                                ?>
                        
                        <td><p id="s9"></p></td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <div id="pa2"><font color ="dimgray"><label for="total">TOTAL</label>
                    </font></div></td>

                    <td>
                            <p id="total"></p>
                    <script>
                        function finalfun(){
                                     document.getElementById("totalam").value = total;
                                     return true;
                                }
                        document.getElementById("total").innerHTML = total;
                        
                    </script>
                    </td>

                    </tr> 
                    <!--       
                    <tr>
                        <td>
                            <script>
                                function total(){

                                    var amount = document.getElementById("total").innerHTML;
                                    window.location.href = "payhere.php?amount=" + amount;
                                }
                            </script>
                        </td>
                    </tr> -->           
                
                <tr>
                     <td colspan="2">
                        <input type="hidden" id="totalam" name="totalam" value="0">
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
    </div>
</div>
    </body>
</html>