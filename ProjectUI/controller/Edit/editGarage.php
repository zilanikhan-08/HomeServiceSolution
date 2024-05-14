<?php

if(!isset($_COOKIE['flag']))
{
    header('location: View/Auth/Login.php');
}

    require_once('../../model/Edit/Update_Garage.php');

    $data = $_REQUEST['data'];
    $garage = json_decode($data);
    $Location = $garage -> Location;
    $Rent = $garage -> Rent;
    $S_ID = $garage -> S_ID;

         Update($S_ID, $Location, $Rent );
        echo "Successfully_Added";
        
?>