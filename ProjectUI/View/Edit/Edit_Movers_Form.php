<?php 

if(!isset($_COOKIE['flag'])){
    header('location: ../Auth/Login.php');
}

require_once(__DIR__ . '/../../model/db.php');
$id = $_GET['id'];

$query = "SELECT * FROM moverservice WHERE S_ID = '$id'"; 
    
$con = dbConnection();

$data = mysqli_query($con,$query);
$total = mysqli_num_rows($data);
$info = mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Movers Service</title>
    <link rel="stylesheet" type="text/css" href="../css/form.css">
</head>
<body>
    <table border="1" align="center">
        <tr>
            <td colspan="3" align="left"></td>
            <td align="right"><a href="../controller/Auth/Logout.php">Logout |</a></td>
        </tr>
        <tr>
            <td colspan="3" align="left">
                <div class="button"><a href="Profile.php">Profile</a></div><br>
                <div class="button"><a href="../Dashboard.php">Home</a></div><br>
                <div class="button"><a href="EditServices.php">Edit Services</a></div><br>
                <div class="button"><a href="EditMoverService.php">Edit Movers</a></div><br>
            </td>
            <td colspan="6">
                <form enctype="">
                    <fieldset>
                        <legend><b>Edit Movers Service</b></legend>
                        <h3 id="invalid_text"></h3>
                        ServiceID: <input type="text" id="ServiceID" value="<?php echo $info['S_ID'] ?>" /><br>
                        Service Type: Movers<br>
                        Location: <input type="text" id="Location" value="<?php echo $info['Location'] ?>" /><br>
                        Salary: <input type="text" id="Salary" value="<?php echo $info['Salary'] ?>" /><br>
                        <hr>
                        <input type="button" value="Update" class="btn" onclick="handleEditMover()">
                    </fieldset>
                </form>
            </td>
        </tr>
        <tr>
            <td colspan="9" align="center" class="footer">
                <h6>Copyright @ 2017</h6><br>
            </td>
        </tr>
    </table>
    <script>
        function handleEditMover() {
            let invalid_text = document.getElementById('invalid_text');
            let current_ServiceID = document.getElementById('ServiceID').value;
            let current_Location = document.getElementById('Location').value;
            let current_Salary = document.getElementById('Salary').value;
            if(current_Location === "") {
                invalid_text.innerHTML = "Please insert Location";
                invalid_text.style.color = '#fa3757';
            } else if(current_Salary === "") {
                invalid_text.innerHTML = "Please insert Salary";
                invalid_text.style.color = '#fa3757';
            } else if(current_ServiceID === "") {
                invalid_text.innerHTML = "Please insert Service ID";
                invalid_text.style.color = '#fa3757';
            } else {
                let mover = {
                    'Location': current_Location,
                    'Salary': current_Salary,
                    'S_ID': current_ServiceID,
                };

                let data = JSON.stringify(mover);
                let xhttp = new XMLHttpRequest();
                xhttp.open("POST", '../../controller/Edit/editMovers.php', true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.onreadystatechange = function () {
                    if(this.readyState == 4 && this.status == 200) {
                        let mover_response = this.responseText;
                        console.log('Response is:', mover_response);
                        if(mover_response.trim() === "Successfully_Added") {
                            console.log('Redirecting...');
                            window.location.href = "http://localhost/test/ProjectUI/View/Edit/EditMoverService.php";
                        } else {
                            console.log('Unexpected response:', mover_response);
                        }
                    }
                };
                xhttp.send("data=" + data);
            }
        }
    </script>
</body>
</html>
