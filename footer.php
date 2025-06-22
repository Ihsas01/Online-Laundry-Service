<!-- Footer CSS -->
<link rel="stylesheet" href="css/footer.css">

<!-- Simple Footer -->
<footer class="simple-footer">
    <div class="container">
        <div class="footer-content">
            <!-- Company Info -->
            <div class="footer-section">
                <div class="company-info">
                    <img src="images/logo4.png" alt="FreshWash" class="footer-logo">
                    <div class="company-details">
                        <h3>FreshWash</h3>
                        <p>Premium Laundry Services</p>
                    </div>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="footer-section">
                <h4>Quick Links</h4>
                <ul class="footer-links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="service.php">Services</a></li>
                    <li><a href="about_us.php">About</a></li>
                    <li><a href="contact_us.php">Contact</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="footer-section">
                <h4>Contact</h4>
                <div class="contact-info">
                    <p><i class="fas fa-phone"></i> 076 391 3526</p>
                    <p><i class="fas fa-envelope"></i> Mohamedihsas001@gmail.com</p>
                </div>
            </div>

            <!-- Social Links -->
            <div class="footer-section">
                <h4>Follow Us</h4>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <p>&copy; 2024 FreshWash. All rights reserved by MET_WD_03</p>
            <div class="footer-links-bottom">
                <a href="terms.php">Terms</a>
                <a href="privacy_policy.php">Privacy</a>
                <a href="customer.php">Customer Support</a>
                <a href="faqs.php">Faq</a>
        
            </div>
        </div>
    </div>
</footer>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!-- Simple Footer JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Simple hover effects
    const footerLinks = document.querySelectorAll('.footer-links a, .social-links a');
    
    footerLinks.forEach(link => {
        link.addEventListener('mouseenter', function() {
            this.style.color = '#667eea';
        });
        
        link.addEventListener('mouseleave', function() {
            this.style.color = '';
        });
    });
});
</script>


