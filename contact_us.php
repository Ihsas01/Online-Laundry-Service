<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - FreshWash</title>
    <meta name="description" content="Get in touch with FreshWash for premium laundry services. We're here to help with all your cleaning needs.">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- CSS -->
    <link rel="stylesheet" href="css/contact_us.css">
    
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>
    <?php include('header.php') ?>
    
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content" data-aos="fade-up">
            <h1>Get in Touch</h1>
            <p>We're here to help with all your laundry and dry cleaning needs</p>
            <div class="hero-stats">
                <div class="stat-item" data-aos="fade-up" data-aos-delay="100">
                    <i class="fas fa-clock"></i>
                    <span class="stat-number">24/7</span>
                    <span class="stat-label">Support</span>
                </div>
                <div class="stat-item" data-aos="fade-up" data-aos-delay="200">
                    <i class="fas fa-users"></i>
                    <span class="stat-number">1000+</span>
                    <span class="stat-label">Happy Customers</span>
                </div>
                <div class="stat-item" data-aos="fade-up" data-aos-delay="300">
                    <i class="fas fa-star"></i>
                    <span class="stat-number">4.9</span>
                    <span class="stat-label">Rating</span>
                </div>
            </div>
        </div>
        <div class="hero-image" data-aos="fade-left">
            <img src="images/customer-service.jpg" alt="Customer Service">
        </div>
    </section>

    <!-- Contact Information Section -->
    <section class="contact-info-section">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <h2>Contact Information</h2>
                <p>Reach out to us through any of these channels</p>
            </div>
            
            <div class="contact-cards">
                <div class="contact-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="card-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h3>Visit Us</h3>
                    <p>43, Park Road<br>Colombo 06, Sri Lanka</p>
                    <a href="https://maps.google.com" target="_blank" class="card-link">
                        <i class="fas fa-external-link-alt"></i>
                        View on Map
                    </a>
                </div>
                
                <div class="contact-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="card-icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <h3>Call Us</h3>
                    <p>+94 76 391 3526</p>
                    <a href="tel:+94763913526" class="card-link">
                        <i class="fas fa-phone"></i>
                        Call Now
                    </a>
                </div>
                
                <div class="contact-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="card-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h3>Email Us</h3>
                    <p>Mohamedihsas001@gmail.com</p>
                    <a href="mailto:Mohamedihsas001@gmail.com" class="card-link">
                        <i class="fas fa-envelope"></i>
                        Send Email
                    </a>
                </div>
                
                <div class="contact-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="card-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3>Business Hours</h3>
                    <p>Mon - Fri: 8:00 AM - 8:00 PM<br>Sat - Sun: 9:00 AM - 6:00 PM</p>
                    <span class="status-indicator online">
                        <i class="fas fa-circle"></i>
                        Currently Open
                    </span>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="contact-form-section">
        <div class="container">
            <div class="form-container">
                <div class="form-content" data-aos="fade-right">
                    <div class="form-header">
                        <h2>Send us a Message</h2>
                        <p>We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
                    </div>
                    
                    <form id="contactForm" class="contact-form" data-aos="fade-up">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name">
                                    <i class="fas fa-user"></i>
                                    Full Name
                                </label>
                                <input type="text" id="name" name="name" placeholder="Enter your full name" required>
                                <div class="input-focus-border"></div>
                            </div>
                            
                            <div class="form-group">
                                <label for="email">
                                    <i class="fas fa-envelope"></i>
                                    Email Address
                                </label>
                                <input type="email" id="email" name="email" placeholder="Enter your email" required>
                                <div class="input-focus-border"></div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="phone">
                                    <i class="fas fa-phone"></i>
                                    Phone Number
                                </label>
                                <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>
                                <div class="input-focus-border"></div>
                            </div>
                            
                            <div class="form-group">
                                <label for="subject">
                                    <i class="fas fa-tag"></i>
                                    Subject
                                </label>
                                <select id="subject" name="subject" required>
                                    <option value="">Select a subject</option>
                                    <option value="general">General Inquiry</option>
                                    <option value="service">Service Question</option>
                                    <option value="pricing">Pricing Information</option>
                                    <option value="support">Technical Support</option>
                                    <option value="feedback">Feedback</option>
                                    <option value="other">Other</option>
                                </select>
                                <div class="input-focus-border"></div>
                            </div>
                        </div>
                        
                        <div class="form-group full-width">
                            <label for="message">
                                <i class="fas fa-comment"></i>
                                Message
                            </label>
                            <textarea id="message" name="message" placeholder="Tell us how we can help you..." rows="6" required></textarea>
                            <div class="input-focus-border"></div>
                            <div class="char-counter">
                                <span id="charCount">0</span>/500 characters
                            </div>
                        </div>
                        
                        <div class="form-options">
                            <label class="checkbox-container">
                                <input type="checkbox" name="newsletter" id="newsletter">
                                <span class="checkmark"></span>
                                Subscribe to our newsletter for updates and offers
                            </label>
                        </div>
                        
                        <button type="submit" class="submit-btn">
                            <span class="btn-text">Send Message</span>
                            <span class="btn-icon">
                                <i class="fas fa-paper-plane"></i>
                            </span>
                            <div class="btn-loading">
                                <i class="fas fa-spinner fa-spin"></i>
                            </div>
                        </button>
                    </form>
                </div>
                
                <div class="form-visual" data-aos="fade-left">
                    <div class="visual-content">
                        <div class="floating-card card-1">
                            <i class="fas fa-headset"></i>
                            <span>24/7 Support</span>
                        </div>
                        <div class="floating-card card-2">
                            <i class="fas fa-shield-alt"></i>
                            <span>Secure & Private</span>
                        </div>
                        <div class="floating-card card-3">
                            <i class="fas fa-reply"></i>
                            <span>Quick Response</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Social Media Section -->
    <section class="social-section">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <h2>Connect With Us</h2>
                <p>Follow us on social media for updates, tips, and special offers</p>
            </div>
            
            <div class="social-grid" data-aos="fade-up" data-aos-delay="200">
                <a href="https://facebook.com/" class="social-card facebook" target="_blank">
                    <div class="social-icon">
                        <i class="fab fa-facebook-f"></i>
                    </div>
                    <div class="social-content">
                        <h3>Facebook</h3>
                        <p>Follow us for updates and community</p>
                        <span class="social-link">@FreshWash</span>
                    </div>
                    <div class="social-hover">
                        <i class="fas fa-external-link-alt"></i>
                    </div>
                </a>
                
                <a href="https://instagram.com/" class="social-card instagram" target="_blank">
                    <div class="social-icon">
                        <i class="fab fa-instagram"></i>
                    </div>
                    <div class="social-content">
                        <h3>Instagram</h3>
                        <p>See our work and behind the scenes</p>
                        <span class="social-link">@FreshWash</span>
                    </div>
                    <div class="social-hover">
                        <i class="fas fa-external-link-alt"></i>
                    </div>
                </a>
                
                <a href="https://twitter.com/" class="social-card twitter" target="_blank">
                    <div class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </div>
                    <div class="social-content">
                        <h3>Twitter</h3>
                        <p>Get real-time updates and news</p>
                        <span class="social-link">@FreshWash</span>
                    </div>
                    <div class="social-hover">
                        <i class="fas fa-external-link-alt"></i>
                    </div>
                </a>
                
                <a href="https://whatsapp.com/" class="social-card whatsapp" target="_blank">
                    <div class="social-icon">
                        <i class="fab fa-whatsapp"></i>
                    </div>
                    <div class="social-content">
                        <h3>WhatsApp</h3>
                        <p>Quick chat and instant support</p>
                        <span class="social-link">+94 76 391 3526</span>
                    </div>
                    <div class="social-hover">
                        <i class="fas fa-external-link-alt"></i>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <h2>Frequently Asked Questions</h2>
                <p>Find quick answers to common questions</p>
            </div>
            
            <div class="faq-container" data-aos="fade-up" data-aos-delay="200">
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>What are your service areas?</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>We currently serve Colombo and surrounding areas. Contact us to check if we deliver to your location.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>How long does delivery take?</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Standard delivery takes 24-48 hours. Express service is available for same-day delivery at an additional cost.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Do you offer pickup service?</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Yes! We offer free pickup and delivery service for orders above a certain amount. Contact us for details.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>What payment methods do you accept?</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>We accept cash, credit cards, and online payments. Payment is due upon delivery.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Success Modal -->
    <div id="successModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <i class="fas fa-check-circle success-icon"></i>
                <h3>Message Sent Successfully!</h3>
            </div>
            <div class="modal-body">
                <p>Thank you for contacting us. We'll get back to you within 24 hours.</p>
            </div>
            <div class="modal-footer">
                <button class="modal-btn" onclick="closeModal()">Close</button>
            </div>
        </div>
    </div>

    <!-- Loading Overlay -->
    <div id="loadingOverlay" class="loading-overlay">
        <div class="loading-spinner">
            <i class="fas fa-spinner fa-spin"></i>
            <p>Sending your message...</p>
        </div>
    </div>

    <?php include('footer.php') ?>
    
    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="js/contact.js"></script>
</body>
</html>
