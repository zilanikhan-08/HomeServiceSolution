<?php 
    if(!isset($_COOKIE['flag'])){
        header('location: Auth/Login.php');
    }
?>
<html>
<head>
    <link rel="stylesheet" href="../css/addservice.css">
</head>
<body>
    <table border="1" align="center">
        <tr>
            <td colspan="3" align="left"><img src="1.png"></td>
            <td align="right"><a href="../../controller/Auth/Logout.php">Logout  <-] </a></td>
        </tr>
        <tr>
            <td colspan="3" align="left">
                <form method="get" action="" enctype="">
                    <div class="button"><a href="Profile.php">Profile</a></div><br>
                    <div class="button"><a href="../Dashboard.php">Home</a></div><br>
                    <div class="button"><a href="../Edit/EditServices.php">Edit Service</a></div>
                </form>
            </td>
            <td colspan="6">
                <form method="post" action="" enctype="">
                    <fieldset>
                        <legend><b>Add New Service</b></legend>
                        <div class="button"><a href="FlatService.php">Add Flat Services</a></div><br>
                        <div class="button"><a href="GarageService.php">Add Garage Services</a></div><br>
                        <div class="button"><a href="MoverService.php">Add Movers Services</a></div><br>
                        <div class="button"><a href="HouseMaid.php">Add House Maid Services</a></div>
                    </fieldset>
                </form>
            </td>
        </tr>
        <tr>
            <td colspan="9" align="center">
                <h6>Copyright @ 2017</h6><br>
            </td>
        </tr>
    </table>
</body>
</html>
