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
    <title>Dashboard</title> 
    <link rel="stylesheet" href="index1.css"> 
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body> 
    <div class="container">
        <!-- <h1 align="center">Dashboard</h1> -->
        <table border="1" align="center" class="fill-screen">
            <tr>
                <td colspan="2" align="left">
                    <div class="wrapper"> 
                        <form method="get" action="" enctype="">
                            <ul> 
                                <div class="btn1"> 
                                     <li><a href="Profile.php">Profile</a>  <i class='bx bx-user'></i> </li> 
                             </div>
                             <br>
                               <div class="btn2">   <li><a href="Stats/Admin_Stats.php">Current Stats</a> <i class='bx bx-stats'></i> </li><br> 
                            
                            </div>
                             <br>
                            <div class="btn3">    
                            <li><a href="../controller/Auth/Logout.php">Logout</a> <i class='bx bx-log-out' ></i>  </li><br>
                       
                            </div>
                               
                            </ul>  
                        </form>
                    </div>    
                    </td>
                <td colspan="6">
                    <form method="get" action="" enctype="">
                        <ul>
                        </ul>
                    </form> 
                </td>
            </tr>
        </table>  
    </div>
</body>
</html>
