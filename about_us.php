<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Modern Laundry Service</title>
    <link rel="stylesheet" href="css/about_us.css">
    <link rel="stylesheet" href="css/testimonial.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
    <?php include'header.php'?>
    
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content" data-aos="fade-up">
            <h1 class="hero-title">About Our Laundry Service</h1>
            <p class="hero-subtitle">Revolutionizing laundry with technology, sustainability, and exceptional care</p>
            <div class="hero-stats">
                <div class="stat-item" data-aos="fade-up" data-aos-delay="200">
                    <i class="fas fa-users"></i>
                    <span class="stat-number" data-target="5000">0</span>
                    <span class="stat-label">Happy Customers</span>
                </div>
                <div class="stat-item" data-aos="fade-up" data-aos-delay="400">
                    <i class="fas fa-tshirt"></i>
                    <span class="stat-number" data-target="25000">0</span>
                    <span class="stat-label">Garments Cleaned</span>
                </div>
                <div class="stat-item" data-aos="fade-up" data-aos-delay="600">
                    <i class="fas fa-star"></i>
                    <span class="stat-number" data-target="98">0</span>
                    <span class="stat-label">Satisfaction Rate</span>
                </div>
            </div>
        </div>
        <div class="hero-image" data-aos="fade-left">
            <img src="images/about.png" alt="About Our Service">
        </div>
    </section>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Description Section -->
        <section class="description-section" data-aos="fade-up">
            <div class="container">
                <div class="description-content">
                    <div class="description-text">
                        <h2 class="section-title">Our Story</h2>
                        <p class="description-paragraph">
                            Welcome to our online laundry service, where convenience meets quality. 
                            We're dedicated to simplifying your laundry routine by providing timely pickups, 
                            expert care, and prompt delivery. Our commitment to excellence drives us to use 
                            advanced techniques and eco-friendly practices, ensuring your clothes look their 
                            best while minimizing environmental impact.
                        </p>
                        <p class="description-paragraph">
                            With a focus on reliability and convenience, trust us to handle your laundry 
                            needs with care, freeing up your time to focus on what truly matters. Experience 
                            the difference with our seamless service, designed to make your life easier, 
                            one load at a time.
                        </p>
                        <button class="cta-button" onclick="scrollToSection('values')">
                            <span>Learn More</span>
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                    <div class="description-image">
                        <div class="image-card">
                            <img src="images/washing clothes.jpg" alt="Laundry Service">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Values Section -->
        <section id="values" class="values-section">
            <div class="container">
                <h2 class="section-title text-center" data-aos="fade-up">Our Core Values</h2>
                <div class="values-grid">
                    <div class="value-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="value-icon">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <h3>Our Goal</h3>
                        <p>To revolutionize the way you experience laundry by eliminating stress and hassle, 
                           offering convenience, reliability, and exceptional care for your garments.</p>
                    </div>
                    
                    <div class="value-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="value-icon">
                            <i class="fas fa-rocket"></i>
                        </div>
                        <h3>Our Mission</h3>
                        <p>To redefine the laundry experience by providing seamless, eco-friendly solutions 
                           that prioritize quality and customer satisfaction through innovative technology.</p>
                    </div>
                    
                    <div class="value-card" data-aos="fade-up" data-aos-delay="300">
                        <div class="value-icon">
                            <i class="fas fa-eye"></i>
                        </div>
                        <h3>Our Vision</h3>
                        <p>To become the leading sustainable laundry service, setting industry standards 
                           for quality, innovation, and environmental responsibility.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="features-section">
            <div class="container">
                <h2 class="section-title text-center" data-aos="fade-up">Why Choose Us</h2>
                <div class="features-grid">
                    <div class="feature-item" data-aos="fade-up" data-aos-delay="100">
                        <div class="feature-icon">
                            <i class="fas fa-leaf"></i>
                        </div>
                        <h3>Eco-Friendly</h3>
                        <p>We use sustainable practices and biodegradable detergents to protect the environment.</p>
                    </div>
                    
                    <div class="feature-item" data-aos="fade-up" data-aos-delay="200">
                        <div class="feature-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h3>Fast Delivery</h3>
                        <p>Same-day pickup and delivery available with real-time tracking for your convenience.</p>
                    </div>
                    
                    <div class="feature-item" data-aos="fade-up" data-aos-delay="300">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3>Quality Guarantee</h3>
                        <p>100% satisfaction guarantee with professional care for all types of fabrics.</p>
                    </div>
                    
                    <div class="feature-item" data-aos="fade-up" data-aos-delay="400">
                        <div class="feature-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h3>Easy Booking</h3>
                        <p>Simple online booking system with instant confirmation and flexible scheduling.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section class="testimonials-section">
            <div class="container">
                <h2 class="section-title text-center" data-aos="fade-up">What Our Customers Say</h2>
                <p class="section-subtitle text-center" data-aos="fade-up" data-aos-delay="100">
                    Don't just take our word for it - hear from our satisfied customers
                </p>
                
                <div class="testimonial-slider" data-aos="fade-up" data-aos-delay="200">
                    <div class="testimonial-container">
                        <div class="testimonial">
                            <div class="testimonial-content">
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <p>"This laundry service has completely transformed my routine! The quality is exceptional and the convenience is unmatched. Highly recommend!"</p>
                                <div class="testimonial-author">
                                    <img src="images/user.png" alt="Emily Fernando" class="author-avatar">
                                    <div class="author-info">
                                        <span class="author-name">Emily Fernando</span>
                                        <span class="author-title">Regular Customer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="testimonial">
                            <div class="testimonial-content">
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <p>"The eco-friendly approach and attention to detail are impressive. My clothes have never looked better, and I feel good about the environmental impact."</p>
                                <div class="testimonial-author">
                                    <img src="images/user.png" alt="Thomas Shelby" class="author-avatar">
                                    <div class="author-info">
                                        <span class="author-name">Thomas Shelby</span>
                                        <span class="author-title">Business Professional</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="testimonial">
                            <div class="testimonial-content">
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <p>"Fast, reliable, and professional service. The mobile app makes booking so easy, and the delivery is always on time. Perfect for my busy schedule!"</p>
                                <div class="testimonial-author">
                                    <img src="images/user.png" alt="Amelia Parker" class="author-avatar">
                                    <div class="author-info">
                                        <span class="author-name">Amelia Parker</span>
                                        <span class="author-title">Working Parent</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="prev-btn" aria-label="Previous Testimonial">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="next-btn" aria-label="Next Testimonial">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta-section" data-aos="fade-up">
            <div class="container">
                <div class="cta-content">
                    <h2>Ready to Experience Better Laundry Service?</h2>
                    <p>Join thousands of satisfied customers who trust us with their laundry needs</p>
                    <div class="cta-buttons">
                        <a href="service.php" class="cta-button primary">
                            <span>Book Now</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                        <a href="contact_us.php" class="cta-button secondary">
                            <span>Contact Us</span>
                            <i class="fas fa-phone"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
    <?php include'footer.php'?>
    
    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="js/about.js"></script>
</body>
</html>
