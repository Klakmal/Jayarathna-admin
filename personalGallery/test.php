<html>
<head>
	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
	<script type="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
</head>

<body>
<?php
	$imageTotal=3;
	$url="baby me/";
?>

<div class="galleryContainer">
	<div class="galleryThumbnails">
		<?php
			for ($t=1;$t<=$imageTotal;$t++){
				echo '<a href="javascript: changeimage('.$t.')" class="thumbnailsimage'.$t.'"><img src="'.$url.''.$t.'.jpg" width="auto" height="300" alt=""/></a>';
			}
		?>
	</div>
</div>
</body>
</html>
