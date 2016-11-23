<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
	    <link rel="stylesheet" type="text/css" media="screen" href="css/menu/simple_menu.css">
<!--	    <link rel="stylesheet" type="text/css" href="css/profile.css">-->
	    <style type="text/css">
			.container1{
				width: 100%;
				background-color: ;
				padding: 5px;
			}
			.container2{
				max-width: 1000px;
				height: 100%;
				background-color: ;
			}

			.list{
				list-style-type: none;
				
				overflow: hidden;
			}
			.list li{
				
				padding: 15px 30px;
				background-color: black;
				
				margin: 0px .5px;
			}
			.list li a{
				text-decoration: none;
				display: block;
				text-align: center;
				color: white;
			}
			.pro-main{
				margin: 20px 0px;
				position: relative;
				width: 100%;
				background-color: ;
				
			}
			.pro1{
				width: 250px;
				height: 500px;	
				float: left;
				background-color: ;
				height: 100%;
			}
			.pro2{
				width: 750px;
				float: right;
				background-color: ;
				height: 100%;
				
			}
			.picture{
				background-color: ;
				margin-top: 0px; 
			}
	    </style>
	</head>
	<body>
		<?php include 'temp/header.php'; ?>
		<?php $id = $_GET["id"]; ?>
		<div class="container1" align="center">
			<div class="container2">
				<div class="pro-main">
					<div class="pro1">
						<div class="picture">
						<img src="img/mrjayaratne.jpg" width="250px" height="325px">
						<ul class="list">
						<li><a href="">Details</a></li>
						<li><a href="condolence.php?id=<?php echo $id; ?>">Condolence message</a></li>
						<li><a href="personalGallery.php?id=<?php echo $id; ?>">Gallery</a></li>
						<li><a href="webcasting.php?id=<?php echo $id; ?>">Video</a></li>
						</ul>
						</div>
					</div>
					<div class="pro2">
						<div class="bar">
					<?php 
						require "dbcon/dbcon.php";
						
						$extra = $name = $school = $univer = $employee = $details = "";
						$sql1 = "SELECT * FROM deathpersondetails WHERE deadPersonID = '".$id."'";
						$result1 = mysqli_query($conn, $sql1);
						 if(mysqli_num_rows($result1) > 0)  
						 {
						 	while($row = mysqli_fetch_array($result1))
			      			{
			      				$name .='
			      				<div>
			      				<label>Name : </label><span>'.$row["deadPersonName"].'</span>
			      				<div>
			      				';
			      				if($name != ""){
			      				echo $name;
			      				}
			      				$school .='
			      				<div>
			      				<label>School : </label><span>'.$row["school"].'</span>
			      				<div>
			      				';
			      				if($school != ""){
			      				echo $school;
			      				}
			      				$univer .='
			      				<div>
			      				<label>University : </label><span>'.$row["university"].'</span>
			      				<div>
			      				';
			      				if($univer != ""){
			      				echo $univer;
			      				}
			      				$employee .='
			      				<div>
			      				<label>Employee : </label><span>'.$row["employee"].'</span>
			      				<div>
			      				';
			      				if($employee != ""){
			      				echo $employee;
			      				}
			      				$details .='
			      				<div>
			      				<label>Description : </label><span>'.$row["Description"].'</span>
			      				<div>
			      				';
			      				if($details != ""){
			      				echo $details;
			      				}
			      			}
						 }
					?>
					</div>
					</div>
				</div>
			</div>
		</div>


		<?php include 'temp/footer.php';  ?>
	</body>
</html>