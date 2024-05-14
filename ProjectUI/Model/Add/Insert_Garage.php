
<?php 

require_once(__DIR__ . '/../db.php');

function Insert($S_ID, $Location, $Rent){

    $query = "INSERT INTO garageservice (S_ID, Location, Rent) VALUES ( '$S_ID','$Location', '$Rent')"; 
    $con = dbConnection();
    $data = mysqli_query($con, $query);
}
?>