<?php
require_once(__DIR__ . '/../../model/db.php');

if(!isset($_COOKIE['flag'])){
    header('location: ../Auth/Login.php');
}

$query = "SELECT * FROM FlatService ORDER BY S_ID DESC LIMIT 1"; 
    
$con = dbConnection();

$data = mysqli_query($con,$query);
$info = mysqli_fetch_assoc($data);
$S_ID = $info['S_ID']+1;
?>
<html>
<head>
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
                <form method="get" action="" enctype="">
                    <ul>
                        <li class="button"><a href="Profile.php">Profile</a></li><br>
                        <li class="button"><a href="../Dashboard.php">Home</a></li><br>
                        <li class="button"><a href="FlatService.php">Flat Services</a></li><br>
                        <li class="button"><a href="GarageService.php">Garage Services</a></li><br>
                        <li class="button"><a href="MoverService.php">Movers Services</a></li><br>
                        <li class="button"><a href="HouseMaid.php">House Maid Services</a></li><br>
                    </ul>
                </form>
            </td>
            <td colspan="6">
                <form enctype="">
                    <fieldset>
                        <legend><b>Add New Flat Service</b></legend>
                        <h3 id="invalid_text"></h3>
                        ServiceID: <input type="text" id="ServiceID" value="<?php echo $S_ID?>" /> <br><br>
                        Service Type: Flat <br><br>
                        Location: <input type="text" id="Location" value="" /> <br>
                        Flat Size: <input type="text" id="FlatSize" value="" /> <br>
                        Rent: <input type="text" id="Rent" value="" /> <br>
                        <hr>
                        <input type="button" value="Add" class="btn" onclick="handleAddFlat()">
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
        function handleAddFlat(){
            let invalid_text = document.getElementById('invalid_text');
            let current_ServiceID = document.getElementById('ServiceID').value;
            let current_Location = document.getElementById('Location').value;
            let current_FlatSize = document.getElementById('FlatSize').value;
            let current_Rent = document.getElementById('Rent').value;
            if(current_Location === ""){
                invalid_text.innerHTML = "Please insert Location";
                invalid_text.style.color = '#fa3757';
            }
            else if(current_FlatSize === "")
            {
                invalid_text.innerHTML = "Please insert FlatSize";
                invalid_text.style.color = '#fa3757';
            }
            else if(current_Rent === "")
            {
                invalid_text.innerHTML = "Please insert Rent";
                invalid_text.style.color = '#fa3757';
            }
            else if(current_ServiceID === "") {
                invalid_text.innerHTML = "Please insert Service ID";
                invalid_text.style.color = '#fa3757';
            } 
            else
            {
                let flat = {
                    'Location': current_Location,
                    'FlatSize': current_FlatSize,
                    'Rent': current_Rent,
                    'S_ID': current_ServiceID,
                };

                let data = JSON.stringify(flat);
                let xhttp = new XMLHttpRequest();
                xhttp.open("POST", '../../controller/Add/addFlat.php', true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                xhttp.onreadystatechange = function (){
                    if(this.readyState == 4 && this.status == 200){
                        let flat_response = JSON.parse(this.responseText);
                        let response = flat_response.trim();
                        if(response === "Successfully_Added") {
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
