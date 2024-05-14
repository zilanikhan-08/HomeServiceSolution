
<?php 

require_once(__DIR__ . '/../db.php');

function Update($S_ID, $Location, $FlatSize, $Rent){
    
    $query = "UPDATE `flatservice` SET `Location`='$Location',`FlatSize`='$FlatSize',`Rent`='$Rent' WHERE `S_ID`='$S_ID'"; 
    $con = dbConnection();
    $data = mysqli_query($con, $query);
}
?>