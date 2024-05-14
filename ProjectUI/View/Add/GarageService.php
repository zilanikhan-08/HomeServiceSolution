<?php
require_once(__DIR__ . '/../../model/db.php');

if (!isset($_COOKIE['flag'])) {
    header('location: ../Auth/Login.php');
}

$query = "SELECT * FROM `garageservice` ORDER BY S_ID DESC LIMIT 1";

$con = dbConnection();

$data = mysqli_query($con, $query);
$info = mysqli_fetch_assoc($data);
$S_ID = $info['S_ID'] + 1;
?>

<html>
<head>
    <title>Add Garage Service</title>
    <link rel="stylesheet" type="text/css" href="../css/form.css">
</head>
<body>
    <table border="1" align="center">
        <tr>
            <td colspan="3" align="left"><img src="1.png" alt="Logo"></td>
            <td align="right"><a href="../controller/Auth/Logout.php">Logout |</a></td>
        </tr>
        <tr>
            <td colspan="3" align="left">
                <form method="get" action="" enctype="">
                    <div>
                        <div class="button"><a href="Profile.php">Profile</a></div><br>
                        <div class="button"><a href="../Dashboard.php">Home</a></div><br>
                        <div class="button"><a href="FlatService.php">Flat Services</a></div><br>
                        <div class="button"><a href="GarageService.php">Garage Services</a></div><br>
                        <div class="button"><a href="MoverService.php">Movers Services</a></div><br>
                        <div class="button"><a href="HouseMaid.php">House Maid Services</a></div><br>
                    </div>
                </form>
            </td>
            <td colspan="6">
                <form enctype="">
                    <fieldset>
                        <legend><b>Add New Garage Service</b></legend>
                        <h3 id="invalid_text"></h3>
                        ServiceID: <input type="text" id="ServiceID" value="<?php echo $S_ID ?>" /><br><br>
                        Service Type: Garage<br><br>
                        Location: <input type="text" id="garageLocation" name="garageLocation" value="" /><br>
                        Rent: <input type="text" id="garageRent" name="garageRent" value="" /><br>
                        <hr>
                        <input type="button" value="Add" class="btn" onclick="handleAddGarage()">
                    </fieldset>
                </form>
            </td>
        </tr>
        <tr>
            <td colspan="9" align="center" class="footer">
                <h6>Copyright @ 2017</h6>
            </td>
        </tr>
    </table>
    <script>
        function handleAddGarage() {
            let invalid_text = document.getElementById('invalid_text');
            let current_ServiceID = document.getElementById('ServiceID').value;
            let current_Location = document.getElementById('garageLocation').value;
            let current_Rent = document.getElementById('garageRent').value;
            if (current_Location === "") {
                invalid_text.innerHTML = "Please insert Location";
                invalid_text.style.color = '#fa3757';
            } else if (current_Rent === "") {
                invalid_text.innerHTML = "Please insert Rent";
                invalid_text.style.color = '#fa3757';
            } else if (current_ServiceID === "") {
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
                xhttp.open("POST", '../../controller/Add/addGarage.php', true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        let garage_response = this.responseText;
                        console.log('Response is:', garage_response);
                        if (garage_response.trim() === "Successfully_Added") {
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
