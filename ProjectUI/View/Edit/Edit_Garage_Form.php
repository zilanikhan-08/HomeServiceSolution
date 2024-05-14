<?php 
if(!isset($_COOKIE['flag'])){
    header('location: ../Auth/Login.php');
}

require_once(__DIR__ . '/../../model/db.php');

$id = $_GET['id'];

$query = "SELECT * FROM garageservice WHERE S_ID = '$id'"; 

$con = dbConnection();

$data = mysqli_query($con, $query);
$info = mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Garage Service</title>
    <link rel="stylesheet" type="text/css" href="../css/form.css">
</head>
<body>
    <table align="center">
        <tr>
            <td colspan="3" align="left"></td>
            <td align="right"><a href="../../controller/Auth/Logout.php">Logout |</a></td>
        </tr>
        <tr>
            <td colspan="3" align="left">
                <div class="button"><a href="Profile.php">Profile</a></div><br>
                <div class="button"><a href="../Dashboard.php">Home</a></div><br>
                <div class="button"><a href="EditServices.php">Edit Services</a></div><br>
                <div class="button"><a href="EditGarageService.php">Edit Garage</a></div><br>
            </td>
            <td colspan="6">
                <form enctype="">
                    <fieldset>
                        <legend><b>Edit Garage Service</b></legend>
                        <h3 id="invalid_text"></h3>
                        ServiceID: <input type="text" id="ServiceID" value="<?php echo $info['S_ID'] ?>" /><br><br>
                        Service Type: Garage<br><br>
                        Location: <input type="text" id="Location" value="<?php echo $info['Location'] ?>" /><br>
                        Rent: <input type="text" id="Rent" value="<?php echo $info['Rent'] ?>" /><br>
                        <hr>
                        <input type="button" value="Update" class="btn" onclick="handleEditGarage()">
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
        function handleEditGarage() {
            let invalid_text = document.getElementById('invalid_text');
            let current_ServiceID = document.getElementById('ServiceID').value.trim();
            let current_Location = document.getElementById('Location').value.trim();
            let current_Rent = document.getElementById('Rent').value.trim();

            if(current_Location === "") {
                invalid_text.innerHTML = "Please insert Location";
                invalid_text.style.color = '#fa3757';
            } else if(current_Rent === "") {
                invalid_text.innerHTML = "Please insert Rent";
                invalid_text.style.color = '#fa3757';
            } else if(current_ServiceID === "") {
                invalid_text.innerHTML = "Please insert Service ID";
                invalid_text.style.color = '#fa3757';
            } else {
                let garage = {
                    'Location': current_Location,
                    'Rent': current_Rent,
                    'S_ID': current_ServiceID,
                };

                let data = JSON.stringify(garage);
                let xhttp = new XMLHttpRequest();
                xhttp.open("POST", '../../controller/Edit/editGarage.php', true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.onreadystatechange = function () {
                    if(this.readyState == 4 && this.status == 200) {
                        let garage_response = this.responseText.trim();
                        console.log('Response is:', garage_response);
                        if(garage_response === "Successfully_Added") {
                            console.log('Redirecting...');
                            window.location.href = "http://localhost/test/ProjectUI/View/Edit/EditGarageService.php";
                        } else {
                            console.log('Unexpected response:', garage_response);
                        }
                    }
                };
                xhttp.send("data=" + data);
            }
        }
    </script>
</body>
</html>
