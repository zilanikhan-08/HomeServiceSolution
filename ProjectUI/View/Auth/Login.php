<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
    <table width="100%" height="550" align="center">
        <tr>
            <td>
                <main>
                    <table align="center">                           
                        <!-- <form method="POST" action="../../controller/Auth/LoginCheck.php" enctype=""> -->
                        <form enctype="">
                            <fieldset align="center" class="wrapper">
                                <legend align="center"></legend>
                                <h1>Login</h1>
                                <h3 id="invalid_text"></h3>
                                User Name: <input type="text" id="username" value="" class="input-box"/><br>
                                Password: <input type="password" id="password" value="" class="input-box"><br>
                                <input type="button" value="Sign In" class="btn" onclick="handleSignIn()">
                                <a href="FORGOT_PASSWORD.php" class="forgot-link">Forget Password?</a> <!-- Added class="forgot-link" -->
                            </fieldset>
                        </form>
                    </table>
                </main>
            </td>
        </tr>
    </table>
    <script>
            function handleSignIn(){
                // let username = document.getElementById('username').value;
                let invalid_text = document.getElementById('invalid_text');
                let current_username = document.getElementById('username').value;
                let current_password = document.getElementById('password').value;
                if(current_username === ""){
                    invalid_text.innerHTML = "Please insert Username";
                    invalid_text.style.color = '#fa3757';
                }
                else if(current_password === "")
                {
                    invalid_text.innerHTML = "Please insert Password";
                    invalid_text.style.color = '#fa3757';
                }
                else
                {
                    //create a json object
                    let user = {
                    'username': current_username,
                    'password': current_password,
                }

                let data = JSON.stringify(user);
                       // Creating a new XMLHttpRequest object
                let xhttp = new XMLHttpRequest();
                
                // Configuring the request
                xhttp.open("POST", '../../controller/Auth/LoginCheck.php', true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                // Defining what happens on successful data submission
                xhttp.onreadystatechange = function (){
                    // console.log('here');
                    if(this.readyState == 4 && this.status == 200){
                        // Parsing the response
                        let user_response = JSON.parse(this.responseText);
                        let response = user_response.trim();
                        // console.log('response is ',response);
                        
                        if(response === "invalid") {
                            invalid_text.innerHTML = "Sign in failed";
                            invalid_text.style.color = '#fa3757';

                        } else if(response === "admin") {
                            window.location.href = 'http://localhost/test/ProjectUI/View/Dashboard_Admin.php';
                        } else {
                            window.location.href = 'http://localhost/test/ProjectUI/View/Dashboard.php';
                        }
                    }
                };

                // Sending the request with the username and password
                xhttp.send("data=" + data);
                    }
                    }
    </script>
</body>
</html>
