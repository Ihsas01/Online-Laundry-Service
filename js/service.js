// Service Page JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Initialize all interactive features
    initScrollAnimations();
    initModal();
    initServiceCards();
    initParallaxEffect();
    initCounterAnimation();
    initSmoothScrolling();
});

// Scroll Animations
function initScrollAnimations() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
            }
        });
    }, observerOptions);

    // Observe service cards and feature items
    document.querySelectorAll('.service-card, .feature-item').forEach(el => {
        observer.observe(el);
    });
}

// Modal Functionality
function initModal() {
    const modal = document.getElementById('serviceModal');
    const closeBtn = document.querySelector('.close');

    // Close modal when clicking on X
    closeBtn.addEventListener('click', () => {
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
    });

    // Close modal when clicking outside
    window.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }
    });

    // Close modal with Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && modal.style.display === 'block') {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }
    });
}

// Service Cards Interactive Features
function initServiceCards() {
    const serviceCards = document.querySelectorAll('.service-card');

    serviceCards.forEach(card => {
        // Add hover sound effect (optional)
        card.addEventListener('mouseenter', () => {
            card.style.transform = 'translateY(-10px) scale(1.02)';
        });

        card.addEventListener('mouseleave', () => {
            card.style.transform = 'translateY(0) scale(1)';
        });

        // Add click ripple effect
        card.addEventListener('click', (e) => {
            createRippleEffect(e, card);
        });
    });
}

// Ripple Effect
function createRippleEffect(event, element) {
    const ripple = document.createElement('span');
    const rect = element.getBoundingClientRect();
    const size = Math.max(rect.width, rect.height);
    const x = event.clientX - rect.left - size / 2;
    const y = event.clientY - rect.top - size / 2;

    ripple.style.width = ripple.style.height = size + 'px';
    ripple.style.left = x + 'px';
    ripple.style.top = y + 'px';
    ripple.classList.add('ripple');

    element.appendChild(ripple);

    setTimeout(() => {
        ripple.remove();
    }, 600);
}

// Parallax Effect for Hero Section
function initParallaxEffect() {
    const heroSection = document.querySelector('.hero-section');
    const floatingCards = document.querySelectorAll('.floating-card');

    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const rate = scrolled * -0.5;

        floatingCards.forEach((card, index) => {
            const speed = 0.5 + (index * 0.1);
            card.style.transform = `translateY(${rate * speed}px)`;
        });
    });
}

// Counter Animation for Stats
function initCounterAnimation() {
    const stats = document.querySelectorAll('.stat-number');
    
    const observerOptions = {
        threshold: 0.5
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounter(entry.target);
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    stats.forEach(stat => observer.observe(stat));
}

function animateCounter(element) {
    const target = parseInt(element.textContent.replace(/\D/g, ''));
    const suffix = element.textContent.replace(/\d/g, '');
    let current = 0;
    const increment = target / 50;
    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            current = target;
            clearInterval(timer);
        }
        element.textContent = Math.floor(current) + suffix;
    }, 30);
}

// Smooth Scrolling
function initSmoothScrolling() {
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
}

// Service Modal Content
function openServiceModal(serviceType) {
    const modal = document.getElementById('serviceModal');
    const modalContent = document.getElementById('modalContent');
    
    const serviceData = {
        'washing': {
            title: 'Professional Washing Service',
            description: 'Our premium washing service uses high-quality detergents and advanced washing machines to ensure your clothes come out fresh and clean.',
            features: [
                'Premium detergents for sensitive skin',
                'Temperature-controlled washing',
                'Gentle cycle for delicate fabrics',
                'Stain removal treatment',
                'Fabric softener included'
            ],
            pricing: 'Starting from $2.50 per kg',
            duration: '24-48 hours'
        },
        'dry-cleaning': {
            title: 'Expert Dry Cleaning',
            description: 'Professional dry cleaning service for delicate fabrics that require special care. We use eco-friendly solvents and professional equipment.',
            features: [
                'Eco-friendly solvents',
                'Professional pressing',
                'Stain treatment',
                'Fabric protection',
                'Express service available'
            ],
            pricing: 'Starting from $8.00 per item',
            duration: '24-72 hours'
        },
        'ironing': {
            title: 'Steam Ironing Service',
            description: 'Professional steam ironing to remove wrinkles and give your clothes a crisp, professional appearance.',
            features: [
                'Steam ironing technology',
                'Wrinkle-free finish',
                'Professional pressing',
                'Quick turnaround',
                'Bulk discounts available'
            ],
            pricing: 'Starting from $3.00 per item',
            duration: '12-24 hours'
        },
        'wash-fold': {
            title: 'Complete Wash & Fold Service',
            description: 'Full-service laundry including washing, drying, folding, and packaging. Perfect for busy professionals and families.',
            features: [
                'Complete laundry service',
                'Neat folding',
                'Packaging included',
                'Bulk pricing available',
                'Weekly/monthly subscriptions'
            ],
            pricing: 'Starting from $3.50 per kg',
            duration: '24-48 hours'
        }
    };

    const service = serviceData[serviceType];
    
    modalContent.innerHTML = `
        <div class="modal-header">
            <h2>${service.title}</h2>
        </div>
        <div class="modal-body">
            <p class="modal-description">${service.description}</p>
            
            <div class="modal-features">
                <h3>What's Included:</h3>
                <ul>
                    ${service.features.map(feature => `<li><i class="fas fa-check"></i> ${feature}</li>`).join('')}
                </ul>
            </div>
            
            <div class="modal-info">
                <div class="info-item">
                    <i class="fas fa-dollar-sign"></i>
                    <span><strong>Pricing:</strong> ${service.pricing}</span>
                </div>
                <div class="info-item">
                    <i class="fas fa-clock"></i>
                    <span><strong>Duration:</strong> ${service.duration}</span>
                </div>
            </div>
            
            <div class="modal-actions">
                <a href="order.php" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Order Now
                </a>
                <a href="contact_us.php" class="btn btn-secondary">
                    <i class="fas fa-phone"></i> Contact Us
                </a>
            </div>
        </div>
    `;

    modal.style.display = 'block';
    document.body.style.overflow = 'hidden';
}

// Add CSS for ripple effect
const style = document.createElement('style');
style.textContent = `
    .ripple {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.3);
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

    .modal-header h2 {
        color: #333;
        margin-bottom: 20px;
        font-size: 1.8rem;
    }

    .modal-description {
        color: #666;
        line-height: 1.6;
        margin-bottom: 25px;
    }

    .modal-features h3 {
        color: #333;
        margin-bottom: 15px;
        font-size: 1.2rem;
    }

    .modal-features ul {
        list-style: none;
        padding: 0;
    }

    .modal-features li {
        padding: 8px 0;
        color: #666;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .modal-features li i {
        color: #667eea;
        font-size: 0.9rem;
    }

    .modal-info {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin: 25px 0;
        padding: 20px;
        background: #f8f9fa;
        border-radius: 10px;
    }

    .info-item {
        display: flex;
        align-items: center;
        gap: 10px;
        color: #333;
    }

    .info-item i {
        color: #667eea;
        font-size: 1.2rem;
    }

    .modal-actions {
        display: flex;
        gap: 15px;
        margin-top: 25px;
    }

    @media (max-width: 768px) {
        .modal-info {
            grid-template-columns: 1fr;
        }
        
        .modal-actions {
            flex-direction: column;
        }
    }
`;
document.head.appendChild(style);

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

// Apply debouncing to scroll events
window.addEventListener('scroll', debounce(() => {
    // Any scroll-based animations can be added here
}, 10));

// Add loading states for buttons
document.addEventListener('click', (e) => {
    if (e.target.classList.contains('service-btn') || e.target.closest('.service-btn')) {
        const btn = e.target.classList.contains('service-btn') ? e.target : e.target.closest('.service-btn');
        const originalText = btn.innerHTML;
        
        btn.innerHTML = '<span class="loading"></span> Loading...';
        btn.disabled = true;
        
        setTimeout(() => {
            btn.innerHTML = originalText;
            btn.disabled = false;
        }, 1000);
    }
}); 