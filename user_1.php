<?php
include 'db_connect.php';

session_start();

if (!isset($_SESSION['CustomerID'])) {
    header('Location: login.php');
    exit(); 
}
$user_id = $_SESSION['CustomerID'];

$update_message = '';

// Initialize user variables with default values
$fname = '';
$email = '';
$phone = '';
$address = '';

// Handle form submission for updating user details
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_profile'])) {
    $fname = mysqli_real_escape_string($connection, $_POST['fname']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
    $address = mysqli_real_escape_string($connection, $_POST['address']);
    
    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $update_message = '<div class="alert alert-danger">Invalid email format!</div>';
    } else {
        // Check if email already exists for another user
        $check_email = "SELECT CustomerID FROM customer WHERE Email = '$email' AND CustomerID != $user_id";
        $email_result = mysqli_query($connection, $check_email);
        
        if (!$email_result) {
            $update_message = '<div class="alert alert-danger">Database error checking email: ' . mysqli_error($connection) . '</div>';
        } elseif (mysqli_num_rows($email_result) > 0) {
            $update_message = '<div class="alert alert-danger">Email already exists!</div>';
        } else {
            // Update user details
            $update_sql = "UPDATE customer SET Name = '$fname', Email = '$email', PhoneNumber = '$phone', Address = '$address' WHERE CustomerID = $user_id";
            $update_result = mysqli_query($connection, $update_sql);
            
            if ($update_result) {
                $update_message = '<div class="alert alert-success">Profile updated successfully!</div>';
                
                // Refresh the page data after successful update
                $refresh_sql = "SELECT * FROM customer WHERE CustomerID = $user_id";
                $refresh_result = mysqli_query($connection, $refresh_sql);
                if ($refresh_result && $refresh_result->num_rows > 0) {
                    $row = $refresh_result->fetch_assoc();
                    $fname = $row['Name'];
                    $email = $row['Email'];
                    $phone = $row['PhoneNumber'];
                    $address = $row['Address'];
                }
            } else {
                $update_message = '<div class="alert alert-danger">Error updating profile: ' . mysqli_error($connection) . '</div>';
            }
        }
    }
}

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
    $address = $row['Address'];
    
} else {
    echo "User not found";
}

// Close database connection
$connection->close();

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - FreshWash</title>
    
    <!-- CSS Files -->
    <link rel="stylesheet" href="css/user_1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        .alert {
            padding: 12px 20px;
            margin: 20px 0;
            border-radius: 8px;
            font-weight: 500;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .edit-form {
            display: none;
            margin-top: 20px;
        }
        .edit-form.active {
            display: block;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #333;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.3s;
        }
        .form-group input:focus, .form-group textarea:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 0 2px rgba(0,123,255,0.25);
        }
        .form-actions {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }
        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }
        .btn-primary {
            background-color: #007bff;
            color: white;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }
        .btn-secondary:hover {
            background-color: #545b62;
        }
        .info-grid {
            display: none;
        }
        .info-grid.active {
            display: grid;
        }
    </style>
</head>

<body>
    <?php include 'header.php' ?>
    
    <!-- Main Content -->
    <main class="profile-container">
        <!-- Profile Header Section -->
        <section class="profile-header" data-aos="fade-down">
            <div class="profile-cover">
                <div class="profile-avatar">
                    <div class="avatar-wrapper">
                        <img src="images/user.png" alt="User Avatar" class="avatar-image">
                        <div class="avatar-overlay">
                            <i class="fas fa-camera"></i>
                        </div>
                    </div>
                    <div class="profile-status">
                        <span class="status-dot"></span>
                        <span class="status-text">Online</span>
                    </div>
                </div>
                <div class="profile-info">
                    <h1 class="profile-name"><?php echo htmlspecialchars($fname); ?></h1>
                    <p class="profile-email"><?php echo htmlspecialchars($email); ?></p>
                    <div class="profile-stats">
                        <div class="stat-item">
                            <span class="stat-number">12</span>
                            <span class="stat-label">Orders</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">4.8</span>
                            <span class="stat-label">Rating</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">2</span>
                            <span class="stat-label">Years</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Profile Content -->
        <div class="profile-content">
            <!-- Personal Information Card -->
            <section class="info-card" data-aos="fade-up" data-aos-delay="100">
                <div class="card-header">
                    <i class="fas fa-user-circle"></i>
                    <h2>Personal Information</h2>
                    <button class="edit-btn" id="editPersonalBtn">
                        <i class="fas fa-edit"></i>
                        Edit
                    </button>
                </div>
                <div class="card-body">
                    <?php echo $update_message; ?>
                    
                    <!-- View Mode -->
                    <div class="info-grid active" id="viewMode">
                        <div class="info-item">
                            <div class="info-label">
                                <i class="fas fa-user"></i>
                                <span>Full Name</span>
                            </div>
                            <div class="info-value"><?php echo htmlspecialchars($fname); ?></div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">
                                <i class="fas fa-envelope"></i>
                                <span>Email Address</span>
                            </div>
                            <div class="info-value"><?php echo htmlspecialchars($email); ?></div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">
                                <i class="fas fa-phone"></i>
                                <span>Phone Number</span>
                            </div>
                            <div class="info-value"><?php echo htmlspecialchars($phone); ?></div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Address</span>
                            </div>
                            <div class="info-value"><?php echo htmlspecialchars($address); ?></div>
                        </div>
                    </div>

                    <!-- Edit Mode -->
                    <div class="edit-form" id="editMode">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="fname">Full Name</label>
                                <input type="text" id="fname" name="fname" value="<?php echo htmlspecialchars($fname); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($phone); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea id="address" name="address" rows="3" required><?php echo htmlspecialchars($address); ?></textarea>
                            </div>
                            <div class="form-actions">
                                <button type="submit" name="update_profile" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Save Changes
                                </button>
                                <button type="button" class="btn btn-secondary" id="cancelEdit">
                                    <i class="fas fa-times"></i> Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>

            <!-- Account Settings Card -->
            <section class="info-card" data-aos="fade-up" data-aos-delay="200">
                <div class="card-header">
                    <i class="fas fa-cog"></i>
                    <h2>Account Settings</h2>
                </div>
                <div class="card-body">
                    <div class="settings-grid">
                        <a href="changepw.php" class="setting-item">
                            <div class="setting-icon">
                                <i class="fas fa-lock"></i>
                            </div>
                            <div class="setting-content">
                                <h3>Change Password</h3>
                                <p>Update your account password</p>
                            </div>
                            <div class="setting-arrow">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </a>
                        <a href="order.php" class="setting-item">
                            <div class="setting-icon">
                                <i class="fas fa-shopping-bag"></i>
                            </div>
                            <div class="setting-content">
                                <h3>My Orders</h3>
                                <p>View and track your orders</p>
                            </div>
                            <div class="setting-arrow">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </a>
                        <a href="contact_us.php" class="setting-item">
                            <div class="setting-icon">
                                <i class="fas fa-headset"></i>
                            </div>
                            <div class="setting-content">
                                <h3>Support</h3>
                                <p>Get help and contact support</p>
                            </div>
                            <div class="setting-arrow">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </a>
                        <a href="logout.php" class="setting-item logout-item">
                            <div class="setting-icon">
                                <i class="fas fa-sign-out-alt"></i>
                            </div>
                            <div class="setting-content">
                                <h3>Logout</h3>
                                <p>Sign out of your account</p>
                            </div>
                            <div class="setting-arrow">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </section>

            <!-- Recent Activity Card -->
            <section class="info-card" data-aos="fade-up" data-aos-delay="300">
                <div class="card-header">
                    <i class="fas fa-history"></i>
                    <h2>Recent Activity</h2>
                </div>
                <div class="card-body">
                    <div class="activity-list">
                        <div class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="activity-content">
                                <h4>Order Completed</h4>
                                <p>Your laundry order #1234 has been delivered</p>
                                <span class="activity-time">2 hours ago</span>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-truck"></i>
                            </div>
                            <div class="activity-content">
                                <h4>Order in Transit</h4>
                                <p>Your order #1235 is on its way</p>
                                <span class="activity-time">1 day ago</span>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon">
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="activity-content">
                                <h4>Review Submitted</h4>
                                <p>You rated your recent service 5 stars</p>
                                <span class="activity-time">3 days ago</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <!-- AOS Animation Library -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <!-- Custom JavaScript -->
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });

        // Add hover effects to setting items
        document.querySelectorAll('.setting-item').forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.style.transform = 'translateX(10px)';
            });

            item.addEventListener('mouseleave', function() {
                this.style.transform = 'translateX(0)';
            });
        });

        // Add click effects to buttons
        document.querySelectorAll('.btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;

                ripple.style.width = ripple.style.height = size + 'px';
                ripple.style.left = x + 'px';
                ripple.style.top = y + 'px';
                ripple.classList.add('ripple');

                this.appendChild(ripple);

                setTimeout(() => ripple.remove(), 600);
            });
        });

        // Profile edit functionality
        document.addEventListener('DOMContentLoaded', function() {
            const editBtn = document.getElementById('editPersonalBtn');
            const viewMode = document.getElementById('viewMode');
            const editMode = document.getElementById('editMode');
            const cancelBtn = document.getElementById('cancelEdit');

            // Toggle to edit mode
            editBtn.addEventListener('click', function() {
                viewMode.classList.remove('active');
                editMode.classList.add('active');
                editBtn.style.display = 'none';
            });

            // Cancel edit and return to view mode
            cancelBtn.addEventListener('click', function() {
                viewMode.classList.add('active');
                editMode.classList.remove('active');
                editBtn.style.display = 'block';
            });

            // Auto-hide success/error messages after 5 seconds
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.style.opacity = '0';
                    setTimeout(() => alert.remove(), 300);
                }, 5000);
            });
        });
    </script>
</body>
</html>

