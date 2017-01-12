<?php
require "dbcon/dbcon.php";

    $result = mysqli_query($conn, "SELECT COUNT(id.id) FROM id, type WHERE id.timeout > CURDATE() AND id.no = type.no AND type.type = 'platinum'");
    $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
    $platinum = $result[0] ["COUNT(id.id)"];

    $result = mysqli_query($conn, "SELECT COUNT(id.id) FROM id, type WHERE id.timeout > CURDATE() AND id.no = type.no AND type.type = 'gold'");
    $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
    $gold = $result[0] ["COUNT(id.id)"];

    $result = mysqli_query($conn, "SELECT COUNT(id.id) FROM id, type WHERE id.timeout > CURDATE() AND id.no = type.no AND type.type = 'silver'");
    $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
    $silver = $result[0] ["COUNT(id.id)"];

    $result = mysqli_query($conn, "SELECT COUNT(id.id) FROM id, type WHERE id.timeout > CURDATE() AND id.no = type.no AND type.type = 'bronze'");
    $result = mysqli_fetch_all($result,MYSQLI_ASSOC);
    $bronze = $result[0] ["COUNT(id.id)"];



?>


<html>
<head>
   <title>Current Coffin Level Chart</title>

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

</body>
</html>


<script type="text/javascript">
    
    function createGraph(platinum,gold,silver,bronze){
        $('#mychart1').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Current Coffin Levels'
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Number of Coffins'
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
                }]
            }]
        });

    }
    var platinum = parseInt('<?php echo $platinum; ?>');
    var gold = parseInt('<?php echo $gold; ?>');
    var silver = parseInt('<?php echo $silver; ?>');
    var bronze = parseInt('<?php echo $bronze; ?>');
    createGraph(platinum,gold,silver,bronze);

</script>
