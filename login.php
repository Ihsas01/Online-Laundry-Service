<?php
session_start();

include 'db_connect.php';

if(isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Debug: Log the login attempt
    error_log("Login attempt for username: " . $username);

    // Check if database connection is working
    if (!$connection) {
        $error_message = "Database connection failed. Please try again later.";
        error_log("Database connection failed: " . mysqli_connect_error());
    } else {
        // Prepare the SQL statement - get the hashed password
        $sql = "SELECT CustomerID, UserName, password FROM customer WHERE UserName = ? AND Status = 'active'";
        $stmt = $connection->prepare($sql);
        
        if (!$stmt) {
            $error_message = "Database error. Please try again.";
            error_log("Prepare statement failed: " . $connection->error);
        } else {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result && $result->num_rows > 0) {
                $user = $result->fetch_assoc();
                
                // Direct password comparison
                if ($password === $user['password']) {
                    $_SESSION['CustomerID'] = $user['CustomerID'];
                    $_SESSION['UserName'] = $user['UserName'];
                    
                    // Debug: Log successful login
                    error_log("Successful login for user ID: " . $user['CustomerID']);
                    
                    header("Location: index.php");
                    exit();
                } else {
                    $error_message = "Invalid username or password";
                    error_log("Password verification failed for username: " . $username);
                }
            } else {
                $error_message = "Invalid username or password";
                error_log("User not found: " . $username);
            }
            
            $stmt->close();
        }
    }
    
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
    <!-- Add AOS library for scroll animations -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
    <?php include('header.php') ?>
    
    <!-- Dark Mode Toggle -->
    <div class="theme-toggle" id="themeToggle">
        <div class="toggle-container">
            <i class="fas fa-sun light-icon"></i>
            <i class="fas fa-moon dark-icon"></i>
            <div class="toggle-slider"></div>
        </div>
    </div>

    <!-- Floating Action Button -->
    <div class="fab-container" id="fabContainer">
        <button class="fab-button" id="fabButton">
            <i class="fas fa-question"></i>
        </button>
        <div class="fab-menu" id="fabMenu">
            <button class="fab-item" onclick="showHelpModal()" title="Help & Support">
                <i class="fas fa-life-ring"></i>
            </button>
            <button class="fab-item" onclick="showTutorial()" title="Quick Tutorial">
                <i class="fas fa-play"></i>
            </button>
            <button class="fab-item" onclick="toggleAccessibility()" title="Accessibility">
                <i class="fas fa-universal-access"></i>
            </button>
        </div>
    </div>
    
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
        <!-- Add animated waves -->
        <div class="waves-container">
            <div class="wave wave-1"></div>
            <div class="wave wave-2"></div>
            <div class="wave wave-3"></div>
        </div>
    </div>

    <main class="login-main">
        <div class="container">
            <div class="login-wrapper" data-aos="fade-up" data-aos-duration="1000">
                <!-- Left Side - Enhanced Branding -->
                <div class="branding-section" data-aos="fade-right" data-aos-delay="200">
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
                            <div class="stat-item" data-aos="zoom-in" data-aos-delay="500">
                                <div class="stat-number">50K+</div>
                                <div class="stat-label">Happy Customers</div>
                            </div>
                            <div class="stat-item" data-aos="zoom-in" data-aos-delay="600">
                                <div class="stat-number">99%</div>
                                <div class="stat-label">Satisfaction Rate</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Enhanced Login Form -->
                <div class="login-section" data-aos="fade-left" data-aos-delay="400">
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
                                <div class="error-message" id="errorMessage" data-aos="shake">
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
                            
                            <div class="form-group" data-aos="fade-up" data-aos-delay="100">
                                <div class="input-wrapper">
                                    <div class="input-icon-container">
                                        <i class="fas fa-user input-icon"></i>
                                    </div>
                                    <input type="text" id="username" name="username" required autocomplete="username" placeholder=" ">
                                    <div class="input-focus-border"></div>
                                    <div class="input-glow"></div>
                                    <label for="username" class="floating-label">Username</label>
                                </div>
                                <div class="input-hint">Enter your registered username</div>
                            </div>
                            
                            <div class="form-group" data-aos="fade-up" data-aos-delay="200">
                                <div class="input-wrapper">
                                    <div class="input-icon-container">
                                        <i class="fas fa-lock input-icon"></i>
                                    </div>
                                    <input type="password" id="password" name="password" required autocomplete="current-password" placeholder=" ">
                                    <button type="button" class="password-toggle" onclick="togglePassword()">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <div class="input-focus-border"></div>
                                    <div class="input-glow"></div>
                                    <label for="password" class="floating-label">Password</label>
                                </div>
                                <div class="input-hint">Enter your password</div>
                            </div>
                            
                            <div class="form-options" data-aos="fade-up" data-aos-delay="300">
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
                            
                            <button type="submit" class="login-btn" name="login" id="loginBtn" data-aos="fade-up" data-aos-delay="400">
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
                            
                            <div class="social-login" data-aos="fade-up" data-aos-delay="500">
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
                            
                            <div class="form-footer" data-aos="fade-up" data-aos-delay="600">
                                <p>Don't have an account? <a href="signup.php" class="signup-link">Create Account</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Enhanced Alternative Login Options -->
            <div class="alternative-login" data-aos="fade-up" data-aos-delay="700">
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

    <!-- Help & Support Modal -->
    <div class="modal" id="helpModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3><i class="fas fa-life-ring"></i> Help & Support</h3>
                <button class="modal-close" onclick="closeHelpModal()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="help-sections">
                    <div class="help-section">
                        <h4><i class="fas fa-question-circle"></i> Common Issues</h4>
                        <ul>
                            <li>Forgot your password? Use the "Forgot Password" link</li>
                            <li>Can't remember username? Contact support</li>
                            <li>Account locked? Wait 15 minutes or contact support</li>
                        </ul>
                    </div>
                    <div class="help-section">
                        <h4><i class="fas fa-phone"></i> Contact Support</h4>
                        <p>Need immediate assistance?</p>
                        <div class="contact-options">
                            <a href="tel:+1234567890" class="contact-btn">
                                <i class="fas fa-phone"></i> Call Us
                            </a>
                            <a href="mailto:support@freshwash.com" class="contact-btn">
                                <i class="fas fa-envelope"></i> Email Support
                            </a>
                        </div>
                    </div>
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

    <!-- Loading Overlay -->
    <div class="loading-overlay" id="loadingOverlay">
        <div class="loading-content">
            <div class="loading-spinner"></div>
            <p>Loading...</p>
        </div>
    </div>

    <!-- AOS Library for scroll animations -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="js/login.js"></script>
</body>
</html>