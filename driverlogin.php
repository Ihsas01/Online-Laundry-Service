<?php 
session_start();
include 'db_connect.php'; 

$error_message = '';
$success_message = '';

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT Driver_id FROM driver WHERE uname = ? AND pw = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("ss", $username, $password);

    $stmt->execute();
    $stmt->bind_result($user_id);

    if ($stmt->fetch()) {
        $_SESSION['Driver_id'] = $user_id;
        header("Location: driverprofile.php");
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
    <title>Driver Login - Laundry Service</title>
    <link rel="stylesheet" href="css/driverlogin.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <!-- Animated Background -->
        <div class="background-animation">
            <div class="floating-shapes">
                <div class="shape shape-1"></div>
                <div class="shape shape-2"></div>
                <div class="shape shape-3"></div>
                <div class="shape shape-4"></div>
                <div class="shape shape-5"></div>
            </div>
        </div>

        <!-- Main Login Card -->
        <div class="login-card">
            <div class="card-header">
                <div class="logo-container">
                    <i class="fas fa-truck logo-icon"></i>
                    <h1 class="logo-text">Driver Portal</h1>
                </div>
                <p class="subtitle">Welcome back! Please sign in to your account</p>
            </div>

            <?php if($error_message): ?>
                <div class="alert alert-error" id="errorAlert">
                    <i class="fas fa-exclamation-circle"></i>
                    <span><?php echo $error_message; ?></span>
                    <button class="alert-close" onclick="closeAlert('errorAlert')">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            <?php endif; ?>

            <form action="driverlogin.php" method="post" class="login-form" id="loginForm">
                <div class="input-group">
                    <div class="input-wrapper">
                        <i class="fas fa-user input-icon"></i>
                        <input 
                            type="text" 
                            name="username" 
                            id="username"
                            placeholder="Enter your username" 
                            required
                            autocomplete="username"
                        >
                        <label for="username" class="input-label">Username</label>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-wrapper">
                        <i class="fas fa-lock input-icon"></i>
                        <input 
                            type="password" 
                            name="password" 
                            id="password"
                            placeholder="Enter your password" 
                            required
                            autocomplete="current-password"
                        >
                        <label for="password" class="input-label">Password</label>
                        <button type="button" class="password-toggle" onclick="togglePassword()">
                            <i class="fas fa-eye" id="passwordIcon"></i>
                        </button>
                    </div>
                </div>

                <div class="form-options">
                    <label class="checkbox-container">
                        <input type="checkbox" name="remember" id="remember">
                        <span class="checkmark"></span>
                        <span class="checkbox-text">Remember me</span>
                    </label>
                    <a href="#" class="forgot-password">Forgot Password?</a>
                </div>

                <button type="submit" name="login" class="login-btn" id="loginBtn">
                    <span class="btn-text">Sign In</span>
                    <div class="btn-loader" id="btnLoader">
                        <div class="spinner"></div>
                    </div>
                </button>
            </form>

            <div class="divider">
                <span>or</span>
            </div>

            <div class="social-login">
                <button class="social-btn google-btn">
                    <i class="fab fa-google"></i>
                    <span>Continue with Google</span>
                </button>
            </div>

            <div class="register-link">
                <p>Don't have an account? 
                    <a href="driverregister.php" class="register-btn">
                        <span>Register Now</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </p>
            </div>
        </div>

        <!-- Loading Overlay -->
        <div class="loading-overlay" id="loadingOverlay">
            <div class="loading-content">
                <div class="loading-spinner"></div>
                <p>Signing you in...</p>
            </div>
        </div>
    </div>

    <script src="js/driverlogin.js"></script>
</body>
</html>