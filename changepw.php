<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
include 'db_connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$old_password = $_POST['pw'];
$new_password = $_POST['new_Pw'];
$query = "SELECT password FROM users WHERE user_id = $user_id";
$result = mysqli_query($connection, $query);

if (!$result) {
    die('Query failed: ' . mysqli_error($connection));
}

$row = mysqli_fetch_assoc($result);
$db_password = $row['password'];

if ($old_password === $db_password) {
    $update_query = "UPDATE users SET password = '$new_password' WHERE user_id = $user_id";
    $update_result = mysqli_query($connection, $update_query);

    if (!$update_result) {
        die('Update query failed: ' . mysqli_error($connection));
    } else {
        echo "Password updated successfully";
    }
} else {
    echo "Old password is incorrect";
}
mysqli_close($connection);
}
?>





<!DOCTYPE html>
<html>

<head>
<title>Change Password </title>
<meta name="viewport" content="width=device-width,initial-scale=1.0"> <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="css/changepw.css">
    
</head>

<body>
    <form name="myForm" action="changepw.php" onsubmit="return validateForm()" method="post" required>
        <input type="password" placeholder="Old Password" name="pw" required>
        <input type="password" placeholder="New Password"  id="new_Pw" name="new_Pw" required>
        <input type="password" placeholder="Confirm Password" id="con_Pw" name="con_Pw" required>

       <input type="submit"  value="Confirm" >
    </form>

    
    <script src="js/password_validate.js"></script>
</body>


</html>