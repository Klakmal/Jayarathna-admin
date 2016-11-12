<!DOCTYPE html>
<html>
<head>
	<title>Condolence Message</title>
	<link rel="stylesheet" type="text/css" href="../css/admincondolence.css">
    <link rel="stylesheet" type="text/css" href="../css/adminindex.css">
	<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
.w3-sidenav a,.w3-sidenav h4 {font-weight:bold}
</style>
</head>
<body>
<div class="header">
	<p style="color:white; font-size:24px; text-shadow:2px 2px 2px gray; padding-left:20px;"><b>CONDOLENCE SCREEN MESSAGES</b><a class="myButton" href="indexitoperator.php" style="float:right; margin-right:20px;">Home</a></p>
    
	</div>
<div>
	<div>
	<div class="navidiv">
	<?php  
			$num=$dname=$vn=$vc=$rn=$mg="";
            require "dbcon/dbcon.php";
            session_start();
    		$sql = "SELECT * FROM visitors";
    		$query=(mysqli_query($conn,$sql)); 
    		echo '<ul class="naviul">';      
            while($row = mysqli_fetch_array($query)) {
    
    ?>	
    		<li class="navili">
    			<button class="but"  onclick="location.href='admincondolence.php?no=<?php echo $row['msg_no'] ?>'">
    			<?php echo $row['msg_no'] ?>
    			<?php echo $row['deadname'] ?>
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
						while($row = mysqli_fetch_assoc($result)){
						/*	echo "id: ".$row["dealer_id"]. "Name: ".$row["dealer_name"]. "NIC: ".$row["NIC"]."<br/>";*/
						$num=$row["msg_no"];
						$_SESSION['msg_no']=$num;
						$dname=$row["deadname"];
						$_SESSION['deadname']=$dname;
						$vn=$row["visname"];
						$_SESSION['visname']=$vn;
						$vc=$row["visnic"];
						$_SESSION['visnic']=$vc;
						$rn=$row["relation"];
						$_SESSION['relation']=$rn;
						$mg=$row["message"];
						$_SESSION['message']=$mg;
						}
					}else{
						echo "Zero results";
					}
    }
    echo '<div class ="container">';
    	echo '<h2>Condolence Screen Message</h2>';
	    echo '<table class="Condtb">';
		    echo '<tr>';
		    	echo '<td>';
	    		echo 'ID :';
	    		echo '</td>';
	    		echo '<td>';
	    		echo $num;
	    		echo '</td>';
		    echo '</tr>';
		    echo '<tr>';
		    	echo '<td>';
	    		echo 'Dead Person Name :';
	    		echo '</td>';
	    		echo '<td>';
	    		echo $vn;
	    		echo '</td>';
		    echo '</tr>';
		    echo '<tr>';
		    	echo '<td>';
	    		echo 'Visitor Name :';
	    		echo '</td>';
	    		echo '<td>';
	    		echo $vc;
	    		echo '</td>';
		    echo '</tr>';
		    echo '<tr>';
		    	echo '<td>';
	    		echo 'Relation :';
	    		echo '</td>';
	    		echo '<td>';
	    		echo $rn;
	    		echo '</td>';
		    echo '</tr>';
		    echo '<tr>';
		    	echo '<td>';
	    		echo 'Message :';
	    		echo '</td>';
	    		echo '<td>';
	    		echo $mg;
	    		echo '</td>';
		    echo '</tr>';
		    echo '<tr>';	 ?>
		    	<td colspan="2" align="right">
		    		<button class="acc"  onclick="location.href='admincondolence.php?accept=<?php echo $num ?>'">Accept</button>
		    		<button class="rej"  onclick="location.href='admincondolence.php?reject=<?php echo $num ?>'">Reject</button>
	<?php	    	echo '</td>';
		    echo '</tr>';
	    	
	    echo '</table>';
	    echo '</div>';

    ?>

    <?php
    					$n = $_SESSION['msg_no'];
						$dn=$_SESSION['deadname'];
						$vnm=$_SESSION['visname'];
						$vnc=$_SESSION['visnic'];
						$ren=$_SESSION['relation'];
						$mge=$_SESSION['message'];
    if(isset($_GET['reject'])){
        $reject = $_GET['reject'];
        $sql= "delete from visitors where msg_no = $reject";
        mysqli_query($conn,$sql);

        echo "<script>alert('Reject Condolence message'); window.location.href='admincondolence.php'; </script>";


    }

    if(isset($_GET['accept'])){
        $accept = $_GET['accept'];
    //    $sql= "INSERT INTO `acceptvisitor`(`msg_no`) VALUES ($_GET[accept])";
        $sql = "INSERT INTO acceptvisitor(msg_no,deadname,visname,visnic,relation,message) VALUES ($n,'$dn','$vnm','$vnc','$ren','$mge')";
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
