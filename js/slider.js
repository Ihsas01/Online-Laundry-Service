// Enhanced Modern Slider JavaScript with Advanced Features
let currentSlideIndex = 0;
const slides = document.querySelectorAll('.slide');
const dots = document.querySelectorAll('.dot');
let slideInterval;
let particles = [];
let isAnimating = false;

// Initialize slider with enhanced features
function initSlider() {
    if (slides.length === 0) return;
    
    showSlide(currentSlideIndex);
    startAutoPlay();
    
    // Add enhanced touch/swipe support for mobile
    addTouchSupport();
    
    // Initialize particle system
    initParticles();
    
    // Add parallax effects
    addParallaxEffects();
    
    // Add scroll-triggered animations
    addScrollAnimations();
    
    // Add interactive cursor effects
    addCursorEffects();
    
    // Add dynamic content loading
    addDynamicContent();
}

// Enhanced slide show function
function showSlide(index) {
    if (isAnimating) return;
    isAnimating = true;
    
    // Hide all slides with enhanced animation
    slides.forEach((slide, i) => {
        slide.classList.remove('active');
        if (i === index) {
            slide.style.transform = 'scale(1.1)';
        } else {
            slide.style.transform = 'scale(1)';
        }
    });
    
    // Remove active class from all dots with animation
    dots.forEach(dot => {
        dot.classList.remove('active');
        dot.style.transform = 'scale(1)';
    });
    
    // Show current slide and activate corresponding dot
    if (slides[index]) {
        slides[index].classList.add('active');
        slides[index].style.transform = 'scale(1)';
        
        // Add entrance animation for slide content
        const content = slides[index].querySelector('.slide-content');
        if (content) {
            content.style.animation = 'none';
            content.offsetHeight; // Trigger reflow
            content.style.animation = 'slideContentIn 1s ease-out forwards';
        }
    }
    
    if (dots[index]) {
        dots[index].classList.add('active');
        dots[index].style.transform = 'scale(1.2)';
    }
    
    currentSlideIndex = index;
    
    // Reset animation flag after transition
    setTimeout(() => {
        isAnimating = false;
    }, 1000);
}

// Enhanced slide change function
function changeSlide(direction) {
    let newIndex = currentSlideIndex + direction;
    
    if (newIndex >= slides.length) {
        newIndex = 0;
    } else if (newIndex < 0) {
        newIndex = slides.length - 1;
    }
    
    showSlide(newIndex);
    resetAutoPlay();
    
    // Add haptic feedback for mobile
    if ('vibrate' in navigator) {
        navigator.vibrate(50);
    }
}

// Enhanced current slide function
function currentSlide(index) {
    showSlide(index - 1);
    resetAutoPlay();
}

// Enhanced auto-play functionality
function startAutoPlay() {
    slideInterval = setInterval(() => {
        changeSlide(1);
    }, 5000);
}

function resetAutoPlay() {
    clearInterval(slideInterval);
    startAutoPlay();
}

// Enhanced touch/swipe support for mobile
function addTouchSupport() {
    let startX = 0;
    let startY = 0;
    let endX = 0;
    let endY = 0;
    
    const heroSlider = document.querySelector('.hero-slider');
    
    if (!heroSlider) return;
    
    heroSlider.addEventListener('touchstart', (e) => {
        startX = e.touches[0].clientX;
        startY = e.touches[0].clientY;
    });
    
    heroSlider.addEventListener('touchend', (e) => {
        endX = e.changedTouches[0].clientX;
        endY = e.changedTouches[0].clientY;
        handleSwipe();
    });
    
    function handleSwipe() {
        const swipeThreshold = 50;
        const diffX = startX - endX;
        const diffY = startY - endY;
        
        // Check if it's a horizontal swipe
        if (Math.abs(diffX) > Math.abs(diffY) && Math.abs(diffX) > swipeThreshold) {
            if (diffX > 0) {
                // Swipe left - next slide
                changeSlide(1);
            } else {
                // Swipe right - previous slide
                changeSlide(-1);
            }
        }
    }
}

// Particle system for background effects
function initParticles() {
    const particleContainer = document.createElement('div');
    particleContainer.className = 'particles';
    document.body.appendChild(particleContainer);
    
    // Create particles
    for (let i = 0; i < 50; i++) {
        createParticle(particleContainer);
    }
    
    // Animate particles
    animateParticles();
}

function createParticle(container) {
    const particle = document.createElement('div');
    particle.className = 'particle';
    
    // Random position and size
    const size = Math.random() * 4 + 2;
    const x = Math.random() * window.innerWidth;
    const y = window.innerHeight + size;
    
    particle.style.width = size + 'px';
    particle.style.height = size + 'px';
    particle.style.left = x + 'px';
    particle.style.top = y + 'px';
    particle.style.animationDelay = Math.random() * 6 + 's';
    particle.style.animationDuration = (Math.random() * 3 + 3) + 's';
    
    container.appendChild(particle);
    
    // Remove particle after animation
    setTimeout(() => {
        if (particle.parentNode) {
            particle.parentNode.removeChild(particle);
            createParticle(container);
        }
    }, 6000);
}

function animateParticles() {
    setInterval(() => {
        const container = document.querySelector('.particles');
        if (container && container.children.length < 50) {
            createParticle(container);
        }
    }, 200);
}

// Parallax scrolling effects
function addParallaxEffects() {
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const parallaxElements = document.querySelectorAll('.parallax');
        
        parallaxElements.forEach(element => {
            const speed = element.dataset.speed || 0.5;
            const yPos = -(scrolled * speed);
            element.style.transform = `translateY(${yPos}px)`;
        });
    });
}

// Enhanced scroll animations
function addScrollAnimations() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                
                // Add staggered animation for child elements
                const children = entry.target.querySelectorAll('.animate-child');
                children.forEach((child, index) => {
                    setTimeout(() => {
                        child.classList.add('visible');
                    }, index * 100);
                });
            }
        });
    }, observerOptions);
    
    // Observe elements with fade-in class
    const fadeElements = document.querySelectorAll('.fade-in, .animate-on-scroll');
    fadeElements.forEach(el => observer.observe(el));
}

// Interactive cursor effects
function addCursorEffects() {
    const cursor = document.createElement('div');
    cursor.className = 'custom-cursor';
    cursor.innerHTML = '<div class="cursor-dot"></div><div class="cursor-ring"></div>';
    document.body.appendChild(cursor);
    
    let mouseX = 0;
    let mouseY = 0;
    let cursorX = 0;
    let cursorY = 0;
    
    document.addEventListener('mousemove', (e) => {
        mouseX = e.clientX;
        mouseY = e.clientY;
    });
    
    // Smooth cursor animation
    function animateCursor() {
        const dx = mouseX - cursorX;
        const dy = mouseY - cursorY;
        
        cursorX += dx * 0.1;
        cursorY += dy * 0.1;
        
        cursor.style.left = cursorX + 'px';
        cursor.style.top = cursorY + 'px';
        
        requestAnimationFrame(animateCursor);
    }
    
    animateCursor();
    
    // Cursor hover effects
    const hoverElements = document.querySelectorAll('a, button, .hover-effect');
    hoverElements.forEach(element => {
        element.addEventListener('mouseenter', () => {
            cursor.classList.add('hover');
        });
        
        element.addEventListener('mouseleave', () => {
            cursor.classList.remove('hover');
        });
    });
}

// Dynamic content loading
function addDynamicContent() {
    // Animate stats with counting effect
    const statsObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateStats();
                statsObserver.unobserve(entry.target);
            }
        });
    });
    
    const statsSection = document.querySelector('.stats-section');
    if (statsSection) {
        statsObserver.observe(statsSection);
    }
}

// Enhanced stats animation
function animateStats() {
    const stats = document.querySelectorAll('.stat-number');
    stats.forEach(stat => {
        const target = parseInt(stat.getAttribute('data-count'));
        const increment = target / 100;
        let current = 0;
        
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            stat.textContent = Math.floor(current);
        }, 20);
    });
}

// Pause auto-play on hover with enhanced UX
function addHoverPause() {
    const heroSection = document.querySelector('.hero-section');
    
    if (heroSection) {
        heroSection.addEventListener('mouseenter', () => {
            clearInterval(slideInterval);
            // Add pause indicator
            addPauseIndicator();
        });
        
        heroSection.addEventListener('mouseleave', () => {
            startAutoPlay();
            removePauseIndicator();
        });
    }
}

function addPauseIndicator() {
    const indicator = document.createElement('div');
    indicator.className = 'pause-indicator';
    indicator.innerHTML = '<i class="fas fa-pause"></i>';
    document.querySelector('.hero-section').appendChild(indicator);
}

function removePauseIndicator() {
    const indicator = document.querySelector('.pause-indicator');
    if (indicator) {
        indicator.remove();
    }
}

// Enhanced keyboard navigation
function addKeyboardSupport() {
    document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowLeft') {
            changeSlide(-1);
        } else if (e.key === 'ArrowRight') {
            changeSlide(1);
        } else if (e.key === ' ') {
            e.preventDefault();
            // Toggle auto-play with spacebar
            if (slideInterval) {
                clearInterval(slideInterval);
                slideInterval = null;
                addPauseIndicator();
            } else {
                startAutoPlay();
                removePauseIndicator();
            }
        }
    });
}

// Enhanced smooth scroll for navigation links
function addSmoothScroll() {
    const links = document.querySelectorAll('a[href^="#"]');
    
    links.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            
            const targetId = link.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
}

// Performance optimization
function optimizePerformance() {
    // Use requestAnimationFrame for smooth animations
    let ticking = false;
    
    function updateAnimations() {
        // Update any ongoing animations here
        ticking = false;
    }
    
    function requestTick() {
        if (!ticking) {
            requestAnimationFrame(updateAnimations);
            ticking = true;
        }
    }
    
    // Throttle scroll events
    let scrollTimeout;
    window.addEventListener('scroll', () => {
        if (scrollTimeout) {
            clearTimeout(scrollTimeout);
        }
        scrollTimeout = setTimeout(requestTick, 16);
    });
}

// Initialize everything when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    initSlider();
    addHoverPause();
    addKeyboardSupport();
    addSmoothScroll();
    addScrollAnimations();
    optimizePerformance();
    
    // Add loading animation
    document.body.classList.add('loaded');
    
    // Add CSS for enhanced features
    addEnhancedStyles();
});

// Add enhanced CSS styles dynamically
function addEnhancedStyles() {
    const style = document.createElement('style');
    style.textContent = `
        /* Custom Cursor */
        .custom-cursor {
            position: fixed;
            top: 0;
            left: 0;
            width: 20px;
            height: 20px;
            pointer-events: none;
            z-index: 9999;
            mix-blend-mode: difference;
        }
        
        .cursor-dot {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 4px;
            height: 4px;
            background: white;
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: all 0.1s ease;
        }
        
        .cursor-ring {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 20px;
            height: 20px;
            border: 2px solid rgba(255,255,255,0.5);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: all 0.2s ease;
        }
        
        .custom-cursor.hover .cursor-dot {
            transform: translate(-50%, -50%) scale(2);
        }
        
        .custom-cursor.hover .cursor-ring {
            transform: translate(-50%, -50%) scale(1.5);
            border-color: rgba(255,255,255,0.8);
        }
        
        /* Pause Indicator */
        .pause-indicator {
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(255,255,255,0.2);
            backdrop-filter: blur(10px);
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            z-index: 10;
            animation: fadeIn 0.3s ease;
        }
        
        /* Enhanced Animations */
        .animate-child {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.6s ease;
        }
        
        .animate-child.visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        /* Parallax Elements */
        .parallax {
            will-change: transform;
        }
        
        /* Loading States */
        .loading {
            opacity: 0;
            transform: translateY(20px);
        }
        
        .loaded {
            opacity: 1;
            transform: translateY(0);
            transition: all 0.8s ease;
        }
        
        /* Enhanced Button States */
        .primary-button:active,
        .secondary-button:active,
        .cta-button:active {
            transform: translateY(-1px) scale(0.98);
        }
        
        /* Focus States */
        .primary-button:focus,
        .secondary-button:focus,
        .cta-button:focus {
            outline: 2px solid rgba(102,126,234,0.5);
            outline-offset: 2px;
        }
        
        /* Reduced Motion Support */
        @media (prefers-reduced-motion: reduce) {
            * {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }
    `;
    document.head.appendChild(style);
}

// Export functions for global access
window.sliderFunctions = {
    changeSlide,
    currentSlide,
    initSlider
};
