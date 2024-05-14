<?php 

require_once(__DIR__ . '/../db.php');

function Delete($S_ID){
    
    $query = "DELETE FROM moverservice WHERE S_ID = '$S_ID'"; 
    $con = dbConnection();
    $data = mysqli_query($con, $query);
}
?>