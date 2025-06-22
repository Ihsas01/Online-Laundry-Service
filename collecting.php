<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collection & Delivery - FreshWash</title>
    
    <!-- CSS Files -->
    <link rel="stylesheet" href="css/collecting.css">
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
                        <i class="fas fa-truck"></i>
                    </div>
                    <div class="header-text">
                        <h1>Collection & Delivery</h1>
                        <p>Schedule your pickup and delivery times to complete your order</p>
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
                    <div class="progress-line completed"></div>
                    <div class="progress-step completed">
                        <div class="step-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <span class="step-label">Address</span>
                    </div>
                    <div class="progress-line active"></div>
                    <div class="progress-step active">
                        <div class="step-icon">
                            <i class="fas fa-truck"></i>
                        </div>
                        <span class="step-label">Delivery</span>
                    </div>
                </div>
            </div>

            <!-- Main Content Grid -->
            <div class="content-grid">
                <!-- Collection & Delivery Section -->
                <div class="schedule-section" data-aos="fade-right" data-aos-delay="400">
                    <div class="schedule-header">
                        <h2><i class="fas fa-calendar-alt"></i> Schedule Your Service</h2>
                        <p>Choose convenient times for pickup and delivery</p>
                    </div>

                    <!-- Collection Card -->
                    <div class="schedule-card collection-card" data-aos="fade-up" data-aos-delay="600">
                        <div class="card-header">
                            <div class="card-icon">
                                <i class="fas fa-box-open"></i>
                            </div>
                            <div class="card-title">
                                <h3>Collection Details</h3>
                                <p>When should we pick up your items?</p>
                            </div>
                        </div>
                        
                        <div class="card-content">
                            <div class="form-group">
                                <label for="collectionDate" class="form-label">
                                    <i class="fas fa-calendar"></i>
                                    Collection Date
                                </label>
                                <div class="input-wrapper">
                                    <input type="date" id="collectionDate" name="collectionDate" class="form-input" required>
                                    <div class="input-focus-border"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="collectionTime" class="form-label">
                                    <i class="fas fa-clock"></i>
                                    Preferred Time
                                </label>
                                <div class="input-wrapper">
                                    <select id="collectionTime" name="collectionTime" class="form-input" required>
                                        <option value="">Select time</option>
                                        <option value="09:00">9:00 AM</option>
                                        <option value="10:00">10:00 AM</option>
                                        <option value="11:00">11:00 AM</option>
                                        <option value="12:00">12:00 PM</option>
                                        <option value="13:00">1:00 PM</option>
                                        <option value="14:00">2:00 PM</option>
                                        <option value="15:00">3:00 PM</option>
                                        <option value="16:00">4:00 PM</option>
                                        <option value="17:00">5:00 PM</option>
                                    </select>
                                    <div class="input-focus-border"></div>
                                </div>
                            </div>

                            <div class="collection-note">
                                <i class="fas fa-info-circle"></i>
                                <span>We'll send you a notification 30 minutes before pickup</span>
                            </div>
                        </div>
                    </div>

                    <!-- Delivery Card -->
                    <div class="schedule-card delivery-card" data-aos="fade-up" data-aos-delay="800">
                        <div class="card-header">
                            <div class="card-icon">
                                <i class="fas fa-shipping-fast"></i>
                            </div>
                            <div class="card-title">
                                <h3>Delivery Details</h3>
                                <p>When would you like your items delivered?</p>
                            </div>
                        </div>
                        
                        <div class="card-content">
                            <div class="form-group">
                                <label for="deliveryDate" class="form-label">
                                    <i class="fas fa-calendar"></i>
                                    Delivery Date
                                </label>
                                <div class="input-wrapper">
                                    <input type="date" id="deliveryDate" name="deliveryDate" class="form-input" required>
                                    <div class="input-focus-border"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="deliveryTime" class="form-label">
                                    <i class="fas fa-clock"></i>
                                    Preferred Time
                                </label>
                                <div class="input-wrapper">
                                    <select id="deliveryTime" name="deliveryTime" class="form-input" required>
                                        <option value="">Select time</option>
                                        <option value="09:00">9:00 AM</option>
                                        <option value="10:00">10:00 AM</option>
                                        <option value="11:00">11:00 AM</option>
                                        <option value="12:00">12:00 PM</option>
                                        <option value="13:00">1:00 PM</option>
                                        <option value="14:00">2:00 PM</option>
                                        <option value="15:00">3:00 PM</option>
                                        <option value="16:00">4:00 PM</option>
                                        <option value="17:00">5:00 PM</option>
                                    </select>
                                    <div class="input-focus-border"></div>
                                </div>
                            </div>

                            <div class="delivery-note">
                                <i class="fas fa-info-circle"></i>
                                <span>Standard delivery takes 24-48 hours after collection</span>
                            </div>
                        </div>
                    </div>

                    <!-- Special Instructions -->
                    <div class="instructions-card" data-aos="fade-up" data-aos-delay="1000">
                        <div class="card-header">
                            <div class="card-icon">
                                <i class="fas fa-edit"></i>
                            </div>
                            <div class="card-title">
                                <h3>Special Instructions</h3>
                                <p>Any specific requirements for your order?</p>
                            </div>
                        </div>
                        
                        <div class="card-content">
                            <div class="form-group">
                                <label for="specialInstructions" class="form-label">
                                    <i class="fas fa-comment"></i>
                                    Additional Notes
                                </label>
                                <div class="input-wrapper">
                                    <textarea id="specialInstructions" name="specialInstructions" class="form-input" rows="3" placeholder="e.g., Ring doorbell twice, Call before delivery, Leave with neighbor..."></textarea>
                                    <div class="input-focus-border"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Summary Section -->
                <div class="summary-section" data-aos="fade-left" data-aos-delay="600">
                    <div class="summary-header">
                        <h2><i class="fas fa-receipt"></i> Order Summary</h2>
                        <p>Review your order details and pricing</p>
                    </div>

                    <div class="summary-card" data-aos="fade-up" data-aos-delay="800">
                        <!-- Items Summary -->
                        <div class="summary-section-items">
                            <div class="section-title">
                                <i class="fas fa-tshirt"></i>
                                <h3>Selected Items</h3>
                            </div>
                            
                            <div class="items-list">
                                <div class="item-row">
                                    <div class="item-info">
                                        <span class="item-name">Wash & Fold - Regular Clothes</span>
                                        <span class="item-quantity">5 kg</span>
                                    </div>
                                    <span class="item-price">$25.00</span>
                                </div>
                                
                                <div class="item-row">
                                    <div class="item-info">
                                        <span class="item-name">Dry Cleaning - Formal Shirts</span>
                                        <span class="item-quantity">3 pieces</span>
                                    </div>
                                    <span class="item-price">$18.00</span>
                                </div>
                                
                                <div class="item-row">
                                    <div class="item-info">
                                        <span class="item-name">Ironing - Bed Sheets</span>
                                        <span class="item-quantity">2 sets</span>
                                    </div>
                                    <span class="item-price">$12.00</span>
                                </div>
                                
                                <div class="item-row">
                                    <div class="item-info">
                                        <span class="item-name">Express Service</span>
                                        <span class="item-quantity">Same day</span>
                                    </div>
                                    <span class="item-price">$15.00</span>
                                </div>
                            </div>
                        </div>

                        <!-- Pricing Summary -->
                        <div class="summary-section-pricing">
                            <div class="section-title">
                                <i class="fas fa-calculator"></i>
                                <h3>Pricing Breakdown</h3>
                            </div>
                            
                            <div class="pricing-list">
                                <div class="price-row">
                                    <span class="price-label">Service Total</span>
                                    <span class="price-value">$70.00</span>
                                </div>
                                
                                <div class="price-row">
                                    <span class="price-label">Service Charge</span>
                                    <span class="price-value">$5.00</span>
                                </div>
                                
                                <div class="price-row discount">
                                    <span class="price-label">
                                        <i class="fas fa-tag"></i>
                                        First Order Discount
                                    </span>
                                    <span class="price-value">-$10.00</span>
                                </div>
                                
                                <div class="price-row total">
                                    <span class="price-label">Grand Total</span>
                                    <span class="price-value">$65.00</span>
                                </div>
                            </div>
                        </div>

                        <!-- Order Actions -->
                        <div class="summary-actions">
                            <div class="action-buttons">
                                <a href="add_&_con.php" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i>
                                    <span>Back</span>
                                </a>
                                
                                <button type="button" class="btn btn-primary" id="proceedToPayment">
                                    <span>Proceed to Payment</span>
                                    <i class="fas fa-credit-card"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Order Timeline -->
                    <div class="timeline-card" data-aos="fade-up" data-aos-delay="1000">
                        <div class="timeline-header">
                            <h3><i class="fas fa-route"></i> Order Timeline</h3>
                        </div>
                        
                        <div class="timeline">
                            <div class="timeline-item completed">
                                <div class="timeline-icon">
                                    <i class="fas fa-check"></i>
                                </div>
                                <div class="timeline-content">
                                    <h4>Order Placed</h4>
                                    <p>Your order has been confirmed</p>
                                </div>
                            </div>
                            
                            <div class="timeline-item active">
                                <div class="timeline-icon">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div class="timeline-content">
                                    <h4>Collection Scheduled</h4>
                                    <p>Waiting for pickup confirmation</p>
                                </div>
                            </div>
                            
                            <div class="timeline-item">
                                <div class="timeline-icon">
                                    <i class="fas fa-spinner"></i>
                                </div>
                                <div class="timeline-content">
                                    <h4>Processing</h4>
                                    <p>Your items are being cleaned</p>
                                </div>
                            </div>
                            
                            <div class="timeline-item">
                                <div class="timeline-icon">
                                    <i class="fas fa-truck"></i>
                                </div>
                            <div class="timeline-content">
                                <h4>Out for Delivery</h4>
                                <p>Your clean clothes are on the way</p>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Help Section -->
            <div class="help-section" data-aos="fade-up" data-aos-delay="1200">
                <div class="help-cards">
                    <div class="help-card">
                        <div class="help-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="help-content">
                            <h4>Flexible Scheduling</h4>
                            <p>Choose pickup and delivery times that work for you</p>
                        </div>
                    </div>
                    
                    <div class="help-card">
                        <div class="help-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div class="help-content">
                            <h4>Secure Payment</h4>
                            <p>Your payment information is protected with bank-level security</p>
                        </div>
                    </div>
                    
                    <div class="help-card">
                        <div class="help-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <div class="help-content">
                            <h4>24/7 Support</h4>
                            <p>Need help? Our customer support team is always available</p>
                        </div>
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

        // Form interactions and validation
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('.form-input');
            const proceedButton = document.getElementById('proceedToPayment');
            const collectionDate = document.getElementById('collectionDate');
            const deliveryDate = document.getElementById('deliveryDate');

            // Set minimum dates
            const today = new Date();
            const tomorrow = new Date(today);
            tomorrow.setDate(tomorrow.getDate() + 1);
            
            const minCollectionDate = tomorrow.toISOString().split('T')[0];
            collectionDate.min = minCollectionDate;
            
            const minDeliveryDate = new Date(tomorrow);
            minDeliveryDate.setDate(minDeliveryDate.getDate() + 1);
            deliveryDate.min = minDeliveryDate.toISOString().split('T')[0];

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

            // Date validation
            collectionDate.addEventListener('change', function() {
                const selectedDate = new Date(this.value);
                const minDelivery = new Date(selectedDate);
                minDelivery.setDate(minDelivery.getDate() + 1);
                deliveryDate.min = minDelivery.toISOString().split('T')[0];
                
                if (deliveryDate.value && new Date(deliveryDate.value) <= selectedDate) {
                    deliveryDate.value = '';
                }
            });

            // Form validation
            function validateInput(input) {
                const wrapper = input.closest('.input-wrapper');
                const successIcon = wrapper.querySelector('.success-icon');
                
                if (input.value.trim()) {
                    wrapper.classList.add('valid');
                    successIcon.style.display = 'block';
                } else {
                    wrapper.classList.remove('valid');
                    successIcon.style.display = 'none';
                }
            }

            // Proceed to payment
            proceedButton.addEventListener('click', function() {
                if (validateForm()) {
                    showSuccessMessage();
                    setTimeout(() => {
                        window.location.href = 'payment.php';
                    }, 2000);
                } else {
                    showValidationError();
                }
            });

            function validateForm() {
                const requiredInputs = document.querySelectorAll('.form-input[required]');
                let isValid = true;
                
                requiredInputs.forEach(input => {
                    if (!input.value.trim()) {
                        isValid = false;
                        input.closest('.input-wrapper').classList.add('invalid');
                    }
                });
                
                return isValid;
            }

            function showValidationError() {
                const errorMessage = document.createElement('div');
                errorMessage.className = 'validation-error';
                errorMessage.innerHTML = `
                    <div class="error-content">
                        <i class="fas fa-exclamation-triangle"></i>
                        <span>Please fill in all required fields</span>
                    </div>
                `;
                
                document.body.appendChild(errorMessage);
                
                setTimeout(() => {
                    errorMessage.remove();
                }, 3000);
            }

            function showSuccessMessage() {
                const successOverlay = document.createElement('div');
                successOverlay.className = 'success-overlay';
                successOverlay.innerHTML = `
                    <div class="success-content">
                        <div class="success-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <h3>Order Confirmed!</h3>
                        <p>Redirecting to payment...</p>
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
                const formData = {};
                inputs.forEach(input => {
                    if (input.value) {
                        formData[input.name] = input.value;
                    }
                });
                localStorage.setItem('collectionFormData', JSON.stringify(formData));
            }

            // Load saved data
            function loadFormData() {
                const savedData = localStorage.getItem('collectionFormData');
                if (savedData) {
                    const data = JSON.parse(savedData);
                    Object.keys(data).forEach(key => {
                        const input = document.querySelector(`[name="${key}"]`);
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

            // Timeline animation
            const timelineItems = document.querySelectorAll('.timeline-item');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate');
                    }
                });
            }, { threshold: 0.5 });

            timelineItems.forEach(item => {
                observer.observe(item);
            });
        });
    </script>
</body>
</html>