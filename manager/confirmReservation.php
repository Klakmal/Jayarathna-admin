<?php
    include ('sessionManager.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Reservation Handling</title>
        <link rel="stylesheet" type="text/css" href="../css/adminindex.css">
        <link rel="stylesheet" type="text/css" href="../css/manage.css">
        <style>
            html,body,h1,h2,h3,h4,h5 {font-family: 'Ruda', sans-serif;}
            .w3-sidenav a,.w3-sidenav h4 {font-weight:bold;}
            
            .navidiv{
                margin-left: 13%;
                padding-left: 50px;
                width: 300px;
                
            }
            
            .naviul{
                list-style: none;
                position: fixed;
                height: 100%;
                overflow: auto;
                margin-top: 60px;
            }
            
            .navili{
                width: 300px;
            }
            .but{
                width: 100%;
                height: 50px;
                background-color: #f44242;
                border: none;
                text-align: left;
                font-size: 12px;
                border: 1px solid #f44242;
                color: #ffdbdb;
            }
            .but:hover{
                background-color: #d33232;
            }
            .but:active{
                background-color: #a31313;
            }
            
            .navilihead{
                height: 60px;
                padding: 10px;
                text-align: center;
                margin-bottom: 5px;
                color: #5e5e5e;
            }
    /*        .confirmlink{
                text-decoration: none;
                color: aliceblue;
                background-color: #485e82;
                padding: 10px 25px;
                border-radius: 5px;
            }
            .confirmlink:hover{
                background-color: #5b5b5b;
            }
            .confirmlink:active{
                background-color: #4c4c4c;
            }*/
            
            .confirmlink {
                -moz-box-shadow:inset 0px 1px 0px 0px #ffffff;
                -webkit-box-shadow:inset 0px 1px 0px 0px #ffffff;
                box-shadow:inset 0px 1px 0px 0px #ffffff;
                background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #ededed), color-stop(1, #dfdfdf));
                background:-moz-linear-gradient(top, #ededed 5%, #dfdfdf 100%);
                background:-webkit-linear-gradient(top, #ededed 5%, #dfdfdf 100%);
                background:-o-linear-gradient(top, #ededed 5%, #dfdfdf 100%);
                background:-ms-linear-gradient(top, #ededed 5%, #dfdfdf 100%);
                background:linear-gradient(to bottom, #ededed 5%, #dfdfdf 100%);
                filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ededed', endColorstr='#dfdfdf',GradientType=0);
                background-color:#ededed;
                -moz-border-radius:6px;
                -webkit-border-radius:6px;
                border-radius:6px;
                border:1px solid #dcdcdc;
                display:inline-block;
                cursor:pointer;
                color:#777777;
                font-family:Arial;
                font-size:15px;
                font-weight:bold;
                padding:6px 24px;
                text-decoration:none;
                text-shadow:0px 1px 0px #ffffff;
            }
            .confirmlink:hover {
                background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #dfdfdf), color-stop(1, #ededed));
                background:-moz-linear-gradient(top, #dfdfdf 5%, #ededed 100%);
                background:-webkit-linear-gradient(top, #dfdfdf 5%, #ededed 100%);
                background:-o-linear-gradient(top, #dfdfdf 5%, #ededed 100%);
                background:-ms-linear-gradient(top, #dfdfdf 5%, #ededed 100%);
                background:linear-gradient(to bottom, #dfdfdf 5%, #ededed 100%);
                filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#dfdfdf', endColorstr='#ededed',GradientType=0);
                background-color:#dfdfdf;
            }
            .confirmlink:active {
                position:relative;
                top:1px;
            }
            .container1{
                width: 100%;
                height: 100%;
                padding-top: 80px;
            }
            .container2{
                font-family: 'Ruda', sans-serif;
                font-size: 14px;
                width: 650px;
                height: auto;
                padding: 20px;
                background-color: #e5e6e7;
            }
            
            .img_logo{
                height: 60px;
                width: auto;
                margin: 5px;
            }
            .deadname{
                float: left;
                width: 400px;
                padding: 10px 0px;
            }
            .id{
                float: right;
                width: 250px;   
                padding: 10px 0px;
            }
            .det1{
                float: left;
                width: 200px;
                padding: 10px 0px;
            }
            .det2{
                float: right;
                width: 420px;
                padding: 10px 0px;
            }
            .servicename{
                float: left;
                width: 450px;
                padding: 10px 0px;
            }
            .serviceselection{
                float: right;
                width: 200px;
                padding: 10px 0px;
            }
            .total{
                padding: 10px 0px;
            }
            
            .hrh {
                border: 0;
                height: 1px;
                background: #333;
                background-image: linear-gradient(to right, #ccc, #333, #ccc);
            }
            .hrd {
                border: 0;
                height: 0;
                border-top: 1px solid rgba(0, 0, 0, 0.1);
                border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            }
            
            .acc {
	-moz-box-shadow:inset 0px 1px 0px 0px #9acc85;
	-webkit-box-shadow:inset 0px 1px 0px 0px #9acc85;
	box-shadow:inset 0px 1px 0px 0px #9acc85;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #74ad5a), color-stop(1, #68a54b));
	background:-moz-linear-gradient(top, #74ad5a 5%, #68a54b 100%);
	background:-webkit-linear-gradient(top, #74ad5a 5%, #68a54b 100%);
	background:-o-linear-gradient(top, #74ad5a 5%, #68a54b 100%);
	background:-ms-linear-gradient(top, #74ad5a 5%, #68a54b 100%);
	background:linear-gradient(to bottom, #74ad5a 5%, #68a54b 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#74ad5a', endColorstr='#68a54b',GradientType=0);
	background-color:#74ad5a;
	border:1px solid #3b6e22;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:13px;
	font-weight:bold;
	padding:6px 12px;
	text-decoration:none;
}
.acc:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #68a54b), color-stop(1, #74ad5a));
	background:-moz-linear-gradient(top, #68a54b 5%, #74ad5a 100%);
	background:-webkit-linear-gradient(top, #68a54b 5%, #74ad5a 100%);
	background:-o-linear-gradient(top, #68a54b 5%, #74ad5a 100%);
	background:-ms-linear-gradient(top, #68a54b 5%, #74ad5a 100%);
	background:linear-gradient(to bottom, #68a54b 5%, #74ad5a 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#68a54b', endColorstr='#74ad5a',GradientType=0);
	background-color:#68a54b;
}
.acc:active {
	position:relative;
	top:1px;
}
            
.rej {
	-moz-box-shadow:inset 0px 1px 0px 0px #c79090;
	-webkit-box-shadow:inset 0px 1px 0px 0px #c79090;
	box-shadow:inset 0px 1px 0px 0px #c79090;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #ff6161), color-stop(1, #d94141));
	background:-moz-linear-gradient(top, #ff6161 5%, #d94141 100%);
	background:-webkit-linear-gradient(top, #ff6161 5%, #d94141 100%);
	background:-o-linear-gradient(top, #ff6161 5%, #d94141 100%);
	background:-ms-linear-gradient(top, #ff6161 5%, #d94141 100%);
	background:linear-gradient(to bottom, #ff6161 5%, #d94141 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff6161', endColorstr='#d94141',GradientType=0);
	background-color:#ff6161;
	border:1px solid #a83b3b;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:13px;
	font-weight:bold;
	padding:6px 12px;
	text-decoration:none;
}
.rej:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #d94141), color-stop(1, #ff6161));
	background:-moz-linear-gradient(top, #d94141 5%, #ff6161 100%);
	background:-webkit-linear-gradient(top, #d94141 5%, #ff6161 100%);
	background:-o-linear-gradient(top, #d94141 5%, #ff6161 100%);
	background:-ms-linear-gradient(top, #d94141 5%, #ff6161 100%);
	background:linear-gradient(to bottom, #d94141 5%, #ff6161 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#d94141', endColorstr='#ff6161',GradientType=0);
	background-color:#d94141;
}
.rej:active {
	position:relative;
	top:1px;
}
        </style>
    </head>
    <body>
    <nav class="navi_menu" id="mySidenav">
      <?php include '../details.php'; ?>
      <a href="indexmanager.php" class="navi"><img src="../img/home.png" class="image">&nbsp;&nbsp; HOME</a>
      <a href="datainquiry.php" class="navi"><img src="../img/stock.png" class="image">&nbsp;&nbsp; DATA ENTERING</a>
      <a href="../report/report.php" class="navi"><img src="../img/stock.png" class="image">&nbsp;&nbsp; REPORTS</a>
      <a href="adminReservation.php" class="active"><img src="../img/package.png" class="image">&nbsp;&nbsp; PACKAGE AND SERVICES</a>
      <a href="feedbackmanager.php" class="navi"><img src="../img/feedback.png" class="image">&nbsp;&nbsp; FEED-BACK 
          <span class="noti">
              <?php
                  $query = "SELECT COUNT(*) FROM feedback WHERE flag = 0";
                  $result = mysqli_query($conn,$query);
                  $rows = mysqli_fetch_row($result);
                  echo $rows[0];
              ?>
          </span>
        </a>
        <a href="editmanager.php" class="navi"><img src="../img/profile.png" class="image">&nbsp;&nbsp; UPDATE PROFILE</a>
        <br>
    </nav>

    <div class="menu2" align="right">
        <div class="menu2in">
          <a href="../signout.php" class="myButton">LOG OUT</a>
        </div>
    </div>
    <div class="navidiv">
        <ul class="naviul">
            <li class="navilihead"><a class="confirmlink" href="adminReservation.php">New Reservations</a><br><br><b>Confirm Reservation</b></li>
	<?php  
			$rid=$cname=$dadd=$ddate=$dtime=$mobinum=$pack=$floral=$remembrance=$chairtents=$obituary=$crematorium=$monumental=$pyres=$total=$status="";
            require "../dbcon/dbcon.php";
    		$sql = "SELECT * FROM reservations WHERE flag = 2 ORDER BY res_id DESC";
    		$query=(mysqli_query($conn,$sql));   
            while($row = mysqli_fetch_array($query)) {
    
    ?>	
    		<li class="navili">
    			<button class="but"  onclick="location.href='confirmReservation.php?no=<?php echo $row['res_id'] ?>'">
    			<?php echo $row['res_id'] ?><br>
    			<?php echo $row['packname'] ?><br>
    			<div align="right"><?php echo $row['dildate'] ?></div>
    			</button>
    		</li>
                
                <?php
            } 
            ?>
        </ul>
    </div>
    
    <?php
    if(isset($_GET['no'])){
        $no = $_GET['no'];
        $sql = "SELECT * FROM reservations WHERE res_id = '$no'";
					
					$result= mysqli_query($conn, $sql);
					if(mysqli_num_rows($result) > 0){
						$row = mysqli_fetch_assoc($result);       ?>
        
    <div class="container1" align="center">
        <div class="container2">
            <div class="main_title">
                <img src="../img/logo.png" class="img_logo">
            </div>
            <hr class="hrh">
            <div class="nameANDid">
                <div class="deadname" align = "left"><b>Dead Person Name : </b><br><?php echo $row["deadname"]; ?><br></div>
                <div class="id"><b>Reservation  ID : </b><br><?php echo $row["res_id"]; ?><br></div>
            </div>
            
            <div class="details">
                <div class="det1" align = "left">
                    Address : <br>
                    Delivery Date : <br>
                    Delivery Timme : <br>
                    Mobile No : <br>
                </div>
                <div class="det2" align = "left">
                    <?php echo $row["diladd"]; ?> <br>
                    <?php echo $row["dildate"]; ?> <br>
                    <?php echo $row["diltime"]; ?> <br>
                    <?php echo $row["mobilenum"]; ?> <br>
                </div>
            </div>
            
            Package Name
            <hr class="hrh">
            <div class="package">
                <h1 class="packname"><b><?php echo $row["packname"]; ?></b></h1>
            </div>
            
            Services
            <hr class="hrh">
            <div class="services">
                <div class="servicename" align="left">
                    Arrangement of Floral Tributes : <br>
                    Provision of Remembrance Booklet : <br>
                    Assisting to hire Chairs and tents : <br>
                    Arranging Obituary Notices : <br>
                    Crematorium Booking : <br>
                    Engraving, Supplying and erection of Monumental Plaques : <br>
                    Construction of different types of funeral Pyres : <br>
                    web casting : <br>
                    Condolence messeges screening Feature : <br>
                </div>
                <div class="serviceselection" align="left">
                    <?php echo $row["Floral_tributes"]; ?> <br>
                    <?php echo $row["Remembrance_booklet"]; ?> <br>
                    <?php echo $row["Chairs_and_tents"]; ?> <br>
                    <?php echo $row["Obituary_Notices"]; ?> <br>
                    <?php echo $row["Crematorium_booking"]; ?> <br>
                    <?php echo $row["Monumental_plaques"]; ?> <br>
                    <?php echo $row["Funeral_pyres"]; ?> <br>
                    <?php echo $row["Web_casting"]; ?> <br>
                    <?php echo $row["Condolence_messeges"]; ?> <br>
                    
                </div>
                <hr class="hrd">
                Total
                <hr class="hrh">
                <div class= "total" align="right"> Rs: <?php echo $row["total"]; ?></div>
                <hr class="hrd">
            </div>
            
            <button class="rej"  onclick="location.href='confirmReservation.php?reject=<?php echo $no; ?>'">Remove</button> 
        </div>
    </div>
        
        <?php
                    }
            }
        ?>

    <?php
    if(isset($_GET['reject'])){
        $reject = $_GET['reject'];
        $sql = "UPDATE `reservations` SET `flag`= 3 WHERE res_id = '$reject'";
        mysqli_query($conn,$sql);

        echo "<script>alert('Delete Form.'); window.location.href='confirmReservation.php'; </script>";


    }
        ?>
    </body>
</html>