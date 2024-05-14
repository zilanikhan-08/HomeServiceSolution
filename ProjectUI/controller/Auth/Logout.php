<?php 

    setcookie('flag', 'true', time()-10, '/');
    header('location: ../../View/Auth/Login.php');
?>