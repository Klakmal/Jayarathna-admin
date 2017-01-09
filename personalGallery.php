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
				background-color: #333;
				
				margin: 1px .5px;
			}
			.list li a{
				text-decoration: none;
				display: block;
				text-align: center;
				color: white;
			}
			.pro-main{
				margin: 0px 0px;
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
			.bar{
				background-color: white;
				min-height: 540px;
				margin: 2px;
			}
			.cube{
				height: 68px;
				width: 100%;
				background-color: #333;
				padding: 20px 40px;
				color: white;
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
			<!--			<img src="getImage.php?id=<?php echo $id; ?>" width="250px" height="325px">			-->

						<?php
							require "dbcon/dbcon.php";
							$sql_image = "SELECT * FROM deathpersondetails WHERE deadPersonID = '".$id."'";
							$result_image = mysqli_query($conn, $sql_image);
							 if(mysqli_num_rows($result_image) > 0)  
							 {
							 	while($row_img = mysqli_fetch_array($result_image))
				      			{	
				      				echo "<img src='img/profileImage/".$row_img['pro_img'].".jpg' width='250px' height='325px'>";
				      			}
				      		}
						?>
						<ul class="list">
						<li><a href="profile.php?id=<?php echo $id; ?>">Details</a></li>
						<li><a href="condolence.php?id=<?php echo $id; ?>">Condolence message</a></li>
						<li><a href="personalGallery.php?id=<?php echo $id; ?>">Gallery</a></li>
						<li><a href="webcasting.php?id=<?php echo $id; ?>">Video</a></li>
						</ul>
						</div>
					</div>
					<div class="pro2">
						<div class="bar" align="left">
						

							<?php
								$imageTotal="";
								$link="";
							?>
							<div class="cont1" align="center">
							    <div class="cont2" align="left">
							        <?php
							            require "dbcon/dbcon.php";
							        $query=null;
							            $error=FALSE;   
							                $deadnameerr = "";
							                
											$deadname = $id;
							                  if ($error==FALSE){  
							                $sql="SELECT * FROM personalGallery WHERE deadPersonID='$deadname'";
							                $query=(mysqli_query($conn,$sql));
							                }

							        ?>
											<?php 
							                if ($query != null) {
							                    while ($row = mysqli_fetch_assoc($query)){
							                        $no = $row['no'];
							                    }
							                }
							                
							                if(isset($no)){                    
							                    $sql = "SELECT * FROM `personalGallery` WHERE no=$no";
							                    $query=(mysqli_query($conn,$sql));
							                    
							                    if($query){
							                        while($row = mysqli_fetch_assoc($query)){
							                            $link = $row['link'];
														$imageTotal = $row['num_images'];
							                        }
							                    }

							                }                                      
							                ?>
											

								    <div class="galleryContainer" align="left" style="padding: 15px; background-color: #333;">
										<div class="galleryThumbnails">
										<?php
											for ($t=1;$t<=$imageTotal;$t++){
												echo '<a href="javascript: changeimage('.$t.')" class="thumbnailsimage'.$t.'"><img src="'.$link.''.$t.'.jpg" width="auto" height="250" alt="" style="margin: 3px;"/></a>';
												#onima format ekakata hadanna jpg eka
												#nama saha total numberth wenas karaganna balanna
											}
										?>
										</div>
									</div>
							    </div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>


		<?php include 'temp/footer.php';  ?>
	</body>
</html>