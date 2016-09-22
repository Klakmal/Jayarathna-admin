<html>
<head>
<title>webcasting</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/menu/simple_menu.css">
<link rel="stylesheet" type="text/css" href="css/webcasting.css">
</head>
<body>
<?php include "temp/header.php" ?>
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
                $sql="SELECT * FROM webcasting WHERE deadname='$deadname'";
                $query=(mysqli_query($conn,$sql));
                }
                }
        ?>
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <div id="webcasting" align="center">
            <form id="frm" action="webcasting.php" method="post">
            <table id="tbl">
                <tr>
                    <td colspan="2">
                        <h2 id="heading2" align="center"><b>WEBCASTING</b></h2>
                    </td>
                
                </tr>
                 <tr>
                
                    <td><label for="deadname"></label><span class="error"><?php echo $deadnameerr;?></span></td>
                    <td>
                        <?php 
                                    
                                    echo '<input type="text" list="dn" id="deadname" name="deadname" placeholder="Dead Person Name" required>';
                                    echo '<datalist id="dn">';
                                    
                                    $sql1 = "SELECT `deadname` FROM `webcasting`";
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
                    echo '<div class = "iframe_div" align="center">';
                    echo "<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/";
                    
                    $sql = "SELECT * FROM `webcasting` WHERE no=$no";
                    $query=(mysqli_query($conn,$sql));
                    
                    if($query){
                        while($row = mysqli_fetch_assoc($query)){
                            echo $row['url'];
                        }
                    }
                    
                    echo "\" frameborder=\"0\" allowfullscreen></iframe>";
                    echo '</div>';
                }                                      
                ?>
            
            </div>
        </form>
    </div>
</div>
      <?php include 'temp/footer.php';  ?>
    </body>

</html>
