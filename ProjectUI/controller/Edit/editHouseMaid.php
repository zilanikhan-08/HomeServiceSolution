
<?php

if(!isset($_COOKIE['flag']))
{
    header('location: View/Auth/Login.php');
}

    require_once('../../model/Edit/Update_HouseMaid.php');

    $data = $_REQUEST['data'];
    $maid = json_decode($data);
    $Location = $maid -> Location;
    $Salary = $maid -> Salary;
    $S_ID = $maid -> S_ID;

         Update($S_ID, $Location, $Salary );   
        

            echo "Successfully_Added";
    
     
 
?>