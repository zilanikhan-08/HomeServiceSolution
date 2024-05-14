<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
    <form method="POST" action="" enctype="">
        <fieldset align="center" class="wrapper"> <!-- Added class="wrapper" -->
            <legend align="center"></legend>
            <h1>CHANGE_PASSWORD</h1>
            New Password: <input type="text" name="new" value="" class="input-box"><br> <!-- Added class="input-box" -->
            Confirm Password: <input type="password" name="confirm" value="" class="input-box"><br> <!-- Added class="input-box" -->
            
            <input type="submit" name="submit" value="OK" class="btn"> <!-- Added class="btn" -->
        </fieldset>
    </form>
</body>
</html>

<?php

$email = $_GET['email'];
if(isset($_POST['submit'])) {
    $new = $_POST["new"];
    $confirm = $_POST["confirm"];
    
    header("Location: ../../controller/Auth/password_Authentication.php?email=$email&new=$new&confirm=$confirm");

}
?>
