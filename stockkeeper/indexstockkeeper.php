<?php
    include ('sessionStockkeeper.php');
?>
<html>
    <head>
    <title>Stock Keeper</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/adminindex.css">
    <link rel="stylesheet" type="text/css" href="../css/manage.css">
    <style>
    html,body,h1,h2,h3,h4,h5 {font-family: 'Ruda', sans-serif;}
    .w3-sidenav a,.w3-sidenav h4 {font-weight:bold;}
        
        .red{
            background-color: yellow;
            padding: 20px;
            text-align: center;
            
        }
        .con2{
            padding-top: 75px;
        }
        
        tr,td{
            width: 100px;
            padding: 10px;
        }
        th{
            color: white;
        }
        table{
            color: #ffeded;
        }
        
        .warning{
            color: aliceblue;
            font-weight: bolder;
            font-size: 18px;
        }
    </style>
    </head>
    <body>

<nav class="navi_menu" id="mySidenav">
  <?php include '../details.php'; ?>
    <a href="indexstockkeeper.php" class="active"><img src="../img/home.png" class="image">&nbsp;&nbsp;HOME</a>
  <a href="stockmanagement.php" class="navi"><img src="../img/stock.png" class="image">&nbsp;&nbsp;STOCK MANAGMENT</a>
 
  <a href="feedbackstockkeeper.php" class="navi"><img src="../img/feedback.png" class="image">&nbsp;&nbsp;FEED-BACK 
      <span class="noti">
          <?php
              require "../dbcon/dbcon.php";
              $query = "SELECT COUNT(*) FROM feedback WHERE flag = 0";
              $result = mysqli_query($conn,$query);
              $rows = mysqli_fetch_row($result);
              echo $rows[0];
          ?>
      </span>
    </a>
  <a href="editstockkeeper.php" class="navi"><img src="../img/profile.png" class="image">&nbsp;&nbsp;UPDATE PROFILE</a>
</nav>

<div class="menu2" align="right">
    <div class="menu2in">
      <a href="../signout.php" class="myButton">Log Out</a>
    </div>
  </div>
        
<div class="con1" align="center">
    <div class="con2" align="left">
        
    
        
    <?php
        
        require "../dbcon/dbcon.php";
        $sql1 = "SELECT type.type, COUNT(id.id) , moq.moq FROM id, type, moq WHERE (id.timeout > CURDATE() OR id.timeout='0000-00-00') AND id.no = type.no AND type.type = moq.type GROUP BY type.type";
        $query1=(mysqli_query($conn,$sql1));
        if ($row = mysqli_fetch_assoc($query1)){
        $type = $row['type'];
        $remaining = $row['COUNT(id.id)'];
        $moq = $row['moq'];
        
        if ($moq > $remaining){
        ?>
        <div id="location" style="margin-left:280px; width: 300px; height:350px; padding-top: 20px; background-color: #f44242; color: #ffeded;">
            <table>
                <tr>
                    <td colspan="3"><span class="warning">WARNING ! </span><br> Remaining coffin level is less than MOQ. <br></td>
                </tr>
                <tr>
                    <th>
                        Type
                    </th>
                    <th>
                        Remaining
                    </th>
                    <th>
                        MOQ
                    </th>
                </tr>
        <?php
        $sql2 = "SELECT type.type, COUNT(id.id) , moq.moq FROM id, type, moq WHERE (id.timeout > CURDATE() OR id.timeout='0000-00-00') AND id.no = type.no AND type.type = moq.type GROUP BY type.type";
        $query2=(mysqli_query($conn,$sql2));
        while ($row1 = mysqli_fetch_assoc($query2)){
        $type1 = $row1['type'];
        $remaining1 = $row1['COUNT(id.id)'];
        $moq1 = $row1['moq'];     
            
            ?>
            
            <tr>
                <td>
                    <?php echo $type1; ?>
                </td>
                <td>
                    <?php echo $remaining1; ?>
                </td> 
                <td>
                    <?php echo $moq1; ?>
                </td> 
            </tr>
            
      
            
    <?php       
            }
        }
    ?>
                </table>
     </div>   
    <?php       
            }
    ?>
            
    
        
        
    </div>
</div>
  </body>
  </html>