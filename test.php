<html>
<head>
	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
	<script type="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
	<link rel="stylesheet" type="text/css" media="screen" href="css/menu/simple_menu.css">
	<link rel="stylesheet" type="text/css" href="css/webcasting.css">
</head>

<body>
<?php include 'temp/header.php';  ?>
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
                
                if (isset($_POST['view'])) {
                    
                    if(empty($_POST['deadname'])){ 
                        $deadnameerr = "</br>Dead person Name is required";
                        $error = TRUE;
                    }else{
                        $deadname = $_POST['deadname'];
                    }
                  if ($error==FALSE){  
                $sql="SELECT * FROM personalGallery WHERE deadname='$deadname'";
                $query=(mysqli_query($conn,$sql));
                }
                }
        ?>
	    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
	        <div id="personalGallery" align="center">
	            <form id="frm" action="test.php" method="post">
	            <table id="tbl">
	                <tr>
	                    <td colspan="2">
	                        <h2 id="heading2" align="center"><b>Personal Gallery</b></h2>
	                    </td>
	                
	                </tr>
	                 <tr>
	                
	                    <td><label for="deadname"></label><span class="error"><?php echo $deadnameerr;?></span></td>
	                    <td>
	                        <?php 
	                                    
	                                    echo '<input type="text" list="dn" id="deadname" name="deadname" placeholder="Dead Person Name" required>';
	                                    echo '<datalist id="dn">';
	                                    
	                                    $sql1 = "SELECT `deadname` FROM `personalGallery`";
	                                    $result1= mysqli_query($conn, $sql1);
	                                     while($r=mysqli_fetch_row($result1))
	                                     { 
	                                           echo '<option id='.$r[0].'>'.$r[0].'</option>';
	                                     }
	                                    echo '</datalist>';
	                                ?>
	                    </td>
	                </tr>
	                <tr>
	                    <td colspan="2">
	                        <input type="submit" value="VIEW" name="view"> 
	                    </td>
	                </tr>
	                </table>
	                <hr>
	                <?php 
	                ?>
	            </form>
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
				
	        </div>
	    </form>
	    <div class="galleryContainer" align="left">
			<div class="galleryThumbnails">
			<?php
				for ($t=1;$t<=$imageTotal;$t++){
					echo '<a href="javascript: changeimage('.$t.')" class="thumbnailsimage'.$t.'"><img src="'.$link.''.$t.'.jpg" width="auto" height="250" alt=""/></a>';
					#onima format ekakata hadanna jpg eka
					#nama saha total numberth wenas karaganna balanna
				}
			?>
			</div>
		</div>
    </div>
</div>

<?php include 'temp/footer.php';  ?>
</body>
</html>