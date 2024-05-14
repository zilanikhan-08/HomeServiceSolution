<?php 

if(!isset($_COOKIE['flag'])){
    header('location: ../Auth/Login.php');
}

require_once(__DIR__ . '/../../model/db.php');
$id = $_GET['id'];

$query = "SELECT * FROM flatservice WHERE S_ID = '$id'"; 
    
$con = dbConnection();

$data = mysqli_query($con, $query);
$info = mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Flat Service</title>
    <link rel="stylesheet" type="text/css" href="../css/form.css">
</head>
<body>
    <table border="1" align="center">
        <tr>
            <td colspan="3" align="left"></td>
            <td align="right"><a href="../../controller/Auth/Logout.php">Logout |</a></td>
        </tr>
        <tr>
            <td colspan="3" align="left">
                <form method="get" action="" enctype="">
                    <div>
                        <div class="button"><a href="Profile.php">Profile</a></div><br>
                        <div class="button"><a href="../Dashboard.php">Home</a></div><br>
                        <div class="button"><a href="EditServices.php">Edit Services</a></div><br>
                        <div class="button"><a href="EditFlat.php">Edit Flat</a></div><br>
                    </div>
                </form>
            </td>
            <td colspan="6">
                <form enctype="">
                    <fieldset>
                        <legend><b>Edit Flat Service</b></legend>
                        <h3 id="invalid_text"></h3>
                        ServiceID: <input type="text" id="ServiceID" value="<?php echo $info['S_ID'] ?>" /><br><br>
                        Service Type: Flat<br><br>
                        Location: <input type="text" id="Location" value="<?php echo $info['Location'] ?>" /><br>
                        Flat Size: <input type="text" id="FlatSize" value="<?php echo $info['FlatSize'] ?>" /><br>
                        Rent: <input type="text" id="Rent" value="<?php echo $info['Rent'] ?>" /><br>
                        <hr>
                        <input type="button" value="Update" class="btn" onclick="handleEditFlat()">
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
        function handleEditFlat() {
            let invalid_text = document.getElementById('invalid_text');
            let current_ServiceID = document.getElementById('ServiceID').value.trim();
            let current_Location = document.getElementById('Location').value.trim();
            let current_FlatSize = document.getElementById('FlatSize').value.trim();
            let current_Rent = document.getElementById('Rent').value.trim();
            
            if (current_Location === "") {
                invalid_text.innerHTML = "Please insert Location";
                invalid_text.style.color = '#fa3757';
            } else if (current_FlatSize === "") {
                invalid_text.innerHTML = "Please insert FlatSize";
                invalid_text.style.color = '#fa3757';
            } else if (current_Rent === "") {
                invalid_text.innerHTML = "Please insert Rent";
                invalid_text.style.color = '#fa3757';
            } else if (current_ServiceID === "") {
                invalid_text.innerHTML = "Please insert Service ID";
                invalid_text.style.color = '#fa3757';
            } else {
                let flat = {
                    'Location': current_Location,
                    'FlatSize': current_FlatSize,
                    'Rent': current_Rent,
                    'S_ID': current_ServiceID,
                };

                let data = JSON.stringify(flat);
                let xhttp = new XMLHttpRequest();
                xhttp.open("POST", '../../controller/Edit/editFlat.php', true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        let flat_response = JSON.parse(this.responseText);
                        let response = flat_response.trim();
                        if (response === "Successfully_Added") {
                            window.location.href = "../../View/Edit/EditFlat.php";
                        }
                    }
                };

                xhttp.send("data=" + data);
            }
        }
    </script>
</body>
</html>
