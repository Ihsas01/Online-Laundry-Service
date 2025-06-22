// Terms and Conditions JavaScript

document.addEventListener('DOMContentLoaded', function() {
    // Initialize all interactive features
    initBackToTop();
    initSmoothScrolling();
    initTableOfContents();
    initAnimations();
    initRippleEffects();
    initMobileMenu();
    initKeyboardNavigation();
});

// Back to Top Button
function initBackToTop() {
    const backToTopBtn = document.getElementById('backToTop');
    
    if (!backToTopBtn) return;
    
    // Show/hide button based on scroll position
    window.addEventListener('scroll', function() {
        if (window.pageYOffset > 300) {
            backToTopBtn.classList.add('show');
        } else {
            backToTopBtn.classList.remove('show');
        }
    });
    
    // Smooth scroll to top when clicked
    backToTopBtn.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
    
    // Add ripple effect
    backToTopBtn.addEventListener('click', function(e) {
        createRipple(e, this);
    });
}

// Smooth Scrolling for Anchor Links
function initSmoothScrolling() {
    const links = document.querySelectorAll('a[href^="#"]');
    
    links.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                const headerHeight = document.querySelector('.header')?.offsetHeight || 80;
                const targetPosition = targetElement.offsetTop - headerHeight - 20;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
                
                // Update URL without page jump
                history.pushState(null, null, targetId);
            }
        });
    });
}

// Table of Contents Highlighting
function initTableOfContents() {
    const tocLinks = document.querySelectorAll('.toc-link');
    const sections = document.querySelectorAll('.terms-section');
    
    if (tocLinks.length === 0 || sections.length === 0) return;
    
    // Create intersection observer for sections
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const currentId = entry.target.getAttribute('id');
                updateActiveTocLink(currentId);
            }
        });
    }, {
        threshold: 0.3,
        rootMargin: '-80px 0px -20% 0px'
    });
    
    // Observe all sections
    sections.forEach(section => {
        observer.observe(section);
    });
    
    // Update active TOC link
    function updateActiveTocLink(activeId) {
        tocLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === `#${activeId}`) {
                link.classList.add('active');
            }
        });
    }
    
    // Add click effects to TOC links
    tocLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            createRipple(e, this);
        });
    });
}

// Animations on Scroll
function initAnimations() {
    const animatedElements = document.querySelectorAll('.terms-section, .welcome-card, .contact-card');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    });
    
    animatedElements.forEach(element => {
        observer.observe(element);
    });
}

// Ripple Effect for Interactive Elements
function initRippleEffects() {
    const interactiveElements = document.querySelectorAll('.btn, .toc-link, .feature-item, .commitment-item');
    
    interactiveElements.forEach(element => {
        element.addEventListener('click', function(e) {
            createRipple(e, this);
        });
    });
}

function createRipple(event, element) {
    const ripple = document.createElement('span');
    const rect = element.getBoundingClientRect();
    const size = Math.max(rect.width, rect.height);
    const x = event.clientX - rect.left - size / 2;
    const y = event.clientY - rect.top - size / 2;
    
    ripple.style.width = ripple.style.height = size + 'px';
    ripple.style.left = x + 'px';
    ripple.style.top = y + 'px';
    ripple.classList.add('ripple');
    
    element.style.position = 'relative';
    element.style.overflow = 'hidden';
    element.appendChild(ripple);
    
    setTimeout(() => {
        ripple.remove();
    }, 600);
}

// Mobile Menu Toggle (if needed)
function initMobileMenu() {
    const mobileToggle = document.querySelector('.mobile-menu-toggle');
    const mobileNav = document.querySelector('.mobile-nav');
    
    if (mobileToggle && mobileNav) {
        mobileToggle.addEventListener('click', function() {
            mobileNav.classList.toggle('active');
            this.classList.toggle('active');
        });
    }
}

// Keyboard Navigation
function initKeyboardNavigation() {
    document.addEventListener('keydown', function(e) {
        // Escape key to close mobile menu
        if (e.key === 'Escape') {
            const mobileNav = document.querySelector('.mobile-nav');
            const mobileToggle = document.querySelector('.mobile-menu-toggle');
            
            if (mobileNav && mobileNav.classList.contains('active')) {
                mobileNav.classList.remove('active');
                mobileToggle?.classList.remove('active');
            }
        }
        
        // Home key to scroll to top
        if (e.key === 'Home') {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
        
        // End key to scroll to bottom
        if (e.key === 'End') {
            e.preventDefault();
            window.scrollTo({
                top: document.body.scrollHeight,
                behavior: 'smooth'
            });
        }
    });
}

// Utility Functions
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Performance optimization for scroll events
const optimizedScrollHandler = debounce(function() {
    // Any scroll-based functionality can be added here
}, 16); // ~60fps

window.addEventListener('scroll', optimizedScrollHandler);

// Add CSS for ripple effect
const style = document.createElement('style');
style.textContent = `
    .ripple {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.6);
        transform: scale(0);
        animation: ripple-animation 0.6s linear;
        pointer-events: none;
    }
    
    @keyframes ripple-animation {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }
    
    .animate-in {
        animation: fadeInUp 0.8s ease forwards;
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .toc-link.active {
        background: linear-gradient(135deg, #667eea, #764ba2) !important;
        color: white !important;
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
    }
    
    .toc-link.active .toc-number {
        background: rgba(255, 255, 255, 0.2) !important;
    }
    
    .toc-link.active .toc-text {
        color: white !important;
    }
`;

document.head.appendChild(style);

// Error handling
window.addEventListener('error', function(e) {
    console.error('JavaScript error:', e.error);
});

// Console log for debugging
console.log('Terms and Conditions page JavaScript loaded successfully!'); 