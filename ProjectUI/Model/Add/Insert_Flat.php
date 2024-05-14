
<?php 

require_once(__DIR__ . '/../db.php');

function Insert($S_ID, $Location, $FlatSize, $Rent){
    $con = dbConnection();

    $query = "INSERT INTO FlatService (S_ID, Location, FlatSize, Rent) VALUES ('$S_ID','$Location', '$FlatSize', '$Rent')";
    $data = mysqli_query($con, $query);
}
?>