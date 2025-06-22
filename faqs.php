<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frequently Asked Questions - FreshWash</title>
    <link rel="stylesheet" href="css/faqs.css">
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
                    <h1 class="hero-title">Frequently Asked Questions</h1>
                    <p class="hero-subtitle">Have a question? We're here to help. Find the answers to our most common questions below.</p>
                    <div class="search-container">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" id="faq-search" placeholder="Search for a question...">
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ Content Section -->
        <section class="faq-content-section">
            <div class="container">
                <div class="faq-layout">
                    <!-- FAQ Categories/Navigation -->
                    <aside class="faq-nav">
                        <h3>Categories</h3>
                        <ul>
                            <li><a href="#general" class="active"><i class="fas fa-info-circle"></i> General</a></li>
                            <li><a href="#services" class=""><i class="fas fa-concierge-bell"></i> Services & Pricing</a></li>
                            <li><a href="#account" class=""><i class="fas fa-user-circle"></i> Account & Billing</a></li>
                            <li><a href="#pickup" class=""><i class="fas fa-truck"></i> Pickup & Delivery</a></li>
                        </ul>
                    </aside>

                    <!-- FAQ Accordion -->
                    <div class="faq-accordion">
                        <!-- General Section -->
                        <div id="general" class="faq-category">
                            <h2 class="category-title">General Questions</h2>
                            <div class="faq-item">
                                <div class="faq-question">
                                    <span>How does the FreshWash service work?</span>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                                <div class="faq-answer">
                                    <p>It's simple! 1. Place an order online. 2. We pick up your laundry at your preferred time. 3. We professionally clean your items according to your instructions. 4. We deliver your fresh, clean laundry back to you.</p>
                                </div>
                            </div>
                            <div class="faq-item">
                                <div class="faq-question">
                                    <span>What areas do you service?</span>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                                <div class="faq-answer">
                                    <p>We are constantly expanding! Currently, we service all major metropolitan areas. You can enter your zip code on our homepage to see if we're in your neighborhood.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Services & Pricing Section -->
                        <div id="services" class="faq-category">
                            <h2 class="category-title">Services & Pricing</h2>
                            <div class="faq-item">
                                <div class="faq-question">
                                    <span>What types of laundry services do you offer?</span>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                                <div class="faq-answer">
                                    <p>We offer a wide range of services, including standard wash and fold, dry cleaning, ironing, and special care for delicate items. You can see our full service list on the "Services" page.</p>
                                </div>
                            </div>
                            <div class="faq-item">
                                <div class="faq-question">
                                    <span>How is pricing determined?</span>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                                <div class="faq-answer">
                                    <p>Our pricing is based on weight for wash and fold services and per-item for dry cleaning and other special services. We offer transparent, competitive pricing with no hidden fees.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Account & Billing Section -->
                        <div id="account" class="faq-category">
                            <h2 class="category-title">Account & Billing</h2>
                            <div class="faq-item">
                                <div class="faq-question">
                                    <span>How do I create an account?</span>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                                <div class="faq-answer">
                                    <p>You can create an account by clicking the "Sign Up" button on our homepage. The process is quick, easy, and free!</p>
                                </div>
                            </div>
                            <div class="faq-item">
                                <div class="faq-question">
                                    <span>What payment methods do you accept?</span>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                                <div class="faq-answer">
                                    <p>We accept all major credit cards, including Visa, MasterCard, and American Express, as well as payments through PayPal.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Pickup & Delivery Section -->
                        <div id="pickup" class="faq-category">
                            <h2 class="category-title">Pickup & Delivery</h2>
                            <div class="faq-item">
                                <div class="faq-question">
                                    <span>What are your pickup and delivery hours?</span>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                                <div class="faq-answer">
                                    <p>Our standard pickup and delivery hours are from 8:00 AM to 8:00 PM, seven days a week. You can select a time slot that is most convenient for you when placing your order.</p>
                                </div>
                            </div>
                            <div class="faq-item">
                                <div class="faq-question">
                                    <span>Do I need to be home for pickup and delivery?</span>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                                <div class="faq-answer">
                                    <p>Not necessarily! You can leave your laundry in a designated safe spot (like your porch or with a concierge) and provide instructions in your order. We'll do the same for delivery.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Still Have Questions Section -->
        <section class="still-questions-section">
            <div class="container">
                <div class="cta-card">
                    <div class="cta-icon">
                        <i class="fas fa-question-circle"></i>
                    </div>
                    <h3>Still Have Questions?</h3>
                    <p>If you can't find the answer you're looking for, our support team is happy to help.</p>
                    <a href="customer.php" class="btn btn-primary">Contact Support</a>
                </div>
            </div>
        </section>
    </main>

    <?php include 'footer.php'; ?>

    <script src="js/faqs.js"></script>
</body>
</html>