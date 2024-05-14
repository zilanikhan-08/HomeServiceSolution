<?php
require_once(__DIR__ . '/../../model/db.php');
$conn = dbConnection();

function calculatePercentage($value, $total) {
    return ($value / $total) * 100;
}

$query = "SELECT * FROM flatservice"; 
$data = mysqli_query($conn, $query);
$flat = mysqli_num_rows($data);

$query1 = "SELECT * FROM `garageservice`"; 
$data1 = mysqli_query($conn, $query1);
$garage = mysqli_num_rows($data1);

$query2 = "SELECT * FROM `moverservice`"; 
$data2 = mysqli_query($conn, $query2);
$movers = mysqli_num_rows($data2);

$query3 = "SELECT * FROM `housemaid`"; 
$data3 = mysqli_query($conn, $query3);
$maids = mysqli_num_rows($data3);

$total = $flat + $garage + $movers + $maids;

$percentage_flat = calculatePercentage($flat, $total);
$percentage_garage = calculatePercentage($garage, $total);
$percentage_movers = calculatePercentage($movers, $total);
$percentage_maids = calculatePercentage($maids, $total);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pie Chart</title>
<style>
    .pie-container {
        width: 400px;
        height: 400px;
        position: relative;
        margin: 50px auto; /* Centers the container */
    }

    .pie-chart {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background-image: conic-gradient(
            #3498db <?php echo $percentage_flat; ?>%,
            #2ecc71 <?php echo $percentage_flat; ?>% <?php echo $percentage_flat + $percentage_garage; ?>%,
            #e74c3c <?php echo $percentage_flat + $percentage_garage; ?>% <?php echo $percentage_flat + $percentage_garage + $percentage_movers; ?>%,
            #9b59b6 <?php echo $percentage_flat + $percentage_garage + $percentage_movers; ?>% <?php echo $percentage_flat + $percentage_garage + $percentage_movers + $percentage_maids; ?>%
        );
    }

    .legend {
        width: 100%;
        padding: 10px;
        background-color: #f2f2f2;
        text-align: left;
    }

    .legend-item {
        margin-bottom: 5px;
    }

    .legend-item span {
        display: inline-block;
        width: 20px;
        height: 20px;
        margin-right: 10px;
    }

    .blue { background-color: #3498db; }
    .green { background-color: #2ecc71; }
    .red { background-color: #e74c3c; }
    .purple { background-color: #9b59b6; }
</style>
</head>
<body>

<h1 style="text-align: center;">Service Usage Statistics</h1>

<div class="pie-container">
    <div class="pie-chart"></div>
</div>

<div class="legend">
    <div class="legend-item">
        <span class="blue"></span> Flat Service
    </div>
    <div class="legend-item">
        <span class="green"></span> Garage Service
    </div>
    <div class="legend-item">
        <span class="red"></span> Movers Service
    </div>
    <div class="legend-item">
        <span class="purple"></span> Maids Service
    </div>
</div>

</body>
</html>
