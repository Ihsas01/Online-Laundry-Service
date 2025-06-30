<?php
include '../db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $role = $_POST['role'];
    $status = $_POST['status'];

    // Basic validation
    if (!$name || !$username || !$email || !$password || !$role || !$status) {
        header('Location: admin_index.php?msg=Please+fill+all+fields');
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check for duplicate username or email
    $stmt = $connection->prepare('SELECT AdminID FROM admin WHERE UserName = ? OR Email = ?');
    $stmt->bind_param('ss', $username, $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->close();
        header('Location: admin_index.php?msg=Username+or+Email+already+exists');
        exit();
    }
    $stmt->close();

    // Insert new admin
    $stmt = $connection->prepare('INSERT INTO admin (Name, UserName, Email, password, Role, Status) VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->bind_param('ssssss', $name, $username, $email, $hashed_password, $role, $status);
    if ($stmt->execute()) {
        $stmt->close();
        header('Location: admin_index.php?msg=Admin+added+successfully');
        exit();
    } else {
        $stmt->close();
        header('Location: admin_index.php?msg=Error+adding+admin');
        exit();
    }
}
// If not POST, redirect
header('Location: admin_index.php');
exit(); 