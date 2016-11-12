<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
	    <link rel="stylesheet" type="text/css" media="screen" href="css/menu/simple_menu.css">
	    <link rel="stylesheet" type="text/css" href="css/profile.css">
	    <style type="text/css">
			.container1{
				width: 100%;
				height: 1000px;
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
				display: block;
				overflow: hidden;
			}
			.list li{
				float: right;
				padding: 15px 30px;
				background-color: black;
				border-bottom-right-radius: 10px;
				border-bottom-left-radius: 10px;
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
				background-color: green;
				height: 600px;
			}
			.pro1{
				width: 250px;
				
				float: left;
				background-color: gray;
				height: 100%;
			}
			.pro2{
				width: 750px;
				float: right;
				background-color: white;
				height: 100%;
			}
			.picture{
				background-color: red;
				margin-top: 75px; 
			}
	    </style>
	</head>
	<body>
		<?php include 'temp/header.php'; ?>
		<div class="container1" align="center">
			<div class="blank1"><h1><b>Memorize</b></h1></div>
			<div class="container2">
				<div class="pro-main">
					<div class="pro1">
						<div class="picture">

						<img src="img/mrjayaratne.jpg" width="250px" height="325px">

						</div>
					</div>
					<div class="pro2">
						<div class="bar">
					<ul class="list">
						<li><a href="">Video</a></li>
						<li><a href="">Gallery</a></li>
						<li><a href="">Condolence message</a></li>
						<li><a href="">Details</a></li>
					</ul>
				</div>
					</div>
				</div>
			</div>
		</div>
		<?php include 'temp/footer.php';  ?>
	</body>
</html>