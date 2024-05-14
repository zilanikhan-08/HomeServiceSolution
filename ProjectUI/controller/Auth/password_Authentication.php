<?php

require_once('../../model/userModel.php');

    $email = $_GET['email'];
    $new = $_GET['new'];
    $confirm = $_GET['confirm'];
    
    if($new == "" || $confirm == ""){
        echo "Null username/password";
    }
    
    else if($new == $confirm)
    {  
        $stat = changePassword($confirm, $email);
        if($stat==1)
        {  
            header("location: ../../View/Auth/Login.php");
        }  
    
            
        else 
        {
            echo "Passwords do not match.";
        }
    }

?>