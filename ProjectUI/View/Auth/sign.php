<?php

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Document 2</title> 
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
<div class="wrapper">  

<!-- <form method="post" action="../Controller/registerController.php">   -->
<form >  
	
	<h1>Sign Up</h1>
	<h3 id="invalid_signup"></h3>
	<div class="input-box-signup">
		<input type="text" id="username2" placeholder="username" required>
	</div>  
	
	<div class ="input-box-signup"> 
 <input type="password" id="password2" placeholder="password" required>
	</div> 
	<div class ="input-box-signup"> 
 <input type="password" id="confirm_password" placeholder="confirm password" required>
	</div> 


	<button class="btn" onclick="handleSignUp()">Sign Up</button>

</div>


</form>
<script>
            function handleSignUp(){
                // let username = document.getElementById('username').value;
                let invalid_text = document.getElementById('invalid_signup');
                let current_username = document.getElementById('username2').value;
                let current_password = document.getElementById('password2').value;
                let confirm_password = document.getElementById('confirm_password').value;
                if(current_username === ""){
                    invalid_text.innerHTML = "Please insert Username";
                    invalid_text.style.color = '#fa3757';
                }
                else if(current_password === "")
                {
                    invalid_text.innerHTML = "Please insert Password";
                    invalid_text.style.color = '#fa3757';
                }
				else if(confirm_password === "")
                {
                    invalid_text.innerHTML = "Please confirm the Password";
                    invalid_text.style.color = '#fa3757';
                }
				// else if(current_password !== confirm_password)
				// {
				// 	invalid_text.innerHTML = "Password and Confirm Password don't match";
				// 	invalid_text.style.color = "#fa3757";
				// }
                else
                {
                       // Creating a new XMLHttpRequest object
                let xhttp2 = new XMLHttpRequest();
                console.log('here');
                // Configuring the request
                xhttp2.open("POST", 'C:\\xampp\\htdocs\\test\\ProjectUI\\controller\\Auth\\registerController.php', true);
                xhttp2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                console.log('here2');

                // Defining what happens on successful data submission
                xhttp2.onreadystatechange = function (){
					
					if(this.readyState == 4 && this.status == 200){
						console.log('here3');
                        // Parsing the response
                        let response = this.responseText.trim();
                        console.log('response is ',response);
						// console.log('response is ',response);
                        
                        if(response === 2) {
                            invalid_text.innerHTML = "User already exists";
                            invalid_text.style.color = '#4841d1';

                        } else if(response === 1) {
                            window.location.href = 'http://localhost/test/ProjectUI/View/Auth/Login.php';
                        } else {
                            invalid_text.innerHTML = "Login Failed";
                            invalid_text.style.color = "#fa3757";

                        }
                    }
                };

                // Sending the request with the username and password
                xhttp2.send("username=" + current_username + "&password=" + current_password);
				console.log('here4');
                    }
                    }
    </script>
</body>
</html>