<!DOCTYPE html>
<html>
<head>
	<title>Memorize</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){  
		      $('#search_text').keyup(function(){  
		           var txt = $(this).val();  
		           if(txt != '')  
		           {  
		                $.ajax({  
		                     url:"fetch.php",  
		                     method:"post",  
		                     data:{search:txt},  
		                     dataType:"text",  
		                     success:function(data)  
		                     {  
		                          $('#drop_box').html(data);  
		                     }  
		                });  
		           }  
		           else  
		           {  
		                $('#drop_box').html('');                 
		           }  
		      });  
		 });  
	</script>
</head>
<body>
<div class="container">
	<form action="" method="POST">
		<input type="text" name="search" autocomplete="true" id="search_text" placeholder="Search">
		<input type="submit" name="submit" value="search">
	</form>
	<div id="drop_box"></div>
	<div id="drop_box1">
		<ul class="drop_list">
			<li class="drop_item">
				<a href="" class="person_link">
					<span>
						<img src="img/mrjayaratne.jpg" width="30px" height="30px">
					</span>
					<span>
						name
					</span>
					<span>
						 
					</span>
					<span>
						lastname
					</span>
				</a>
			</li>
			
		</ul>
	</div>
</div>
</body>
</html>