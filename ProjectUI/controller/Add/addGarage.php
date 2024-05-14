<?php

if(!isset($_COOKIE['flag']))
{
    header('location: View/Auth/Login.php');
}

    require_once('../../model/Add/Insert_Garage.php');
    

    $data = $_REQUEST['data'];
    $garage = json_decode($data);
    $Location = $garage -> Location;
    $Rent = $garage -> Rent;
    $S_ID = $garage -> S_ID;
    
    
        Insert($S_ID, $Location, $Rent );
        echo "Successfully_Added";
    

?>