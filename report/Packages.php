<?php
    include ('../manager/sessionManager.php');
?>
<html>
<head>
<title>Package Report</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/adminindex.css">
    <link rel="stylesheet" type="text/css" href="../css/manage.css">
    <style>
    html,body,h1,h2,h3,h4,h5 {font-family: 'Ruda', sans-serif;}
    .w3-sidenav a,.w3-sidenav h4 {font-weight:bold;}

    body{
    margin:0px;
    background-color: #eee;
}
.con1{
    width: 100%;
    height: 100%;
    background-color: ;
}
.con2{
    width: 500px;
    height: 100%;
    background-color:   ;
    position: relative;

    margin-left: 200px;
    padding: 20px;
    border-radius: 10px;
}
        
.tbl {
    border-collapse: collapse;
    width: 100%;
}

.th, .td {
    text-align: left;
    padding: 8px;
}

.tr:nth-child(even){background-color: #f2f2f2}

.th {
    background-color: #41a3b1;
    color: white;
}
    </style>
    <!--date picker jquery -->

     <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
 $(function(){
        $("#date2").datepicker({ dateFormat: 'yy-mm-dd' });
        $("#date1").datepicker({ dateFormat: 'yy-mm-dd' }).bind("change",function(){
            var minValue = $(this).val();
            minValue = $.datepicker.parseDate("yy-mm-dd", minValue);
            minValue.setDate(minValue.getDate()+1);
            $("#date2").datepicker( "option", "minDate", minValue );
        })
    });
  
  </script>
<!--date picker jquery -->
</head>
<body>
<nav class="navi_menu" id="mySidenav">
  <?php include '../details.php'; ?>
  <a href="../manager/indexmanager.php" class="navi"><img src="../img/home.png" class="image">&nbsp;&nbsp;HOME</a>
  <a href="supplierpayment.php" class="navi"><img src="../img/payments.png" class="image">&nbsp;&nbsp;SUPPLIER PAYMENT</a>
  <a href="suppliertype.php" class="navi"><img src="../img/supplier.png" class="image">&nbsp;&nbsp;SUPPLIER/TYPE DETAILES</a>
  <a href="packages.php" class="active"><img src="../img/package.png" class="image">&nbsp;&nbsp;PACKAGES</a>
    <a href="../manager/moq.php" class="navi"><img src="../img/updateprice.png" class="image">&nbsp;&nbsp;ADD/CHANGE MOQ</a>
</nav>
<div class="menu2" align="right" style="margin-bottom: 100px;">
    <div class="menu2in">
      <a href="../signout.php" class="myButton">Log Out</a>
    </div>
  </div>
  <div class="con1" align="center">
<div class="con2">

<?php
                require "dbcon/dbcon.php";
                 if (isset($_POST['insert'])) {
                     
                     
                                $date1 = $_POST['date1'];
                            
                     
                                $date2 = $_POST['date2'];
                            
                $sql = "SELECT packname, COUNT(res_id),total FROM reservations WHERE dildate > '$date1' AND dildate < '$date2' GROUP BY packname";
                $query=(mysqli_query($conn,$sql));
?>



<table class="tbl">
    <tr class="tr">
        <th class="th">Package</th>
        <th class="th">No of Orders</th>
        <th class="th">Total Amount</th>
    </tr> 
<?php
    while ($row = mysqli_fetch_assoc($query)){
         echo "<tr class='tr'>";
        
            echo "<td class='td'>";
            echo $row['packname'];
            echo "</td>";

            echo "<td class='td'>";
            echo $row['COUNT(res_id)'];
            echo "</td>";


           echo "<td class='td'>";
            echo $row['total'];
            echo "</td>";

         echo "</tr>";}
?>
</table>
<?php
    }
?>
<br>
<div id="id">
                <form method="post" action="packages.php">
                <table id="tb10">
                    <tr>
                        <th colspan="2" align="left"><b style="color:white; font-size:24px; text-shadow:2px 2px 2px gray;">Packages</b></th> 
                    </tr>
                    <tr>
                    <td><label for="date1">From</label></td>
                    <td><input type="text" name="date1" id="date1" placeholder="From" required></td>
                    </tr> 
                    <tr>
                    <td><label for="date2">To</label></td>
                    <td><input type="text" name="date2" id="date2" placeholder="To" required></td>
                    </tr>
                    <tr>
                    <td colspan="2" align="center">
                    <input type="submit" value="Search" name="insert">
                    </td>
                    </tr>

                </table>
            
                </form>
                </div>  
</div>
</div>
</body>
</html>