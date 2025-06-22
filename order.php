<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Your Order - Modern Laundry Service</title>
    <link rel="stylesheet" href="css/order.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>
    <?php include'header.php'?>
    
    <!-- Order Progress Navigation -->
    <section class="progress-section">
        <div class="container">
            <div class="progress-tracker" data-aos="fade-up">
                <div class="progress-step active" data-step="1">
                    <div class="step-icon">
                        <i class="fas fa-tshirt"></i>
                    </div>
                    <span class="step-label">Item Selection</span>
                    <div class="step-line"></div>
                </div>
                <div class="progress-step" data-step="2">
                    <div class="step-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <span class="step-label">Address & Contact</span>
                    <div class="step-line"></div>
                </div>
                <div class="progress-step" data-step="3">
                    <div class="step-icon">
                        <i class="fas fa-truck"></i>
                    </div>
                    <span class="step-label">Collection & Delivery</span>
                    <div class="step-line"></div>
                </div>
                <div class="progress-step" data-step="4">
                    <div class="step-icon">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <span class="step-label">Payment</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Order Form -->
    <main class="order-main">
        <div class="container">
            <div class="order-container" data-aos="fade-up">
                <div class="order-header">
                    <h1 class="order-title">Select Your Items</h1>
                    <p class="order-subtitle">Choose the items you want to have cleaned and specify quantities</p>
                </div>

                <!-- Service Categories -->
                <section class="service-categories" data-aos="fade-up" data-aos-delay="200">
                    <div class="category-tabs">
                        <button class="category-tab active" data-category="wash-fold">
                            <i class="fas fa-tshirt"></i>
                            <span>Wash & Fold</span>
                        </button>
                        <button class="category-tab" data-category="dry-clean">
                            <i class="fas fa-spray-can"></i>
                            <span>Dry Clean</span>
                        </button>
                        <button class="category-tab" data-category="iron">
                            <i class="fas fa-iron"></i>
                            <span>Iron & Press</span>
                        </button>
                        <button class="category-tab" data-category="special">
                            <i class="fas fa-star"></i>
                            <span>Special Care</span>
                        </button>
                    </div>
                </section>

                <!-- Item Selection Grid -->
                <section class="items-section" data-aos="fade-up" data-aos-delay="300">
                    <div class="items-grid" id="wash-fold-items">
                        <div class="item-card" data-item="tshirt" data-price="2.50">
                            <div class="item-image">
                                <img src="images/t-shirt.png" alt="T-Shirt">
                                <div class="item-overlay">
                                    <i class="fas fa-plus"></i>
                                </div>
                            </div>
                            <div class="item-info">
                                <h3>T-Shirt</h3>
                                <p class="item-price">$2.50</p>
                                <div class="quantity-controls">
                                    <button class="qty-btn minus" onclick="updateQuantity('tshirt', -1)">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <span class="quantity" id="tshirt-qty">0</span>
                                    <button class="qty-btn plus" onclick="updateQuantity('tshirt', 1)">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="item-card" data-item="shirt" data-price="3.00">
                            <div class="item-image">
                                <img src="images/shirt.webp" alt="Dress Shirt">
                                <div class="item-overlay">
                                    <i class="fas fa-plus"></i>
                                </div>
                            </div>
                            <div class="item-info">
                                <h3>Dress Shirt</h3>
                                <p class="item-price">$3.00</p>
                                <div class="quantity-controls">
                                    <button class="qty-btn minus" onclick="updateQuantity('shirt', -1)">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <span class="quantity" id="shirt-qty">0</span>
                                    <button class="qty-btn plus" onclick="updateQuantity('shirt', 1)">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="item-card" data-item="pants" data-price="4.00">
                            <div class="item-image">
                                <img src="images/t-shirt.png" alt="Pants">
                                <div class="item-overlay">
                                    <i class="fas fa-plus"></i>
                                </div>
                            </div>
                            <div class="item-info">
                                <h3>Pants</h3>
                                <p class="item-price">$4.00</p>
                                <div class="quantity-controls">
                                    <button class="qty-btn minus" onclick="updateQuantity('pants', -1)">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <span class="quantity" id="pants-qty">0</span>
                                    <button class="qty-btn plus" onclick="updateQuantity('pants', 1)">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="item-card" data-item="dress" data-price="6.00">
                            <div class="item-image">
                                <img src="images/dress-gown-frock-woman-clothing-512.webp" alt="Dress">
                                <div class="item-overlay">
                                    <i class="fas fa-plus"></i>
                                </div>
                            </div>
                            <div class="item-info">
                                <h3>Dress</h3>
                                <p class="item-price">$6.00</p>
                                <div class="quantity-controls">
                                    <button class="qty-btn minus" onclick="updateQuantity('dress', -1)">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <span class="quantity" id="dress-qty">0</span>
                                    <button class="qty-btn plus" onclick="updateQuantity('dress', 1)">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="item-card" data-item="jacket" data-price="5.50">
                            <div class="item-image">
                                <img src="images/t-shirt.png" alt="Jacket">
                                <div class="item-overlay">
                                    <i class="fas fa-plus"></i>
                                </div>
                            </div>
                            <div class="item-info">
                                <h3>Jacket</h3>
                                <p class="item-price">$5.50</p>
                                <div class="quantity-controls">
                                    <button class="qty-btn minus" onclick="updateQuantity('jacket', -1)">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <span class="quantity" id="jacket-qty">0</span>
                                    <button class="qty-btn plus" onclick="updateQuantity('jacket', 1)">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="item-card" data-item="sweater" data-price="4.50">
                            <div class="item-image">
                                <img src="images/t-shirt.png" alt="Sweater">
                                <div class="item-overlay">
                                    <i class="fas fa-plus"></i>
                                </div>
                            </div>
                            <div class="item-info">
                                <h3>Sweater</h3>
                                <p class="item-price">$4.50</p>
                                <div class="quantity-controls">
                                    <button class="qty-btn minus" onclick="updateQuantity('sweater', -1)">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <span class="quantity" id="sweater-qty">0</span>
                                    <button class="qty-btn plus" onclick="updateQuantity('sweater', 1)">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Order Summary -->
                <section class="order-summary" data-aos="fade-up" data-aos-delay="400">
                    <div class="summary-card">
                        <div class="summary-header">
                            <h3>Order Summary</h3>
                            <button class="clear-all-btn" onclick="clearAllItems()">
                                <i class="fas fa-trash"></i>
                                Clear All
                            </button>
                        </div>
                        
                        <div class="summary-items" id="summary-items">
                            <div class="empty-state">
                                <i class="fas fa-shopping-bag"></i>
                                <p>No items selected yet</p>
                                <span>Add items to your order to get started</span>
                            </div>
                        </div>
                        
                        <div class="summary-totals">
                            <div class="total-row">
                                <span>Subtotal:</span>
                                <span id="subtotal">$0.00</span>
                            </div>
                            <div class="total-row">
                                <span>Service Fee:</span>
                                <span id="service-fee">$2.00</span>
                            </div>
                            <div class="total-row total">
                                <span>Total:</span>
                                <span id="total">$2.00</span>
                            </div>
                        </div>
                        
                        <div class="summary-actions">
                            <button class="btn-secondary" onclick="saveOrder()">
                                <i class="fas fa-save"></i>
                                Save for Later
                            </button>
                            <button class="btn-primary" onclick="proceedToNext()" disabled id="proceed-btn">
                                <span>Continue to Address</span>
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </section>

                <!-- Quick Actions -->
                <section class="quick-actions" data-aos="fade-up" data-aos-delay="500">
                    <div class="action-cards">
                        <div class="action-card">
                            <div class="action-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <h4>Express Service</h4>
                            <p>Same day pickup & delivery</p>
                            <button class="action-btn">Learn More</button>
                        </div>
                        
                        <div class="action-card">
                            <div class="action-icon">
                                <i class="fas fa-leaf"></i>
                            </div>
                            <h4>Eco-Friendly</h4>
                            <p>Biodegradable detergents</p>
                            <button class="action-btn">Learn More</button>
                        </div>
                        
                        <div class="action-card">
                            <div class="action-icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <h4>Quality Guarantee</h4>
                            <p>100% satisfaction or re-clean</p>
                            <button class="action-btn">Learn More</button>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>

    <!-- Success Notification -->
    <div class="notification" id="notification">
        <div class="notification-content">
            <i class="fas fa-check-circle"></i>
            <span id="notification-message">Item added successfully!</span>
        </div>
    </div>

    <?php include'footer.php'?>
    
    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="js/order.js"></script>
</body>
</html>