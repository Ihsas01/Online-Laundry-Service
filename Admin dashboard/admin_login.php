<?php
session_start();
include '../db_connect.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT AdminID FROM admin WHERE UserName = ? AND password = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ss", $username, $password);

    $stmt->execute();
    $stmt->bind_result($user_id);

    if ($stmt->fetch()) {
        $_SESSION['AdminID'] = $user_id;
        header("Location: admin_index.php");
        exit();
    } else {
        $error_message = "Invalid username or password";
    }

    $stmt->close();
    $connection->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - FreshWash</title>
    <link rel="stylesheet" href="../css/admin_login.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Enhanced Background Animation -->
    <div class="background-animation">
        <div class="particles-container" id="particles"></div>
        <div class="floating-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
            <div class="shape shape-4"></div>
            <div class="shape shape-5"></div>
            <div class="shape shape-6"></div>
            <div class="shape shape-7"></div>
        </div>
        <div class="gradient-overlay"></div>
        <div class="background-image"></div>
    </div>

    <main class="admin-login-main">
        <div class="container">
            <div class="login-wrapper">
                <!-- Left Side - Branding -->
                <div class="branding-section">
                    <div class="branding-content">
                        <div class="logo-container">
                            <div class="logo-glow"></div>
                            <img src="../images/logo4.png" alt="FreshWash Logo" class="brand-logo">
                            <h1 class="brand-title">FreshWash</h1>
                        </div>
                        <h2 class="welcome-title">Admin Portal</h2>
                        <p class="welcome-subtitle">Access the administrative dashboard to manage your laundry service operations efficiently.</p>

                        <div class="features-list">
                            <div class="feature-item" data-aos="fade-up" data-aos-delay="100">
                                <div class="feature-icon">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <div class="feature-content">
                                    <span class="feature-title">Analytics Dashboard</span>
                                    <span class="feature-desc">Monitor business performance</span>
                                </div>
                            </div>
                            <div class="feature-item" data-aos="fade-up" data-aos-delay="200">
                                <div class="feature-icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="feature-content">
                                    <span class="feature-title">Customer Management</span>
                                    <span class="feature-desc">Manage customer accounts</span>
                                </div>
                            </div>
                            <div class="feature-item" data-aos="fade-up" data-aos-delay="300">
                                <div class="feature-icon">
                                    <i class="fas fa-shipping-fast"></i>
                                </div>
                                <div class="feature-content">
                                    <span class="feature-title">Order Management</span>
                                    <span class="feature-desc">Track and manage orders</span>
                                </div>
                            </div>
                            <div class="feature-item" data-aos="fade-up" data-aos-delay="400">
                                <div class="feature-icon">
                                    <i class="fas fa-cog"></i>
                                </div>
                                <div class="feature-content">
                                    <span class="feature-title">System Settings</span>
                                    <span class="feature-desc">Configure system parameters</span>
                                </div>
                            </div>
                        </div>

                        <div class="security-notice">
                            <div class="security-icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div class="security-content">
                                <span class="security-title">Secure Access</span>
                                <span class="security-desc">This portal is protected with advanced security measures</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Login Form -->
                <div class="login-section">
                    <div class="login-container">
                        <div class="form-header">
                            <div class="header-icon">
                                <i class="fas fa-user-shield"></i>
                            </div>
                            <h2>Admin Login</h2>
                            <p>Enter your credentials to access the admin panel</p>
                        </div>

                        <form method="post" action="admin_login.php" class="login-form" id="loginForm">
                            <?php if (isset($error_message)): ?>
                                <div class="error-message" id="errorMessage">
                                    <div class="error-icon">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </div>
                                    <div class="error-content">
                                        <span class="error-title">Login Failed</span>
                                        <span class="error-text"><?php echo $error_message; ?></span>
                                    </div>
                                    <button type="button" class="error-close" onclick="closeError()">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            <?php endif; ?>

                            <div class="form-group">
                                <div class="input-wrapper">
                                    <div class="input-icon-container">
                                        <i class="fas fa-user input-icon"></i>
                                    </div>
                                    <input type="text" id="username" name="username" required autocomplete="username" placeholder=" ">
                                    <div class="input-focus-border"></div>
                                    <div class="input-glow"></div>
                                    <label for="username" class="floating-label">Username</label>
                                </div>
                                <div class="input-hint">Enter your admin username</div>
                            </div>

                            <div class="form-group">
                                <div class="input-wrapper">
                                    <div class="input-icon-container">
                                        <i class="fas fa-lock input-icon"></i>
                                    </div>
                                    <input type="password" id="password" name="password" required autocomplete="current-password" placeholder=" ">
                                    <button type="button" class="password-toggle" onclick="togglePassword('password')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <div class="input-focus-border"></div>
                                    <div class="input-glow"></div>
                                    <label for="password" class="floating-label">Password</label>
                                </div>
                                <div class="input-hint">Enter your admin password</div>
                            </div>

                            <div class="form-options">
                                <label class="checkbox-container">
                                    <input type="checkbox" name="remember" id="remember">
                                    <span class="checkmark"></span>
                                    <span class="checkbox-text">Remember me for 30 days</span>
                                </label>
                            </div>

                            <button type="submit" class="login-btn" name="login" id="loginBtn">
                                <div class="btn-content">
                                    <span class="btn-text">Sign In</span>
                                    <span class="btn-icon">
                                        <i class="fas fa-arrow-right"></i>
                                    </span>
                                </div>
                                <div class="btn-loading">
                                    <div class="spinner"></div>
                                    <span>Signing in...</span>
                                </div>
                                <div class="btn-success">
                                    <i class="fas fa-check"></i>
                                    <span>Success!</span>
                                </div>
                            </button>

                            <div class="form-footer">
                                <p>Having trouble? <a href="#" class="help-link">Contact Support</a></p>
                                <p class="back-link">← <a href="../index.php">Back to Main Site</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Security Notification -->
    <div class="notification" id="securityNotification">
        <div class="notification-content">
            <div class="notification-icon">
                <i class="fas fa-shield-alt"></i>
            </div>
            <div class="notification-text">
                <span class="notification-title">Secure Connection</span>
                <span class="notification-message">Your login session is encrypted and secure.</span>
            </div>
        </div>
    </div>

    <script src="../js/admin_login.js"></script>
</body>

</html>