<?php

    if(!isset($_COOKIE['flag'])){
    header('location: ../../View/Auth/Login.php');
    }
   
    require_once('../../model/Add/Insert_HouseMaid.php');


    $data = $_REQUEST['data'];
    $maid = json_decode($data);
    $Location = $maid -> Location;
    $Salary = $maid -> Salary;
    $S_ID = $maid -> S_ID;

       $status= Insert($S_ID,$Location, $Salary);
       if($status==1)
       {
           echo "Successfully_Added";
       }
    
    

?>