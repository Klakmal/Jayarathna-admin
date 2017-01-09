<?php
                require "dbcon/dbcon.php";
                $error=FALSE;
                $date1err = $date2err =  "";
                 if (isset($_POST['insert'])) {
                     
                     if(empty($_POST['date1'])){ 
                                $date1err = "</br>* ";
                                $error = TRUE;
                            }else{
                                $date1 = $_POST['date1'];
                            }
                     if(empty($_POST['date2'])){ 
                                $date2err = "</br>* ";
                                $error = TRUE;
                            }else{
                                $date2 = $_POST['date2'];
                            }


    $result = mysqli_query($conn, "SELECT COUNT(res_id) FROM reservations WHERE reservations.date > '$date1' AND reservations.date < '$date2' AND packname='VIP PLATINUM PACKAGE'");
    $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
    $platinum = $result[0] ["COUNT(res_id)"];

    $result = mysqli_query($conn, "SELECT COUNT(res_id) FROM reservations WHERE reservations.date > '$date1' AND reservations.date < '$date2' AND packname='VIP GOLD PACKAGE'");
    $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
    $gold = $result[0] ["COUNT(res_id)"];

    $result = mysqli_query($conn, "SELECT COUNT(res_id) FROM reservations WHERE reservations.date > '$date1' AND reservations.date < '$date2' AND packname='VIP SILVER PACKAGE'");
    $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
    $silver = $result[0] ["COUNT(res_id)"];

    $result = mysqli_query($conn, "SELECT COUNT(res_id) FROM reservations WHERE reservations.date > '$date1' AND reservations.date < '$date2' AND packname='VIP BRONZE PACKAGE'");
    $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
    $bronze = $result[0] ["COUNT(res_id)"];

    $result = mysqli_query($conn, "SELECT COUNT(res_id) FROM reservations WHERE reservations.date > '$date1' AND reservations.date < '$date2' AND packname='DELUXE PACKAGE'");
    $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
    $deluxe = $result[0] ["COUNT(res_id)"];
}

?>



<html>
<head>
   <title>Package Reservation</title>

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="./dist/css/bootstrap.min.css"></script>
    <script src="./highcharts.js" ></script>
</head>
<body>
</br>



<div style="position: fixed; width: 700px; height: 500px; margin-top: 40px;margin-left: 120px">
    <div>
        <div style="text-align: center" id="mychart1"></div>
    </div>
</div>

<div id="id">
                <form method="post" action="check2.php">
                <table id="tb10">
                    <tr>
                    <th colspan="2" align="left"><b style="color:white; font-size:24px; text-shadow:2px 2px 2px gray;">Funeral Reservation</b></th> 
                    </tr>
                    <tr>
                    <td><label for="date1">From</label><span class="error"><?php echo $date1err;?></span></td>
                    <td><input type="text" name="date1" placeholder="From"></td>
                    </tr> 
                    <tr>
                    <td><label for="date2">To</label><span class="error"><?php echo $date2err;?></span></td>
                    <td><input type="text" name="date2" placeholder="To"></td>
                    </tr>
                    <tr>
                    <td colspan="2" align="center">
                    <input type="submit" value="Search" name="insert">
                    </td>
                    </tr>

                </table>
            
                </form>
                </div>
</body>
</html>


<script type="text/javascript">

    function createGraph(platinum,gold,silver,bronze,deluxe){
        $('#mychart1').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Package Reservaion'
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Number of reservations'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.0f}'
                    }
                }
            },

            tooltip: {
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f}</b> <br/>'
            },

            series: [{
                colorByPoint: true,
                data: [{name: 'Platinum',
                        y:platinum,
                },{
                    name: 'Gold',
                    y:gold,
                }, {
                    name: 'Silver',
                    y:silver ,
                },{
                    name: 'Bronze',
                    y:bronze,
                },{
                    name: 'Deluxe',
                    y:deluxe,
                }]
            }]
        });

    }
    var platinum = parseInt('<?php echo $platinum; ?>');
    var gold = parseInt('<?php echo $gold; ?>');
    var silver = parseInt('<?php echo $silver; ?>');
    var bronze = parseInt('<?php echo $bronze; ?>');
    var deluxe = parseInt('<?php echo $deluxe; ?>');
    createGraph(platinum,gold,silver,bronze,deluxe);

</script>
