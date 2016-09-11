<?php
		require_once '../dbcon/dbcon.php';
		if(isset($_POST['search_term'])== true && empty($_POST['search_term'])== false){
			$search_term = $_POST['search_term'];
			$search_term = preg_replace("#[^0-9a-z]#i","",$search_term);
			$query = mysqli_query("SELECT 'deadname' FROM 'webcasting' LIKE '%$search_term%'");
			while(($row = mysqli_fetch_assoc($query))!== false){
				echo '<li>', $row['deadname'], '</li>';
			}
		}


	?>