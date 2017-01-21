<?php
    include ('sessionManager.php');
?>
<html>
    <head>
    <title>Manager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/adminindex.css">
    <link rel="stylesheet" type="text/css" href="../css/manage.css">
    <style>
    html,body,h1,h2,h3,h4,h5 {font-family: 'Ruda', sans-serif;}
    .w3-sidenav a,.w3-sidenav h4 {font-weight:bold;}
        
        
        
        .indexcontainer{
            width: 100%;
            height: 100%;
        }
        .reservation_nav{
            
            width: 350px;
            height: 100%;
            padding-top: 40px;
        }
        
        .but{
            width: 100%;
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
            background-color: #f1f1f1;
            height: 20px;
            padding: 20px;
            color: #606060;
        }
        
        .naviul{
            list-style: none;
            float: left;
            width: 100%;
        }
        .datediv{
            width: 100%;
            padding-left: 220px; 
            
        }
    </style>
    </head>
    <body>

<nav class="navi_menu" id="mySidenav">
  <?php include '../details.php'; ?>
  <a href="indexmanager.php" class="active"><img src="../img/home.png" class="image">&nbsp;&nbsp; HOME</a>
  <a href="datainquiry.php" class="navi"><img src="../img/stock.png" class="image">&nbsp;&nbsp; DATA ENTERING</a>
  <a href="../report/report.php" class="navi"><img src="../img/stock.png" class="image">&nbsp;&nbsp; REPORTS</a>
  <a href="adminReservation.php" class="navi"><img src="../img/package.png" class="image">&nbsp;&nbsp; PACKAGE AND SERVICES</a>
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
        
<div class="indexcontainer" align="right">
    <div class="reservation_nav" align="left">
        <ul class="naviul">
    	<li class="navilihead"><b>New Reservations</b></li>
        <?php
            require "../dbcon/dbcon.php";
    		$sql = "SELECT * FROM reservations WHERE flag = 0 ORDER BY res_id DESC";
    		$query=(mysqli_query($conn,$sql));    
            while($row = mysqli_fetch_array($query)) {
        ?>
            <li class="navili">
    			<button class="but"  onclick="location.href='adminReservation.php?no=<?php echo $row['res_id'] ?>'">
    			<?php echo $row['res_id'] ?><br>
    			<?php echo $row['packname'] ?><br>
                <div class="datediv"><?php echo $row['dildate'] ?></div>
    			
    			</button>
    		</li>
        <?php
            } 
        ?>
        </ul>;
    </div>
</div>
  </body>
  </html>