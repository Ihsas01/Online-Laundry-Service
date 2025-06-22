<?php
    include 'db_connect.php';

    $success_message = '';
    $error_message = '';

    if (isset($_POST['submit'])) {
        $fname = $_POST['fname'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $lnumber = $_POST['lnumber'];
        $vehicle = $_POST['Vehicle'];
        $vnumber = $_POST['Vnumber'];
        $uname = $_POST['uname'];
        $pw = $_POST['pw'];
        
        // Basic validation
        if (empty($fname) || empty($gender) || empty($phone) || empty($email) || empty($address) || 
            empty($lnumber) || empty($vehicle) || empty($vnumber) || empty($uname) || empty($pw)) {
            $error_message = "All fields are required";
        } else {
            $sql = "INSERT INTO driver (fname, gender, phone, email, address, lnumber, Vehicle, Vnumber, uname, pw)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            
            $stmt = $connection->prepare($sql);
            $stmt->bind_param("ssssssssss", $fname, $gender, $phone, $email, $address, $lnumber, $vehicle, $vnumber, $uname, $pw);
            
            if ($stmt->execute()) {
                $success_message = "Registration successful! You can now login.";
            } else {
                $error_message = "Registration failed. Please try again.";
            }
            
            $stmt->close();
        }
        
        mysqli_close($connection);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Registration - Laundry Service</title>
    <link rel="stylesheet" href="css/driverregister.css">
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

        <!-- Registration Form -->
        <div class="registration-container">
            <div class="form-header">
                <div class="logo-container">
                    <i class="fas fa-truck logo-icon"></i>
                    <h1 class="logo-text">Driver Registration</h1>
                </div>
                <p class="subtitle">Join our delivery team and start earning today!</p>
            </div>

            <?php if($success_message): ?>
                <div class="alert alert-success" id="successAlert">
                    <i class="fas fa-check-circle"></i>
                    <span><?php echo $success_message; ?></span>
                    <button class="alert-close" onclick="closeAlert('successAlert')">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            <?php endif; ?>

            <?php if($error_message): ?>
                <div class="alert alert-error" id="errorAlert">
                    <i class="fas fa-exclamation-circle"></i>
                    <span><?php echo $error_message; ?></span>
                    <button class="alert-close" onclick="closeAlert('errorAlert')">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            <?php endif; ?>

            <form action="driverregister.php" method="POST" class="registration-form" id="registrationForm">
                <!-- Progress Indicator -->
                <div class="progress-container">
                    <div class="progress-bar">
                        <div class="progress-fill" id="progressFill"></div>
                    </div>
                    <div class="progress-steps">
                        <div class="step active" data-step="1">
                            <i class="fas fa-user"></i>
                            <span>Personal</span>
                        </div>
                        <div class="step" data-step="2">
                            <i class="fas fa-car"></i>
                            <span>Vehicle</span>
                        </div>
                        <div class="step" data-step="3">
                            <i class="fas fa-lock"></i>
                            <span>Account</span>
                        </div>
                    </div>
                </div>

                <!-- Step 1: Personal Information -->
                <div class="form-step active" data-step="1">
                    <div class="step-header">
                        <h2><i class="fas fa-user"></i> Personal Information</h2>
                        <p>Tell us about yourself</p>
                    </div>

                    <div class="form-grid">
                        <div class="input-group">
                            <div class="input-wrapper">
                                <i class="fas fa-user input-icon"></i>
                                <input type="text" name="fname" id="fname" placeholder="Enter your full name" required>
                                <label for="fname" class="input-label">Full Name</label>
                            </div>
                        </div>

                        <div class="input-group">
                            <label class="radio-group-label">Gender</label>
                            <div class="radio-group">
                                <label class="radio-container">
                                    <input type="radio" name="gender" value="Male" required>
                                    <span class="radio-custom"></span>
                                    <i class="fas fa-mars"></i>
                                    <span>Male</span>
                                </label>
                                <label class="radio-container">
                                    <input type="radio" name="gender" value="Female" required>
                                    <span class="radio-custom"></span>
                                    <i class="fas fa-venus"></i>
                                    <span>Female</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-group">
                            <div class="input-wrapper">
                                <i class="fas fa-phone input-icon"></i>
                                <input type="tel" name="phone" id="phone" placeholder="+94 12 345 6789" required>
                                <label for="phone" class="input-label">Phone Number</label>
                            </div>
                        </div>

                        <div class="input-group">
                            <div class="input-wrapper">
                                <i class="fas fa-envelope input-icon"></i>
                                <input type="email" name="email" id="email" placeholder="Enter your email" required>
                                <label for="email" class="input-label">Email Address</label>
                            </div>
                        </div>

                        <div class="input-group full-width">
                            <div class="input-wrapper">
                                <i class="fas fa-map-marker-alt input-icon"></i>
                                <input type="text" name="address" id="address" placeholder="Enter your address" required>
                                <label for="address" class="input-label">Address</label>
                            </div>
                        </div>

                        <div class="input-group">
                            <div class="input-wrapper">
                                <i class="fas fa-id-card input-icon"></i>
                                <input type="text" name="lnumber" id="lnumber" placeholder="Enter license number" required>
                                <label for="lnumber" class="input-label">License Number</label>
                            </div>
                        </div>

                        <div class="input-group">
                            <div class="input-wrapper">
                                <i class="fas fa-calendar input-icon"></i>
                                <input type="date" id="expiry" required>
                                <label for="expiry" class="input-label">License Expiry Date</label>
                            </div>
                        </div>

                        <div class="input-group full-width">
                            <div class="file-upload-wrapper">
                                <i class="fas fa-upload input-icon"></i>
                                <input type="file" id="licenseImage" accept="image/*" required>
                                <label for="licenseImage" class="file-upload-label">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <span>Upload License Image</span>
                                    <small>Click to browse or drag and drop</small>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="step-actions">
                        <button type="button" class="btn btn-next" onclick="nextStep()">
                            <span>Next Step</span>
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                <!-- Step 2: Vehicle Information -->
                <div class="form-step" data-step="2">
                    <div class="step-header">
                        <h2><i class="fas fa-car"></i> Vehicle Information</h2>
                        <p>Tell us about your vehicle</p>
                    </div>

                    <div class="form-grid">
                        <div class="input-group">
                            <div class="input-wrapper">
                                <i class="fas fa-car input-icon"></i>
                                <select name="Vehicle" id="vehicle" required>
                                    <option value="">Select Vehicle Type</option>
                                    <option value="Motor Bike">Motor Bike</option>
                                    <option value="Three Wheel">Three Wheel</option>
                                    <option value="Car">Car</option>
                                    <option value="Van">Van</option>
                                    <option value="Lorry">Lorry</option>
                                </select>
                                <label for="vehicle" class="input-label">Vehicle Type</label>
                            </div>
                        </div>

                        <div class="input-group">
                            <div class="input-wrapper">
                                <i class="fas fa-hashtag input-icon"></i>
                                <input type="text" name="Vnumber" id="vnumber" placeholder="Enter vehicle number" required>
                                <label for="vnumber" class="input-label">Vehicle Number</label>
                            </div>
                        </div>

                        <div class="input-group">
                            <div class="input-wrapper">
                                <i class="fas fa-gas-pump input-icon"></i>
                                <select id="fuelType" required>
                                    <option value="">Select Fuel Type</option>
                                    <option value="Petrol">Petrol</option>
                                    <option value="Diesel">Diesel</option>
                                    <option value="Electric">Electric</option>
                                    <option value="Hybrid">Hybrid</option>
                                </select>
                                <label for="fuelType" class="input-label">Fuel Type</label>
                            </div>
                        </div>

                        <div class="input-group full-width">
                            <div class="input-wrapper">
                                <i class="fas fa-clipboard-list input-icon"></i>
                                <textarea id="vehicleCondition" rows="4" placeholder="Describe your vehicle condition"></textarea>
                                <label for="vehicleCondition" class="input-label">Vehicle Condition</label>
                            </div>
                        </div>
                    </div>

                    <div class="step-actions">
                        <button type="button" class="btn btn-prev" onclick="prevStep()">
                            <i class="fas fa-arrow-left"></i>
                            <span>Previous</span>
                        </button>
                        <button type="button" class="btn btn-next" onclick="nextStep()">
                            <span>Next Step</span>
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                <!-- Step 3: Account Credentials -->
                <div class="form-step" data-step="3">
                    <div class="step-header">
                        <h2><i class="fas fa-lock"></i> Account Credentials</h2>
                        <p>Create your account</p>
                    </div>

                    <div class="form-grid">
                        <div class="input-group">
                            <div class="input-wrapper">
                                <i class="fas fa-user input-icon"></i>
                                <input type="text" name="uname" id="uname" placeholder="Choose a username" required>
                                <label for="uname" class="input-label">Username</label>
                            </div>
                        </div>

                        <div class="input-group">
                            <div class="input-wrapper">
                                <i class="fas fa-lock input-icon"></i>
                                <input type="password" name="pw" id="password" placeholder="Create a password" required>
                                <label for="password" class="input-label">Password</label>
                                <button type="button" class="password-toggle" onclick="togglePassword('password')">
                                    <i class="fas fa-eye" id="passwordIcon"></i>
                                </button>
                            </div>
                            <div class="password-strength" id="passwordStrength">
                                <div class="strength-bar">
                                    <div class="strength-fill" id="strengthFill"></div>
                                </div>
                                <span class="strength-text" id="strengthText">Password strength</span>
                            </div>
                        </div>

                        <div class="input-group">
                            <div class="input-wrapper">
                                <i class="fas fa-lock input-icon"></i>
                                <input type="password" id="confirmPassword" placeholder="Confirm your password" required>
                                <label for="confirmPassword" class="input-label">Confirm Password</label>
                                <button type="button" class="password-toggle" onclick="togglePassword('confirmPassword')">
                                    <i class="fas fa-eye" id="confirmPasswordIcon"></i>
                                </button>
                            </div>
                        </div>

                        <div class="input-group full-width">
                            <label class="checkbox-container">
                                <input type="checkbox" id="terms" required>
                                <span class="checkmark"></span>
                                <span class="checkbox-text">
                                    I have read and agreed with the 
                                    <a href="terms.php" target="_blank">Terms and Conditions</a> & 
                                    <a href="privacy_policy.php" target="_blank">Privacy Policy</a>
                                </span>
                            </label>
                        </div>
                    </div>

                    <div class="step-actions">
                        <button type="button" class="btn btn-prev" onclick="prevStep()">
                            <i class="fas fa-arrow-left"></i>
                            <span>Previous</span>
                        </button>
                        <button type="submit" name="submit" class="btn btn-submit" id="submitBtn">
                            <span class="btn-text">Create Account</span>
                            <div class="btn-loader" id="btnLoader">
                                <div class="spinner"></div>
                            </div>
                        </button>
                    </div>
                </div>
            </form>

            <div class="login-link">
                <p>Already have an account? 
                    <a href="driverlogin.php" class="login-btn">
                        <span>Sign In</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </p>
            </div>
        </div>

        <!-- Loading Overlay -->
        <div class="loading-overlay" id="loadingOverlay">
            <div class="loading-content">
                <div class="loading-spinner"></div>
                <p>Creating your account...</p>
            </div>
        </div>
    </div>

    <script src="js/driverregister.js"></script>
</body>
</html>

