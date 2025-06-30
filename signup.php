<?php
include 'db_connect.php';

if (isset($_POST['signup'])) {
    $firstName = $_POST['firstName'];
    $userName = $_POST['userName'];
    $phoneNum = $_POST['phoneNum'];
    $email = $_POST['email'];
    $address = $_POST['add'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    
    if ($password !== $confirmPassword) {
        $error_message = "Passwords do not match!";
    } else {
        // Check for duplicate email
        $sql = "SELECT * FROM customer WHERE email = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $error_message = "Email already exists!";
        } else {
            // Check for duplicate username
            $sql = "SELECT * FROM customer WHERE UserName = ?";
            $stmt = $connection->prepare($sql);
            $stmt->bind_param("s", $userName);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $error_message = "Username already exists!";
            } else {
                $sql = "INSERT INTO customer (Name, UserName, password, PhoneNumber, email, Address) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $connection->prepare($sql);
                $stmt->bind_param("ssssss", $firstName, $userName, $password, $phoneNum, $email, $address);
                
                if ($stmt->execute()) {
                    $success_message = "Account created successfully! You can now login.";
                } else {
                    $error_message = "Error creating account. Please try again.";
                }
            }
        }
        $stmt->close();
    }
}

$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account - FreshWash</title>
    <link rel="stylesheet" href="css/signup.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <?php include 'header.php' ?>
    
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

    <main class="signup-main">
        <div class="container">
            <div class="signup-wrapper">
                <!-- Left Side - Enhanced Branding -->
                <div class="branding-section">
                    <div class="branding-content">
                        <div class="logo-container">
                            <div class="logo-glow"></div>
                            <img src="images/logo4.png" alt="FreshWash Logo" class="brand-logo">
                            <h1 class="brand-title">FreshWash</h1>
                        </div>
                        <h2 class="welcome-title">Join FreshWash Today!</h2>
                        <p class="welcome-subtitle">Create your account and start enjoying premium laundry services with convenience at your doorstep.</p>
                        
                        <div class="benefits-list">
                            <div class="benefit-item" data-aos="fade-up" data-aos-delay="100">
                                <div class="benefit-icon">
                                    <i class="fas fa-truck"></i>
                                </div>
                                <div class="benefit-content">
                                    <span class="benefit-title">Free Pickup & Delivery</span>
                                    <span class="benefit-desc">We come to you, hassle-free</span>
                                </div>
                            </div>
                            <div class="benefit-item" data-aos="fade-up" data-aos-delay="200">
                                <div class="benefit-icon">
                                    <i class="fas fa-satellite-dish"></i>
                                </div>
                                <div class="benefit-content">
                                    <span class="benefit-title">Real-time Tracking</span>
                                    <span class="benefit-desc">Track your orders live</span>
                                </div>
                            </div>
                            <div class="benefit-item" data-aos="fade-up" data-aos-delay="300">
                                <div class="benefit-icon">
                                    <i class="fas fa-percentage"></i>
                                </div>
                                <div class="benefit-content">
                                    <span class="benefit-title">Member Discounts</span>
                                    <span class="benefit-desc">Exclusive deals for members</span>
                                </div>
                            </div>
                            <div class="benefit-item" data-aos="fade-up" data-aos-delay="400">
                                <div class="benefit-icon">
                                    <i class="fas fa-headset"></i>
                                </div>
                                <div class="benefit-content">
                                    <span class="benefit-title">24/7 Support</span>
                                    <span class="benefit-desc">Always here to help you</span>
                                </div>
                            </div>
                            <div class="benefit-item" data-aos="fade-up" data-aos-delay="500">
                                <div class="benefit-icon">
                                    <i class="fas fa-crown"></i>
                                </div>
                                <div class="benefit-content">
                                    <span class="benefit-title">Premium Quality</span>
                                    <span class="benefit-desc">Best-in-class service</span>
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
                            <div class="stat-item">
                                <div class="stat-number">24/7</div>
                                <div class="stat-label">Support Available</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Enhanced Signup Form -->
                <div class="signup-section">
                    <div class="signup-container">
                        <div class="form-header">
                            <div class="header-icon">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <h2>Create Account</h2>
                            <p>Fill in your details to get started</p>
                        </div>

                        <?php if (isset($error_message)): ?>
                            <div class="error-message">
                                <div class="error-icon">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </div>
                                <div class="error-content">
                                    <span class="error-title">Error</span>
                                    <span class="error-text"><?php echo $error_message; ?></span>
                                </div>
                                <button class="error-close" onclick="this.parentElement.remove()">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        <?php endif; ?>

                        <?php if (isset($success_message)): ?>
                            <div class="success-message">
                                <div class="success-icon">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <div class="success-content">
                                    <span class="success-title">Success</span>
                                    <span class="success-text"><?php echo $success_message; ?></span>
                                </div>
                                <button class="error-close" onclick="this.parentElement.remove()">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        <?php endif; ?>
                        
                        <form method="post" action="signup.php" class="signup-form" id="signupForm">
                            <!-- Account Information -->
                            <div class="form-section">
                                <h3 class="section-title">Account Information</h3>
                                <div class="form-row">
                                    <div class="form-group">
                                        <div class="input-wrapper">
                                            <input type="text" id="firstName" name="firstName" required autocomplete="given-name" placeholder=" ">
                                            <label for="firstName" class="floating-label">Full Name</label>
                                            <div class="input-focus-border"></div>
                                            <div class="input-glow"></div>
                                            <div class="field-error"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-wrapper">
                                            <input type="text" id="userName" name="userName" required autocomplete="username" placeholder=" ">
                                            <label for="userName" class="floating-label">Username</label>
                                            <div class="input-focus-border"></div>
                                            <div class="input-glow"></div>
                                            <div class="field-error"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-wrapper">
                                        <input type="email" id="email" name="email" required autocomplete="email" placeholder=" ">
                                        <label for="email" class="floating-label">Email Address</label>
                                        <div class="input-focus-border"></div>
                                        <div class="input-glow"></div>
                                        <div class="field-error"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Contact Information -->
                            <div class="form-section">
                                <h3 class="section-title">Contact Information</h3>
                                <div class="form-row">
                                    <div class="form-group">
                                        <div class="input-wrapper">
                                            <input type="tel" id="phoneNum" name="phoneNum" required autocomplete="tel" placeholder=" ">
                                            <label for="phoneNum" class="floating-label">Phone Number</label>
                                            <div class="input-focus-border"></div>
                                            <div class="input-glow"></div>
                                            <div class="field-error"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-wrapper">
                                            <input type="text" id="address" name="add" required autocomplete="street-address" placeholder=" ">
                                            <label for="address" class="floating-label">Full Address</label>
                                            <div class="input-focus-border"></div>
                                            <div class="input-glow"></div>
                                            <div class="field-error"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Security Information -->
                            <div class="form-section">
                                <h3 class="section-title">Security Information</h3>
                                <div class="form-row">
                                    <div class="form-group">
                                        <div class="input-wrapper">
                                            <input type="password" id="password" name="password" required autocomplete="new-password" placeholder=" ">
                                            <label for="password" class="floating-label">Password</label>
                                            <div class="input-focus-border"></div>
                                            <div class="input-glow"></div>
                                            <div class="field-error"></div>
                                            <button type="button" class="password-toggle" onclick="togglePassword('password')">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                        <div class="password-strength" id="passwordStrength"></div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-wrapper">
                                            <input type="password" id="confirmPassword" name="confirmPassword" required autocomplete="new-password" placeholder=" ">
                                            <label for="confirmPassword" class="floating-label">Confirm Password</label>
                                            <div class="input-focus-border"></div>
                                            <div class="input-glow"></div>
                                            <div class="field-error"></div>
                                            <button type="button" class="password-toggle" onclick="togglePassword('confirmPassword')">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Terms and Conditions -->
                            <div class="form-section">
                                <div class="form-options">
                                    <label class="checkbox-container">
                                        <input type="checkbox" name="terms" id="terms" required>
                                        <span class="checkmark"></span>
                                        <span class="checkbox-text">I agree to the <a href="terms.php" target="_blank">Terms & Conditions</a> and <a href="privacy_policy.php" target="_blank">Privacy Policy</a></span>
                                    </label>
                                    <label class="checkbox-container">
                                        <input type="checkbox" name="newsletter" id="newsletter">
                                        <span class="checkmark"></span>
                                        <span class="checkbox-text">Subscribe to our newsletter</span>
                                    </label>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="form-section">
                                <button type="submit" class="signup-btn" name="signup">
                                    <div class="btn-content">
                                        <span class="btn-text">Create Account</span>
                                        <i class="fas fa-arrow-right btn-icon"></i>
                                    </div>
                                    <div class="btn-loading">
                                        <div class="spinner"></div>
                                        <span>Creating Account...</span>
                                    </div>
                                    <div class="btn-success">
                                        <i class="fas fa-check"></i>
                                        <span>Account Created!</span>
                                    </div>
                                </button>
                            </div>

                            <!-- Social Signup -->
                            <div class="social-signup">
                                <div class="divider">
                                    <span>or sign up with</span>
                                </div>
                                <div class="social-buttons">
                                    <button type="button" class="social-btn google-btn" onclick="handleSocialSignup('google')">
                                        <i class="fab fa-google social-icon"></i>
                                        <span>Google</span>
                                    </button>
                                    <button type="button" class="social-btn facebook-btn" onclick="handleSocialSignup('facebook')">
                                        <i class="fab fa-facebook-f social-icon"></i>
                                        <span>Facebook</span>
                                    </button>
                                </div>
                            </div>

                            <!-- Form Footer -->
                            <div class="form-footer">
                                <p>Already have an account? <a href="login.php" class="login-link">Sign In</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Success Notification -->
    <div class="notification" id="successNotification">
        <div class="notification-content">
            <div class="notification-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="notification-text">
                <span class="notification-title">Welcome to FreshWash!</span>
                <span class="notification-message">Your account has been created successfully.</span>
            </div>
        </div>
    </div>

    <script src="js/signup.js"></script>
</body>
</html>
