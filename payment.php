<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Methods - FreshWash</title>
    
    <!-- CSS Files -->
    <link rel="stylesheet" href="css/payment.css">
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
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <div class="header-text">
                        <h1>Choose Payment Method</h1>
                        <p>Select your preferred payment option to complete your order</p>
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
                    <div class="progress-line completed"></div>
                    <div class="progress-step completed">
                        <div class="step-icon">
                            <i class="fas fa-truck"></i>
                        </div>
                        <span class="step-label">Delivery</span>
                    </div>
                    <div class="progress-line active"></div>
                    <div class="progress-step active">
                        <div class="step-icon">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <span class="step-label">Payment</span>
                    </div>
                </div>
            </div>

            <!-- Payment Methods Section -->
            <div class="payment-section" data-aos="fade-up" data-aos-delay="400">
                <form action="cardpayment.php" method="post" id="paymentForm">
                    <div class="payment-methods">
                        <!-- Credit/Debit Card -->
                        <div class="payment-method-card" data-aos="fade-right" data-aos-delay="600">
                            <div class="method-header">
                                <div class="method-icon">
                                    <i class="fas fa-credit-card"></i>
                                </div>
                                <div class="method-info">
                                    <h3>Credit/Debit Card</h3>
                                    <p>Pay securely with Visa or Mastercard</p>
                                </div>
                                <div class="method-logos">
                                    <img src="images/icons8-visa-48.png" alt="Visa" class="card-logo">
                                    <img src="images/icons8-mastercard-48.png" alt="Mastercard" class="card-logo">
                                </div>
                            </div>
                            <div class="method-content">
                                <div class="radio-wrapper">
                                    <input type="radio" name="payment" value="card" id="card" class="payment-radio">
                                    <label for="card" class="radio-label">
                                        <span class="radio-custom"></span>
                                        <span class="radio-text">Secure payment with encryption</span>
                                    </label>
                                </div>
                                <div class="method-features">
                                    <div class="feature">
                                        <i class="fas fa-shield-alt"></i>
                                        <span>SSL Encrypted</span>
                                    </div>
                                    <div class="feature">
                                        <i class="fas fa-clock"></i>
                                        <span>Instant Processing</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Cash Payment -->
                        <div class="payment-method-card" data-aos="fade-left" data-aos-delay="800">
                            <div class="method-header">
                                <div class="method-icon">
                                    <i class="fas fa-money-bill-wave"></i>
                                </div>
                                <div class="method-info">
                                    <h3>Cash Payment</h3>
                                    <p>Pay with cash upon delivery</p>
                                </div>
                                <div class="method-logos">
                                    <img src="images/icons8-cash-64.png" alt="Cash" class="cash-logo">
                                </div>
                            </div>
                            <div class="method-content">
                                <div class="radio-wrapper">
                                    <input type="radio" name="payment" value="cash" id="cash" class="payment-radio">
                                    <label for="cash" class="radio-label">
                                        <span class="radio-custom"></span>
                                        <span class="radio-text">Pay when you receive your order</span>
                                    </label>
                                </div>
                                <div class="method-features">
                                    <div class="feature">
                                        <i class="fas fa-hand-holding-usd"></i>
                                        <span>No Extra Fees</span>
                                    </div>
                                    <div class="feature">
                                        <i class="fas fa-truck"></i>
                                        <span>Pay on Delivery</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- PayPal -->
                        <div class="payment-method-card" data-aos="fade-up" data-aos-delay="1000">
                            <div class="method-header">
                                <div class="method-icon">
                                    <i class="fab fa-paypal"></i>
                                </div>
                                <div class="method-info">
                                    <h3>PayPal</h3>
                                    <p>Pay with your PayPal account</p>
                                </div>
                                <div class="method-logos">
                                    <img src="images/icons8-paypal-48.png" alt="PayPal" class="paypal-logo">
                                </div>
                            </div>
                            <div class="method-content">
                                <div class="radio-wrapper">
                                    <input type="radio" name="payment" value="paypal" id="paypal" class="payment-radio">
                                    <label for="paypal" class="radio-label">
                                        <span class="radio-custom"></span>
                                        <span class="radio-text">Fast and secure online payment</span>
                                    </label>
                                </div>
                                <div class="method-features">
                                    <div class="feature">
                                        <i class="fas fa-lock"></i>
                                        <span>Buyer Protection</span>
                                    </div>
                                    <div class="feature">
                                        <i class="fas fa-globe"></i>
                                        <span>Global Payment</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Summary -->
                    <div class="order-summary" data-aos="fade-left" data-aos-delay="1200">
                        <div class="summary-header">
                            <h3><i class="fas fa-receipt"></i> Order Summary</h3>
                        </div>
                        <div class="summary-content">
                            <div class="summary-row">
                                <span>Service Total</span>
                                <span class="amount">$70.00</span>
                            </div>
                            <div class="summary-row">
                                <span>Service Charge</span>
                                <span class="amount">$5.00</span>
                            </div>
                            <div class="summary-row discount">
                                <span><i class="fas fa-tag"></i> First Order Discount</span>
                                <span class="amount">-$10.00</span>
                            </div>
                            <div class="summary-divider"></div>
                            <div class="summary-row total">
                                <span>Total Amount</span>
                                <span class="amount">$65.00</span>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="action-buttons" data-aos="fade-up" data-aos-delay="1400">
                        <button type="button" class="btn-secondary" onclick="history.back()">
                            <i class="fas fa-arrow-left"></i>
                            Back
                        </button>
                        <button type="submit" class="btn-primary" id="confirmBtn">
                            <i class="fas fa-lock"></i>
                            Proceed to Payment
                        </button>
                    </div>
                </form>
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

        // Payment method selection
        document.addEventListener('DOMContentLoaded', function() {
            const paymentCards = document.querySelectorAll('.payment-method-card');
            const confirmBtn = document.getElementById('confirmBtn');

            // Add click event to payment cards
            paymentCards.forEach(card => {
                card.addEventListener('click', function() {
                    // Remove active class from all cards
                    paymentCards.forEach(c => c.classList.remove('active'));
                    
                    // Add active class to clicked card
                    this.classList.add('active');
                    
                    // Check the radio button
                    const radio = this.querySelector('.payment-radio');
                    radio.checked = true;
                    
                    // Enable confirm button
                    confirmBtn.disabled = false;
                    confirmBtn.classList.add('enabled');
                });
            });

            // Form validation
            const paymentForm = document.getElementById('paymentForm');
            paymentForm.addEventListener('submit', function(e) {
                const selectedPayment = document.querySelector('input[name="payment"]:checked');
                
                if (!selectedPayment) {
                    e.preventDefault();
                    showNotification('Please select a payment method', 'error');
                    return;
                }
                
                // Show loading state
                confirmBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
                confirmBtn.disabled = true;
            });

            // Notification function
            function showNotification(message, type) {
                const notification = document.createElement('div');
                notification.className = `notification ${type}`;
                notification.innerHTML = `
                    <i class="fas fa-${type === 'error' ? 'exclamation-circle' : 'check-circle'}"></i>
                    <span>${message}</span>
                `;
                
                document.body.appendChild(notification);
                
                // Remove notification after 3 seconds
                setTimeout(() => {
                    notification.remove();
                }, 3000);
            }
        });
    </script>
</body>
</html>