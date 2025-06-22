<?php
session_start();
include 'db_connect.php';

echo "<h2>Database Connection Test</h2>";

// Test database connection
if ($connection) {
    echo "<p style='color: green;'>✓ Database connection successful!</p>";
    
    // Test if customer table exists
    $result = $connection->query("SHOW TABLES LIKE 'customer'");
    if ($result && $result->num_rows > 0) {
        echo "<p style='color: green;'>✓ Customer table exists!</p>";
        
        // Show sample customers (without passwords)
        $customers = $connection->query("SELECT CustomerID, UserName, Email, Status FROM customer LIMIT 5");
        if ($customers && $customers->num_rows > 0) {
            echo "<h3>Sample Customers:</h3>";
            echo "<table border='1' style='border-collapse: collapse;'>";
            echo "<tr><th>ID</th><th>Username</th><th>Email</th><th>Status</th></tr>";
            while ($row = $customers->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['CustomerID'] . "</td>";
                echo "<td>" . $row['UserName'] . "</td>";
                echo "<td>" . $row['Email'] . "</td>";
                echo "<td>" . $row['Status'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p style='color: orange;'>⚠ No customers found in database</p>";
        }
    } else {
        echo "<p style='color: red;'>✗ Customer table does not exist!</p>";
    }
} else {
    echo "<p style='color: red;'>✗ Database connection failed: " . mysqli_connect_error() . "</p>";
}

echo "<hr>";
echo "<h2>Test Login Form</h2>";
echo "<form method='post' action='login.php'>";
echo "<p><label>Username: <input type='text' name='username' required></label></p>";
echo "<p><label>Password: <input type='password' name='password' required></label></p>";
echo "<p><input type='submit' name='login' value='Test Login'></p>";
echo "</form>";

echo "<hr>";
echo "<h2>Session Info</h2>";
if (isset($_SESSION['CustomerID'])) {
    echo "<p style='color: green;'>✓ User logged in! CustomerID: " . $_SESSION['CustomerID'] . "</p>";
    if (isset($_SESSION['UserName'])) {
        echo "<p>Username: " . $_SESSION['UserName'] . "</p>";
    }
} else {
    echo "<p style='color: orange;'>⚠ No user logged in</p>";
}

echo "<hr>";
echo "<p><a href='login.php'>← Back to Login Page</a></p>";
?> 