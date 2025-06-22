<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FreshWash - Premium Laundry Services</title>
    <meta name="description" content="Professional laundry and dry cleaning services delivered to your doorstep">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- CSS -->
    <link rel="stylesheet" href="css/index.css">
    
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  </head>
  <body>
    <?php include('header.php') ?>
    
    <!-- Hero Section with Modern Slider -->
    <section class="hero-section">
        <div class="hero-slider">
            <div class="slide active" style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('images/1.jpeg')">
                <div class="slide-content" data-aos="fade-up">
                    <h1 class="gradient-text">Professional Laundry Services</h1>
                    <p>Experience premium care for your clothes with our expert cleaning services</p>
                    <a href="order.php" class="cta-button hover-effect">
                        <span>Start Your Order</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            
            <div class="slide" style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('images/2.jpeg')">
                <div class="slide-content" data-aos="fade-up">
                    <h1 class="gradient-text">Fast & Reliable Delivery</h1>
                    <p>We pick up, clean, and deliver your clothes right to your doorstep</p>
                    <a href="service.php" class="cta-button hover-effect">
                        <span>View Services</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            
            <div class="slide" style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('images/3.jpeg')">
                <div class="slide-content" data-aos="fade-up">
                    <h1 class="gradient-text">Eco-Friendly Cleaning</h1>
                    <p>Environmentally conscious cleaning solutions for a better tomorrow</p>
                    <a href="about_us.php" class="cta-button hover-effect">
                        <span>Learn More</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Slider Navigation -->
        <div class="slider-nav">
            <button class="nav-btn prev hover-effect" onclick="changeSlide(-1)">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="nav-btn next hover-effect" onclick="changeSlide(1)">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
        
        <!-- Slider Dots -->
        <div class="slider-dots">
            <span class="dot active" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>
        
        <!-- Scroll Indicator -->
        <div class="scroll-indicator">
            <div class="scroll-arrow">
                <i class="fas fa-chevron-down"></i>
            </div>
            <span>Scroll to explore</span>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="how-it-works" data-aos="fade-up">
        <div class="container">
            <div class="section-header">
                <h2>How It Works</h2>
                <p>Simple steps to get your laundry done professionally</p>
            </div>
            
            <div class="steps-grid">
                <div class="step-card hover-lift animate-child" data-aos="fade-up" data-aos-delay="100">
                    <div class="step-icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <div class="step-number">1</div>
                    <h3>Sign Up & Login</h3>
                    <p>Create your account and log in to access our services</p>
                </div>
                
                <div class="step-card hover-lift animate-child" data-aos="fade-up" data-aos-delay="200">
                    <div class="step-icon">
                        <i class="fas fa-list-check"></i>
                    </div>
                    <div class="step-number">2</div>
                    <h3>Choose Service</h3>
                    <p>Select from our range of professional cleaning services</p>
                </div>
                
                <div class="step-card hover-lift animate-child" data-aos="fade-up" data-aos-delay="300">
                    <div class="step-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="step-number">3</div>
                    <h3>Place Order</h3>
                    <p>Schedule pickup and specify your cleaning preferences</p>
                </div>
                
                <div class="step-card hover-lift animate-child" data-aos="fade-up" data-aos-delay="400">
                    <div class="step-icon">
                        <i class="fas fa-truck"></i>
                    </div>
                    <div class="step-number">4</div>
                    <h3>Pickup & Delivery</h3>
                    <p>We collect, clean, and deliver your clothes back to you</p>
                </div>
            </div>
            
            <div class="cta-section" data-aos="zoom-in">
                <a href="order.php" class="primary-button hover-effect">
                    <span>Start Your Order Now</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section class="about-section" data-aos="fade-up">
        <div class="container">
            <div class="about-content">
                <div class="about-text" data-aos="fade-right">
                    <h2>About FreshWash</h2>
                    <p class="subtitle">Your trusted partner for premium laundry services</p>
                    <p>At FreshWash, we understand that your clothes deserve the best care. With years of experience in the laundry industry, we provide professional cleaning services that ensure your garments look and feel their best.</p>
                    
                    <div class="features">
                        <div class="feature animate-child">
                            <i class="fas fa-check-circle"></i>
                            <span>Professional cleaning standards</span>
                        </div>
                        <div class="feature animate-child">
                            <i class="fas fa-check-circle"></i>
                            <span>Eco-friendly detergents</span>
                        </div>
                        <div class="feature animate-child">
                            <i class="fas fa-check-circle"></i>
                            <span>Fast turnaround time</span>
                        </div>
                        <div class="feature animate-child">
                            <i class="fas fa-check-circle"></i>
                            <span>Convenient pickup & delivery</span>
                        </div>
                    </div>
                    
                    <a href="about_us.php" class="secondary-button hover-effect">
                        <span>Learn More About Us</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                
                <div class="about-image parallax" data-speed="0.3" data-aos="fade-left">
                    <img src="images/laundry-worker-istock-459292777.jpg" alt="Professional Laundry Service">
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services-section" data-aos="fade-up">
        <div class="container">
            <div class="section-header">
                <h2>Our Services</h2>
                <p>Comprehensive cleaning solutions for all your laundry needs</p>
            </div>
            
            <div class="services-grid">
                <div class="service-card hover-lift animate-child" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-image">
                        <img src="images/dryCloth.jpg" alt="Dry Cleaning">
                        <div class="service-overlay">
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                    <div class="service-content">
                        <h3>Dry Cleaning</h3>
                        <p>Professional dry cleaning for delicate fabrics and formal wear</p>
                        <a href="service.php" class="service-link hover-effect">Learn More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                
                <div class="service-card hover-lift animate-child" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-image">
                        <img src="images/Fold.jpg" alt="Wash and Fold">
                        <div class="service-overlay">
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                    <div class="service-content">
                        <h3>Wash & Fold</h3>
                        <p>Complete washing, drying, and folding service for everyday clothes</p>
                        <a href="service.php" class="service-link hover-effect">Learn More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                
                <div class="service-card hover-lift animate-child" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-image">
                        <img src="images/iron.jpg" alt="Iron Only">
                        <div class="service-overlay">
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                    <div class="service-content">
                        <h3>Iron Only</h3>
                        <p>Professional pressing and ironing for wrinkle-free garments</p>
                        <a href="service.php" class="service-link hover-effect">Learn More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                
                <div class="service-card hover-lift animate-child" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-image">
                        <img src="images/washingMachine.jpg" alt="Wash Only">
                        <div class="service-overlay">
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                    <div class="service-content">
                        <h3>Wash Only</h3>
                        <p>Professional washing service with premium detergents</p>
                        <a href="service.php" class="service-link hover-effect">Learn More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section" data-aos="fade-up">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item hover-lift animate-child" data-aos="zoom-in" data-aos-delay="100">
                    <div class="stat-number" data-count="1000">0</div>
                    <div class="stat-label">Happy Customers</div>
                </div>
                
                <div class="stat-item hover-lift animate-child" data-aos="zoom-in" data-aos-delay="200">
                    <div class="stat-number" data-count="5000">0</div>
                    <div class="stat-label">Orders Completed</div>
                </div>
                
                <div class="stat-item hover-lift animate-child" data-aos="zoom-in" data-aos-delay="300">
                    <div class="stat-number" data-count="24">0</div>
                    <div class="stat-label">Hours Support</div>
                </div>
                
                <div class="stat-item hover-lift animate-child" data-aos="zoom-in" data-aos-delay="400">
                    <div class="stat-number" data-count="100">0</div>
                    <div class="stat-label">% Satisfaction</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section" data-aos="fade-up">
        <div class="container">
            <div class="section-header">
                <h2>What Our Customers Say</h2>
                <p>Real feedback from satisfied customers</p>
            </div>
            
            <div class="testimonials-grid">
                <div class="testimonial-card glass-card hover-lift animate-child" data-aos="fade-up" data-aos-delay="100">
                    <div class="testimonial-content">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p>"Amazing service! My clothes have never looked better. Fast delivery and excellent quality."</p>
                        <div class="testimonial-author">
                            <div class="author-avatar">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="author-info">
                                <h4>Sarah Johnson</h4>
                                <span>Regular Customer</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="testimonial-card glass-card hover-lift animate-child" data-aos="fade-up" data-aos-delay="200">
                    <div class="testimonial-content">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p>"Professional, reliable, and eco-friendly. Exactly what I was looking for in a laundry service."</p>
                        <div class="testimonial-author">
                            <div class="author-avatar">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="author-info">
                                <h4>Michael Chen</h4>
                                <span>Business Owner</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="testimonial-card glass-card hover-lift animate-child" data-aos="fade-up" data-aos-delay="300">
                    <div class="testimonial-content">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <p>"Convenient pickup and delivery. The app is easy to use and the service is top-notch!"</p>
                        <div class="testimonial-author">
                            <div class="author-avatar">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="author-info">
                                <h4>Emily Rodriguez</h4>
                                <span>Working Professional</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="cta-section-final" data-aos="fade-up">
        <div class="container">
            <div class="cta-content">
                <h2>Ready to Experience Premium Laundry Services?</h2>
                <p>Join thousands of satisfied customers who trust us with their laundry needs</p>
                <div class="cta-buttons">
                    <a href="order.php" class="primary-button hover-effect">
                        <span>Start Your Order</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                    <a href="contact_us.php" class="secondary-button hover-effect">
                        <span>Contact Us</span>
                        <i class="fas fa-phone"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Floating Action Button -->
    <div class="fab-container">
        <button class="fab-main hover-effect" onclick="scrollToTop()">
            <i class="fas fa-arrow-up"></i>
        </button>
        <div class="fab-options">
            <button class="fab-option hover-effect" onclick="window.location.href='order.php'" title="Place Order">
                <i class="fas fa-shopping-cart"></i>
            </button>
            <button class="fab-option hover-effect" onclick="window.location.href='contact_us.php'" title="Contact Us">
                <i class="fas fa-phone"></i>
            </button>
            <button class="fab-option hover-effect" onclick="window.location.href='faqs.php'" title="FAQs">
                <i class="fas fa-question"></i>
            </button>
        </div>
    </div>

    <?php include('footer.php') ?>
    
    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="js/slider.js"></script>
    <script>
        // Initialize AOS animations
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });
        
        // Scroll to top function
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
        
        // Show/hide floating action button
        window.addEventListener('scroll', () => {
            const fab = document.querySelector('.fab-container');
            if (window.scrollY > 300) {
                fab.classList.add('visible');
            } else {
                fab.classList.remove('visible');
            }
        });
        
        // Enhanced scroll indicator
        const scrollIndicator = document.querySelector('.scroll-indicator');
        if (scrollIndicator) {
            scrollIndicator.addEventListener('click', () => {
                document.querySelector('.how-it-works').scrollIntoView({
                    behavior: 'smooth'
                });
            });
        }
        
        // Add loading animation
        window.addEventListener('load', () => {
            document.body.classList.add('loaded');
        });
    </script>
  </body>
</html>