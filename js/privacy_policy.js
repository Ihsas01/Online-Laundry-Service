// Privacy Policy JavaScript - Interactive Features

document.addEventListener('DOMContentLoaded', function() {
    // Initialize all interactive features
    initBackToTop();
    initSmoothScrolling();
    initAnimations();
    initInteractiveElements();
    initScrollEffects();
    initMobileMenu();
});

// Back to Top Button Functionality
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
                const headerHeight = document.querySelector('.header').offsetHeight;
                const targetPosition = targetElement.offsetTop - headerHeight - 20;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
                
                // Add active state to TOC item
                updateActiveTOCItem(targetId);
            }
        });
    });
}

// Update active TOC item based on scroll position
function updateActiveTOCItem(currentSectionId) {
    const tocItems = document.querySelectorAll('.toc-item');
    
    tocItems.forEach(item => {
        item.classList.remove('active');
        if (item.getAttribute('href') === currentSectionId) {
            item.classList.add('active');
        }
    });
}

// Initialize Animations
function initAnimations() {
    // Intersection Observer for fade-in animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
            }
        });
    }, observerOptions);
    
    // Observe elements for animation
    const animateElements = document.querySelectorAll('.policy-section, .info-card, .security-item, .timeline-item');
    animateElements.forEach(el => {
        el.classList.add('loading');
        observer.observe(el);
    });
    
    // Hero section animation
    const heroSection = document.querySelector('.hero-section');
    if (heroSection) {
        setTimeout(() => {
            heroSection.classList.add('animate-in');
        }, 500);
    }
}

// Interactive Elements
function initInteractiveElements() {
    // Add hover effects to cards
    const cards = document.querySelectorAll('.info-card, .security-item, .children-card, .cookie-type');
    
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px) scale(1.02)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });
    
    // Add click effects to buttons
    const buttons = document.querySelectorAll('.btn, .contact-method');
    
    buttons.forEach(button => {
        button.addEventListener('click', function(e) {
            // Create ripple effect
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;
            
            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';
            ripple.classList.add('ripple');
            
            this.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });
}

// Scroll Effects
function initScrollEffects() {
    let ticking = false;
    
    function updateScrollEffects() {
        const scrolled = window.pageYOffset;
        const header = document.querySelector('.header');
        
        // Parallax effect for hero section
        const heroSection = document.querySelector('.hero-section');
        if (heroSection) {
            const speed = 0.5;
            heroSection.style.transform = `translateY(${scrolled * speed}px)`;
        }
        
        // Header background opacity
        if (header) {
            const opacity = Math.min(scrolled / 200, 0.95);
            header.style.background = `rgba(255, 255, 255, ${opacity})`;
        }
        
        ticking = false;
    }
    
    function requestTick() {
        if (!ticking) {
            requestAnimationFrame(updateScrollEffects);
            ticking = true;
        }
    }
    
    window.addEventListener('scroll', requestTick);
}

// Mobile Menu Toggle
function initMobileMenu() {
    const navMenu = document.querySelector('.nav-menu');
    const header = document.querySelector('.header');
    
    if (!navMenu || !header) return;
    
    // Create mobile menu button
    const mobileMenuBtn = document.createElement('button');
    mobileMenuBtn.className = 'mobile-menu-btn';
    mobileMenuBtn.innerHTML = '<i class="fas fa-bars"></i>';
    mobileMenuBtn.style.display = 'none';
    
    header.querySelector('.header-content').appendChild(mobileMenuBtn);
    
    // Toggle mobile menu
    mobileMenuBtn.addEventListener('click', function() {
        navMenu.classList.toggle('mobile-open');
        this.innerHTML = navMenu.classList.contains('mobile-open') ? 
            '<i class="fas fa-times"></i>' : '<i class="fas fa-bars"></i>';
    });
    
    // Close mobile menu when clicking outside
    document.addEventListener('click', function(e) {
        if (!header.contains(e.target)) {
            navMenu.classList.remove('mobile-open');
            mobileMenuBtn.innerHTML = '<i class="fas fa-bars"></i>';
        }
    });
    
    // Responsive behavior
    function handleResize() {
        if (window.innerWidth <= 768) {
            mobileMenuBtn.style.display = 'block';
            navMenu.classList.add('mobile-menu');
        } else {
            mobileMenuBtn.style.display = 'none';
            navMenu.classList.remove('mobile-menu', 'mobile-open');
        }
    }
    
    handleResize();
    window.addEventListener('resize', handleResize);
}

// Add CSS for animations and mobile menu
function addDynamicStyles() {
    const style = document.createElement('style');
    style.textContent = `
        .animate-in {
            animation: fadeInUp 0.8s ease forwards;
        }
        
        .toc-item.active {
            background: linear-gradient(135deg, #667eea, #764ba2) !important;
            color: white !important;
        }
        
        .toc-item.active i {
            color: white !important;
        }
        
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
        
        .mobile-menu-btn {
            background: none;
            border: none;
            font-size: 1.5rem;
            color: #667eea;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 5px;
            transition: all 0.3s ease;
        }
        
        .mobile-menu-btn:hover {
            background: rgba(102, 126, 234, 0.1);
        }
        
        .mobile-menu {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            flex-direction: column;
            padding: 1rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transform: translateY(-100%);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }
        
        .mobile-menu.mobile-open {
            transform: translateY(0);
            opacity: 1;
            visibility: visible;
        }
        
        .mobile-menu .nav-link {
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 0.5rem;
        }
        
        .mobile-menu .nav-link:hover {
            background: rgba(102, 126, 234, 0.1);
        }
        
        @media (max-width: 768px) {
            .header-content {
                position: relative;
            }
        }
    `;
    document.head.appendChild(style);
}

// Initialize dynamic styles
addDynamicStyles();

// Performance optimization: Debounce scroll events
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

// Enhanced scroll handling with debouncing
const debouncedScrollHandler = debounce(function() {
    // Update active section based on scroll position
    const sections = document.querySelectorAll('.policy-section');
    const scrollPosition = window.pageYOffset + 100;
    
    sections.forEach(section => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.offsetHeight;
        const sectionId = section.getAttribute('id');
        
        if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
            updateActiveTOCItem('#' + sectionId);
        }
    });
}, 100);

window.addEventListener('scroll', debouncedScrollHandler);

// Add loading animation for page elements
window.addEventListener('load', function() {
    document.body.classList.add('loaded');
    
    // Animate elements in sequence
    const elements = document.querySelectorAll('.policy-section');
    elements.forEach((element, index) => {
        setTimeout(() => {
            element.classList.add('animate-in');
        }, index * 200);
    });
});

// Add keyboard navigation support
document.addEventListener('keydown', function(e) {
    // Escape key closes mobile menu
    if (e.key === 'Escape') {
        const mobileMenu = document.querySelector('.mobile-menu');
        if (mobileMenu && mobileMenu.classList.contains('mobile-open')) {
            mobileMenu.classList.remove('mobile-open');
            const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
            if (mobileMenuBtn) {
                mobileMenuBtn.innerHTML = '<i class="fas fa-bars"></i>';
            }
        }
    }
    
    // Arrow keys for navigation (if needed)
    if (e.key === 'ArrowUp' && e.ctrlKey) {
        e.preventDefault();
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }
});

// Add touch support for mobile devices
if ('ontouchstart' in window) {
    document.addEventListener('touchstart', function() {}, {passive: true});
}

// Console log for debugging (remove in production)
console.log('Privacy Policy page loaded with enhanced interactivity!'); 