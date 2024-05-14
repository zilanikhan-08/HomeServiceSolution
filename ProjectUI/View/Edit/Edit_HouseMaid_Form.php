<?php 

if(!isset($_COOKIE['flag'])){
    header('location: ../Auth/Login.php');
}

require_once(__DIR__ . '/../../model/db.php');
$id = $_GET['id'];

$query = "SELECT * FROM housemaid WHERE S_ID = '$id'"; 
    
$con = dbConnection();

$data = mysqli_query($con,$query);
$total = mysqli_num_rows($data);
$info = mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit House Maid Service</title>
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
                <div class="button"><a href="EditHouseMaid.php">Edit HouseMaid</a></div><br>
            </td>
            <td colspan="6">
                <form enctype="">
                    <fieldset>
                        <legend><b>Edit House Maid Service</b></legend>
                        <h3 id="invalid_text"></h3>
                        ServiceID: <input type="text" id="ServiceID" value="<?php echo $info['S_ID'] ?>" /><br><br>
                        Service Type: Movers<br><br>
                        Location: <input type="text" id="Location" value="<?php echo $info['Location'] ?>" /><br>
                        Salary: <input type="text" id="Salary" value="<?php echo $info['Salary'] ?>" /><br>
                        <hr>
                        <input type="button" value="Update" class="btn" onclick="handleEditMaid()">
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
        function handleEditMaid() {
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
                let maid = {
                    'Location': current_Location,
                    'Salary': current_Salary,
                    'S_ID': current_ServiceID,
                };

                let data = JSON.stringify(maid);
                let xhttp = new XMLHttpRequest();
                xhttp.open("POST", '../../controller/Edit/editHouseMaid.php', true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.onreadystatechange = function () {
                    if(this.readyState == 4 && this.status == 200) {
                        let maid_response = this.responseText;
                        console.log('Response is:', maid_response);
                        if(maid_response.trim() === "Successfully_Added") {
                            console.log('Redirecting...');
                            window.location.href = "http://localhost/test/ProjectUI/View/Edit/EditHouseMaid.php";
                        } else {
                            console.log('Unexpected response:', maid_response);
                        }
                    }
                };
                xhttp.send("data=" + data);
            }
        }
    </script>
</body>
</html>
