<html>
	<head>
		<title>Upload personal images</title>
	</head>

	<body>
		<?php
			// define variables and set to empty values
			$link = $totalImages = "";
			$linkErr = $totalImagesErr = "";

		
		//checking the fields are filled
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (empty($_POST["link"])) {
    			$linkErr = "Link is required";
  			} else {
		  		$link = test_input($_POST["link"]);
		  	}

		  	if (empty($_POST["totalImages"])) {
    			$totalImagesErr = "Number of images in the directory is required";
  			} else {
		  		$totalImages = test_input($_POST["totalImages"]);
		  		if(!preg_match('/^[0-9]*$/',$totalImages)){
		  			$totalImagesErr = "Give the total number of images in numbers..!";
		  		}
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
			Link of image directory: <input type="text" name="link" value="<?php echo $link;?>">
			<span class="error">* <?php echo $linkErr;?></span>
			<br><br>
			Number of images: <input type="text" name="totalImages" value="<?php echo $totalImages;?>">
			<span class="error">* <?php echo $totalImagesErr;?></span>
			<br><br>
			<input type="submit">
		</form>


	</body>
</html>