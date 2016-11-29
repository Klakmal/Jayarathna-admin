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

			.condol{
				background-color: #333;
				color: white;
				padding: 10px;
				
			}
			#heading2{
				color: white;
			}
			input[type=text],input[type=visnic]{
				border:	1px solid black;
				border-radius: 5px;
				width: 200px;
				height: 25px;
				margin: 2px;
			}
			textarea{
				border:	1px solid black;
				border-radius: 5px;
				width: 300px;
				height: 80px;
				margin: 2px;
			}
			input[type=submit],input[type=reset]{
				border-radius: 2px;
				border: 1px solid black;
				background-color: #111;
				color: white;
				padding: 3px 8px;
			}
			input[type=submit]:hover,input[type=reset]:hover{
				border-radius: 2px;
				border: 1px solid black;
				background-color: #333;
				color: gray;
				padding: 3px 8px;
			}
			input[type=submit]:active,input[type=reset]:active{
				border-radius: 2px;
				border: 1px solid black;
				background-color: #aaa;
				color: black;
				padding: 3px 8px;
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
						

<div class = "condol" align="center">
    <div class="conform">
    <?php
        require "dbcon/dbcon.php";
        $id = $_GET["id"];
        $error=FALSE;
            $deadnameerr = $visnameerr = $visnicerr = $relationerr = $messageerr = "";
            
            if (isset($_POST['submit'])) {
                
                if(empty($_POST['visname'])){ 
                    $visnameerr = "";
                    $error = TRUE;
                }else{
                    $visname = $_POST['visname'];
                }
                
              if(empty($_POST['visnic'])){ 
                    $visnicerr = "";
                    $error = TRUE;
                }else{
                    $visnic = $_POST['visnic'];
                }
                
                if(empty($_POST['relation'])){ 
                    $relationerr = "";
                    $error = TRUE;
                }else{
                    $relation = $_POST['relation'];
                }
                if(empty($_POST['message'])){ 
                    $messagerr = "";
                    $error = TRUE;
                }else{
                    $message = $_POST['message'];
                }
                
                if ($error==FALSE){
               
                $sql = "INSERT INTO visitors (deadPersonID,visname,visnic,relation,message) VALUES ('".$id."','".$visname."','".$visnic."','".$relation."','".$message."')";
                if(mysqli_query($conn,$sql)){
                    /*echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
                    header( "Location: condolence.php");*/
                    //echo "<script>alert('Thank you for writing. Condolence message'); window.location.href='condolence.php'; </script>";
                    echo '<div id="overlay"></div>';
                    echo '<div id="popup" align = "center">';
                    echo '<div id="popcon">';
                    echo '<div id="pophead">';
                    echo 'Condolence screen';
                    echo '</div>';
                    echo '<div id="popbody">';
                    echo 'Thank you for submiting your condolence message';
                    echo '</div>';
                    echo '<div id="popfooter">';
                    echo '<a id="CloseBtn" href="condolence.php?id='.$id.'">Ok</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    die();
                } else{
                    echo "<script type='text/javascript'>alert('Not successfully datatranfer!')</script>";
                }
                 
                }
            }
        ?>
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <div id="condolence">
            <form id="f3" action="condolence.php" method="post">
            <table id="tb3">
                <tr>
                    <td colspan="3" align="center">
                        <h2 id="heading2" align="center"><b>CONDOLENCE MESSAGE SCREEN</b></h2>
						<hr>
                    </td>
                
                </tr>
				<tr>
                    <td colspan="3" align="center">
                        
						<br>
                    </td>
                
                </tr>
				<tr>
                    <td colspan="3" align="center">
                        <div class="disdiv">
							<p id="discond">As part of our service to those arranging a funeral, each client will be 
                            offered the choice to have a condelence screen on the funeral day. This is one
                            of our unique services which allows anyone anywhere in the world to share 
                            their precious memories with their loved ones at the funeral.</p><p> This service can be 
                            easily accessed from our website allowing the family and friends to leave 
                            their thoughts and personal messages of condolence which also is a
                            personal tribute to the passed away person on his/her final day. 
                            All those messages will be put on display through this screen near the coffin.
                            The place and the number of days of its screening can be arranged according to
                            the clients' will. When displaying, all the messages will be screened after the
                            supervision of our team members. </p>
						</div>
                    </td>
                
                </tr>
				<tr>
                    <td colspan="3" align="center">
                        
						<br>
                    </td>
                
                </tr>
                <tr>
                    <td style ="width:170px;"></td>
                      <td><label for="visname">Visitor Name : </label><span class="error"><?php echo $visnameerr;?></span></td>
                        
                    <td> <input type="text" name="visname" id="visname" placeholder="Visitor Name" required></td>
                    
                </tr>
               
                <tr>
                    <td></td>
                     <td><label for="visnic">Visitor NIC : </label><span class="error"><?php echo $visnicerr;?></span></td>
                        
                       <td><input type="visnic" name="visnic" id="visnic" pattern="^\d[0-9V]{9}$" maxlength="10" placeholder="Visitor NIC - XXXXXXXXXV" required></td>
                </tr>
                <tr>
                    <td></td>
                     <td><label for="relation">Relationship : </label><span class="error"><?php echo $relationerr;?></span></td>
                        
                       <td><input type="text" name="relation" id="relation" placeholder="Relationship" required></td>
                </tr>
                 <tr>
                    <td></td>
                       <td><label for="message"></label><span class="error"><?php echo $messageerr;?></span></td>
                
                     <td> <textarea name="message" id="message" rows="10" cols="60" placeholder="Input Your Condolence Message Here" required></textarea></td>
                
                </tr>
                 <tr align="right">
                 	<td></td>
                 	
                    <td align="right">
                        <input type="submit" value="Submit" name="submit"> 
                        <input type="reset" value="Cancle" name="cancle">
                    </td>
                
                </tr>
                
                
                </table>
            </form>
            </div>
        </form>
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