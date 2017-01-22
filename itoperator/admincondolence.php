<?php
    include ('sessionItoperator.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Condolence Message</title>
	<link rel="stylesheet" type="text/css" href="../css/admincondolence.css">
    <link rel="stylesheet" type="text/css" href="../css/adminindex.css">
	<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
.w3-sidenav a,.w3-sidenav h4 {font-weight:bold}
        .but{
            background-color: #424a5d;
            
        }
        
        .rej {
	-moz-box-shadow:inset 0px 1px 0px 0px #f7c5c0;
	-webkit-box-shadow:inset 0px 1px 0px 0px #f7c5c0;
	box-shadow:inset 0px 1px 0px 0px #f7c5c0;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #fc8d83), color-stop(1, #e4685d));
	background:-moz-linear-gradient(top, #fc8d83 5%, #e4685d 100%);
	background:-webkit-linear-gradient(top, #fc8d83 5%, #e4685d 100%);
	background:-o-linear-gradient(top, #fc8d83 5%, #e4685d 100%);
	background:-ms-linear-gradient(top, #fc8d83 5%, #e4685d 100%);
	background:linear-gradient(to bottom, #fc8d83 5%, #e4685d 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#fc8d83', endColorstr='#e4685d',GradientType=0);
	background-color:#fc8d83;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #d83526;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:bold;
	padding:6px 24px;
	text-decoration:none;
	text-shadow:0px 1px 0px #b23e35;
}
.rej:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #e4685d), color-stop(1, #fc8d83));
	background:-moz-linear-gradient(top, #e4685d 5%, #fc8d83 100%);
	background:-webkit-linear-gradient(top, #e4685d 5%, #fc8d83 100%);
	background:-o-linear-gradient(top, #e4685d 5%, #fc8d83 100%);
	background:-ms-linear-gradient(top, #e4685d 5%, #fc8d83 100%);
	background:linear-gradient(to bottom, #e4685d 5%, #fc8d83 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#e4685d', endColorstr='#fc8d83',GradientType=0);
	background-color:#e4685d;
}
.rej:active {
	position:relative;
	top:1px;
}

.acc {
	-moz-box-shadow:inset 0px 1px 0px 0px #d9fbbe;
	-webkit-box-shadow:inset 0px 1px 0px 0px #d9fbbe;
	box-shadow:inset 0px 1px 0px 0px #d9fbbe;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #b8e356), color-stop(1, #a5cc52));
	background:-moz-linear-gradient(top, #b8e356 5%, #a5cc52 100%);
	background:-webkit-linear-gradient(top, #b8e356 5%, #a5cc52 100%);
	background:-o-linear-gradient(top, #b8e356 5%, #a5cc52 100%);
	background:-ms-linear-gradient(top, #b8e356 5%, #a5cc52 100%);
	background:linear-gradient(to bottom, #b8e356 5%, #a5cc52 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#b8e356', endColorstr='#a5cc52',GradientType=0);
	background-color:#b8e356;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #83c41a;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:bold;
	padding:6px 24px;
	text-decoration:none;
	text-shadow:0px 1px 0px #86ae47;
}
.acc:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #a5cc52), color-stop(1, #b8e356));
	background:-moz-linear-gradient(top, #a5cc52 5%, #b8e356 100%);
	background:-webkit-linear-gradient(top, #a5cc52 5%, #b8e356 100%);
	background:-o-linear-gradient(top, #a5cc52 5%, #b8e356 100%);
	background:-ms-linear-gradient(top, #a5cc52 5%, #b8e356 100%);
	background:linear-gradient(to bottom, #a5cc52 5%, #b8e356 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#a5cc52', endColorstr='#b8e356',GradientType=0);
	background-color:#a5cc52;
}
.acc:active {
	position:relative;
	top:1px;
}

</style>
</head>
<body>
<div class="header">
	<p style="color:white; font-size:20px; text-shadow:2px 2px 2px gray; padding-left:20px;"><a class="myButton" href="indexitoperator.php" style="float:left; margin-right:20px;">Home</a><b>CONDOLENCE SCREEN MESSAGES</b><a class="myButton" href="../signout.php" style="float:right; margin-right:20px;">Sign Out</a></p>
    
	</div>
<div>
	<div>
	<div class="navidiv">
	<?php  
			$num=$dname=$vn=$vc=$rn=$mg="";
            require "../dbcon/dbcon.php";
    		$sql = "SELECT * FROM visitors";
    		$query=(mysqli_query($conn,$sql)); 
    		echo '<ul class="naviul">';      
            while($row = mysqli_fetch_array($query)) {
    
    ?>	
    		<li class="navili">
    			<button class="but" style="color: white;"  onclick="location.href='admincondolence.php?no=<?php echo $row['msg_no'] ?>'">
                <br>Visitor Name : <?php echo $row['visname'];  ?>
    			<br>
                    <div align="right"><span style="color: #cddbf2">Relation :  <?php echo $row['relation']; ?></span></div>
    			</button>
    		</li>
                
                <?php
            } 
            echo '<ul>';
            ?>
    	
    </div>
<?php
    if(isset($_GET['no'])){
        $no = $_GET['no'];
        $sql = "SELECT * FROM visitors WHERE msg_no = '$no'";
					
					$result= mysqli_query($conn, $sql);
					if(mysqli_num_rows($result) > 0){
						$row = mysqli_fetch_assoc($result);
						/*	echo "id: ".$row["dealer_id"]. "Name: ".$row["dealer_name"]. "NIC: ".$row["NIC"]."<br/>";*/
						$num=$row["msg_no"];
						$_SESSION['msg_no']=$num;
						$dname=$row["deadPersonID"];
						$_SESSION['deadPersonID']=$dname;
						$vn=$row["visname"];
						$_SESSION['visname']=$vn;
						$rn=$row["relation"];
						$_SESSION['relation']=$rn;
						$mg=$row["message"];
						$_SESSION['message']=$mg;
        
    ?>
    <div class ="container">
        <div class="condolence_header">
            <h3 class="h41">Condolence Messages</h3>
            <hr>
            <div class="table">
                <div class="span">
                <label class="lbl">Dead Person Name : </label>
                    <span>
                    <?php
                    $id = $_GET['no'];
                    $deadname = "SELECT deadPersonName FROM `deathpersondetails` WHERE deadPersonID = $id";
                    $q  =  mysqli_query($conn,$deadname);
                    $r = mysqli_fetch_row($q);
                    echo $r[0];
                    ?>
                    </span>
                </div>
                <div class="span">
                <label class="lbl">Visitor Name : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <span><?php echo $vn; ?></span>
                </div>
                
                <div class="span">
                <label class="lbl">Relation : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <span><?php echo $rn; ?></span>
                </div>
                <div class="span">
                <label class="lbl_message">Message : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                
                    <div style="color: #1d2c44; padding: 20px;"><b><?php echo $mg; ?></b></div>
                </div>
            </div>
            <div align="right">
              
		      <button class="rej"  onclick="location.href='admincondolence.php?reject=<?php echo $num ?>'">Reject</button>
                <button class="acc"  onclick="location.href='admincondolence.php?accept=<?php echo $num ?>'">Accept</button>
            </div>
        </div>
	</div>
    <?php
        }else{
						echo "Zero results";
					}
    }
        ?>
    

    <?php
                    if (isset($_SESSION['msg_no'])){
    					$n = $_SESSION['msg_no'];
						$dn=$_SESSION['deadPersonID'];
						$vnm=$_SESSION['visname'];
						$vnc=$_SESSION['visnic'];
						$ren=$_SESSION['relation'];
						$mge=$_SESSION['message'];
                    }
    if(isset($_GET['reject'])){
        $reject = $_GET['reject'];
        $sql= "delete from visitors where msg_no = $reject";
        mysqli_query($conn,$sql);

        echo "<script>alert('Reject Condolence message'); window.location.href='admincondolence.php'; </script>";


    }

    if(isset($_GET['accept'])){
        $accept = $_GET['accept'];
    //    $sql= "INSERT INTO `acceptvisitor`(`msg_no`) VALUES ($_GET[accept])";
        $sql = "INSERT INTO acceptvisitor(msg_no,deadPersonID,visname,visnic,relation,message) VALUES ($n,'$dn','$vnm','$vnc','$ren','$mge')";
        mysqli_query($conn,$sql);
        $sql= "delete from visitors where msg_no = $accept";    
    //    $sql = "INSERT INTO visitors (deadname,visname,visnic,relation,message) VALUES ('$dn','$vnm','$vnc','$ren','$mge')";
        mysqli_query($conn,$sql);
        echo "<script>alert('Accept Condolence message'); window.location.href='admincondolence.php'; </script>";
    }
    ?>
    </div>
	</div>
</div>

</body>
</html>
