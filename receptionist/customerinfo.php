<?php
    include ('sessionReceptionist.php');
?>
<html>
<head>
    <title>login</title>
    <link rel="stylesheet" type="text/css" media="screen" href="../css/receptionistregister.css">
     <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" type="text/css" href="../css/resiptionistregister.css">
    <link rel="stylesheet" type="text/css" href="../css/adminindex.css">
    <style>
    html,body,h1,h2,h3,h4,h5 {font-family: 'Ruda', sans-serif;}
    .w3-sidenav a,.w3-sidenav h4 {font-weight:bold;}
    </style>
</head>
<body>


<nav class="navi_menu" id="mySidenav">
  <?php include '../details.php'; ?>
    <a href="indexreceptionist.php" class="navi"><img src="../img/home.png" class="image">&nbsp;&nbsp;HOME</a>
   <a href="receptionistregister.php" class="navi"><img src="../img/account.png" class="image">&nbsp;&nbsp;REGISTRATION</a>
   <a href="customerinfo.php" class="active"><img src="../img/profile.png" class="image">&nbsp;&nbsp;CUSTOMER INFORMATION</a>
  <a href="feedbackreceptionist.php" class="navi"><img src="../img/feedback.png" class="image">&nbsp;&nbsp;FEED-BACK 
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
  <a href="editreceptionist.php" class="navi"><img src="../img/profile.png" class="image">&nbsp;&nbsp;UPDATE PROFILE</a>
 
</nav>

<div class="menu2" align="right">
    <div class="menu2in">
      <a href="../signout.php" class="myButton">Log Out</a>
    </div>

<div class="con1" align="center">
<div class="con2">


<div id="id">
                <form method="post" action="customerinfo.php">
                <table id="tb11">
                    <tr>
                        <th colspan="2" align="left"><b style="color:white; font-size:24px; text-shadow:2px 2px 2px gray;">CUSTOMER INFORMATION</b></th> 
                    </tr>
                    <tr>
                    <td><label for="cusname">Customer Name</label></td>
                    <td><input type="text" name="cusname" placeholder="Customer Name" required></td>
                    </tr> 
                    <tr>
                    <td colspan="2" align="center">
                    <input type="submit" value="Search" name="insert">
                    </td>
                    </tr>

                </table>
            
                </form>
                </div> 
    
<?php
                require "../dbcon/dbcon.php";
                
                 if (isset($_POST['insert'])) {
                     
                     
                                $cusname = $_POST['cusname'];
                            
    $sql = "SELECT cusname, connumber, address, email, gender, nic FROM customers WHERE cusname = '$cusname'";
    $query=(mysqli_query($conn,$sql));
?>
<table>
    <tr> 
        <th>Customer Name</th>
        <th>Contact Number</th>
        <th>Address</th>
        <th>Email</th>
        <th>Gender</th>  
        <th>NIC</th>
    </tr>

<?php
    while ($row = mysqli_fetch_assoc($query)){
         echo "<tr>";
                
            echo "<td>";
            echo $row['cusname'];
            echo "</td>";

            echo "<td>";
            echo $row['connumber'];
            echo "</td>";
                
            echo "<td>";
            echo $row['address'];
            echo "</td>";

             echo "<td>";
            echo $row['email'];
            echo "</td>";
                
            echo "<td>";
            echo $row['gender'];
            echo "</td>";

            echo "<td>";
            echo $row['nic'];
            echo "</td>";

         echo "</tr>";}
?>
</table>
<?php
}
?>

</div>
</div>
    </div>
</body>
</html>