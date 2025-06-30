<?php
session_start();
include '../db_connect.php';

// Check if admin is logged in, otherwise redirect to login page
// Note: You might need to adjust the session variable name to match your login system
if (!isset($_SESSION['admin_id'])) {
    // For demonstration, let's assume admin_id 1 is logged in.
    // In a real application, you would redirect:
    // header('Location: admin_login.php');
    // exit();
    $_SESSION['admin_id'] = 1; // Placeholder
}

$admin_id = $_SESSION['admin_id'];
$message = '';

// Fetch admin data
// Note: Adjust table and column names if they are different in your database
$query = "SELECT * FROM admin WHERE AdminID = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param("i", $admin_id);
$stmt->execute();
$result = $stmt->get_result();
$admin = $result->fetch_assoc();

if (!$admin) {
    // Handle case where admin is not found
    die("Admin user not found.");
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    // Add other fields as necessary, e.g., fullname

    // Update logic
    $update_query = "UPDATE admin SET username = ?, email = ? WHERE AdminID = ?";
    $update_stmt = $connection->prepare($update_query);
    $update_stmt->bind_param("ssi", $username, $email, $admin_id);

    if ($update_stmt->execute()) {
        $message = '<div class="alert alert-success">Profile updated successfully!</div>';
        // Refresh admin data
        $admin['UserName'] = $username;
        $admin['Email'] = $email;
    } else {
        $message = '<div class="alert alert-danger">Error updating profile. Please try again.</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile - Laundry Service</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/admin_dashboard_modern.css">
    <link rel="stylesheet" href="../css/admin_profile.css"> <!-- New CSS for profile page -->
</head>
<body>
    <?php include '_sidebar.php'; ?>

    <main class="main-content">
        <?php include '_header.php'; ?>

        <div class="profile-content">
            <div class="profile-header" data-aos="fade-down">
                <h1>Admin Profile</h1>
                <p>Manage your profile settings and password.</p>
            </div>

            <?php echo $message; ?>

            <div class="profile-grid" data-aos="fade-up">
                <!-- Profile Card -->
                <div class="profile-card">
                    <div class="profile-avatar-wrapper">
                        <img src="../images/user.png" alt="Admin Avatar" class="profile-avatar">
                        <button class="change-avatar-btn" title="Change Avatar"><i class='bx bx-camera'></i></button>
                    </div>
                    <h2 class="profile-name"><?php echo htmlspecialchars($admin['UserName']); ?></h2>
                    <p class="profile-email"><?php echo htmlspecialchars($admin['Email']); ?></p>
                    <div class="profile-stats">
                        <div class="stat-item">
                            <span>Role</span>
                            <strong>Administrator</strong>
                        </div>
                        <div class="stat-item">
                            <span>Joined</span>
                            <strong><?php echo date("M d, Y", strtotime($admin['created_at'] ?? 'now')); ?></strong>
                        </div>
                    </div>
                </div>

                <!-- Profile Form -->
                <div class="profile-form-container">
                    <form action="admin_profile.php" method="POST" class="profile-form">
                        <div class="form-section">
                            <h3>Personal Information</h3>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($admin['UserName']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($admin['Email']); ?>" required>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn-primary">Save Changes</button>
                            <button type="button" class="btn-secondary">Cancel</button>
                        </div>
                    </form>

                    <form action="admin_profile.php" method="POST" class="profile-form password-form">
                        <div class="form-section">
                            <h3>Change Password</h3>
                            <div class="form-group">
                                <label for="current_password">Current Password</label>
                                <input type="password" id="current_password" name="current_password">
                            </div>
                            <div class="form-group">
                                <label for="new_password">New Password</label>
                                <input type="password" id="new_password" name="new_password">
                            </div>
                             <div class="form-group">
                                <label for="confirm_password">Confirm New Password</label>
                                <input type="password" id="confirm_password" name="confirm_password">
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn-primary">Update Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="../js/admin_dashboard.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true
        });
    </script>
</body>
</html> 