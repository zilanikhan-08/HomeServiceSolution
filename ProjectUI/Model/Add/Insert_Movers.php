
<?php 

require_once(__DIR__ . '/../db.php');

function Insert($S_ID, $Location, $Salary){
    $query = "INSERT INTO moverservice (S_ID, Location, Salary) VALUES ( '$S_ID','$Location', '$Salary')";
    $con = dbConnection();
    $data = mysqli_query($con, $query);
    $count= mysqli_affected_rows($con);
    if($count==1)
    {
        return 1;
    } 
}
?>