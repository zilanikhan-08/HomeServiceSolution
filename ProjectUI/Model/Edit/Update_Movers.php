<?php 

require_once(__DIR__ . '/../db.php');

function Update($S_ID, $Location, $Salary){
    
    $query = "UPDATE moverservice SET `Location`='$Location',`Salary`='$Salary' WHERE `S_ID`='$S_ID'";
    $con = dbConnection();   
    $data = mysqli_query($con, $query);
}
?>