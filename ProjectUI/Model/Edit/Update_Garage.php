<?php 

require_once(__DIR__ . '/../db.php');

function Update($S_ID, $Location, $Rent){
    
    $query = "UPDATE garageservice SET `Location`='$Location',`Rent`='$Rent' WHERE `S_ID`='$S_ID'"; 
    $con = dbConnection();   
    $data = mysqli_query($con, $query);
}
?>