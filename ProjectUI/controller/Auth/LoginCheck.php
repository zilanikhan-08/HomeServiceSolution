<?php
require_once('../../model/userModel.php');

//$username = $_POST['username'];
// $password = $_POST['password'];

$data = $_REQUEST['data'];
$user = json_decode($data);
// $user = ['id'=>1, 'username'=> 'alamin', 'email'=> 'alamin@aiub.edu'];
$username = $user -> username;
// $username = $_POST['username'];
$password = $user -> password;
// $password = $_POST['password'];
// $json = json_encode($user);

$status = login($username, $password);

if($status == 2) {
    setcookie('flag', 'true', time()+3600, '/');
    // echo "admin";
    echo json_encode("admin");
    // header("location: ../../View/Dashboard_Admin.php"); // No need to redirect here, do it in JavaScript
} else if($status == 1) {
    setcookie('flag', 'true', time()+3600, '/');
    // echo "other";
    echo json_encode("other");
    // header("location: ../../View/Dashboard.php"); // No need to redirect here, do it in JavaScript
} else {
    // echo "invalid";
    echo json_encode("invalid");
}
?>