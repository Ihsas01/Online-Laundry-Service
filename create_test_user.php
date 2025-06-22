<?php
include 'db_connect.php';

echo "<h2>Create Test User</h2>";

if ($connection) {
    // Test user credentials
    $testUsername = "testuser";
    $testPassword = "Test123!";
    $testName = "Test User";
    $testEmail = "test@example.com";
    $testPhone = "1234567890";
    $testAddress = "123 Test Street, Test City";
    
    // Check if user already exists
    $checkSql = "SELECT CustomerID FROM customer WHERE UserName = ? OR Email = ?";
    $checkStmt = $connection->prepare($checkSql);
    $checkStmt->bind_param("ss", $testUsername, $testEmail);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();
    
    if ($checkResult->num_rows > 0) {
        echo "<p style='color: orange;'>⚠ Test user already exists!</p>";
        echo "<p><strong>Test Credentials:</strong></p>";
        echo "<p>Username: <strong>$testUsername</strong></p>";
        echo "<p>Password: <strong>$testPassword</strong></p>";
    } else {
        // Insert test user
        $insertSql = "INSERT INTO customer (Name, UserName, password, PhoneNumber, Email, Address, Status) VALUES (?, ?, ?, ?, ?, ?, 'active')";
        $insertStmt = $connection->prepare($insertSql);
        $insertStmt->bind_param("ssssss", $testName, $testUsername, $testPassword, $testPhone, $testEmail, $testAddress);
        
        if ($insertStmt->execute()) {
            echo "<p style='color: green;'>✓ Test user created successfully!</p>";
            echo "<p><strong>Test Credentials:</strong></p>";
            echo "<p>Username: <strong>$testUsername</strong></p>";
            echo "<p>Password: <strong>$testPassword</strong></p>";
        } else {
            echo "<p style='color: red;'>✗ Error creating test user: " . $insertStmt->error . "</p>";
        }
        
        $insertStmt->close();
    }
    
    $checkStmt->close();
} else {
    echo "<p style='color: red;'>✗ Database connection failed!</p>";
}

echo "<hr>";
echo "<p><a href='login.php'>← Go to Login Page</a></p>";
echo "<p><a href='test_login.php'>← Go to Test Page</a></p>";
?> 