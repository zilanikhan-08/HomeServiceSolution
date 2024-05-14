<?php 

if(!isset($_COOKIE['flag'])){
    header('location: ../Auth/Login.php');
}

?>
<html>
    <head>
    <link rel="stylesheet" href="../css/addservice.css">
    </head>
    <body>
    <table border="1" align="center">
                <tr>
                    <td colspan="3" align = "left"><img src="1.png"></td>
                <td align="right"><a href= "../../controller/Auth/Logout.php">Logout |</a></td>
                    
                </tr>
                <tr>
                    <td colspan="3" align = "left">
                    <form method="get" action= "" enctype="">
                            <ul >
                            <div class="button"><a href="Profile.php">Profile</a></div><br>
                            <div class="button"><a href="../Dashboard.php">Home</a></div><br>
                            <div class="button"><a href="../Add/AddServices.php">Add Service </a></div><br>

                            </ul>
                    
                         </form>
                    </td>
                    <td colspan="6">
                        <form method="post" action=""enctype = "">
                            <fieldset>
                                <legend><b>Add New Service</b></legend>
                                <div class="button"> <a href="EditFlat.php">Edit Flat</a></div><br>
                                <div class="button"> <a href="EditGarageService.php">Edit Garage  </a></div><br>  
                                <div class="button"><a href="EditMoverService.php">Edit Movers  </a></div><br>
                                <div class="button"><a href="EditHouseMaid.php">Edit House Maid  </a></div><br>
                                      
                            </fieldset>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td colspan="9" align="center">
                        <h6>Copyright @ 2017</h6></br>
                    </td>
                </tr>
            </table>
    </body>
</html>
