<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Address & Contact Details - FreshWash</title>
    
    <!-- CSS Files -->
    <link rel="stylesheet" href="css/add_&_con.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
    <?php include 'header.php' ?>
    <?php include 'order_Navigate.php' ?>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <!-- Page Header -->
            <div class="page-header" data-aos="fade-down">
                <div class="header-content">
                    <div class="header-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="header-text">
                        <h1>Address & Contact Details</h1>
                        <p>Please provide your delivery information to complete your order</p>
                    </div>
                </div>
            </div>

            <!-- Progress Indicator -->
            <div class="progress-container" data-aos="fade-up" data-aos-delay="200">
                <div class="progress-bar">
                    <div class="progress-step completed">
                        <div class="step-icon">
                            <i class="fas fa-shopping-bag"></i>
                        </div>
                        <span class="step-label">Items</span>
                    </div>
                    <div class="progress-line active"></div>
                    <div class="progress-step active">
                        <div class="step-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <span class="step-label">Address</span>
                    </div>
                    <div class="progress-line"></div>
                    <div class="progress-step">
                        <div class="step-icon">
                            <i class="fas fa-truck"></i>
                        </div>
                        <span class="step-label">Delivery</span>
                    </div>
                </div>
            </div>

            <!-- Form Container -->
            <div class="form-container" data-aos="fade-up" data-aos-delay="400">
                <form id="addressForm" class="modern-form">
                    <div class="form-grid">
                        <!-- Personal Information Section -->
                        <div class="form-section" data-aos="fade-right" data-aos-delay="600">
                            <div class="section-header">
                                <div class="section-icon">
                                    <i class="fas fa-user"></i>
                                </div>
                                <h3>Personal Information</h3>
                            </div>
                            
                            <div class="form-group">
                                <label for="fullName" class="form-label">
                                    <i class="fas fa-user-circle"></i>
                                    Full Name
                                </label>
                                <div class="input-wrapper">
                                    <input type="text" id="fullName" name="fname" class="form-input" required>
                                    <div class="input-focus-border"></div>
                                </div>
                                <span class="error-message">Please enter your full name</span>
                            </div>

                            <div class="form-group">
                                <label for="mobileNumber" class="form-label">
                                    <i class="fas fa-phone"></i>
                                    Mobile Number
                                </label>
                                <div class="input-wrapper">
                                    <input type="tel" id="mobileNumber" name="phone" class="form-input" required>
                                    <div class="input-focus-border"></div>
                                </div>
                                <span class="error-message">Please enter a valid mobile number</span>
                            </div>
                        </div>

                        <!-- Location Information Section -->
                        <div class="form-section" data-aos="fade-left" data-aos-delay="800">
                            <div class="section-header">
                                <div class="section-icon">
                                    <i class="fas fa-map"></i>
                                </div>
                                <h3>Location Details</h3>
                            </div>
                            
                            <div class="form-group">
                                <label for="province" class="form-label">
                                    <i class="fas fa-building"></i>
                                    Province
                                </label>
                                <div class="input-wrapper">
                                    <input type="text" id="province" name="province" class="form-input" required>
                                    <div class="input-focus-border"></div>
                                </div>
                                <span class="error-message">Please enter your province</span>
                            </div>

                            <div class="form-group">
                                <label for="district" class="form-label">
                                    <i class="fas fa-map-pin"></i>
                                    District
                                </label>
                                <div class="input-wrapper">
                                    <input type="text" id="district" name="district" class="form-input" required>
                                    <div class="input-focus-border"></div>
                                </div>
                                <span class="error-message">Please enter your district</span>
                            </div>

                            <div class="form-group">
                                <label for="area" class="form-label">
                                    <i class="fas fa-location-dot"></i>
                                    Area
                                </label>
                                <div class="input-wrapper">
                                    <input type="text" id="area" name="Are" class="form-input" required>
                                    <div class="input-focus-border"></div>
                                </div>
                                <span class="error-message">Please enter your area</span>
                            </div>
                        </div>

                        <!-- Address Details Section -->
                        <div class="form-section full-width" data-aos="fade-up" data-aos-delay="1000">
                            <div class="section-header">
                                <div class="section-icon">
                                    <i class="fas fa-home"></i>
                                </div>
                                <h3>Address Details</h3>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="address" class="form-label">
                                        <i class="fas fa-map-marker-alt"></i>
                                        Complete Address
                                    </label>
                                    <div class="input-wrapper">
                                        <textarea id="address" name="address" class="form-input" rows="3" required></textarea>
                                        <div class="input-focus-border"></div>
                                    </div>
                                    <span class="error-message">Please enter your complete address</span>
                                </div>

                                <div class="form-group">
                                    <label for="landmark" class="form-label">
                                        <i class="fas fa-flag"></i>
                                        Landmark (Optional)
                                    </label>
                                    <div class="input-wrapper">
                                        <input type="text" id="landmark" name="landmark" class="form-input" placeholder="e.g., Near City Mall, Behind Bank">
                                        <div class="input-focus-border"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Delivery Preferences Section -->
                        <div class="form-section full-width" data-aos="fade-up" data-aos-delay="1200">
                            <div class="section-header">
                                <div class="section-icon">
                                    <i class="fas fa-truck"></i>
                                </div>
                                <h3>Delivery Preferences</h3>
                            </div>
                            
                            <div class="delivery-options">
                                <div class="option-card" data-option="home">
                                    <div class="option-icon">
                                        <i class="fas fa-home"></i>
                                    </div>
                                    <div class="option-content">
                                        <h4>Home Delivery</h4>
                                        <p>Deliver to your residential address</p>
                                    </div>
                                    <div class="option-radio">
                                        <input type="radio" id="homeDelivery" name="deliveryPlace" value="home" required>
                                        <label for="homeDelivery" class="radio-label"></label>
                                    </div>
                                </div>

                                <div class="option-card" data-option="office">
                                    <div class="option-icon">
                                        <i class="fas fa-building"></i>
                                    </div>
                                    <div class="option-content">
                                        <h4>Office Delivery</h4>
                                        <p>Deliver to your workplace</p>
                                    </div>
                                    <div class="option-radio">
                                        <input type="radio" id="officeDelivery" name="deliveryPlace" value="office" required>
                                        <label for="officeDelivery" class="radio-label"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="form-actions" data-aos="fade-up" data-aos-delay="1400">
                        <div class="action-buttons">
                            <a href="order.php" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i>
                                <span>Previous</span>
                            </a>
                            
                            <button type="submit" class="btn btn-primary">
                                <span>Next Step</span>
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Help Section -->
            <div class="help-section" data-aos="fade-up" data-aos-delay="1600">
                <div class="help-card">
                    <div class="help-icon">
                        <i class="fas fa-question-circle"></i>
                    </div>
                    <div class="help-content">
                        <h4>Need Help?</h4>
                        <p>If you have any questions about your delivery details, our customer support team is here to help.</p>
                        <a href="contact_us.php" class="help-link">
                            <i class="fas fa-headset"></i>
                            Contact Support
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include 'footer.php' ?>

    <!-- AOS Animation Library -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <!-- Custom JavaScript -->
    <script>
        // Initialize AOS animations
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });

        // Form validation and interactions
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('addressForm');
            const inputs = form.querySelectorAll('.form-input');
            const deliveryOptions = document.querySelectorAll('.option-card');
            const radioInputs = document.querySelectorAll('input[type="radio"]');

            // Input focus effects
            inputs.forEach(input => {
                const wrapper = input.closest('.input-wrapper');
                const label = input.closest('.form-group').querySelector('.form-label');

                input.addEventListener('focus', function() {
                    wrapper.classList.add('focused');
                    label.classList.add('active');
                });

                input.addEventListener('blur', function() {
                    if (!input.value) {
                        wrapper.classList.remove('focused');
                        label.classList.remove('active');
                    }
                    validateInput(input);
                });

                input.addEventListener('input', function() {
                    validateInput(input);
                });
            });

            // Delivery option selection
            deliveryOptions.forEach(option => {
                const radio = option.querySelector('input[type="radio"]');
                
                option.addEventListener('click', function() {
                    // Remove active class from all options
                    deliveryOptions.forEach(opt => opt.classList.remove('active'));
                    
                    // Add active class to selected option
                    option.classList.add('active');
                    
                    // Check the radio button
                    radio.checked = true;
                });
            });

            // Form submission
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                if (validateForm()) {
                    // Show success animation
                    showSuccessMessage();
                    
                    // Redirect to next page after delay
                    setTimeout(() => {
                        window.location.href = 'collecting.php';
                    }, 1500);
                }
            });

            // Input validation function
            function validateInput(input) {
                const wrapper = input.closest('.input-wrapper');
                const errorMessage = input.closest('.form-group').querySelector('.error-message');
                
                let isValid = true;
                let errorText = '';

                // Remove existing classes
                wrapper.classList.remove('valid', 'invalid');

                // Validation rules
                if (input.hasAttribute('required') && !input.value.trim()) {
                    isValid = false;
                    errorText = 'This field is required';
                } else if (input.type === 'tel' && input.value) {
                    const phoneRegex = /^[\+]?[1-9][\d]{0,15}$/;
                    if (!phoneRegex.test(input.value.replace(/\s/g, ''))) {
                        isValid = false;
                        errorText = 'Please enter a valid phone number';
                    }
                }

                // Apply validation result
                if (input.value.trim()) {
                    if (isValid) {
                        wrapper.classList.add('valid');
                        errorMessage.style.display = 'none';
                    } else {
                        wrapper.classList.add('invalid');
                        errorMessage.textContent = errorText;
                        errorMessage.style.display = 'block';
                    }
                } else {
                    errorMessage.style.display = 'none';
                }
            }

            // Form validation
            function validateForm() {
                let isValid = true;
                
                inputs.forEach(input => {
                    if (input.hasAttribute('required') && !input.value.trim()) {
                        isValid = false;
                        validateInput(input);
                    }
                });

                // Check if delivery option is selected
                const selectedDelivery = form.querySelector('input[name="deliveryPlace"]:checked');
                if (!selectedDelivery) {
                    isValid = false;
                    showDeliveryError();
                }

                return isValid;
            }

            // Show delivery error
            function showDeliveryError() {
                const deliverySection = document.querySelector('.delivery-options');
                deliverySection.classList.add('error');
                
                setTimeout(() => {
                    deliverySection.classList.remove('error');
                }, 3000);
            }

            // Success message
            function showSuccessMessage() {
                const successOverlay = document.createElement('div');
                successOverlay.className = 'success-overlay';
                successOverlay.innerHTML = `
                    <div class="success-content">
                        <div class="success-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <h3>Details Saved Successfully!</h3>
                        <p>Redirecting to next step...</p>
                    </div>
                `;
                
                document.body.appendChild(successOverlay);
                
                setTimeout(() => {
                    successOverlay.remove();
                }, 2000);
            }

            // Auto-save functionality
            let saveTimeout;
            inputs.forEach(input => {
                input.addEventListener('input', function() {
                    clearTimeout(saveTimeout);
                    saveTimeout = setTimeout(() => {
                        saveFormData();
                    }, 1000);
                });
            });

            function saveFormData() {
                const formData = new FormData(form);
                const data = Object.fromEntries(formData);
                localStorage.setItem('addressFormData', JSON.stringify(data));
            }

            // Load saved data
            function loadFormData() {
                const savedData = localStorage.getItem('addressFormData');
                if (savedData) {
                    const data = JSON.parse(savedData);
                    Object.keys(data).forEach(key => {
                        const input = form.querySelector(`[name="${key}"]`);
                        if (input) {
                            input.value = data[key];
                            if (input.value) {
                                input.closest('.input-wrapper').classList.add('focused');
                                input.closest('.form-group').querySelector('.form-label').classList.add('active');
                            }
                        }
                    });
                }
            }

            // Load saved data on page load
            loadFormData();
        });
    </script>
</body>
</html>

