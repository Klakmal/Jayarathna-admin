<html>
	<head>
		<title>Upload personal images</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/adminindex.css">
		<link rel="stylesheet" type="text/css" href="css/adminfeedback.css">
		<style>
		html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
		.w3-sidenav a,.w3-sidenav h4 {font-weight:bold}
		</style>
	</head>

	<body>
		<?php
			require "dbcon/dbcon.php";

			// define variables and set to empty values
			$deadname = $link = $totalImages = "";
			$deadnameErr = $linkErr = $totalImagesErr ="";
			$error= False;
		
		//checking the fields are filled
		if (isset($_POST['submit'])) {
			if (empty($_POST["deadname"])) {
    			$deadnameErr = "Deadperson's name is required";$error=True;
  			} else {
		  		$deadname = test_input($_POST["deadname"]);
		  	}

			if (empty($_POST["link"])) {
    			$linkErr = "Link is required";$error=True;
  			} else {
		  		$link = test_input($_POST["link"]);
		  	}

		  	if (empty($_POST["totalImages"])) {
    			$totalImagesErr = "Number of images in the directory is required";$error=True;
  			} else {
		  		$totalImages = test_input($_POST["totalImages"]);
		  		if(!preg_match('/^[0-9]*$/',$totalImages)){
		  			$totalImagesErr = "Give the total number of images in numbers..!";$error=True;
		  		}
		  	}
		  	if($error==False){
				$sql = "INSERT INTO personalgallery (deadname, link, num_images) VALUES('$deadname', '$link', '$totalImages')";
			}
			if (mysqli_query($conn,$sql)){
			}else{
				echo "error";
			}
		}
		
		//securing inputs and form action
		function test_input($data) {
			  $data = trim($data);
			  $data = stripslashes($data);
			  $data = htmlspecialchars($data);
			  return $data;
		}
		

		?>

		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			Dead person's name: <input type="text" name="deadname">
			<span class="error">* <?php echo $deadnameErr;?></span>
			<br><br>
			Link of image directory: <input type="text" name="link">
			<span class="error">* <?php echo $linkErr;?></span>
			<br><br>
			Number of images: <input type="text" name="totalImages" >
			<span class="error">* <?php echo $totalImagesErr;?></span>
			<br><br>
			<input type="submit" name="submit" value=Submit>
			<input type="file" name="file">
		</form>


	</body>
</html>