<?php

include'db_connect.php';

session_start();

if (!isset($_SESSION['CustomerID'])) {
    header('Location: login.php');
    exit(); 
}
    $user_id = $_SESSION['CustomerID'];


    $sql = "SELECT * FROM customer WHERE CustomerID= $user_id";
    $result = mysqli_query($connection, $sql);

    if(!$result){
        die('QUERY FAILED').mysqli_connect_error();
    }

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $fname = $row['Name'];
        $email = $row['Email'];
        $phone = $row['PhoneNumber'];
        $Address = $row['Address'];
        
    } else {
        echo "Driver not found";
    }

// Close database connection
$connection->close();

?>




<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title> User Profile</title>
    <link rel="stylesheet" href="css/user_1.css">
    </head>

<body>
<?php include'header.php'?>
<a href="#"><img class="image" src="images/driver.png" alt="user image" ></a>

<h3 class="h3">User Information</h3>
<form>
<div class="border_1">
<div class="main_form">
    <div class="personal">
        <h2>Personal Information </h2>
            <div class="line">
                <label class="label" for="name">Full Name :<?php echo $fname;?> </label>
                
            </div>

            <div class="line">
                 <label class="label"  for="Email">Email :<?php echo $email;?>  </label>
                
            </div>
           
            <div class="line three">
                <label class="label"  for="Pnumber">Phone Number :<?php echo $phone;?> </label>
                
            </div>

            <div class="line">
                <label  class="label"  for="Add">Address : <?php echo $Address;?> </label>
                 
            </div>
          </div>
    </div>

    <div class="account">
                <h2>Account Setting</h2>
                <a class="a "href="changepw.php">Change Password</a>
                <a class="a "href="logout.php">LogOut</a>        
    </div>
</div>
</form>
    <?php include'footer.php'?>
</body>

</html>

