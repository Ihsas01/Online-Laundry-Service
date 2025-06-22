<?php
session_start();

include 'db_connect.php';

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT CustomerID FROM customer WHERE UserName = ? AND password = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ss", $username, $password);

    $stmt->execute();
    $stmt->bind_result($user_id);

    if ($stmt->fetch()) {
        $_SESSION['CustomerID'] = $user_id;
        header("Location: index.php");
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
    <title>Login - FreshWash</title>
    <link rel="stylesheet" href="css/login.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <?php include('header.php') ?>
    
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
    </div>

    <main class="login-main">
        <div class="container">
            <div class="login-wrapper">
                <!-- Left Side - Enhanced Branding -->
                <div class="branding-section">
                    <div class="branding-content">
                        <div class="logo-container">
                            <div class="logo-glow"></div>
                            <img src="images/logo4.png" alt="FreshWash Logo" class="brand-logo">
                            <h1 class="brand-title">FreshWash</h1>
                        </div>
                        <h2 class="welcome-title">Welcome Back!</h2>
                        <p class="welcome-subtitle">Sign in to access your premium laundry services and manage your orders with ease.</p>
                        
                        <div class="features-list">
                            <div class="feature-item" data-aos="fade-up" data-aos-delay="100">
                                <div class="feature-icon">
                                    <i class="fas fa-satellite-dish"></i>
                                </div>
                                <div class="feature-content">
                                    <span class="feature-title">Real-time Tracking</span>
                                    <span class="feature-desc">Track your orders in real-time</span>
                                </div>
                            </div>
                            <div class="feature-item" data-aos="fade-up" data-aos-delay="200">
                                <div class="feature-icon">
                                    <i class="fas fa-calendar-check"></i>
                                </div>
                                <div class="feature-content">
                                    <span class="feature-title">Smart Scheduling</span>
                                    <span class="feature-desc">Schedule pickups and deliveries</span>
                                </div>
                            </div>
                            <div class="feature-item" data-aos="fade-up" data-aos-delay="300">
                                <div class="feature-icon">
                                    <i class="fas fa-history"></i>
                                </div>
                                <div class="feature-content">
                                    <span class="feature-title">Order History</span>
                                    <span class="feature-desc">View order history and receipts</span>
                                </div>
                            </div>
                            <div class="feature-item" data-aos="fade-up" data-aos-delay="400">
                                <div class="feature-icon">
                                    <i class="fas fa-crown"></i>
                                </div>
                                <div class="feature-content">
                                    <span class="feature-title">VIP Benefits</span>
                                    <span class="feature-desc">Get exclusive member benefits</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="stats-container">
                            <div class="stat-item">
                                <div class="stat-number">50K+</div>
                                <div class="stat-label">Happy Customers</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">99%</div>
                                <div class="stat-label">Satisfaction Rate</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Enhanced Login Form -->
                <div class="login-section">
                    <div class="login-container">
                        <div class="form-header">
                            <div class="header-icon">
                                <i class="fas fa-user-circle"></i>
                            </div>
                            <h2>Sign In</h2>
                            <p>Enter your credentials to continue</p>
                        </div>
                        
                        <form method="post" action="login.php" class="login-form" id="loginForm">
                            <?php if(isset($error_message)): ?>
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
                                    <input type="text" id="username" name="username" required autocomplete="username">
                                    <div class="input-focus-border"></div>
                                    <div class="input-glow"></div>
                                </div>
                                <label for="username" class="floating-label">Username</label>
                                <div class="input-hint">Enter your registered username</div>
                            </div>
                            
                            <div class="form-group">
                                <div class="input-wrapper">
                                    <div class="input-icon-container">
                                        <i class="fas fa-lock input-icon"></i>
                                    </div>
                                    <input type="password" id="password" name="password" required autocomplete="current-password">
                                    <button type="button" class="password-toggle" onclick="togglePassword()">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <div class="input-focus-border"></div>
                                    <div class="input-glow"></div>
                                </div>
                                <label for="password" class="floating-label">Password</label>
                                <div class="input-hint">Enter your password</div>
                            </div>
                            
                            <div class="form-options">
                                <label class="checkbox-container">
                                    <input type="checkbox" name="remember" id="remember">
                                    <span class="checkmark"></span>
                                    <span class="checkbox-text">Remember me</span>
                                </label>
                                <a href="#" class="forgot-password" onclick="showForgotPassword()">
                                    <i class="fas fa-key"></i>
                                    Forgot Password?
                                </a>
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
                            
                            <div class="social-login">
                                <div class="divider">
                                    <span>Or continue with</span>
                                </div>
                                <div class="social-buttons">
                                    <button type="button" class="social-btn google-btn" onclick="handleSocialLogin('google')">
                                        <div class="social-icon">
                                            <i class="fab fa-google"></i>
                                        </div>
                                        <span>Google</span>
                                    </button>
                                    <button type="button" class="social-btn facebook-btn" onclick="handleSocialLogin('facebook')">
                                        <div class="social-icon">
                                            <i class="fab fa-facebook-f"></i>
                                        </div>
                                        <span>Facebook</span>
                                    </button>
                                </div>
                            </div>
                            
                            <div class="form-footer">
                                <p>Don't have an account? <a href="signup.php" class="signup-link">Create Account</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Enhanced Alternative Login Options -->
            <div class="alternative-login">
                <div class="alt-login-container">
                    <h3>Other Login Options</h3>
                    <div class="alt-buttons">
                        <a href="Admin dashboard/admin_login.php" class="alt-btn admin-btn">
                            <div class="alt-btn-icon">
                                <i class="fas fa-user-shield"></i>
                            </div>
                            <div class="alt-btn-content">
                                <span class="alt-btn-title">Admin Panel</span>
                                <span class="alt-btn-subtitle">Manage system</span>
                            </div>
                            <div class="alt-btn-arrow">
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </a>
                        <a href="driverlogin.php" class="alt-btn driver-btn">
                            <div class="alt-btn-icon">
                                <i class="fas fa-truck"></i>
                            </div>
                            <div class="alt-btn-content">
                                <span class="alt-btn-title">Driver Portal</span>
                                <span class="alt-btn-subtitle">Delivery management</span>
                            </div>
                            <div class="alt-btn-arrow">
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Enhanced Forgot Password Modal -->
    <div class="modal" id="forgotPasswordModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fas fa-key"></i> Reset Password</h3>
                <button class="modal-close" onclick="closeModal()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <p>Enter your email address and we'll send you a link to reset your password.</p>
                <div class="modal-form">
                    <div class="form-group">
                        <div class="input-wrapper">
                            <div class="input-icon-container">
                                <i class="fas fa-envelope input-icon"></i>
                            </div>
                            <input type="email" id="resetEmail" placeholder="Enter your email" required>
                            <div class="input-focus-border"></div>
                        </div>
                    </div>
                    <button type="button" class="reset-btn" onclick="sendResetEmail()">
                        <span class="btn-text">Send Reset Link</span>
                        <div class="btn-loading">
                            <div class="spinner"></div>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Notification -->
    <div class="notification" id="successNotification">
        <div class="notification-content">
            <div class="notification-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="notification-text">
                <span class="notification-title">Success!</span>
                <span class="notification-message">Password reset link sent to your email.</span>
            </div>
        </div>
    </div>

    <script src="js/login.js"></script>
</body>
</html>