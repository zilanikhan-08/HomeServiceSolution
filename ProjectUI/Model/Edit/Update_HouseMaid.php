<?php 

require_once(__DIR__ . '/../db.php');

function Update($S_ID, $Location, $Salary){
    
    $query = "UPDATE housemaid SET `Location`='$Location',`Salary`='$Salary' WHERE `S_ID`='$S_ID'";
    $con = dbConnection();   
    $data = mysqli_query($con, $query);
    // $count= mysqli_affected_rows($con);
    // if($count==1)
    // {
    //     return 1;
    // } 
}
?>