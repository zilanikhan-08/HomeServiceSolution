<?php

if(!isset($_COOKIE['flag']))
{
    header('location: View/Auth/Login.php');
}

    require_once('../../model/Edit/Update_Flat.php');

    $data = $_REQUEST['data'];
    $flat = json_decode($data);
    $Location = $flat -> Location;
    $FlatSize = $flat -> FlatSize;
    $Rent = $flat -> Rent;
    $S_ID = $flat -> S_ID;

        Update($S_ID, $Location, $FlatSize, $Rent );
        echo json_encode("Successfully_Added");
    

?>