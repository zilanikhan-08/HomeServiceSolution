
<?php 
require_once('db.php');

function login($username, $password){
    $con = dbConnection();
    $sql = "SELECT * FROM serviceprovider WHERE Name = '{$username}' and Password = '{$password}'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);


    if($count == 1) 
    {
        return 1;
    }
    
    else
    {
        $sql = "SELECT * FROM `admin` WHERE Name = '{$username}' and Password = '{$password}'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);

        if($count == 1)
        {
            return 2;
        }
        else
        {           
            return 0;
        }
    }
}


function createUser($user,$password){
    $con = dbConnection();
    $sql2="SELECT * FROM serviceprovider WHERE Name  = '$user'";
	$res3= mysqli_query($con,$sql2); 
	$count= mysqli_num_rows($res3); 
	if ($count>0){
		echo 2;
	}
    else { 
   
		// $sql1="insert into serviceprovider (name,password) values ('$id','$pass')";
        $sql1 = "INSERT INTO `serviceprovider`(`Name`,`Password`) VALUES ('$user','$password')";
	$res= mysqli_query($con,$sql1);

	if(mysqli_affected_rows($con) > 0)
	{
		echo 1;
	} 


	else
	{
		echo 0;
	} 
} 
    // $sql = "insert into users values('', '{$user['username']}', '{$user['email']}', '{$user['password']}')";

    // if(mysqli_query($con, $sql)) {
    //     return true;
    // }else{
    //     return false;
    // }
}

function updateUser($user){

}

function getAllUser(){
    $con = dbConnection();
    $sql = "select * from users";
    $result = mysqli_query($con, $sql);
    $users= [];
    while($row = mysqli_fetch_assoc($result)){
        array_push($users, $row);
    }

    return $users;
}

function Verify_ByEmail($email){
    $sql = "SELECT * FROM serviceprovider WHERE Email  = '{$email}'";
    $con = dbConnection();

    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

    if($count == 1)
    {
        return 1;
    }
    else
    {
    $sql1 = "SELECT * FROM `admin` WHERE Email  = '{$email}'";
    $result1 = mysqli_query($conn, $sql1);
    $count1 = mysqli_num_rows($result1);

    if($count1 == 1)
    {
        return 1;
    }
    else
    {
        return 0;
    }
    }

}

function changePassword($confirm, $email)
{
    $sql = "UPDATE `serviceprovider` SET `Password`='$confirm' WHERE Email = '$email'";
    $con = dbConnection();
            $result = mysqli_query($con, $sql);
            if(mysqli_affected_rows($con) > 0) {
                return 1;
                exit();
            }
            
            // Update password for admin
            $query = "UPDATE `admin` SET `Password`='$confirm' WHERE Email = '$email'";
            $result = mysqli_query($con, $query);
            if(mysqli_affected_rows($con) > 0) {
                return 1;
                exit();
            }
}

function deleteUser ($id){

}

?>
