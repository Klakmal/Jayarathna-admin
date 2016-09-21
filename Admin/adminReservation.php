<!DOCTYPE html>
<html>
<head>
	<title>Reservation Handling</title>
	<link rel="stylesheet" type="text/css" href="css/adminReservation.css">
	<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
.w3-sidenav a,.w3-sidenav h4 {font-weight:bold}
</style>
</head>
<body>
<div class="header">
	<h1 style="color:white; font-size:24px; text-shadow:2px 2px 2px gray; padding-left:20px;"><b>RESERVATION FORM</b></h1>
	</div>
<div>
	<div>
	<div class="navidiv">
	<?php  
			$rid=$cname=$dadd=$ddate=$dtime=$mobinum=$pack=$floral=$remembrance=$chairtents=$obituary=$crematorium=$monumental=$pyres="";
            require "dbcon/dbcon.php";
            session_start();
    		$sql = "SELECT * FROM reservations";
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
		
    		$sql = "SELECT * FROM paid_reservations";
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
						$floral=$row["Floral_tributes"];
						$_SESSION['Floral_tributes']=$floral;
						$remembrance=$row["Remembrance_booklet"];
						$_SESSION['Remembrance_booklet']=$remembrance;
						$chairtents=$row["Chairs_and_tents"];
						$_SESSION['Chairs_and_tents']=$chairtents;
						$obituary=$row["Obituary_Notices"];
						$_SESSION['Obituary_Notices']=$obituary;
						$crematorium=$row["Crematorium_booking"];
						$_SESSION['Crematorium_booking']=$crematorium;

						$monumental=$row["Monumental_plaques"];
						$_SESSION['Monumental_plaques']=$monumental;
						$pyres=$row["Funeral_pyres"];
						$_SESSION['Funeral_pyres']=$pyres;
						

						}
					}else{
						echo "Zero results";
					}
    }
    echo '<div class ="container" align = "center">';
    	echo '<br>';
    	echo '<br>';
	    echo '<table class="Condtb">';
		    echo '<tr>';
		    	echo '<td>';
	    		echo 'Reservation ID :';
	    		echo '</td>';
	    		echo '<td>';
	    		echo $rid;
	    		echo '</td>';
		    echo '</tr>';
		    echo '<tr>';
		    	echo '<td>';
	    		echo 'Customer Name :';
	    		echo '</td>';
	    		echo '<td>';
	    		echo $cname;
	    		echo '</td>';
		    echo '</tr>';
		    echo '<tr>';
		    	echo '<td>';
	    		echo 'Delivery Address :';
	    		echo '</td>';
	    		echo '<td>';
	    		echo $dadd;
	    		echo '</td>';
		    echo '</tr>';
		    echo '<tr>';
		    	echo '<td>';
	    		echo 'Delivery Date :';
	    		echo '</td>';
	    		echo '<td>';
	    		echo $ddate;
	    		echo '</td>';
		    echo '</tr>';
		    echo '<tr>';
		    	echo '<td>';
	    		echo 'Delivery Time :';
	    		echo '</td>';
	    		echo '<td>';
	    		echo $dtime;
	    		echo '</td>';
		    echo '</tr>';
		    		    echo '<tr>';
		    	echo '<td>';
	    		echo 'Mobile Number :';
	    		echo '</td>';
	    		echo '<td>';
	    		echo $mobinum;
	    		echo '</td>';
		    echo '</tr>';
		    echo '<tr>';
		    	echo '<td>';
	    		echo 'Package :';
	    		echo '</td>';
	    		echo '<td>';
	    		echo $pack;
	    		echo '</td>';
		    echo '</tr>';
		    echo '<tr>';
		    	echo '<td>';
	    		echo 'Floral Tributes :';
	    		echo '</td>';
	    		echo '<td>';
	    		echo $floral;
	    		echo '</td>';
		    echo '</tr>';
		    echo '<tr>';
		    	echo '<td>';
	    		echo 'Remembrance booklet :';
	    		echo '</td>';
	    		echo '<td>';
	    		echo $remembrance;
	    		echo '</td>';
		    echo '</tr>';
		    echo '<tr>';
		    	echo '<td>';
	    		echo 'Chairs and tents :';
	    		echo '</td>';
	    		echo '<td>';
	    		echo $chairtents;
	    		echo '</td>';
		    echo '</tr>';
		    		    echo '<tr>';
		    	echo '<td>';
	    		echo 'Obituary Notices :';
	    		echo '</td>';
	    		echo '<td>';
	    		echo $obituary;
	    		echo '</td>';
		    echo '</tr>';
		    echo '<tr>';
		    	echo '<td>';
	    		echo 'Crematorium booking :';
	    		echo '</td>';
	    		echo '<td>';
	    		echo $crematorium;
	    		echo '</td>';
		    echo '</tr>';
		    echo '<tr>';
		    	echo '<td>';
	    		echo 'Monumental plaques :';
	    		echo '</td>';
	    		echo '<td>';
	    		echo $monumental;
	    		echo '</td>';
		    echo '</tr>';
		    echo '<tr>';
		    	echo '<td>';
	    		echo 'Funeral pyres :';
	    		echo '</td>';
	    		echo '<td>';
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
    					$rid=$_SESSION['res_id'];
						$cname=$_SESSION['cusname'];
						$dadd=$_SESSION['diladd'];
						$ddate=$_SESSION['dildate'];
						$dtime=$_SESSION['diltime'];
						$mobinum=$_SESSION['mobilenum'];

						$pack=$_SESSION['packname'];
						$floral=$_SESSION['Floral_tributes'];
						$remembrance=$_SESSION['Remembrance_booklet'];
						$chairtents=$_SESSION['Chairs_and_tents'];
						$obituary=$_SESSION['Obituary_Notices'];
						$crematorium=$_SESSION['Crematorium_booking'];
						$monumental=$_SESSION['Monumental_plaques'];
						$pyres=$_SESSION['Funeral_pyres'];
    if(isset($_GET['reject'])){
        $reject = $_GET['reject'];
        $sql= "delete from reservations where res_id = $reject";
        mysqli_query($conn,$sql);

        echo "<script>alert('Delete Form.'); window.location.href='adminReservation.php'; </script>";


    }

    if(isset($_GET['accept'])){
        $accept = $_GET['accept'];
    //    $sql= "INSERT INTO `acceptvisitor`(`msg_no`) VALUES ($_GET[accept])";
        $sql = "INSERT INTO paid_reservations(res_id,cusname,diladd,dildate,diltime,mobilenum,packname,Floral_tributes,Remembrance_booklet,Chairs_and_tents,Obituary_Notices,Crematorium_booking,Monumental_plaques,Funeral_pyres) VALUES ($rid,'$cname','$dadd','$ddate','$dtime','$mobinum','$pack','$floral','$remembrance','$chairtents','$obituary','$crematorium','$monumental','$pyres')";
        mysqli_query($conn,$sql);
        $sql= "delete from reservations where res_id = $accept";
    //    $sql = "INSERT INTO visitors (deadname,visname,visnic,relation,message) VALUES ('$dn','$vnm','$vnc','$ren','$mge')";
        mysqli_query($conn,$sql);
        echo "<script>alert('Paid reservation'); window.location.href='adminReservation.php'; </script>";
    }
    ?>
    </div>
	</div>
</div>

</body>
</html>
