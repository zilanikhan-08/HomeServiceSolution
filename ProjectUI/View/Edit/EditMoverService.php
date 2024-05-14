<!DOCTYPE html>
<html>

<head>
    <title>Edit Flat Services</title>
    <link rel="stylesheet" type="text/css" href="../css/table.css">
</head>

<body>
    <table border="1" align="center">
        <tr>
            <td colspan="3" align="left"><h1>Movers Service</h1> </td>
            <td align="right"><a href="../../controller/Auth/Logout.php">Logout |</a></td>
        </tr>
        <tr>
            <td colspan="3" align="left">
                <form method="get" action="" enctype="">
                    <ul>
                        <button class="btn"><a href="Profile.php">Profile</a></button><br>
                        <button class="btn"><a href="../Dashboard.php">Home</a></button><br>
                        <button class="btn"><a href="EditFlat.php">Edit Flat Services</a></button><br>
                        <button class="btn"><a href="EditGarageService.php">Edit Garage Services</a></button><br>
                        <button class="btn"><a href="EditMoverService.php">Edit Movers Services</a></button><br>
                        <button class="btn"><a href="EditHouseMaid.php">Edit House Maid Services</a></button><br>
                    </ul>
                </form>
            </td>
            <td>
                <?php
                require_once(__DIR__ . '/../../model/db.php');
                error_reporting(0);

                if (!isset($_COOKIE['flag'])) {
                    header('location: ../Auth/Login.php');
                }

                $con = dbConnection();
                $query = "SELECT * FROM `housemaid`";
                $data = mysqli_query($con, $query);
                $total = mysqli_num_rows($data);
                $info = mysqli_fetch_assoc($data);
                if ($total != 0) {
                ?>
                    <table border="3">
                        <tr>
                            <th>S_ID</th>
                            <th>Location</th>
                            <th>Salary</th>
                            <th>Book</th>
                        </tr>
                        <?php
                        while ($info = mysqli_fetch_assoc($data)) {
                            echo "<tr>
                            <td>" . $info['S_ID'] . "</td>  
                            <td>" . $info['Location'] . "</td> 
                            <td>" . $info['Salary'] . "</td>
                            <td>" . $info['Book'] . "</td>
                            
                            <td align='center'><button class='green-btn'><a href='Edit_HouseMaid_Form.php?id=$info[S_ID]' style='color: white;'>Edit</a></button></td>
                            <td align='center'><button class='red-btn'><a href='../../controller/Delete/Delete_HouseMaid.php?id=$info[S_ID]' style='color: white;'>Delete</a></button></td>
                            </tr>";
                        }
                        ?>
                    </table>
            </td>
        </tr>
    <?php
                } else {
                    echo "<tr><td colspan='4'>No data found</td></tr>";
                }
    ?>
    <tr>
        <td colspan="4" align="center">
            <h6>Copyright @ 2017</h6><br>
        </td>
    </tr>
    </table>
</body>

</html>
