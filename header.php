<!doctype html>
<html lang="en">
    <head>
        <title>FreshWash - Premium Laundry Services</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Premium online laundry and dry cleaning services">
        <meta name="keywords" content="laundry, dry cleaning, online laundry, wash and fold">
        
        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="images/logo4.png">
        
        <!-- CSS Files -->
        <link rel="stylesheet" href="css/global.css">
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    </head>
    <body> 
        <header class="header">
            
           

            <!-- Main Header -->
            <div class="main-header">
                <div class="container">
                    <div class="header-content">
                        <!-- Logo Section -->
                        <div class="logo-section">
                            <a href="index.php" class="logo-link">
                                <img src="images/logo4.png" alt="FreshWash Logo" class="logo">
                                <span class="logo-text">FreshWash</span>
                            </a>
                        </div>

                        <!-- Navigation -->
                        <nav class="main-nav">
                            <ul class="nav-menu">
                                <li class="nav-item">
                                    <a href="index.php" class="nav-link">
                                        <i class="fas fa-home"></i>
                                        <span>Home</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="service.php" class="nav-link">
                                        <i class="fas fa-concierge-bell"></i>
                                        <span>Services</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="about_us.php" class="nav-link">
                                        <i class="fas fa-info-circle"></i>
                                        <span>About</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="order.php" class="nav-link">
                                        <i class="fas fa-shopping-cart"></i>
                                        <span>Order</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="contact_us.php" class="nav-link">
                                        <i class="fas fa-phone-alt"></i>
                                        <span>Contact</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>

                        <!-- User Actions -->
                        <div class="user-actions">
                            <div class="search-box">
                                <input type="text" placeholder="Search services..." class="search-input">
                                <button class="search-btn" aria-label="Search">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                            
                            <div class="auth-buttons">
                                <a href="login.php" class="btn btn-login">
                                    <i class="fas fa-sign-in-alt"></i>
                                    <span>Login</span>
                                </a>
                                <a href="user_1.php" class="btn btn-profile">
                                    <i class="fas fa-user"></i>
                                    <span>Profile</span>
                                </a>
                            </div>

                            <!-- Mobile Menu Toggle -->
                            <button class="mobile-menu-toggle" aria-label="Toggle mobile menu">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile Navigation -->
            <div class="mobile-nav">
                <ul class="mobile-menu">
                    <li><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="service.php"><i class="fas fa-concierge-bell"></i> Services</a></li>
                    <li><a href="about_us.php"><i class="fas fa-info-circle"></i> About</a></li>
                    <li><a href="order.php"><i class="fas fa-shopping-cart"></i> Order</a></li>
                    <li><a href="contact_us.php"><i class="fas fa-phone-alt"></i> Contact</a></li>
                    <li><a href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a></li>
                    <li><a href="user_1.php"><i class="fas fa-user"></i> Profile</a></li>
                </ul>
            </div>
        </header>

        <!-- JavaScript for interactive features -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Mobile menu toggle
                const mobileToggle = document.querySelector('.mobile-menu-toggle');
                const mobileNav = document.querySelector('.mobile-nav');
                const body = document.body;

                mobileToggle.addEventListener('click', function() {
                    mobileToggle.classList.toggle('active');
                    mobileNav.classList.toggle('active');
                    body.classList.toggle('menu-open');
                });

                // Search functionality
                const searchInput = document.querySelector('.search-input');
                const searchBtn = document.querySelector('.search-btn');
                
                searchBtn.addEventListener('click', function() {
                    const query = searchInput.value.trim();
                    if (query) {
                        // Implement search functionality
                        console.log('Searching for:', query);
                    }
                });

                // Header scroll effect
                let lastScroll = 0;
                const header = document.querySelector('.header');
                
                window.addEventListener('scroll', function() {
                    const currentScroll = window.pageYOffset;
                    
                    if (currentScroll > 100) {
                        header.classList.add('scrolled');
                    } else {
                        header.classList.remove('scrolled');
                    }
                    
                    if (currentScroll > lastScroll && currentScroll > 200) {
                        header.classList.add('header-hidden');
                    } else {
                        header.classList.remove('header-hidden');
                    }
                    
                    lastScroll = currentScroll;
                });

                // Smooth scroll for anchor links
                document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                    anchor.addEventListener('click', function (e) {
                        e.preventDefault();
                        const target = document.querySelector(this.getAttribute('href'));
                        if (target) {
                            target.scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });
                        }
                    });
                });
            });
        </script>
    </body>
</html>