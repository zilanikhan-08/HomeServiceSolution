<?php 

    if(!isset($_COOKIE['flag'])){
        header('location: Auth/Login.php');
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title> 
    <link rel="stylesheet" href="css/Dashboard.css"> 
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>  
<br><br><br><br><br><br><br><br><br><br><br><br>
    <table border="1" align="center">
   <tr></tr>
        <tr>
            <td colspan="3" align="left">
                <form method="get" action="" enctype="">
                    <ul> 
                        <div class="button"><a href="Profile.php">Profile</a></div> <br><br><br><br>
                        <div class="button"><a href="../controller/Auth/Logout.php">Logout <-]</a></div>
                        </div>
                    </ul>
                </form>
            </td>
            <td colspan="3" align="left">
                <form method="get" action="" enctype="">
                    <ul>
                        <div class="button"><a href="Add/AddServices.php">Add Service</a></div><br><br><br><br>
                        <div class="button"><a href="Edit/EditServices.php">Edit Services</a></div><br>
                    </ul>
                </form>
            </td>
       </tr>  
    </table>
</body>
</html>
