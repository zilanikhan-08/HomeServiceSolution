<?php
include("db.php");
error_reporting(0);

function calculateMean($numbers) {
    $count = count($numbers);
    if ($count > 0) {
        $sum = array_sum($numbers);
        return $sum / $count;
    } else {
        return "Undefined"; 
    }
}

$query = "SELECT Amount FROM `transaction`";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {

    $amounts = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $amounts[] = $row['Amount'];
    }

    // Debug 
    echo "Fetched amounts: ";
    print_r($amounts);

    $mean = calculateMean($amounts);

    echo "The mean of the amounts is: {$mean}";
} else {
    echo "No data found in the transaction table.";
}

?>
