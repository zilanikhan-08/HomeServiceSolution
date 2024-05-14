<?php
    

    require_once('../../model/userModel.php');

if(isset($_POST['submit']))
{    
    $email = $_POST["email"];
    
    if($email == ""){
        echo "Please enter email for verification";
    }
    else
    {
        $status = Verify_ByEmail($email);
        if($status==1) 
        {
            header("Location: ../../View/Auth/ChangePassword.php?email=$email");
        }

    }
    
}
?>