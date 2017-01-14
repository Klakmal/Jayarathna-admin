<?php
    include ('sessionManager.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Reservation Handling</title>
	<link rel="stylesheet" type="text/css" href="../css/adminReservation.css">
	<style>
html,body,h1,h2,h3,h4,h5 {font-family: 'Ruda', sans-serif;}
    .w3-sidenav a,.w3-sidenav h4 {font-weight:bold;}
        .unl{
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #666f86;
        }
        .list {
            float: left;
        }
        .list a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        #logout{
            float: right;
            margin: 17px;
            background-color: #4c537d;
            border-radius: 10px;
        }
        
        #logout:hover{
            float: right;
            margin: 17px;
            background-color: #3c537d;
            border-radius: 10px;
        }
        
        #logout:active{
            float: right;
            margin: 17px;
            background-color: #2c537d;
            border-radius: 10px;
        }
        
        .himg{
            margin: 3px;
            padding: 3px;
            width: 40px;
            height: 40px;
            background-color: #4c537d;
            border-radius: 50%;
        }
</style>
</head>
<body>
    <div class="header">
<ul class="unl">
    <li class="list"><a href="indexmanager.php"><img class="himg" src="../img/home.png"></a></li>
    <li class="list"><a href="indexmanager.php"><h3><b>Jayarathna Funarals</b></h3></a></li>
    <li class="list" id="logout"><a href="../signout.php">Logout</a></li>
</ul>
</div>
	<div class="navidiv">
	<?php  
			$rid=$cname=$dadd=$ddate=$dtime=$mobinum=$pack=$floral=$remembrance=$chairtents=$obituary=$crematorium=$monumental=$pyres=$total=$status="";
            require "../dbcon/dbcon.php";
    		$sql = "SELECT * FROM reservations WHERE flag = 0";
    		$query=(mysqli_query($conn,$sql)); 
    		echo '<ul class="naviul">';
    		echo '<li class="navili"><b>New Reservations</b></li>';     
            while($row = mysqli_fetch_array($query)) {
    
    ?>	
    		<li class="navili">
    			<button class="but"  onclick="location.href='adminReservation.php?no=<?php echo $row['res_id'] ?>'">
    			<?php echo $row['res_id'] ?>
    			<?php echo $row['packname'] ?>
    			<?php echo $row['dildate'] ?>
    			</button>
    		</li>
                
                <?php
            } 
            echo '<ul>';
            ?>
    </div>
    <div class="navidiv1">
	<?php  
		
    		$sql = "SELECT * FROM reservations WHERE flag = 1";
    		$query=(mysqli_query($conn,$sql)); 
    		echo '<ul class="naviul1">';  
    		echo '<li class="navili1" ><b>Confirmed Reservations</b></li>';    
            while($row = mysqli_fetch_array($query)) {
    
    ?>	
    		<li class="navili1">
    			<button class="but"  onclick="location.href='adminReservation.php?no=<?php echo $row['res_id'] ?>'">
    			<?php echo $row['res_id'] ?>
    			<?php echo $row['packname'] ?>
    			<?php echo $row['dildate'] ?>
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
        $sql = "SELECT * FROM reservations WHERE res_id = '$no'";
					
					$result= mysqli_query($conn, $sql);
					if(mysqli_num_rows($result) > 0){
						while($row = mysqli_fetch_assoc($result)){
						/*	echo "id: ".$row["dealer_id"]. "Name: ".$row["dealer_name"]. "NIC: ".$row["NIC"]."<br/>";*/
						$rid=$row["res_id"];
						$_SESSION['res_id']=$rid;
						$cname=$row["cusname"];
						$_SESSION['cusname']=$cname;
						$dadd=$row["diladd"];
						$_SESSION['diladd']=$dadd;
						$ddate=$row["dildate"];
						$_SESSION['dildate']=$ddate;
						$dtime=$row["diltime"];
						$_SESSION['diltime']=$dtime;
						$mobinum=$row["mobilenum"];
						$_SESSION['mobilenum']=$mobinum;
						$pack=$row["packname"];
						$_SESSION['packname']=$pack;
						$floral=$row["Floral tributes"];
						$_SESSION['Floral tributes']=$floral;
						$remembrance=$row["Remembrance booklet"];
						$_SESSION['Remembrance booklet']=$remembrance;
						$chairtents=$row["Chairs and tents"];
						$_SESSION['Chairs and tents']=$chairtents;
						$obituary=$row["Obituary Notices"];
						$_SESSION['Obituary Notices']=$obituary;
						$crematorium=$row["Crematorium booking"];
						$_SESSION['Crematorium booking']=$crematorium;
						$monumental=$row["Monumental plaques"];
						$_SESSION['Monumental plaques']=$monumental;
						$pyres=$row["Funeral pyres"];
						$_SESSION['Funeral pyres']=$pyres;
						$total=$row['total'];
                        $_SESSION['total']=$total;
                        $status=$row['status'];
                        $_SESSION['status']=$status;    
						}
					}else{
						echo "Zero results";
					}
    }
    echo '<div class ="container" align = "center">';
    	echo '<br>';
    	echo '<br>';
        echo '<br>';
    	echo '<br>';
        echo '<br>';
        echo '<br>';

        echo '<div class="reshl"><h3>Reservation Form</h3></div>';
    echo '<br>';
	    echo '<table class="condtb">';
            echo '<tr>';
		    	echo '<td>';
	    		echo '<b>Reservation ID :</b>';
	    		echo '</td>';
	    		echo '<td class="td2">';
	    		echo $rid;
	    		echo '</td>';
		    echo '</tr>';
		    echo '<tr>';
		    	echo '<td>';
	    		echo '<b><b>Customer Name :</b>';
	    		echo '</td>';
	    		echo '<td class="td2">';
	    		echo $cname;
	    		echo '</td>';
		    echo '</tr>';
		    echo '<tr>';
		    	echo '<td>';
	    		echo '<b>Delivery Address :</b>';
	    		echo '</td>';
	    		echo '<td class="td2">';
	    		echo $dadd;
	    		echo '</td>';
		    echo '</tr>';
		    echo '<tr>';
		    	echo '<td>';
	    		echo '<b>Delivery Date :</b>';
	    		echo '</td>';
	    		echo '<td class="td2">';
	    		echo $ddate;
	    		echo '</td>';
		    echo '</tr>';
		    echo '<tr>';
		    	echo '<td>';
	    		echo '<b>Delivery Time :</b>';
	    		echo '</td>';
	    		echo '<td class="td2">';
	    		echo $dtime;
	    		echo '</td>';
		    echo '</tr>';
		    		    echo '<tr>';
		    	echo '<td>';
	    		echo '<b>Mobile Number :</b>';
	    		echo '</td>';
	    		echo '<td class="td2">';
	    		echo $mobinum;
	    		echo '</td>';
		    echo '</tr>';
		    echo '<tr>';
		    	echo '<td>';
	    		echo '<b>Package :</b>';
	    		echo '</td>';
	    		echo '<td class="td2">';
	    		echo $pack;
	    		echo '</td>';
		    echo '</tr>';
		    echo '<tr>';
		    	echo '<td>';
	    		echo '<b>Floral Tributes :</b>';
	    		echo '</td>';
	    		echo '<td class="td2">';
	    		echo $floral;
	    		echo '</td>';
		    echo '</tr>';
		    echo '<tr>';
		    	echo '<td>';
	    		echo '<b>Remembrance booklet :</b>';
	    		echo '</td>';
	    		echo '<td class="td2">';
	    		echo $remembrance;
	    		echo '</td>';
		    echo '</tr>';
		    echo '<tr>';
		    	echo '<td>';
	    		echo '<b>Chairs and tents :</b>';
	    		echo '</td>';
	    		echo '<td class="td2">';
	    		echo $chairtents;
	    		echo '</td>';
		    echo '</tr>';
		    		    echo '<tr>';
		    	echo '<td>';
	    		echo '<b>Obituary Notices :</b>';
	    		echo '</td>';
	    		echo '<td class="td2">';
	    		echo $obituary;
	    		echo '</td>';
		    echo '</tr>';
		    echo '<tr>';
		    	echo '<td>';
	    		echo '<b>Crematorium booking :</b>';
	    		echo '</td>';
	    		echo '<td class="td2">';
	    		echo $crematorium;
	    		echo '</td>';
		    echo '</tr>';
		    echo '<tr>';
		    	echo '<td>';
	    		echo '<b>Monumental plaques :</b>';
	    		echo '</td>';
	    		echo '<td class="td2">';
	    		echo $monumental;
	    		echo '</td>';
		    echo '</tr>';
		    echo '<tr>';
		    	echo '<td>';
	    		echo '<b>Funeral pyres :</b>';
	    		echo '</td>';
	    		echo '<td class="td2">';
	    		echo $pyres;
	    		echo '</td>';
		    echo '</tr>';
		    echo '<tr>';	 ?>
		    	<td colspan="2" align="right">
		    		<button class="acc"  onclick="location.href='adminReservation.php?accept=<?php echo $rid ?>'">Confirm</button>
		    		<button class="rej"  onclick="location.href='adminReservation.php?reject=<?php echo $rid ?>'">Delete</button>
	<?php	    	echo '</td>';
		    echo '</tr>';
	    	
	    echo '</table>';
	    echo '</div>';

    ?>

    <?php
    if(isset($_GET['reject'])){
        $reject = $_GET['reject'];
        $sql = "UPDATE `reservations` SET `flag`= 2 WHERE res_id = '$reject'";
        mysqli_query($conn,$sql);

        echo "<script>alert('Delete Form.'); window.location.href='adminReservation.php'; </script>";


    }

    if(isset($_GET['accept'])){
        $accept = $_GET['accept'];
    //    $sql= "INSERT INTO `acceptvisitor`(`msg_no`) VALUES ($_GET[accept])";
        $sql = "UPDATE `reservations` SET `flag`= 1 WHERE res_id = '$accept'";
        mysqli_query($conn,$sql);
        echo "<script>alert('Paid reservation'); window.location.href='adminReservation.php'; </script>";
    }
    ?>
    </div>
	</div>
</div>

</body>
</html>
