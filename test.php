<html>
<head>
	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
	<script type="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
	<link rel="stylesheet" type="text/css" media="screen" href="css/menu/simple_menu.css">
</head>

<body>
<?php include 'temp/header.php';  ?>
<?php
	$imageTotal=3;
	$url="images/";
?>

<div class="galleryContainer" align="left">
	<div class="galleryThumbnails">
		<?php
			for ($t=1;$t<=$imageTotal;$t++){
				echo '<a href="javascript: changeimage('.$t.')" class="thumbnailsimage'.$t.'"><img src="'.$url.''.$t.'.jpg" width="auto" height="250" alt=""/></a>';
			}
		?>
	</div>
</div>
<?php include 'temp/footer.php';  ?>
</body>
</html>
