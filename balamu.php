<?php
	require "dbcon/dbcon.php";
	$data='';
	$pic='';
	$query=null;
    $error=FALSE;
    $deadnameerr = "";

	if(isset($_POST['search']))
	{
		
    	
		$str = $_POST['search'];
		$str = preg_replace("#[^0-9a-z]#i","",$str);
		$query = "select * from webcasting where deadname LIKE '%$str%'";
		$result = mysqli_query($conn,$query);
		$count = mysqli_num_rows($result);
		if($count>0)
		{
			while($row = mysqli_fetch_array($result))
			{
				if($result !==''){
					$data = $data."<li>".$row['deadname']."</li>";
				}
				else{
					$data='';
				}
					
				
			}
			echo $data;
			//<img src="propics/ama.jpg" width=50px height=50px >
				
			
		}
	
	}else
	{
?>
<!DOCTYPE html>
<html>
<head>
	<title>Jayarathna Funerals</title>
	
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
		<link rel="stylesheet" type="text/css" media="screen" href="css/menu/simple_menu.css">
		<link rel="stylesheet" type="text/css" media="screen" href="css/contactUs.css">
	<link rel="stylesheet" href="css/screen.css">

	<script src="jquery-1.12.4.min.js"></script>
	
	<script>
		$(function(){
			$('.input').keyup(function(){
				var search = $('.input').val();
				$.post("balamu.php",{"search":search},function(data){
					$('.r').html(data);

					$('.r li').click(function(){
						var result_value = $(this).text();
							//alert(result_value);
						$('.input').val(result_value);
						$('.r').html('');

					});
				});
			});
		});
	</script>


</head>
<body>
<?php include "temp/header.php"; ?>
<div id="par1" align="center">
		<div id="par" align="center">
			<div >	
				<h1><center class="contact_header" style = "font-family: myfont1; color: #a86205;"><b>MEMORIES</b></center></h1>
				<hr class="hh1">
			</div>
			<div class="tb" align="center">
				
	<form action="balamu.php" method="post">
		<input type="text" name="search" class="input" name="input" >
		<input type="submit" value="select" name="input">
		<div class="dropdown">
		<ul class="r">
			
		</ul>
	</div>
	</form>

	</div>
	</div>
	</div>
<?php include "temp/footer.php"; ?>	
</body>
</html>
<?php
}
?>