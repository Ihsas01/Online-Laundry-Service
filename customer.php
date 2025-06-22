<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Support - FreshWash</title>
    <link rel="stylesheet" href="css/customer.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <?php include 'header.php'; ?>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="container">
                <div class="hero-content">
                    <div class="hero-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h1 class="hero-title">Customer Support</h1>
                    <p class="hero-subtitle">We're here to help. Get in touch with us for any questions or concerns.</p>
                </div>
            </div>
        </section>

        <!-- Contact Options Section -->
        <section class="contact-options">
            <div class="container">
                <div class="section-header">
                    <h2>How Can We Help?</h2>
                    <p>Choose your preferred way to get in touch with our support team.</p>
                </div>
                <div class="options-grid">
                    <!-- Email Card -->
                    <div class="option-card">
                        <div class="card-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h3>Email Us</h3>
                        <p>Send us a detailed message and we'll get back to you within 24 hours.</p>
                        <a href="mailto:support@freshwash.com" class="btn btn-primary">Send an Email</a>
                    </div>
                    <!-- Phone Card -->
                    <div class="option-card">
                        <div class="card-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <h3>Call Us</h3>
                        <p>Speak directly with our support team for immediate assistance.</p>
                        <a href="tel:+1234567890" class="btn btn-primary">Call Now</a>
                    </div>
                    <!-- Live Chat Card -->
                    <div class="option-card">
                        <div class="card-icon">
                            <i class="fas fa-comments"></i>
                        </div>
                        <h3>Live Chat</h3>
                        <p>Chat with us live for quick answers to your questions.</p>
                        <a href="#" class="btn btn-primary">Start Chat</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Form Section -->
        <section class="contact-form-section">
            <div class="container">
                <div class="form-container">
                    <div class="form-header">
                        <h2>Submit an Inquiry</h2>
                        <p>Fill out the form below and our team will get back to you shortly.</p>
                    </div>
                    <form action="customer.php" method="POST" class="contact-form" id="contactForm">
                        <div class="form-grid">
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <div class="input-wrapper">
                                    <i class="fas fa-user"></i>
                                    <input type="text" id="name" name="name" placeholder="Enter your full name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <div class="input-wrapper">
                                    <i class="fas fa-at"></i>
                                    <input type="email" id="email" name="email" placeholder="Enter your email address" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone">Contact Number</label>
                                <div class="input-wrapper">
                                    <i class="fas fa-phone"></i>
                                    <input type="tel" id="phone" name="phone" placeholder="Enter your contact number">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inquiry-type">Inquiry Type</label>
                                <div class="input-wrapper">
                                    <i class="fas fa-list-alt"></i>
                                    <select id="inquiry-type" name="inquiry-type" required>
                                        <option value="" disabled selected>Select inquiry type</option>
                                        <option value="billing">Billing Issue</option>
                                        <option value="service">Service Question</option>
                                        <option value="feedback">Feedback</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group full-width">
                                <label for="message">Your Message</label>
                                <div class="input-wrapper">
                                    <i class="fas fa-pen"></i>
                                    <textarea id="message" name="message" rows="6" placeholder="Describe your inquiry in detail..." required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-submit">
                                <span>Submit Inquiry</span>
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="faq-section">
            <div class="container">
                <div class="section-header">
                    <h2>Frequently Asked Questions</h2>
                    <p>Find quick answers to common questions about our services.</p>
                </div>
                <div class="faq-accordion">
                    <div class="faq-item">
                        <div class="faq-question">
                            <span>How do I schedule a pickup?</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>You can schedule a pickup directly through our website by navigating to the "Order" page and selecting your desired date and time.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question">
                            <span>What are your service areas?</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>We currently serve all major metropolitan areas. You can check if your specific location is covered on the "Service Areas" page.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question">
                            <span>How is pricing determined?</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p>Pricing is based on the type and quantity of items. You can find a detailed price list on our "Services" page.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include 'footer.php'; ?>

    <script src="js/customer.js"></script>
</body>
</html>