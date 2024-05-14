<?php
require_once('../../ProjectUI/Model/userModel.php');
$username=$_POST['username'];
$password=$_POST['password']; 
$status = createUser($username,$password);
echo $status;
// echo "hi";
?>