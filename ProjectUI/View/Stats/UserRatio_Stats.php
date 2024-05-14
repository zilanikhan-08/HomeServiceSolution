<?php
require_once(__DIR__ . '/../../model/db.php');
$conn = dbConnection();

function calculateRatio($numerator, $denominator) {
    if ($denominator != 0) {
        return $numerator / $denominator;
    } else {
        return "Undefined"; 
    }
}

$query = "SELECT * FROM `customer`"; 
$data = mysqli_query($conn, $query);
$customer = mysqli_num_rows($data);

$query1 = "SELECT * FROM `serviceprovider`"; 
$data1 = mysqli_query($conn, $query1);
$provider = mysqli_num_rows($data1);

$ratio = calculateRatio($provider, $customer);

// Calculate the percentage of provider and customer in the ratio
$provider_percentage = $ratio * 100;
$customer_percentage = (1 - $ratio) * 100;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ratio Bar Graph</title>
<style>
    .bar-container {
        width: 400px;
        margin: 50px auto;
        background-color: #f2f2f2;
        border-radius: 5px;
        overflow: hidden;
    }

    .bar {
        height: 30px;
        display: flex;
    }

    .provider-bar {
        width: <?php echo $provider_percentage; ?>%;
        background-color: #3498db;
    }

    .customer-bar {
        width: <?php echo $customer_percentage; ?>%;
        background-color: #e74c3c;
    }

    .label {
        text-align: center;
        padding: 5px;
        color: #fff;
    }
</style>
</head>
<body>

<div class="bar-container">
    <div class="bar">
        <div class="provider-bar">
            <div class="label"><?php echo "provider" ?></div>
        </div>
        <div class="customer-bar">
            <div class="label"><?php echo "customer" ?></div>
        </div>
    </div>
</div>

</body>
</html>

