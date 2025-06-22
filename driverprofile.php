<?php
include 'db_connect.php';



session_start();

if (!isset($_SESSION['Driver_id'])) {
    header('Location: driverlogin.php');
    exit(); 
}
    $driver_id = $_SESSION['Driver_id'];


    $sql = "SELECT * FROM driver WHERE Driver_id = $driver_id";
    $result = mysqli_query($connection, $sql);

    if(!$result){
        die('QUERY FAILED').mysqli_connect_error();
    }

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $fname = $row['fname'];
        $email = $row['email'];
        $phone = $row['phone'];
        $license_number = $row['lnumber'];
        $vehicle_type = $row['vehicle'];
        $vehicle_number = $row['vnumber'];
        
    } else {
        echo "Driver not found";
    }

// Close database connection
$connection->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Driver Profile</title>
    <link rel="stylesheet" href="css/driverprofile.css">
</head>
<body>
    <?php include 'header.php' ?>
    <a href="#"><img class="image" src="images/driver.png" alt="user image" ></a>
    <br>
    <h3 class="h3">Driver Information</h3>
    <form class="free">
        <form action="driverprofile.php"class="form1">
            Full Name :<?php echo $fname.'<br>'; ?>
            Email : <?php echo $email.'<br>'; ?>
            Phone Number :<?php echo $phone.'<br>'; ?>
            License Number :<?php echo $license_number.'<br>'; ?>
            Vehicle Type :  <?php echo $vehicle_type.'<br>'; ?>
            Vehicle Number :<?php echo $vehicle_number.'<br>'; ?>
        </form>
        
    <div class="lite">
        <h2>Account Setting</h2>
        <h3 class="link">
            <a class="a "href="changepw.php">Change Password</a>
        </h3>
        </h3>
        <h3 class="link">
            <a class="a" href="logout.php ">LogOut</a>
        </h3>
    </div>
    </form>
    <?php include 'footer.php' ?>
</body>
</html>
