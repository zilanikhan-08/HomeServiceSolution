<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
    <form method="POST" action="../../controller/Auth/Verification.php" enctype="">
        <fieldset align="center" class="wrapper"> <!-- Added class="wrapper" -->
            <legend align="center"></legend>
            <h1>FORGOT_PASSWORD</h1>
            Email: <input type="text" name="email" value="" class="input-box"><br>
            <input type="submit" name="submit" value="Next" class="btn">
            <a href="ChangePassword.php" class="btn"></a> <!-- Added class="btn" -->
        </fieldset>
    </form>
</body>
</html>
