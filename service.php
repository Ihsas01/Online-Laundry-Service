<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services - Online Laundry Service</title>
    <link rel="stylesheet" href="./css/service.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php include 'header.php' ?>
    
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title">
                <span class="title-line">Premium</span>
                <span class="title-line">Laundry</span>
                <span class="title-line">Services</span>
            </h1>
            <p class="hero-subtitle">Professional care for your garments with convenience at your doorstep</p>
            <div class="hero-stats">
                <div class="stat-item">
                    <i class="fas fa-users"></i>
                    <span class="stat-number">5000+</span>
                    <span class="stat-label">Happy Customers</span>
                </div>
                <div class="stat-item">
                    <i class="fas fa-star"></i>
                    <span class="stat-number">4.8</span>
                    <span class="stat-label">Rating</span>
                </div>
                <div class="stat-item">
                    <i class="fas fa-clock"></i>
                    <span class="stat-number">24h</span>
                    <span class="stat-label">Delivery</span>
                </div>
            </div>
        </div>
        <div class="hero-visual">
            <div class="floating-card card-1">
                <i class="fas fa-tshirt"></i>
            </div>
            <div class="floating-card card-2">
                <i class="fas fa-washing-machine"></i>
            </div>
            <div class="floating-card card-3">
                <i class="fas fa-truck"></i>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Our Services</h2>
                <p class="section-subtitle">Choose from our range of professional laundry services</p>
            </div>
            
            <div class="services-grid">
                <!-- Washing Service -->
                <div class="service-card" data-service="washing">
                    <div class="service-image">
                        <img src="./images/washing clothes.jpg" alt="Washing Service">
                        <div class="service-overlay">
                            <i class="fas fa-play"></i>
                        </div>
                    </div>
                    <div class="service-content">
                        <div class="service-icon">
                            <i class="fas fa-tshirt"></i>
                        </div>
                        <h3 class="service-title">Washing</h3>
                        <p class="service-description">
                            Professional washing service with premium detergents. We bring you a bag, you fill it with clothes. 
                            We then send your dirty clothes for a quick spin, tumble dry and return them to you crisp clean.
                        </p>
                        <div class="service-features">
                            <span class="feature-tag">Per Kilo Pricing</span>
                            <span class="feature-tag">Premium Detergents</span>
                            <span class="feature-tag">Gentle Care</span>
                        </div>
                        <button class="service-btn" onclick="openServiceModal('washing')">
                            Learn More <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                <!-- Dry Cleaning Service -->
                <div class="service-card" data-service="dry-cleaning">
                    <div class="service-image">
                        <img src="./images/drycleaning.jpg" alt="Dry Cleaning Service">
                        <div class="service-overlay">
                            <i class="fas fa-play"></i>
                        </div>
                    </div>
                    <div class="service-content">
                        <div class="service-icon">
                            <i class="fas fa-spray-can"></i>
                        </div>
                        <h3 class="service-title">Dry Cleaning</h3>
                        <p class="service-description">
                            Delicate fabrics that can't withstand detergent? We handle your precious garments with care. 
                            Freshly pressed suits delivered right to your door, right when you need them.
                        </p>
                        <div class="service-features">
                            <span class="feature-tag">Delicate Fabrics</span>
                            <span class="feature-tag">Door Delivery</span>
                            <span class="feature-tag">Professional Pressing</span>
                        </div>
                        <button class="service-btn" onclick="openServiceModal('dry-cleaning')">
                            Learn More <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                <!-- Ironing Service -->
                <div class="service-card" data-service="ironing">
                    <div class="service-image">
                        <img src="./images/ironing.jpeg" alt="Ironing Service">
                        <div class="service-overlay">
                            <i class="fas fa-play"></i>
                        </div>
                    </div>
                    <div class="service-content">
                        <div class="service-icon">
                            <i class="fas fa-iron"></i>
                        </div>
                        <h3 class="service-title">Only Iron</h3>
                        <p class="service-description">
                            Have a stack of clothes that don't need washing but could use ironing? 
                            Send them to us and get back freshly steam ironed ready-to-wear outfits.
                        </p>
                        <div class="service-features">
                            <span class="feature-tag">Steam Ironing</span>
                            <span class="feature-tag">Wrinkle-Free</span>
                            <span class="feature-tag">Quick Service</span>
                        </div>
                        <button class="service-btn" onclick="openServiceModal('ironing')">
                            Learn More <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                <!-- Wash and Fold Service -->
                <div class="service-card" data-service="wash-fold">
                    <div class="service-image">
                        <img src="./images/wash_fold_laundry.jpg" alt="Wash and Fold Service">
                        <div class="service-overlay">
                            <i class="fas fa-play"></i>
                        </div>
                    </div>
                    <div class="service-content">
                        <div class="service-icon">
                            <i class="fas fa-layer-group"></i>
                        </div>
                        <h3 class="service-title">Wash and Fold</h3>
                        <p class="service-description">
                            A wardrobe full of fresh, clean clothes which are neatly pressed. 
                            Don't waste another beautiful weekend for washing, drying and folding laundry.
                        </p>
                        <div class="service-features">
                            <span class="feature-tag">Complete Service</span>
                            <span class="feature-tag">Neatly Folded</span>
                            <span class="feature-tag">Weekend Relief</span>
                        </div>
                        <button class="service-btn" onclick="openServiceModal('wash-fold')">
                            Learn More <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <div class="features-grid">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-truck"></i>
                    </div>
                    <h3>Free Pickup & Delivery</h3>
                    <p>We come to you! No need to leave your home or office.</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3>24/7 Service</h3>
                    <p>Place orders anytime, day or night. We're always here for you.</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3>Quality Guarantee</h3>
                    <p>100% satisfaction guaranteed or we'll make it right.</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3>Easy Booking</h3>
                    <p>Book your service in just a few clicks through our app.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2>Ready to Experience Premium Laundry Service?</h2>
                <p>Join thousands of satisfied customers who trust us with their garments</p>
                <div class="cta-buttons">
                    <a href="order.php" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Place Order
                    </a>
                    <a href="contact_us.php" class="btn btn-secondary">
                        <i class="fas fa-phone"></i> Contact Us
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Service Modal -->
    <div id="serviceModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div id="modalContent"></div>
        </div>
    </div>

    <?php include 'footer.php' ?>
    
    <script src="./js/service.js"></script>
</body>
</html>